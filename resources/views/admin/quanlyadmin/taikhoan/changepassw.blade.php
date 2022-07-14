


@extends('admin.app')
@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Add Account</h4>
            </div>
           
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
 
    
    <div class="container-fluid">

        <div class="row">
            <!-- Column -->
            
            <div class="col-lg-4 col-xlg-3 col-md-12">
                <div class="white-box">
                    <div class="user-bg"> 
                        {{-- <img width="100%" alt="user" src="plugins/images/large/img1.jpg"> --}}
                        <div class="overlay-box">
                            <div class="user-content">
                                @if (auth()->guard('admin')->user()->hinhdaidien != null)
                                    <a href="javascript:void(0)">
                                        <img src="{{asset('uploads/'.auth()->guard('admin')->user()->hinhdaidien)}}" class="thumb-lg img-circle" alt="img">
                                    </a>
                                @else
                                    <a href="javascript:void(0)">
                                        <img src="{{asset('amado-master/img/core-img/admin.png')}}" class="thumb-lg img-circle" alt="img">
                                    </a>
                                @endif
                                <h4 class="text-white mt-2">{{auth()->guard('admin')->user()->tendangnhap}}</h4>
                                <h5 class="text-white mt-2">{{auth()->guard('admin')->user()->email}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="white-box" style="text-align: center">
                    <a class="user-bg" href="{{route('information')}}" style="font-size: 19px; text-transform: uppercase;">
                       Information 
                    </a>
                </div>
            </div>
            
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-12">
                <div class="card">
                    <div class="card-body">

                        @if(session('notice'))
                            <script>
                                swal("{{session()->get('notice')}}","Successful change!","success");
                            </script>
                        @elseif(session('notice1'))
                            <script>
                                swal("{{session()->get('notice1')}}","Please enter the correct information!","warning");
                            </script>
                        @endif

                        <form acction="{{route('editthongtinpass')}}" method="post" enctype="multipart/form-data">
                             @csrf
                                <div class="col-12 mb-3">
                                    <lable> Old Password</labe>
                                    <input type="text" class="form-control" name="oldpass"  placeholder="Old Password">
                                </div>
                                <div class="col-12 mb-3">
                                    <lable> New Password</lable>
                                    <input type="text" class="form-control" name="newpass"  placeholder="New Password">
                                </div>
                                <div class="col-12 mb-3">
                                    <lable> Re-Enter a new password
                                    </lable>
                                    <input type="text" class="form-control" name="renewpass"  placeholder="Re-New Password" >
                                </div>
                                <div class="amado-btn-group mt-30 mb-100">
                                <button style="border: 1px black solid;" type="submit" class="btn amado-btn mb-15">Change</button>
                        </form>




 
                        {{-- <form class="form-horizontal form-material">
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">User Name:</label>
                                <div class="col-md-12 ">
                                    <p class="">{{auth()->guard('admin')->user()->tendangnhap}}</p>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Email:</label>
                                <div class="col-md-12 ">
                                    <p class="">{{auth()->guard('admin')->user()->email}}</p>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Phone Number:</label>
                                <div class="col-md-12 ">
                                    <p class="">{{auth()->guard('admin')->user()->dienthoai}}</p>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Full Name:</label>
                                <div class="col-md-12 ">
                                    <p class="">{{auth()->guard('admin')->user()->hoten}}</p>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Address:</label>
                                <div class="col-md-12 ">
                                    <p class="">{{auth()->guard('admin')->user()->diachi}}</p>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Account Type:</label>
                                <div class="col-md-12 ">
                                    @if (auth()->guard('admin')->user()->loaitk == 1)
                                        <p>Staff</p> 
                                    @elseif(auth()->guard('admin')->user()->loaitk == 2)
                                        <p>Manage</p> 
                                    @endif
                                </div>
                            </div>
                        </form> --}}
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>








      
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>


@endsection