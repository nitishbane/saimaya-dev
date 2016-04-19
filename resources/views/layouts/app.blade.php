<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/prettyPhoto.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/responsive.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/select2.min.css') }}">

    <!--[if lt IE 9]>
    <script src="{{ URL::asset('assets/js/html5shiv.js') }}"></script>
    <script src="{{ URL::asset('assets/js/respond.min.js') }}"></script>
    <![endif]-->  
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            /*font-family: 'Lato';*/
            font-family: 'Open Sans', sans-serif;
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">Saimaya</a>
                </div>
                
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="{{ url('/home') }}">Home</a></li>
                        <!-- <li><a href="about-us.html">About Us</a></li>
                        <li><a href="services.html">Services</a></li>
                        <li><a href="portfolio.html">Portfolio</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="blog-item.html">Blog Single</a></li>
                                <li><a href="pricing.html">Pricing</a></li>
                                <li><a href="404.html">404</a></li>
                                <li><a href="shortcodes.html">Shortcodes</a></li>
                            </ul>
                        </li>
                        <li><a href="blog.html">Blog</a></li> 
                        <li><a href="contact-us.html">Contact</a></li> -->
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div><!--/.container-->
        </nav>

    @yield('content')

    <!-- Footer -->
    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    © {{ date('Y') }} Saimaya. All Rights Reserved.
                </div>
                <!-- <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Faq</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div> -->
            </div>
        </div>
    </footer>

    <!-- JavaScripts -->
    <script src="{{ URL::asset('assets/js/jquery.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.isotope.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/main.js') }}"></script>
    <script src="{{ URL::asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <script src="{{ URL::asset('assets/js/home.js') }}"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
