<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->

    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>


    @yield('extra-css')

</head>
<body>
    {{--<div id="app">--}}
        {{--<nav class="navbar navbar-default navbar-static-top">--}}
            {{--<div class="container">--}}
                {{--<div class="navbar-header">--}}

                    {{--<!-- Collapsed Hamburger -->--}}
                    {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">--}}
                        {{--<span class="sr-only">Toggle Navigation</span>--}}
                        {{--<span class="icon-bar"></span>--}}
                        {{--<span class="icon-bar"></span>--}}
                        {{--<span class="icon-bar"></span>--}}
                    {{--</button>--}}

                    {{--<!-- Branding Image -->--}}
                    {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
                        {{--{{ config('app.name', 'Laravel') }}--}}
                    {{--</a>--}}
                {{--</div>--}}

                {{--<div class="collapse navbar-collapse" id="app-navbar-collapse">--}}
                    {{--<!-- Left Side Of Navbar -->--}}
                    {{--<ul class="nav navbar-nav">--}}
                        {{--<li>&nbsp;--}}
                            {{--<form class="form-inline" method="GET" action="{{route('search')}}">--}}
                                {{--<input class="form-control mr-sm-2" name="query" value="{{request()->input('query')}}" id="query" type="search" placeholder="Search" aria-label="Search">--}}
                                {{--<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
                            {{--</form></li>--}}
                    {{--</ul>--}}

                    {{--<!-- Right Side Of Navbar -->--}}
                    {{--<ul class="nav navbar-nav navbar-right">--}}
                        {{--<!-- Authentication Links -->--}}
                        {{--@guest--}}
                            {{--<li><a href="{{ route('shop.index')}}">Shop</a></li>--}}

                            {{--<li><a href="{{ route('login') }}">Login</a></li>--}}
                            {{--<li><a href="{{ route('register') }}">Register</a></li>--}}
                        {{--@else--}}
                            {{--<li><a href="{{ route('shop.index') }}">Shop</a></li>--}}
                            {{--<li class="dropdown">--}}
                                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>--}}
                                    {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
                                {{--</a>--}}

                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li>--}}
                                        {{--<a href="{{ route('logout') }}"--}}
                                            {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
                                            {{--Logout--}}
                                        {{--</a>--}}

                                        {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                                            {{--{{ csrf_field() }}--}}
                                        {{--</form>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        {{--@endguest--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</nav>--}}

        {{--@yield('content')--}}
    {{--</div>--}}

    <nav class="navbar" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="icon-span navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <a  class="icon-bar" href="{{ url('/') }}"><img style="max-width:30px;margin-top: -8px;" src="{{asset('LOGO/logo.png')}}"></a>
                </button>
                <a class="navbar-brand" rel="home" href="{{ url('/') }}">
                    <img src="{{asset('LOGO/logo.png')}}">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">


                <form class="navbar-form navbar-left " role="search">
                    <div class="form-group">
                        <input type="text" class="form-search" placeholder= "Search">
                    </div>
                    <button type="submit" class="btn btn-go btn-default">GO!</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    @guest
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img style="max-width:30px;margin-top: 1px;" src="{{asset('icon/man-user.png')}}"></a>
                        <ul class="dropdown-menu">
                            <title>Selamat Datang</title>
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        </ul>
                    </li>
                    {{--<li><a href="login.html"><img style="max-width:30px;margin-top: 1px;" src="icon/wishlist.png"></a></li>--}}
                    {{--<li><a href="login.html"><img style="max-width:30px;margin-top: 3px;" src="icon/cart.png"></a></li>--}}
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img style="max-width:30px;margin-top: 1px;" src="{{asset('icon/man-user.png')}}"></a>
                            <ul class="dropdown-menu">
                                <title>Selamat Datang</title>
                                <li><a href="{{route('user')}}">My Account</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{route('wishlist.index')}}"><img style="max-width:30px;margin-top: 1px;" src="{{asset('icon/wishlist.png')}}"></a>
                            <div class="rounded"><center style="margin-top: -4px;"></center></div>
                        </li>
                        <li><a href="{{route('cart.index')}}"><img style="max-width:30px;margin-top: 3px;" src="{{asset('icon/cart.png')}}"></a>
                            <div class="rounded2"><center style="margin-top: -4px;"></center></div>
                        </li>
                        @endguest
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>

    @yield('content')


    <div class="footer col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="footerPart1 col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <br>
            <p>FIND US AT<br>
                <a href="#"><img class= "social-media" src="/icon/facebook.png"></a>
                <a href="#"><img class= "social-media" src="/icon/instagram.png"></a>
                <a href="#"><img class= "social-media" src="/icon/google.png"></a>
                <a href="#"><img class= "social-media" src="/icon/email.png"></a>

            <p id="footerText" style="position:absolute;
			   				bottom: -100px;
			    			left: 16px;
			    			font-size: 15px;"> © 2012, 2018 BNCC
            </p>
        </div>

        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
            <div class="vl"></div>
        </div>

        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <center class="footerPart2">
                BNCC<br>
                By Now Clothing Company <br><br>
                "What you wear is how you present yourself to the world, especially today, when human contacts are so quick. Fashion is instant language."<br>
                <br>
                —Miuccia Prada
            </center>
        </div>

        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
            <div class="vl2"></div>
        </div>

        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <div class="footerPart3">
                <a style="margin-right:  10px;" href="{{route('about')}}"> About Us </a>|<a style="margin-left:  10px;" href="{{route('contact')}}"> Contact Us </a>
                <br>
                <img style="max-width:170px;margin-top: 15px;" src="/LOGO/logoPutih.png">
                <br><br>
                <p>Customer Service
                <p>Email : bynow@bncc.net
                <p>Telp : +628 1234 2254
                    <br> <br>
                <p>Greater Jakarta, Indonesia
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script type="text/javascript" src="{{asset('js/style.js')}}"></script>

    @yield('extra-js')
</body>
</html>
