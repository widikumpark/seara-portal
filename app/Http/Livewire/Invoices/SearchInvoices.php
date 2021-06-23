<?php

namespace App\Http\Livewire\Invoices;

use Livewire\Component;

class SearchInvoices extends Component
{

    public $options;
    public $expiresAt;
    public $formattedDate;


    protected $casts = [
        'options' => 'collection',
        'expiresAt' => 'date',
        'formattedDate' => 'date:m-d-y'
    ];

    public function render()
    {
        return view('livewire.invoices.search-invoices');
    }
    
    public function getUniqueOptions()
    {
        return $this->options->unique();
    }


    public function mount()
    {
        $this->options = collect(['foo', 'bar', 'bar']);
        $this->expiresAt = \Carbon\Carbon::parse('tomorrow');
        $this->formattedDate = \Carbon\Carbon::parse('today');
    }

    public function getExpirationDateForHumans()
    {
        return $this->expiresAt->format('m/d/Y');
    }
}
