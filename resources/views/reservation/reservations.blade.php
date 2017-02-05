@extends('home')
@section('content')
	<form class="form-horizontal" method="post" action="#" name="reservation_list" id="iFormReservationList"
				novalidate="novalidate">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
						<h5>Current Reservations</h5>
					</div>
					<div class="widget-content nopadding">
						<table class="table table-bordered data-table">
								<thead>
									<tr>
										<th>Name</th>
										<th>Address</th>
										<th>Email</th>
										<th>Start</th>
										<th>Enad</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody id="iTbodyReservations"></tbody>
							</table>
						
						
					</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	<div class="modal fade" id="resCalendar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:90%; left: 30% !important;">
	<!-- div id="resCalendar" role="dialog" style="width:90%; left: 30% !important;" -->
	</div>	
@endsection	

@section('js-extra')
		<script src="/js/reservation.reservations.js"></script>
@endsection