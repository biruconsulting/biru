@php
    $site_setting = DB::table('site_settings')->first();
    $seo_setting = DB::table('seo_settings')->first();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- Title --}}
    <title>{{ $seo_setting->meta_title }}</title>
    {{-- Meta Description --}}
    <meta name="description" content="{{ $seo_setting->meta_description }}" >
    {{-- Meta Keywords --}}
    <meta name="keywords" content="{{ $seo_setting->meta_keywords }}">
    {{-- Meta Author --}}
    <meta name="author" content="{{ $seo_setting->meta_author }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/lib/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/lib/owlcarousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/lib/owlcarousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lib/summernote/summernote-lite.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    @livewireStyles

</head>

<body>
    <!-- header **********************************************************************************************************************
    ********************************************************************************************************************************** -->
    <header class="header" id="top">
        <!-- topbar-menu-area  -->
        <div class="topbar-menu-area">
            <div class="container">
                <ul class="nav justify-content-lg-end justify-content-sm-end justify-content-center">
                    @if(Route::has('login'))
                        @auth
                            @if (Auth::user()->user_type === 'ADM')
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        MY ACCOUNT ({{ strtoupper(Auth::user()->name) }})
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                        <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> &nbsp;Dashboard</a></li>
                                        <li><a class="dropdown-item" href="{{ route('profile') }}"><i class="fas fa-user"></i> &nbsp;My Profile</a></li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> &nbsp;Logout</a></li>

                                        <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                            @csrf
                                        </form>
                                    </ul>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        MY ACCOUNT ({{ strtoupper(Auth::user()->name) }})
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                        <li><a class="dropdown-item" href="{{ route('profile') }}"><i class="fas fa-user"></i> &nbsp;My Profile</a></li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> &nbsp;Logout</a></li>

                                        <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                            @csrf
                                        </form>
                                    </ul>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> &nbsp;REGISTER</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> &nbsp;SIGNIN</a>
                            </li>
                        @endauth
                    @endif
                </ul>
            </div>
        </div>

        <!-- mid-section - logo - search bar - post button -->
        <div class="container">
            <div class="header-mid-section">
                <div class="row">
                    <div class="d-flex justify-content-lg-start justify-content-center col-lg-3 col-12 left-mid-section">   
                        <img src="{{ asset('storage/'. $site_setting->site_logo) }}" alt="Logo" height="50">
                    </div>
                    <div class="d-flex justify-content-lg-center justify-content-center col-lg-6 col-12 center-mid-section">
                        @livewire('home.header-search-component')
                    </div>
                    <div class="d-flex justify-content-lg-end justify-content-center col-lg-3 col-12 right-mid-section">
                        <a href="{{ route('post_ad') }}" class="btn-grad"><b>POST YOUR AD</b></a>
                    </div>
                </div>
            </div>
        </div>


        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}"><i class="fas fa-home"></i> &nbsp;HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('seller_ad') }}">SELLER AD</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('buyer_ad') }}">BUYER AD</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact_us') }}">CONTACT US</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- header - end -->

    <!-- body *******************************************************************************************************************
    ***************************************************************************************************************************** -->
    <div class="main">
        {{ $slot }}
    </div>
    <!-- body - end -->


    <!-- footer *******************************************************************************************************************
    ***************************************************************************************************************************** -->


    <!-- Footer -->
    <footer class="footer">
        <div class="container text-center text-md-start">
            <div class="row">
                <div class="footer-aboutus col-md-6 mt-md-0 mt-3">
                    <h5 class="text-uppercase"><span class="footer-aboutus-us">About</span> US</h5>
                    @if ($site_setting->site_about_us) 
                        <p>{{ $site_setting->site_about_us }}</p>
                    @endif
                </div>

                <div class="footer-quicklinks col-md-3 mb-md-0 mb-3">
                    <h6 class="text-uppercase">Quick Links</h6>
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{ route('post_ad') }}">Post Advertisement</a>
                        </li>
                        <li>
                            <a href="{{ route('home') }}">Home Page</a>
                        </li>
                        <li>
                            <a href="{{ route('seller_ad') }}">Seller Advertisement</a>
                        </li>
                        <li>
                            <a href="{{ route('buyer_ad') }}">Buyer Advertisement</a>
                        </li>
                        <li>
                            <a href="{{ route('contact_us') }}">Contact Us</a>
                        </li>
                    </ul>
                </div>

                <div class="footer-contact col-md-3 mb-md-0 mb-3">
                    <h6 class="text-uppercase">Contact US</h6>
                    <ul class="list-unstyled">
                        <li>
                            <span><i class="fas fa-phone-square-alt"></i> &nbsp;{{ $site_setting->site_contact_num }}</span>
                        </li>
                        <li>
                            <span><i class="fas fa-envelope"></i> &nbsp;{{ $site_setting->site_email }}</span>
                        </li>
                        <li>
                            <span><i class="fas fa-address-card"></i> &nbsp;{{ $site_setting->site_location }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="footer-copyright py-3">
            <div class="container">
                <div class="row">
                    <div class="d-flex justify-content-lg-start justify-content-center col-md-6 col-12">
                        © Copyright: MDBootstrap.com
                    </div>
                    <div class="d-flex justify-content-lg-end justify-content-center col-md-6 col-12">
                        <div class="scroll-to-top-button" title="Go Up">
                            <a href="#top">
                                <i class="fas fa-caret-square-up"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->

    @livewireScripts

    <!-- sweetalert -->
    <script src="{{ asset('assets/lib/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/summernote/summernote-lite.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <script>
        @if (Session::has('message'))
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '{!! Session::get('message') !!}',
                showConfirmButton: false,
                timer: 1500
            })  

        @endif
    </script>
    
</body>

</html>
