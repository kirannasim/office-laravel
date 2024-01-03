<div class="transactionPassWrapper">
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
<div class="transactionErrors"></div>
<script type="text/javascript">
    "use strict";
    $('body')
        .off('click', '.submitTransactionPass')
        .on('click', '.submitTransactionPass', function () {
            var me = $(this);
            me.addClass('loading');
            var options = {
                transactionPass: $('.transactionPassWrapper input[type="password"]').val(),
                verifyOnly: Number({{ $verifyOnly }}),
                action: '{{ $action }}'
            };
            $.post('{!! route("payout.pass") !!}', $.extend(options, formValues('.selectedPayouts')), function (response) {
                $('.transactionPassWrapper input[type="password"]').val('');
                $('.transactionPass').slideUp().siblings('.successPayout').slideDown();
                $('.successPayout .payoutInfo .amount').text(response.formattedTotal);
                $('.successPayout .payoutInfo .totalPayouts').text(response.number);
                $('.mileStone[data-position="process"]').addClass('active');
                $('.backToPayout').attr('data-target', 'authorize');
                updateProcessed();
                $('body')
                    .off('click', '.payoutStatement')
                    .on('click', '.payoutStatement', function () {
                        var me = $(this);
                        simulateLoading(me.siblings('.statement').slideDown());
                        $.post('{{ route('payout.statement') }}', {transactions: response.transactions}, function (response) {
                            $('.successPayout .statement').html(response);
                            Ladda.stopAll();
                        }).fail(function () {
                            Ladda.stopAll();
                        });
                    });
            }).fail(function (response) {
                $('.transactionPassWrapper input[type="password"]').val('');
                $('.transactionErrors').slideDown();
                if (window.hasOwnProperty('transactionPassFailCallback')) {
                    window.transactionPassFailCallback(response);
                }
                switch (response.status) {
                    case 401:
                        var errors = response.responseJSON;
                        for (var key in errors) {
                            $('.transactionErrors').empty().append('<div class="error">' + errors[key] + '</div>');
                        }
                        break;
                }
                me.removeClass('loading');
            });
        });
</script>
