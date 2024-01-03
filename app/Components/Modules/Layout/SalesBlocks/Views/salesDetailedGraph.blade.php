@foreach($styles as $style)
    {!! $style !!}
@endforeach
@foreach($scripts as $script)
    {!! $script !!}
@endforeach
@php
    $graphDateLabels = [
            'today' => _mt($moduleId, 'SalesBlocks.today'),
            'week' => _mt($moduleId, 'SalesBlocks.this_week'),
            'month' => _mt($moduleId, 'SalesBlocks.this_month'),
            'year' => _mt($moduleId, 'SalesBlocks.this_year'),
            'all' => _mt($moduleId, 'SalesBlocks.all_time'),
          ];
@endphp
<div class="portlet light salesGraphPortlet">
    <div class="portlet-title">
        <div class="caption">
            <span class="caption-subject bold uppercase font-dark">{{ _mt($moduleId, 'SalesBlocks.sales_report') }}</span>
            <span class="caption-helper">{{ _mt($moduleId, 'SalesBlocks.detailed_sales_status') }}</span>
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
                    <a href="#"><i class="icon-calendar"></i> {{ _mt($moduleId, 'SalesBlocks.today') }} </a>
                </li>
                <li data-from="{{ \Carbon\Carbon::now()->startOfWeek() }}" data-filter="week" data-groupBy="day"
                    class="{{ ($filterBy == 'week') ? 'active' : '' }}">
                    <a href="#"><i class="icon-calendar"></i> {{ _mt($moduleId, 'SalesBlocks.this_week') }} </a>
                </li>
                <li data-from="{{ \Carbon\Carbon::now()->startOfMonth() }}" data-filter="month" data-groupBy="day"
                    class="{{ ($filterBy == 'month') ? 'active' : '' }}">
                    <a href="#"><i class="icon-calendar"></i> {{ _mt($moduleId, 'SalesBlocks.this_month') }}</a>
                </li>
                <li data-from="{{ \Carbon\Carbon::now()->startOfYear() }}" data-filter="year" data-groupBy="month"
                    class="{{ ($filterBy == 'year') ? 'active' : '' }}">
                    <a href="#"><i class="icon-calendar"></i> {{ _mt($moduleId, 'SalesBlocks.this_year') }} </a>
                </li>
                <li data-from="" data-filter="all" data-groupBy="year"
                    class="{{ ($filterBy == 'all') ? 'active' : '' }}">
                    <a href="#">
                        <i class="icon-calendar"></i> {{ _mt($moduleId, 'SalesBlocks.all_time') }}
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
                    <label>{{ _mt($moduleId, 'SalesBlocks.sales_income') }}</label>
                    {{ prettyCurrency($packageSum) }}
                </div>
            </div>
            <div class="listInner">
                <div class="saleList">
                    <p>{{ _mt($moduleId, 'SalesBlocks.total_package_sale') }}</p>
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

    function loadSalesGraph(options) {
        var dateFilterElem = $('.salesGraphPortlet .dateFilter li');
        var defaults = {
            filters: {
                groupBy: dateFilterElem.data('groupby'),
                filterBy: dateFilterElem.data('filter'),
                fromDate: dateFilterElem.data('from')
            }
        };
        var postData = $.extend({}, defaults, options);

        return getUnit('.graphPaneWrapper .unitHolder', 'salesDetailedGraph', null, postData);
    }

    $(function () {
        var graphColors = {
            Registration_Fee: '#dd2f36',
            Shipping_Cost: '#dd907c',
            Discount: '#209cdc',
            Tax: '#2bdcb6',
        };
        var packageGraph = JSON.parse('{!! json_encode($packageGraph) !!}');
        var totalGraphs = JSON.parse('{!! json_encode($orderTotalGraph) !!}');
        var graphOptions = {
            series:
                [
                    {
                        name: "{{ _mt($moduleId, 'SalesBlocks.Package_purchases') }}",
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
                name: key.replace('_', ' '),
                type: 'line',
                data: totalGraphs[key],
                tooltip: {
                    valueSuffix: ' $'
                },
                color: graphColors[key],
                yAxis: 1
            });
        }
        //console.log(graphOptions['series']);
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
                text: "{{ _mt($moduleId, 'SalesBlocks.sales_report') }} ({{ $graphDateLabels[$filterBy] }})"
            },
            xAxis: [{
                type: 'category',
                categories: {!! json_encode($xAxises) !!},
                crosshair: true,
                title: {
                    text: "{{ _mt($moduleId, 'SalesBlocks.time_of_order') }}"
                }
            }],
            yAxis: [{ // Secondary yAxis
                title: {
                    text: "{{ _mt($moduleId, 'SalesBlocks.Order_Amount') }}",
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
                    text: "{{ _mt($moduleId, 'SalesBlocks.Order_Totals') }}",
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

        /* Graph filters */
        // Date filter
        $('.salesGraphPortlet .dateFilter li').click(function (e) {
            e.preventDefault();
            var options = {
                filters: {
                    groupBy: $(this).data('groupby'),
                    filterBy: $(this).data('filter'),
                    fromDate: $(this).data('from')
                }
            };
            loadSalesGraph(options);
        });
    }
</script>