<?php

namespace App\Http\Livewire;

use App\SupportTicket;
use App\SupportTicketMessage;
use Illuminate\Database\Console\Migrations\RefreshCommand;
use Livewire\Component;
use Livewire\WithFileUploads;

class TicketDetails extends BaseComponent
{

    use WithFileUploads;

    public $currentTicket;
    public $invalidTicket;
    public $isActive;
    public $messages;
    public $ticketType;
   public $newSupportingDocuments;
   public $newMessage;

    public function render()
    {
        return view('livewire.ticket-details');
    }

    protected $rules = [
        'newMessage' => 'required',
        // 'newTicketSupportingDocuments.*', 'file'
    ];

    protected $listeners=['refreshComponent'=>'$refresh'];

    public function mount($ticketNumber)
    {
        $ticket = SupportTicket::where('ticket_number', $ticketNumber)->get();

        if (count($ticket) === 0) {
            $this->invalidTicket = true;
        } else {
            $this->currentTicket = $ticket[0];
            $this->isActive = $this->currentTicket["status"] == 1 ? true : false;
            switch ($this->currentTicket->type) {
                case SupportTicket::TICKET_TYPE_ACCOUNT:
                    $this->ticketType = "Account Management";
                    break;
                case SupportTicket::TICKET_TYPE_PAYMENT:
                    $this->ticketType = "Payment";
                    break;
                case SupportTicket::TICKET_TYPE_DOCUMENTS:
                    $this->ticketType = "Documents";
                    break;
                case SupportTicket::TICKET_TYPE_OTHERS:
                    $this->ticketType = "Others";
                    break;


                default:
                    $this->ticketType = "Others";
                    break;
            }
        }
    }

    public function submit()
    {
        $this->validate($this->rules);

        $ticketNumber = $this->currentTicket->ticket_number;
        $supportingDocuments = array();

        if($this->newSupportingDocuments){
           
                foreach ($this->newSupportingDocuments as $key => $newSupportingDocument) {
                    $docUrl = $newSupportingDocument->store('supportTickets/' . $ticketNumber);
                    $supportingDocuments[$key] =  $docUrl;
                }
            
    
        }
       

        SupportTicketMessage::create(
            [
            "ticket_number" => $ticketNumber,
            "message" => $this->newMessage,
            "from_user" => true,
            "supporting_docs" => serialize($supportingDocuments)
            ]
        );

        ///TODO add new ticket Notificaton
        session()->flash('message', 'Your message has been created. Ticket Number #' . strtoupper($ticketNumber) . " has been submitted. We will process your ticket within 48 hours.");
       $this->newMessage =  "";
        $this->newSupportingDocuments = "";
        $this->emit("refreshComponent");
        
    }
}
