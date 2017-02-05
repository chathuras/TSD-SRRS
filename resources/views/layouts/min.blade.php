@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="/css/dashboard.css"/>
		@yield('css-extra')
@endsection

@section('body')

    <!--Header-part-->
		<div id="header">
			<h1><a href="dashboard.html">SRRS Admin</a></h1>
		</div>
		<!--close-Header-part--> 

    <!--main-container-part-->
   
    @yield('content')
       
		<!--Footer-part-->

		<div class="row-fluid">
			<div id="footer" class="span12"> 2016 &copy; School Resource Reservation System </div>
		</div>

		<!--end-Footer-part-->
@endsection

@section('js')
    <script src="/js/jquery.plugins.js"></script>
    <script src="/js/dashboard.js"></script>
    @yield('js-extra')
@endsection