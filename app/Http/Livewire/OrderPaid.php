<?php

namespace App\Http\Livewire;

use App\Quote;
use Livewire\Component;

class OrderPaid extends Component
{

    public $quotes;
    
    public function render()
    {
        return view('livewire.order-paid');
    }

    public function mount()
    {
        $this->quotes = Quote::where([
            ['status', '=', Quote::ORDERS_PAID],
            ['user_id', "=", auth()->user()->id]
        ])->get();
    }
}
