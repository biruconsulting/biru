{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Classic</title>

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
                                        MY ACCOUNT ({{ Auth::user()->name }})
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                        <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>

                                        <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                            @csrf
                                        </form>
                                    </ul>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        MY ACCOUNT ({{ Auth::user()->name }})
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                        <li><a class="dropdown-item" href="#">Profile</a></li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>

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
                        <img src="{{ asset('storage/images/logo.png') }}" alt="" height="50">
                    </div>
                    <div class="d-flex justify-content-lg-center justify-content-center col-lg-6 col-12 center-mid-section">
                        <form action="#">
                            <div class="header-search-bar input-group">
                                <div class="search-dropdown">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Categories</option>
                                        <optgroup label="Seller Advertisement">
                                            <option value="1">General</option>
                                            <option value="2">Properties</option>
                                            <option value="3">Job</option>
                                        </optgroup>
                                        <optgroup label="Buyer Advertisement">
                                            <option value="1">General</option>
                                            <option value="2">Properties</option>
                                            <option value="3">Job</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <input type="text" class="search-bar-input form-control" placeholder="Search by Name, Location...">
                                <button type="submit" class="btn btn-primary search-bar-btn"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
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
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni non pariatur aliquid quod? Voluptate voluptatum dolores, delectus debitis temporibus quos fugit. Culpa deleniti id commodi veniam praesentium fugit unde exercitationem.</p>
                </div>

                <div class="footer-quicklinks col-md-3 mb-md-0 mb-3">
                    <h6 class="text-uppercase">Quick Links</h6>
                    <ul class="list-unstyled">
                        <li>
                            <a href="post_ad.html">Post Advertisement</a>
                        </li>
                        <li>
                            <a href="index.html">Home Page</a>
                        </li>
                        <li>
                            <a href="seller_ad.html">Seller Advertisement</a>
                        </li>
                        <li>
                            <a href="buyer_ad.html">Buyer Advertisement</a>
                        </li>
                        <li>
                            <a href="contact_us.html">Contact Us</a>
                        </li>
                    </ul>
                </div>

                <div class="footer-contact col-md-3 mb-md-0 mb-3">
                    <h6 class="text-uppercase">Contact US</h6>
                    <ul class="list-unstyled">
                        <li>
                            <span><i class="fas fa-phone-square-alt"></i> &nbsp;+9477282818</span>
                        </li>
                        <li>
                            <span><i class="fas fa-envelope"></i> &nbsp;user@user.com</span>
                        </li>
                        <li>
                            <span><i class="fas fa-road"></i> &nbsp;user road,</span>
                        </li>
                        <li>
                            <span><i class="fas fa-address-card"></i> &nbsp;Jaffna, Sri Lanka.</span>
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

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/summernote/summernote-lite.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
