@extends('admin.app')
@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Invoice</h4>
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
            <a href="{{route('indexHdb')}}" class="btn btn-primary pull-right">Back</a>
        </p>
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <p class="text-uppercase">
                Invoice
            </p>
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Customer Name</th>
                                    <th class="border-top-0">Staff's Name</th>
                                    <th class="border-top-0">Invoice Date</th>
                                    <th class="border-top-0">Total Money</th>
                                    <th class="border-top-0">Describe</th>
                                    <th class="border-top-0">Receiver's Information</th>
                                    <th class="border-top-0">Recipient's email</th>
                                    <th class="border-top-0">Recipient's phone number</th>
                                    <th class="border-top-0">Receiver's address</th>
                                    <th class="border-top-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dshoadonban3 as $SP)
                                            <tr>                   
                                                <td>
                                                    @foreach ($tenkh as $TSP)
                                                        @if ($TSP->id==$SP->khachhang_id)
                                                            {{$TSP->tendangnhap}}   
                                                        @endif
                                                    @endforeach     
                                                </td>
                                                <td>
                                                    {{$SP->nhanvien_id}}    
                                                </td>
                                                <td>
                                                    {{$SP->ngaylap}}    
                                                </td>
                                                <td>
                                                    {{$SP->tongtien}}    
                                                </td>
                                                <td>
                                                    {{$SP->mota}}    
                                                </td>
                                                <td>
                                                    {{$SP->thongtinnguoinhan}}    
                                                </td>
                                                <td>
                                                    {{$SP->email_nguoinhan}}    
                                                </td>
                                                <td>
                                                    {{$SP->sodienthoai_nguoinhan}}    
                                                </td>
                                                <td>
                                                    {{$SP->diachi_nguoinhan}}    
                                                </td>
                                                <td>
                                                    @if($SP->trangthai==1)
                                                        Unconfimred
                                                    @elseif($SP->trangthai==2)
                                                        Confirm
                                                    @endif   
                                                </td>
                                            </tr>              
                                    @endforeach  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <p class="text-uppercase">
                Invoice Detail
            </p>
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Invoice Code</th>
                                    <th class="border-top-0">Product Name</th>
                                    <th class="border-top-0">Quantity</th>
                                    <th class="border-top-0">Unit Price</th>
                                    <th class="border-top-0">Into Money</th>
                                    <th class="border-top-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dscthoadonban as $SP)
                                            <tr>                   
                                                <td>
                                                    {{$SP->hoadonban_id}}    
                                                </td>
                                                <td>
                                                    @foreach ($tensp as $TSP)
                                                        @if ($TSP->id==$SP->sanpham_id)
                                                            {{$TSP->tensp}}   
                                                        @endif
                                                    @endforeach      
                                                </td>
                                                <td>
                                                    {{$SP->soluong}}    
                                                </td>
                                                <td>
                                                    {{$SP->dongia}}    
                                                </td>
                                                <td>
                                                    {{$SP->thanhtien}}    
                                                </td>
                                                <td>
                                                    @if($SP->trangthai==1)
                                                        Unconfimred
                                                    @elseif($SP->trangthai==2)
                                                        Confirm
                                                    @endif    
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