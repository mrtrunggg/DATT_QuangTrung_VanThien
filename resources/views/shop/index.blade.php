@extends('shop.partials.index')
@section('content')
        <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix">
            <div class="amado-pro-catagory clearfix">
                
               
                @foreach($SP as $sanpham)
               
                <div class="single-products-catagory clearfix">
                <a href="{{route('detailproduct',['id'=>$id,'idsp'=>$sanpham->id])}}">
                        <img src="{{asset('uploads/'.$sanpham->hinhanh)}}" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>{{$sanpham->giaban}}</p>
                            <h4>{{$sanpham->tensp}}</h4>
                        </div>
                    </a>
                </div>
                @endforeach
               
            </div>
        </div>
        <!-- Product Catagories Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
  @endsection
            