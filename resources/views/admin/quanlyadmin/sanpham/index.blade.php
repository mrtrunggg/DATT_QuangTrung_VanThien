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

<div style="display:flex; margin-bottom:20px;">
        <form action="{{route('timkiemsp')}}" method="get" style="margin-right: 20px">
            <input type="search" name="search" placeholder="Type your keyword...">
            <button type="submit">Search</i></button>
        </form>

        <form action="{{route('timkiemloaisp')}}" method="get">
                <select name="searchloaisp" style="height: 27px; width: 150px;">
                    <option value="">Product type search</option>
                    <option value="T-shirt">T-shirt</option>
                    <option value="Coart">Coat</option>
                    <option value="Shirt">Shirt</option>
                    <option value="Shorts">Shorts</option>
                    <option value="Trousers">Trousers</option>
                    <option value="Spandex pants">Spandex pants</option>
                </select>
            <button type="submit">Search</button>
        </form>

</div>
        
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
                                    <th class="border-top-0">Number order</th>
                                    <th class="border-top-0">Name Product</th>
                                    <th class="border-top-0">Product Type</th>
                                    <th class="border-top-0">Color</th>
                                    <th class="border-top-0">Picture</th>
                                    <th class="border-top-0 motane">Desc</th>
                                    <th class="border-top-0 motane">Function</th>
                                    <th class="border-top-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dsSanpham as $SP)
                                            <tr>                
                                                <td>
                                                    {{++$i}}
                                                </td>   
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

                                                    @if ($SP->hinhanh != null)
                                                        <img style="width:150px;height:80px" src="{!! url('uploads/'.$SP->hinhanh.'') !!}">
                                                    @else
                                                        <img style="height:80px;text-align: center;width: 120px;" src="{{asset('uploads/noimage.png')}}" alt="">
                                                    @endif





                                                </td>
                                                <td>
                                                   
                                                      <div style="width: 500px; word-break: break-word; white-space: normal;"> {{$SP->mota}} </div>
                                                     
                                                </td>
                                                <td style="display: grid;">
                                                   <a href="{{route('themha',['HA'=>$SP->id])}}"><button type="button" class="btn btn-info" style="margin-bottom:10px; width: 100%; ">Picture</button></a>
                                                <a href="{{route('chitietsanpham',['SP'=>$SP->id])}}"><button type="button" class="btn btn-warning">Product Detail</button></a>
                                                      
                                                </td>
                                                <td>
                                                    @if($SP->trangthai == 0)
                                                    <p>Inactive</p>
                                                    @else
                                                    <p>Active</p>
                                                    @endif    
                                                </td>
                                                <td class="column2">
                                                    <a href="{{route('suasp',['SP'=>$SP->id])}}"  >Edit |</a>
                                                    <a href="{{route('xoasp',['SP'=>$SP->id])}}" onclick="return confirm('B???n c?? mu???n xo?? kh??ng?')">Delete</a>  
                                                </td>
                                            </tr>  
                                            @empty
                                            <td>
                                                    No products 
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
    <footer class="footer text-center"> 2021 ?? Ample Admin brought to you by <a
            href="https://www.wrappixel.com/">wrappixel.com</a>
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->

<style>


</style>


</div>





@endsection