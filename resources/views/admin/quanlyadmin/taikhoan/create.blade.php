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
        <p>
            <a href="{{route('indexTk')}}" class="btn btn-primary pull-right">Back</a>
        </p>
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->
         
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-12 col-xlg-9 col-md-12">
                <form method="POST" action="{{route('xylythemTK')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal form-material">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">User Name</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" placeholder=" " name="tendangnhap"
                                            class="form-control p-0 border-0"> </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Password</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" placeholder=" " name="password"
                                            class="form-control p-0 border-0"> </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="col-md-6 p-0">Email</label>
                                    <div class="col-md-6 border-bottom p-0">
                                        <input type="mail" placeholder=" " name="email"
                                            class="form-control p-0 border-0"> </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="col-md-6 p-0">Phone Number</label>
                                    <div class="col-md-6 border-bottom p-0">
                                        <input type="text" placeholder=" " name="dienthoai"
                                            class="form-control p-0 border-0"> </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="col-md-6 p-0">Avatar</label>
                                    <div class="col-md-6 border-bottom p-0">
                                        <input type="file" placeholder=" " name="hinhdaidien"
                                            class="form-control p-0 border-0"> </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="col-md-6 p-0">Full Name</label>
                                    <div class="col-md-6 border-bottom p-0">
                                        <input type="text" placeholder=" " name="hoten"
                                            class="form-control p-0 border-0"> </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="col-md-6 p-0">Address</label>
                                    <div class="col-md-6 border-bottom p-0">
                                        <input type="text" placeholder=" " name="diachi"
                                            class="form-control p-0 border-0"> </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-sm-12">Account Type</label>
                                    <div class="col-sm-12 border-bottom">
                                        <select class="form-select shadow-none p-0 border-0 form-control-line" name="loaitk" id="loaitk">

                                            <option value="1">Staff</option> 
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-sm-12">Status</label>
                                    <div class="col-sm-12 border-bottom">
                                        <select class="form-select shadow-none p-0 border-0 form-control-line" name="trangthai" id="trangthai">
                                            <option value="1">Activate</option>
                                            <option value="0">Inactive</option> 
                                        </select>
                                    </div>
                                </div>
                            
                                <div class="form-group mb-4">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>    
                </form>    
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
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