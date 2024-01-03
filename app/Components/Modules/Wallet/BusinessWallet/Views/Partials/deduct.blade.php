<div class="transferWrap wallet eSend col-md-12">
    <form class="transferWizard">
        <input type="hidden" name="context" value="deduct">
        <input type="hidden" name="gateway" value="{{ $gateway }}">
        <input type="hidden" name="wallet" value="{{ $moduleId }}">
        <div class="successNotice">
            <i class="fa fa-check"></i>
            <h3>{{ _mt($moduleId,'BusinessWallet.successfully_deducted') }}</h3>
        </div>
        <div class="inputs">
            <h2 class="heading"><i class="icon-paper-plane"></i>{{ _mt($moduleId,'BusinessWallet.deduct') }}</h2>
            <div class="errorNotice">
                <h3>{{ _mt($moduleId, 'BusinessWallet.something_went_wrong') }}</h3>
                <div class="errorWrapper"></div>
            </div>
            <div class="row">
                <div class="dataPrepare col-md-6">
                    <div class="dataHolder">
                        <div class="fieldCover">
                            <i class="fa fa-user"></i>
                            <input type="text" placeholder="{{ _mt($moduleId,'BusinessWallet.select_user') }}"
                                   class="userFiller field username">
                        </div>
                        <div class="fieldCover">
                            <span class="icon">{{ currencySymbol() }}</span>
                            <input type="text" name="amount"
                                   placeholder="{{ _mt($moduleId,'BusinessWallet.enter_amount') }}"
                                   class="syncWithAmount field amount">
                        </div>
                        <div class="fieldCover">
                            <i class="fa fa-google-wallet"></i>
                            <select class="walletSelect field wallet" name="from_wallet">
                                @foreach($wallets as $wallet)
                                    @if($wallet->moduleId != $moduleId)
                                        <option value="{{ $wallet->moduleId }}">{{ $wallet->registry['name'] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="fieldCover">
                                <textarea name="remarks" placeholder="{{ _mt($moduleId,'BusinessWallet.remarks') }}"
                                          class="field remarks"></textarea>
                        </div>
                        <div class="actions">
                            <button class="addUser btn blue" type="button">
                                <i class="fa fa-user-plus"></i>{{ _mt($moduleId,'BusinessWallet.add_user') }}
                            </button>
                            <button class="transferInit ladda-button btn green" data-style="contract" type="button">
                                {{ _mt($moduleId,'BusinessWallet.deduct') }}<i class="fa fa-angle-double-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 amountInfo">
                    <div class="content">
                        <label>{{ _mt($moduleId,'BusinessWallet.total_amount') }}</label>
                        <span class="amount">{{ currency(0) }}</span>
                        <div class="payer">
                            <span class="amountToPay"></span>
                            <span><i class="fa fa-angle-double-right"></i> </span>
                            <label></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="userHolder"></div>
    </form>
    <div class="transactionPassLoader" data-unit="transactionPassView"></div>
</div>

<script type="text/javascript">
    "use strict";
    //Document ready
    $(function () {
        //User fetcher
        var selectedCallback = function (target, id, name) {
            target.val(name);
            $('.transferWizard .amountInfo .payer').slideDown()
                .find('label').attr('data-id', id).text(name)
                .siblings('span.amountToPay').html('{{ currencySymbol() }}' + ($('.dataHolder .field.amount').val() ? $('.dataHolder .field.amount').val() : 0));
        };
        var options = {
            target: '.userFiller',
            route: '{{ route("user.api") }}',
            action: 'getUsers',
            name: 'username',
            selectedCallback: selectedCallback
        };
        $('.userFiller').ajaxFetch(options);

        window.transactionPassSuccessCallback = function (response) {
            $('form.transferWizard').slideDown().siblings().slideUp();
            postPayment(response);
            //$('.transferInit').trigger('click');
        };
        //Select2
        $(".walletSelect").select2({
            width: '100%'
        });
        Ladda.bind('.ladda-button');
    });

    $('button.addUser').click(function () {
        var target = $('.transferWizard .amountInfo .payer > label');

        if (!target.attr('data-id')) return;

        addUser(target.attr('data-id'), target.text());
    });

    $('input.syncWithAmount.field.amount').keyup(function () {
        $('.transferWizard .amountInfo .payer > span.amountToPay').text('{{ currencySymbol() }}' + $(this).val());
    });

    function addUser(id, name) {
        $('.eachUser.success').remove();
        var exists = false;

        $('.userHolder .eachUser').each(function () {
            if ($(this).attr('data-id') === id) exists = true;
        });

        if (exists) return false;

        var post = $.post('{{ route("businesswallet.balance") }}', {
            user_id: id,
            wallet: $('[name="from_wallet"]').val()
        }, function (response) {
            if (Number(response) < Number($('[name="amount"]').val())) {
                addPaymentError({inSufficientBalance: 'No Sufficient Balance for the User!!!'});
                return false;
            } else {
                resetPaymentErrors();
                var html = '<div class="eachUser" data-id="' + id + '">';
                html += '   <div class="col-md-3"><span class="name">' + name + '</span></div>';
                html += '   <input type="hidden" name="payer[' + id + '][id]" value="' + id + '">';
                html += '   <div class="col-md-4">';
                html += '       <select name="payer[' + id + '][from_wallet]">';
                @foreach($wallets as $wallet)
                        @if($wallet->moduleId != $moduleId)
                    html += '<option value="{{ $wallet->moduleId }}">{{ $wallet->registry['name']}}</option>';
                @endif
                        @endforeach
                    html += '       </select>';
                html += '   </div>';
                html += '   <div class="col-md-3"><span class="amount"><input type="text" value="' + $('[name="amount"]').val() + '" name="payer[' + id + '][amount]" placeholder="Amount" class="syncWithAmount" /></span></div>';
                html += '   <div class="col-md-2"><button class="btn red remove"><i class="fa fa-close"></i></button></div>';
                html += '</div>';

                $('.transferWrap .userHolder').slideDown().append(html).promise().done(function () {
                    syncSumToDisplay();
                    $('.userHolder .eachUser').last().find('select').val($('.walletSelect').val());
                    $('.userHolder .eachUser select').select2({
                        width: '100%',
                    });
                    resetPayeeForm();
                });
            }
        });
    }

    //Remove user from list
    $('body').on('click', '.eachUser .remove', function () {
        $(this).closest('.eachUser').remove().promise().done(function () {
            syncSumToDisplay();
        });
    });

    //Transfer Init
    $('body').off('click', '.transferInit').on('click', '.transferInit', function () {
        var me = $(this);
        if (validatePaymentForm() === false) {
            Ladda.stopAll();
            return false;
        }
        var formData = $('form.transferWizard').serialize();
        var post = $.post('{{ route("businesswallet.validate.deduct") }}', formData, function (response) {
            //postPayment(response);
            Ladda.stopAll();

            $('.transferWizard').slideUp().siblings().slideDown();
            window.targetForm = $('.transferWizard');
            window.paymentSuccessCallback = function (response, wallet) {
                if (wallet != 'businesswallet') return;
                postPayment(response);
            };
            refreshAjaxData($('.transactionPassLoader'), '{!! route("businesswallet.initPayment") !!}', {'verifyOnly': false});
        }).fail(function (response) {
            Ladda.stopAll();
            var errors = response.responseJSON;
            addPaymentError(errors);
            me.removeClass('loading');
        });
    });

    $('body').off('click', '.backToDeduct')
        .on('click', '.backToDeduct', function () {
            $('.txnSummary').remove();
            $('.transferWizard .amountInfo').removeClass('done');
            $('.dataPrepare').slideDown();
            $('.transferWizard .amountInfo .amount').text('{{ currency(0.00) }}').find('i').remove();
            $('.field.remarks').val('');
        });

    function paymentAmountCounter(target, total) {
        var options = {
            useEasing: true,
            useGrouping: true,
            separator: ',',
            decimal: '.',
            formattingFn: function (number) {
                return '$' + number + '.00';
            }
        };
        var target = $('.wallet .transferWizard .amountInfo .amount');
        var counter = new CountUp(target[0], Number(Number(target.text().replace('{{ currencySymbol() }}', ''))), total, 0, 2.5, options);

        counter.start();
    }

    function syncSumToDisplay() {
        var total = 0;

        $('.wallet .userHolder .eachUser').each(function () {
            total += Number($(this).find('span.amount input[type="text"]').val());
        });

        total += Number($('.transferWizard .inputs .syncWithAmount').val());
        var target = $('.wallet .transferWizard .amountInfo .amount');

        paymentAmountCounter(target, total);
    }

    $('.syncWithAmount').dynamicBindWithDelay('keyup', function () {
        syncSumToDisplay();
    }, 200);

    function resetPayeeForm() {
        $('.dataHolder .field.username, .dataHolder .field.amount, .dataHolder').val('');
        $('.dataHolder .field.wallet').select2('val', '');
        $('.transferWizard .amountInfo .payer > label').text('').data('id', '');
        $('.transferWizard .amountInfo .payer').slideUp();
        syncSumToDisplay();
    }

    //Payment form validation
    function validatePaymentForm() {
        var found = false;
        $('.eachUser .amount input[type="text"]').each(function () {
            if (!$(this).val()) found = true;
        });
        if (found) {
            addPaymentError({amountMissing: "{{_mt($moduleId,'BusinessWallet.amount_missing_fields') }}"});
            return false;
        }
        if (!$('.eachUser').length) {
            addPaymentError({payerMissing: "{{_mt($moduleId,'BusinessWallet.add_atleast_one_user') }}"});
            return false;
        }
        resetPaymentErrors();

        return true;
    }

    //Reset all payment errors
    function resetPaymentErrors() {
        $('.errorNotice').slideUp().find('.errorWrapper').empty().slideUp();
    }

    //Add payment errors
    function addPaymentError(errors) {
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

    //Post payment actions
    function postPayment(response) {
        var transactions = (response.multiPayment == true) ? response.result : [response.result];
        var balance = response.balance;
        var transactionOutput = '<div class="txnSummary"><div class="inner">';

        for (var key in transactions) {
            var txn = transactions[key]['transaction'];
            transactionOutput += '<div class="eachTxn">';
            transactionOutput += '<span class="transactionId">TXN ID : #' + txn['id'] + '</span>';
            transactionOutput += '<span class="amount">{{ currencySymbol() }}' + txn['amount'] + '</span>';
            transactionOutput += '<span class="toIcon"><i class="fa fa-angle-double-right"></i></span>';
            transactionOutput += '<span class="payer">' + $('.eachUser[data-id="' + txn['payer'] + '"] .name').text() + '</span>';
            transactionOutput += '</div>';
        }
        transactionOutput += '</div><button class="btn blue backToDeduct"><i class="fa fa-angle-left"></i>Back</button></div>';
        var options = {
            useEasing: true,
            useGrouping: true,
            separator: ',',
            decimal: '.',
            formattingFn: function (number) {
                return '$' + number + '.00';
            }
        };

        var counter = new CountUp("balanceAmount", Number($('#balanceAmount').attr('data-amount')), balance, 0, 2.5, options);
        counter.start();

        $('.transactionPassLoader').slideUp().siblings('.transferWizard').slideDown().promise().done(function () {
            $(".userHolder").empty().fadeOut();
            $('.dataPrepare').hide();
            $('.transferWizard .amountInfo .amount').prepend('<i class="fa fa-check"></i>');
            setTimeout(function () {
                $('.transferWizard .amountInfo').addClass('done').append(transactionOutput);
            }, 500);
        });
    }
</script>

<style>
    .transferWizard .inputs .remarks {
        margin-bottom: 10px;
    }

    .transferWizard .inputs .remarks textarea {
        width: 100%;
        min-height: 75px;
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

    .userHolder .eachUser select {
        width: 100%;
        padding: 3px;
        border: 1px solid #ddd;
    }

    .eachUser span.select2-selection {
        padding: 5px;
        border: 1px solid #ddd;
        height: auto !important;
    }

    .walletPaymentButtonWrap {
        padding: 5px;
        min-height: 150px;
    }
</style>