@php
    $payoutStatus = [
                'pending' => ['icon' => 'fa fa-hourglass', 'color' => '#eac412'],
                'approved' => ['icon' => 'fa fa-check', 'color' => '#eac412'],
                'rejected' => ['icon' => 'fa fa-close', 'color' => '#eac412'],
                'cancelled' => ['icon' => 'fa fa-close', 'color' => '#eac412'],
              ];

    $approved = $approved != null ? $approved->amount : 0;
    $pending = $pending != null ? $pending->amount : 0;
    $total = $approved + $pending;
@endphp
<div class="col-md-4">
    <div class="walletPicker">
        <h3>{{ _mt($moduleId,'Payout.Select_wallet') }}</h3>
        <select class="select2 selectFromWallet" name="wallet" id="wallet">
            @foreach($wallets as $wallet)
                <option data-txn="{{ $wallet->gateway()->txnPassViewRoute() }}"
                        value="{{ $wallet->moduleId }}"
                        @if($wallet->moduleId == $selectedWallet) selected @endif>{{ $wallet->registry['name'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="walletBalance">
        <h4>{{ _mt($moduleId,'Payout.Balance') }}</h4>
        <div class="amountWrapper">
            <i class="fa fa-google-wallet"></i>
            {{ currency($balance) }}
        </div>
    </div>
    <div class="payout requestedAmount amount">
        <h3>{{ _mt($moduleId,'Payout.Amount') }}</h3>
        <input type="number" name="request_amount" id="request_amount" class="form-control">
        <div class="errors"></div>
    </div>
</div>
<div class="col-md-8">
    <div class="walletDetails">
        <div class="row">
            <div class="col-md-6">
                <div class="tile processed">
                    <i class="fa fa-check"></i>
                    <div class="data">
                        <label>{{ _mt($moduleId,'Payout.Approved') }}</label>
                        <span class="amount">{{ prettyCurrency($approved) }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="tile pending">
                    <i class="fa fa-hourglass-2"></i>
                    <div class="data">
                        <label>{{ _mt($moduleId,'Payout.Pending') }}</label>
                        <span class="amount">{{ prettyCurrency($pending) }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="tile summary">
                    <i class="fa fa-money"></i>
                    <div class="data">
                        <label>{{ _mt($moduleId,'Payout.Total') }}</label>
                        <span class="amount">{{ prettyCurrency($total) }}</span>
                    </div>
                </div>
            </div>
            @if($lastRequest)
                <div class="col-md-6">
                    <div class="lastTxn tile">
                        <i class="fa fa-cubes"></i>
                        <div class="txnDetails">
                            <div class="primary">
                                <label>{{ _mt($moduleId,'Payout.Last_request') }} <i
                                            class="{{ $payoutStatus['pending']['icon'] }}"
                                            style="color: {{ $payoutStatus[$lastRequest->payoutStatus['slug']]['color'] }}"></i>
                                </label>
                            </div>
                            <div class="meta">
                                <span class="amount">{{ currency($lastRequest->request_amount) }}</span> | <span
                                        class="operation">{{ date('d-m-Y', strtotime($lastRequest->created_at)) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="tranChargeWrapper">

    </div>

</div>
<script>
    "use strict";


</script>

<script type="text/javascript">
    "use strict";

    //Document ready functions


    function loadTransactionCharges() {
        $.post("{{ scopeRoute('payout.request.transactionCharges') }}", {amount: $('#request_amount').val()}, function (data) {
            $('.tranChargeWrapper').html(data);
        });
    }


    $(function () {

        loadTransactionCharges();
        //select2
        $('.select2').select2({
            width: '100%',
        });

        $(".selectFromWallet").change(function () {
            loadWalletPicker({'wallet': $("#wallet").val()});
        });

        $("#request_amount").keyup(function () {
            loadTransactionCharges();
        });

    });

    function loadWalletPicker(args) {
        simulateLoading($('.newPayout .walletInfo'));

        return $.post('{{ scopeRoute("payout.request.walletPicker") }}', args, function (response) {
            $('.newPayout .walletInfo').html(response);
            $('.select2').select2({
                width: '100%',
            });
        });
    }

    //Small patch
    $('body').on('keyup click', '.ajaxValidationError input', function () {
        $(this).parent().removeClass('ajaxValidationError');
    });
</script>
