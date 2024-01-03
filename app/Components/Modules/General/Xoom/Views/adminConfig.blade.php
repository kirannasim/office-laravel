<script src="{{ asset('global/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('global/plugins/jquery-validation/js/additional-methods.min.js') }}"></script>


@foreach($scripts as $script)
    <script type="text/javascript" src="{{ $script }}"></script>
@endforeach
@foreach($styles as $style)
    <link href="{{ $style }}" rel="stylesheet" type="text/css"/>
@endforeach


<div class="row moduleConfig XoomSettings">
    <div class="col-sm-12">
        {!! Form::open(['route' => ['admin.module.configure', $moduleId], 'class' => 'form-horizontal adminConfig','id' => 'adminConfig']) !!}
        <div class="panel panel-primary">
            <div class="panel-heading"><span aria-hidden="true" class="icon-tag"></span>
                XOOM - LiveWebinar Settings
            </div>
            <div class="panel-body">
                <p>
                    <em>Please contact <a
                                href="mailto:sales@livewebinar.com?subject=hybridmlm">sales@livewebinar.com</a> for your
                        enterprise API details required below</em>
                <hr/>
                </p>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label>XOOM_API_ENTERPRISE_IDENTIFIER</label>
                    </div>
                    <div class="col-md-3 form-group">
                        <input type="text" class="form-control input-medium"
                               name="module_data[XOOM_API_ENTERPRISE_IDENTIFIER]"
                               value="{{ $config->get('XOOM_API_ENTERPRISE_IDENTIFIER') }}"/>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label>XOOM_API_USERNAME</label>
                    </div>
                    <div class="col-md-3 form-group">
                        <input type="text" class="form-control input-medium" name="module_data[XOOM_API_USERNAME]"
                               value="{{ $config->get('XOOM_API_USERNAME') }}"/>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label>XOOM_API_PASSWORD</label>
                    </div>
                    <div class="col-md-3 form-group">
                        <input type="text" class="form-control input-medium" name="module_data[XOOM_API_PASSWORD]"
                               value="{{ $config->get('XOOM_API_PASSWORD') }}"/>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label>XOOM_API_CLIENT_ID</label>
                    </div>
                    <div class="col-md-3 form-group">
                        <input type="text" class="form-control input-medium" name="module_data[XOOM_API_CLIENT_ID]"
                               value="{{ $config->get('XOOM_API_CLIENT_ID') }}"/>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label>XOOM_API_CLIENT_SECRET</label>
                    </div>
                    <div class="col-md-3 form-group">
                        <input type="text" class="form-control input-medium" name="module_data[XOOM_API_CLIENT_SECRET]"
                               value="{{ $config->get('XOOM_API_CLIENT_SECRET') }}"/>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <label>PANEL ENTERPRISE DOMAIN (https://...)</label>
                    </div>
                    <div class="col-md-3 form-group">
                        <input type="text" class="form-control input-medium" name="module_data[XOOM_APP_DOMAIN]"
                               value="{{ $config->get('XOOM_APP_DOMAIN') }}"/>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <h4>Map Packages to LiveWebinar Packages (optional):</h4>
                    </div>
                </div>
                @foreach($packages as $package)
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label>- {{ $package->name }} ({{ $package->id }})</label>
                        </div>
                        <div class="col-md-3 form-group">
                            <input type="text" class="form-control input-medium"
                                   name="module_data[packages_map][{{ $package->id }}]"
                                   value="{{ ($config->get('packages_map')[$package->id] ?? '') }}"/>
                        </div>
                    </div>
                @endforeach

                <div class="form-group offset4">
                    <div class="col-md-1">
                        <button type="button" value="Save"
                                class="form-control ladda-button btn green button-submit" data-style="contract"
                                name="amount">Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>


<hr>


<script>
    "use strict";
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

                'module_data[XOOM_API_ENTERPRISE_IDENTIFIER]': {
                    required: true,
                    ajaxValidate: true,
                },
                'module_data[XOOM_API_USERNAME]': {
                    required: true,
                    ajaxValidate: true,
                },
                'module_data[XOOM_API_PASSWORD]': {
                    required: true,
                    ajaxValidate: true,
                },
                'module_data[XOOM_API_CLIENT_ID]': {
                    required: true,
                    ajaxValidate: true,
                },
                'module_data[XOOM_API_CLIENT_SECRET]': {
                    required: true,
                    ajaxValidate: true,
                },
                'module_data[XOOM_APP_DOMAIN]': {
                    required: true,
                    ajaxValidate: true,
                },
            },
            messages: {
                'module_data[XOOM_API_ENTERPRISE_IDENTIFIER]': "{{ _mt($moduleId,'Xoom.api_enterprise_identifier_required') }}",
                'module_data[XOOM_API_USERNAME]': "{{ _mt($moduleId,'Xoom.api_user_email_required') }}",
                'module_data[XOOM_API_PASSWORD]': "{{ _mt($moduleId,'Xoom.api_user_password_required') }}",
                'module_data[XOOM_API_CLIENT_ID]': "{{ _mt($moduleId,'Xoom.api_client_id_required') }}",
                'module_data[XOOM_API_CLIENT_SECRET]': "{{ _mt($moduleId,'Xoom.api_client_secret_required') }}",
                'module_data[XOOM_APP_DOMAIN]': "{{ _mt($moduleId,'Xoom.api_domain_required') }}",
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

        $('.XoomSettings .button-submit').click(function () {

            $('.ajaxValidationError').removeClass('ajaxValidationError');

            var successCallBack = function (response) {
                Ladda.stopAll();
                toastr.success("{{ _mt($moduleId,'Xoom.Configuration_saved_successfully') }}");
            };

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
</script>
<style>
    .xoomWrapper .panel-heading h3 {
        padding: 0px;
        font-size: 17px;
        margin: 0;
        margin-bottom: 0px;
        font-weight: 600;
        padding-bottom: 0px;
        cursor: pointer;
        border-bottom: 0px;
    }

    .moduleConfiq .panel-primary .panel-heading {
        color: #4d4d4d;
        background-color: #eeeeee;
        border-color: #eeeeee;
        font-weight: 600;
    }

    .moduleConfiq .panel-primary .panel-heading {
        color: #919191;
    }

    .moduleConfiq .panel-primary {
        border-color: #eeeeee;
    }

    .moduleConfiq .mt-radio-inline {
        padding: 0px;
    }

    .moduleConfiq input.form-control {
        margin-bottom: 10px;
    }

    .moduleConfiq .profileSection h3 {
        font-size: 17px;
        margin: 0;
        margin-bottom: 0px;
        font-weight: 600;
        padding-bottom: 0px;
        cursor: pointer;
        border-bottom: 0px;
    }

    .xoomWrapper .panel-heading {
        color: #919191;
        background-color: #eeeeee;
        border-color: #eeeeee;
        font-weight: 600;
    }

    .xoomWrapper .panel-heading span {
        padding-top: 4px;
        display: block;
    }

    .xoomWrapper .panel-heading span i {
        font-size: 17px;
    }

    .xoomWrapper .panel-heading button.addNewXoom {
        float: right;
    }

    .xoomWrapper .panel-body table.table button.btn {
        width: 45px;
        display: inline-block !important;
    }

    .row.xoomButton {
        margin: 0px;
    }

    .row.xoomButton button.btn {
        float: right;
        margin-bottom: 10px;
        color: #8a8585;
    }

    .row.xoomButton .col-sm-4 {
        padding: 0pc;
    }

    .moduleConfiq.xoomSection .form-control {
        margin-bottom: 10px;
    }
</style>
