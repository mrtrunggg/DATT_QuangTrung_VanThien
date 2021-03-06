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
            <form action="{{route('timkiemnhapkho')}}" method="get" style="margin-right: 20px">
                <select name="search" style="height: 27px; width: 150px;">
                    <option value="1">Confirm</option>
                    <option value="2">Confirmed</option>
                </select>
                <button type="submit">Search</i></button>
            </form>
            <form action="{{route('timkiemtheongayHDNne')}}" method="get" style="margin-left:20px">
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
                    <p>
                        <a href="{{route('formthemHDN')}}" class="btn btn-primary pull-right">Add Invoice</a>
                    </p>
                    {{-- <p>
                        <a href="{{route('formthemhdn2')}}" class="btn btn-primary pull-right">Add ??dsad</a>
                    </p> --}}
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Supplier</th>
                                    <th class="border-top-0">Invoice Person</th>
                                    <th class="border-top-0">Invoice Date</th>
                                    <th class="border-top-0">Total Money</th>
                                    <th class="border-top-0">Describe</th>
                                    <th class="border-top-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dshoadonnhap as $SP)
                                            <tr id="{{$SP->id}}">                   
                                                <td>
                                                    {{$SP->tennhacungcap_id}}    
                                                </td>
                                                <td>
                                                    @foreach ($tenkh as $TSP)
                                                        @if ($TSP->id == $SP->taikhoan_id)
                                                            {{$TSP->tendangnhap}}   
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
                                                    @if($SP->trangthai==1)
                                                        <button type="submit" class="btn btn-primary thay-doi-tt-hd btnthaydoi " data-id="{{$SP->id}}">
                                                            Confirm
                                                        </button>
                                                    @endif  
                                                    @if($SP->trangthai==2)
                                                        <button type="submit" class="btn btn-primary thay-doi-tt-hd btnthaydoi " disabled>
                                                            Confirmed
                                                        </button>
                                                    @endif
                                                </td>
                                               
                                                <td class="column2">
                                                    {{-- <a href="{{route('viewcthd',['SP'=>$SP->id])}}"  >View |</a> --}}
                                                    <a href="#" class="deletehdn" data-id="{{$SP->id}}" onclick="return confirm('B???n c?? mu???n xo?? kh??ng?')">Delete</a>  
                                                </td>
                                                <td>
                                                    <a href="{{route('viewcthdnhap',['SP'=>$SP->id])}}">
                                                        <button type="button" class="btn btn-primary btn_showne" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            View
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>              
                                    @endforeach  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{$dshoadonnhap->links()}}
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
</div>

 
</div>
<script type="text/javascript">

    $('.thay-doi-tt-hd').on('click', function(){

        var id =$(this).attr('data-id');

        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"post",
            url: '/admin/hoadonnhap/editTTHdb/' + id,
            data:{
                id: id,
                trangthai: 2,
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








    $(document).ajaxStop(function() {
        setInterval(function() {
            location.reload();
        }, 200);
    });
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.deletehdn').on('click', function(){
     
        const id = $(this).attr('data-id')
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"post",
            url: '/admin/hoadonnhap/delete/' + id,
            data:{
                id: id,
                _token: $('meta[name="crfs-token"]').attr('content')
            },
            dataType:"json",
            success: function (data) {
                location.reload(true); 
            },
            error: function (data, textStatus, errorThrown) {
                location.reload(false); 
            },
        })
        event.preventDefault();
    })

//     $('.btn_showne').on('click', function(){
//         var url22=$(this).attr('data-url22');   
//         var url=$(this).attr('data-url');
//      $.ajax({
//          type:"get",
//          url: url,
//          dataType: "json",
//          success: function(response) {
//             console.log(response)

//             $('td#tennhacungcap').text(response.data.tennhacungcap)
//             $('td#taikhoan_id').text(response.data.taikhoan_id)
//             $('td#ngaylap').text(response.data.ngaylap)
//             $('td#tongtien').text(response.data.tongtien)
//             $('td#mota').text(response.data.mota)
//             $('td#trangthai').text(response.data.trangthai)
            
//          },
//          error: function (data, textStatus, errorThrown) {
            
//          },
        
//      })

     
//         $.ajax({
//             type: "get",
//             url: url22,
//             dataType: "json",
//             success: function (response) {
//                 // console.log(response);
//                 $('#123cthd').html("");
//                 $.each(response.data2, function (key, item) {
//                     $('#123cthd').append('<tr>\
//                         <td>' + .hoadonnhap_id + '</td>\
//                         <td>' + item.sanpham_id + '</td>\
//                         <td>' + item.soluong + '</td>\
//                         <td>' + item.thanhtien + '</td>\
//                         <td>' + item.trangthai + '</td>\
//                     \</tr>');
//                 });
//             }
//         });
        





//      event.preventDefault();
//  })






</script>


@endsection





        
         
         

        
     
