<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ViewQuotes extends BaseComponent
{
    public function render()
    {
        return view('livewire.view-quotes');
    }



    public function convertOrder()
    {
        $this->showModal("info", "Order Conff", "Cnvertiing to order");
    }
}