@extends('base')
@section('content')
			<div class="container-fluid">
			<div class="row-fluid">
				<div class="span4">
				<div class="widget-box">
					<div class="widget-title bg_lg"><span class="icon"><i class="icon-link"></i></span>
						<h5>Quick Links</h5>
					</div>
					<div class="widget-content ">
						 <ul class="site-stats fix_hgt_home2">
								<li class="bg_lb"><a href="/category/create/" class="anchorTxt"><i class="icon-folder-close" style="font-size: 46px"></i><small>Create Categories</small></a> </li>
								<li class="bg_lg"><a href="/resource/create/" class="anchorTxt"><i class="icon-tags" style="font-size: 46px"></i><small>Create Resources </small></a></li>
								<li class="bg_ly"><a href="/reservation/categories/" class="anchorTxt"><i class="icon-check" style="font-size: 46px"></i> <small>Resources</small></a></li>
								<li class="bg_lo"><a href="/reservation/reservations/" class="anchorTxt"><i class="icon-calendar" style="font-size: 46px"></i><small>Reservations</small></a></li>
								<li class="bg_ls"><a href="/reports/index/" class="anchorTxt"><i class="icon-signal" style="font-size: 46px"></i><small>Statistics</small></a></li>
								<li class="bg_lb"><a href="/user/management/" class="anchorTxt"><i class="icon-user" style="font-size: 46px"></i><small>User Management</small></a></li>
							</ul>
					</div>
				</div>
			</div>
			 <div class="span4">
			<div class="widget-box">
							<div class="widget-title bg_lo"  data-toggle="collapse"> <span class="icon"> <i class="icon-calendar"></i> </span>
								<h5>Recent Reservations</h5>
							</div>
							<div class="widget-content nopadding updates fix_hgt_home in" id="collapseG3">
								@foreach($reservations as $reservation)
									<div class="new-update clearfix">
										<i class="icon-chevron-right"></i>
										<span class="update-notice">
											<a title="" href="#"><strong>Resource: {{ $reservation->name }} </strong></a>
											<span><strong>Purpose:  </strong>{{ $reservation->purpose}}</span>
											<span><strong>Duration:  </strong> <small>{{ $reservation->start}} - {{ $reservation->end}} </small> </span>
										</span>
										{{--<span class="update-date">--}}
											{{--<span class="update-day">11</span>jan--}}
										{{--</span>--}}
									</div>
								@endforeach
							</div>
						</div>
				</div>
				<div class="span4">
				<div class="widget-box">
					<div class="widget-title"><span class="icon"><i class="icon-user"></i></span>
						<h5>Recent user registrations</h5>
					</div>
					<div class="widget-content nopadding updates fix_hgt_home in" id="collapseG3">
						@foreach($users as $user)
							<div class="new-update clearfix">
								<i class="icon-chevron-right"></i>
								<span class="update-notice">
											<a title="" href="#"><strong>Name: {{ $user->name }} </strong></a>
											<span><strong>Email:  </strong>{{ $user->email}}</span>
											<span><strong>Registration date:  </strong> <small>{{ $user->created_at}} </small> </span>
										</span>
								{{--<span class="update-date">--}}
								{{--<span class="update-day">11</span>jan--}}
								{{--</span>--}}
							</div>
						@endforeach
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