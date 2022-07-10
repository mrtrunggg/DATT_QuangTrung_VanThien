<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Amado - Furniture Ecommerce Template | Home</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('amado-master/img/core-img/favicon.ico')}}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{asset('amado-master/css/core-style.css')}}">
    <link rel="stylesheet" href="{{asset('amado-master/style.css')}}">
    

</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="{{route('search',$id)}}" method="get">
                            <input type="search" name="search"  placeholder="Type your keyword...">
                            <button type="submit"><img src="{{asset('amado-master/img/core-img/search.png')}}" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="#"><img src="{{asset('amado-master/img/core-img/logo.png')}}" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="{{route('home',$id)}}"><img src="{{asset('amado-master/img/core-img/logo.png')}}" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    
                    <li class="active"><a href="{{route('home',$id)}}">Home</a></li>
                    <li><a href="{{route('shop',$id)}}">Shop</a></li>                 
                    <li><a href="{{route('checkout',$id)}}">Checkout</a></li>
                    <li><a href="{{route('homeAccount',$id)}}">Account</a></li>
                </ul>
            </nav>
            <!-- Button Group -->

            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
                <a href="{{route('showCart',$id)}}" class="cart-nav"><img src="{{asset('amado-master/img/core-img/cart.png')}}" alt=""> Cart</a>

                <a href="#" class="search-nav"><img src="{{asset('amado-master/img/core-img/search.png')}}" alt=""> Search</a>
                <a href="{{route('auth.loginShow')}}"> Log out</a>
            </div>
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <!-- Header Area End -->

        <!-- noi dung -->
        @yield('content')
    
    
    <!-- ##### Newsletter Area Start ##### -->

    <!-- ##### Footer Area End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="{{asset('amado-master/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('amado-master/js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('amado-master/js/bootstrap.min.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{asset('amado-master/js/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('amado-master/js/active.js')}}"></script>

</body>

</html>