@extends('admin.app')
@section('content')
{{-- <div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Account</h4>
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

        <div style="display:flex; margin-bottom:20px;">
            <form action="{{route('sptimkiemsp')}}" method="get" style="margin-right: 20px">
                <input type="search" name="a" placeholder="Type your keyword...">
                <button type="submit">Search</i></button>
            </form>
    
            <form action="{{route('sapxeptheodanhmuc')}}" method="get">
                    <select name="searchloaisp" style="height: 27px; width: 150px;">
                        <option value="0">Quantity</option>
                        <option value="1">Turnover</option> 
                    </select>
                <button type="submit">Search</button>
            </form>

            <form action="{{route('danhsachsptheongay')}}" method="get" style="margin-left:20px">
                <input type="date" value="<?php echo date('2022-06-30'); ?>" name="layngay" >  
                <button type="submit">Search</button>
                <input type="date" value="<?php echo date('2022-06-30'); ?>" name="denngay" > 
            </form>
    </div>


        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Product</th>
                                  
                                    <th class="border-top-0">Picture</th>
                                    <th class="border-top-0">Quantity</th>
                                    <th class="border-top-0">Turnover</th>
                                    <th class="border-top-0">Size</th>
                                    <th class="border-top-0">Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @forelse ($thongke as $TK)
                                            <tr>                   
                                                <td>
                                                    {{$TK->tensp}}    
                                                </td>

                                                <td>
                                                    <img style="width:150px;height:80px" src="{!! url('uploads/'.$TK->hinhanh.'') !!}">
                                                </td>
                                                <td>
                                                    {{$TK->soluong}}
                                                </td>
                                                <td>
                                                    {{$TK->thanhtien}}
                                                </td>
                                                <td>
                                                    {{$TK->kichco}}
                                                </td>
                                                <td>
                                                    {{$TK->updated_at}}
                                                </td>
                                            </tr> 
                                            @empty   
                                            <td>
                                                No product
                                            </td>         
                                    @endforelse  
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        {{$thongke->links()}}
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
</div> --}}
@endsection