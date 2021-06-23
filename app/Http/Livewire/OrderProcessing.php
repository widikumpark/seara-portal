<?php

namespace App\Http\Livewire;

use App\Quote;
use Livewire\Component;

class OrderProcessing extends BaseComponent
{

    public $quotes;
    
    public function render()
    {
        return view('livewire.order-processing');
    }

    public function mount()
    {
        $this->quotes = Quote::where([
            ['status', '=', Quote::ORDER_PROCESSING],
            ['user_id', "=", auth()->user()->id]
        ])->get();
    }
}
