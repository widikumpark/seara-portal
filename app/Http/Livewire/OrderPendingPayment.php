<?php

namespace App\Http\Livewire;

use App\Quote;
use Livewire\Component;

class OrderPendingPayment extends Component
{
    public $quotes;

    public function render()
    {
        return view('livewire.order-pending-payment');
    }

    public function mount()
    {
        $this->quotes = Quote::where([
            ['status', '=', Quote::ORDERS_PENDING_PAYMENT],
            ['user_id', "=", auth()->user()->id]
        ])->get();
    }
}
