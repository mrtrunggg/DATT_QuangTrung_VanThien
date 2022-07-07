@extends('userAccount.partials.index')
@section('content')
<div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title flex-hinhanh">
                                <h2>Welcome {{$user->tendangnhap}} !</h2>
                                <div class="avarta-hinhanh">
                                    @if($user->hinhdaidien == Null)
                                    <img src="{{asset('amado-master/img/core-img/account.jpg')}}" alt="">
                                    @else
                                    <img src="{{asset('uploads/'.$user->hinhdaidien)}}" alt="">
                                    @endif
                                
                                </div>
                            </div>

                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="first_name" value="{{$user->tendangnhap}}" readonly placeholder="First Name" required>
                                    </div>
                                    @if($user->hoten == Null)
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="last_name" value="" readonly placeholder="Full Name" required>
                                    </div>
                                    @else
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="last_name" value="{{$user->hoten}}" readonly placeholder="Last Name" required>
                                    </div>
                                    @endif
                                    <div class="col-12 mb-3">
                                        <input type="email" class="form-control" id="email" readonly placeholder="Email" value="{{$user->email}}">
                                    </div>
                                    @if($user->diachi == Null)
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control mb-3" id="street_address" readonly placeholder="Address" value="">
                                    </div>
                                    @else
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control mb-3" id="street_address" readonly placeholder="Address" value="{{$user->diachi}}">
                                    </div>
                                    @endif
                                    @if($user->dienthoai == Null)
                                    <div class="col-md-12 mb-3">
                                        <input type="number" class="form-control" id="phone_number" min="0" readonly placeholder="Phone No" value="">
                                    </div>
                                    @else
                                    <div class="col-md-12 mb-3">
                                        <input type="number" class="form-control" id="phone_number" min="0" readonly placeholder="Phone No" value="{{$user->dienthoai}}">
                                    </div>
                                    @endif
                                </div>
                            </form>
                            <div class="amado-btn-group mt-30 mb-100">
                              <a href="{{route('changeinformation',$id)}}" class="btn amado-btn mb-15">Change Information</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
@endsection 