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

        <div style="display:flex; margin-bottom:20px;">
            <form action="{{route('timkiemtenhd')}}" method="get" style="margin-right: 20px">
            
                <select name="search" style="height: 27px; width: 150px;">
                    <option value="1">Confirm</option>
                    <option value="2">Confirmed</option>
                </select>
                <button type="submit">Search</i></button>
            </form>
    
            <form action="{{route('timkiemloaihd')}}" method="get">
                <select name="searchloaisp" style="height: 27px; width: 150px;">
                    @foreach($tenkh as $a)
                        @if($a->trangthai != 0)
                        <option value="{{$a->id}}">{{$a->tendangnhap}}</option>
                        @endif
                    @endforeach 
                </select>   
               
                <button type="submit">Search</button>
            </form>
            <form action="{{route('timkiemtheongay')}}" method="get" style="margin-left:20px">
                <input type="date" value="<?php echo date('y-m-d'); ?>" name="layngay">  
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
                                    <th class="border-top-0">Customer Name</th>
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
                                @forelse ($dshoadonban as $SP)
                                            <tr>                   
                                                <td>
                                                    @foreach ($tenkh as $TSP)
                                                        @if($TSP->trangthai == 0 )
                                                            This account has been locked
                                                        @else
                                                            @if ($TSP->id==$SP->khachhang_id)
                                                                {{$TSP->tendangnhap}}   
                                                            @endif
                                                        @endif
                                                    @endforeach    
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
                                                        <button type="submit" class="btn btn-primary thay-doi-tt-hd btnthaydoi " data-id="{{$SP->id}}">
                                                            Confirm
                                                        </button>
                                                    @endif  
                                                    @if($SP->trangthai==3)
                                                        <button type="submit" class="btn btn-primary thay-doi-tt-hd3 btnthaydoi " data-id2="{{$SP->id}}">
                                                            Delivering
                                                        </button>
                                                    @endif 
                                                    @if($SP->trangthai==2)
                                                        <button type="submit" class="btn btn-primary thay-doi-tt-hd btnthaydoi" data-id3="{{$SP->id}}" disabled>
                                                            Complete
                                                        </button>
                                                    @endif
                                                </td>
                                                <td class="column2">
                                                    <a href="{{route('viewcthd',['SP'=>$SP->id])}}"  >View |</a>
                                                    <a href="{{route('xylyxoaHDB',['SP'=>$SP->id])}}" onclick="return confirm('Bạn có muốn xoá không?')">Delete</a>  
                                                </td>
                                            </tr>
                                            @empty
                                            <td>
                                                No Bill
                                            </td>              
                                    @endforelse  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{$dshoadonban->links()}}
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


<script type="text/javascript">
    function showaddhehehe() {
        var btn = document.getElementsByClassName("btnthaydoi");
        btn.disabled = true;
        btn.innerText = 'Confirmed...'
        alert(btn)
    }

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.thay-doi-tt-hd').on('click', function(){

        var id =$(this).attr('data-id');
        
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"post",
            url: '/admin/hoadon/editTTHdb/' + id,
            data:{
                id: id,
                trangthai: 3,
                _token: '{{csrf_token()}}'
            },
            dataType:"json",

            
            success: function (data) {
                console.log(data);
                
                // location.reload(true);
                },
            error: function (data, textStatus, errorThrown) {
                console.log(data);
                // location.reload(false);
            },
        })
    })
    $('.thay-doi-tt-hd3').on('click', function(){

        var id =$(this).attr('data-id2');
        
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"post",
            url: '/admin/hoadon/editTTHdb2/' + id,
            data:{
                id: id,
                trangthai: 2,
                _token: '{{csrf_token()}}'
            },
            dataType:"json",

            
            success: function (data) {
                console.log(data);
                
                // location.reload(true);
                },
            error: function (data, textStatus, errorThrown) {
                console.log(data);
                // location.reload(false);
            },
        })
    })



</script>



@endsection