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
                <form method="POST" acction="{{route('xulysuasp',['SP'=>$thongtin->id])}}" enctype="multipart/form-data"> 
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
                                    <label class="col-md-6 p-0">Product Type</label>
                                    <div class="col-md-6 border-bottom p-0">
                                            <select name="loaisp" style="width: 100%; border: transparent;">
                                                <option value="T-shirt" <?php if($thongtin->loaisp == 'T-shirt'){echo("selected");}?>>T-shirt</option>
                                                <option value="Coart" <?php if($thongtin->loaisp == 'Coart'){echo("selected");}?>>Coat</option>
                                                <option value="Shirt" <?php if($thongtin->loaisp == 'Shirt'){echo("selected");}?>>Shirt</option>
                                                <option value="Shorts" <?php if($thongtin->loaisp == 'Shorts'){echo("selected");}?>>Shorts</option>
                                                <option value="Trousers" <?php if($thongtin->loaisp == 'Trousers'){echo("selected");}?>>Trousers</option>
                                                <option value="Jeans" <?php if($thongtin->loaisp == 'Jeans'){echo("selected");}?>>Jeans</option>
                                            </select>
                                    </div>
                                </div>



                                <div class="form-group mb-2" style="margin-bottom: 20px !important;;">
                                    <label class="col-md-6 p-0">Color</label>
                                    <div class="col-md-6 border-bottom p-0">
                                            <select name="color" style="width: 100%; border: transparent;">
                                                <option value="Red" <?php if($thongtin->mausac == 'Red'){echo("selected");}?>>Red</option>
                                                <option value="Yellow" <?php if($thongtin->mausac == 'Yellow'){echo("selected");}?> >Yellow</option>
                                                <option value="Blue" <?php if($thongtin->mausac == 'Blue'){echo("selected");}?>>Blue</option>
                                                <option value="Green" <?php if($thongtin->mausac == 'Green'){echo("selected");}?>>Green</option>
                                                <option value="Violet" <?php if($thongtin->mausac == 'Violet'){echo("selected");}?>>Violet</option>
                                                <option value="White" <?php if($thongtin->mausac == 'White'){echo("selected");}?>>White</option>
                                                <option value="Black" <?php if($thongtin->mausac == 'Black'){echo("selected");}?>>Black</option>
                                                <option value="Orange" <?php if($thongtin->mausac == 'Orange'){echo("selected");}?>>Orange</option>
                                            </select>
                                    </div>
                                </div>




                               
                            
                                <div class="form-group mb-2">
                                    <label class="col-md-6 p-0">Picture</label>
                                    <div class="col-md-6 border-bottom p-0">
                                        <input type="file" placeholder=" " name="hinhanh"
                                            class="form-control p-0 border-0" value="{{$thongtin->hinhanh}}"> </div>
                                </div>
                              
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Describe</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <textarea rows="5" name="desc" class="form-control p-0 border-0">{{$thongtin->mota}}</textarea>
                                    </div>
                                </div>
                                {{-- <div class="form-group mb-2">
                                    <label class="col-md-6 p-0">Import Unit Price</label>
                                    <div class="col-md-6 border-bottom p-0">
                                        <input type="number" placeholder=" " name="dongianhap"
                                            class="form-control p-0 border-0" value="{{$thongtin->dongianhap}}"> </div>
                                </div> --}}
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