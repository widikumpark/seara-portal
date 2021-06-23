<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Payments extends Model
{
    //
    use Notifiable;
    protected $guarded =[];

    public function order(){
        return $this->belongsTo('App\Quote',  'order_number', 'number');

    }
}