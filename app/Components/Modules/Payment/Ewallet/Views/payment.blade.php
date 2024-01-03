@foreach($styles as $style)
    {!! $style !!}
@endforeach
<div class="eWalletWrap row">
    <div class="col-md-5">
        <div class="walletDetails">
            <div class="wallet">
                <div class="walletIco col-md-3">
                    <i class="fa fa-google-wallet"></i>
                </div>
                <div class="balanceAmount col-md-9">
                    <h4>{{ _mt($moduleId,'Ewallet.Current_balance') }}</h4>
                    <p id="balanceAmount" class="amount"
                       data-amount="{{ $walletBalance }}">{{ currency($walletBalance) }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="walletPaymentButtonWrap">
            <p>Use your E-wallet to pay</p>
            <button class="btn green ladda-button walletInitPayment" data-style="contract" type="button">
                <i class="fa fa-paper-plane"></i> Pay
            </button>
        </div>
        <div class="transactionPass"></div>
    </div>
</div>
<script type="text/javascript">
    "use strict";
    $(function () {
        Ladda.bind('.ladda-button');
    });
    // Submit payment request
    $('.eWalletWrap .walletInitPayment').click(function () {
        var options = {
            actionUrl: '{{ scopeRoute("payment.handler") }}',
            successCallBack: function (response) {
                Ladda.stopAll();
            },
            failCallBack: function (response) {
                Ladda.stopAll();
                switch (response.status) {
                    case 403:
                        $('.walletDetails .error').fadeOut();
                        $('.walletPaymentButtonWrap').fadeOut().siblings('.eWalletWrap .transactionPass').slideDown();
                        simulateLoading($('.eWalletWrap .transactionPass'));
                        $.get('{{ scopeRoute("ewallet.pass.view") }}', function (response) {
                            $('.eWalletWrap .transactionPass').html(response);
                        });
                        break;
                    case 422:
                        var error = response.responseJSON;
                        var errElem = $('.eWalletWrap .walletDetails').find('.error');
                        if (errElem.length) {
                            errElem.text(error.message).slideDown();
                        } else {
                            errElem = '<div class="error">' + error.message + '</div>';
                            $('.eWalletWrap .walletDetails').append(errElem);
                        }
                        break;
                    default:
                        break;
                }
            }
        };
        sendForm(options);
    });
</script>