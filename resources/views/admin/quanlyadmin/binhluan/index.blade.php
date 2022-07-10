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
                                    <th class="border-top-0">ID Comment</th>
                                    <th class="border-top-0">Username</th>
                                    <th class="border-top-0">Email</th>
                                    <th class="border-top-0">Describe</th>
                                    <th class="border-top-0">Product</th>
                                    <th class="border-top-0">Date</th>                                  
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
                                                </br><textarea class="form-control reply_comment_{{$BL->id}}"rows="3"></textarea>
                                                </br><button class="btn btn-default btn-xs btn-reply-comment" 
                                                data-product_id = "{{$BL->sanpham_id}}"
                                                data-comment_id ="{{$BL->id}}">Rep</button>                                            
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
                                            </tr>
                                            @endif              
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
<script type ="text/javascript">
    $('.btn-reply-comment').click(function(){


        var id = $(this).data('comment_id');
        var mota = $('.reply_comment_'+id).val();

        var sanpham_id = $(this).data('product_id');
        $.ajax({
            url:"{{url('/Comment/reply-comment')}}",
            type: "POST",
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{mota:mota,id:id,sanpham_id:sanpham_id},
            success:function(data){
                $('.reply_comment_'+id).val('');
            }
        });
    })
    </script>
@endsection