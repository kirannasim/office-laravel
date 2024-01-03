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
                        {!! Form::open(['route' => 'admin.register','class' => 'registrationForm','id' => 'registrationForm']) !!}
                        <div class="form-wizard">
                            <div class="form-body">
                                <ul class="nav nav-pills nav-justified steps">
                                    <li>
                                        <a href="#tab1" data-toggle="tab" class="step">
                                            <span class="desc">{{ _t('register.sponsorinfo') }}</span>
                                        </a>
                                    </li>
<!--                                     <li>
                                        <a href="#tab2" data-toggle="tab" class="step">
                                            <span class="desc">{{ _t('register.personal_details') }} </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab3" data-toggle="tab" class="step">
                                            <span class="desc">{{ _t('register.profile_setup') }} </span>
                                        </a>
                                    </li>
 -->
                                    @if(getScope()=='admin')
                                    <li data-id="placement_details">
                                        <a href="#tab4" data-toggle="tab" class="step">
                                            <span class="desc">{{ _t('register.placement_details') }} </span>
                                        </a>
                                    </li>
                                    @endif
                                    <li>
                                        <a href="#tab2" data-toggle="tab" class="step active">
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
                                                            <label class="control-label">{{ _t('register.sponsor') }}</label>
                                                            <input type="text" name="sponsor" value="testuser" readonly>
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
                                                    <input type="text" value="{{ $placement ? $placement : '' }}"
                                                           class="form-control ajaxValidate" name="placement"
                                                           data-action="verifyUsername">
                                                </div>
                                            </div>
                                        </div>
                                        <div style="display: none">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-4">{{ _t('register.position') }}
                                                </label>
                                                <div class="col-md-6 col-sm-12">
                                                    <input type="text" value="" class="form-control" name="position">
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
                                

                                    <!-- Profile info tab end-->
                                    <!-- Placement Details info tab start-->
                                    @if(getScope()=='admin')
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
                                                                <option value="">Select position</option>
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
                                    <div class="tab-pane" id="tab2">
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

                                    <div class="tab-pane" id="tab5">
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
                                    <a href="javascript:;"
                                       class="btn-action proceed" style="display: none;" attr_type="freepay">{{_t('register.paynow')}} <i class="fa fa-angle-right"></i></a>

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
                        <input type="hidden" name="mode" value="test"/>
                        <input type="hidden" name="context" value="public_registration">
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
                        if($(this).val() < selectedmonth + 1)
                        {
                            $(this).attr('disabled',true);
                        }
                    })
                }
                else if(currentyear == new Date().getFullYear())
                {
                    monthselect.find('option').each(function(){
                        if($(this).val() <= new Date().getMonth() + 1)
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
        }

        $('.day_container select').change(function(){
            var data = {}; var enable = true;
            $(this).parent().find('select').each(function(){
                var name = $(this).attr('class');
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
                $(this).parent().parent().find('input').eq(0).val(data['year'] +"-" + data['month'] + "-" + data['day']);
            }
            else
            {
                $(this).parent().parent().find('input').eq(0).val('');
            }
        })

        $('.steps li').click(function(){
            let tab = $(this).find('a').eq(0).attr('href');
            if(tab == '#tab2'){
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
            if(tab == '#tab1'){
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
