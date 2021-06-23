<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Quote extends Model
{
    use Notifiable;

    
    //Quote/Order status
    public const QUOTE_VALID =1;
    public const QOUTE_EXPIRED=2;
    public const ORDER_PROCESSING=3;
    public const ORDERS_PENDING_PAYMENT=4;
    public const ORDERS_PAID =5;
    public const ORDERS_SHIPPED =6;
    public const ORDERS_CANCELLED =7;
    public const QUOTE_REQUEST=8;

    protected $guarded = [];

   

    public function getQuoteDetails()
    {
        $quote = $this->attributes;

        $products = array();
        $prices = array();
        $quantities = array();
        $origins = array();
        $commissions = array();

        foreach (explode(",", $quote["quantities"]) as $key => $quantity) {
            $quantities[$key] = $quantity;
        }
        foreach (explode(",", $quote["prices"]) as $key => $price) {
            $prices[$key] = $price;
        }
        foreach (explode(",", $quote["commission"]) as $key => $commission) {
            $commissions[$key] = $commission;
        }

        foreach (explode(",", $quote["product_ids"]) as $key => $productID) {
            $products[$key] = Products::find($productID);
        }
        foreach (explode(",", $quote["origin_ids"]) as $key => $originID) {
            $origin = Countries::where('code', $originID)->first();
            $origins[$key] = $origin->name;
        }


        return ["quote" => $quote, "quantities" => $quantities, "prices"=>$prices, "products"=>$products, "origins"=>$origins, "commissions"=>$commissions];
    }

    public function buyer()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function origin()
    {
        return $this->belongsTo('App\Countries', 'origin_id', 'code');
    }

    public function destinationPort()
    {
        return $this->belongsTo('App\Ports', 'destination_id', 'id');
    }

    public function documents()
    {
        return $this->hasMany('App\Documents', 'number', 'quote_id');
    }
}