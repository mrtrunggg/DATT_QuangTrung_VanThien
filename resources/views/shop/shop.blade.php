@extends('shop.partialsshop.index')
@section('contentshop')
                <div class="row">
                    @forelse($SP as $sanpham)
                     <!-- Single Product Area -->
                    <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                            <a href="{{route('detailproduct',$sanpham->id)}}"><img src="{{asset('uploads/'.$sanpham->hinhanh)}}" alt=""></a>
                                <!-- Hover Thumb -->
                                <!-- <img class="hover-img" src="{{asset('amado-master/img/product-img/product2.jpg')}}" alt=""> -->
                            </div>

                            <!-- Product Description -->
                            <div class="product-description d-flex align-items-center justify-content-between">
                                <!-- Product Meta Data -->
                                <div class="product-meta-data">
                                    <div class="line"></div>
                                    @foreach($ctsanpham as $a)
                                    @if($a->sanpham_id == $sanpham->id)
                                     <p class="product-price">Price: {{number_format($a->giaban)}} $</p>
                                     @break
                                     @endif
                                    @endforeach
                                           
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
                            @if(Auth::check())
                            <form class="cart clearfix" method="post" action="{{route('saveCart')}}">
                            @else
                            <form class="cart clearfix" action="{{route('checkdn')}}">
                            @endif
                                @csrf
                                <div class="cart-btn d-flex mb-50">
                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="product_id_hidden" value="{{$sanpham->id}}">
                                </div>
                                <button type="submit" name="addtocart" style="border: transparent">                                    <div class="cart add_to_cart">
                                        <img src="{{asset('amado-master/img/core-img/cart.png')}}" alt="">          
                                        </div></button>
                            </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <h4>No products</h4>
                    @endforelse

                </div>
                {{$SP->links()}}
    @endsection
    <script>
       $(function(){
        alert('test');
       }) ;
        </script>
