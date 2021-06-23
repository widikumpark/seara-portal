<?php

namespace App\Http\Livewire;

use App\Documents;
use App\Products;
use App\Quote;
use League\CommonMark\Block\Element\Document;
use Livewire\Component;

class ViewQuote extends BaseComponent
{
    public $currentQuote;
    public $invalidQuote;
    public $isOrder;
    public $products;
    public $multiOrigin;
    public $quoteDetails;
    public $prices;
    public $documents;


    protected $listeners = ["orderQuote"];

    public function render()
    {
        return view('livewire.view-quote');
    }

    public function mount($quoteNumber)
    {
        $quotes = Quote::where('number', $quoteNumber)->get();
        $this->products = array();
        $this->documents = array();
        if (count($quotes)===0) {
            $this->invalidQuote = true;
        } else {
            $this->currentQuote = $quotes[0];
            $this->quoteDetails = $this->currentQuote->getQuoteDetails();
            foreach ($this->quoteDetails["prices"] as $key=>$price) {
                $this->prices[$key] = $price;
            }

            $quoteDocuments = Documents::where("quote_id", $this->currentQuote->number)->orderByDesc("created_at")->get();
            if ($quoteDocuments->count() > 0) {
                $this->documents = $quoteDocuments;
            }
        }
    }

    public function convertToOrder($id)
    {
        $this->showConfirmation("info", "Place Order for " . $this->currentQuote->number, "You are about to place an order for " . $this->currentQuote->number . ". An order invoice will be available after confirmation. ", "Proceed", "orderQuote");
    }



    public function orderQuote()
    {
        $this->currentQuote->status = Quote::ORDER_PROCESSING;
        $this->currentQuote->save();
        ///TODO: flash message of succesful order
        session()->flash('message', 'Your order #'.$this->currentQuote->number .' is currently being processed');
        // $this->showModal("success", "Order Placed", "your order has been placed" . $this->currentQuote->number);
        redirect(route("order-processing"));
    }

    public function contactSupport()
    {
        redirect()->route("support");
    }
}