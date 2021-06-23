<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ViewOrders extends Component
{
    public $currentOrder;

    public function render()
    {
        return view('livewire.view-order');
    }

    public function mount($order)
    {
        $this->currentOrder = $order;
    }
}