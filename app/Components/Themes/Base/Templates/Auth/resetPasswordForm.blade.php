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

<body class="login standard-login">
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="#">
        <img src="{{ logo() }}" alt=""/>
    </a>
</div>
<!-- END LOGO -->
<div class="content resetBox">
    @component('Components.selectLocal') 16 @endcomponent
    {!! Form::open(['route' => $action,'class' => 'passwordResetForm','id' => 'passwordResetForm']) !!}
    <h3 class="form-title">{{ _t('auth.reset_password') }}</h3>
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
        <label class="control-label visible-ie8 visible-ie9">{{ __('auth.password') }}</label>
        <div class="input-icon">
            <i class="fa fa-lock"></i>
            <input class="form-control placeholder-no-fix" type="password" autocomplete="off"
                   placeholder="Password" name="password">
        </div>
    </div>
    <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">{{ __('auth.password') }}</label>
        <div class="input-icon">
            <i class="fa fa-lock"></i>
            <input class="form-control placeholder-no-fix" type="password" autocomplete="off"
                   placeholder="Password" name="password_confirmation">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <button type="button" class="btn green passwordResetButton ladda-button"
                    data-style="contract"> {{ _t('auth.request_change') }}
            </button>
        </div>
    </div>
    {!! Form::close() !!}
    <div class="requestSent">
        <h3><i class="fa fa-check"></i>{{ _t('auth.password_changed') }}</h3>
        <a href="{{ $loginLink }}">
            <button type="button" class="btn blue backToLogin fromReset">{{_t('auth.login') }}</button>
        </a>
    </div>
</div>

<script>
    $(function () {
        $('.passwordResetButton').click(function () {
            $.post('{{ route(strtolower(getScope()).'.password.reset.request') }}', $('.passwordResetForm').serialize(), function () {
                $('.requestSent').slideDown().siblings('form').hide();
            });
        });
    });
</script>
@include('GuestLayout.footer')