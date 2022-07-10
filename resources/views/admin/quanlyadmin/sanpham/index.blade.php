@extends('admin.app')
@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Product</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                {{-- <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                        <li><a href="#" class="fw-normal">Dashboard</a></li>
                    </ol>
                    <a href="https://www.wrappixel.com/templates/ampleadmin/" target="_blank"
                        class="btn btn-danger  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Upgrade
                        to Pro</a>
                </div> --}}
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
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">

                    <p>
                        <a href="{{route('themsp')}}" class="btn btn-primary pull-right">Add Product</a>
                    </p>
                   
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Name Product</th>
                                    <th class="border-top-0">Product Type</th>
                                    <th class="border-top-0">Color</th>
                                    <th class="border-top-0">Size</th>
                                    <th class="border-top-0">Picture</th>
                                    <th class="border-top-0">Quantily</th>
                                    <th class="border-top-0">Price</th>
                                    <th class="border-top-0">Discount</th>
                                    <th class="border-top-0">Promotional Price</th>
                                    <th class="border-top-0">Desc</th>
                                    <th class="border-top-0">Import Unit Price</th>
                                    <th class="border-top-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dsSanpham as $SP)
                                            <tr>                   
                                                <td>
                                                    {{$SP->tensp}}    
                                                </td>
                                                <td>
                                                    {{$SP->loaisp}}    
                                                </td>
                                                <td>
                                                    {{$SP->mausac}}    
                                                </td>
                                                <td>
                                                    {{$SP->kichthuoc}}    
                                                </td>
                                                <td>
                                                    <img style="width:150px;height:80px" src="{!! url('uploads/'.$SP->hinhanh.'') !!}">
                                                </td>
                                                <td>
                                                    {{$SP->soluong}}    
                                                </td>
                                                <td>
                                                    {{$SP->giaban}}    
                                                </td>
                                                <td>
                                                    {{$SP->discount}}    
                                                </td>
                                                <td>
                                                    {{$SP->giakhuyenmai}}    
                                                </td>
                                                <td>
                                                    {{$SP->mota}}    
                                                </td>
                                                <td>
                                                    {{$SP->dongianhap}}    
                                                </td>
                                                <td>
                                                   
                                                    @if($SP->trangthai == 0)
                                                    <p>Not in stock</p>
                                                    @else
                                                    <p>In stock</p>
                                                    @endif    
                                                </td>
                                                <td class="column2">
                                                    <a href="{{route('suasp',['SP'=>$SP->id])}}"  >Edit |</a>
                                                    <a href="{{route('xoasp',['SP'=>$SP->id])}}" onclick="return confirm('Bạn có muốn xoá không?')">Delete</a>  
                                                </td>
                                            </tr>              
                                    @endforeach  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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
    <footer class="footer text-center"> 2021 © Ample Admin brought to you by <a
            href="https://www.wrappixel.com/">wrappixel.com</a>
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>





@endsection