@extends($layoutPrefix . 'Layout.master')
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

    @if(getScope() == 'user' && loggedId())
       @include('_includes.network_nav')
    @endif
    <!-- BEGIN PAGE HEADER-->
    <!-- END PAGE HEADER-->
    <div class="row registrationWrapper">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="postRegistrationBox">
                <span class="fa fa-check check"></span>
                <h3>{{_t('register.you_are_registered')}} !!!</h3>
                <div class="registeredInfo">
                    {{_t('register.after_reg_text')}}
                </div>
                <div class="registeredFooter">
                    {{--<button type="button" class="btn btn-outline blue registrationReceipt ladda-button"--}}
                    {{--data-spinner-color="#000" data-style="contract">--}}
                    {{--<i class="fa fa-sticky-note"></i>{{_t('register.receipt')}}--}}
                    {{--</button>--}}
                    <a href="{{ route(strtolower(getScope()).'.logout') }}">
                        <button class="btn btn-outline green" type="button">
                            <i class="fa fa-angle-right"></i>{{_t('register.click_to_login')}}
                        </button>
                    </a>
                </div>
                <div class="invoiceHolder" data-invoice=""></div>
            </div>
            @if(getConfig('registration','registration_allowed'))
                <div class="portlet light bordered" id="registrationForm">
                    <div class="portlet-title" style="text-align: center">
                        <h3 class="register-title bold uppercase"> {{_t('register.register')}}
                            <span class="step-title">@if(getScope()=='admin') {{  _t('register.step_1_5') }} @else  {{ _t('register.step_1_4') }} @endif </span>
                        </h3>
                    </div>
                    <div class="portlet-body form">
                       {!! Form::open(['route' => 'admin.register','class' => 'registrationForm','id' => 'registrationForm', 'autocomplete' => 'off']) !!}
                        <div class="form-wizard">
                            <div class="form-body">
                                <ul class="nav nav-pills nav-justified steps">
                                    <li>
                                        <a href="#tab1" data-toggle="tab" class="step">
                                            <span class="desc">{{ _t('register.sponsorinfo') }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab2" data-toggle="tab" class="step">
                                            <span class="desc">{{ _t('register.personal_details') }} </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab3" data-toggle="tab" class="step">
                                            <span class="desc">{{ _t('register.profile_setup') }} </span>
                                        </a>
                                    </li>

                                    @if(getScope()=='admin' && loggedId() && isAdmin())
                                    <li data-id="placement_details">
                                        <a href="#tab4" data-toggle="tab" class="step">
                                            <span class="desc">{{ _t('register.placement_details') }} </span>
                                        </a>
                                    </li>
                                    @endif
                                    <li>
                                        <a href="#tab5" data-toggle="tab" class="step active">
                                            <span class="desc">{{ _t('register.confirm_and_payment') }} </span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="position-relative">
                                    <div id="bar" class="progress progress-striped" role="progressbar">
                                        <div class="progress-bar progress-bar-success"></div>
                                    </div>
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
                                    <div class="tab-pane" id="tab1">
                                        {{--<h3 class="block">{{ _t('register.sponsordetails') }}</h3>--}}
                                        {{--<hr />--}}
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group sponsor">
                                                           <input type="hidden" name="sponsor" value="{{ $sponsor?$sponsor:'' }}" autocomplete="off" />
                                                            @if ($sponsor_set_by_cookie)
                                                                <input type="hidden" name="sponsor" value="{{ $sponsor }}" autocomplete="off" />
                                                                 <label class="control-label">{{ _t('register.sponsor') }}</label>
                                                                 <input  type="text"
                                                                         name="sponsorLabel"
                                                                         value="{{ $sponsor }}"
                                                                         placeholder="{{ _t('registerFormPlacementInfoster.enter_sponsor') }}"
                                                                         class="form-control"
                                                                         autocomplete="off"
                                                                         readonly="readonly"
                                                                         disabled="disabled"
                                                                 >
                                                             @else
                                                                 <label class="control-label">{{ _t('register.sponsor') }}</label>
                                                                 <input  type="text"
                                                                         name="sponsor"
                                                                         value="{{ $sponsor ?? '' }}"
                                                                         data-action="verifySponsor"
                                                                         class="form-control ajaxValidate"
                                                                         autocomplete="off"
                                                                         placeholder="{{ _t('registerFormPlacementInfoster.enter_sponsor') }}"
                                                                         @if(getScope() == 'user' && loggedId() && ($sponsor ?? ''))
                                                                             readonly="readonly"
                                                                         @endif
                                                                 >
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div @if(!$placement) style="display: none" @endif>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-4">{{ _t('register.placement') }}
                                                </label>
                                                <div class="col-md-6 col-sm-12">
                                                    <input type="text" value="{{ $placement ?? '' }}"
                                                           class="form-control ajaxValidate" name="placement"  autocomplete="off" @if (!isAdmin()) readonly="readonly" @endif
                                                           data-action="verifyUsername">
                                                </div>
                                            </div>
                                        </div>
                                        <div @if(!$placement) style="display: none" @endif>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-4">{{ _t('register.position') }}
                                                </label>
                                                <div class="col-md-6 col-sm-12">
                                                    <input type="text" value="1" class="form-control" name="position"autocomplete="off"  @if (!isAdmin()) readonly="readonly" @endif>
                                                </div>
                                            </div>
                                        </div>
                                        {!! $hookServices->filter('registerFormPlacementInfo', '', 'root') !!}
                                        @if(getConfig('registration','package_for_registration'))
                                            <div class="row">
                                                <h3 class="block">{{ _t('register.packagedetails') }}</h3>
                                                <div class="form-group pckageSelect pricing-content-2">
                                                    <div class="viewSwitcher">
                                                            <span class="grid active">
                                                                <i class="fa fa-th"></i>
                                                            </span>
                                                                    <span class="list">
                                                                <i class="fa fa-list"></i>
                                                            </span>
                                                    </div>
                                                    <div class="packageLoader col-md-12"></div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <!-- Sponsor info tab end-->
                                    <!-- Personal info tab start-->
                                    <div class="tab-pane" id="tab2">
                                        {{--<h3 class="block">{{ _t('register.accountdetails') }}</h3>--}}
                                        <div class="row">
                                            @if(getConfig('registration','username_type') == 'static')
                                                <div class="col-sm-6">
                                                    <div class="form-group username">
                                                        <label class="control-label">{{ _t('register.username') }}</label>
                                                        <input type="text" class="form-control ajaxValidate"
                                                               data-action="verifyUsername" name="username"
                                                               placeholder="{{ _t('register.enter_username') }}"autocomplete="off"/>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="col-sm-6">
                                                <div class="form-group email">
                                                    <label class="control-label">{{ _t('register.email') }}</label>
                                                    <input type="text" class="form-control ajaxValidate"
                                                           data-action="verifyEmail" name="email" data-content="email1"
                                                           placeholder="{{ _t('register.enter_email') }}" autocomplete="off" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ _t('register.password') }}</label>
                                                    <div class="input-group password_shown">
                                                        <input type="password" class="form-control" name="password"
                                                           id="submit_form_password"
                                                           data-strength
                                                           placeholder="{{ _t('register.enter_password') }}" autocomplete="off" />
                                                        <div class="input-group-addon">
                                                            <a href="javascript:;"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                        </div>    
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ _t('register.confirm_password') }}</label>
                                                    <div class="input-group password_shown">
                                                        <input type="password" class="form-control"
                                                               id="password_confirmation"
                                                               name="password_confirmation"
                                                               placeholder="{{ _t('register.enter_password_again') }}" autocomplete="off"/>
                                                        <div class="input-group-addon">
                                                            <a href="javascript:;"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                        </div>   

                                                    </div>
                                                </div>
                                            </div>
                                            {!! $htmlHelper->renderFieldGroup(13, '', $customFieldOptions, true) !!}
                                        </div>
                                    </div>
                                    <!-- Personal info tab end-->
                                    <!-- Profile info tab start-->
                                    <div class="tab-pane" id="tab3">
                                        <h3 class="block">{{ _t('register.country_of_residence') }}</h3>
                                        <hr/>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ _t('register.country') }}</label>
                                                    <select name="country_id" id="country_list" class="form-control">
                                                        <option value=""></option>
                                                        @foreach($countries as $country)
                                                            <option value="{{ $country['id'] }}"
                                                                    @if($country['code'] == \GeoIP::getLocation()['iso_code']) selected @endif>{{ $country['name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <h3 class="block">{{ _t('register.passport_details') }}</h3>
                                        <hr/>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label">{{ _t('register.gender') }}</label>
                                                    <div class="radio-list">
                                                        <label class="radio-container">
                                                            <input type="radio" name="gender" value="M"
                                                                   data-title="Male"
                                                                   checked="checked"/>
                                                            <span class="checkbox-circle"></span>
                                                            <span class="checkbox-name">{{ _t('register.male') }}</span>
                                                        </label>
                                                        <label class="radio-container">
                                                            <input type="radio" name="gender" value="F"
                                                                   data-title="Female"/>
                                                            <span class="checkbox-circle"></span>
                                                            <span class="checkbox-name">{{ _t('register.female') }}</span>
                                                        </label>
                                                    </div>
                                                    <div id="form_gender_error"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ _t('register.given_name') }}</label>
                                                    <input type="text" class="form-control" name="firstname"
                                                           placeholder="{{ _t('register.enter_fullname') }}"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ _t('register.surname') }}</label>
                                                    <input type="text" class="form-control" name="lastname"
                                                           placeholder="{{ _t('register.enter_surname') }}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            {{--<div class="col-sm-6">--}}
                                            {{--<div class="form-group">--}}
                                            {{--<label class="control-label">{{ _t('register.type_of_document') }}</label>--}}
                                            {{--<input type="text" class="form-control" name="type_of_document"--}}
                                            {{--placeholder="{{ _t('register.enter_document_type') }}"/>--}}
                                            {{--</div>--}}
                                            {{--</div>--}}
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ _t('register.enter_document_no') }}</label>
                                                    <input type="text" class="form-control" name="passport_no"
                                                           onkeyup="this.value = this.value.toUpperCase();"
                                                           placeholder="{{ _t('register.enter_document_no') }}"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ _t('register.date_of_passport_issue') }}</label>
                                                    <!-- <div class="input-group input-medium date date-picker"
                                                         data-date="10/11/2012" data-date-format="yyyy-mm-dd">
                                                        <input type="text" class="form-control datePicker" readonly=""
                                                               name="date_of_passport_issuance">
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                    </div> -->
                                                    
                                                    <input type="hidden" name="date_of_passport_issuance"/>
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
                                                            @for($year=$currentyear - 20;$year<=$currentyear;$year++)
                                                            <option value="{{$year}}">{{$year}}</option>
                                                            @endfor
                                                        </select>

                                                    </div>
                                                    {{--<input type="text" class="form-control" name="date_of_passport_issuance"
                                                           placeholder="{{ _t('register.enter_date_of_passport_issue') }}"/>--}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ _t('register.passport_expirition_date') }}</label>
                                                    <!-- <div class="input-group input-medium date date-picker"
                                                         data-date="10/11/2012" data-date-format="yyyy-mm-dd"
                                                         data-date-start-date="+1d">
                                                        <input type="text" class="form-control datePicker" readonly=""
                                                               name="passport_expirition_date">
                                                        <span class="input-group-btn">
                                                        <button class="btn default" type="button">
                                                            <i class="fa fa-calendar"></i>
                                                        </button>
                                                    </span>
                                                    </div> -->
                                                    <input type="hidden" name="passport_expirition_date"/>
                                                    <div class="input-group day_container">
                                                        <select class="passport_expirition_day day">
                                                            <option value="">Day</option>
                                                            @for($day=1;$day<=31;$day++)
                                                            <option value="{{$day}}">{{$day}}</option>
                                                            @endfor
                                                        </select>
                                                        <select class="passport_expirition_month month">
                                                            <option value="">Month</option>
                                                            @foreach($month as $key => $months)
                                                            <option value="{{$key + 1}}">{{$months}}</option>
                                                            @endforeach
                                                        </select>
                                                        <select class="passport_expirition_year year">
                                                            <option value="">Year</option>
                                                            @for($year=$currentyear;$year<$currentyear + 20;$year++)
                                                            <option value="{{$year}}">{{$year}}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    {{--<input type="text" class="form-control" name="passport_expirition_date"
                                                           placeholder="{{ _t('register.enter_passport_expirition_date') }}"/>--}}
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ _t('register.dob') }}</label>
                                                    <!-- <div class="input-group input-medium date date-picker"
                                                         data-date="10/11/2012" data-date-format="yyyy-mm-dd">
                                                        <input type="text" class="form-control datePicker" readonly=""
                                                               name="dob">
                                                        <span class="input-group-btn">
                                                        <button class="btn default" type="button">
                                                            <i class="fa fa-calendar"></i>
                                                        </button>
                                                    </span>
                                                    </div> -->
                                                    <input type="hidden" name="dob"/>
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
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ _t('register.place_of_birth') }}</label>
                                                    <select name="place_of_birth" id="country_list"
                                                            class="form-control">
                                                        <option value=""></option>
                                                        @foreach($countries as $country)
                                                            <option value="{{ $country['id'] }}"
                                                                    @if($country['code'] == \GeoIP::getLocation()['iso_code']) selected @endif>{{ $country['name'] }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ _t('register.country_of_passprt_issue') }}</label>
                                                    <select name="country_of_passport_issuance" id="country_list"
                                                            class="form-control">
                                                        <option value=""></option>
                                                        @foreach($countries as $country)
                                                            <option value="{{ $country['id'] }}"
                                                                    @if($country['code'] == \GeoIP::getLocation()['iso_code']) selected @endif>{{ $country['name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ _t('register.nationality') }}</label>
                                                    <select name="nationality" id="country_list" class="form-control">
                                                        <option value=""></option>
                                                        @foreach($countries as $country)
                                                            <option value="{{ $country['id'] }}"
                                                                    @if($country['code'] == \GeoIP::getLocation()['iso_code']) selected @endif>{{ $country['name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <h3 class="block">{{ _t('register.email') }}
                                            & {{ _t('register.phone_number') }}</h3>
                                        <hr/>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ _t('register.email') }}</label>
                                                    <input type="text" class="form-control ajaxValidate"
                                                           data-action="verifyEmail" name="email" data-content="email2"
                                                           placeholder="{{ _t('register.enter_email') }}"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ _t('register.phone_number') }}</label>
                                                    <div class="flex">
                                                        <input type="text" class="form-control phn-small"
                                                               id="phone_code"
                                                               name="phone_code"/>
                                                        <input type="text" class="form-control phn-big" name="phone"
                                                               id="phone"
                                                               placeholder="{{ _t('register.enter_phone') }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <h3 class="block">{{ _t('register.address') }}</h3>
                                        <hr/>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ _t('register.street_name') }}</label>
                                                    <input type="text" class="form-control" name="street_name"
                                                           placeholder="{{ _t('register.enter_street_no') }}"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ _t('register.house_no') }}</label>
                                                    <input type="text" class="form-control" name="house_no"
                                                           placeholder="{{ _t('register.enter_house_no') }}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ _t('register.city') }}</label>
                                                    <input type="text" class="form-control" name="city"
                                                           placeholder="{{ _t('register.enter_city') }}"
                                                           value="{{ \GeoIP::getLocation()['city'] }}"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ _t('register.post_code') }}</label>
                                                    <input type="text" class="form-control" name="postcode"
                                                           placeholder="{{ _t('register.enter_post_code') }}"
                                                           value="{{ \GeoIP::getLocation()['postal_code'] }}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ _t('register.country') }}</label>
                                                    <select name="address_country" id="country_list"
                                                            class="form-control">
                                                        @foreach($countries as $country)
                                                            <option value="{{ $country['code'] }}"
                                                                    @if($country['code'] == \GeoIP::getLocation()['iso_code']) selected @endif>{{ $country['name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ _t('register.additional_information') }}</label>
                                                    <input type="text" class="form-control optional"
                                                           name="additional_info"
                                                           placeholder="{{ _t('register.enter_additional_information') }}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    {{--<label class="control-label">{{ _t('register.state') }}--}}
                                                        {{--<span class="required"> * </span>--}}
                                                    {{--</label>--}}
                                                    {{--<select name="state" id="state_list" class="form-control"></select>--}}                                              
                                                </div>
                                            </div>
                                        </div>
                                        {{-- hidden ? --}}
                                        <div class="row">
                                            {{--<h3 class="block">{{ _t('register.provide_profile_details') }}</h3>
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
                                                    <div class="input-group input-medium date date-picker"
                                                         data-date="10/11/2012" data-date-format="yyyy-mm-dd"
                                                         data-date-end-date="-1d">
                                                        <input type="text" class="form-control datePicker" readonly=""
                                                               name="dob">
                                                        <span class="input-group-btn">
                                                    <button class="btn default" type="button">
                                                        <i class="fa fa-calendar"></i>
                                                    </button>
                                                </span>
                                                    </div>
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
                                                    <select name="country_code" id="country_list" class="form-control">
                                                        @foreach($countries as $country)
                                                            <option value="{{ $country['id'] }}"
                                                                    @if($country['code'] == \GeoIP::getLocation()['iso_code']) selected @endif>{{ $country['name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-4">{{ _t('register.state') }}
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4 col-sm-5">
                                                    <select name="state_code" id="state_list" class="form-control"></select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-4">{{ _t('register.city') }}
                                                    <span class="required"> * </span>
                                                </label>

                                                <div class="col-md-4 col-sm-5">
                                                    <select name="city_id" id="city_list" class="form-control">

                                                    </select>
                                                </div>
                                            </div>
                                            --}}{{-- <!--                                <div class="form-group">
                                                 <label class="control-label col-md-3">{{ _t('register.city') }}
                                                     <span class="required"> * </span>
                                                 </label>
                                                 <div class="col-md-4">
                                                     <input type="text" class="form-control" name="city_id" placeholder="{{ _t('register.enter_city') }}" />
                                                 </div>
                                             </div>-->--}}{{--
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
                                            </div>--}}
                                            {!! $htmlHelper->renderFieldGroup(12, '', $customFieldOptions, true) !!}
                                        </div>
                                    </div>

                                    <!-- Profile info tab end-->
                                    <!-- Placement Details info tab start-->
                                    @if(getScope()=='admin' && loggedId() && isAdmin())
                                        <div class="tab-pane" id="tab4">
                                            <div class="row">
                                                <div class="form-group" id="placement">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">{{ _t('register.choose_parent') }}</label>
                                                            <select name="parent" id="parents" class="form-control"></select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">{{ _t('register.position') }}</label>
                                                            <select name="position" id="position" class="form-control">
                                                                <option value="1">Left</option>
                                                                <option value="2">Right</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <!-- Placement Details tab end-->
                                    <!-- Billing tab end-->
                                    <div class="tab-pane" id="tab5">
                                        <div class="row paymentInstruction">
                                            <button type="button" class="btn grey orderSummaryButton">
                                                <i class="fa fa-table"></i>{{_t('register.order_summary')}}
                                            </button>
                                            <button class="btn green order-review" type="button" data-toggle="modal"
                                                    href="#user_summary"><i class="fa fa-pencil-square-o"
                                                                            aria-hidden="true"></i> {{_t('register.review')}}
                                            </button>
                                        </div>
                                        <div class="orderSummary"></div>
                                        <div class="paymentGatewaysWrapper"></div>
                                        <div id="user_summary" class="modal fade modal-scroll" tabindex="-1"
                                             data-replace="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true"></button>
                                                        <h4 class="modal-title">{{ _t('register.review_and_payment') }}</h4>
                                                    </div>
                                                    <div class="modal-body" style="overflow: hidden;">

                                                        <div class="form-group">
                                                            <label class="control-label col-md-4 col-sm-5">{{ _t('register.sponsor') }}
                                                                :</label>
                                                            <div class="col-md-5 col-sm-6">
                                                                <p class="form-control-static"
                                                                   data-display="sponsor"></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4 col-sm-5">{{ _t('register.gender') }}
                                                                :</label>
                                                            <div class="col-md-5 col-sm-6">
                                                                <p class="form-control-static"
                                                                   data-display="gender"></p>
                                                            </div>
                                                        </div>
                                                        @if(getConfig('username','type')!='dynamic')
                                                            <div class="form-group">
                                                                <label class="control-label col-md-4 col-sm-5">{{ _t('register.username') }}
                                                                    :</label>
                                                                <div class="col-md-5 col-sm-6">
                                                                    <p class="form-control-static"
                                                                       data-display="username"></p>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4 col-sm-5">{{ _t('register.email') }}
                                                                :</label>
                                                            <div class="col-md-5 col-sm-6">
                                                                <p class="form-control-static" data-display="email"></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4 col-sm-5">{{ _t('register.first_name') }}
                                                                :</label>
                                                            <div class="col-md-5 col-sm-6">
                                                                <p class="form-control-static"
                                                                   data-display="name"></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4 col-sm-5">{{ _t('register.last_name') }}
                                                                :</label>
                                                            <div class="col-md-5 col-sm-6">
                                                                <p class="form-control-static"
                                                                   data-display="lastname"></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4 col-sm-5">{{ _t('register.phone_number') }}
                                                                :</label>
                                                            <div class="col-md-5 col-sm-6">
                                                                <p class="form-control-static" data-display="phone"></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4 col-sm-5">{{ _t('register.address') }}
                                                                :</label>
                                                            <div class="col-md-5 col-sm-6">
                                                                <p class="form-control-static"
                                                                   data-display="street_name"></p>
                                                                <p class="form-control-static"
                                                                   data-display="house_no"></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4 col-sm-5">{{ _t('register.city') }}
                                                                :</label>
                                                            <div class="col-md-5 col-sm-6">
                                                                <p class="form-control-static"
                                                                   data-display="city"></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4 col-sm-5">{{ _t('register.country') }}
                                                                :</label>
                                                            <div class="col-md-5 col-sm-6">
                                                                <p class="form-control-static"
                                                                   data-display="country_id"></p>
                                                            </div>
                                                        </div>
                                                        {{--<div class="form-group">--}}
                                                        {{--<label class="control-label col-md-4 col-sm-5">{{ _t('register.state') }}--}}
                                                        {{--:</label>--}}
                                                        {{--<div class="col-md-5 col-sm-6">--}}
                                                        {{--<p class="form-control-static"--}}
                                                        {{--data-display="state_id"></p>--}}
                                                        {{--</div>--}}
                                                        {{--</div>--}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal"
                                                                class="btn white btn-outline">{{_t('register.close')}}
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tab6">
                                        <div class="paycontainer">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <img src="{{asset('images/logo1.png')}}" class="logo"/>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <h4 class="logocolor">Invoice For Payment</h4>
                                                        </div>    
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <img src="{{asset('images/bitcoin.png')}}" class="bitcoin">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="content" id="payment_result"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-actions">
                                <div class="col-lg-8 col-lg-offset-2">
                                    <button
                                       class="btn-action proceed" style="display: none;" disabled>{{_t('register.paynow')}} <i class="fa fa-angle-right"></i></button>

                                    <a href="javascript:"
                                       class="btn-action button-next check-validate"> {{ _t('register.continue') }}
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                    <a href="javascript:" class="btn default btn-action button-previous">
                                        <i class="fa fa-angle-left"></i> {{ _t('register.back') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row footer_row" style="display: none;">
                               <div class="col-lg-10 col-lg-offset-2 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                                    <div class="mt-4 info" style="margin-left: auto;">
                                        <img src="{{asset('/images/EstoniaGrey.png')}}" class="footer-image mr-3" alt="index.ec">
                                        <p class="footer_desc">Elysium Capital PLC OÜ<br>Tartu mnt 67/1-13B, 10115 Tallinn, Estonia<br>Registration Number: REG: 14895905</p>
                                    </div>
                                    <div class="mt-4 mb-4 info">
                                        <img src="{{asset('/images/SwedenGrey.png')}}" class="footer-image mr-3" alt="index.ec">
                                        <p class="footer_desc">Elysium Capital Limited | Research | Administration | Representative HQ
                                            <br>Turning Torso, Lilla Varvsgatan 14, 211 15 Malmö, Sweden <br>T:Enquiries +44 7723 503770 | support@elysiumnetwork.io</p>
                                    </div>
                                </div>
                            </div>

                        <input type="hidden" name="context" value="registration" autocomplete="off">
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
    {{--@if(getConfig('registration','registration_allowed'))--}}
    {{--@component('Components.Registration.cart', ['cartTotal' => $cartTotal]) @endcomponent--}}
    {{--@endif--}}
    <style>
        body {
            background: #fff;
        }
        .datepicker table tr td span.new, .datepicker table tr td span.old
        {
            color: black;
        }
        .datepicker table tr td span.new, .datepicker table tr td span.new
        {
            color: black;
        }
    </style>
    <script type="text/javascript">
        "use strict";

        function validate(name,element)
        {
            if(name == 'date_of_passport_issuance')
            {
                var date = new Date();
                var year = date.getFullYear();
                var month = date.getMonth();

                var delaymonth = 11; var delayyear = 19;
                if(month <= 11)
                {
                    delaymonth = month + 1;
                    delayyear += 1;
                }   
                else
                {
                    delaymonth = month - delaymonth;
                }

                date.setFullYear(year - delayyear);
                date.setMonth(delaymonth);

                var yearselect = $(element).parent().find('.year').eq(0);
                var currentyear = yearselect.val();

                var monthselect = $(element).parent().find('.month').eq(0);
                if(date.getFullYear() == currentyear)
                {
                    var selectedmonth = date.getMonth();
                    monthselect.find('option').each(function(){
                        if($(this).val() > selectedmonth - 1)
                        {
                            $(this).attr('disabled',true);
                        }
                    })
                }
                else if(currentyear == new Date().getFullYear())
                {
                    monthselect.find('option').each(function(){
                        if($(this).val() > new Date().getMonth())
                        {
                            $(this).attr('disabled',true);
                        }
                        else
                        {
                            $(this).attr('disabled',false);
                        }
                    })
                }
                else
                {
                    monthselect.find('option').each(function(){
                        $(this).attr('disabled',false);
                    })
                }

                var currentmonth = monthselect.val();

                var expire_year = $('input[name=passport_expirition_date]').parent().find('.year').eq(0);

                expire_year.find('option').each(function(){
                    if(currentyear && $(this).val() > Number(currentyear) + 20)
                    {
                        $(this).attr('disabled',true);
                    }
                    else
                    {
                        $(this).attr('disabled',false);
                    }
                })
            }
            else if(name == 'dob')
            {
                var date = new Date();
                var year = date.getFullYear();
                var month = date.getMonth();
                var day = date.getDay();

                var yearselect = $(element).parent().find('.year').eq(0);
                var monthselect = $(element).parent().find('.month').eq(0);
                var dayselect = $(element).parent().find('.day').eq(0);
                
                monthselect.find('option').each(function(){
                    $(this).attr('disabled',false);
                })

                if(yearselect.val() == year - 18)
                {
                    monthselect.find('option').each(function(){
                        if($(this).val() > month)
                        {
                            $(this).attr('disabled',true);
                        }
                        else
                        {
                            $(this).attr('disabled',false);
                        }
                    })
                }
            }
        }

        $('.day_container select').change(function(){
            var data = {}; var enable = true;
            $(this).parent().find('select').each(function(){
                var name = $(this).attr('class');
                let name_array = name.split(' ');
                name = name_array[name_array.length - 1];
                data[name] = $(this).val();
                if(!data[name])
                {
                    enable = false;
                }
            })

            var element_name = $(this).parent().parent().find('input').eq(0).attr('name');
            validate(element_name,this);
            if(enable)
            {
                $(this).parent().parent().addClass('has-success');
                $(this).parent().parent().removeClass('has-error');
                $(this).parent().parent().find('input').eq(0).val(data['year'] +"-" + data['month'] + "-" + data['day']);
            }
            else
            {
                $(this).parent().parent().removeClass('has-success');
                $(this).parent().parent().addClass('has-error');
                $(this).parent().parent().find('input').eq(0).val('');
            }
        })

        $('.steps li').click(function(){
            let tab = $(this).find('a').eq(0).attr('href');
            if(tab == '#tab3'){
                $('.footer_row').show();
            }
            else
            {
                $('.foorter_row').hide();
            }
        })

        $('.btn-action').click(function(){
            console.log($('.steps').html());
            var tab = $('.steps').find('li.active').eq(0).find('a').eq(0).attr('href');
            console.log(tab);
            if(tab == '#tab3'){
                $('.footer_row').show();
            }
            else
            {
                $('.footer_row').hide();
            }
        })
        $(function () {
            if ('{{ $doneAlready }}' && '{{ $orderId }}')
                postRegistration({result: {orderId: Number('{{ $orderId }}')}});
        });

        $('.password_shown a').click(function(){
            if($(this).parent().parent().find('input').eq(0).attr('type') == 'password')
            {
                $(this).find('i').removeClass('fa-eye-slash');
                $(this).find('i').addClass('fa-eye');
                $(this).parent().parent().find('input').eq(0).attr('type','text');
            }
            else if($(this).parent().parent().find('input').eq(0).attr('type') == 'text')
            {
                $(this).find('i').removeClass('fa-eye');
                $(this).find('i').addClass('fa-eye-slash');
                $(this).parent().parent().find('input').eq(0).attr('type','password');
            }
        })

        $('.passport_expirition_year').on('change',function () {
            var date = new Date(),
                day =  date.getDate(),
                month = date.getMonth(),
                months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
            var daySelectionHtml = '<option value="">Day</option>';
            var monthSelectionHtml  = '<option value="">Month</option>';

            var selected_day = $('select.passport_expirition_day').val();
            var selected_month = $('select.passport_expirition_month').val();

            if($(this).val()== {{$currentyear}} ){
                let step = day+1;
                for (step; step <=31; step++) {
                    daySelectionHtml +='<option value="'+step+'">'+step+'</option>'
                }
                for (month; month <= 11; month++) {
                    monthSelectionHtml += '<option value="'+month+'">'+months[month]+'</option>'
                }

            }else{
                for (let step = 1; step < 31; step++) {
                    var selected = '';

                    if(step == selected_day)
                    {
                        selected = 'selected';
                    }

                    daySelectionHtml +='<option value="'+step+'" ' + selected + '>'+step+'</option>'
                }
                for (let step = 0; step <= 11; step++) {
                    var selected = '';
                    if(step == selected_month - 1)
                    {
                        selected = 'selected';
                    }
                    monthSelectionHtml += '<option value="'+(Number(step)+1)+'" ' + selected + '>'+months[step]+'</option>'
                }
            }
            $('select.passport_expirition_day').html(daySelectionHtml);
            $('select.passport_expirition_month').html(monthSelectionHtml);

        });

        var emailInput1 = $('[data-content="email1"]');
        var emailInput2 = $('[data-content="email2"]');

        emailInput1.on('keyup', function () {
            emailInput2.val(emailInput1.val());
        });
        emailInput2.on('keyup', function () {
            emailInput1.val(emailInput2.val());
        });

        if(!$('input[name=sponsor]').val())
        {
            alert('Please contact contact@elysiumnetwork.io.');
            document.location.href = "{{route('home')}}";
        }

    </script>
@endsection
