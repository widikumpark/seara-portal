<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('guest');  
    }


    public function home(){
        return view('home');   
    }
    public function about(){
        return view('about');   
    }
    public function services(){
        return view('services');   
    }
    public function howItWorks(){
        return view('how-it-works');   
    }
    public function contact(){
        return view('contact');   
    }


}
