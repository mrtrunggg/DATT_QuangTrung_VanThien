@extends('shop.partials.index')
@section('content')
      <!-- Product Details Area Start -->
       <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    @foreach($SP as $sanpham)
                                    @if($sanpham->id == 1)
                                    <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url({{asset('uploads/'.$sanpham->hinhanh)}});">
                                    </li>
                                    @else
                                    <li data-target="#product_details_slider" data-slide-to="{{$sanpham->id - 1}}" style="background-image: url({{asset('uploads/'.$sanpham->hinhanh)}});">
                                    </li>
                                    @endif
                                    @endforeach
                                </ol>
                                @foreach($SP as $sanpham)
                                @if($sanpham->id == 1)
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="gallery_img" href="{{asset('uploads/'.$sanpham->hinhanh)}}">
                                            <img class="d-block w-100" src="{{asset('uploads/'.$sanpham->hinhanh)}}" alt="First slide">
                                        </a>
                                    </div>
                                @else
                                <div class="carousel-item">
                                        <a class="gallery_img" href="{{asset('uploads/'.$sanpham->hinhanh)}}">
                                            <img class="d-block w-100" src="{{asset('uploads/'.$sanpham->hinhanh)}}" alt="Second slide">
                                        </a>
                                    </div>
                                @endif
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                        @foreach($SP as $sanpham)
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price">Price: {{number_format($sanpham->giaban)}} VNĐ</p>
                                <a href="{{route('detail',$id)}}">
                                    <h6>{{$sanpham->tensp}}</h6>
                                </a>
                                <!-- Ratings & Review -->
                                <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                    <div class="ratings">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="review">
                                        <a href="#">Write A Review</a>
                                    </div>
                                </div>
                                <!-- Avaiable -->
                                <p class="avaibility"><i class="fa fa-circle"></i> In Stock</p>
                            </div>

                            <div class="short_overview my-5">
                                <p>{{$sanpham->mota}}</p>
                            </div>
                        @endforeach




                            <!-- Add to Cart Form -->
                            <form class="cart clearfix" method="post">
                                <div class="cart-btn d-flex mb-50">
                                    <p>Qty</p>
                                    <div class="quantity">
                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="1">
                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <button type="submit" name="addtocart" value="5" class="btn amado-btn">Add to cart</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Details Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->


   @endsection