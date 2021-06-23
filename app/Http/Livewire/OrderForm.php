<?php

namespace App\Http\Livewire;

use App\Countries;
use App\Notifications\NewQuoteRequestAdminNotification;
use App\Notifications\NewQuoteRequestNotification;
use App\Ports;
use App\Products;
use App\Quote;
use App\User;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

// use Livewire\Component;

class OrderForm extends BaseComponent
{
    use WithFileUploads;

    public $countries;
    public $productOrigins;
    public $ports;
    public $selectedOrigin;
    public $selectedPort;
    public $selectedCountry;
    public $selectedCountryName;
    public $products;
    public $selectedProductIDs;
    public $selectedPaymentType;
    public $paymentTypes;
    public $paymentMethods;
    public $selectedPaymentMethod;
    public $quantity;
    public $isBroker;
    public $noPortsAvailable;
    public $termsAndConditions;
    public $extraInformation;
    public $supportingDocument;
    public $name;
    public $phone;
    public $address;
    public $email;
    public $hasCommission;
    public $commission;
    public $isMultiRequest;
    public $selectedProductOrigins;
    public $selectedProductQuantities;
    public $errors;
    public $prices;


    ///TODO remove this
    public $submittedData = false;

    //validation rules
    protected $rules = [
                'selectedPaymentType' => 'required',
                'selectedPaymentMethod' => 'required',
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required|email',
                'address' => 'required'
    ];

    protected $messages =[

    ];

    protected $listeners=["has-commission-update"=>"hasCommissionUpdated"];

    public function mount()
    {
        $this->products = array();
        if (session()->get("products")!=null) {
            foreach (session()->get("products") as $product) {
                array_push($this->products, $product);
            }
        } else {
            $this->redirect("browse-inventory");
        }

        $this->selectedProductOrigins = array();
        $this->selectedProductQuantities = array();
        $this->selectedProductIDs = array() ;
        $this->hasCommission = array();
        $this->commission  = array();
        $this->prices = array();

        foreach ($this->products as $key => $product) {
            //get origins
            $origins = $this->getProductOrigins($product);
            $this->products[$key]["origins"] = $origins;
            //add default origin
            $this->selectedProductOrigins[$key] = $origins[0]->code;
            array_push($this->selectedProductIDs, $product["id"]);
            $this->hasCommission[$key] =false;
            $this->commission[$key] = 0;
            $this->prices[$key] = $product["price"];

            //set quantity
            $this->selectedProductQuantities[$key] ="";



            //set validation rules
        }



        // /load defaults
        $this->countries = Countries::all();
        $this->selectedCountry = $this->countries[0]->code;
        $this->ports= $this->countries[0]->ports;
        $this->selectedPort = $this->ports[0]->id;
        // //get list of origins

        // $this->products = Products::find(1);
        $this->paymentTypes = ["CIF", "CNF", "DDP", "EX-WORKS"];
        $this->selectedPaymentType = "CNF";
        $this->paymentMethods = ["Bank Transfer"];
        $this->selectedPaymentMethod = "Bank Transfer";
        $this->noPortsAvailable = false;
    }



    public function render()
    {
        return view('livewire.order-form');
    }







    public function submit()
    {
        foreach ($this->hasCommission as $key => $hasCommission) {
            if ($hasCommission) {
                $this->rules["commission.".$key] = 'required|numeric|min:1';
                $this->messages["commission.".$key."required"] = 'A commision fee is required';
                $this->messages["commission.".$key."min"] = 'Commission must be at least 1';
            }
        }

        foreach ($this->selectedProductQuantities as $key => $quantity) {
            $this->rules['selectedProductQuantities.'.$key] = 'required|numeric|min:1';
            $this->messages['selectedProductQuantities.'.$key.'.required'] = 'Quantity is required';
            $this->messages['selectedProductQuantities.'.$key.'.min'] = 'Quantity must be at least 1';
        }



        $this->validate($this->rules, $this->messages);



        // ///create qoute
        $quote = $this->prepareQuote();

        // ///create notification
    }



    ///Generates random quote number

    public function getProductOrigins($product)
    {
        $productOriginList = [];
        $product = new Products($product);

        $origins = explode(",", $product->origin);
        foreach ($origins as $key=>$value) {
            $origin = Countries::where(
                'code',
                trim($value)
            )->first();
            array_push($productOriginList, $origin);
        }

        return $productOriginList;
    }



    private function prepareQuote()
    {
        $newQuote = [
            "number" => $this->generateQuoteNumber(),
            "product_ids" => implode(",", $this->selectedProductIDs),
            "user_id" => auth()->user()->id,
            "destination_id" => $this->selectedPort,
            "origin_ids" => implode(",", $this->selectedProductOrigins),
            "quantities" => implode(",", $this->selectedProductQuantities),
            "prices" => implode(",", $this->prices),
            "commission" => implode(",", $this->commission),
            "extra_instructions" => $this->extraInformation,
            "notify_name" => $this->name,
            "phone" => $this->phone,
            "email" => $this->email,
            "address" => $this->address,
            "current_status"=>"Processing request",
            "payment_type" => $this->selectedPaymentType,
            "payment_method" => $this->selectedPaymentMethod
        ];



        ///TODO: mail quote request to user
        ///TODO;
        ///create notification
        /// redirect to pending
        ///TODO: mail quote request to admin
        $justCreatedQuote = Quote::create($newQuote);
        // $justCreatedQuote = Quote::where('number', $newQuote["number"])->get()->first();
        //notify user of new quote

        $user = User::find(auth()->user()->id);
        $admin = User::find(1);
       
        $user->notify(new NewQuoteRequestNotification(auth()->user(), $justCreatedQuote));
        $admin->notify(new NewQuoteRequestAdminNotification($admin, $user, $justCreatedQuote));
        

        ///clear products session
        session()->remove('products');

        $this->redirect(route('view-quote', $newQuote["number"]));
    }

    public function generateQuoteNumber($length = 8)
    {
        // return substr(str_shuffle(str_repeat($x = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
        return  substr(md5(time() . rand()), 0, 10);
    }

    public function updatedSelectedCountry()
    {
        $ports = Ports::where('country_code', $this->selectedCountry)->get()->toArray();
        if (empty($ports)) {
            $this->noPortsAvailable = true;

            $this->selectedPort = $this->selectedCountry;
        } else {
            $this->ports = $ports;
            $this->noPortsAvailable = false;
        }
    }

    public function updatedSelectedPaymentType()
    {
        // $this->showModal('success', 'Method Changed', 'Your Method changed');
        // $this->showAlert();
    }

    



    public function hasCommissionUpdated($key)
    {
        $this->hasCommission[$key] = !$this->hasCommission[$key];
    }

    public function joinExclusiveProgram()
    {
        $this->redirect("/exclusive");
    }
}