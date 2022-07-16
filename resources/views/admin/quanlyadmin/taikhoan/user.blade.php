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

        <div style="display:flex; margin-bottom:20px;">
            <form action="{{route('timkiemtentkuser')}}" method="get" style="margin-right: 20px">
                <input type="search" name="search" placeholder="Type your keyword...">
                <button type="submit">Search</i></button>
            </form>
    
            <form action="{{route('timkiemloaitkuser')}}" method="get">
                <select name="search23" style="height: 27px; width: 150px;">
                    <option value="0">Banned</option>
                    <option value="1">Active</option>
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
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">User Name</th>
                                    {{-- <th class="border-top-0">Password</th> --}}
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
                                                {{-- <td>
                                                    {{$TK->password}}    
                                                </td> --}}
                                                <td>
                                                    {{$TK->email}}    
                                                </td>
                                                <td>
                                                    {{$TK->dienthoai}}    
                                                </td>
                                                <td>
                                                    @if ($TK->hinhdaidien != null)
                                                        <img style="width:100px;height:80px" src="{!! url('uploads/'.$TK->hinhdaidien.'') !!}">
                                                    @else
                                                        <img style="width:100px;height:80px" src="{{asset('amado-master/img/core-img/account.jpg')}}" alt="">
                                                    @endif
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
                                                <td>
                                                    @if($TK->trangthai==1)
                                                        <button type="submit" class="btn btn-primary thay-doi-tt-hd btnthaydoi " data-id="{{$TK->id}}">
                                                            Lock Account
                                                        </button>
                                                    @endif  
                                                    @if($TK->trangthai==0)
                                                        <button type="submit" class="btn btn-primary thay-doi-tt-hd btnthaydoi " disabled>
                                                            Banned
                                                        </button>
                                                    @endif 
                                                </td>
                                                <td>
                                                    @if($TK->trangthai==0)
                                                        <button type="submit" class="btn btn-primary thay-doi-tt-hd-2 btnthaydoi " data-id="{{$TK->id}}">
                                                            Account unlock
                                                        </button>
                                                    @endif  
                                                </td>
                                                <td class="column2">
                                                    <a href="{{route('xylyxoaTKuser',['TK'=>$TK->id])}}" onclick="return confirm('Bạn có muốn xoá không?')">Delete</a>  
                                                </td>
                                            </tr>              
                                    @endforeach  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{$dstaikhoan->links()}}
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
<style>
    .table td, .table th {
    text-align: center;
    
    }
</style>

<script>
    $('.thay-doi-tt-hd').on('click', function(){

    var id =$(this).attr('data-id');

    $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type:"post",
        url: '/admin/taikhoan/editTTTK/' + id,
        data:{
            id: id,
            trangthai: 0,
            _token: '{{csrf_token()}}'
        },
        dataType:"json",

        
        success: function (data) {
            console.log(data);
            
            location.reload(true);
            },
        error: function (data, textStatus, errorThrown) {
            console.log(data);
            location.reload(false);
        },
    })
})


$('.thay-doi-tt-hd-2').on('click', function(){

var id =$(this).attr('data-id');

$.ajax({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    type:"post",
    url: '/admin/taikhoan/editTTTK/' + id,
    data:{
        id: id,
        trangthai: 1,
        _token: '{{csrf_token()}}'
    },
    dataType:"json",

    
    success: function (data) {
        console.log(data);
        
        location.reload(true);
        },
    error: function (data, textStatus, errorThrown) {
        console.log(data);
        location.reload(false);
    },
    })
})





</script>


@endsection