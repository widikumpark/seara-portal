<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view("/test", 'mails.quote-request');
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::middleware("auth")->group(function () {
    Route::livewire("/", 'home')->layout('layouts.dashboard_main')->name('dashboard');
    Route::livewire("/register", 'home')->layout('layouts.dashboard_main')->name('dashboard');
    Route::livewire("/dashboard", 'home')->layout('layouts.dashboard_main')->name('dashboard');
    Route::livewire("/browse-inventory", 'place-order')->layout('layouts.dashboard_main')->name('browse-inventory');

    Route::livewire("/invoices", 'invoices')->layout('layouts.dashboard_main')->name('invoices');
    Route::livewire("/quotes", 'quotes')->layout('layouts.dashboard_main')->name('quotes');
    Route::livewire("/order-processing", 'order-processing')->layout('layouts.dashboard_main')->name('order-processing');
    Route::livewire("/order-pending-payment", 'order-pending-payment')->layout('layouts.dashboard_main')->name('order-pending-payment');
    Route::livewire("/order-paid", 'order-paid')->layout('layouts.dashboard_main')->name('order-paid');
    Route::livewire("/order-shipped", 'order-shipped')->layout('layouts.dashboard_main')->name('order-shipped');
    Route::livewire("/order-cancelled", 'order-cancelled')->layout('layouts.dashboard_main')->name('order-cancelled');
    Route::livewire("/payments", 'payments')->layout('layouts.dashboard_main')->name('payments');
    Route::livewire("/documents", 'documents')->layout('layouts.dashboard_main')->name('documents');
    Route::livewire("/notifications", 'notifications')->layout('layouts.dashboard_main')->name('notifications');
    Route::livewire("/view-product/{id}", 'view-product')->layout('layouts.dashboard_main')->name('view-product');
    Route::livewire("/order-form", 'order-form')->layout('layouts.dashboard_main')->name('order-form');
    Route::livewire("/choose-order-type", 'choose-order-type')->layout('layouts.dashboard_main')->name('choose-order-type');
    Route::livewire("/select-multi-products", 'select-multiple-products')->layout('layouts.dashboard_main')->name('select-multi-products');
    Route::livewire("/view-invoice", 'view-invoice')->layout('layouts.dashboard_main')->name('view-invoice');
    Route::livewire("/view-orders", 'view-orders')->layout('layouts.dashboard_main')->name('view-orders');
    Route::livewire("/view-quotes", 'view-quotes')->layout('layouts.dashboard_main')->name('view-quotes');
    Route::livewire("/add-payment", 'add-payment')->layout('layouts.dashboard_main')->name('add-payment');
    Route::livewire("/support", 'support')->layout('layouts.dashboard_main')->name('support');
    Route::livewire("/exclusive", 'exclusive')->layout('layouts.dashboard_main')->name('exclusive');
    Route::livewire("/ticket", 'ticket')->layout('layouts.dashboard_main')->name('ticket');
    Route::livewire("/view-ticket", 'ticket-details')->layout('layouts.dashboard_main')->name('ticket-details');
    Route::livewire("/profile", 'profile')->layout('layouts.dashboard_main')->name('profile');
    Route::livewire("/view-quote/{quoteNumber}", 'view-quote')->layout('layouts.dashboard_main')->name('view-quote');
    Route::livewire("/view-ticket/{ticketNumber}", 'ticket-details')->layout('layouts.dashboard_main')->name('view-ticket');
    Route::get('download/{path}', function ($path) {
        return Illuminate\Support\Facades\Storage::download($path);
    })->where('path', '.*')->middleware("auth")->name('download');
    Route::livewire("/faq", 'faq')->layout('layouts.dashboard_main')->name('faq');
});




///guest routes
// Route::get('/', 'GuestController@home')->name("home");
// Route::get("/about", 'GuestController@about')->name("about");
// Route::get("/how-it-works", 'GuestController@howItWorks')->name("how-it-works");
// Route::get("/services", 'GuestController@services')->name("services");
// Route::get("/contact", 'GuestController@contact')->name("contact");
// Route::any('{slug}', 'DashboardController@home')->middleware("auth");


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});