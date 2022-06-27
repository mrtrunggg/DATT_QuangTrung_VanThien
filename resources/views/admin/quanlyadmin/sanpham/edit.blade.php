@extends('admin.app')
@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Edit Product</h4>
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
            <a href="{{route('sanpham')}}" class="btn btn-primary pull-right">Back</a>
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
                <form method="POST" acction="{{route('xulysuasp',['SP'=>$thongtin->id])}}"> 
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal form-material">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Name Product</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" placeholder=" " name="tensp"
                                            class="form-control p-0 border-0" value="{{$thongtin->tensp}}"> </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Product Type</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" placeholder=" " name="loaisp"
                                            class="form-control p-0 border-0" value="{{$thongtin->loaisp}}"> </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="col-md-6 p-0">Color</label>
                                    <div class="col-md-6 border-bottom p-0">
                                        <input type="text" placeholder=" " name="color"
                                            class="form-control p-0 border-0" value="{{$thongtin->mausac}}"> </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="col-md-6 p-0">Size</label>
                                    <div class="col-md-6 border-bottom p-0">
                                        <input type="text" placeholder=" " name="size"
                                            class="form-control p-0 border-0" value="{{$thongtin->kichthuoc}}"> </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="col-md-6 p-0">Picture</label>
                                    <div class="col-md-6 border-bottom p-0">
                                        <input type="file" placeholder=" " name="hinhanh"
                                            class="form-control p-0 border-0" value="{{$thongtin->hinhanh}}"> </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group mb-4">
                                            <label class="col-md-4 p-0">Quantily</label>
                                            <div class="col-md-0 border-bottom p-0">
                                                <input type="number" placeholder=" " name="soluong"
                                                    class="form-control p-0 border-1" value="{{$thongtin->soluong}}"> </div>
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
                                    <label class="col-md-12 p-0">Describe</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <textarea rows="5" name="desc" class="form-control p-0 border-0">{{$thongtin->mota}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="col-md-6 p-0">Import Unit Price</label>
                                    <div class="col-md-6 border-bottom p-0">
                                        <input type="number" placeholder=" " name="dongianhap"
                                            class="form-control p-0 border-0" value="{{$thongtin->dongianhap}}"> </div>
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