<?php

namespace App\Http\Livewire;

use App\Countries;
use App\ExclusiveDistributor;
use App\ExclusivePackage;
use App\Notifications\NewDistributorRequestNotification;
use App\Notifications\NewExclusiveDistributorNotification;
use App\Products;
use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class Exclusive extends Component
{
    public function render()
    {
        return view('livewire.exclusive');
    }

    use WithPagination;

    public $query;
    public $products;
    public $isProductSelected;
    public $selectedProductID;
    public $packages;
    public $selectedPackage;
    public $isPackageSelected;
    public $selectedProduct;
    public $countries;
    public $paymentMethods;
    public $selectedPaymentMethod;
    public $selectedCountry;
    public $companyName;
    public $phone;
    public $termsAndConditions;
    public $completed;


    public function mount()
    {
        $this->resetFields();
        $this->products =  Products::all();
        $this->packages = ExclusivePackage::all();
        $this->countries = Countries::all();
        $this->selectedCountry = $this->countries[0]->name;

        $this->isPackageSelected = false;
        $this->termsAndConditions = false;
        $this->completed = false;
        $this->isProductSelected=false;
        $this->paymentMethods = ["T/T - Bank Transfer"];
        $this->selectedPaymentMethod = "T/T - Bank Transfer";
    }
    
    public function submit()
    {
        $newExclusiveDistributor =[
            "request_number"=>$this->generateDistributorNumber(),
            "user_id"=>auth()->user()->id,
            "product_name"=>$this->selectedProduct["name"],
            "package_name"=>$this->selectedPackage["name"],
            "package_cost"=>$this->selectedPackage["cost"],
            "country_name"=>$this->selectedCountry,
            "company_name"=>$this->companyName,
            "phone"=>$this->phone,
            "payment_method"=>$this->selectedPaymentMethod
        ];

        $createdDistributor = ExclusiveDistributor::create($newExclusiveDistributor);
        $user = User::find(auth()->user()->id);
        $admin = User::find(1);
        
        $user->notify(new NewDistributorRequestNotification($user, $createdDistributor));
        $admin->notify(new NewExclusiveDistributorNotification($user, $createdDistributor));
        $this->completed = true;
    }


    public function resetFields()
    {
        $this->query = '';
    }
    public function updatedQuery()
    {
        if (!empty($this->query)) {
            $this->products = Products::where('name', 'like', '%' . $this->query . '%')
                ->get()
                ->toArray();
        } else {
            $this->resetFields();
        }
    }

    public function becomeDistributorForProduct($selectedProduct)
    {
        $this->selectedProduct = $selectedProduct;
        $this->isProductSelected = true;
    }

    public function selectPackage($selectedPackage)
    {
        $this->selectedPackage = $selectedPackage;
        $this->isPackageSelected = true;
    }

    public function generateDistributorNumber($length = 8)
    {
        // return substr(str_shuffle(str_repeat($x = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
        return  substr(md5(time() . rand()), 0, 10);
    }
}