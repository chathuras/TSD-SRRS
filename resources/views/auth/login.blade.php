@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="/css/login.css" />
@endsection

@section('content')
    <div id="loginbox">
        <form id="loginform" class="form-vertical" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <div class="control-group{{  $errors->has('email') ? ' has-error' : '' }}">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg"><i class="fa fa-user icon-user"> </i></span>
                        <input id="email"
                               type="email"
                               name="email"
                               value="{{ old('email') }}"
                               placeholder=" Username"/>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="control-group{{  $errors->has('password') ? ' has-error' : '' }}">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_ly"><i class="fa fa-lock icon-lock"></i></span>
                        <input id="password" type="password" name="password" placeholder="Password"/>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <span class="pull-left"><a href="#" class="flip-link btn btn-info"
                                           id="to-recover">Lost password?</a></span>
                <span class="pull-right">
                    <button type="submit" class="btn btn-success">Login</button>
                </span>
            </div>
        </form>

        <form id="recoverform" action="#" class="form-vertical">
            <p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a
                password.</p>

            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lo"><i class="fa fa-envelope icon-envelope"></i></span>
                    <input type="text" placeholder="E-mail address"/>
                </div>
            </div>

            <div class="form-actions">
                <span class="pull-left">
                    <a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a>
                </span>
                <span class="pull-right"><a class="btn btn-info">Reecover</a></span>
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script src="/js/login.js"></script>
@endsection
