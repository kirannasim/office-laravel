<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    @include('GuestLayout.head_login')
</head>
<style type="text/css">
    #user-login h3, #user-login p, .checkbox-container .mb-1, button .ladda-label{
        color: white;
    }
    button .ladda-label{
        text-transform: uppercase;
        margin-top: 1px !important;
    }
    .loggMe{
        padding-top: 5px;
    }
    #user-login h3{
        font-size: 22px;
        margin-bottom: 10px !important;
    }
    #user-login p{
        font-size: 14px;
        margin-bottom: unset;
    }
    .checkbox-container .mb-1{
        font-size: 13px;
    }

    #user-login input{
        border-radius: unset;
        height: 35px;
    }

    #user-login button{
        border-radius: unset;
        background: rgb(210,38,48);
        height: 35px;
    }
    #user-login{
        background-repeat: no-repeat;
        background-color: #000;
        background-position: center center;
    }
    .login-area{
        width: 400px;
        margin: auto;
    }

    @media(max-width: 430px){
        .login-area{
            width: 100%;
        }
    }

    @media (min-width: 250px) and (max-width: 575px){
        .signin-img .col-xs-4{
            width: 33% !important;
        }
        .signin-img .col-xs-4{
            width: 33% !important;
        }
        .signin-img .col-xs-4{
            width: 33% !important;
        }
    }

    @media(min-width: 992px) and (max-width: 1150px){
        .login-area{
            margin-left: -40px;
        }
    }
    .signin-img .img-1{
        width: 75%;
    }
    .signin-img .img-3{
        width: 84%;
    }
    .signin-img .img-2{
        width: 110%;
    }
    *{
        font-family: unset;
    }
    .localSwitcher{
        display: none;
    }
</style>
<body class="login" id="user-login" style="background-image:url({{ asset('photos/admin/LoginPage.png') }}">


<div class="container-fluid vh-100" data-backgound="register">
    @component('Components.selectLocal') 16 @endcomponent
    <div class="row minvh-100" style="position: relative">
       <!--  <div class="col-lg-6 p-0 register-bg-container">
            <div class="register-bg" style="background-image:url({{ asset('sf.png') }}">
                <img class="login-logo" src="{{ asset('photos/admin/LoginPage.png') }}"/>
            </div>
        </div> -->
        <div class="col-lg-6 align-self-center text-center m-auto pt-5 pb-5">
            <h3 class="mb-3">{{ _t('auth.user_login') }}</h3>
            <p class="description-paragraph mb-1">{{ _t('auth.login_user_text') }}</p>
            <p class="description-paragraph mb-5"><a href="{{route('user.register')}}" class="text-link" style="font-size: 14px">{{ _t('auth.create_an_account') }}</a></p>
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                    {!! Form::open(['route' => ['user.login', 'redirect_back' => \Request::input('redirect_back', 'office')],'class' => 'login-form','id' => 'login_form']) !!}
                    <div class="alert alert-danger display-hide">
                        <button name="close" class="close" data-close="alert"></button>
                        <span>{{ _t('auth.enter_any_user_name_password') }}. </span>
                    </div>
                    <div class="row login-area">
                        <div class="col-12">
                            <div class="form-group text-left">
                                <input type="text" name="username" class="form-control" id="username" placeholder="{{ _t('auth.username') }}" tabindex="1" required />
                            </div>
                            <div class="form-group position-relative text-left">
                                <input type="password" name="password" class="form-control pass_log_id" id="password" placeholder="{{ _t('auth.password') }}" style="padding-right: 45px;" tabindex="2" required />
                                <div class="password-eye" data-password="password-eye" style="padding: unset;">
                                    <i class="fas fa-eye cursor-pointer toggle-password" data-password="password-eye-show"></i>
                                    <i class="fas fa-eye-slash cursor-pointer" 
                                       style="display: none"></i>
                                </div>
                            </div>
                            <div class="form-group text-left">
                                <label class="checkbox-container">
                                    <input type="checkbox" name="remember" id="remember" class="radio-button" value="1" tabindex="3" />
                                    <span class="checkmark mr-1 align-middle"></span>
                                    <span class="mb-1">{{ _t('auth.remember_me') }}</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 mb-3 text-left">
                            <button name="loggMe" class="loggMe btn btn-block btn-lg button-submit ladda-button"
                                    data-style="slide-right" type="button">
                                    <span class="ladda-label">
                                        {{ _t('auth.signin')  }}
                                    </span>
                            </button>
                            <p class="forgot-password text-link mt-2 d-inline-block cursor-pointer" data-toggle="modal"
                               data-target="#forgotPasswordModal"
                               style="font-size: 13px">{{ _t('auth.forgot_your_password') }}</p>
                        </div>
                        <div class="col-sm-12">
                            {!! defineFilter('loginBottom', '', 'root') !!}
                        </div>
                        <div class="row signin-img" style="margin-top: 40px !important; margin-left: 0px; margin:auto;">
                            <div class="col-md-4 col-sm-4 col-xs-4">
                                <img class="img-1" src="{{ asset('photos/admin/EOS.png') }}">
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">
                                <img class="img-2" src="{{ asset('photos/admin/XOOM.png') }}">
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">
                                <img class="img-3" src="{{ asset('photos/admin/SOHO.png') }}">
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="row login-footer">
            <div class="col-12">
                <div class="login-copyright text-right">
                    <a href="{{ route('information.view', ['page' => 'copyright'])}}" target="_blank">
                        <p style="font-size: 14px; color: #585958">2020 © ELYSIUM CAPITAL LIMITED</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal -->

<div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog"
     aria-labelledby="forgotPasswordModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content pt-0 p-3">
            <div class="modal-body text-center">
                <button name="cls" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                
                {!! Form::open(['route' => 'user.password.email','name'=>'a','class' => 'forget-form m-0','id' => 'forget_form']) !!}
                <div class="requestPassWrap">
                    <h3 class="mt-5 mb-3">{{ _t('auth.forgot_your_password') }}</h3>
                    <p class="description-paragraph mb-3">{{ _t('auth.enter_email_to_reset_password') }} </p>
                    <div class="form-group">
                        <input class="form-control placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="{{ _t('auth.e-mail') }}" name="email" />
                    </div>
                    <div class="form-actions">
                        <button name="bck" type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ _t('auth.back') }}</button>
                        <button name="sbm" type="button"
                                class="btn dark btn-success uppercase pull-right ladda-button requestPassword"
                                data-style="slide-right">
                            <span class="ladda-label"> {{_t('auth.submit')}}</span>
                        </button>
                    </div>
                </div>
                <div class="requestSent">
                    <h3><i class="fa fa-check"></i>Check inbox</h3>
                    <p>{{ _t('auth.password_mail_text')}}</p>
                    <button name="bkk" type="button" class="btn btn-secondary" data-dismiss="modal">{{ _t('auth.back') }}</button>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
<!-- <div class="modal" tabindex="-1" role="dialog" id="maintenance">
    <div class="modal-dialog">
        <div class="modal-content" style="padding:20px;">
            <div class="modal-header" style="padding: 0px;border-bottom: none;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background: none;height: auto;">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
    
            <div class="modal-body">
                <div class="container" style="display: flex;justify-content:center;">
                    <img src="{{asset('images/support.png')}}" style="margin: auto;width: 150px;" />
                </div>
                <h4 style="text-align: center;">Closed For Maintenance</h4>
            </div>
        </div>
        
    </div>
</div> -->
<script>
    "use strict";
    jQuery(document).ready(function () {
        var images = [];
        @foreach($sliderImages as $image)
        images.push("{{ asset($image) }}");
        @endforeach

        $('.register-bg').backstretch(images, {
                fade: 1000,
                duration: 8000
            }
        );

        $("body").on('click','.toggle-password',function(){
            $(this).toggleClass("fa-eye fa-eye-slash");

            if ($(".pass_log_id").attr("type") === "password") {
                $(".pass_log_id").attr("type", "text");
            } else {
                $(".pass_log_id").attr("type", "password");
            }
        });

        // $('[data-toggle=modal]').click(function(){
        //     var id = $(this).attr('href');

        //     $(id).modal('show');
        // })
    });
</script>
@include('GuestLayout.footer')
