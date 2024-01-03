<div class="transactionList transferWizard overTrans">
    <div class="transferWhite">
        <h2 class="heading"><i class="icon-wallet"></i>{{ _mt('Wallet-IPayWallet','IPayWallet.transactions') }}</h2>
        <form class="filterForm">
            <div class="filters row">
                <div class="eachFilter operation col-md-4">
                    <label>{{ _mt($moduleId,'IPayWallet.operation') }}</label>
                    <select name="filters[operation]">
                        <option value="">{{ _mt($moduleId,'IPayWallet.all') }}</option>
                        @foreach($filters['operation']['values'] as $operation)
                            <option {{ $filters['operation']['default'] == $operation->id ? 'selected' : '' }} value="{{ $operation->id }}">{{ $operation->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="eachFilter operation col-md-4">
                    <label>{{ _mt($moduleId,'IPayWallet.from_date') }}</label>
                    <input type="text" class="datePicker" value="{{ $filters['fromDate']['default'] }}"
                           name="filters[fromDate]" placeholder="From date">
                </div>
                <div class="eachFilter operation col-md-4">
                    <label>{{ _mt($moduleId,'IPayWallet.to_date') }}</label>
                    <input type="text" class="datePicker" value="{{ $filters['toDate']['default'] }}"
                           name="filters[toDate]" placeholder="To date">
                </div>
            </div>
            <div class="filters row">
                <div class="eachFilter transactionType col-md-4">
                    <label>{{ _mt($moduleId,'IPayWallet.type') }}</label>
                    <select name="filters[type]">
                        <option value="">{{ _mt($moduleId,'IPayWallet.all') }}</option>
                        @foreach($filters['type']['values'] as $key => $type)
                            <option {{ $filters['type']['default'] == $type ? 'selected' : '' }} value="{{ strtolower($type) }}">{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="eachFilter groupBy col-md-4">
                    <label>{{ _mt($moduleId,'IPayWallet.group_by') }}</label>
                    <select name="filters[groupBy]">
                        @foreach($filters['groupBy']['values'] as $group)
                            <option {{ $filters['groupBy']['default'] == strtolower($group) ? 'selected' : '' }} value="{{ strtolower($group) }}">{{ $group }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="eachFilter sortBy col-md-4">
                    <label>{{ _mt($moduleId,'IPayWallet.sort_by') }}</label>
                    <select name="filters[sortBy]">
                        @foreach($filters['sortBy']['values'] as $key => $sortBy)
                            <option {{ $filters['sortBy']['default'] == $sortBy ? 'selected' : '' }} value="{{ $key }}">{{ $sortBy }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="filters row">
                <div class="eachFilter orderBy col-md-4">
                    <label>{{ _mt($moduleId,'IPayWallet.order_by') }}</label>
                    <select name="filters[orderBy]">
                        @foreach($filters['orderBy']['values'] as $key => $orderBy)
                            <option {{ $filters['orderBy']['default'] == $orderBy ? 'selected' : '' }} value="{{ strtolower($orderBy) }}">{{ $orderBy }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="filterButtonWrapper col-md-4">
                    <button type="button" class="btn ladda-button dark transactionFilter" data-style="contract">
                        <i class="fa fa-filter"></i>{{ _mt($moduleId,'IPayWallet.filter') }}
                    </button>
                </div>
            </div>
        </form>
        <div class="holder">
            @forelse($groupOfTransaction as $key => $group)
                <h4 class="groupName mfkToggle">
                <span class="groupTag">
                    <p>{{ ucfirst($filters['groupBy']['default']) }}</p>
                    <i>{{ $key }}</i>
                </span>
                    <span class="total">
                    {{ _mt($moduleId,'IPayWallet.total_transaction') }}
                    <i>{{ $group->count() }}</i>
                </span>
                    <span class="timestamp">{!! $group->first()->created_at->toFormattedDateString() !!}</span>
                    <div class="triggerWrap">
                        <i class="fa fa-plus open"></i>
                        <i class="fa fa-minus close"></i>
                    </div>
                </h4>
                <div class="transactionsHolder toggleBody mfkToggleOuterWrap">
                    @forelse($group as $key => $transaction)
                        @php
                            if($transaction->payer == companyUser()->id)
                                $netAmount = $transaction->amount;
                            else
                                $netAmount = $transaction->isCredit ? $transaction->actual_amount : $transaction->amount;
                        @endphp
                        <div class="eachTransaction {{ $transaction->totalCharges }} mfkToggleWrap">
                            <div class="transactionHeader mfkToggle">
                            <span class="txn">
                                <p>{{ _mt($moduleId,'IPayWallet.txn') }}</p>#{{ $transaction->id }}
                                <span class="timeStamp">{{ $transaction->created_at->toFormattedDateString() }}</span>
                            </span>
                                <span class="operation">
                                {{ $transaction->operation->operationDetails->title }}
                            </span>
                                <span class="status">
                                    @if($transaction->status)  [ Credited ]  @else   <span>[ Pending ] </span> @endif
                                </span>
                                <span class="amount @if($transaction->isCredit) credit @endif">
                                {{ $transaction->isCredit ? '+' : '-' }}{{ currency($netAmount) }}
                            </span>
                                <div class="triggerWrap">
                                    <i class="icon-plus open"></i>
                                    <i class="icon-close close"></i>
                                </div>
                            </div>
                            <div class="transactionBody toggleBody">
                                <div class="col-md-4 meta">
                                    <div class="txn">#{{ $transaction->id }}</div>
                                    <span class="flow">
                                    <span class="payer">{{ $transaction->payerUser->username }}</span>
                                    <i class="icon-action-redo"></i>
                                    <span class="payee">{{ $transaction->payeeUser->username }}</span>
                                </span>
                                    <div class="operation">
                                        {{ $transaction->operation->title }}
                                        @php
                                            switch ($transaction->operation->operationDetails->slug){
                                                case 'commission':
                                                    $operationMeta = getModule($transaction->commission->module_id)->registry['name'];
                                                    break;
                                                case 'fund_transfer':
                                                case 'deduct':
                                                    $operationMeta = getModule($transaction->operation->from_module)->registry['name'] ." - ". getModule($transaction->operation->to_module)->registry['name'];
                                                    break;
                                                    default :
                                                    $operationMeta = null;
                                                    break;
                                            }
                                        @endphp
                                        @if(isset($operationMeta))
                                            <div class="operationMeta">
                                                (<span>{{ $operationMeta }}</span>)
                                            </div>
                                        @endif
                                    </div>
                                    <div class="txnTime">
                                        <h3>{{ $transaction->created_at->diffForHumans() }}</h3>
                                        <p>{{ $transaction->created_at }}</p>
                                    </div>
                                </div>
                                <div class="col-md-8 totals mfkToggleOuterWrap">
                                    <div class="eachSection mfkToggleWrap">
                                        <h3 class="mfkToggle">{{ _mt($moduleId,'IPayWallet.actual_amount') }}</h3>
                                        <div class="toggleBody">{{ currency($transaction->actual_amount) }}</div>
                                    </div>
                                    <div class="eachSection">
                                        <h3 class="mfkToggle">{{ _mt($moduleId,'IPayWallet.transaction_charges') }}</h3>
                                        <div class="toggleBody">
                                            @forelse($transaction->charges as $charge)
                                                <div class="charge">
                                                    <span class="name">@if($charge->module()){{ $charge->module()->model->name }} @endif</span>
                                                    <span class="amount @if($charge->module()->operationType() == 'sub') credit @endif">
                                                    {{ $charge->module()->operationType() == 'add' ? '-' : '+' }}{{ currency($charge->amount) }}
                                                </span>
                                                </div>
                                            @empty
                                                <div class="noCharges">{{ _mt($moduleId,'IPayWallet.no_charges') }}</div>
                                            @endforelse
                                        </div>
                                    </div>
                                    @if($transaction->order)
                                        <div class="eachSection">
                                            <h3 class="mfkToggle">Order Totals</h3>
                                            <div class="toggleBody">
                                                @forelse($transaction->order->totals as $total)
                                                    <div class="charge">
                                                        <span class="name">{{ $total->module()->model->name }}</span>
                                                        <span class="amount @if($total->module()->operationType() == 'sub') credit @endif">
                                                        {{ $total->module()->operationType() == 'add' ? '-' : '+' }}
                                                            {{ currency($total->amount) }}
                                                    </span>
                                                    </div>
                                                @empty
                                                    <div class="noCharges">No order totals</div>
                                                @endforelse
                                            </div>
                                        </div>
                                    @endif
                                    <div class="eachSection total">
                                        <h3>Total</h3>
                                        <div class="total">
                                            {{ currency($netAmount) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="noTransactions">{{ _mt($moduleId,'IPayWallet.no_transaction_in_this') }} {{ $groupName }}</div>
                    @endforelse
                </div>
            @empty
                <div class="noTransactions">{{ _mt($moduleId,'IPayWallet.no_transaction') }}</div>
            @endforelse
        </div>
    </div>
</div>

<script>
    "use strict";

    $(function () {
        //Ladda init
        Ladda.bind('.ladda-button');
        //init date-picker
        $('.datePicker').datepicker({
            format: 'yyyy-mm-dd'
        });
        //resize partial
        resizePartial('contract');
        //select2
        $('select').select2({
            width: '100%'
        });
        //transaction request with filters
        $('.transactionFilter').click(function () {
            var formData = $('.filterForm').serializeArray();
            var dispatch = {};
            formData.forEach(function (value, key) {
                dispatch[value.name] = value.value;
            });
            refreshAjaxData($('.walletOverview .subPartials'), null, null, dispatch);
        });
    });
</script>