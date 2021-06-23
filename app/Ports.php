<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ports extends Model
{
    //

    protected $guarded = [];


    public function country()
    {
        return $this->belongsTo('App\Countries',  'country_code', 'code');
    }
}