@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="/css/dashboard.css"/>
		@yield('css-extra')
@endsection

@section('body')

    <!--Header-part-->
    <div id="header">
        <h1><a href="/">SRRS Admin</a></h1>
    </div>
    <!--close-Header-part-->


    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse">
        <ul class="nav">
						<li class="">
							<a title="" href="">
                 <span class="text">Welcome {{ Auth::user()->name }}</span>
							</a>	
            </li>
						 <li class="">
                <a title="" href="/password/">
                    <i class="icon icon-lock"></i> <span class="text">Change Password</span>
                </a>
            </li>
            <li class="">
                <a title="" href="lock_screen.html">
                    <i class="icon icon-lock"></i> <span class="text">Lock Screen</span>
                </a>
            </li>
            <li class="">
                <a title="" href="/logout/"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a>
            </li>
        </ul>
    </div>
    <!--close-top-Header-menu-->
    <!--start-top-serch-->
    <!--
    <div id="search">
      <input type="text" placeholder="Search here..."/>
      <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
    </div>
    -->
    <!--close-top-serch-->
    <!--sidebar-menu-->
    <div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard </a>
        <ul>
            @role('admin')
            <li class="submenu">
                <a href="#"><i class="icon icon-home"></i> <span>Resource Management</span></a>
                <ul>
                    <li><a href="/resource/create/">Resources</a></li>
                    <li><a href="/category/create/">Categories</a></li>
                </ul>
            </li>
            @endrole
            <li class="submenu">
                <a href="#"><i class="icon-calendar"></i> <span>Resource Reservation</span></a>
                <ul>
                    <li><a href="/reservation/categories/">Resources</a></li>
                    <li><a href="/reservation/reservations/">Reservations</a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#"><i class="icon-signal"></i> <span>Statistics</span></a>
                <ul>
                    <li><a href="/reports/reservations/">Past Reservations</a></li>
                    <li><a href="/reports/resources/">Available Resources</a></li>
                </ul>
            </li>
            @role('admin')
            <li><a href="/users/index/"><i class="icon-user"></i> <span>User Management</span></a></li>
            @endrole
        </ul>
    </div>
    <!--sidebar-menu-->

    <!--main-container-part-->
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb">
                <a href="/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a>
            </div>
        </div>
        <!--End-breadcrumbs-->

        <!--Action boxes-->
        @yield('content')
        <!--End-Action boxes-->

        <hr/>

        <!--end-main-container-part-->

        <!--Footer-part-->

        <div class="row-fluid">
            <div id="footer" class="span12">&copy; {{date('Y')}} Resource Reservation System</div>
        </div>
    </div>

    <!--end-Footer-part-->
@endsection

@section('js')
    <script src="/js/jquery.plugins.js"></script>
    <script src="/js/dashboard.js"></script>
    @yield('js-extra')
@endsection