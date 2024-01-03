@php
    $blockLabels = [
        'today' => 'Today',
        'month' => 'This month',
        'week' => 'This week',
        'year' => 'This year',
        'all' => 'all time'
    ];
    $walletTxns = ['balance', 'credited', 'debited'];
@endphp
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat2 statInner" data-target="profit">
        <div class="dropdown filterGroup filterGear" data-block="profit">
            <div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                <i class="icon-settings"></i>
            </div>
            <ul class="dropdown-menu dropdown-menu-default pull-right timeChooser">
                <li data-from="{{ \Carbon\Carbon::today() }}" data-filter="today" data-groupBy="hour"
                    class="{{ ($filterBy == 'today') ? 'active' : '' }}">
                    <a href="#">
                        <i class="icon-calendar"></i> {{ _mt('Wallet-BusinessWallet','BusinessWallet.today') }} </a>
                </li>
                <li data-from="{{ \Carbon\Carbon::now()->startOfWeek() }}" data-filter="week" data-groupBy="day"
                    class="{{ ($filterBy == 'week') ? 'active' : '' }}">
                    <a href="#">
                        <i class="icon-calendar"></i> {{ _mt('Wallet-BusinessWallet','BusinessWallet.this_week') }} </a>
                </li>
                <li data-from="{{ \Carbon\Carbon::now()->startOfMonth() }}" data-filter="month" data-groupBy="day"
                    class="{{ ($filterBy == 'month') ? 'active' : '' }}">
                    <a href="#">
                        <i class="icon-calendar"></i> {{ _mt('Wallet-BusinessWallet','BusinessWallet.this_month') }}
                        <span class="badge badge-danger"> 3 </span>
                    </a>
                </li>
                <li data-from="{{ \Carbon\Carbon::now()->startOfYear() }}" data-filter="year" data-groupBy="month"
                    class="{{ ($filterBy == 'year') ? 'active' : '' }}">
                    <a href="#">
                        <i class="icon-calendar"></i> {{ _mt('Wallet-BusinessWallet','BusinessWallet.this_year') }}
                        <span class="badge badge-success"> 7 </span>
                    </a>
                </li>
                <li data-from="" data-filter="all" data-groupBy="year"
                    class="{{ ($filterBy == 'all') ? 'active' : '' }}">
                    <a href="#">
                        <i class="icon-calendar"></i> {{ _mt('Wallet-BusinessWallet','BusinessWallet.all_time') }}
                        <span class="badge badge-success"> 7 </span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="display" data-txnType="{{ $txnType }}">
            <div class="number dropdown">
                <h3 class="font-green-sharp">
                    <span class="businessBalance" data-value="{{ $total }}">0</span>
                </h3>
                <small class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                    {{ _mt('Wallet-BusinessWallet','BusinessWallet.business') }} {{ $txnType }}
                    <span>({{ $blockLabels[$filterBy] }})</span>
                    <i class="fa fa-angle-down"></i>
                </small>
                @php
                    $walletActions = $walletTxns;
                    unset($walletActions[array_search($txnType, $walletTxns)]);
                @endphp
                <ul class="dropdown-menu dropdown-menu-default pull-right incomeOrExpenseChooser"
                    data-action="{{ $txnType }}">
                    @foreach($walletActions as $action)
                        <li data-action="{{ $action }}">
                            <a href="#" data-type="{{ $action }}">
                                {{ $action }}
                                <span>({{ $blockLabels[$filterBy] }})</span></a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="icon">
                <i class="fa fa-briefcase"></i>
            </div>
        </div>
        <div class="progress-info">
            <div class="progress">
                <span style="width: {{ $progress }}%;" class="progress-bar progress-bar-success green-sharp">
                    <span class="sr-only">76% progress</span>
                </span>
            </div>
            {{--<div class="status">
                <div class="status-title"> {{ _mt('Wallet-BusinessWallet','BusinessWallet.progress') }}
                    <div class="difference">
                        (<span class="grantTotal">{{ _mt('Wallet-BusinessWallet','BusinessWallet.total') }} {{ prettyCurrency($balance) }}</span>
                        -
                        <span class="target">{{ _mt('Wallet-BusinessWallet','BusinessWallet.target') }} {{ prettyCurrency($target) }}</span>)
                    </div>
                </div>
                <div class="status-number"> {{ $progress }}%</div>
            </div>--}}
        </div>
        <canvas class="profitGraphHolder chartjs-render-monitor" data-graph="joining"></canvas>
        <input type="hidden" class="profitGraphLabels" value="{{ $graph->keys() }}">
        <input type="hidden" class="profitGraphData" value="{{ $graph->values() }}">
    </div>
</div>

<script>
    "use strict";

    $(function () {
        var formatFn = function (value) {
            return '€' + value;
        };
        setupBusinessBlockSummaryGraph(profitGraphOptions());
        countupStats($('.businessBalance')[0], 0, $('.businessBalance').data('value'), formatFn);

        applyWindowCallback(function (element) {
            var incomeExpense = jQuerize(element).closest('.statInner[data-target="profit"]').find('.display');

            if (!incomeExpense.length) return;

            var txnType = incomeExpense.data('txntype');

            return {txnAction: txnType};
        }, 'bizBlockParams');

        applyWindowCallback(function (block) {
            if (block == 'profit') {
                setupBusinessBlockSummaryGraph(profitGraphOptions());
                countupStats($('.businessBalance')[0], 0, $('.businessBalance').data('value'), formatFn);
            }
        }, 'bizBlockChangeCallbacks');

        $('body')
            .off('click', '.incomeOrExpenseChooser li a')
            .on('click', '.incomeOrExpenseChooser li a', function (e) {
                e.preventDefault();
                var targetLi = $('.statInner[data-target="profit"] .timeChooser li.active');
                var filters = {
                    groupBy: targetLi.data('groupby'),
                    filterBy: targetLi.data('filter'),
                    fromDate: targetLi.data('from')
                };
                fetchBizBlock({filters: filters, txnAction: $(this).data('type')}, 'profit');
            });
    });

    function profitGraphOptions() {
        return {
            dataSetLabel: 'Total Profit',
            element: '.profitGraphHolder[data-graph="joining"]',
            labels: JSON.parse($('.profitGraphLabels').val()),
            data: JSON.parse($('.profitGraphData').val()),
            gradient: {
                bg: [0, 0, 0, 240],
                start: '#2ededd',
                stop: '#c4fff3'
            },
            borderColor: '#27d4de'
        };
    }

    function loadProfitBlock(filters, unit) {
        unit = unit ? unit : 'businessInfo';

        return getUnit('.statInner[data-target="joining"]', unit, {}, {filters: filters}, '.statInner[data-target="joining"]');
    }
</script>