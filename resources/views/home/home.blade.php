@extends('base')
@section('content')
			<div class="container-fluid">
			<div class="row-fluid">
				<div class="span4">
				<div class="widget-box">
					<div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
						<h5>Quick Links</h5>
					</div>
					<div class="widget-content ">
						 <ul class="site-stats fix_hgt_home2">
								<li class="bg_lb"><a href="charts.html" class="anchorTxt"><i class="icon-user"></i> <strong>2540</strong> <small>Total Users</small></a> </li>
								<li class="bg_lg"><i class="icon-plus"></i> <strong>120</strong> <small>New Users </small></li>
								<li class="bg_ly"><i class="icon-shopping-cart"></i> <strong>656</strong> <small>Total Shop</small></li>
								<li class="bg_lo"><i class="icon-tag"></i> <strong>9540</strong> <small>Total Orders</small></li>
								<li class="bg_ls"><i class="icon-repeat"></i> <strong>10</strong> <small>Pending Orders</small></li>
								<li class="bg_lb"><i class="icon-globe"></i> <strong>8540</strong> <small>Online Orders</small></li>
							</ul>
					</div>
				</div>
			</div>
			 <div class="span4">
			<div class="widget-box">
							<div class="widget-title bg_lo"  data-toggle="collapse"> <span class="icon"> <i class="icon-chevron-down"></i> </span>
								<h5>News updates</h5>
							</div>
							<div class="widget-content nopadding updates fix_hgt_home in" id="collapseG3">
								<div class="new-update clearfix"><i class="icon-ok-sign"></i>
									<div class="update-done"><a title="" href="#"><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</strong></a> <span>dolor sit amet, consectetur adipiscing eli</span> </div>
									<div class="update-date"><span class="update-day">20</span>jan</div>
								</div>
								<div class="new-update clearfix"> <i class="icon-gift"></i> <span class="update-notice"> <a title="" href="#"><strong>Congratulation Maruti, Happy Birthday </strong></a> <span>many many happy returns of the day</span> </span> <span class="update-date"><span class="update-day">11</span>jan</span> </div>
								<div class="new-update clearfix"> <i class="icon-move"></i> <span class="update-alert"> <a title="" href="#"><strong>Maruti is a Responsive Admin theme</strong></a> <span>But already everything was solved. It will ...</span> </span> <span class="update-date"><span class="update-day">07</span>Jan</span> </div>
								<div class="new-update clearfix"> <i class="icon-leaf"></i> <span class="update-done"> <a title="" href="#"><strong>Envato approved Maruti Admin template</strong></a> <span>i am very happy to approved by TF</span> </span> <span class="update-date"><span class="update-day">05</span>jan</span> </div>
								<div class="new-update clearfix"> <i class="icon-question-sign"></i> <span class="update-notice"> <a title="" href="#"><strong>I am alwayse here if you have any question</strong></a> <span>we glad that you choose our template</span> </span> <span class="update-date"><span class="update-day">01</span>jan</span> </div>
							</div>
						</div>
				</div>
				<div class="span4">
				<div class="widget-box">
					<div class="widget-title"><span class="icon"><i class="icon-user"></i></span>
						<h5>Our Partner (Box with Fix height)</h5>
					</div>
					<div class="widget-content nopadding fix_hgt_home">
						<ul class="recent-posts">
							<li>
								<div class="user-thumb"> <img width="40" height="40" alt="User" src="img/demo/av1.jpg"> </div>
								<div class="article-post"> <span class="user-info">John Deo</span>
									<p>Web Desginer &amp; creative Front end developer</p>
								</div>
							</li>
							<li>
								<div class="user-thumb"> <img width="40" height="40" alt="User" src="img/demo/av2.jpg"> </div>
								<div class="article-post"> <span class="user-info">John Deo</span>
									<p>Web Desginer &amp; creative Front end developer</p>
								</div>
							</li>
							<li>
								<div class="user-thumb"> <img width="40" height="40" alt="User" src="img/demo/av4.jpg"> </div>
								<div class="article-post"> <span class="user-info">John Deo</span>
									<p>Web Desginer &amp; creative Front end developer</p>
								</div>
						</ul>
					</div>
				</div>
					</div>
			</div>
			 
		 
			</div>
		</div>
@endsection	

@section('js-extra')
		<script src="/js/reservation.reservations.js"></script>
@endsection