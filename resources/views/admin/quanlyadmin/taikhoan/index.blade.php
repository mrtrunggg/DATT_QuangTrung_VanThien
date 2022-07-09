@extends('admin.app')
@section('content')
<div class="page-wrapper">
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
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">

                    <p>
                        <a href="{{route('formthemTK')}}" class="btn btn-primary pull-right">Add Account</a>
                    </p>
                   
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">User Name</th>
                                    <th class="border-top-0">Password</th>
                                    <th class="border-top-0">Email</th>
                                    <th class="border-top-0">Phone Number</th>
                                    <th class="border-top-0">Avatar</th>
                                    <th class="border-top-0">Full Name</th>
                                    <th class="border-top-0">Address</th>
                                    <th class="border-top-0">Account Type</th>
                                    <th class="border-top-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dstaikhoan as $TK)
                                            <tr>                   
                                                <td>
                                                    {{$TK->tendangnhap}}    
                                                </td>
                                                <td>
                                                    {{$TK->password}}    
                                                </td>
                                                <td>
                                                    {{$TK->email}}    
                                                </td>
                                                <td>
                                                    {{$TK->dienthoai}}    
                                                </td>
                                                <td>
                                                    <img style="width:150px;height:80px" src="{!! url('uploads/'.$TK->hinhdaidien.'') !!}">
                                                </td>
                                                <td>
                                                    {{$TK->hoten}}    
                                                </td>
                                                <td>
                                                    {{$TK->diachi}}    
                                                </td>
                                                <td>
                                                      
                                                    @if($TK->loaitk == 0)
                                                    <p>User</p>
                                                    @elseif($TK->loaitk == 1)
                                                    <p>Staff</p>
                                                    @else
                                                    <p>Manage</p>
                                                    @endif    
                                                </td>
                                                <td>
                                                    @if($TK->trangthai == 0)
                                                    <p>Disable</p>
                                                    @else
                                                    <p>Enable</p>
                                                    @endif
                                                
                                                </td>
                                                <td class="column2">
                                                    <a href="{{route('SuaTK',['TK'=>$TK->id])}}"  >Edit |</a>
                                                    <a href="{{route('xylyxoaTK',['TK'=>$TK->id])}}" onclick="return confirm('Bạn có muốn xoá không?')">Delete</a>  
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