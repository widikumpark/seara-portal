<?php

namespace App\Http\Livewire;

use App\Quote;
use Livewire\Component;

class OrderShipped extends Component
{

    public $quotes;
    public function render()
    {
        return view('livewire.order-shipped');
    }


    public function mount()
    {
        $this->quotes = Quote::where([
            ['status', '=', Quote::ORDERS_SHIPPED],
            ['user_id', "=", auth()->user()->id]
        ])->get();
    }
}
