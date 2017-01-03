@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="/css/dashboard.css"/>
@endsection

@section('content')

    <!--Header-part-->
    <div id="header">
        <h1><a href="dashboard.html">SRRS Admin</a></h1>
    </div>
    <!--close-Header-part-->


    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse">
        <ul class="nav">
            <li class="dropdown" id="profile-messages">
                <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle">
                    <i class="icon icon-user"></i> <span class="text">Welcome {{ Auth::user()->name }}</span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-key"></i> Change Password</a></li>
                </ul>
            </li>
            <li class="">
                <a title="" href="lock_screen.html">
                    <i class="icon icon-lock"></i> <span class="text">Lock Screen</span>
                </a>
            </li>
            <li class="">
                <a title="" href="/logout"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a>
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
            <li class="submenu">
                <a href="#"><i class="icon icon-home"></i> <span>Resource Management</span></a>
                <ul>
                    <li><a href="resource_create.html">Resources</a></li>
                    <li><a href="resource_categories.html">Categories</a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#"><i class="icon-calendar"></i> <span>Resource Reservation</span></a>
                <ul>
                    <li><a href="resource_cat_view.html">Resources</a></li>
                    <li><a href="reservation.html">Reservations</a></li>
                </ul>
            </li>
            <li><a href="charts.html"><i class="icon icon-signal"></i> <span>Statistics</span></a></li>
            <li><a href="manage_users.html"><i class="icon-user"></i> <span>User Management</span></a></li>
        </ul>
    </div>
    <!--sidebar-menu-->

    <!--main-container-part-->
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb">
                <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a>
            </div>
        </div>
        <!--End-breadcrumbs-->

        <!--Action boxes-->
        <div class="container-fluid">
            <div class="span12">
                <div class="quick-actions_homepage">
                    <ul class="quick-actions">
                        <li class="bg_lb span3">
                            <div class="metro-nav-block nav-block-blue">
                                <a data-original-title="" href="#">
                                    <i class="icon-eye-open"></i>
                                    <div class="info">+897</div>
                                    <div class="status">Unique Visitor</div>
                                </a>
                            </div>
                        </li>
                        <li class="bg_lb span3">
                            <div class="metro-nav-block nav-block-blue">
                                <a data-original-title="" href="#">
                                    <i class="icon-eye-open"></i>
                                    <div class="info">+897</div>
                                    <div class="status">Unique Visitor</div>
                                </a>
                            </div>
                        </li>
                        <li class="bg_lb span3">
                            <div class="metro-nav-block nav-block-blue">
                                <a data-original-title="" href="#">
                                    <i class="icon-eye-open"></i>
                                    <div class="info">+897</div>
                                    <div class="status">Unique Visitor</div>
                                </a>
                            </div>
                        </li>
                        <li class="bg_lb span3">
                            <div class="metro-nav-block nav-block-blue">
                                <a data-original-title="" href="#">
                                    <i class="icon-eye-open"></i>
                                    <div class="info">+897</div>
                                    <div class="status">Unique Visitor</div>
                                </a>
                            </div>
                        </li>
                        <li class="bg_lb span3">
                            <div class="metro-nav-block nav-block-blue">
                                <a data-original-title="" href="#">
                                    <i class="icon-eye-open"></i>
                                    <div class="info">+897</div>
                                    <div class="status">Unique Visitor</div>
                                </a>
                            </div>
                        </li>
                        <li class="bg_lb span3">
                            <div class="metro-nav-block nav-block-blue">
                                <a data-original-title="" href="#">
                                    <i class="icon-eye-open"></i>
                                    <div class="info">+897</div>
                                    <div class="status">Unique Visitor</div>
                                </a>
                            </div>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
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
@endsection