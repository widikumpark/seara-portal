<?php

namespace App\Http\Livewire;

use App\Payments as AppPayments;
use App\Quote;
use Livewire\Component;

class Payments extends Component
{

    public $payments;
    
    public function render()
    {
        return view('livewire.payments');
    }

    public function mount(){
        $this->payments = AppPayments::where([
            ['user_id', "=", auth()->user()->id]
        ])->get();
    }

    public function submitPayment(){
        redirect(route('add-payment'));
    }
    
    public function contactSupport(){
        redirect(route("support"));
    }
}
