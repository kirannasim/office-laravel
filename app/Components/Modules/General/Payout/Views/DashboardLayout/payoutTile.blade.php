@php
    $businessBlockLabels = [
        'today' => 'Today',
        'month' => 'This month',
        'week' => 'This week',
        'year' => 'This year',
        'all' => 'all time'
    ];
@endphp
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat2 statInner" data-target="payouts">
        <div class="dropdown filterGroup filterGear dateFilter" data-block="payouts">
            <div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                <i class="icon-settings"></i>
            </div>
            <ul class="dropdown-menu dropdown-menu-default pull-right">
                <li data-from="{{ \Carbon\Carbon::today() }}" data-filter="today" data-groupBy="hour"
                    class="{{ ($filterBy == 'today') ? 'active' : '' }}">
                    <a href="#">
                        <i class="icon-calendar"></i> Today </a>
                </li>
                <li data-from="{{ \Carbon\Carbon::now()->startOfWeek() }}" data-filter="week" data-groupBy="day"
                    class="{{ ($filterBy == 'week') ? 'active' : '' }}">
                    <a href="#">
                        <i class="icon-calendar"></i> This Week </a>
                </li>
                <li data-from="{{ \Carbon\Carbon::now()->startOfMonth() }}" data-filter="month" data-groupBy="day"
                    class="{{ ($filterBy == 'month') ? 'active' : '' }}">
                    <a href="#">
                        <i class="icon-calendar"></i> This month
                        <span class="badge badge-danger"> 3 </span>
                    </a>
                </li>
                <li data-from="{{ \Carbon\Carbon::now()->startOfYear() }}" data-filter="year" data-groupBy="month"
                    class="{{ ($filterBy == 'year') ? 'active' : '' }}">
                    <a href="#">
                        <i class="icon-calendar"></i> This year
                        <span class="badge badge-success"> 7 </span>
                    </a>
                </li>
                <li data-from="" data-filter="all" data-groupBy="year"
                    class="{{ ($filterBy == 'all') ? 'active' : '' }}">
                    <a href="#">
                        <i class="icon-calendar"></i> All time
                        <span class="badge badge-success"> 7 </span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="walletFilterGroup filterGear filterGroup">
            @if($wallets)
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
            {{--@if($scope != 'user')--}}
            {{--<div class="dropdown scopeChooser">--}}
            {{--<div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">--}}
            {{--<div class="selectedWallet">--}}
            {{--<span class="icon-layers"></span>--}}
            {{--<p>All</p>--}}
            {{--<i class="fa fa-angle-down"></i>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<ul class="dropdown-menu dropdown-menu-default pull-right">--}}
            {{--<li>--}}
            {{--<a href="#">Mine only</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</div>--}}
            {{--@endif--}}
        </div>
        <div class="display">
            <div class="number dropdown">
                <h3 class="font-blue-sharp">
                    <span class="payoutSum" data-value="{{ $total }}">0</span>
                </h3>
                <small class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                    {{ _mt($moduleId,'Payout.Total_Payouts') }} <span>({{ $businessBlockLabels[$filterBy] }})</span>
                    {{--<i class="fa fa-angle-down"></i>--}}
                </small>
                {{--@php
                    $walletActions = $walletTxns;
                    unset($walletActions[array_search($txnType, $walletTxns)]);
                @endphp
                <ul class="dropdown-menu dropdown-menu-default pull-right creditOrDebit"
                    data-action="{{ $txnType }}">
                    @foreach($walletActions as $action)
                        <li data-action="{{ $action }}">
                            <a href="#" data-type="{{ $action }}">
                                Total {{ $action }}
                                <span>({{ $businessBlockLabels[$filterBy] }})</span></a>
                        </li>
                    @endforeach
                </ul>--}}
            </div>
            <div class="icon">
                <i class="fa fa-share"></i>
            </div>
        </div>
        <div class="progress-info">
            <div class="progress">
                    <span style="width: {{ $progress }}%;" class="progress-bar progress-bar-success blue-sharp">
                        <span class="sr-only">76% progress</span>
                    </span>
            </div>
            {{--<div class="status">
                <div class="status-title"> progress
                    <div class="difference">
                        (<span class="grantTotal">Total {{ $grandTotal }}</span> - <span
                                class="target">Target {{ $target }}</span>)
                    </div>
                </div>
                <div class="status-number"> {{ $progress }}%</div>
            </div>--}}
        </div>
        <canvas class="payoutGraphHolder chartjs-render-monitor" data-graph="payouts"></canvas>
        <input type="hidden" class="payoutGraphLabels" value="{{ $payoutGraph->keys() }}">
        <input type="hidden" class="payoutGraphData" value="{{ $payoutGraph->values() }}">
    </div>
</div>

<script>
    "use strict";

    function payoutGraphOptions() {
        return {
            dataSetLabel: 'Total payouts',
            element: '.payoutGraphHolder[data-graph="payouts"]',
            labels: JSON.parse($('.payoutGraphLabels').val()),
            data: JSON.parse($('.payoutGraphData').val())
        };
    }

    // Load wallets block with filters
    function loadPayout(options, me, returnOptions) {
        let block = 'payouts';
        let payoutBlock = $('.statInner[data-target="' + block + '"]');
        let defaults = {
            txnType: payoutBlock.find('.creditOrDebit').data('action'),
            walletId: payoutBlock.find('.walletChooser').data('wallet')
        };
        let postData = $.extend({}, defaults, options);

        if (returnOptions) return postData;

        loadBlock(postData, block, me, function () {
            setupBusinessBlockSummaryGraph(payoutGraphOptions());
            countupStats($('.payoutSum')[0], 0, $('.payoutSum').data('value'));
        });
    }

    $(function () {
        countupStats($('.payoutSum')[0], 0, $('.payoutSum').data('value'));
        setupBusinessBlockSummaryGraph(payoutGraphOptions());

        applyWindowCallback(function (block) {
            if (block == 'payouts') {
                setupBusinessBlockSummaryGraph(payoutGraphOptions());
                countupStats($('.payoutSum')[0], 0, $('.payoutSum').data('value'));
            }
        }, 'bizBlockChangeCallbacks');

        applyWindowCallback(function (element) {
            if (jQuerize(element).closest('.statInner').data('target') == 'payouts') {
                let options = loadPayout(null, null, true);
                delete options['filters'];
                //console.log(options);
                return options;
            }
        }, 'bizBlockParams');

        // load wallet data on wallet chooser
        $('body')
            .off('click', '.statInner[data-target="payouts"] .walletChooser ul li')
            .on('click', '.statInner[data-target="payouts"] .walletChooser ul li', function (e) {
                e.preventDefault();
                loadPayout({walletId: $(this).data('id')}, $(this));
            });
    });
</script>
