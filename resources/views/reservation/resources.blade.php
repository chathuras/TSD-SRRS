@extends('base')
@section('css-extra')
	<link href='/calendar/fullcalendar.min.css' rel='stylesheet' />
	<link href='/calendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
	<script src='/calendar/moment.min.js'></script>
	<script src='/calendar/jquery.min.js'></script>
	<script src='/calendar/fullcalendar.min.js'></script>
@endsection
@section('content')
	<form class="form-horizontal" method="post" action="#" name="resource_list" id="iListResource"
				novalidate="novalidate">
		<input type="hidden" name="category_id" value="{{ $category_id }}">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
						<h5>Available Resources</h5>
					</div>
					<div class="widget-content nopadding">
						<table class="table table-bordered data-table">
								<thead>
									<tr>
										<th>ID</th>
										<th>Name</th>
										<th>Description</th>
										<th>Location</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody id="iTbodyResources"></tbody>
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
		<script src="/js/reservation.js"></script>
@endsection