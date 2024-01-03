<div class="eWallet transactionPassWrapper">
    <div class="innerWrap">
        <div class="eachField">
            <label>{{ _mt($moduleId,'Ewallet.Please_enter_your_transaction_password') }}</label>
        </div>
        <div class="eachField">
            <input type="password" placeholder="{{ _mt($moduleId,'Ewallet.Enter_transaction_password') }}">
        </div>
        <div class="eachField">
            <button class="btn blue submitTransactionPass" type="button">
                <i class="fa fa-spin icon-refresh"></i>
                <i class="fa icon-cursor"></i>
                <span>{{ _mt($moduleId,'Ewallet.Submit') }}</span>
            </button>
        </div>
    </div>
</div>
<div class="ewallet transactionErrors"></div>
<script type="text/javascript">
    "use strict";
    $('.eWallet .submitTransactionPass').click(function () {
        var me = $(this);
        me.addClass('loading');
        var options = {
            transactionPass: $('.eWallet.transactionPassWrapper input[type="password"]').val(),
            verifyOnly: Number({{ $verifyOnly }}),
            action: '{{ $action }}'
        };

        if (window.hasOwnProperty('txnPassRequestOptions'))
            options = $.extend(options, window.txnPassRequestOptions);

        $.post('{!! scopeRoute("ewallet.pass") !!}', options, function (response) {
            Ladda.stopAll();
            if (window.hasOwnProperty('paymentSuccessCallback')) {
                window.paymentSuccessCallback(response, 'ewallet');
            } else {
                $('form.transferWizard').slideDown().siblings().slideUp();
                me.removeClass('loading');
            }
        }).fail(function (response) {
            Ladda.stopAll();
            $('.eWallet .transactionErrors').slideDown();
            if (window.hasOwnProperty('paymentFailureCallback')) {
                window.paymentFailureCallback(response);
            }
            switch (response.status) {
                case 403:
                    $('.ewallet.transactionErrors').empty().append('<div class="error">Session timeout !</div>').slideDown();
                    break;
                case 401:
                    var errors = response.responseJSON;
                    $('.ewallet.transactionErrors').empty().html('<div class="error">' + errors.error + '</div>').slideDown();
                    break;
                case 422:
                    var errors = response.responseJSON;
                    $('.ewallet.transactionErrors').empty().closest('.eWallet .transactionPassLoader').slideUp().siblings().slideDown();
                    break;
            }
            me.removeClass('loading');
        });
    });
</script>