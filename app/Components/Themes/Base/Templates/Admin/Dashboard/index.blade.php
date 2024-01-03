@extends('Admin.Layout.master')
@section('content')
    <div class="row systemStats unitHolder" data-unit="businessInfo" data-loader-bg="none"></div>
    <div class="table-responsive reportTable-package">
        <table class="table table-striped table-bordered table-hover dataTable dtr-inline reporttable" role="grid"
               aria-describedby="sample_1_info">
            <thead>
            <tr>
                @foreach($packages as $package)
                    <th>{{ $package->name }}</th>
                @endforeach
                <th>PENDING CYCLES</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @foreach($packages as $package)
                    <td>{{ $packagedUsers->get($package->id) ?: 0}}</td>
                @endforeach
                <td>{{ $pending }}</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="row detailedGraphs">
        <div class="col-md-3 col-sm-3 co-xs-12 navWrapper">
            <ul class="navHolder">
                <li class="graphNav active" data-unit="mailDetailedGraph">
                    <i class="fa fa-envelope"></i>
                    <p>{{ _t('index.Emails') }}</p>
                </li>
                {!! defineFilter('dashboardBlock', '', 'detailedGraphsNav') !!}
            </ul>
        </div>
        <div class="graphPaneWrapper col-md-9 col-sm-9 co-xs-12">
            <div class="innerHolder unitHolder" data-unit="mailDetailedGraph"></div>
        </div>
    </div>
    {!! defineFilter('dashboardBlock', '', 'detailsBlock1') !!}
    <div class="row lastJoiningsAndActivities">
        <div class="col-lg-5 col-xs-12 col-sm-12 activitiesHolder">
            <div class="innerHolder unitHolder" data-unit="activities"></div>
        </div>
        {!! defineFilter('dashboardBlock', '', 'detailsBlock2') !!}
    </div>
    <div class="row linksHolder">
        {!! defineFilter('dashboardBlock', '', 'afterTopJoiningAndEarnersTile') !!}
    </div>
    <div class="row systemModules">
        <div class="innerHolder unitHolder" data-unit="systemModules" data-loader-bg="none"></div>
    </div>
    <style>
        .page-content {
            background: #eee;
        }

        .page-bar {
            background: none !important;
        }

        .reportTable-package table.reporttable {
            background-color: #fff;
            text-align: center;
        }

        .reportTable-package table.reporttable thead tr th {
            background-color: #fbfbfb;
            text-align: center;
            color: #4e84b1;
        }

        .reportTable-package table.reporttable tbody tr td {
            text-align: center;
        }
    </style>

    <script type="text/javascript">
        "use strict";

        $(function () {
            loadAllUnits();
        });

        function loadAllUnits() {
            $('.unitHolder').each(function (key, value) {
                var isLast = (key + 1) == $('.unitHolder').length ? true : false;
                getUnit($(this), $(this).data('unit')).done(function () {
                    //if(isLast) alert('finished');
                });
            });
        }

        function getUnit(element, unit, args, postData, partial) {
            unit = unit ? unit : jQuerize(element).data('unit');
            var options = $.extend({}, {unit: unit, args: args}, postData);
            simulateLoading(jQuerize(element));

            return $.post('{{ route('dashboard.unit') }}', options, function (response) {
                jQuerize(element).html(!partial ? response : $(response).find(partial).html());
            });
        }

        function countupStats(targetElement, startVal, endVal, formattingFn) {
            var options = {
                useEasing: true,
                useGrouping: true,
                separator: ',',
                decimal: '.',
                formattingFn: formattingFn ? formattingFn : function (number) {
                    return number;
                },
            };
            var countup = new CountUp(targetElement, Number(startVal), Number(endVal), 0, 2.5, options);

            if (!countup.error) {
                countup.start();
            } else {
                console.error(countup.error);
            }
        }

        function setupBusinessBlockSummaryGraph(options) {
            var defaults = {
                dataSetLabel: 'Stats',
                labels: [
                    "{{ _t('index.january') }}", "{{ _t('index.february') }}", "{{ _t('index.march') }}", "{{ _t('index.april') }}", "{{ _t('index.may') }}", "{{ _t('index.june') }}", "{{ _t('index.july') }}", "{{ _t('index.august') }}", "{{ _t('index.september') }}", "{{ _t('index.october') }}",
                ],
                data: [],
                gradient: {
                    bg: [0, 0, 0, 240],
                    start: '#5C9BD1',
                    stop: '#f2feff'
                }
                , borderColor: '#5C9BD1'
            };
            options = $.extend({}, defaults, options);
            var ctx = jQuerize(options.element)[0].getContext("2d");
            var gradient = ctx.createLinearGradient.apply(ctx, options.gradient['bg']);
            gradient.addColorStop(0, Chart.helpers.color(options.gradient['start']).alpha(0.7).rgbString());
            gradient.addColorStop(1, Chart.helpers.color(options.gradient['stop']).alpha(0).rgbString());

            var config = {
                type: 'line',
                data: {
                    labels: options.labels,
                    datasets: [{
                        label: options.dataSetLabel,
                        backgroundColor: gradient, // Put the gradient here as a fill color
                        borderColor: options.borderColor,
                        pointBackgroundColor: Chart.helpers.color('#bababa').alpha(0.4).rgbString(),
                        pointBorderColor: Chart.helpers.color('#979797').alpha(0.4).rgbString(),
                        pointHoverBackgroundColor: Chart.helpers.color('#ffffff').alpha(0).rgbString(),
                        pointHoverBorderColor: Chart.helpers.color('#000000').alpha(0.2).rgbString(),
                        //fill: 'start',
                        data: options.data
                    }]
                },
                options: {
                    title: {
                        display: false
                    },
                    tooltips: {
                        intersect: false,
                        mode: 'nearest',
                        xPadding: 10,
                        yPadding: 10,
                        caretPadding: 10
                    },
                    legend: {
                        display: false
                    },
                    responsive: true,
                    hover: {
                        mode: 'index'
                    },
                    scales: {
                        xAxes: [{
                            display: false,
                            gridLines: false,
                        }],
                        yAxes: [{
                            display: false,
                            gridLines: false,
                            /*ticks: {
                                beginAtZero: true
                            }*/
                        }]
                    },
                    elements: {
                        line: {
                            tension: 0.4
                        },
                        point: {
                            radius: 2,
                            borderWidth: 8,
                        }
                    },
                    layout: {
                        padding: {
                            left: 0,
                            right: 0,
                            top: 5,
                            bottom: 0
                        }
                    }
                }
            };

            var chart = new Chart(ctx, config);
        }

        function applyWindowCallback(callback, name) {
            var callbacks = window[name];
            callbacks = $.isArray(callbacks) ? callbacks : [];
            callbacks.push(callback);
            window[name] = callbacks;
        }

        function fetchBizBlock(postData, block, triggeredElement) {
            return loadBusinessBlock(postData, null, block).done(function () {
                var callbacks = window.bizBlockChangeCallbacks;
                if (callbacks && $.isArray(callbacks))
                    callbacks.forEach(function (action, key) {
                        action(block, triggeredElement);
                    });
            });
        }

        function loadBlock(options, block, elem, callback) {
            var blockElem = $('.statInner[data-target="' + block + '"]');
            var filterElem = blockElem.find('.dateFilter li.active');
            var filters = {
                groupBy: filterElem.data('groupby'),
                filterBy: filterElem.data('filter'),
                fromDate: filterElem.data('from')
            };
            var defaults = {filters: filters};
            var postData = $.extend({}, defaults, options);

            fetchBizBlock(postData, block, elem).done(callback);
        }

        function loadBusinessBlock(postData, unit, block) {
            unit = unit ? unit : 'businessInfo';

            return getUnit('.statInner[data-target="' + block + '"]', unit, {}, postData, '.statInner[data-target="' + block + '"]');
        }

        $('.detailedGraphs .navHolder li').click(function () {
            $(this).addClass('active').siblings().removeClass('active');
            $('.graphPaneWrapper .unitHolder').attr('data-unit', $(this).data('unit'));

            return getUnit('.graphPaneWrapper .unitHolder', $(this).data('unit'));
        });
    </script>
@endsection
