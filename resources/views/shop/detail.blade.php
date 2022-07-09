@extends('shop.partials.index')
@section('content')
      <!-- Product Details Area Start -->
       <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                            <div id="product_details_slider"  class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li  style="display:none" data-target="#product_details_slider" data-slide-to="0" style="background-image: url({{asset('uploads/'.$SP->hinhanh)}});">
                                    </li>
                                @foreach($hinhanh as $sanpham)
                                    <li  data-target="#product_details_slider" data-slide-to="{{$check}}" style="background-image: url({{asset('filename/'.$sanpham->tenhinhanh)}});">
                                    {{$check ++}}
                                    </li>
                                    @endforeach
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="gallery_img" href="{{asset('uploads/'.$SP->hinhanh)}}">
                                            <img class="d-block w-100" src="{{asset('uploads/'.$SP->hinhanh)}}">
                                        </a>
                                    </div>
                                    @foreach($hinhanh as $sanpham)
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="{{asset('filename/'.$sanpham->tenhinhanh)}}">
                                            <img class="d-block w-100" src="{{asset('filename/'.$sanpham->tenhinhanh)}}">
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price">Price: {{number_format($SP->giaban)}} $</p>
                                <a href="{{route('detail',$id)}}">
                                    <h6>{{$SP->tensp}}</h6>
                                </a>
                                <!-- Ratings & Review -->
                                <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                    <!-- <div class="ratings">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div> -->
                                    <div class="review">
                                        <a href="{{route('writeReview',['id'=>$id,'sp'=>$SP->id])}}">Write A Review</a>
                                    </div>
                                </div>
                                <!-- Avaiable -->
                                @if($SP->soluong <= 0)
                                    <p class="avaibility"><i class="fa fa-circle" style="color:red"></i> Out of stock</p>
                                
                                @else
                                    <p class="avaibility"><i class="fa fa-circle"></i> In Stock</p>
                                
                                @endif

                            </div>

                            <div class="short_overview my-5">
                                <p>{{$SP->mota}}</p>
                            </div>

                            <!-- Add to Cart Form -->
                            <form class="cart clearfix" method="post" action="{{route('saveCart',$id)}}">
                                @csrf
                                <div class="cart-btn d-flex mb-50">
                                    <p>Qty</p>
                                    <div class="quantity">
                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="1">
                                        <input type="hidden" name="product_id_hidden" value="{{$SP->id}}">
                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                @if($SP->soluong <= 0)
                                <button disabled type="submit" name="addtocart" value="5" class="btn amado-btn">Add to cart</button>
                                
                                @else
                                <button  type="submit" name="addtocart" value="5" class="btn amado-btn">Add to cart</button>
                                
                                @endif
                                
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