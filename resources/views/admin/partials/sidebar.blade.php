<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item pt-2">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href= {{route('thongke')}}
                        aria-expanded="false">
                        <i class="far fa-clock" aria-hidden="true"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item pt-2">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href= {{route('sanpham')}}
                        aria-expanded="false">
                        <i class="fas fa-dolly-flatbed" aria-hidden="true"></i>
                        <span class="hide-menu">Product</span>
                    </a>
                </li>
                <li class="sidebar-item pt-2">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href= {{route('indexTk')}}
                        aria-expanded="false">
                        <i class="far fa-user" aria-hidden="true"></i>
                        <span class="hide-menu">Account</span>
                    </a>
                </li>
                <li class="sidebar-item pt-2">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href= {{route('indexHdb')}}
                        aria-expanded="false">
                        <i class="far fa-money-bill-alt" aria-hidden="true"></i>
                        <span class="hide-menu">Invoice</span>
                    </a>
                </li>
                <li class="sidebar-item pt-2">

                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href= {{route('indexcomment')}}
                        aria-expanded="false">
                        <i class="far fa-comments" aria-hidden="true"></i>
                        <span class="hide-menu">Comment</span>
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href= {{route('indexNK')}}
                        aria-expanded="false">
                        <i class="fas fa-warehouse" aria-hidden="true"></i>
                        <span class="hide-menu">Import management</span>
                    </a>
                </li>
                <li class="sidebar-item pt-2">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href= {{route('indexHA')}}
                        aria-expanded="false">
                        <i class="fas fa-file-image" aria-hidden="true"></i>
                        <span class="hide-menu">Image</span>

                    </a>
                </li>
                {{-- <li class="sidebar-item pt-2">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href= {{route('thongke')}}
                        aria-expanded="false">
                        <i class="fas fa-chart-line" aria-hidden="true"></i>
                        <span class="hide-menu">Statistical</span>
                    </a>
                </li> --}}
            </ul>
            
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>