<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Title  -->
    <title>Amado - Furniture Ecommerce Template | Home</title>
    <link rel="stylesheet" type="text/css" href="{{asset('amado-master/js/slick/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('amado-master/js/slick/slick-theme.css')}}"/>

    

    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('amado-master/img/core-img/favicon.ico')}}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{asset('amado-master/css/core-style.css')}}">
    <link rel="stylesheet" href="{{asset('amado-master/style.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                        <form action="{{route('search')}}" method="get">
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
            <div class="logo" style="margin-bottom: 60px;">
                <a href="{{route('home-index')}}"><img src="{{asset('amado-master/img/core-img/logo.png')}}" alt=""></a>
            </div>
            <div style="margin-bottom: 50px;">
                
                @if(Auth::check() )
                    <a style="display:flex; align-items: center;" href="{{route('homeAccount')}}">
                        <p style="margin-bottom: 0; color: #3f2d2d; font-size: 17px;">{{Auth::user()->tendangnhap}} </p>
                        <div style="width:50px; height:50px; border-radius: 50px; margin-left: 15px;">
                            @if(Auth::user()->hinhanh!=null)
                                <img style="border-radius: 50px; width:100%" src="{{asset('uploads/'.Auth::user()->hinhdaidien)}}" alt="">
                            @else
                                <img style="border-radius: 50px; width:100%" src="{{asset('amado-master/img/core-img/account.jpg')}}" alt="">
                            @endif
                        </div>
                    </a>
                @endif
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    
                    <li><a href="{{route('home-index')}}">Home</a></li>
                    <li><a href="{{route('shop')}}">Shop</a></li>   
                    @if(Auth::check())
                        <li><a href="{{route('homeAccount')}}">Account</a></li>
                        <li><a href="{{route('checkout')}}">Checkout</a></li> 
                    @else
                        <li><a href="{{route('checkdn')}}">Account</a></li>
                        <li><a href="{{route('checkdn')}}">Checkout</a></li>
                    @endif
                </ul>
            </nav>
            <!-- Button Group -->
            {{-- <div class="amado-btn-group mt-30 mb-100">
                <a href="#" class="btn amado-btn mb-15">%Discount%</a>
                <a href="#" class="btn amado-btn active">New this week</a>
            </div> --}}
            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
                @if(Auth::check()  )
                    <a href="{{route('showCart')}}" class="cart-nav"><img src="{{asset('amado-master/img/core-img/cart.png')}}" alt=""> Cart</a>
                @else
                     <a href="{{route('checkdn')}}" class="cart-nav"><img src="{{asset('amado-master/img/core-img/cart.png')}}" alt=""> Cart</a>
               @endif
                <a href="#" class="search-nav"><img src="{{asset('amado-master/img/core-img/search.png')}}" alt=""> Search</a>
                @if(Auth::check()  )
                <a class="dropdown-item" href="{{ route('out') }}">
                        <i class="fa fa-sign-out fa-lg"></i> Logout
                    </a>
                @else
                <a class="dropdown-item" href="{{ route('user-login') }}">
                        <i class="fa fa-sign-in fa-lg"></i> Login
                    </a>
                @endif

            </div>
            <!-- Social Button -->
        </header>
        <!-- Header Area End -->

        <!-- noi dung -->
        @yield('content')
    
    
    <!-- ##### Newsletter Area Start ##### -->

    {{-- <section class="newsletter-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <!-- Newsletter Text -->
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="newsletter-text mb-100">
                        <h2>Subscribe for a <span>25% Discount</span></h2>
                        <p>Nulla ac convallis lorem, eget euismod nisl. Donec in libero sit amet mi vulputate consectetur. Donec auctor interdum purus, ac finibus massa bibendum nec.</p>
                    </div>
                </div>
                <!-- Newsletter Form -->
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="newsletter-form mb-100">
                        <form action="#" method="post">
                            <input type="email" name="email" class="nl-email" placeholder="Your E-mail">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}



    <!-- ##### Newsletter Area End ##### -->
<!-- ##### Footer Area Start ##### -->
 <footer class="footer_area clearfix w-100">
        <div class="container">
            <div class="row align-items-center">
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-4">
                    <div class="single_widget_area">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="#"><img src="{{asset('amado-master/img/core-img/logo2.png')}}" alt=""></a>
                        </div>
                        <!-- Copywrite Text -->
                        <p class="copywrite"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> & Re-distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-8">
                    <div class="single_widget_area">
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                            <nav class="navbar navbar-expand-lg justify-content-end">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                                <div class="collapse navbar-collapse" id="footerNavContent">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('home-index')}}">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('shop')}}">Shop</a>
                                        </li>
                                        <li class="nav-item">
                                            
                                        
                                        @if(Auth::check()  )
                                          <a href="{{route('showCart')}}" class="nav-link"> Cart</a>
                                        @else
                                        <a href="{{route('checkdn')}}" class="nav-link"> Cart</a>
                                         @endif
                                         </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('checkout')}}">Checkout</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="{{asset('amado-master/js/jquery/jquery-2.2.4.min.js')}}"></script>
    
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="{{asset('amado-master/js/slick/slick.min.js')}}"></script>

 
    
    <!-- Popper js -->
    <script src="{{asset('amado-master/js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('amado-master/js/bootstrap.min.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{asset('amado-master/js/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('amado-master/js/active.js')}}"></script>
    <script>

        
    </script>
</body>

</html>