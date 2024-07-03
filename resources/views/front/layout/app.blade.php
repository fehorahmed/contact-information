<!DOCTYPE html>
<html lang="en">
@php
    $setting = \App\Models\Setting::first();
@endphp

<head>
    <meta charset="utf-8">
    <title>
        @if ($setting && $setting->name)
            {{ $setting->name }}
        @else
            Landing Page | Hyper - Responsive Bootstrap 5 Admin Dashboard
        @endif
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <!-- App favicon -->
    @if ($setting && $setting->logo)
        <link rel="shortcut icon" href="{{ asset($setting->logo ?? '') }}">
    @else
        <link rel="shortcut icon" href="assets/images/favicon.ico">
    @endif
    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">

</head>

<body class="loading" data-layout-config='{"darkMode":false}'>

    <!-- NAVBAR START -->
    <nav class="navbar navbar-expand-lg py-lg-3 navbar-dark" style="background-color: #2c8ef8;">
        @include('front.layout.navbar')
    </nav>
    <!-- NAVBAR END -->

    <!-- START HERO -->
    @yield('content')

    <!-- END CONTACT -->

    <!-- START FOOTER -->
    <footer class="bg-dark py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    @if ($setting && $setting->logo)
                        <img src="{{ asset($setting->logo ?? '') }}" alt="" class="logo-dark" height="50">
                    @else
                        <img src="assets/images/logo.png" alt="" class="logo-dark" height="18">
                    @endif
                    {{-- <img src="assets/images/logo.png" alt="" class="logo-dark" height="18"> --}}
                    <p class="text-muted mt-4">Hyper makes it easier to build better websites with
                        <br> great speed. Save hundreds of hours of design
                        <br> and development by using it.
                    </p>

                    <ul class="social-list list-inline mt-3">
                        <li class="list-inline-item text-center">
                            <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i
                                    class="mdi mdi-facebook"></i></a>
                        </li>
                        <li class="list-inline-item text-center">
                            <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i
                                    class="mdi mdi-google"></i></a>
                        </li>
                        <li class="list-inline-item text-center">
                            <a href="javascript: void(0);" class="social-list-item border-info text-info"><i
                                    class="mdi mdi-twitter"></i></a>
                        </li>
                        <li class="list-inline-item text-center">
                            <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i
                                    class="mdi mdi-github"></i></a>
                        </li>
                    </ul>

                </div>

                <div class="col-lg-2 mt-3 mt-lg-0">
                    <h5 class="text-light">Company</h5>

                    <ul class="list-unstyled ps-0 mb-0 mt-3">
                        <li class="mt-2"><a href="javascript: void(0);" class="text-muted">About Us</a></li>
                        <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Documentation</a></li>
                        <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Blog</a></li>
                        <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Affiliate Program</a>
                        </li>
                    </ul>

                </div>

                <div class="col-lg-2 mt-3 mt-lg-0">
                    <h5 class="text-light">Apps</h5>

                    <ul class="list-unstyled ps-0 mb-0 mt-3">
                        <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Ecommerce Pages</a></li>
                        <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Email</a></li>
                        <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Social Feed</a></li>
                        <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Projects</a></li>
                        <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Tasks Management</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-2 mt-3 mt-lg-0">
                    <h5 class="text-light">Discover</h5>

                    <ul class="list-unstyled ps-0 mb-0 mt-3">
                        <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Help Center</a></li>
                        <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Our Products</a></li>
                        <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Privacy</a></li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="mt-5">
                        <p class="text-muted mt-4 text-center mb-0">© 2018 - 2021 Hyper. Design and coded by
                            Coderthemes</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- END FOOTER -->

    <!-- bundle -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

</body>

</html>
