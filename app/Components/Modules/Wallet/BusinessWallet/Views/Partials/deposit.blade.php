<div class="transferWrap col-md-12">
    <form class="transferWizard depositForm">
        <input type="hidden" name="context" value="deposit">
        <input type="hidden" name="gateway" value="{{ $gateway }}">
        <input type="hidden" name="wallet" value="{{ $moduleId }}">
        <div class="successNotice">
            <i class="fa fa-check"></i>
            <h3>{{ _mt('Wallet-BusinessWallet','BusinessWallet.successfully_deposited') }}</h3>
        </div>
        <div class="inputs row">
            <div class="firstPart col-md-12">
                <div class="errorNotice">
                    <h3>{{ _mt('Wallet-BusinessWallet','BusinessWallet.something_went_wrong') }}</h3>
                    <div class="errorWrapper"></div>
                </div>
                <h3>Deposit</h3>
                <div class="eachRow row">
                    <div class="remarks col-md-12">
                        <textarea name="remarks" id="remarks"
                                  placeholder="{{ _mt('Wallet-BusinessWallet','BusinessWallet.remark') }}"></textarea>
                    </div>
                </div>
            </div>
            <div class="secondPart col-md-12">
                <div class="eachRow primary row">
                    <div class="eachInput col-md-12">
                        <input type="number" name="amount" id="amount" value="10" placeholder="Enter amount"/>
                        <div class="depositInit">
                            <i class="fa fa-spin icon-refresh"></i>
                            {{ _mt('Wallet-BusinessWallet','BusinessWallet.deposit') }}
                            <i class="icon-login"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="transactionPassLoader" data-unit="transactionPassView"></div>
</div>

<script type="text/javascript">
    "use strict";
    //Document ready
    //Transfer Init
    $('body').off('click', '.depositInit').on('click', '.depositInit', function () {
        var me = $(this);
        me.addClass('loading');
        if (validatePaymentForm() === false) {
            me.removeClass('loading');
            return false;
        }
        var formDatas = $('form.transferWizard').serialize();
        var post = $.post('{{ route("businesswallet.validate.deposit") }}', formDatas, function (response) {
            //postPayment(response);
            $('.transferWizard').slideUp().siblings().slideDown();
            window.targetForm = $('.transferWizard');
            window.paymentSuccessCallback = function (response) {
                postPayment(response);
            };
            refreshAjaxData($('.transactionPassLoader'), '{!! route("businesswallet.initPayment") !!}', {'verifyOnly': false});
        }).fail(function (response) {
            switch (response.status) {
                case 422:
                    var errors = response.responseJSON;
                    addPaymentError(errors);
                    break;

                case 403:
                    $('.transferWizard').slideUp().siblings().slideDown();
                    refreshAjaxData($('.transactionPassLoader'), '{!! route("businesswallet.unit") !!}', {
                        'verifyOnly': false,
                        'action': 'deposit'
                    });
            }
            me.removeClass('loading');
        });
    });

    //Payment form validation
    function validatePaymentForm() {

        if (!$('#amount').val()) {
            addPaymentError({amountMissing: 'Please set amount!!!'});
            return false;
        }

        if (!$('#remarks').val()) {
            addPaymentError({remarkMissing: 'Please enter remarks!!!'});
            return false;
        }

        resetPaymentErrors();

        return true;
    }

    //Reset all payment errors
    function resetPaymentErrors() {
        $('.errorNotice').slideUp().find('.errorWrapper').empty();
    }

    //Add payment errors
    function addPaymentError(errors) {
        //console.log(errors);
        $('.errorNotice').slideDown().find('.errorWrapper').empty();

        for (var key in errors) {
            var message = $.isArray(errors[key]) ? errors[key][0] : errors[key];
            var outPut = '<div class="eachError">';
            outPut += '<span class="key">' + key + '</span><i>-</i>';
            outPut += '<span class="message">' + message + '</span>';
            outPut += '</div>';
            $('.errorNotice .errorWrapper').append(outPut);
        }
    }

    //Post payment actions
    function postPayment(response) {
        var balance = response.balance;
        var options = {
            useEasing: true,
            useGrouping: true,
            separator: ',',
            decimal: '.',
            formattingFn: function (number) {
                return '$' + number;
            },
        };

        var counter = new CountUp("balanceAmount", Number($('#balanceAmount').attr('data-amount')), balance, 0, 2.5, options);
        counter.start();
        $('.transferWizard').slideDown().siblings().slideUp().promise().done(function () {
            $('.successNotice').slideDown().next().slideUp();
            $('.depositInit').removeClass('loading');
            setTimeout(function () {
                $('.successNotice').slideUp().next().slideDown();
                $('.transferWizard input[type="text"],textarea').val('');
            }, 5000);
        });
    }
</script>

<style>
    .transferWizard .inputs .remarks {
        margin-bottom: 10px;
    }

    .transferWizard .inputs .remarks textarea {
        width: 100%;
        min-height: 85px;
        border: 1px solid #ddd;
    }

    form.transferWizard .firstPart .primary {
        margin-bottom: 10px;
    }

    form.transferWizard .firstPart .primary select {
        width: 100%;
        padding: 6px;
        border: 1px solid #ddd;
    }

    .depositInit i {
        font-size: 12px;
    }

    .depositInit {
        margin-top: 10px;
        font-size: 15px;
        background: #00abff;
        float: right;
    }

    form.transferWizard.depositForm h3 {
        margin-top: 0;
        font-weight: 500;
        margin-block-end: 15px;
    }

    form.transferWizard.depositForm h3 {
        margin-top: 0;
        font-weight: 500;
        margin-block-end: 15px;
    }

    .secondPart .eachInput:last-child {
        display: flex;
    }

    .secondPart .eachInput:last-child .depositInit {
        padding: 5px;
        margin-top: 0;
        margin-left: 16px;
    }

    .walletWrapper .successNotice i {
        font-size: 36px;
        line-height: 1;
    }

    .walletWrapper .successNotice h3 {
        font-weight: 600 !important;
    }
</style>