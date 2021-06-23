@extends('layouts.guest')
@section('title', 'Services - Place & Manage Orders, Manage Invoices and Documents, Inventory Manager')

@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <h1 class="mb-3 bread">Services</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                    class="fa fa-chevron-right"></i></a></span> <span>Services <i
                                class="fa fa-chevron-right"></i></span></p>
                </div>
            </div>
        </div>
    </section>

    @include('partials.services-section')
    @include('partials.why-choose-us-section')
@endsection
