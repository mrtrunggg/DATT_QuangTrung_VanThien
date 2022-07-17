@extends('admin.quanlyadmin.thongke.partials.index')
@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Dashboard</h4>
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
        <div class="row justify-content-center">
        <div class="col-lg-3 col-md-12">
                        <div class="white-box analytics-info" style="background: #f8f5f5;">
                            <h3 class="box-title">Sales</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <!-- {{-- <li class="ms-auto"><span class="counter text-success">{{$thongtienne}}$</span></li> --}} -->
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="white-box analytics-info" style="background: #f8f5f5;">
                            <h3 class="box-title">Sales profit</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash2"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <!-- {{-- <li class="ms-auto"><span class="counter text-purple">{{$loinhuanne}}$</span></li> --}} -->
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="white-box analytics-info" style="background: #f8f5f5;">
                            <h3 class="box-title">Products in stock</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash3"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <!-- {{-- <li class="ms-auto"><span class="counter text-info">{{$tonkhone}}</span> --}} -->
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="white-box analytics-info" style="background: #f8f5f5;">
                            <h3 class="box-title">Total amount spent</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash4"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <!-- {{-- <li class="ms-auto"><span class="counter text-danger">
                                    @foreach($tongtienmuahang as $a)
                                    {{$a->tongtien}}$
                                    @endforeach
                                </span></li> --}} -->
                            </ul>
                        </div>
                    </div>
                </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row page-breadcrumb bg-white">
        <canvas id="hoandon" id-thongso="data" width="auto" height="100"></canvas>
    </div>
    <div class="row page-breadcrumb bg-white">
        <canvas id="ngay" id-nay="data" width="auto" height="100"></canvas>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
  
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
