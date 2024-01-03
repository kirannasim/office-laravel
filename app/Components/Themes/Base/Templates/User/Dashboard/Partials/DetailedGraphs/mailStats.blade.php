@php
    $graphDateLabels = [
            'today' => _t('index.today'),
            'week' => _t('index.this_week'),
            'month' => _t('index.this_month'),
            'year' => _t('index.this_year'),
            'all' => _t('index.all_time'),
          ];
@endphp
<div class="portlet light mailGraphPortlet">
    <div class="portlet-title">
        <div class="caption">
            <span class="caption-subject bold uppercase font-dark">{{ _t('index.Emails_Stats') }}</span>
            <span class="caption-helper">{{ _t('index.Emails_Stats') }}</span>
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
                    <a href="#"><i class="icon-calendar"></i> {{ _t('index.today') }} </a>
                </li>
                <li data-from="{{ \Carbon\Carbon::now()->startOfWeek() }}" data-filter="week" data-groupBy="day"
                    class="{{ ($filterBy == 'week') ? 'active' : '' }}">
                    <a href="#"><i class="icon-calendar"></i> {{ _t('index.this_week') }} </a>
                </li>
                <li data-from="{{ \Carbon\Carbon::now()->startOfMonth() }}" data-filter="month" data-groupBy="day"
                    class="{{ ($filterBy == 'month') ? 'active' : '' }}">
                    <a href="#"><i class="icon-calendar"></i> {{ _t('index.this_month') }}</a>
                </li>
                <li data-from="{{ \Carbon\Carbon::now()->startOfYear() }}" data-filter="year" data-groupBy="month"
                    class="{{ ($filterBy == 'year') ? 'active' : '' }}">
                    <a href="#"><i class="icon-calendar"></i> {{ _t('index.this_year') }} </a>
                </li>
                <li data-from="" data-filter="all" data-groupBy="year"
                    class="{{ ($filterBy == 'all') ? 'active' : '' }}">
                    <a href="#">
                        <i class="icon-calendar"></i> {{ _t('index.all_time') }}
                    </a>
                </li>
            </ul>
            <a class="btn btn-circle btn-icon-only btn-default fullscreen noBorder noBg noPadding" href="#"
               data-original-title=""
               title=""> </a>
        </div>
    </div>
    <div class="portlet-body row">
        <div class="col-md-12">
            <div id="mailGraphHolder" class="mailGraphHolder"></div>
            <div class="mailMenu row">
                <div class="col-md-3 col-sm-6">
                    <div class="menu inbox">
                        <div class="icon">
                            <i class="fa fa-inbox"></i>
                        </div>
                        <div class="detail">
                            <label>{{ _t('index.Inbox') }}</label>
                            <span class="count">{{ $totals['inbox'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="menu sent">
                        <div class="icon">
                            <i class="fa fa-paper-plane"></i>
                        </div>
                        <div class="detail">
                            <label>{{ _t('index.Sent') }}</label>
                            <span class="count">{{ $totals['sent'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="menu draft">
                        <div class="icon">
                            <i class="fa fa-folder-open"></i>
                        </div>
                        <div class="detail">
                            <label>{{ _t('index.Draft') }}</label>
                            <span class="count">{{ $totals['drafts'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="menu trashed">
                        <div class="icon">
                            <i class="fa fa-trash"></i>
                        </div>
                        <div class="detail">
                            <label>{{ _t('index.Trash') }}</label>
                            <span class="count">{{ $totals['trashed'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    "use strict";

    function loadMailGraph(options) {
        var dateFilterElem = $('.mailGraphPortlet .dateFilter li');
        var defaults = {
            filters: {
                groupBy: dateFilterElem.data('groupby'),
                filterBy: dateFilterElem.data('filter'),
                fromDate: dateFilterElem.data('from'),
            }
        };
        var postData = $.extend({}, defaults, options);
        //console.log(defaults);
        return getUnit('.graphPaneWrapper .unitHolder', 'mailDetailedGraph', null, postData);
    }

    $(function () {
        var mailGraph = JSON.parse('{!! json_encode($graph) !!}');
        var series = [];
        for (var key in mailGraph) {
            series.push({
                name: key,
                type: 'line',
                data: mailGraph[key],
                color: mailGraph[key]['color'],
            });
        }
        //console.log(series);
        setupMailStatsGraph('.mailGraphHolder', {series: series});
    });

    function setupMailStatsGraph(elem, options) {
        var defaults = {
            chart: {
                height: 300
            },
            title: {
                text: "{{ _t('index.Emails_Stats') }} ({{ $graphDateLabels[$filterBy] }})"
            },
            xAxis: [{
                type: 'category',
                categories: {!! json_encode($xAxises) !!},
                crosshair: true,
                title: {
                    text: "{{ _t('index.Date_of_distribution') }}"
                }
            }],
            yAxis: [{
                // Secondary yAxis
                title: {
                    text: "{{ _t('index.Number_of_mails') }}",
                    style: {
                        color: Highcharts.getOptions().colors[0]
                    }
                },
                labels: {
                    format: '{value}',
                    style: {
                        color: Highcharts.getOptions().colors[0]
                    }
                },
                allowDecimals: false
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
        jQuerize(elem).highcharts(options);

        /* Graph filters */
        // Date filter
        $('.mailGraphPortlet .dateFilter li').click(function (e) {
            e.preventDefault();
            var options = {
                filters: {
                    groupBy: $(this).data('groupby'),
                    filterBy: $(this).data('filter'),
                    fromDate: $(this).data('from'),
                    user: $('.mailGraphPortlet .scopeChooser .selectedScope').data('scope')
                }
            };
            loadMailGraph(options);
        });

        $('.mailGraphPortlet .scopeChooser .dropdown-menu > li > a').click(function (e) {
            e.preventDefault();
            var dateFilterElem = $('.mailGraphPortlet .dateFilter li.active');
            var options = {
                filters: {
                    groupBy: dateFilterElem.data('groupby'),
                    filterBy: dateFilterElem.data('filter'),
                    fromDate: dateFilterElem.data('from'),
                    user: $(this).data('scope')
                }
            };
            loadMailGraph(options);
        });
    }
</script>
