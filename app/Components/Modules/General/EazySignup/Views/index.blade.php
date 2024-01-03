@extends(ucfirst(getScope()).'.Layout.master')
@inject('hookServices','App\Blueprint\Services\hookServices')
@section('title',$title)
@section('content')
    @inject('htmlHelper', 'App\Blueprint\Services\HtmlServices')
    @php
        $htmlHelper->wrapperClass = 'form-group';
        $htmlHelper->labelClass = 'control-label col-md-3 col-sm-4';
        $htmlHelper->fieldClass = 'col-md-4 col-sm-5';
        $customFieldOptions = [
            'defaultValueMethod' => 'post',
            'text' => [
                'class' => 'form-control',
            ]
        ];

        $month = array('January','February','March','April','May','June','July','August','September','October','November','December');
        $currentyear = date('Y');
    @endphp
    <!-- BEGIN PAGE HEADER-->
    <!-- END PAGE HEADER-->
    <div class="row registrationWrapper">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="postRegistrationBox">
                <span class="fa fa-check check"></span>
                <h3>{{_t('register.you_are_registered')}} !!!</h3>
                <div class="registeredInfo">
                    {{_t('register.after_reg_text')}}
                </div>
                <div class="registeredFooter">
                    {{-- <button type="button" class="btn btn-outline blue registrationReceipt ladda-button"
                             data-spinner-color="#000" data-style="contract">
                         <i class="fa fa-sticky-note"></i>{{_t('register.receipt')}}
                     </button>--}}
                    <a href="{{ route(strtolower(getScope()).'.register') }}">
                        <button class="btn btn-outline green" type="button">
                            <i class="fa fa-angle-left"></i>{{_t('register.back')}}
                        </button>
                    </a>
                </div>
                <div class="invoiceHolder" data-invoice=""></div>
            </div>
            @if(getConfig('registration','registration_allowed'))
                <div class="portlet light bordered" id="registrationForm">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-green bold uppercase">
                                <span class="step-title">{{ _mt($moduleId, 'EasySignup.easy_signup') }}  </span>
                    </span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        {!! Form::open(['route' => 'admin.register','class' => 'form-horizontal registrationForm','id' => 'registrationForm']) !!}
                        <div class="form-wizard">
                            <div class="form-body">
                                <div id="bar" class="progress progress-striped" role="progressbar">
                                    <div class="progress-bar progress-bar-success"></div>
                                </div>
                                <div class="tab-content">
                                    <div class="alert alert-danger display-none">
                                        <button class="close"
                                                data-dismiss="alert"></button> {{ _t('register.formerrorscheck') }}
                                    </div>
                                    <div class="alert alert-success display-none">
                                        <button class="close" data-dismiss="alert"></button>
                                        {{_t('register.from_validation_success')}}!
                                    </div>

                                    <!-- Sponsor info tab start-->
                                    <div class="tab-pane active" id="tab1">
                                        <h3 class="block">{{ _t('register.sponsordetails') }}</h3>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-4 ">{{ _t('register.sponsor') }}
                                                <span class="required" aria-required="true"> * </span>
                                            </label>
                                            <div class="col-md-4 col-sm-5">
                                                <input type="text" value="{{ $sponsor ? $sponsor : '' }}"
                                                       data-action="verifySponsor"
                                                       class="form-control ajaxValidate" name="sponsor"
                                                       placeholder="{{ _t('register.enter_sponsor') }}">
                                            </div>
                                        </div>
                                        <div @if(!$placement) style="display: none" @endif>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-4">{{ _t('register.placement') }}
                                                </label>
                                                <div class="col-md-4 col-sm-5">
                                                    <input type="text" value="" class="form-control ajaxValidate"
                                                           name="placement" data-action="verifyUsername">
                                                </div>
                                            </div>
                                        </div>
                                        <div style="display: none">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-4">{{ _t('register.position') }}
                                                </label>
                                                <div class="col-md-4 col-sm-5">
                                                    <input type="text" value="" class="form-control" name="position">
                                                </div>
                                            </div>
                                        </div>
                                    {!! $hookServices->filter('registerFormPlacementInfo', '', 'root') !!}
                                    {{--@if($package_status)--}}
                                    {{--<h3 class="block">{{ _t('register.packagedetails') }}</h3>--}}
                                    {{--<div class="form-group pckageSelect pricing-content-2">--}}
                                    {{--<div class="viewSwitcher">--}}
                                    {{--<span class="grid active">--}}
                                    {{--<i class="fa fa-th"></i>--}}
                                    {{--</span>--}}
                                    {{--<span class="list">--}}
                                    {{--<i class="fa fa-list"></i>--}}
                                    {{--</span>--}}
                                    {{--</div>--}}
                                    {{--<div class="packageLoader col-md-12"></div>--}}
                                    {{--</div>--}}
                                    {{--@endif--}}
                                    <!-- Personal info tab start-->
                                        <h3 class="block">{{ _t('register.accountdetails') }}</h3>
                                        @if(getConfig('registration','username_type') == 'static')
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-4">{{ _t('register.username') }}
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4 col-sm-5">
                                                    <input type="text" class="form-control ajaxValidate"
                                                           data-action="verifyUsername" name="username"
                                                           placeholder="{{ _t('register.enter_username') }}"/>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-4">{{ _t('register.password') }}
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4 col-sm-5">
                                                <div class="input-group">
                                                    <input type="password" class="form-control" name="password"
                                                           id="submit_form_password"
                                                           placeholder="{{ _t('register.enter_password') }}"/>
                                                    <div class="input-group-addon">
                                                        <span><i class="fa fa-eye-slash field-icon toggle-password" toggle="#submit_form_password"  aria-hidden="true"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-4">{{ _t('register.confirm_password') }}
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4 col-sm-5">
                                                <div class="input-group">
                                                     <input type="password" class="form-control" id="password_confirmation"
                                                       name="password_confirmation"
                                                       placeholder="{{ _t('register.enter_password_again') }}"/>
                                                    <div class="input-group-addon">
                                                        <span><i class="fa fa-eye-slash field-icon toggle-password" toggle="#password_confirmation"  aria-hidden="true"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--POPUP-->
                                        <div class="hover_bkgr_fricc">
                                            <span class="helper"></span>
                                            <div>
                                                <div class="popupCloseButton">&times;</div>
                                                <p class="password_error_message"></p>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-4">{{ _t('register.email') }}
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4 col-sm-5">
                                                <input type="text" class="form-control ajaxValidate"
                                                       data-action="verifyEmail" name="email"
                                                       placeholder="{{ _t('register.enter_email') }}"/>
                                            </div>
                                        </div>
                                        <!-- Profile info tab start-->
                                        <h3 class="block">{{ _t('register.provide_profile_details') }}</h3>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-4">{{ _t('register.first_name') }}
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4 col-sm-5">
                                                <input type="text" class="form-control" name="firstname"
                                                       placeholder="{{ _t('register.enter_firstname') }}"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-4">{{ _t('register.last_name') }}
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4 col-sm-5">
                                                <input type="text" class="form-control" name="lastname"
                                                       placeholder="{{ _t('register.enter_lastname') }}"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-4">{{ _t('register.dob') }}
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4 col-sm-5">
                                                <div class="input-group day_container">
                                                    <select class="day">
                                                        <option value="">Day</option>
                                                        @for($day=1;$day<=31;$day++)
                                                        <option value="{{$day}}">{{$day}}</option>
                                                        @endfor
                                                    </select>
                                                    <select class="month">
                                                        <option value="">Month</option>
                                                        @foreach($month as $key => $months)
                                                        <option value="{{$key + 1}}">{{$months}}</option>
                                                        @endforeach
                                                    </select>
                                                    <select class="year">
                                                        <option value="">Year</option>
                                                        @for($year=1930;$year<=$currentyear - 18;$year++)
                                                        <option value="{{$year}}">{{$year}}</option>
                                                        @endfor
                                                    </select>

                                                </div>
                                                <input type="hidden" name="dob"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-4">{{ _t('register.gender') }}
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4 col-sm-5">
                                                <div class="radio-list">
                                                    <label>
                                                        <input class="icheck" type="radio" name="gender" value="M"
                                                               data-title="Male"
                                                               checked="checked"/> {{ _t('register.male') }} </label>
                                                    <label>
                                                        <input class="icheck" type="radio" name="gender" value="F"
                                                               data-title="Female"/> {{ _t('register.female') }}
                                                    </label>
                                                </div>
                                                <div id="form_gender_error"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3">{{ _t('register.address') }}
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4 col-sm-5">
                                                <input type="text" class="form-control" name="address"
                                                       placeholder="{{ _t('register.enter_address') }}"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-4">{{ _t('register.country') }}
                                                <span class="required"> * </span>
                                            </label>

                                            <div class="col-md-4 col-sm-5">
                                                <select name="country_id" id="country_list" class="form-control">
                                                    @foreach($countries as $country)
                                                        <option value="{{ $country['id'] }}"
                                                                @if($country['id'] == 101 ) selected @endif>{{ $country['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-4">{{ _t('register.state') }}
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4 col-sm-5">
                                                <select name="state_id" id="state_list" class="form-control"></select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-4">{{ _t('register.city') }}
                                                <span class="required"> * </span>
                                            </label>

                                            <div class="col-md-4 col-sm-5">
                                                <input type="text" name="city_id" id="city_list" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-4">{{ _t('register.pin') }}
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4 col-sm-5">
                                                <input type="text" class="form-control" name="pin"
                                                       placeholder="{{ _t('register.enter_pin') }}" type="number"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-4">{{ _t('register.phone_number') }}
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4 col-sm-5">
                                                <div class="flex">
                                                    <input type="text" class="form-control phn-small" id="phone_code"
                                                           name="phone_code"
                                                           readonly/>
                                                    <input type="text" class="form-control phn-big" name="phone"
                                                           id="phone"
                                                           placeholder="{{ _t('register.enter_phone') }}"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button"
                                    class="btn btn-default btnRegister">{{ _mt($moduleId, 'EasySignup.register') }}</button>
                        </div>
                        <input type="hidden" name="context" value="registration">
                    {!! Form::close() !!}
                    <!-- </form> -->
                    </div>
                </div>
            @else
                <div>
                    <h3>{{_t('register.registration_temporarily_suspended')}}</h3>
                </div>
            @endif
        </div>
    </div>
    <div class="successWrappper" style="display: none">
        <i class="fa fa-check"></i>
        {{ _mt($moduleId, 'EasySignup.registration_completed_successfully') }}
    </div>
    @if(getConfig('registration','registration_allowed'))
        {{--@component('Components.Registration.cart', ['cartTotal' => $cartTotal]) @endcomponent--}}
    @endif
    <style>

        .field-icon {
            z-index: 2;
            font-weight: bold;
            color: #000;
        }

        .field-icon:hover{
            cursor: pointer;
        }

        body {
            background: #1a1a1a !important;
        }

        .successWrappper {
            border: solid 1px #ddd;
            background: #fff;
            padding: 50px;
            text-align: center;
            display: block;
            color: #282626;
            font-size: 16px;
        }

        .successWrappper i {
            display: block !important;
            font-size: 25px;
            color: green;
            font-weight: bold;
            padding: 19px 0px;
        }

        .hover_bkgr_fricc{
            background:rgba(0,0,0,.4);
            cursor:pointer;
            display:none;
            height:100%;
            position:fixed;
            text-align:center;
            top:0;
            left: 0;
            width:100%;
            z-index:10000;
        }
        .hover_bkgr_fricc .helper{
            display:inline-block;
            height:100%;
            top: 50%;
            vertical-align:middle;
        }
        .hover_bkgr_fricc > div {
            background-color: #fff;
            box-shadow: 10px 10px 60px #555;
            display: inline-block;
            height: auto;
            max-width: 551px;
            min-height: 100px;
            vertical-align: middle;
            width: 60%;
            position: relative;
            border-radius: 8px;
            padding: 15px 5%;
        }
        .popupCloseButton {
            background-color: #fff;
            border: 3px solid #999;
            border-radius: 50px;
            cursor: pointer;
            display: inline-block;
            font-family: arial;
            font-weight: bold;
            position: absolute;
            top: -20px;
            right: -20px;
            font-size: 25px;
            line-height: 30px;
            width: 30px;
            height: 30px;
            text-align: center;
        }
        .popupCloseButton:hover {
            background-color: #ccc;
        }


    </style>
    <script>
        $(function () {
            $('.popupCloseButton').click(function(){
                $('.hover_bkgr_fricc').hide();
            });

            $.validator.addMethod('ajaxValidate', function (value, element, param) {
                return !$(element).hasClass('ajaxValidationError'); // return bool here if valid or not.
            }, function (param, element) {
                return $(element).siblings('.help-block-error').text();
            });

            let validator = $('form.registrationForm').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input,
                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
                },
                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },
                errorPlacement: function (error, element) {
                    //console.log(error);
                    if (element.parent().hasClass('flex')) {
                        error.insertAfter(element.parent());
                        return;
                    }
                    switch (element.attr("name")) {
                        case 'phone':
                            error.insertAfter("#form_gender_error");
                            break;

                        default:
                            if (!element.siblings('.help-block.help-block-error').length)
                                error.insertAfter(element);
                    }
                },
                rules: {
                    //account
                    sponsor: {
                        minlength: 5,
                        required: true,
                        ajaxValidate: true,
                    },
                    username: {
                        minlength: 5,
                        required: true,
                        ajaxValidate: true,
                    },
                    dob: {
                        required: true,
                    },
                    password: {
                        minlength: 5,
                        required: true
                    },
                    confirm_password: {
                        required: true,
                        equalTo: "#submit_form_password"
                    },
                    email: {
                        required: true,
                        email: true
                    }
                },
            });
            $('.btnRegister').click(function () {
                $.post("{{ scopeRoute('eazySignup.register') }}", $('.registrationForm').serialize(), function (data) {
                    $('.registrationWrapper').hide();
                    $('.successWrappper').show();
                }).fail(function (response) {
                    let errors = response.responseJSON;
                    if (errors['password']){
                        $('.hover_bkgr_fricc').show();
                        $('.password_error_message').text(errors['password']);
                        // alert(errors['password']);
                    }

                    if (errors['pin']){
                        $('.hover_bkgr_fricc').show();
                        $('.password_error_message').text(errors['pin']);
                        // alert(errors['password']);
                    }
                    if (errors['password_confirmation']){
                        $('.hover_bkgr_fricc').show();
                        $('.password_error_message').text(errors['password_confirmation']);
                        // alert(errors['password_confirmation']);
                    }
                    for (let key in errors) {
                        let err = {};
                        err[key] = errors[key];
                        validator.showErrors(err);
                    }
                });
            });

             $('.day_container select').change(function(){
                var data = {};
                var enable = true;

                $(this).parent().find('select').each(function(){
                    var name = $(this).attr('class');
                    data[name] = $(this).val();
                    if(!data[name]){
                        enable = false;
                    }
                });

                if(enable) {
                    $(this).parent().parent().find('input').eq(0).val(data['year'] +"-" + data['month'] + "-" + data['day']);
                } else {
                    $(this).parent().parent().find('input').eq(0).val('');
                }
            });


            $('.year').on('change',function () {
                if($(this).val()== {{$currentyear - 18}} ){
                    var date = new Date(),
                        day =  date.getDate(),
                        month = date.getMonth(),
                        months = ['January','February','March','April','May','June','July','August','September','October','November','December'];

                    var daySelectionHtml = '<option value="">Day</option>';
                    for (let step = 1; step < day; step++) {
                        daySelectionHtml +='<option value="'+step+'">'+step+'</option>'
                    }
                    $('select.day').html(daySelectionHtml);

                    var monthSelectionHtml  = '<option value="">Month</option>';
                    for (let step = 0; step <= month; step++) {
                        monthSelectionHtml += '<option value="'+step+1+'">'+months[step]+'</option>'
                    }
                    $('select.month').html(monthSelectionHtml);
                }
            });

            $(".toggle-password").click(function() {

                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });


        });
    </script>
@endsection
