@foreach($scripts as $script)
    <script type="text/javascript" src="{{ $script }}"></script>
@endforeach
<div class="row moduleConfig Ewallet">
    <div class="col-md-12">
        <div class="panel panel-primary Transaction">
            {!! Form::open(['route' => ['admin.module.configure',$moduleId],'class' => 'form-horizontal adminConfig','id' => 'adminConfig']) !!}
            <div class="panel-heading">
                <div class="caption">
                    <i class="icon-puzzle font-grey-gallery"></i>
                    <span class="caption-subject bold font-grey-gallery uppercase"> {{ _mt($moduleId,'Ewallet.E-Wallet_Configuration') }} </span>
                </div>
            </div>
            <div class="panel-body" style="height: auto;">
                <div class="row">
                    <!-- BEGIN Portlet PORTLET-->
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="form-group">
                                <label class="col-sm-6">{{ _mt($moduleId,'Ewallet.Payout_Request') }}  </label>
                                <div class="col-sm-6  walletRadio">
                                    <input type="radio" value="1"
                                           name="module_data[payout_provision]"
                                           @if($config->get('payout_provision')) checked="" @endif>
                                    <label for="payout_provision">
                                        <span class="box"></span> {{ _mt($moduleId,'Ewallet.Enable') }} </label>
                                    <input type="radio" value="0"
                                           name="module_data[payout_provision]"
                                           @if(!$config->get('payout_provision')) checked="" @endif>
                                    <label for="payout_provision">
                                        <span class="box"></span> {{ _mt($moduleId,'Ewallet.Disable') }} </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="form-group">
                                <label class="col-sm-6">{{ _mt($moduleId,'Ewallet.Fund_Transfer') }}  </label>
                                <div class="col-sm-6 walletRadio">
                                    <input type="radio" value="1" id="transfer_provision_enabled"
                                           name="module_data[transfer_provision]"
                                           @if($config->get('transfer_provision')) checked="" @endif>
                                    <label for="transfer_provision">
                                        <span class="box"></span> {{ _mt($moduleId,'Ewallet.Enable') }} </label>
                                    <input type="radio" value="0" id="transfer_provision_disabled"
                                           name="module_data[transfer_provision]"
                                           @if(!$config->get('transfer_provision')) checked="" @endif>
                                    <label for="transfer_provision">
                                        <span class="box"></span> {{ _mt($moduleId,'Ewallet.Disable') }} </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="transfer_provision_body"
                         @if(!$config->get('transfer_provision')) style="display: none" @endif>
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label class="col-sm-6">{{_mt($moduleId,'Ewallet.Minimum_Amount') }}</label>
                                    <div class="col-sm-6 walletRadio">
                                        <input type="radio" value="1" id="minimum_transfer_enabled"
                                               name="module_data[minimum_transfer]"
                                               @if($config->get('minimum_transfer')) checked="" @endif>
                                        <label for="minimum_transfer">
                                            <span class="box"></span> {{_mt($moduleId,'Ewallet.Enable') }}
                                        </label>
                                        <input type="radio" value="0" id="minimum_transfer_disabled"
                                               name="module_data[minimum_transfer]"
                                               @if(!$config->get('minimum_transfer')) checked="" @endif>
                                        <label for="minimum_transfer">
                                            <span class="box"></span> {{_mt($moduleId,'Ewallet.Disable') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-7">
                                <div>
                                    <div class="minimum_transfer_body"
                                         @if(!$config->get('minimum_transfer')) style="display: none" @endif>
                                        <div class="form-group">
                                            <label class="col-sm-6">{{_mt($moduleId,'Ewallet.Minimum_Transfer_Amount') }}</label>
                                            <div class="col-sm-4 input-group" id="min_transfer_amount"
                                                 style="padding-left: 15px;">
                                                        <span class="input-group-addon dollar_transfer">
                                                                <i class="fa fa-money"></i>
                                                        </span>
                                                <input type="text" class="form-control" placeholder="Amount"
                                                       name="module_data[minimum_amount]"
                                                       value="{{$config->get('minimum_amount')}}"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label class="col-sm-6">{{_mt($moduleId,'Ewallet.Maximum_Amount') }}
                                    </label>
                                    <div class="col-sm-6 walletRadio">
                                        <input type="radio" value="1" id="maximum_transfer_enabled"
                                               name="module_data[maximum_transfer]"
                                               @if($config->get('maximum_transfer')) checked="" @endif>
                                        <label for="maximum_transfer">
                                            <span class="box"></span> {{_mt($moduleId,'Ewallet.Enable') }}
                                        </label>
                                        <input type="radio" value="0" id="maximum_transfer_disabled"
                                               name="module_data[maximum_transfer]"
                                               @if(!$config->get('maximum_transfer')) checked="" @endif>
                                        <label for="maximum_transfer">
                                            <span class="box"></span> {{_mt($moduleId,'Ewallet.Disable') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="">
                                    <div class="maximum_transfer_body"
                                         @if(!$config->get('maximum_transfer')) style="display: none" @endif>
                                        <div class="form-group">
                                            <label class="col-sm-6">{{_mt($moduleId,'Ewallet.Maximum_Transfer_Amount') }}</label>
                                            <div class="col-sm-4 input-group" id="max_transfer_amount"
                                                 style="padding-left: 15px;">
                                                        <span class="input-group-addon dollar_transfer">
                                                                <i class="fa fa-money"></i>
                                                        </span>
                                                <input type="text" class="form-control" placeholder="Amount"
                                                       name="module_data[maximum_amount]"
                                                       value="{{$config->get('maximum_amount')}}"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label class="col-sm-6">{{_mt($moduleId,'Ewallet.Cross_Wallet_Transfer') }}
                                    </label>
                                    <div class="col-sm-6 walletRadio">
                                        <input type="radio" value="1" id="cross_transfer_enabled"
                                               name="module_data[cross_transfer]"
                                               @if($config->get('cross_transfer')) checked="" @endif>
                                        <label for="cross_transfer">
                                            <span class="box"></span> {{_mt($moduleId,'Ewallet.Enable') }}
                                        </label>
                                        <input type="radio" value="0" id="cross_transfer_disabled"
                                               name="module_data[cross_transfer]"
                                               @if(!$config->get('cross_transfer')) checked="" @endif>
                                        <label for="cross_transfer">
                                            <span class="box"></span> {{_mt($moduleId,'Ewallet.Disable') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6">
                                    <div class="cross_transfer_body"
                                         @if(!$config->get('cross_transfer')) style="display: none" @endif>
                                        <div class="form-group">
                                            <select class="walletSelect" name="module_data[cross_wallets][]" multiple>
                                                @foreach($wallets as $wallet)
                                                    <option value="{{ $wallet->moduleId }}"
                                                            @if($config->get('cross_wallets') && in_array($wallet->moduleId,$config->get('cross_wallets'))) selected @endif >{{ $wallet->registry['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="form-group">
                                <label class="col-sm-6">{{ _mt($moduleId,'Ewallet.fund_transfer_restricted_to') }}  </label>
                                <div class="col-sm-6">
                                    <select name="module_data[fund_transfer_restricted_to]">
                                        <option value="all"
                                                @if($config->get('fund_transfer_restricted_to') == 'all')
                                                selected @endif >
                                            {{ _mt($moduleId,'Ewallet.Allow_to_all') }}
                                        </option>
                                        <option value="placement"
                                                @if($config->get('fund_transfer_restricted_to') == 'placement')
                                                selected @endif >
                                            {{ _mt($moduleId,'Ewallet.Placement') }}
                                        </option>
                                        <option value="sponsor"
                                                @if($config->get('fund_transfer_restricted_to') == 'sponsor')
                                                selected @endif >
                                            {{ _mt($moduleId,'Ewallet.Sponsor') }}
                                        </option>
                                        <option value="referral"
                                                @if($config->get('fund_transfer_restricted_to') == 'referral')
                                                selected @endif >
                                            {{ _mt($moduleId,'Ewallet.Referral') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Portlet PORTLET-->
            <div class="row form-group">
                <div class="col-sm-7">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                        <button type="button" value="{{ _mt($moduleId,'Ewallet.Save') }}"
                                class="form-control ladda-button btn green button-submit" data-style="contract"
                                name="amount">{{ _mt($moduleId,'Ewallet.Save') }}
                        </button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>


<script>
    'use strict';
    //select2
    $('select').select2({});

    // fund transfer  enabled div
    $('#transfer_provision_enabled').on('ifChecked', function (event) {
        $('.transfer_provision_body').show();
    });

    $('#transfer_provision_enabled').on('ifUnchecked', function (event) {
        $('.transfer_provision_body').hide();
    });

    // minimum transfer enabled div
    $('#minimum_transfer_enabled').on('ifChecked', function (event) {
        $('.minimum_transfer_body').show();
    });

    $('#minimum_transfer_enabled').on('ifUnchecked', function (event) {
        $('.minimum_transfer_body').hide();
    });

    // minimum transfer enabled div
    $('#maximum_transfer_enabled').on('ifChecked', function (event) {
        $('.maximum_transfer_body').show();
    });

    $('#maximum_transfer_enabled').on('ifUnchecked', function (event) {
        $('.maximum_transfer_body').hide();
    });

    // minimum transfer enabled div
    $('#cross_transfer_enabled').on('ifChecked', function (event) {
        $('.cross_transfer_body').show();
    });

    $('#cross_transfer_enabled').on('ifUnchecked', function (event) {
        $('.cross_transfer_body').hide();
    });

    //Document ready functions
    $(function () {
        Ladda.bind('.ladda-button');

        var form = $('#adminConfig');
        var error1 = $('.alert-danger', form);
        var success1 = $('.alert-success', form);

        $.validator.addMethod('ajaxValidate', function (value, element, param) {
            var isValid = !$(element).parent().hasClass('ajaxValidationError');
            return isValid; // return bool here if valid or not.
        }, function (param, element) {
            return $(element).siblings('.help-block-error').text();
        });

        var validator = form.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            rules: {
                'module_data[payout_provision]': {
                    required: true,
                    ajaxValidate: true,
                },
                'module_data[transfer_provision]': {
                    required: true,
                    ajaxValidate: true,
                },
                'module_data[minimum_transfer]': {
                    required: true,
                    ajaxValidate: true,
                },
                'module_data[minimum_amount]': {
                    number: true,
                    ajaxValidate: true,
                },
                'module_data[maximum_transfer]': {
                    required: true,
                    ajaxValidate: true,
                },
                'module_data[maximum_amount]': {
                    required: true,
                    ajaxValidate: true,
                },
                'module_data[cross_transfer]': {
                    required: true,
                    ajaxValidate: true,
                },
                'module_data[cross_wallets]': {
                    required: true,
                    ajaxValidate: true,
                },
            },
            messages: {
                'module_data[payout_provision]': {
                    required: "{{ _mt($moduleId,'Ewallet.Please_set_payout_provision') }}",
                },
                'module_data[transfer_provision]': {
                    required: "{{ _mt($moduleId,'Ewallet.Please_set_transfer_provision') }}",
                },
                'module_data[minimum_transfer]': {
                    required: "{{ _mt($moduleId,'Ewallet.Please_set_minimum_transfer') }}",
                },
                'module_data[minimum_amount]': {
                    number: "{{ _mt($moduleId,'Ewallet.Please_enter_valid_amount') }}",
                },
                'module_data[maximum_transfer]': {
                    required: "{{ _mt($moduleId,'Ewallet.Please_set_maximum_transfer') }}",
                },
                'module_data[maximum_amount]': {
                    required: "{{ _mt($moduleId,'Ewallet.Please_enter_valid_amount') }}",
                },
                'module_data[cross_transfer]': {
                    required: "{{ _mt($moduleId,'Ewallet.Please_set_cross_transfer_option') }}",
                },
            },

            errorPlacement: function (error, element) {
                if (element.is(':checkbox')) {
                    error.insertAfter(element.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline"));
                } else if (element.is(':radio')) {
                    error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline"));
                } else {
                    error.insertAfter(element); // for other inputs, just perform default behavior
                }
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },
        });

        //Registration request

        $('.Ewallet .button-submit').click(function () {

            $('.ajaxValidationError').removeClass('ajaxValidationError');

            var successCallBack = function (response) {
                Ladda.stopAll();
                toastr.success("{{ _mt($moduleId,'Ewallet.Configuration_saved_sucessfully') }}");
            };

            if (!form.valid()) {
                Ladda.stopAll();
                return false;
            }

            var failCallBack = function (response) {
                Ladda.stopAll();
                var errors = response.responseJSON;

                for (var key in errors) {
                    var elemKey = 'module_data' + '[' + key.split('.')[1] + ']';
                    $('#adminConfig [name="' + elemKey + '"]').parent().addClass('ajaxValidationError');
                    var errorOption = {};
                    errorOption[elemKey] = errors[key];
                    validator.showErrors(errorOption);
                }
            };

            var options = {
                form: form,
                actionUrl: "{{ route('admin.module.save',['module_id' => $moduleId]) }}",
                successCallBack: successCallBack,
                failCallBack: failCallBack
            };
            sendForm(options);
        });
    });

    //Small patch

    $('body').on('keyup click', '.ajaxValidationError input', function () {
        $(this).parent().removeClass('ajaxValidationError');
    });

    //i-check
    $('.walletRadio input[type="radio"]').iCheck({
        checkboxClass: 'icheckbox_minimal',
        radioClass: 'iradio_minimal',
        increaseArea: '20%' // optional
    });
</script>

<style>
    .moduleConfig .panel-primary .panel-heading {
        color: #4d4d4d;
        background-color: #eeeeee;
        border-color: #eeeeee;
        font-weight: 600;
    }

    .moduleConfig .panel-primary .panel-heading {
        color: #919191;
    }

    .moduleConfig .panel-primary {
        border-color: #eeeeee;
    }

    .moduleConfig .mt-radio-inline {
        padding: 0px;
    }

    .moduleConfig .form-group {
        margin: 10px 0px;
    }

    .moduleConfig .control-label {
        text-align: right;
        margin-bottom: 10px;
        padding-top: 7px;
    }

    .ewalletConfiq .row {
        /* margin: 0px;*/
    }

    .row.moduleConfig.Ewallet .input-group-addon > i {
        color: #aaaaaf;
    }
</style>
