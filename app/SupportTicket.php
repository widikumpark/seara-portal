<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
    //

    public const TICKET_TYPE_PAYMENT = 1;
    public const TICKET_TYPE_ORDER = 2;
    public const TICKET_TYPE_DOCUMENTS = 3;
    public const TICKET_TYPE_ACCOUNT = 4;
    public const TICKET_TYPE_OTHERS = 5;

    public const TICKET_STATUS_ACTIVE = 1;
    public const TICKET_STATUS_CLOSED = 2;
    public const TICKET_STATUS_CANCELLED = 3;



    protected $guarded=[];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function messages()
    {
        return $this->hasMany('App\SupportTicketMessage',  'ticket_number', 'ticket_number');
    }

    
}