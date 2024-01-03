@php
    $graphDateLabels = [
                'today' => 'Today',
                'month' => 'This month',
                'week' => 'This week',
                'year' => 'This year',
                'all' => 'all time'
            ];
@endphp
<div class="portlet light salesGraphPortlet">
    <div class="portlet-title">
        <div class="caption">
            <span class="caption-subject bold uppercase font-dark">Payouts report</span>
            <span class="caption-helper">Detailed sales stats</span>
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
            <a class="btn btn-circle btn-icon-only btn-default fullscreen noBorder noBg noPadding" href="#"
               data-original-title=""
               title=""> </a>
        </div>
    </div>
    <div class="portlet-body">
        <div class="col-md-4 salesListHolder">
            <div class="bizBalance">
                <div class="iconHolder">
                    <i class="icon-wallet"></i>
                </div>
                <div class="data">
                    <label>Sales income</label>
                    {{ prettyCurrency($packageSum) }}
                </div>
            </div>
            <div class="listInner">
                <div class="saleList">
                    <p>Total package sales</p>
                    <span class="amount">{{ prettyCurrency($packageSum) }}</span>
                </div>
                @foreach($orderTotalGraph as $key => $value)
                    <div class="saleList" data-slug="{{ $key }}">
                        <p>{{ ucfirst(str_replace('_', ' ', $key)) }}</p>
                        @php
                            $sum = 0;
                            foreach ($value as $each){
                                $sum += $each[1];
                            }
                        @endphp
                        <span class="amount">{{ prettyCurrency($sum) }}</span>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-8">
            <div id="salesGraphHolder" class="salesGraphHolder"></div>
        </div>
    </div>
</div>

<script>
    "use strict";
    $(function () {
        var graphColors = {
            Registration_fee: '#dd2f36',
            product_based_discount: '#dd907c',
        };
        var packageGraph = JSON.parse('{!! json_encode($packageGraph) !!}');
        var totalGraphs = JSON.parse('{!! json_encode($orderTotalGraph) !!}');
        var graphOptions = {
            series:
                [
                    {
                        name: 'Package purchases',
                        type: 'column',
                        data: packageGraph,
                        tooltip: {
                            valueSuffix: ' $'
                        }
                    }
                ]
        };
        for (var key in totalGraphs) {
            graphOptions['series'].push({
                name: key,
                type: 'line',
                data: totalGraphs[key],
                tooltip: {
                    valueSuffix: ' $'
                },
                color: graphColors[key],
                yAxis: 1
            });
        }
        console.log(graphOptions['series']);
        setupSaleStatsGraph('.salesGraphHolder', graphOptions);
        $('.saleList').each(function () {
            $(this).find('.amount').css('background', graphColors[$(this).data('slug')]);
        });
    });

    function setupSaleStatsGraph(elem, options) {
        var defaults = {
            chart: {
                height: 350
            },
            title: {
                text: 'Sales report ({{ $graphDateLabels[$filterBy] }})'
            },
            xAxis: [{
                type: 'category',
                crosshair: true,
                title: {
                    text: 'Time of order',
                }
            }],
            yAxis: [{ // Secondary yAxis
                title: {
                    text: 'Order Amount',
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
            }, { // Secondary yAxis
                title: {
                    text: 'Order totals',
                    style: {
                        color: Highcharts.getOptions().colors[0]
                    }
                },
                labels: {
                    format: '{value} $',
                    style: {
                        color: Highcharts.getOptions().colors[0]
                    }
                },
                opposite: true
            }],
            tooltip: {
                shared: true
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                x: -100,
                verticalAlign: 'top',
                y: 50,
                floating: true,
                borderColor: '#c4c4c4',
                color: '#fff',
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#efefef'
            },
            series: []
        };
        options = $.extend({}, defaults, options);
        //console.log(options);
        jQuerize(elem).highcharts(options);
    }
</script>