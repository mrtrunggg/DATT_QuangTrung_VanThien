@extends('shop.partialsshop.index')
@section('contentshop')
                <div class="row">
                    @forelse($SP as $sanpham)
                     <!-- Single Product Area -->
                    <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{asset('uploads/'.$sanpham->hinhanh)}}" alt="">
                                <!-- Hover Thumb -->
                                <!-- <img class="hover-img" src="{{asset('amado-master/img/product-img/product2.jpg')}}" alt=""> -->
                            </div>

                            <!-- Product Description -->
                            <div class="product-description d-flex align-items-center justify-content-between">
                                <!-- Product Meta Data -->
                                <div class="product-meta-data">
                                    <div class="line"></div>
                                    <p class="product-price">Price: {{$sanpham->giaban}}</p>
                                    <a href="#">
                                        <h6>{{$sanpham->tensp}}</h6>
                                    </a>
                                </div>
                                <!-- Ratings & Cart -->
                                <div class="ratings-cart text-right">
                                    <!-- <div class="ratings">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div> -->
                                    <div class="cart">
                                        <a href="{{route('cart',$id)}}" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="{{asset('amado-master/img/core-img/cart.png')}}" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                        <p>Không có dữ liệu</p>
                        </div>
                    @endforelse

                </div>
    @endsection