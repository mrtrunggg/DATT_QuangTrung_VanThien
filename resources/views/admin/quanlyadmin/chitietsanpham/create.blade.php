@extends('admin.app')
@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Add Product Detail</h4>
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
            <a href="{{route('chitietsanpham',['SP'=>$idsp])}}" class="btn btn-primary pull-right">Back</a>
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
                <form method="POST" action="{{route('xulythemctsp')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal form-material">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Name Product</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <p style="margin-bottom: 0px">{{$dsSanpham->tensp}}</p>
                                        <input type="hidden" placeholder=" " name="sanpham_id"
                                            class="form-control p-0 border-0" value="{{$dsSanpham->id}}"> </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="col-md-6 p-0">Size</label>
                                    <div class="col-md-6 border-bottom p-0">
                                        <input type="text" placeholder=" " name="kichthuoc"
                                            class="form-control p-0 border-0"> </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="col-md-6 p-0">Quantity</label>
                                    <div class="col-md-6 border-bottom p-0">
                                        <input type="text" placeholder=" " name="soluong" readonly
                                            class="form-control p-0 border-0" value="0" style="background-color: white;"> </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group mb-4">
                                            <label class="col-md-4 p-0">Price</label>
                                            <div class="col-md-0 border-bottom p-0">
                                                <input type="text" placeholder=" " name="giaban" 
                                                    class="form-control p-0 border-1"> </div>
                                        </div>     
                                    </div>
                                    <div class="col">
                                        <div class="form-group mb-4">
                                            <label class="col-md-4 p-0">Discount</label>
                                            <div class="col-md-0 border-bottom p-0">
                                                <input type="number" placeholder=" " name="discount"
                                                    class="form-control p-0 border-1"> </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group mb-4">
                                            <label class="col-md-0 p-0">Promotional Price</label>
                                            <div class="col-md-0 border-bottom p-0">
                                                <input type="number" placeholder=" " name="giakhuyenmai"
                                                    class="form-control p-0 border-1"> </div>
                                        </div>
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