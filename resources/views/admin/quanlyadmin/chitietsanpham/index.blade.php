@extends('admin.app')
@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Product Details</h4>
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

        <p>
            <a href="{{route('sanpham')}}" class="btn btn-primary pull-right">Back</a>
        </p>
        
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">

                    <p>
                        <a href="{{route('themct',['SP'=>$idsp])}}" class="btn btn-primary pull-right">Add Product</a>
                    </p>
                   
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Product name</th>
                                    <th class="border-top-0">Size</th>
                                    <th class="border-top-0">Quantity</th>
                                    <th class="border-top-0">Price</th>
                                    <th class="border-top-0">Discount</th>
                                    <th class="border-top-0">Promotional Price</th>
                                    <th class="border-top-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dsSanpham as $SP)
                                            <tr>             
                                                <td>
                                                    @foreach ($tensp as $TSP)
                                                        @if ($TSP->id==$SP->sanpham_id)
                                                            {{$TSP->tensp}}   
                                                        @endif
                                                    @endforeach
                                                     
                                                </td>
                                                <td>
                                                    {{$SP->kichthuoc}}    
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
                                                    @if($SP->trangthai == 0)
                                                    <p>Inactive</p>
                                                    @else
                                                    <p>Active</p>
                                                    @endif    
                                                </td>
                                                <td class="column2">
                                                    <a href="{{route('suactsp',['SP'=>$SP->id])}}"  >Edit |</a>
                                                    <a href="{{route('xoactsp',['SP'=>$SP->id])}}" onclick="return confirm('Bạn có muốn xoá không?')">Delete</a>  
                                                </td>
                                            </tr>  
                                            @empty
                                            <td>
                                                    No products detail
                                            </td>    
                                    @endforelse  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{$dsSanpham->links()}}
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

<style>


</style>


</div>





@endsection