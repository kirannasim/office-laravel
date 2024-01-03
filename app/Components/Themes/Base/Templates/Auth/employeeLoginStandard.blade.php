<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    @include('GuestLayout.head')
</head>
<!-- END HEAD -->

<body class=" login">
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="index.html">
        <img src="{{ themeAssetUrl('pages/img/logo-big.png') }}" alt=""/> </a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
@if(isset($resetForm) && $resetForm)
    <div class="content passwordResetPortion">
        {!! Form::open(['route' => $action,'class' => 'passwordResetForm','id' => 'passwordResetForm']) !!}
        <h3 class="form-title">Reset password</h3>
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Email</label>
            <div class="input-icon">
                <i class="fa fa-envelope"></i>
                <input class="form-control placeholder-no-fix" value="{{ $email }}" type="email" autocomplete="off"
                       placeholder="Email" name="email">
            </div>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off"
                       placeholder="Password" name="password">
            </div>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off"
                       placeholder="Password" name="password_confirmation">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <button type="button" class="btn green passwordResetButton ladda-button" data-style="contract">Request
                </button>
            </div>
        </div>
        {!! Form::close() !!}
        <div class="requestSent">
            <h3><i class="fa fa-check"></i>Password changed</h3>
            <a href="{{ $loginLink }}">
                <button type="button" class="btn blue backToLogin fromReset">Login</button>
            </a>
        </div>
    </div>
@else
    <div class="content employee">
        @component('Components.selectLocal') 16 @endcomponent
    <!-- BEGIN LOGIN FORM -->
        {{--<form class="login-form" action="index.html" method="post">--}}
        {!! Form::open(['route' => $action,'class' => 'login-form','id' => 'login_form']) !!}
        <div class="form-title">
            <span class="form-title">{{_t('auth.employee_login')}}</span>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">{{_t('auth.username')}}</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off"
                   placeholder="Username" name="username"/></div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">{{_t('auth.password')}}</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off"
                   placeholder="Password" name="password"/></div>
        <div class="form-actions">
            <button type="submit" class="btn red but btn-block uppercase ladda-button loggMe"
                    data-style="contract">{{_t('auth.signin')}}
            </button>
        </div>
        <div class="form-actions">
            <div class="pull-left">
                <label class="rememberme mt-checkbox mt-checkbox-outline">
                    <input type="checkbox" name="remember" value="1"/> {{_t('auth.remember_me')}}
                    <span></span>
                </label>
            </div>
            <div class="pull-right forget-password-block">
                <a href="javascript:;" id="forget-password"
                   class="forget-password">{{_t('auth.forgot_your_password')}}</a>
            </div>
        </div>
        <!--<div class="create-account">
            <p>
                <a href="javascript:;" class="btn-primary btn" id="register-btn">Create an account</a>
            </p>
        </div>-->
        {!! Form::close() !!}
    <!-- END LOGIN FORM -->
        <!-- BEGIN FORGOT PASSWORD FORM -->
        {!! Form::open(['route' => 'employee.password.email','class' => 'forget-form','id' => 'forget_form']) !!}
        <div class="requestPassWrap">
            <h3>{{ _t('auth.forgot_password') }}</h3>
            <p> {{ _t('auth.enter_email_to_reset_password') }} </p>
            <div class="form-group">
                <div class="input-icon">
                    <i class="fa fa-envelope"></i>
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off"
                           placeholder="{{ _t('auth.e-mail') }}"
                           name="email"/></div>
            </div>
            <div class="form-actions row">
                <button type="button" class="btn green pull-right ladda-button requestPassword" data-style="contract"
                        data-spinner-color="#FFF">
                    {{ _t('auth.submit') }}
                </button>
                <button type="button" class="btn blue pull-right backToLogin">
                    {{ _t('auth.back') }}
                </button>
            </div>
        </div>
        <div class="requestSent">
            <h3><i class="fa fa-check"></i>Check inbox</h3>
            <p>The password reset information has been sent to your email with a link to reset your password.</p>
            <button type="button" class="btn blue backToLogin fromReset">Back</button>
        </div>
    {!! Form::close() !!}    <!-- END FORGOT PASSWORD FORM -->
    </div>
@endif
<div class="login-footer">
    <div class="row bs-reset" style="margin: 0px;">
        <div class="col-xs-12 bs-reset">
            <div class="login-copyright text-center">
                <p>{{ _t('auth.copyright') }} &copy; <?php echo date("Y"); ?></p>
            </div>
        </div>
    </div>
</div>
@include('GuestLayout.footer')
