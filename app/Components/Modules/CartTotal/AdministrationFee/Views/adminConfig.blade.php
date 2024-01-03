@foreach($scripts as $script)
    <script type="text/javascript" src="{{ $script }}"></script>
@endforeach
@foreach($styles as $style)
    <link href="{{ $style }}" rel="stylesheet" type="text/css"/>
@endforeach
<div class="row moduleConfig RegistrationFee">
    <div class="col-sm-12">
        {!! Form::open(['route' => ['admin.module.configure',$moduleId],'class' => 'form-horizontal adminConfig','id' => 'adminConfig']) !!}
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span aria-hidden="true"
                      class="icon-note"></span> {{ _mt($moduleId, 'RegistrationFee.Registration_Fee_Configuration') }}
            </div>
            <div class="panel-body">
                <div class="row form-group">
                    <div class="col-md-3">
                        <label>{{ _mt($moduleId, 'RegistrationFee.Registration_Fee') }}  </label>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-money"></i>
                            </span>
                            <input type="text" name="module_data[amount]" class="form-control"
                                   value="{{ $config->get('amount') }}">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-offset-3 col-md-3">
                        <button type="button" value="{{ _mt($moduleId, 'RegistrationFee.Save') }}"
                                class="form-control ladda-button btn green button-submit" data-style="contract"
                                name="amount">{{ _mt($moduleId, 'RegistrationFee.Save') }}</button>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

<script type="text/javascript">
    "use strict";
    //Document ready functions

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
                'module_data[amount]': {
                    required: true,
                    number: true,
                    ajaxValidate: true,
                },
            },
            messages: {
                'module_data[amount]': {
                    required: "{{ _mt($moduleId, 'RegistrationFee.Please_enter_registration_fee') }}",
                    number: "{{ _mt($moduleId, 'RegistrationFee.Invalid_registration_fee') }}",
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

        $('.RegistrationFee .button-submit').click(function () {

            $('.ajaxValidationError').removeClass('ajaxValidationError');

            var successCallBack = function (response) {
                Ladda.stopAll();
                toastr.success("{{ _mt($moduleId, 'RegistrationFee.Configuration_saved_sucessfully') }}");
            }

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
        /*margin-bottom: 10px;*/
    }

    .ajaxValidationError.has-error .help-block-error {
        opacity: 1 !important;
    }
</style>
