<?php

namespace App\Http\Livewire;

use App\Documents as AppDocuments;
use App\Quote;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Storage;

use Livewire\Component;

class Documents extends Component
{
    public $documents;


    public function render()
    {
        return view('livewire.documents');
    }

    public function mount()
    {
        $total_quotes = Quote::where("user_id", auth()->user()->id)->get();

        $this->documents = array();
        if (count($total_quotes) > 0) {
            foreach ($total_quotes as $key=> $quote) {
                $quoteDocuments = AppDocuments::where("quote_id", $quote->number)->get();
                if ($quoteDocuments->count() > 0) {
                    array_push($this->documents, $quoteDocuments);
                }
            }
        }
    }

    public function downloadDocument($key)
    {
        $documentUrl = $this->documents[$key]->doc_link;

        //dd($documentUrl);
        // $documentUrl = Storage::url('app/receipts/soya.jpg');
        // return  Storage::download($documentUrl);

        //TODO add gate before download
        // $downloadUrl = Storage::url('app/receipts/soya.jpg');
        // $url = 'receipts/';

        return redirect("download/receipts/{$documentUrl}");


        // response()->download(storage_path('app/receipts/soya.jpg'));

        //return Storage::disk('public')->download(storage_path('soya.jpg'));
        // return response()->streamDownload(function () {
        //     echo 'CSV Contents...';
        // }, 'soyza.jpg');
    }
}