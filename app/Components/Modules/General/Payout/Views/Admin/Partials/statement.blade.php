<div class="payoutStatement">
    <h3>
        Payout statement
        @if(isset($transactions))
            <span class="timestamp">
                {{ $transactions[0]['date'] }}<span class="readable">({{ $transactions[0]['readableDate'] }})</span>
            </span>
        @endif
    </h3>
    @forelse($transactions as $transaction)
        <div class="eachTransaction">
            <span class="amount">{{ $transaction['formattedAmount'] }}</span>
            <span class="ico fa fa-arrow-right"></span>
            <span class="user">{{ $transaction['payee']->username }}</span>
        </div>
    @empty
        <div class="noTxn">{{ _mt($moduleId,'Payout.no_transaction_found') }}</div>
    @endforelse
</div>

<style>
    .payoutStatement {
        text-align: left;
        border: 1px solid #d8d8d8;
        border-radius: 3px !important;
        margin: 15px auto;
        padding: 10px;
        box-shadow: 4px 4px 0px #e2e2e2;
        max-width: 500px;
    }

    .payoutStatement h3 {
        font-weight: 600;
        font-size: 15px;
        color: #5f5f5f;
        padding: 5px;
        margin: 0;
        border-bottom: 1px solid #bdbcbc;
    }

    .payoutStatement .timestamp .readable {
        margin-left: 7px;
    }

    .payoutStatement .eachTransaction {
        text-align: left;
        border-bottom: 1px solid #efefef;
        font-size: 14px;
        padding: 5px;
    }

    .payoutStatement .eachTransaction .ico {
        font-size: 10px;
        margin-left: 10px;
        margin-right: 10px;
        color: #9e9e9e;
    }

    .payoutStatement .eachTransaction .amount {
        font-size: 15px;
        color: #26c281;
        display: inline-block;
        min-width: 12%;
    }

    .payoutStatement .eachTransaction:last-child {
        border-bottom: none;
    }

    .payoutStatement h3 .timestamp {
        font-size: 12px;
        color: #909090;
        float: right;
        font-weight: 400;
    }
</style>
