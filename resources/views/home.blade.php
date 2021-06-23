@extends('layouts.guest')
@section('title', 'Place & Manage Orders, Manage Invoices and Documents, Inventory Manager')

@section('content')


    <div class="hero-wrap" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="overlay-2"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center">
                <div class="col-md-7 ftco-animate d-flex align-items-end">
                    <div class="text w-100">
                        <h1 class="mb-4">Save Your Precious Time &amp; And Order Online.</h1>
                        <p class="mb-4">Our E-Portal will automate your ordering process and help you make best buying
                            decisions.</p>
                        <p><a href="{{ url('/login') }}" class="btn btn-primary py-3 px-4">Get Started</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mouse">
            <a href="#" class="mouse-icon">
                <div class="mouse-wheel"><span class="fa fa-chevron-down"></span></div>
            </a>
        </div>
    </div>

    @include('partials.why-choose-us-section')

    @include('partials.services-section')

    @include('partials.advantages-section')


    @include('partials.testimonials-section')

    @include('partials.how-it-works-section')

    {{--
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Blog</span>
                    <h2>Recent Blog</h2>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md-3 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <div class="text">
                            <a href="blog-single.html" class="block-20 img"
                                style="background-image: url('images/image_1.jpg');">
                            </a>
                            <div class="meta mb-1">
                                <div><a href="#">April 12, 2020</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
                            </div>
                            <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <div class="text">
                            <a href="blog-single.html" class="block-20 img"
                                style="background-image: url('images/image_2.jpg');">
                            </a>
                            <div class="meta mb-1">
                                <div><a href="#">April 12, 2020</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
                            </div>
                            <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <div class="text">
                            <a href="blog-single.html" class="block-20 img"
                                style="background-image: url('images/image_3.jpg');">
                            </a>
                            <div class="meta mb-1">
                                <div><a href="#">April 12, 2020</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
                            </div>
                            <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <div class="text">
                            <a href="blog-single.html" class="block-20 img"
                                style="background-image: url('images/image_4.jpg');">
                            </a>
                            <div class="meta mb-1">
                                <div><a href="#">April 12, 2020</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
                            </div>
                            <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="ftco-section">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center">
                <div class="col-md-7 ftco-animate d-flex align-items-end">
                    <div class="text w-100">
                        <h1 class="mb-4">What are waiting for ? </h1>
                        <p class="mb-4">Get started now and get browse our inventory with thousands of products. <br />
                            Buy now and
                            get quick shipments.
                        </p>
                        <p><a href="{{ url('/login') }}" class="btn btn-primary py-3 px-4">Get Started</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="ftco-appointment ftco-section ftco-no-pt ftco-no-pb img"
        style="background-image: url(images/bg_2.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row d-md-flex justify-content-end">
                <div class="col-md-12 col-lg-6 half p-3 py-5 pl-lg-5 ftco-animate">
                    <h2 class="mb-4">Send a Message &amp; Get in touch!</h2>
                    <form action="#" class="appointment">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                            <select name="" id="" class="form-control">
                                                <option value="">Assistant Purpose</option>
                                                <option value="">Familty Task</option>
                                                <option value="">Online Research</option>
                                                <option value="">Management Task</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="" id="" cols="30" rows="7" class="form-control"
                                        placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" value="Send message" class="btn btn-primary py-3 px-4">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
