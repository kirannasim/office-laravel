@php
    $graphDateLabels = [
            'today' => _mt($moduleId, 'UserJoiningBlocks.today'),
            'week' => _mt($moduleId, 'UserJoiningBlocks.this_week'),
            'month' => _mt($moduleId, 'UserJoiningBlocks.this_month'),
            'year' => _mt($moduleId, 'UserJoiningBlocks.this_year'),
            'all' => _mt($moduleId, 'UserJoiningBlocks.all_time'),
         ];
@endphp
<div class="portlet light userStatGraphPortlet">
    <div class="portlet-title">
        <div class="caption">
            <span class="caption-subject bold uppercase font-dark">{{ _mt($moduleId, 'UserJoiningBlocks.IB/Affiliate Info') }}</span>
            <span class="caption-helper">{{ _mt($moduleId, 'UserJoiningBlocks.IB/Affiliate Info') }}</span>
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
                    <a href="#"><i class="icon-calendar"></i> {{ _mt($moduleId, 'UserJoiningBlocks.today') }}  </a>
                </li>
                <li data-from="{{ \Carbon\Carbon::now()->startOfWeek() }}" data-filter="week" data-groupBy="day"
                    class="{{ ($filterBy == 'week') ? 'active' : '' }}">
                    <a href="#"><i class="icon-calendar"></i> {{ _mt($moduleId, 'UserJoiningBlocks.this_week') }} </a>
                </li>
                <li data-from="{{ \Carbon\Carbon::now()->startOfMonth() }}" data-filter="month" data-groupBy="day"
                    class="{{ ($filterBy == 'month') ? 'active' : '' }}">
                    <a href="#"><i class="icon-calendar"></i> {{ _mt($moduleId, 'UserJoiningBlocks.this_month') }}</a>
                </li>
                <li data-from="{{ \Carbon\Carbon::now()->startOfYear() }}" data-filter="year" data-groupBy="month"
                    class="{{ ($filterBy == 'year') ? 'active' : '' }}">
                    <a href="#"><i class="icon-calendar"></i> {{ _mt($moduleId, 'UserJoiningBlocks.this_year') }}</a>
                </li>
                <li data-from="" data-filter="all" data-groupBy="year"
                    class="{{ ($filterBy == 'all') ? 'active' : '' }}">
                    <a href="#"><i class="icon-calendar"></i> {{ _mt($moduleId, 'UserJoiningBlocks.all_time') }}</a>
                </li>
            </ul>
            <a class="btn btn-circle btn-icon-only btn-default fullscreen noBorder noBg noPadding" href="#"
               data-original-title=""
               title=""> </a>
        </div>
    </div>
    <div class="portlet-body">
        <div id="userDetailedGraphHolder" class="userDetailedGraphHolder"></div>
    </div>
</div>
<script>
    "use strict";

    function loadUserStatsGraph(options) {
        var dateFilterElem = $('.userStatGraphPortlet .dateFilter li');
        var defaults = {
            filters: {
                groupBy: dateFilterElem.data('groupby'),
                filterBy: dateFilterElem.data('filter'),
                fromDate: dateFilterElem.data('from')
            }
        };
        var postData = $.extend({}, defaults, options);

        return getUnit('.graphPaneWrapper .unitHolder', 'userDetailedGraph', null, postData);
    }

    function setupUserStatsGraph(elem, options) {
        var defaults = {
            chart: {
                zoomType: 'xy',
                height: 350
            },
            title: {
                text: "{{ _mt($moduleId, 'UserJoiningBlocks.user_downlines_package_report') }}({{ $graphDateLabels[$filterBy] }})"
            },
            xAxis: [{
                type: 'category',
                crosshair: true
            }],
            yAxis: [{ // Primary yAxis
                labels: {
                    style: {
                        color: Highcharts.getOptions().colors[1]
                    }
                },
                title: {
                    text: "{{ _mt($moduleId, 'UserJoiningBlocks.total_users') }}",
                    style: {
                        color: Highcharts.getOptions().colors[1]
                    }
                }
            }, { // Secondary yAxis
                title: {
                    text: "{{ _mt($moduleId, 'UserJoiningBlocks.package_amount') }}",
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
            series: [{
                name: "{{ _mt($moduleId, 'UserJoiningBlocks.total_users') }}",
                type: 'column',
                yAxis: 1,
                /*tooltip: {
                    valueSuffix: ' mm'
                }*/

            }, {
                name: "{{ _mt($moduleId, 'UserJoiningBlocks.package_amount') }}",
                type: 'spline',
                tooltip: {
                    valueSuffix: '$'
                }
            }]
        };
        options = $.extend({}, defaults, options);
        //console.log(options);
        jQuerize(elem).highcharts(options);
    }

    $(function () {
        var userGraph = JSON.parse('{!! json_encode($userGraph) !!}');
        var packageGraph = JSON.parse('{!! json_encode($packageGraph) !!}');
        var descendantsGraph = JSON.parse('{!! json_encode($descendantsGraph) !!}');
        var graphOptions = {
            series:
                [
                    {
                        name: "{{ _mt($moduleId, 'UserJoiningBlocks.total_users') }}",
                        type: 'column',
                        data: userGraph
                        /*tooltip: {
                            valueSuffix: ' mm'
                        }*/

                    },
                    {
                        name: "{{ _mt($moduleId, 'UserJoiningBlocks.my_downline') }}",
                        type: 'column',
                        color: '#e7505a',
                        data: descendantsGraph
                    },
                    {
                        name: "{{ _mt($moduleId, 'UserJoiningBlocks.package_amount') }}",
                        type: 'line',
                        color: '#22debf',
                        data: packageGraph,
                        yAxis: 1,
                        tooltip: {
                            valueSuffix: '$'
                        }
                    }
                ]
        };
        setupUserStatsGraph('.userDetailedGraphHolder', graphOptions);
        /* Graph filters */
        // Date filter
        $('.userStatGraphPortlet .dateFilter li').click(function (e) {
            e.preventDefault();
            var options = {
                filters: {
                    groupBy: $(this).data('groupby'),
                    filterBy: $(this).data('filter'),
                    fromDate: $(this).data('from')
                }
            };
            loadUserStatsGraph(options);
        });
    });
</script>