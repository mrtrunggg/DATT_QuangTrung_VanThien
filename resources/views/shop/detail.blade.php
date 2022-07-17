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
                                @if($ctsanpham->discount == 0)
                                <p class="product-price">${{number_format($ctsanpham->giaban)}}</p>
                                @else
                                <p class="product-price">${{number_format($ctsanpham->giakhuyenmai)}} <span class="giakhuyenmai">${{number_format($ctsanpham->giaban)}}</span></p>
                                @endif
                               
                              

                                
                                




                                

                                

                              
                                
                                <h2>{{$SP->tensp}} 
                                    <span class="product-size">{{$ctsanpham->kichthuoc}}</span>
                                </h2>
                             
                                <!-- Ratings & Review -->
                                <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                    <!-- <div class="ratings">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div> -->
                                   
                                    @if (Auth::check())

                                    <div class="review">
                                        <a href="{{route('writeReview',$SP->id)}}">Write A Review</a>
                                    </div>
                                    @else
                                    <div class="review">
                                        <a href="{{route('checkdn')}}">Write A Review </a>
                                    </div>
                                    @endif
                                </div>
                                <!-- Avaiable -->
                                @if($ctsanpham->soluong <= 0)
                                    <p class="avaibility"><i class="fa fa-circle" style="color:red"></i> Out of stock</p>
                                @else
                                    <p class="avaibility"><i class="fa fa-circle"></i> In Stock</p>
                                @endif

                            </div>
                            <div style="margin: 20px 0px 0px 0px; display:flex">
                                <p style="margin-bottom:0; padding-right:8px">Size: </p>
                                <div>
                                    @foreach($size as $a)
                                        <a href="{{route('detailproductsize',['idsp'=>$SP->id,'kichco'=>$a->kichthuoc])}}" class="sizene">{{$a->kichthuoc}}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="short_overview my-3">
                                <p>{{$SP->mota}}</p>
                            </div>

                            <!-- Add to Cart Form -->
                            @if(Auth::check())
                            <form class="cart clearfix" method="post" action="{{route('saveCart')}}">
                            
                            @else
                            <form class="cart clearfix"  action="{{route('checkdn')}}">

                            @endif
                                @csrf
                                <div class="cart-btn d-flex mb-50">
                                    <p>Qty</p>
                                    <div class="quantity">
                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="1">
                                        <input type="hidden" name="product_id_hidden" value="{{$SP->id}}">
                                        <input type="hidden" name="size" value="{{$ctsanpham->kichthuoc}}">
                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                    </div>
                                </div>

                                @if($ctsanpham->soluong <= 0)
                                <button disabled type="submit" name="addtocart" value="5" class="btn amado-btn">Add to cart</button>
                                
                                @else
                                <button  type="submit" name="addtocart" value="5" class="btn amado-btn">Add to cart</button>
                                
                                @endif
                                
                                
                            </form>

                        </div>
                    </div>
                </div>
                


                <p class="sanphamlienquan">Related products</p>

                <div class="your-class">
                    @foreach($sanphamlienquan as $splienquan)
                        @foreach($giabanlienquan as $gialienquan)
                            @if($gialienquan->sanpham_id == $splienquan->id)
                                <a class="tongsplq" href="{{route('detailproduct',$splienquan->id)}}">
                                    <div class="sizehinhanh">
                                        <img src="{{asset('uploads/'.$splienquan->hinhanh)}}">
                                    </div>  
                                    <div style="margin-top:10px">
                                        <p class="tensanphamlienquan">{{$splienquan->tensp}} <span>${{$gialienquan->giaban}}</span></p> 
                                    </div>
                                </a>  
                                @break
                            @endif
                        @endforeach
                    @endforeach
                </div>



            </div>
        </div>
        <!-- Product Details Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <script type="text/javascript">
        $(document).ready(function(){
          $('.your-class').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1000,
          });
        });
    </script>




<style>
.tensanphamlienquan{
    margin-bottom:0px;
    font-size: 25px;
}
.tensanphamlienquan span{
   color: #fbb710;
    font-size: 20px;
}
.sanphamlienquan{
    font-size: 27px;
    text-transform: uppercase;
    margin-top: 55px;
    margin-bottom: 0;
}
.your-class{
    margin-top: 10px;
}
.tongsplq{
    padding: 0 10px;
}

.tongsplq img{
    width: 100%;
}

.giakhuyenmai{
   text-decoration-line: line-through; 
   font-size: 20px;
}
.product-size{
    color: #6f6363;
    font-size: 25px;
}
.sizene{
    padding: 5px;
    border: 1px solid #aaa7a7;
    margin-right: 10px;
    font-size:20px;
    transition: none;
    font-weight: lighter;
}
.sizene:hover{
    color: white;
    font-size:20px;
    background-color: #fbb710;
    font-weight: 200;
}
</style>


@endsection