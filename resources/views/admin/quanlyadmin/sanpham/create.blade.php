@extends('admin.app')
@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Add Product</h4>
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
                <form method="POST" action="{{route('xulythemsp')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal form-material">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Name Product</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" placeholder=" " name="tensp"
                                            class="form-control p-0 border-0"> </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-6 p-0">Product Type</label>
                                    <div class="col-md-6 border-bottom p-0">
                                            <select name="loaisp" style="width: 100%; border: transparent;">
                                                <option value="T-shirt">T-shirt</option>
                                                <option value="Coart">Coat</option>
                                                <option value="Shirt">Shirt</option>
                                                <option value="Shorts">Shorts</option>
                                                <option value="Trousers">Trousers</option>
                                                <option value="Jeans">Jeans</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="form-group mb-2" style="margin-bottom: 20px !important;;">
                                    <label class="col-md-6 p-0">Color</label>
                                    <div class="col-md-6 border-bottom p-0">
                                            <select name="color" style="width: 100%; border: transparent;">
                                                <option value="Red">Red</option>
                                                <option value="Yellow">Yellow</option>
                                                <option value="Blue">Blue</option>
                                                <option value="Green">Green</option>
                                                <option value="Violet">Violet</option>
                                                <option value="White">White</option>
                                                <option value="Black">Black</option>
                                                <option value="Orange">Orange</option>
                                            </select> </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="col-md-6 p-0">Picture</label>
                                    <div class="col-md-6 border-bottom p-0">
                                        <input type="file" placeholder=" " name="hinhanh"
                                            class="form-control p-0 border-0"> </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Describe</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <textarea rows="5" name="desc" class="form-control p-0 border-0"></textarea>
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