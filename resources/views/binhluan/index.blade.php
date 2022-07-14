@extends('binhluan.partials.index')
@section('content')
@if(session('success'))
<script>
swal("{{session()->get('success')}}","Thank you for your comment!","success");
</script>
@elseif(session('erro'))
<script>
swal("{{session()->get('erro')}}","Fill full the information!","warning");
</script>
@endif
  <!-- Product Details Area Start -->
  <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url({{asset('uploads/'.$SP->hinhanh)}});">
                                    </li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="gallery_img" href="{{asset('uploads/'.$SP->hinhanh)}}">
                                            <img class="d-block w-100" src="{{asset('uploads/'.$SP->hinhanh)}}" alt="First slide">
                                        </a>
                                    </div>
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
                                <a href="{{route('detail')}}">
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
                                        <a href="{{route('writeReview',['sp'=>$SP->id])}}">Write A Review</a>
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

                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="Row">
                    <table>
                        @forelse($binhluan as $thongtin)

                     @if($thongtin->trangthai == 0 )
                     @if(Auth::user()->id==$thongtin->taikhoan_id)
                     <div class="col-8 mb-3" style="margin: 15px 0 0 0; border: 1px black solid;">
                                <b>Comment has been hidden</b>
                            </div>
                    @else
                    <div>
                        
                    </div>

                    @endif
                            @else
                            <div class="col-8 mb-3" style="margin: 15px 0 0 0; border: 1px black solid;">
                            <div style="display:flex" >

                                 <div class="avarta-hinhanh">
                                    @if($thongtin->hinhdaidien == Null)
                                    <img src="{{asset('amado-master/img/core-img/account.jpg')}}" alt="">
                                    @else
                                    <img src="{{asset('uploads/'.$thongtin->hinhdaidien)}}" alt="">
                                    @endif
                                 </div>
                                 <div style="margin: 40px 0 0px 64px"> 
                                    <b >{{$thongtin->mota}}</b>
                                </div>
                            </div>
                            <h4>{{$thongtin->tendangnhap}}</h4>
                            <p>{{$thongtin->ngaybl}}</p>
                    </div>
                    @foreach($dsbinhluan as $adminrep)
                    @if($adminrep->traloibinhluan_id == $thongtin->id)
                    <div class="col-7 mb-3" style="withd:600px; height:150px;margin: 5px 80px; border: 1px black solid;background: aquamarine">
                            <div style="display:flex" >
                                 <div class="avarta-hinhanh">
                                    <img style="width:60%; height: 60%" src="{{asset('amado-master/img/core-img/admin.png')}}" alt="">
                                 </div>
                                 <div style="margin: 40px 0 0px 64px"> 
                                    <b >{{$adminrep->mota}}</b>
                                </div>
                            </div>
                            <div style="margin: -20px 0 0 0 ">
                            <h5>Admin</h5>
                            <p>{{$adminrep->ngaybl}}</p>
                            </div>

                    </div>
                    @endif
                    
                    @endforeach
                    @endif
                     @empty
                     <p>No comment</p>
                     @endforelse
                    </table>
                </div>
            </div>
            <form action="{{route('xulycreate',['sp'=>$SP->id])}}" method="post">
            @csrf
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">
                            <div class="cart-title">
                                <h2>Your Comment</h2>
                            </div>
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <textarea name="comment" class="form-control w-100" cols="30" rows="10" placeholder="Comment content"></textarea>
                                    </div>
                                </div>
                        </div>
                <div class="amado-btn-group mt-30 mb-100">
                     <button type="submit" class="btn amado-btn mb-15">Submit</button>
                </div>

        </div>
        </form>
        <!-- Product Details Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

@endsection