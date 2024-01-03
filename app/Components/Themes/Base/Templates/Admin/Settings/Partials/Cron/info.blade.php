<div class="col-sm-5 cronInfo">
    <div class="row" style="margin: 0px;">
        {!! Form::open(['route' => 'cron.email.update','class' => 'cronEmailForm ajaxSave','id' => 'cronEmailForm', 'novalidate' => 'novalidate']) !!}
        <h3>{{ _t('settings.cron_email') }}</h3>
        <p>{{ _t('settings.cron_info_meta_description') }}</p>
        <p>{{ _t('settings.cron_info_description') }}</p>
        <div class="form-group">
            <label>
                <b>{{ _t('settings.current_email') }}</b>
            </label>
            <span>{{ $email }}</span>
        </div>
        <div class="form-group">
            <label id="lblEmail" for="email">
                {{ _t('settings.email') }}
            </label>
            <div class="row">
                <div class="col-sm-12">
                    <input type="text" name="email" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="button" class="btn blue email-submit button-submit"
                    data-style="contract">{{ _t('settings.update_email') }}
            </button>
        </div>
        {!! Form::close() !!}
    </div>
    {{--<div class="row">
        <div class="cronInfoBox">
            <p>/usr/local/bin/ea-php56 /home/fooditnow/domain_path/path/to/cron/script
                In the above example, replace “ea-php56” with the PHP version assigned to the domain you wish to
                use. Look in the MultiPHP Manager for the actual PHP version assigned to a domain.</p>
        </div>
    </div>--}}
</div>
<script type="text/javascript">
    "use strict";

    //Document ready functions
    $(function () {
        var form = $('#cronEmailForm');
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
                'email': {
                    email: true,
                    ajaxValidate: true,
                }
            },
            messages: {
                'email': {
                    email: "{{ _t('settings.please_enter_valid_email') }}",
                }
            },

            errorPlacement: function (error, element) {
                error.insertAfter(element);
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

        $('.cronInfo .button-submit').click(function () {

            $('.ajaxValidationError').removeClass('ajaxValidationError');

            var successCallBack = function (response) {
                Ladda.stopAll();
                loadInfo();
                toastr.success("{{ _t('settings.email_updated_successfully') }}");
            }

            if (!form.valid()) {
                Ladda.stopAll();
                return false;
            }

            var failCallBack = function (response) {
                Ladda.stopAll();
                var errors = response.responseJSON;

                for (var key in errors) {
                    var elemKey = key;
                    $('#cronEmailForm [name="' + elemKey + '"]').parent().addClass('ajaxValidationError');
                    var errorOption = {};
                    errorOption[elemKey] = errors[key];
                    validator.showErrors(errorOption);
                }
            }

            var options = {
                form: form,
                actionUrl: "{{ route('cron.email.update') }}",
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