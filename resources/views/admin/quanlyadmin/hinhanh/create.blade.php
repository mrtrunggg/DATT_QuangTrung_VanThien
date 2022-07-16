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
                <form class="mb-5" method="POST" action="{{route('xylythemha')}}" style="margin-left :20px" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="" class="col-form-label">Picture</label>
                            
                            <select class="form-control" name="masp" id="masp" disabled style="background-color: white;">
                                <option value="{{$dssanpham->id}} " selected>{{$dssanpham->tensp}}</option>
                            </select>
                           

                            <div class="form-group mb-2">
                                
                                <div class="col-md-6 border-bottom p-0">
                                    <input type="hidden" placeholder=" " name="masp"
                                        class="form-control p-0 border-0" value="{{$dssanpham->id}}"> </div>
                            </div>




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



        <table class="table text-nowrap" style="margin-left: 35px;">
            <thead>
                <tr>
                    <th class="border-top-0">Image</th>
                    <th class="border-top-0">Product</th>
                    <th class="border-top-0">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dshinhanh as $SP)
                            <tr>                   
                                <td>
                                    <img style="width:150px;height:80px" src="{!! url('filename/'.$SP->tenhinhanh.'') !!}">
                                </td>
                                <td>
                                    @foreach ($tensp as $TSP)
                                        @if ($TSP->id==$SP->masp)
                                            {{$TSP->tensp}}   
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{route('xylyxoahahehe',['HA'=>$SP->id])}}" class="button btn btn-primary">Delete</a>
                                </td>
                            </tr>              
                    @endforeach  
            </tbody>
        </table>
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