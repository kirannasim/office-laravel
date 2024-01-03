<div class="wallet transactionPassWrapper">
    <div class="innerWrap">
        <div class="eachField">
            <label>{{_mt($moduleId,'BusinessWallet.please_enter_your_login_password') }}</label>
        </div>
        <div class="eachField">
            <input type="password" placeholder="{{_mt($moduleId,'BusinessWallet.enter_login_password') }}"
                   name="login_password" id="login_password">
        </div>
        <div class="eachField">
            <button class="btn dark submitTransactionPass" type="button">
                <i class="fa fa-spin icon-refresh"></i>
                <i class="fa icon-cursor"></i>
                <span>{{_mt($moduleId,'BusinessWallet.submit') }}</span>
            </button>
        </div>
    </div>
</div>
<script type="text/javascript">
    'use strict';

    $('body').off('click', '.submitTransactionPass').on('click', '.submitTransactionPass', function () {
        var me = $(this);
        me.addClass('loading');
        if (validateForm() === false) {
            me.removeClass('loading');
            return false;
        }
        var options = {
            loginPass: $('.wallet.transactionPassWrapper input[type="password"]').val(),
        };
        $.post('{!! scopeRoute("businesswallet.set_password") !!}', options, function (response) {
            Ladda.stopAll();
            if (window.hasOwnProperty('transactionPassSuccessCallback')) {
                window.transactionPassSuccessCallback(response, 'rwallet');
            } else {
                $('form.transferWizard').slideDown().siblings().slideUp();
                me.removeClass('loading');
            }
        }).fail(function (response) {
            Ladda.stopAll();
            switch (response.status) {
                case 403:
                    $('.rwallet.transactionErrors').empty().append('<div class="error">Session timeout !</div>').slideDown();
                    break;
                case 401:
                    var errors = response.responseJSON;
                    $('.rwallet.transactionErrors').empty().html('<div class="error">' + errors.error + '</div>').slideDown();
                    break;
                case 422:
                    var errors = response.responseJSON;
                    addValidationError(errors);
                    break;
                    break;
            }
            me.removeClass('loading');
        });
    });

    //Payment form validation
    function validateForm() {

        var password = $("#login_password").val();
        if (password == null || password == '') {
            addValidationError({password: 'Please enter your login password!!!'});
            return false;
        }

        resetValidationtErrors();

        return true;
    }

    //Reset all payment errors
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