<form class="passChange col-md-12">
    <div class="errorNotice">
        <h3>{{ _mt($moduleId,'IPayWallet.something_went_wrong') }}</h3>
        <div class="errorWrapper"></div>
    </div>
    <div class="inputs">
        <h2 class="heading">{{ _mt($moduleId,'IPayWallet.change_transaction_password') }}</h2>
        <div class="firstPart">
            <div class="changePasswordFields">
                <div class="row changePass">
                    <div class="form-group">
                        <label class="control-label col-md-4">{{ _mt($moduleId,'IPayWallet.new_password') }}
                            <span class="required" aria-required="true"> * </span>
                        </label>
                        <div class="col-md-6">
                            <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="icon-lock"></i>
                                        </span>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row changePass">
                    <div class="form-group">
                        <label class="control-label col-md-4">{{ _mt($moduleId,'IPayWallet.re_enter_password') }}
                            <span class="required" aria-required="true"> * </span>
                        </label>
                        <div class="col-md-6">
                            <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="icon-lock"></i>
                                    </span>
                                <input type="password" class="form-control" name="password_confirmation"
                                       id="password_confirmation">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-outline dark ladda-button changePassword"
                                data-style="contract" data-spinner-color="#000">
                            {{ _mt($moduleId,'IPayWallet.update') }}
                        </button>
                    </div>
                </div>
            </div>
            <div class="transactionPassLoader" data-unit="transactionPassView"></div>
            <div class="successNotice">
                <i class="fa fa-check"></i>
                <h3>{{ _mt($moduleId,'IPayWallet.tran_password_updated') }}</h3>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    'use strict';

    Ladda.bind('.ladda-button');

    $('button.changePassword').click(function () {
        if (validatePasswordForm() === false) {
            Ladda.stopAll();
            return false;
        }
        var formData = $('form.passChange').serialize();
        var post = $.post('{{ route(strtolower(getScope()).".ipaywallet.validate.change_password") }}', formData, function (response) {
            $('.changePasswordFields').slideUp();
            refreshAjaxData($('.transactionPassLoader'), '{!! route(strtolower(getScope()).".ipaywallet.tran.password.view") !!}');
            Ladda.stopAll();
        }).fail(function (response) {
            switch (response.status) {
                case 422:
                    var errors = response.responseJSON;
                    addValidationError(errors);
                    Ladda.stopAll();
                    break;
            }
        });
    });

    //Payment form validation
    function validatePasswordForm() {
        var password = $("#password_confirmation ").val();
        var confirmPassword = $("#password_confirmation").val();

        if ((password.length < 8) || (confirmPassword.length < 8)) {
            addValidationError({password: "{{ _mt($moduleId,'IPayWallet.re_enter_password') }}"});
            return false;
        }
        if (password != confirmPassword) {
            addValidationError({missmatch: "{{ _mt($moduleId,'IPayWallet.Confirm_Password_Miss_Match') }}"});
            return false;
        }

        resetValidationtErrors();

        return true;
    }

    function resetValidationtErrors() {
        $('.errorNotice').slideUp().find('.errorWrapper').empty().slideUp();
    }

    //Add payment errors
    function addValidationError(errors) {
        //console.log(errors);
        $('.errorNotice').slideDown().find('.errorWrapper').empty().slideDown();

        for (var key in errors) {
            var message = $.isArray(errors[key]) ? errors[key][0] : errors[key];
            var outPut = '<div class="eachError">';
            outPut += '<span class="key">' + key + '</span><i>-</i>';
            outPut += '<span class="message">' + message + '</span>';
            outPut += '</div>';

            $('.errorNotice .errorWrapper').append(outPut);
        }
    }
</script>
