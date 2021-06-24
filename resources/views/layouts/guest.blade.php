<!DOCTYPE html>
<html lang="en">

<head>
    <title>SEARA E-Portal - @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}"><img class="img-fluid" src="images/logo.png"
                    alt="SEARA E-Portal"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                    {{-- <li class="nav-item"><a href="{{ route('about') }}"
                            class="nav-link">About</a></li> --}}
                    <li class="nav-item"><a href="{{ route('services') }}" class="nav-link">Services</a></li>
                    <li class="nav-item"><a href="{{ route('how-it-works') }}" class="nav-link">How It Works</a></li>
                    {{-- <li class="nav-item"><a href="{{ route('contact') }}"
                            class="nav-link">Contact</a></li> --}}
                    <li class="nav-item"><a href="{{ route('login') }}" class="btn btn-primary nav-link">Login</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    @yield('content')

    <footer class="ftco-footer ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-sm-12 col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2 logo"><a href="{{ route('home') }}"><img class="img-fluid"
                                    src="images/logo-white.png" alt="SEARA E-Portal"></a></h2>
                        <p>SEARA E-Portal - Place & Manage Orders, Manage Invoices and Documents, Inventory Manager
                        </p>
                        <ul class="ftco-footer-social list-unstyled mt-5">
                            <li class="ftco-animate"><a href="https://twitter.com/Cargill"><span
                                        class="fa fa-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="https://www.facebook.com/Cargill/"><span
                                        class="fa fa-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="https://www.instagram.com/cargill/"><span
                                        class="fa fa-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-4">
                        <h2 class="ftco-heading-2">Explore</h2>
                        <ul class="list-unstyled">
                            {{-- <li><a href="{{ route('about') }}"><span
                                        class="fa fa-chevron-right mr-2"></span>About</a>
                            </li> --}}
                            {{-- <li><a href="{{ route('contact') }}"><span
                                        class="fa fa-chevron-right mr-2"></span>Contact</a></li> --}}
                            <li><a href="{{ route('how-it-works') }}"><span
                                        class="fa fa-chevron-right mr-2"></span>How
                                    It Works</a></li>
                            <li><a href="{{ route('home') }}"><span class="fa fa-chevron-right mr-2"></span>Cargill
                                    International</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-4">
                        <h2 class="ftco-heading-2">Legal</h2>
                        <ul class="list-unstyled">
                            <li><a href="https://careers.cargill.com/"><span
                                        class="fa fa-chevron-right mr-2"></span>Join us</a></li>
                            <li><a href="https://www.cargill.com/news"><span
                                        class="fa fa-chevron-right mr-2"></span>News</a></li>
                            <li><a href="https://www.cargill.com/page/privacy"><span
                                        class="fa fa-chevron-right mr-2"></span>Privacy &amp; Policy</a></li>
                            <li><a href="https://www.cargill.com/animal-nutrition/terms-and-conditions"><span
                                        class="fa fa-chevron-right mr-2"></span>Term &amp; Conditions</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-12 col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Question?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon fa fa-map marker"></span><span class="text"> California,
                                        USA</span></li>

                                <li><a href="#"><span class="icon fa fa-paper-plane pr-4"></span><span
                                            class="text">{{ config('app.contact_email') }}</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());

                        </script> All rights reserved | Cargill
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" />
        </svg></div>


    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
    </script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>



</body>

</html>
