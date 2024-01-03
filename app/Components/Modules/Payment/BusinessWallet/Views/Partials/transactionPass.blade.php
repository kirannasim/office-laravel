<div class="businessWallet transactionPassWrapper">
    <div class="innerWrap">
        <div class="eachField">
            <label>Please enter your transaction password</label>
        </div>
        <div class="eachField">
            <input type="password" placeholder="Enter transaction password ...">
        </div>
        <div class="eachField">
            <button class="btn blue submitTransactionPass" type="button">
                <i class="fa fa-spin icon-refresh"></i>
                <i class="fa icon-cursor"></i>
                <span>Submit</span>
            </button>
        </div>
    </div>
</div>
<div class="businessWallet transactionErrors"></div>
<script type="text/javascript">
    "use strict";
    $('.businessWallet .submitTransactionPass').click(function () {
        if ($(this).hasClass('loading')) return;

        var me = $(this);
        me.addClass('loading');
        var options = {
            transactionPass: $('.businessWallet.transactionPassWrapper input[type="password"]').val(),
            verifyOnly: Number({{ $verifyOnly }}),
            action: '{{ $action }}'
        };
        $.post('{!! route("businesswallet.pass") !!}', options, function (response) {
            Ladda.stopAll();
            if (window.hasOwnProperty('paymentSuccessCallback')) {
                window.paymentSuccessCallback(response, 'businesswallet');
            } else {
                $('form.transferWizard').slideDown().siblings().slideUp();
                me.removeClass('loading');
            }
        }).fail(function (response) {
            Ladda.stopAll();
            $('.businessWallet.transactionErrors').slideDown();

            if (window.hasOwnProperty('paymentFailureCallback')) {
                window.paymentFailureCallback(response);
            }
            switch (response.status) {
                case 403:
                    $('.businessWallet.transactionErrors').empty().append('<div class="error">Session timeout !</div>');
                    break;
                case 401:
                    var errors = response.responseJSON;
                    $('.businessWallet.transactionErrors').empty().html('<div class="error">' + errors.error + '</div>');
                    break;
                case 422:
                    var errors = response.responseJSON;
                    $('.businessWallet.transactionErrors').empty().closest('.businessWallet .transactionPassLoader').slideUp().siblings().slideDown();
                    break;
            }
            me.removeClass('loading');
        });
    });
</script>
