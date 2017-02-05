@extends('layouts.min')
@section('css-extra')
		<link rel="stylesheet" href="/css/matrix-style.css" />
@endsection
@section('content')
<div class="container-fluid">
	<div class="span3"></div>
	<div class="span6">
	 <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-user"></i> </span>
          <h5>Change Password</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="/auth/change_password" method="POST" class="form-horizontal" id="iFormChangePassword">
              <label class="control-label">Current Passowrd :</label>
              <div class="controls">
                <input type="password"  placeholder="PIN Number" name="pinNumber" id="iInputPinNum"/>
              </div>
              <label class="control-label">New Password :</label>
              <div class="controls">
                <input type="password"   placeholder="Password"  name="passwd" id="iInputPasswd"/>
              </div>
              <label class="control-label">Confirm New Password :</label>
              <div class="controls">
                <input type="password"   placeholder="Confirm Password" name="passwdConfirm"  id="iInputPasswdConfirm"/>
              </div>
							<div class="form-actions">
								<button type="submit" class="btn btn-success" id='register'>Update</button>
								<button type="reset" class="btn btn-success" id='reset'>Reset</button>
							</div>
          </form>
        </div>
      </div>
	</div>
	<div class="span3"></div>
</div>	
@endsection
@section('js-extra')
		<script src="/js/register.js"></script>
@endsection