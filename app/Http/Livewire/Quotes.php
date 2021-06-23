<?php

namespace App\Http\Livewire;

use App\Documents;
use App\Quote;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Quotes extends BaseComponent
{
    public $quotes;

    public function render()
    {
        return view('livewire.quotes');
    }

    public function mount()
    {
        $this->quotes = Quote::where(
            'user_id',
            auth()->user()->id
        )->orderByDesc("created_at")->get();



    }
}