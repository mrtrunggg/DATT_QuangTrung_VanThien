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
                <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                        <li><a href="#" class="fw-normal">Dashboard</a></li>
                    </ol>
                    <a href="https://www.wrappixel.com/templates/ampleadmin/" target="_blank"
                        class="btn btn-danger  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Upgrade
                        to Pro</a>
                </div>
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
                                    <th class="border-top-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dshoadonban as $SP)
                                            <tr>                   
                                                <td>
                                                    {{$SP->khachhang_id}}    
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
                                                    <input type="hidden" value="{{$SP->id}}" name="id_edit">
                                                    <select name="trangthai" id="thay-doi-tt-hd">
                                                        <option value="1" <?php if($SP->trangthai == '1'){echo("selected");}?>>Waiting for processing</option>
                                                        <option value="2" <?php if($SP->trangthai == '2'){echo("selected");}?>>Processed</option>                                                    
                                                    </select>
                                                </td>
                                                <script type="text/javascript">
                                                    $.ajaxSetup({
                                                        headers: {
                                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                        }
                                                    });
                                                    $('#thay-doi-tt-hd').on('change', function(){
                                                        
                                                        const id = $('input[name="id_edit"]').val();
                                                        const trangthai = $('select[name="trangthai"]').val();
                                                        $.ajax({
                                                            headers: {
                                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                            },
                                                            type:"post",
                                                            url: '/hoadon/editTTHdb/' + id,
                                                            data:{
                                                                id: id,
                                                                trangthai: trangthai,
                                                                _token: '{{csrf_token()}}'
                                                            },
                                                            dataType:"json",
                                                            success: function (data) {
                                                                console.log(data);
                                                                },
                                                            error: function (data, textStatus, errorThrown) {
                                                                console.log(data);

                                                            },
                                                        })
                                                    })
                                                </script>
                                                <td class="column2">
                                                    <a href="{{route('viewcthd',['SP'=>$SP->id])}}"  >View |</a>
                                                    <a href="{{route('xylyxoaHDB',['SP'=>$SP->id])}}" onclick="return confirm('Bạn có muốn xoá không?')">Delete</a>  
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