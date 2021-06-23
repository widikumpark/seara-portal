<?php

namespace App\Http\Livewire;

use App\Notifications\NewPaymentSubmissionNotification;
use App\Notifications\NewQuoteRequestAdminNotification;
use App\Notifications\PaymentAddedNotification;
use App\Payments;
use App\Quote;
use App\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddPayment extends BaseComponent
{
    use WithFileUploads;

    public $paymentReciept;
    public $selectedOrderNumber;
    public $orders;
    public $extraInformation;


    public function render()
    {
        return view('livewire.add-payment');
    }

    public function mount()
    {
        $this->orders = Quote::where(
            'user_id',
            auth()->user()->id
        )->get();

        if (count($this->orders) > 0) {
            $this->selectedOrderNumber = $this->orders[0]->number;
        }
    }

    public function placeOrder()
    {
        redirect(route("place-order"));
    }

    public function contactSupport()
    {
        redirect(route("support"));
    }

    public function updatePaymentReceipt()
    {
        $this->validate(['paymentReciept' => 'file|mimes:png,jpg,jpeg,pdf,xls,doc,docx']);
    }

    public function navigateToBrowseInventory()
    {
        $this->redirect("/browse-inventory");
    }

    public function save()
    {
        $this->validate(['paymentReciept' => 'required|file|mimes:png,jpg,jpeg,pdf,xls,doc,docx', 'selectedOrderNumber' => 'required']);
        $receipt = $this->paymentReciept->store('receipts');
        $newPayment = [
            'receipt' => $receipt,
            'user_id' => auth()->user()->id,
            'order_number' => $this->selectedOrderNumber,
            'extra_information' => $this->extraInformation,
        ];

        $payment =  Payments::create($newPayment);
        $user = User::find(auth()->user()->id);
        $admin = User::find(1);
        $user->notify(new PaymentAddedNotification($user, $payment));
        $admin->notify(new NewPaymentSubmissionNotification($user, $payment));

       
       
        session()->flash('message', 'Your receipt for order #' . $this->selectedOrderNumber . " has been submitted. You will be notified upon confirmation of payment.");

        //TODO: add notification of new receipt submitted
        redirect(route("payments"));
    }
}