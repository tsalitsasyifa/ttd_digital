<div class="header-top-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="header-top-wraper">
                    <div class="row">
                        <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                            <div class="menu-switcher-pro">
                                <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn"></button>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                            <div class="header-top-menu tabl-d-n">
                                <div class="breadcome-heading">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                            <div class="header-right-info">
                                <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                    <li class="nav-item">
                                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                            <i class="icon nalika-user nalika-user-rounded header-riht-inf" aria-hidden="true"></i>
                                            <span class="admin-name">
                                                {{ Auth::user()->name }}
                                            </span>
                                            <i class="icon nalika-down-arrow nalika-angle-dw nalika-icon"></i>
                                        </a>
                                        <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                    <span class="icon nalika-unlocked author-log-ic"></span> Logout
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu start -->
<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul class="mobile-menu-nav">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <span class="icon nalika-unlocked author-log-ic"></span> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            <li>
                                <a href="{{ route('home') }}">
                                    <i class="icon nalika-home icon-wrap"></i>
                                    <span class="mini-click-non">Home</span>
                                </a>
                            </li>
                            @if ( Auth::user()->role == "Admin" or Auth::user()->role == "Administrator")
                            <li>
                                <a href="{{route('document.index')}}">
                                    <i class="icon nalika-new-file icon-wrap"></i>
                                    <span class="mini-click-non">Tambah Dokumen</span>
                                </a>
                            </li>
                            @endif
                            @if ( Auth::user()->role == "VP" or Auth::user()->role == "Administrator")
                            <li>
                                <a href="{{route('approval.index')}}">
                                    <i class="icon nalika-thumb-up icon-wrap"></i>
                                    <span class="mini-click-non">Persetujuan Dokumen</span>
                                </a>
                            </li>
                            @endif
                            <li>
                                <a href="{{route('tracking.index')}}">
                                    <i class="icon nalika-folder icon-wrap"></i>
                                    <span class="mini-click-non">Pelacakan Dokumen</span>
                                </a>
                            </li>
                            @if ( Auth::user()->role == "Administrator")
                            <li>
                                <a href="{{route('user.index')}}">
                                    <i class="icon nalika-user icon-wrap"></i>
                                    <span class="mini-click-non">Pengaturan Pengguna</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('division.index')}}">
                                    <i class="icon nalika-pie-chart icon-wrap"></i>
                                    <span class="mini-click-non">Pengaturan Divisi</span>
                                </a>
                            </li>
                            @endif
                            @if ( Auth::user()->role == "Admin" or Auth::user()->role == "Administrator")
                            <li>
                                <a href="{{route('tracking.tertunda')}}">
                                    <i class="icon nalika-forms icon-wrap"></i>
                                    <span class="mini-click-non">Dokumen Tertunda</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu end -->
