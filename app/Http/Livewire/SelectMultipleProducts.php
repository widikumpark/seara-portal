<?php

namespace App\Http\Livewire;

use App\Products;
use Livewire\Component;

class SelectMultipleProducts extends BaseComponent
{
    public $selectedProducts =array();
    public $selectedProductIDs = array();
    public $initialProductIsSet = false;
    public $hasSelectedProducts = false;
    public $selectedProductsCount;
    public $query;
    public $products;

    protected $listeners = ['addToList'=>'addToList', "removeFromList"=>"removeFromList", "countSelectedProducts"=>"getSelectedProductsCount"];

    public function render()
    {
        return view('livewire.select-multiple-products');
    }

    public function mount()
    {
        ///clear search fields
        $this->resetFields();
        $this->products =  Products::all();
        $this->selectedProductsCount = 0;

        if (session()->get("products") != null) {
            $this->initialProductIsSet = true;
            $this->hasSelectedProducts = true;
            $products = session()->get("products");
            // dd($product);
            foreach ($products as $key=>$product) {
                // array_push($this->selectedProducts, $product);
                // array_push($this->selectedProductIDs, $product->id);
                $this->selectedProducts[$key] = $product;
                $this->selectedProductIDs[$key] = $product["id"];
            }
        }

        $this->getSelectedProductsCount();
    }

    public function getSelectedProductsCount()
    {
        $this->selectedProductsCount = count($this->selectedProducts);
        if ($this->selectedProductsCount==0) {
            $this->hasSelectedProducts = false;
        } else {
            $this->hasSelectedProducts = true;
        }
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

    public function addToList($product)
    {
        if (!in_array($product["id"], $this->selectedProductIDs)) {
            array_push($this->selectedProducts, $product);
            array_push($this->selectedProductIDs, $product["id"]);
            //show success alert
            $this->showAlert("success", $product["name"]." has been added");
        } else {
            $this->showAlert("danger", $product["name"]." in list already");
        }
        //update session
        
        //update product count
        $this->getSelectedProductsCount();
        $this->updateSessionProducts();
        // die(print_r($this->selectedProductIDs));
    }

    public function removeFromList($product)
    {
        if (in_array($product["id"], $this->selectedProductIDs)) {
            unset($this->selectedProducts[array_search($product, $this->selectedProducts)]);
            unset($this->selectedProductIDs[array_search($product["id"], $this->selectedProductIDs)]);
            //show success alert
            $this->showAlert("success", $product["name"]." has been removed");
        } else {
            $this->showAlert("danger", $product["name"]." not in list");
        }
        
        //update product count
        $this->getSelectedProductsCount();
        $this->updateSessionProducts();
    }

    public function requestQuote()
    {
        if ($this->selectedProductsCount > 0) {
            $this->updateSessionProducts();
        }

        $this->redirect("order-form");
    }

    private function updateSessionProducts()
    {
        session()->put("products", $this->selectedProducts);
    }
}