@extends('admin.app')
@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Add Picture</h4>
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
            <a href="{{route('indexHA')}}" class="btn btn-primary pull-right">Back</a>
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
                <form class="mb-5" method="POST" action="{{route('xylythemha')}}" style="margin-left :20px" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Picture</label>
                            <select class="form-control" name="masp" id="masp">
                                @foreach ($dssanpham as $a)
                                <option value="{{$a->id}}">{{$a->tensp}}</option>
                                @endforeach  
                              </select>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Select image</label>
                            <input required  type="file" class="form-control" name="filename[]" id="images" multiple>

                        </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input style="font-size:20px;" type="submit" value="Save" class="button btn btn-primary">
                            <span class="submitting"></span>
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