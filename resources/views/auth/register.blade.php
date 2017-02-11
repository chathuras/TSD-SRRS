@extends('layouts.min')

@section('css-extra')
    <link rel="stylesheet" href="/css/crud.css"/>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="span3"></div>
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"> <i class="icon-user"></i> </span>
                    <h5>New user registration</h5>
                </div>
                <div class="widget-content nopadding">
                    <form action="/auth/register_user" method="POST" class="form-horizontal" id="iFormRegister">
                        {{ csrf_field() }}
                        <label class="control-label">Teacher/Student ID :</label>
                        <div class="controls">
                            <input type="text" placeholder="Teacher/Student ID" name="userId" id="iInputUserid" value="{{ old('userId') }}"/>
                            @if ($errors->has('userId'))
                                <span class="help-block error">
                                        <strong>{{ $errors->first('userId') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <label class="control-label">PIN Number :</label>
                        <div class="controls">
                            <input type="password" placeholder="PIN Number" name="pinNumber" id="iInputPinNum" value="{{ old('pinNumber') }}"/>
                            @if ($errors->has('pinNumber'))
                                <span class="help-block error">
                                        <strong>{{ $errors->first('pinNumber') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <label class="control-label">Password :</label>
                        <div class="controls">
                            <input type="password" placeholder="Password" name="password" id="iInputPasswd" value="{{ old('password') }}"/>
                            @if ($errors->has('password'))
                                <span class="help-block error">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <label class="control-label">Confirm Password :</label>
                        <div class="controls">
                            <input type="password" placeholder="Confirm Password" name="password_confirmation"
                                   id="iInputPasswdConfirm" value="{{ old('password_confirmation') }}"/>
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block error">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                        </div>
                        @if ($errors->has('email_address'))
                            <span class="help-block error">
                                        <strong>This user has been registered already</strong>
                                    </span>
                        @endif
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" id='register'>Register</button>
                            <button type="reset" class="btn btn-warning" id='reset'>Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="span3"></div>
    </div>
@endsection
