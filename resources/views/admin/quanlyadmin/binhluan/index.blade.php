@extends('admin.app')
@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Comment</h4>
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
            <form action="{{route('timkiemsanpham')}}" method="get" style="margin-right: 20px">
                <select name="search" style="height: 27px; width: 150px;">
                    @foreach($tensp as $a)
                        <option value="{{$a->id}}">{{$a->tensp}}</option>
                    @endforeach 
                </select>   
                
                <button type="submit">Search</button>
            </form>

            <form action="{{route('timkiemloaisanpham')}}" method="get" style="margin-right: 20px">
                <select name="searchloaisp" style="height: 27px; width: 150px;">
                    <option value="0">Comment lock</option>
                    <option value="1">Comment active</option>
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
                                    <th class="border-top-0">ID Comment</th>
                                    <th class="border-top-0">Username</th>
                                    <th class="border-top-0">Email</th>
                                    <th class="border-top-0">Describe</th>
                                    <th class="border-top-0">Product</th>
                                    <th class="border-top-0">Date</th>
                                    <th class="border-top-0">Status</th>                                  
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($dsbl as $BL)
                                @if($BL->taikhoan_id != Null)
                                            <tr>                   
                                                <td>
                                                    {{$BL->id}}    
                                                </td>
                                                <td>
                                                    {{$BL->tendangnhap}}    
                                                </td>
                                                <td>
                                                    {{$BL->email}}    
                                                </td>
                                                
                                                <td>
                                                    {{$BL->mota}}
                                                    <ul>
                                                    Rep:
                                                        @foreach($dsbinhluan as $admin)
                                                       
                                                        @if($admin -> traloibinhluan_id == $BL->id )
                                                        <li style="list-style-type: decimal; color: blue; margin: 0 0 0 30px;">
                                                             {{$admin->mota}}
                                                        </li>
                                                        @endif
                                                        @endforeach
                                                    </ul> 
                                                    @if($BL->trangthai==1)
                                                    <textarea class="form-control reply_comment_{{$BL->id}}"rows="3"></textarea>
                                                    <button class="btn btn-default btn-xs btn-reply-comment" 
                                                    data-product_id = "{{$BL->sanpham_id}}"
                                                    data-comment_id ="{{$BL->id}}">Rep</button> 
                                                    @endif  
                                                    @if($BL->trangthai==0)
                                                    <textarea class="form-control reply_comment_{{$BL->id}}"rows="3" readonly></textarea>
                                                    <button disabled class="btn btn-default btn-xs btn-reply-comment" 
                                                    data-product_id = "{{$BL->sanpham_id}}"
                                                    data-comment_id ="{{$BL->id}}">Rep</button> 
                                                    @endif    
                                                                                               
                                                </td>
                                                <td>
                                                    @foreach ($tensp as $TSP)
                                                        @if ($TSP->id==$BL->sanpham_id)
                                                            {{$TSP->tensp}}   
                                                        @endif
                                                    @endforeach   
                                                </td>
                                                <td>
                                                    {{$BL->ngaybl}}    
                                                </td>
                                                <td>
                                                    @if($BL->trangthai == 0)
                                                    <p>Disable</p>
                                                    @else
                                                    <p>Able</p>
                                                    @endif  
                                                </td>
                                                <td>
                                                    @if($BL->trangthai==1)
                                                    <button type="submit" class="btn btn-primary thay-doi-tt-hd btnthaydoi " data-id="{{$BL->id}}">
                                                        Comment lock
                                                    </button>
                                                    @endif  
                                                    @if($BL->trangthai==0)
                                                        <button type="submit" class="btn btn-primary thay-doi-tt-hd btnthaydoi " disabled>
                                                            Comments banned
                                                        </button>
                                                    @endif 
                                                </td>
                                            </tr>
                                            @endif              
                                    @endforeach  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{$dsbl->links()}}
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
<script type ="text/javascript">

$('.thay-doi-tt-hd').on('click', function(){

    var id =$(this).attr('data-id');

    $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type:"post",
        url: '/admin/Comment/editTTBL/' + id,
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



    $('.btn-reply-comment').click(function(){


        var id = $(this).data('comment_id');
        var mota = $('.reply_comment_'+id).val();

        var sanpham_id = $(this).data('product_id');
        $.ajax({
            url:'/admin/Comment/reply-comment/',
            type: "POST",
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{mota:mota,id:id,sanpham_id:sanpham_id, trangthai:1,},
            success:function(data){
                $('.reply_comment_'+id).val('');
                location.reload(true);
            }
        });
    })
    </script>
@endsection