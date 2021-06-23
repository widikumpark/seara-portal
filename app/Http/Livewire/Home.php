<?php

namespace App\Http\Livewire;

use App\Documents;
use App\Products;
use App\Quote;
use Livewire\Component;

class Home extends Component
{
    public $total_quotes;
    public $total_orders;
    public $pending_payments;
    public $documents_count;
    public $query;
    public $products;
    public $user;


    public function render()
    {
        return view('livewire.home');
    }

    public function viewProduct($id)
    {
        $this->redirect(route('view-product', $id));
    }

    public function updatedQuery()
    {
        if (!empty($this->query)) {
            $this->products = Products::where('name', 'like', '%' . $this->query . '%')
                ->get()
                ->toArray();
        } else {
            $this->resetFields();
        }
    }

    public function resetFields()
    {
        $this->query = '';
    }
    public function mount()
    {
        $this->resetFields();
        $this->products =  Products::all();
        $this->user = auth()->user();
        $this->total_quotes = Quote::where(
            'user_id',
            auth()->user()->id
        )->get();


        if (count($this->total_quotes) > 0) {
            $documents = array();

            foreach ($this->total_quotes as $key=> $quote) {
                $quoteDocuments = Documents::where("quote_id", $quote->number)->get();

                if ($quoteDocuments->count() > 0) {
                    array_push($documents, $quote->documents);
                }
            }


            $this->documents_count = count($documents);
        } else {
            $this->documents_count =0;
        }
    }
}