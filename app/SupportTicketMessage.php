<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupportTicketMessage extends Model
{
    //

    protected $guarded = [];

    public function supportTicket()
    {
        return $this->belongsTo('App\SupportTicket',  'ticket_number', 'ticket_number');
    }
}
