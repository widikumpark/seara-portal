<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    protected $fillable = [""];



    public function ports()
    {
        return $this->hasMany('App\Ports',  'country_code', 'code');
    }
}