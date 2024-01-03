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
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    {!! Form::open(['route' => 'user.login','class' => 'login-form','id' => 'login_form']) !!}
    @component('Components.selectLocal') 16 @endcomponent
    <h3 class="form-title font-green">{{ _t('auth.sign_in') }}</h3>
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        <span> {{ _t('auth.enter_any_user_name_password') }}.  </span>
    </div>
    <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">{{ _t('auth.username') }}</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off"
               placeholder="{{ _t('auth.username') }}" name="username"/></div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">{{ _t('auth.password') }}</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off"
               placeholder="{{ _t('auth.password') }}" name="password"/></div>
    {!! defineFilter('loginBottom', '', 'root') !!}
    <div class="form-actions">
        <button type="button" data-style="contract"
                class="btn dark ladda-button loggMe uppercase">{{ _t('auth.login') }}</button>
        <label class="rememberme check mt-checkbox mt-checkbox-outline">
            <input type="checkbox" name="remember" value="1"/>{{ _t('auth.remember_me') }}
            <span></span>
        </label>
        <a href="javascript:;" id="forget-password"
           class="forget-password">{{ _t('auth.forgot_your_password') }}</a>
    </div>
    {{--    <div class="login-options">
        <h4>Or login with</h4>
        <ul class="social-icons">
        <li>
        <a class="social-icon-color facebook" data-original-title="facebook" href="{{ isset($facebook)?$facebook:'#' }}"></a>
        </li>
        <li>
        <a class="social-icon-color twitter" data-original-title="Twitter" href="{{ isset($facebook)?$twitter:'#' }}"></a>
        </li>
        <li>
        <a class="social-icon-color googleplus" data-original-title="Goole Plus" href="javascript:;"></a>
        </li>
        <li>
        <a class="social-icon-color linkedin" data-original-title="Linkedin" href="javascript:;"></a>
        </li>
        </ul>
        </div>--}}
    <div class="create-account">
        <p>
            <a href="#maintenance" data-toggle="modal" id="register-btn"
               class="uppercase">{{ _t('auth.create_an_account') }}</a>
        </p>
    </div>
    {!! Form::close() !!}
<!--</form>-->
    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <!--  <form class="forget-form" action="javascript:;" method="post" style="display:none;">-->
    {!! Form::open(['route' => 'user.password.email','class' => 'forget-form','id' => 'forget_form']) !!}
    @component('Components.selectLocal') 16 @endcomponent
    <div class="requestPassWrap">
        <h3 class="font-green">{{ _t('auth.forgot_your_password')}}</h3>
        <p>{{ _t('auth.enter_email_to_reset_password') }} </p>
        <div class="form-group">
            <input class="form-control placeholder-no-fix form-group" type="text" autocomplete="off"
                   placeholder="{{ _t('auth.e-mail') }}" name="email"/>
        </div>
        <div class="form-actions">
            <button type="button" id="back-btn"
                    class="btn dark btn-outline backToLogin">{{ _t('auth.back') }}</button>
            <button type="button"
                    class="btn dark btn-success uppercase pull-right ladda-button requestPassword"
                    data-style="contract">{{_t('auth.submit')}}</button>
        </div>
    </div>
    <div class="requestSent">
        @component('Components.selectLocal') 16 @endcomponent
        <h3><i class="fa fa-check"></i>{{ _t('auth.check_inbox') }}</h3>
        <p>{{ _t('auth.password_mail_text') }}</p>
        <button type="button" class="btn blue backToLogin fromReset">{{ _t('auth.back') }}</button>
    </div>
{!! Form::close() !!}
<!-- END FORGOT PASSWORD FORM -->
</div>
<div class="login-footer">
    <div class="row bs-reset" style="margin: 0px;">
        <div class="col-xs-12 bs-reset">
            <div class="login-copyright text-center">
                <p>{{ _t('auth.copyright') }} &copy; <?php echo date("Y"); ?></p>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="maintenance">
    <div class="modal-dialog">
        <div class="modal-content" style="padding:20px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
    
            <div class="modal-body">
                <h4>Closed For Maintenance</h4>
            </div>
            <div class="modal-footer">          
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>    
        </div>
        
    </div>
</div>
@include('GuestLayout.footer')