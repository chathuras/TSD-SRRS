	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<h4 class="modal-title" id="myModalLabel">Update Reservation</h4>
			</div>
			<div class="modal-body">
				<div class="row-fluid">
					<div class="span4">
						<div class="widget-box">
						<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
							<h5>Reservation Information</h5>
						</div>
						<div class="widget-content nopadding">
							<form action="#" method="POST" class="form-horizontal" id="iFormReservation">
								<input type="hidden" name="resource_id" value="{{ $resource_id }}">
								<label class="control-label">Purpose</label>
								<div class="controls">
									<textarea class="span11"  placeholder="Purpose"  id="iInputPurpose">{{$reservation->purpose or ''}}</textarea>
								</div>
								<label class="control-label">Name :</label>
								<div class="controls">
									<input type="text" class="span11" placeholder="Name" id="iInputName" value="{{ $reservation->name or ''}}"/>
								</div>
								<label class="control-label">Address</label>
								<div class="controls">
								<textarea class="span11" placeholder="Address" id="iInputAddress">{{ $reservation->address or '' }}</textarea>
								</div>
								<label class="control-label">NIC number :</label>
								<div class="controls">
								<input type="text" class="span11" placeholder="NIC number" id="iInputNIC" value="{{ $reservation->nic_number or ''}}"/>
								</div>
								<label class="control-label">Contact number :</label>
								<div class="controls">
								<input type="text" class="span11" placeholder="Contact number" id="iInputContactNum" value="{{ $reservation->nic_number or ''}}"/>
								</div>
								<label class="control-label">Email address :</label>
								<div class="controls">
								<input type="text" class="span11" placeholder="Email address" id="iInputEmail" value="{{ $reservation->email_address or ''}}"/>
								</div>
								<label class="control-label">Reservation Start Date :</label>
								<div class="controls">
								<input type="text" class="span11" placeholder="Reservation Start Date" id="iInputStartDate" value="{{ $reservation->start or ''}}"/>
								</div>
								<label class="control-label">Reservation End Date :</label>
								<div class="controls">
								<input type="text" class="span11" placeholder="Reservation End Date" id="iInputEndDate" value="{{ $reservation->end or ''}}"/>
								</div>
								<div class="form-actions">
									<button type="button" class="btn btn-success" id="resSave">Update</button>
									<button type="button" class="btn btn-success" id="btnResDelete">Delete</button>
									<button type="button" class="btn btn-warning" id="btnCancelRes">Close</button>
								</div>
							</form>
						</div>
						</div>
					</div>
			
					<div class="span8">
						<div class="widget-box widget-calendar">
							<div class="widget-title"> <span class="icon"><i class="icon-calendar"></i></span>
							<h5>Calendar</h5>
							</div>
							<div class="widget-content">
								<div id='calendar'></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
