@foreach($styles as $style)
    {!! $style !!}
@endforeach
@foreach($scripts as $script)
    {!! $script !!}
@endforeach
@php
    $businessBlockLabels = [
            'today' => _mt($moduleId, 'WalletBlocks.today'),
            'week' => _mt($moduleId, 'WalletBlocks.this_week'),
            'month' => _mt($moduleId, 'WalletBlocks.this_month'),
            'year' => _mt($moduleId, 'WalletBlocks.this_year'),
            'all' => _mt($moduleId, 'WalletBlocks.all_time'),
        ];
    $walletTxns = ['balance', 'credited', 'debited'];
@endphp
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat2 statInner" data-target="wallets">
        <div class="dropdown filterGroup filterGear dateFilter" data-block="wallets">
            <div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                <i class="icon-settings"></i>
            </div>
            <ul class="dropdown-menu dropdown-menu-default pull-right">
                <li data-from="{{ \Carbon\Carbon::today() }}" data-filter="today" data-groupBy="hour"
                    class="{{ ($filterBy == 'today') ? 'active' : '' }}">
                    <a href="#">
                        <i class="icon-calendar"></i> {{ _mt($moduleId,'WalletBlocks.today') }} </a>
                </li>
                <li data-from="{{ \Carbon\Carbon::now()->startOfWeek() }}" data-filter="week" data-groupBy="day"
                    class="{{ ($filterBy == 'week') ? 'active' : '' }}">
                    <a href="#"><i class="icon-calendar"></i> {{ _mt($moduleId,'WalletBlocks.this_week') }}</a>
                </li>
                <li data-from="{{ \Carbon\Carbon::now()->startOfMonth() }}" data-filter="month" data-groupBy="day"
                    class="{{ ($filterBy == 'month') ? 'active' : '' }}">
                    <a href="#"><i class="icon-calendar"></i> {{ _mt($moduleId,'WalletBlocks.this_month') }}</a>
                </li>
                <li data-from="{{ \Carbon\Carbon::now()->startOfYear() }}" data-filter="year" data-groupBy="month"
                    class="{{ ($filterBy == 'year') ? 'active' : '' }}">
                    <a href="#"><i class="icon-calendar"></i> {{ _mt($moduleId,'WalletBlocks.this_year') }}</a>
                </li>
                <li data-from="" data-filter="all" data-groupBy="year"
                    class="{{ ($filterBy == 'all') ? 'active' : '' }}">
                    <a href="#"><i class="icon-calendar"></i> {{ _mt($moduleId,'WalletBlocks.all_time') }}</a>
                </li>
            </ul>
        </div>
        <div class="walletFilterGroup filterGear filterGroup">
            @if($wallets->count())
                <div class="dropdown walletChooser" data-wallet="{{ $currentWallet->moduleId }}">
                    <div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                        <div class="selectedWallet">
                            <span class="fa fa-google-wallet"></span>
                            <p>{{ $currentWallet->registry['name'] }}</p>
                            <i class="fa fa-angle-down"></i>
                        </div>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-default pull-right">
                        @foreach($wallets as $wallet)
                            <li data-id="{{ $wallet->moduleId }}">
                                <a href="#"><i class="icon-wallet"></i> {{ $wallet->registry['name'] }} </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{--@if(strtolower(getScope()) == 'admin')
            <div class="dropdown scopeChooser" data-scope="{{ loggedId() }}">
                <div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                    <div class="selectedWallet">
                        <span class="icon-layers"></span>
                        <p>{{ _mt($moduleId, 'WalletBlocks.mine') }}</p>
                        <i class="fa fa-angle-down"></i>
                    </div>
                </div>
                <ul class="dropdown-menu dropdown-menu-default pull-right">
                    <li data-scope="">
                        <a href="#">{{ _mt($moduleId, 'WalletBlocks.all') }} </a>
                    </li>
                </ul>
            </div>
            @endif--}}
        </div>
        <div class="display">
            <div class="number dropdown">
                <h3 class="font-blue-sharp">
                    <span class="walletBalance" data-value="{{ $txnAmount }}"></span>
                </h3>
                <small class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                    {{ _mt($moduleId, 'WalletBlocks.total') }} {{ $txnType }}
                    <span>({{ $businessBlockLabels[$filterBy] }})</span>
                    <i class="fa fa-angle-down"></i>
                </small>
                @php
                    $walletActions = $walletTxns;
                    unset($walletActions[array_search($txnType, $walletTxns)]);
                @endphp
                <ul class="dropdown-menu dropdown-menu-default pull-right creditOrDebit"
                    data-action="{{ $txnType }}">
                    @foreach($walletActions as $action)
                        <li data-action="{{ $action }}">
                            <a href="#" data-type="{{ $action }}">
                                {{ _mt($moduleId, 'WalletBlocks.total') }}  {{ $action }}
                                <span>({{ $businessBlockLabels[$filterBy] }})</span></a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="icon">
                <i class="fa fa-google-wallet"></i>
            </div>
        </div>
        <div class="progress-info">
            <div class="progress">
                    <span style="width: {{ $progress }}%;" class="progress-bar progress-bar-success blue-sharp">
                    </span>
            </div>
            {{--<div class="status">
                <div class="status-title">{{ _mt($moduleId,'WalletBlocks.progress') }}
                    <div class="difference">
                        (<span class="grantTotal">{{ _mt($moduleId,'WalletBlocks.total') }} {{ $grandTotal }}</span> -
                        <span
                                class="target">{{ _mt($moduleId, 'WalletBlocks.target') }} {{ $target }}</span>)
                    </div>
                </div>
                <div class="status-number"> {{ $progress }}%</div>
            </div>--}}
        </div>
        <canvas class="walletGraphHolder chartjs-render-monitor" data-graph="wallets"></canvas>
        <input type="hidden" class="walletGraphLabels" value="{{ $walletGraph->keys() }}">
        <input type="hidden" class="walletGraphData" value="{{ $walletGraph->values() }}">
    </div>
</div>


<script type="text/javascript">
    "use strict";

    function walletGraphOptions() {
        var prefix = $('.creditOrDebit').data('action');
        prefix = (prefix == 'balance') ? "{{ _mt($moduleId,'WalletBlocks.credit_vs_debit') }}" : prefix;
        return {
            dataSetLabel: prefix + ' amount',
            element: '.walletGraphHolder[data-graph="wallets"]',
            labels: JSON.parse($('.walletGraphLabels').val()),
            data: JSON.parse($('.walletGraphData').val()),
            gradient: {
                bg: [0, 0, 0, 240],
                start: '#9b57de',
                stop: '#e4ffe5'
            },
            borderColor: '#9b57de'
        };
    }

    // Load wallets block with filters
    function loadWallet(options, me, returnOptions) {
        var block = 'wallets';
        var walletBlock = $('.statInner[data-target="' + block + '"]');
        var defaults = {
            txnType: walletBlock.find('.creditOrDebit').data('action'),
            walletId: walletBlock.find('.walletChooser').data('wallet')
        };
        var postData = $.extend({}, defaults, options);

        if (returnOptions) return postData;

        loadBlock(postData, block, me, function () {
            setupBusinessBlockSummaryGraph(walletGraphOptions());
            var formatFn = function (value) {
                return '€' + value;
            };
            countupStats($('.walletBalance')[0], 0, $('.walletBalance').data('value'), formatFn);
        })
    }

    $(function () {
        var formatFn = function (value) {
            return '€' + value;
        };
        countupStats($('.walletBalance')[0], 0, $('.walletBalance').data('value'), formatFn);
        setupBusinessBlockSummaryGraph(walletGraphOptions());

        $('.businessInfo .counter').each(function () {
            countupStats(this, 0, $(this).data('value'));
        });

        applyWindowCallback(function (block) {
            switch (block) {
                case 'wallets':
                    setupBusinessBlockSummaryGraph(walletGraphOptions());
                    var formatFn = function (value) {
                        return '€' + value;
                    };
                    countupStats($('.walletBalance')[0], 0, $('.walletBalance').data('value'), formatFn);
                    return;
                    break;
                default:
                    return;
                    break;
            }
        }, 'bizBlockChangeCallbacks');

        applyWindowCallback(function (element) {
            if (jQuerize(element).closest('.statInner').data('target') == 'wallets') {
                var options = loadWallet(null, null, true);
                delete options['filters'];
                //console.log(options);
                return options;
            }
        }, 'bizBlockParams');
    });

    // load wallet data on wallet chooser
    $('body')
        .off('click', '.statInner[data-target="wallets"] .walletChooser ul li')
        .on('click', '.statInner[data-target="wallets"] .walletChooser ul li', function (e) {
            e.preventDefault();
            loadWallet({walletId: $(this).data('id')}, $(this));
        });

    // load wallet data on txn type chooser
    $('body')
        .off('click', '.statInner[data-target="wallets"] ul.creditOrDebit li')
        .on('click', '.statInner[data-target="wallets"] ul.creditOrDebit li', function (e) {
            e.preventDefault();
            loadWallet({txnType: $(this).data('action')}, $(this));
        });
</script>