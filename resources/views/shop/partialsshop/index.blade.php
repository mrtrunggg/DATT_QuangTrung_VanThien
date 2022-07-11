@extends('shop.partials.index')
@section('content')
<div class="shop_sidebar_area">

<!-- ##### Single Widget ##### -->
<div class="widget catagory mb-50">
    <!-- Widget Title -->
    <h6 class="widget-title mb-30">Catagories</h6>

    <!--  Catagories  -->
    <div class="catagories-menu">
        <ul>
            <li ><a href="{{route('shop')}}">Products available</a></li>
            <li><a href="{{route('aosomi')}}">T-Shirt</a></li>
            <li><a href="{{route('aokhoac')}}">Coat</a></li>
            <li><a href="{{route('aothun')}}">Shirt</a></li>
            <li><a href="{{route('quandai')}}">Trousers</a></li>
            <li><a href="{{route('quandui')}}">Shorts</a></li>
            <li><a href="{{route('quanjean')}}">Jeans</a></li>
        </ul>
    </div>
</div>

<!-- ##### Single Widget ##### -->
<div class="widget brands mb-50">
    <!-- Widget Title -->
</div>

<!-- ##### Single Widget ##### -->
<div class="widget color mb-50">
    <!-- Widget Title -->
</div>

<!-- ##### Single Widget ##### -->
<div class="widget price mb-50">
    <!-- Widget Title -->
</div>
</div>

<div class="amado_product_area section-padding-100">
<div class="container-fluid">
    @yield('contentshop')
<!--    <div class="row">
                    <div class="col-12">
                        <nav aria-label="navigation">
                            <ul class="pagination justify-content-end mt-50">
                                <li class="page-item active"><a class="page-link" href="#">01.</a></li>
                                <li class="page-item"><a class="page-link" href="#">02.</a></li>
                                <li class="page-item"><a class="page-link" href="#">03.</a></li>
                                <li class="page-item"><a class="page-link" href="#">04.</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>-->
            </div>
        </div>
    </div> 
    <!-- ##### Main Content Wrapper End ##### -->
    @endsection