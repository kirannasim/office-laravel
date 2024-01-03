@foreach($styles as $style)
    {!! $style !!}
@endforeach
<div class="businessWalletWrap row">
    <div class="col-md-5">
        <div class="walletDetails">
            <div class="wallet">
                <div class="walletIco col-md-3">
                    <i class="fa fa-google-wallet"></i>
                </div>
                <div class="balanceAmount col-md-9">
                    <h4>Current balance</h4>
                    <p id="balanceAmount">{{ currency($walletBalance) }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="businessWallet walletPaymentButtonWrap">
            <p>Use your Business-wallet{{-- to pay--}}</p>
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
    $('.businessWalletWrap .walletInitPayment').click(function () {
        var options = {
            actionUrl: '{{ scopeRoute("payment.handler") }}',
            successCallBack: function (response) {
                Ladda.stopAll();
            },
            failCallBack: function (response) {
                Ladda.stopAll();
                if (window.paymentFailureCallback) window.paymentFailureCallback(response, 'businesswallet');

                switch (response.status) {
                    case 403:
                        $('.businessWallet.walletPaymentButtonWrap')
                            .fadeOut().siblings('.businessWalletWrap .transactionPass').slideDown();
                        simulateLoading($('.businessWalletWrap .transactionPass'));
                        $.get('{{ route("businesswallet.pass.view") }}', function (response) {
                            $('.businessWalletWrap .transactionPass').html(response);
                        });
                        break;
                    case 422:
                        var error = response.responseJSON;
                        var errElem = $('.businessWalletWrap .walletDetails').find('.error');
                        if (errElem.length) {
                            errElem.text(error.message).slideDown();
                        } else {
                            errElem = '<div class="error">' + error.message + '</div>';
                            $('.businessWalletWrap .walletDetails').append(errElem);
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
