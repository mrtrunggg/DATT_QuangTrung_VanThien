<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin6">
           
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            
            <a class="navbar-brand" href= {{route('admin.dashboard')}}>
                <!-- Logo icon -->
                <b class="logo-icon">
                    <!-- Dark Logo icon -->
                    
                    <img src={{ asset('admin1/plugins/images/logo-icon.png')}} alt="homepage" />
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span class="logo-text">
                    <!-- dark Logo text -->
                    <img src={{ asset('admin1/plugins/images/logo-text.png')}} alt="homepage" />
                </span>
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
           
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav ms-auto d-flex align-items-center">

                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                {{-- <li class=" in">
                    <form role="search" class="app-search d-none d-md-block me-3">
                        <input type="text" placeholder="Search..." class="form-control mt-0">
                        <a href="" class="active">
                            <i class="fa fa-search"></i>
                        </a>
                    </form>
                </li> --}}
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
          

                <div class="dropdown" style="margin-right: 20px">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <div style="display:flex; align-items: center">
                            <p style="color: #ffff; margin-top: 20px; padding-right: 20px;">Admin {{auth()->guard('admin')->user()->tendangnhap}}</p>
                            <div style="width: 40px; height: 40px; border-radius: 50px;">
                                @if (auth()->guard('admin')->user()->hinhdaidien != null)
                                    <img style="border-radius: 50px; width:100%; height: 100%;" src="{{asset('uploads/'.auth()->guard('admin')->user()->hinhdaidien)}}" alt="">
                                @else
                                    <img style="border-radius: 50px; width:100%; height: 100%;" src="{{asset('amado-master/img/core-img/admin.png')}}" alt="">
                                @endif
                            </div>
                        </div>    
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li>
                            <a class="dropdown-item" href="{{ route('information') }}">
                                Information
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('changepassw') }}">Change Password</a>
                        </li>
                        <li class="">
                            <a class="dropdown-item" href="{{ route('admin.logout') }}">
                                <i class="fa fa-sign-out fa-lg"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>


                
                
                
         

                





                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>


<style>

.logout-btn{
    margin-right: 20px;
    background-color: #f7e9e9;
    color: white;
}

</style>