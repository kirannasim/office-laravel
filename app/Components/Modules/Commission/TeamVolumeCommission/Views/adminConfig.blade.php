@foreach($scripts as $script)
    <script type="text/javascript" src="{{ $script }}"></script>
@endforeach
@foreach($styles as $style)
    <link href="{{ $style }}" rel="stylesheet" type="text/css"/>
@endforeach
<div class="row moduleConfig TeamVolumeCommission">
    <div class="col-sm-12">
        {!! Form::open(['route' => ['admin.module.configure', $moduleId], 'class' => 'form-horizontal adminConfig','id' => 'adminConfig']) !!}
        <div class="panel panel-primary">
            <div class="panel-heading"><span aria-hidden="true" class="icon-tag"></span>
                Team Volume Commission [TVC]
            </div>
            <div class="panel-body">
                <div class="row form-group">
                    <div class="col-md-3">
                        <label> {{ _mt($moduleId, 'TeamVolumeCommission.Distribution_Type') }} </label>
                    </div>
                    <div class="col-md-9">
                        <div class="mt-radio-inline commisionRadio">
                            <label class="mt-radio">
                                <input type="radio" class="distribution_type" name="module_data[distribution_type]"
                                       value="flat"
                                       @if($config->get('distribution_type') == 'flat') checked @endif > {{ _mt($moduleId, 'TeamVolumeCommission.Flat') }}
                            </label>
                            <label class="mt-radio">
                                <input type="radio" class="distribution_type" name="module_data[distribution_type]"
                                       value="percent"
                                       @if($config->get('distribution_type') == 'percent') checked @endif > {{ _mt($moduleId, 'TeamVolumeCommission.Percent') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label>
                            {{ _mt($moduleId, 'TeamVolumeCommission.Pair_Price') }} <span class="type"></span>
                        </label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="module_data[pair_price]" class="form-control input-medium"
                               value="{{ $config->get('pair_price') }}">
                    </div>
                </div>
                <div class="row pair_value_div">
                    <div class="col-md-3">
                        <label>
                            {{ _mt($moduleId, 'TeamVolumeCommission.Pair_Value') }}
                        </label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="module_data[pair_value]" class="form-control input-medium"
                               value="{{ $config->get('pair_value') }}">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label> {{ _mt($moduleId, 'TeamVolumeCommission.To_Wallet') }}</label>
                    </div>
                    <div class="col-md-3">
                        <select class="walletSelect form-control input-medium" name="module_data[wallet]">
                            @foreach($wallets as $wallet)
                                <option value="{{ $wallet->moduleId }}"
                                        @if($wallet->moduleId == $config->get('wallet')) selected @endif>{{ $wallet->registry['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label>{{ _mt($moduleId,'TeamVolumeCommission.direct_referral_rule') }}
                        </label>
                    </div>
                    <div class="col-md-4">
                        <div class="moduleSwitch">
                            <label>{{ _mt($moduleId,'TeamVolumeCommission.Off') }}</label>
                            <label class="switch">
                                <input type="checkbox" id="directReferralRule"
                                       @if($config->get('direct_referral_rule')) checked @endif value="1"
                                       name="module_data[direct_referral_rule]">
                                <span class="slider round"></span>
                            </label>
                            <label>{{ _mt($moduleId,'TeamVolumeCommission.On') }}</label>
                        </div>
                    </div>
                </div>
                <div class="row form-group directReferralRuleDiv"
                     @if(!$config->get('direct_referral_rule')) style="display: none" @endif>
                    <div class="col-md-3">
                        <label>
                            {{ _mt($moduleId,'TeamVolumeCommission.direct_referral_required') }}
                        </label>
                    </div>
                    <div class="col-md-4 packagePriceBox">
                        <div class="row">
                            <div class="col-sm-5">
                                <label>{{ _mt($moduleId,'TeamVolumeCommission.left') }}</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="number" name="module_data[required_left_referral]"
                                       class="form-control"
                                       value="{{ $config->get('required_left_referral') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <label>{{ _mt($moduleId,'TeamVolumeCommission.right') }}</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="number" name="module_data[required_right_referral]"
                                       class="form-control"
                                       value="{{ $config->get('required_right_referral') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label> {{ _mt($moduleId, 'TeamVolumeCommission.Pair_Ceiling_Type') }}</label>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control input-medium pair_ceiling_type"
                                name="module_data[pair_ceiling_type]">
                            <option value="none"
                                    @if($config->get('pair_ceiling_type') == 'none') selected @endif>{{ _mt($moduleId, 'TeamVolumeCommission.None') }}</option>
                            <option value="monthly"
                                    @if($config->get('pair_ceiling_type') == 'monthly') selected @endif>{{ _mt($moduleId, 'TeamVolumeCommission.Monthly') }}</option>
                            <option value="weekly"
                                    @if($config->get('pair_ceiling_type') == 'weekly') selected @endif>{{ _mt($moduleId, 'TeamVolumeCommission.Weekly') }}</option>
                            <option value="daily"
                                    @if($config->get('pair_ceiling_type') == 'daily') selected @endif>{{ _mt($moduleId, 'TeamVolumeCommission.Daily') }}</option>
                        </select>
                    </div>
                </div>
                <div class="pair_ceiling_div"
                     @if($config->get('pair_ceiling_type') == 'none') style="display: none" @endif>
                    <div class="row week_day form-group"
                         @if($config->get('pair_ceiling_type') != 'weekly') style="display: none" @endif>
                        <div class="col-md-3">
                            <label> {{ _mt($moduleId,'TeamVolumeCommission.Week_Day') }}</label>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control input-medium" name="module_data[week_day]">
                                <option value="Monday"
                                        @if($config->get('week_day') == 'Monday') selected @endif>{{ _mt($moduleId,'TeamVolumeCommission.Monday') }}</option>
                                <option value="Tuesday"
                                        @if($config->get('week_day') == 'Tuesday') selected @endif>{{ _mt($moduleId,'TeamVolumeCommission.Tuesday') }}</option>
                                <option value="Wednesday"
                                        @if($config->get('week_day') == 'Wednesday') selected @endif>{{ _mt($moduleId,'TeamVolumeCommission.Wednesday') }}</option>
                                <option value="Thursday"
                                        @if($config->get('week_day') == 'Thursday') selected @endif>{{ _mt($moduleId,'TeamVolumeCommission.Thursday') }}</option>
                                <option value="Friday"
                                        @if($config->get('week_day') == 'Friday') selected @endif>{{ _mt($moduleId,'TeamVolumeCommission.Friday') }}</option>
                                <option value="Saturday"
                                        @if($config->get('week_day') == 'Saturday') selected @endif>{{ _mt($moduleId,'TeamVolumeCommission.Saturday') }}</option>
                                <option value="Sunday"
                                        @if($config->get('week_day') == 'Sunday') selected @endif>{{ _mt($moduleId,'TeamVolumeCommission.Sunday') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label>{{ _mt($moduleId,'TeamVolumeCommission.Pair_Ceiling_Based_On') }}</label>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control input-medium pair_ceiling_based"
                                    name="module_data[pair_ceiling_based]">
                                <option value="pair_count"
                                        @if($config->get('pair_ceiling_based') == 'pair_count') selected @endif>{{ _mt($moduleId,'TeamVolumeCommission.Pair_Count') }}</option>
                                <option value="amount"
                                        @if($config->get('pair_ceiling_based') == 'amount') selected @endif>{{ _mt($moduleId,'TeamVolumeCommission.Amount') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label><span class="pairCeilingBasedOnLabel">
                                @if($config->get('pair_ceiling_based') == 'amount') {{ _mt($moduleId,'TeamVolumeCommission.Amount') }} @else
                                        {{ _mt($moduleId,'TeamVolumeCommission.Pair_Count') }}
                                    @endif </span><span class="type"></span>
                            </label>
                        </div>
                        <div class="col-md-4 packagePriceBox">
                            @foreach($ranks as $rank)
                                <div class="row">
                                    <div class="col-sm-5">
                                        <label>{{ $rank->name }}</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="number" name="module_data[ceiling_rate][{{ $rank->id }}]"
                                               class="form-control"
                                               value="{{ collect($config->get('ceiling_rate'))->get($rank->id) }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="form-group offset4">
                    <div class="col-md-1">
                        <button type="button" value="{{ _mt($moduleId,'TeamVolumeCommission.Save') }}"
                                class="form-control ladda-button btn green button-submit" data-style="contract"
                                name="amount">{{ _mt($moduleId,'TeamVolumeCommission.Save') }}</button>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

<script>
    "use strict";

    $(".distribution_type").click(function () {
        var distribution_type = $("input:radio[name='module_data[distribution_type]']:checked").val();

        if (distribution_type == 'flat') {
            $(".pair_value_div").show();
            $('.type').html('');
        } else {
            $(".pair_value_div").hide();
            $('.type').html('(%)');
        }
    });

    $(".pair_ceiling_type").change(function () {
        if ($(this).val() == 'none')
            $(".pair_ceiling_div").hide();
        else if ($(this).val() == 'weekly') {
            $(".pair_ceiling_div").show();
            $(".week_day").show();
        } else {
            $(".pair_ceiling_div").show();
            $(".week_day").hide();
        }
    });

    $(".pair_ceiling_based").change(function () {
        if ($(this).val() == 'pair_count')
            $('.pairCeilingBasedOnLabel').html("{{ _mt($moduleId,'TeamVolumeCommission.Pair_Count') }}");
        else if ($(this).val() == 'amount') {
            $('.pairCeilingBasedOnLabel').html("{{ _mt($moduleId,'TeamVolumeCommission.Amount') }}");
        }
    });

    //request amount based on
    $('#directReferralRule').change(function () {
        if ($(this).is(":checked")) {
            $('.directReferralRuleDiv').show();
        } else {
            $('.directReferralRuleDiv').hide();
        }
    });

    $(function () {

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
                'module_data[distribution_type]': {
                    required: true,
                    ajaxValidate: true,
                },
                'module_data[pair_price]': {
                    required: true,
                    number: true,
                    ajaxValidate: true,
                },
                'module_data[wallet]': {
                    required: true,
                    ajaxValidate: true,
                },
                'module_data[pair_ceiling_type]': {
                    required: true,
                    ajaxValidate: true,
                },
                'module_data[pair_ceiling_based]': {
                    required: true,
                    ajaxValidate: true,
                },
                'module_data[pair_value]': {
                    required: true,
                    number: true,
                    ajaxValidate: true,
                },

            },
            messages: {
                'module_data[distribution_type]': "{{ _mt($moduleId,'TeamVolumeCommission.Please_choose_distribution_type') }}",
                'module_data[pair_price]': {
                    required: "{{ _mt($moduleId,'TeamVolumeCommission.Please_enter_pair_price') }}",
                    number: "{{ _mt($moduleId,'TeamVolumeCommission.Invalid_pair_price') }}",
                },
                'module_data[wallet]': "{{ _mt($moduleId,'TeamVolumeCommission.Please_select_wallet') }}",
                'module_data[pair_ceiling_type]': "{{ _mt($moduleId,'TeamVolumeCommission.Please_pair_ceiling_type') }}",
                'module_data[pair_ceiling_based]': "{{ _mt($moduleId,'TeamVolumeCommission.Please_select_pair_ceiling_based') }}",
                'module_data[pair_value]': {
                    required: "{{ _mt($moduleId,'TeamVolumeCommission.Please_enter_pair_value') }}",
                    number: "{{ _mt($moduleId,'TeamVolumeCommission.Invalid_pair_value') }}",
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

        $('.TeamVolumeCommission .button-submit').click(function () {

            $('.ajaxValidationError').removeClass('ajaxValidationError');

            var successCallBack = function (response) {
                Ladda.stopAll();
                toastr.success("{{ _mt($moduleId,'TeamVolumeCommission.Configuration_saved_successfully') }}");
            }

            if (!form.valid()) {
                Ladda.stopAll();
                return false;
            }

            var failCallBack = function (response) {
                Ladda.stopAll();
                var errors = response.responseJSON;

                for (var key in errors) {
                    if (key.split('.').length == 3)
                        var elemKey = 'module_data' + '[' + key.split('.')[1] + ']' + '[' + key.split('.')[2] + ']';
                    else
                        var elemKey = 'module_data' + '[' + key.split('.')[1] + ']';

                    $('#adminConfig [name="' + elemKey + '"]').parent().addClass('ajaxValidationError');
                    var errorOption = {};
                    errorOption[elemKey] = errors[key];
                    validator.showErrors(errorOption);
                }
            }

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

    //select2
    $('select').select2({});

    //i-check
    $('.mt-radio-inline input[type="radio"]').iCheck({
        checkboxClass: 'icheckbox_minimal',
        radioClass: 'iradio_minimal',
        increaseArea: '20%' // optional
    });
</script>

<style>
    .moduleConfig .panel-primary > .panel-heading {
        color: #4d4d4d;
        background-color: #eeeeee;
        border-color: #eeeeee;
        font-weight: 600;
    }

    .moduleConfig .panel-primary > .panel-heading {
        color: #919191;
    }

    .moduleConfig .panel-primary {
        border-color: #eeeeee;
    }

    .moduleConfig .mt-radio-inline {
        padding: 0px;
    }

    .moduleConfig input.form-control {
        margin-bottom: 10px;
    }

    .ajaxValidationError.has-error .help-block-error {
        opacity: 1 !important;
    }

    .mt-radio-inline label.mt-radio {
        padding: 0px;
    }

    /* switch */
    .moduleSwitch .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 40px;
    }

    .moduleSwitch .switch input {
        opacity: 0;
        /* width: 0;
         height: 0;*/
    }

    .moduleSwitch .switch .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .moduleSwitch .switch .slider:before {
        position: absolute;
        content: "";
        height: 22px;
        width: 22px;
        right: 1px;
        left: 1px;
        bottom: -3px;
        /*border: solid 1px #2196f3;*/
        background-color: #f5f2f2;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .moduleSwitch .switch input:checked + .slider {
        background-color: #2196F3;
    }

    .moduleSwitch .switch input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    .moduleSwitch .switch input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .moduleSwitch .switch .slider.round {
        border-radius: 34px !important;
    }

    .moduleSwitch .switch .slider.round:before {
        border-radius: 50%;
    }

    .moduleSwitch label {
        vertical-align: middle;
        font-weight: 600;
    }
</style>
