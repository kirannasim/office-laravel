@foreach($scripts as $script)
    <script type="text/javascript" src="{{ $script }}"></script>
@endforeach
<div class="row moduleConfig BusinessWallet">
    <div class="col-md-12">
        {!! Form::open(['route' => ['admin.module.configure',$moduleId],'class' => 'form-horizontal adminConfig','id' => 'adminConfig']) !!}
        <div class="panel panel-primary Transaction">
            <div class="panel-heading">
                <div class="caption">
                    <i class="icon-puzzle font-grey-gallery"></i>
                    <span class="caption-subject bold font-grey-gallery uppercase">{{ _mt($moduleId,'BusinessWallet.Business_Wallet_Configuration') }}  </span>
                </div>
            </div>
            <div class="panel-body" style="height: auto;">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">{{ _mt($moduleId,'BusinessWallet.transaction_password') }}</label>
                            <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                <input type="password" name="module_data[transaction_password]" class="form-control"
                                       id="transaction_password"
                                       placeholder="{{ _mt($moduleId,'BusinessWallet.transaction_password') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label">{{ _mt($moduleId,'BusinessWallet.confirm_transaction_password') }}</label>
                            <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                <input type="password" name="module_data[transaction_password_confirmation]"
                                       class="form-control"
                                       id="form_control_1"
                                       placeholder="{{ _mt($moduleId,'BusinessWallet.confirm_transaction_password') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>{{ _mt($moduleId,'BusinessWallet.IP_White_List') }}</label>
                            <div class="input-group walletRadio">
                                <input type="radio" id="ip_status_enabled" value="1"
                                       name="module_data[ip_status]"
                                       @if($config->get('ip_status')) checked="" @endif>
                                <label for="ip_status_enabled">
                                    <span class="inc"></span>
                                    <span class="check"></span>
                                    <span class="box"></span> {{ _mt($moduleId,'BusinessWallet.Enable') }} </label>
                                <input type="radio" id="ip_status_disabled" value="0"
                                       name="module_data[ip_status]"
                                       @if(!$config->get('ip_status')) checked="" @endif>
                                <label for="ip_status_disabled">
                                    <span class="inc"></span>
                                    <span class="check"></span>
                                    <span class="box"></span> {{ _mt($moduleId,'BusinessWallet.Disable') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="ip_status_body"
                             @if(!$config->get('ip_status')) style="display: none" @endif>

                            <div class="form-group">
                                <label>{{ _mt($moduleId,'BusinessWallet.IP') }}</label>
                                <div class="input-group" id="ip" style="width: 100%;">
                                    <input type="text" class="form-control" placeholder="IP"
                                           name="module_data[ip]"
                                           value="{{$config->get('ip')}}"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <button type="button" value="{{ _mt($moduleId,'BusinessWallet.Save') }}"
                                    class="form-control ladda-button btn green button-submit" data-style="contract"
                                    name="amount"
                                    style="display: inline-block;">{{ _mt($moduleId,'BusinessWallet.Save') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

<script>
    'use strict';
    // mange transfer enabled div
    $('#ip_status_enabled').click(
        function () {
            $('.ip_status_body').show();
        }
    );
    $('#ip_status_disabled').click(
        function () {

            $('.ip_status_body').hide();
        }
    );

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
                'module_data[transaction_password]': {
                    required: true,
                    ajaxValidate: true,
                },
                'module_data[transaction_password_confirmation]': {
                    required: true,
                    ajaxValidate: true,
                    equalTo: "#transaction_password"
                },
            },
            messages: {
                'module_data[transaction_password]': {
                    required: "{{ _mt($moduleId,'BusinessWallet.Please_enter_transaction_password') }}",
                },
                'module_data[transaction_password_confirmation]': {
                    required: "{{ _mt($moduleId,'BusinessWallet.Please_enter_confirm_transaction_password') }}",
                    equalTo: "{{ _mt($moduleId,'BusinessWallet.Confirm_transaction_password_and_transaction_password_not_match') }}",
                },
            },

            errorPlacement: function (error, element) {
                if (element.is(':checkbox')) {
                    error.insertAfter(element.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline"));
                } else if (element.is(':radio')) {
                    error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline"));
                } else {
                    error.insertAfter(element.closest('.input-group')); // for other inputs, just perform default behavior
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

        $('.BusinessWallet .button-submit').click(function () {

            $('.ajaxValidationError').removeClass('ajaxValidationError');

            var successCallBack = function (response) {
                Ladda.stopAll();
                toastr.success("{{ _mt($moduleId,'BusinessWallet.Configuration_saved_sucessfully') }}");
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

    .form-group.form-md-radios label {
        display: block;
    }

    .form-group.form-md-radios .md-radio {
        display: inline-block !important;
        float: left;
        margin-right: 20px;
        margin-top: 10px;
    }

    .input-group.walletRadio label {
        padding: 0px 10px 0px 5px;
        display: inline-block;
    }

</style>
