<?php

namespace App\Http\Livewire;

use App\Notifications\NewSupportTicketAdminNotification;
use App\Notifications\NewSupportTicketNotfication;
use App\Notifications\NewSupportTicketNotification;
use App\SupportTicket;
use App\SupportTicketMessage;
use App\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Support extends Component
{
    use WithFileUploads;

    public $newTicketTitle;
    public $newTicketType;
    public $newTicketMessage;
    public $newTicketSupportingDocuments;
    public $ticketTypes;
    public $supportTickets;
    protected $listeners=['refreshComponent'=>'$refresh'];

    public function render()
    {
        return view('livewire.support');
    }

    protected $rules = [
        'newTicketMessage' => 'required',
        'newTicketTitle' => 'required',
        'newTicketSupportingDocuments.*'=>'file'
    ];

    public function submit()
    {
        $this->validate($this->rules);

        $ticketNumber = $this->generateTicketNumber();
        $supportingDocuments = array();

        if (count($this->newTicketSupportingDocuments)) {
            foreach ($this->newTicketSupportingDocuments as $key => $newTicketSupportingDocument) {
                $docUrl = $newTicketSupportingDocument->store('supportTickets/' . $ticketNumber);
                $supportingDocuments[$key] =  $docUrl;
            }
        }

       $supportTicket = SupportTicket::create([
            "ticket_number" => $ticketNumber,
            "user_id" => auth()->user()->id,
            "title" => $this->newTicketTitle,
            "message" => $this->newTicketMessage,
            "type" => $this->newTicketType,
            "supporting_docs" => serialize($supportingDocuments)

        ]);
        

        SupportTicketMessage::create(
            [
            "ticket_number" => $ticketNumber,
            "message" => $this->newTicketMessage,
            "from_user" => true,
            "supporting_docs" => serialize($supportingDocuments)
            ]
        );

        $user = User::find(auth()->user()->id);
        $admin = User::find(1);
        $admin->notify(new NewSupportTicketAdminNotification($user, $supportTicket));
        $user->notify(new NewSupportTicketNotification($user, $supportTicket ));

        ///TODO add new ticket Notificaton
        session()->flash('message', 'Your ticket has been created. Ticket Number #' . strtoupper($ticketNumber) . " has been submitted. We will process your ticket within 48 hours.");
        $this->newTicketTitle = $this->newTicketMessage =  "";
        $this->newTicketSupportingDocuments = array();
        // $this->emit("refreshComponent");
    }

    public function mount()
    {
        $this->ticketTypes = array(

            SupportTicket::TICKET_TYPE_PAYMENT => "Payment",
            SupportTicket::TICKET_TYPE_ORDER => "Order",
            SupportTicket::TICKET_TYPE_DOCUMENTS => "Documents",
            SupportTicket::TICKET_TYPE_ACCOUNT => "Account",
            SupportTicket::TICKET_TYPE_OTHERS => "Others",

        );

        $this->newTicketType = SupportTicket::TICKET_TYPE_PAYMENT ;
        $this->supportTickets = auth()->user()->supportTickets;
        $this->newTicketSupportingDocuments = array();
    }

    public function generateTicketNumber($length = 8)
    {
        // return substr(str_shuffle(str_repeat($x = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
        return  substr(md5(time() . rand()), 0, 10);
    }

    public function viewTicket($key)
    {
        redirect(route('view-ticket', $this->supportTickets[$key]->ticket_number));
    }
}