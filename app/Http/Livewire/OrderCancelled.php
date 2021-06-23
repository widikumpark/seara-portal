<?php

namespace App\Http\Livewire;

use App\Quote;
use Livewire\Component;

class OrderCancelled extends BaseComponent
{
    public $quotes;

    public function render()
    {
        return view('livewire.order-cancelled');
    }
    public function mount()
    {
        $this->quotes = Quote::where([
            ['status', '=', Quote::ORDERS_CANCELLED],
            ['user_id', "=", auth()->user()->id]
        ])->get();
    }
}