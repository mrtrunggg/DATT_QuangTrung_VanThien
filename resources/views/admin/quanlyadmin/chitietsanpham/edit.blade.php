@extends('admin.app')
@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Edit Product Detail</h4>
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
            <a href="{{route('chitietsanpham',['SP'=>$thongtin->sanpham_id])}}" class="btn btn-primary pull-right">Back</a>
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
                <form method="POST" acction="{{route('xulysuactsp',['SP'=>$thongtin->id])}}" enctype="multipart/form-data"> 
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal form-material">
                                <div class="form-group mb-2">
                                    
                                    <div class="col-md-6 p-0">
                                        <input type="hidden" placeholder=" " name="id"
                                            class="form-control p-0 border-0" value="{{$thongtin->id}}"> </div>
                                </div>       
                              
                                <div class="form-group mb-2">
                                    <label class="col-md-6 p-0">Size</label>
                                    <div class="col-md-6 border-bottom p-0">
                                        <input type="text" placeholder=" " name="size"
                                            class="form-control p-0 border-0" value="{{$thongtin->kichthuoc}}"> </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group mb-2">
                                            <label class="col-md-6 p-0">Quantity</label>
                                            <div class="col-md-6 border-bottom p-0">
                                                <input type="text" placeholder=" " name="soluong" readonly
                                                    class="form-control p-0 border-0" value="0" style="background-color: white;"> </div>
                                        </div> 
                                    </div>
                                    <div class="col">
                                        <div class="form-group mb-4">
                                            <label class="col-md-4 p-0">Price</label>
                                            <div class="col-md-0 border-bottom p-0">
                                                <input type="number" placeholder=" " name="giaban"
                                                    class="form-control p-0 border-1" value="{{$thongtin->giaban}}"> </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group mb-4">
                                            <label class="col-md-4 p-0">Discount</label>
                                            <div class="col-md-0 border-bottom p-0">
                                                <input type="number" placeholder=" " name="discount"
                                                    class="form-control p-0 border-1" value="{{$thongtin->discount}}"> </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group mb-4">
                                            <label class="col-md-0 p-0">Promotional Price</label>
                                            <div class="col-md-0 border-bottom p-0">
                                                <input type="number" placeholder=" " name="giakhuyenmai"
                                                    class="form-control p-0 border-1" value="{{$thongtin->giakhuyenmai}}"> </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-sm-12">Status</label>

                                    <div class="col-sm-12 border-bottom">
                                        <select class="form-select shadow-none p-0 border-0 form-control-line" name="trangthai" id="trangthai">
                                            <option value="1" <?php if($thongtin->trangthai == '1'){echo("selected");}?>>Activate</option>
                                            <option value="0" <?php if($thongtin->trangthai == '0'){echo("selected");}?>>Inactive</option> 
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">Complete</button>
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