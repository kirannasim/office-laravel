@foreach($styles as $style)
    {!! $style !!}
@endforeach
@foreach($scripts as $script)
    {!! $script !!}
@endforeach
@php
    $graphDateLabels = [
            'today' => _mt($moduleId, 'CommissionBlocks.today'),
            'week' => _mt($moduleId, 'CommissionBlocks.this_week'),
            'month' => _mt($moduleId, 'CommissionBlocks.this_month'),
            'year' => _mt($moduleId, 'CommissionBlocks.this_year'),
            'all' => _mt($moduleId, 'CommissionBlocks.all_time'),
          ];
@endphp
<div class="portlet light commissionGraphPortlet">
    <div class="portlet-title">
        <div class="caption">
            <span class="caption-subject bold uppercase font-dark">{{ _mt($moduleId, 'CommissionBlocks.commission_info') }}</span>
            <span class="caption-helper">{{ _mt($moduleId, 'CommissionBlocks.commission_info') }}</span>
        </div>
        <div class="actions dropdown">
            <a class="btn btn-circle btn-icon-only btn-default dropdown-toggle noBorder noBg noPadding"
               data-toggle="dropdown"
               aria-expanded="true" href="#">
                <i class="icon-settings"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-default pull-right dateFilter">
                <li data-from="{{ \Carbon\Carbon::today() }}" data-filter="today" data-groupBy="hour"
                    class="{{ ($filterBy == 'today') ? 'active' : '' }}">
                    <a href="#"><i class="icon-calendar"></i> {{ _mt($moduleId, 'CommissionBlocks.today') }} </a>
                </li>
                <li data-from="{{ \Carbon\Carbon::now()->startOfWeek() }}" data-filter="week" data-groupBy="day"
                    class="{{ ($filterBy == 'week') ? 'active' : '' }}">
                    <a href="#"><i class="icon-calendar"></i> {{ _mt($moduleId, 'CommissionBlocks.this_week') }} </a>
                </li>
                <li data-from="{{ \Carbon\Carbon::now()->startOfMonth() }}" data-filter="month" data-groupBy="day"
                    class="{{ ($filterBy == 'month') ? 'active' : '' }}">
                    <a href="#"><i class="icon-calendar"></i> {{ _mt($moduleId, 'CommissionBlocks.this_month') }}</a>
                </li>
                <li data-from="{{ \Carbon\Carbon::now()->startOfYear() }}" data-filter="year" data-groupBy="month"
                    class="{{ ($filterBy == 'year') ? 'active' : '' }}">
                    <a href="#"><i class="icon-calendar"></i> {{ _mt($moduleId, 'CommissionBlocks.this_year') }} </a>
                </li>
                <li data-from="" data-filter="all" data-groupBy="year"
                    class="{{ ($filterBy == 'all') ? 'active' : '' }}">
                    <a href="#">
                        <i class="icon-calendar"></i> {{ _mt($moduleId, 'CommissionBlocks.all_time') }}
                    </a>
                </li>
            </ul>
            <a class="btn btn-circle btn-icon-only btn-default fullscreen noBorder noBg noPadding" href="#"
               data-original-title=""
               title=""> </a>
        </div>
        @if(strtolower(getScope()) == 'admin')
            <div class="dropdown scopeChooser">
                <div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <div class="selectedScope" data-scope="{{ $scope }}">
                        <span class="icon-layers"></span>
                        <p>{{ $scope ?  _mt($moduleId, 'CommissionBlocks.Mine') : _mt($moduleId, 'CommissionBlocks.All') }}</p>
                        <i class="fa fa-angle-down"></i>
                    </div>
                </div>
                <ul class="dropdown-menu dropdown-menu-default pull-right">
                    <li>
                        <a href="#" data-scope="{{ $scope ? '' : loggedId() }}">{{ $scope ? 'All' : 'Mine' }} </a>
                    </li>
                </ul>
            </div>
        @endif
    </div>
    <div class="portlet-body row">
        <div class="col-md-4 commissionListHolder">
            <ul class="commissionListInner">
                <h3>{{ _mt($moduleId, 'CommissionBlocks.Commissions_and_total_amount') }}</h3>
                <div class="commissionAmountBox">
                    <i class="fa fa-money"></i>
                    <span class="amount">{{ currency($totalAmount) }}</span>
                </div>
                @forelse($commissions as $amount => $commission)
                    <li class="commissionNav">
                        <label>{{ $commission->registry['name'] }}</label>
                        <span class="totalAmount">{{ currency($commission->transactions->sum('total')) }}</span>
                    </li>
                @empty
                    <div class="noCommissions">{{ _mt($moduleId, 'CommissionBlocks.There_are_no_commissions_available') }}</div>
                @endforelse
            </ul>
        </div>
        <div class="col-md-8">
            <div id="commissionGraphHolder" class="commissionGraphHolder"></div>
        </div>
    </div>
</div>

<script>
    "use strict";

    function loadCommissionGraph(options) {
        var dateFilterElem = $('.commissionGraphPortlet .dateFilter li');
        var defaults = {
            filters: {
                groupBy: dateFilterElem.data('groupby'),
                filterBy: dateFilterElem.data('filter'),
                fromDate: dateFilterElem.data('from'),
                user: $('.commissionGraphPortlet .scopeChooser .selectedScope').data('scope')
            }
        };
        var postData = $.extend({}, defaults, options);
        console.log(defaults);

        return getUnit('.graphPaneWrapper .unitHolder', 'commissionDetailedGraph', null, postData);
    }

    $(function () {
        var commissionsGraph = JSON.parse('{!! json_encode($graphData) !!}');
        var series = [];
        for (var key in commissionsGraph) {
            series.push({
                name: commissionsGraph[key]['name'],
                type: commissionsGraph[key]['graphType'],
                data: commissionsGraph[key]['graph'],
                tooltip: {
                    valueSuffix: ' €'
                },
                color: commissionsGraph[key]['color'],
            });
        }
        //console.log(series);
        setupCommissionStatsGraph('.commissionGraphHolder', {series: series});
    });

    function setupCommissionStatsGraph(elem, options) {
        var defaults = {
            chart: {
                height: 350
            },
            title: {
                text: "{{  _mt($moduleId, 'CommissionBlocks.Commissions_Stats') }} ({{ $graphDateLabels[$filterBy] }})"
            },
            xAxis: [{
                type: 'category',
                crosshair: true,
                title: {
                    text: "{{ _mt($moduleId, 'CommissionBlocks.Date_of_distribution') }}",
                }
            }],
            yAxis: [{
                // Secondary yAxis
                title: {
                    text: "{{ _mt($moduleId, 'CommissionBlocks.Amount_Distributed') }}",
                    style: {
                        color: Highcharts.getOptions().colors[0]
                    }
                },
                labels: {
                    format: '{value} $',
                    style: {
                        color: Highcharts.getOptions().colors[0]
                    }
                }
            }],
            tooltip: {
                shared: true
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                x: 0,
                verticalAlign: 'top',
                y: 40,
                floating: true,
                borderColor: '#c4c4c4',
                color: '#fff',
                backgroundColor: '#ffffffd9'
            },
            series: []
        };
        options = $.extend({}, defaults, options);
        //console.log(options);
        jQuerize(elem).highcharts(options);

        /* Graph filters */
        // Date filter
        $('.commissionGraphPortlet .dateFilter li').click(function (e) {
            e.preventDefault();
            var options = {
                filters: {
                    groupBy: $(this).data('groupby'),
                    filterBy: $(this).data('filter'),
                    fromDate: $(this).data('from'),
                    user: $('.commissionGraphPortlet .scopeChooser .selectedScope').data('scope')
                }
            };
            loadCommissionGraph(options);
        });

        $('.commissionGraphPortlet .scopeChooser .dropdown-menu > li > a').click(function (e) {
            e.preventDefault();
            var dateFilterElem = $('.commissionGraphPortlet .dateFilter li.active');
            var options = {
                filters: {
                    groupBy: dateFilterElem.data('groupby'),
                    filterBy: dateFilterElem.data('filter'),
                    fromDate: dateFilterElem.data('from'),
                    user: $(this).data('scope')
                }
            };
            loadCommissionGraph(options);
        });
    }
</script>