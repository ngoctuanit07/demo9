@extends('admin.layoutLlogin')
@section('content')
    <style>
        .wrapper {
            display: none !important;
        }
    </style>
    <div class="login-box">
        <div class="login-logo">

            @if(empty($web_setting[15]->value) or !file_exists(asset('').$web_setting[15]->value))
                @if($web_setting[66]->value=='1' and $web_setting[67]->value=='0')
                    <img src="{{asset('/resources/views/admin/images/admin_logo/scart-mid.png')}}"
                         class="ionic-hide">
                    <img src="{{asset('/resources/views/admin/images/admin_logo/scart-mid.png')}}"
                         class="android-hide">
                @elseif($web_setting[66]->value=='1' and $web_setting[67]->value=='1' or $web_setting[66]->value=='0' and $web_setting[67]->value=='1')
                    <img src="{{asset('/resources/views/admin/images/admin_logo/scart-mid.png')}}"
                         class="website-hide">
                @endif
            @else
                <img style="width: 60%" src="{{asset('').$web_setting[15]->value}}">
            @endif
                <div class="login-title-des col-md-12 p-b-41">
                    <a><b> {{ trans('labels.welcome_message') }}</b>{{ trans('labels.welcome_message_to') }}</a>
                </div>
        </div>
        <!-- /.login-logo -->
        <div class="wrap-login100 main-login">
            <p class="login-box-msg">{{ trans('labels.login_text') }}</p>

            <!-- if email or password are not correct -->
            @if( count($errors) > 0)
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">{{ trans('labels.Error') }}:</span>
                        {{ $error }}
                    </div>
                @endforeach
            @endif

            @if(Session::has('loginError'))
                <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">{{ trans('labels.Error') }}:</span>
                    {!! session('loginError') !!}
                </div>
            @endif

            {!! Form::open(array('url' =>'admin/checkLogin', 'method'=>'post', 'class'=>'form-validate')) !!}

            <div class=" wrap-input100 form-group has-feedback">
                {!! Form::email('email', '', array('class'=>'form-control input100 email-validate', 'id'=>'email')) !!}
                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                     {{ trans('labels.AdminEmailText') }}</span>
                <span class="help-block hidden"> {{ trans('labels.AdminEmailText') }}</span>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="wrap-input100 form-group has-feedback">
                <input type="password" name='password' class='form-control field-validate input100' value="">
                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                   {{ trans('labels.AdminPasswordText') }}</span>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>

            </div>
            <div class="row">

                <!-- /.col -->
                <div class="col-xs-4 container-login-btn">
                    {!! Form::submit(trans('labels.login'), array('id'=>'login', 'class'=>'btn login-btn btn-primary btn-block btn-flat' )) !!}
                </div>
                <!-- /.col -->
            </div>
            {!! Form::close() !!}

        </div>

        <!-- /.login-box-body -->
    </div>