@extends('userAccount.partials.index')
@section('content')
<div class="cart-table-area section-padding-100">
    <div class="container-fluid" >
        <div class="row" style="justify-content: center">
            <div class="col-12 col-lg-8">
                <div class="checkout_details_area mt-50 clearfix">

                            @if(session('succes'))
                            <script>
                                swal("{{session()->get('notice')}}","You have successfully changed your information!","success");
                            </script>
                            @endif
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

                            <form acction="{{route('postchangeinformation')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="tendangnhap" value="{{$user->tendangnhap}}" readonly placeholder="First Name" required>
                                    </div>
                                    @if($user->hoten == Null)
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="hoten"  placeholder="Full Name" required>
                                    </div>
                                    @else
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="hoten" value="{{$user->hoten}}"  placeholder="Full Name" required>
                                    </div>
                                    @endif
                                    <div class="col-12 mb-3">
                                        <input type="email" class="form-control" name="email" readonly placeholder="Email" value="{{$user->email}}">
                                    </div>
                                    @if($user->diachi == Null)
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control mb-3" name="diachi"  placeholder="Address" value="">
                                    </div>
                                    @else
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control mb-3" name="diachi" placeholder="Address" value="{{$user->diachi}}">
                                    </div>
                                    @endif
                                    @if($user->dienthoai == Null)
                                    <div class="col-md-12 mb-3">
                                        <input type="number" class="form-control" name="dienthoai" min="0"  placeholder="Phone No" value="">
                                    </div>
                                    @else
                                    <div class="col-md-12 mb-3">
                                        <input type="number" class="form-control" name="dienthoai" min="0"  placeholder="Phone No" value="{{$user->dienthoai}}">
                                    </div>
                                    @endif
                                    <div class="col-md-12 mb-3">
                                    <input type="file" placeholder="" name="hinhdaidien"
                                            class="form-control p-0 border-0" >
                                    </div>
                                  
                                    <div class="amado-btn-group">
                                        <button type="submit" class="btn amado-btn">Submit</button>
                                    </div>
                                </div>
                            </form>

                    
                        
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- ##### Main Content Wrapper End ##### -->
@endsection 