<?php

namespace App\Http\Livewire;

use App\Countries;
use App\Products as Products;
use Illuminate\Session\SessionManager;
use Livewire\Component;

class ViewProduct extends BaseComponent
{
    public $product;
    public $origin;
    public $multipleOrigin;
    public $description_lines;
    public $specification_lines;


    public function render()
    {
        return view('livewire.view-product');
    }

    public function mount($id)
    {
        $this->product = Products::find($id);

        session()->put('product', $this->product);

        //get list of origins
        $this->origin = [];
        $origins = explode(",", $this->product->origin);
        $this->description_lines = explode("<br/>", $this->product->desc);
        $this->specification_lines = explode("<br/>", $this->product->specification);
        foreach ($origins as $key=>$value) {
            $origin = Countries::where(
                'code',
                trim($value)
            )->first()->name;
            array_push($this->origin, $origin);
        }
    }


    public function orderProduct()
    {
        // ///TODO add to session
        // // $this->redirect(route('choose-order-type'));
        // $this->showConfirmation("success", "Multiple Products", "Do you want to add request quote for multiple products? ", "Multiple Products", "[]", 'multiple-products');
        session()->put("products", [$this->product]);
        $this->redirect(route('select-multi-products'));
    }
}