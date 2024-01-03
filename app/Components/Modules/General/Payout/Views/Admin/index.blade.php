@extends(ucfirst(getScope()).'.Layout.master')
@section('content')
    @php
        $approved = $approved != null ? $approved->amount : 0;
        $pending = $pending != null ? $pending->amount : 0;
    @endphp
    <div class="payoutWrapper row">
        <div class="innerColumn col-md-12">
            <div class="firstSection col-md-4">
                <div class="payoutGraph" id="payoutGraph"></div>
                <div class="payoutNav">
                    <div data-unit="releaseRequests" class="singleNav active">
                        <h3>
                            <i class="fa fa-bell-slash-o"></i>{{ _mt($moduleId,'Payout.Release_Requests') }}
                        </h3>
                        <div class="payoutAmount">
                            <div class="processed">
                                <i class="icon-energy"></i>
                                <span>
                                <p>{{ _mt($moduleId,'Payout.Processed') }}</p>{{ currency($approved) }}
                            </span>
                            </div>
                            <div class="pending">
                                <i class="icon-envelope"></i>
                                <span>
                                <p>{{ _mt($moduleId,'Payout.Pending') }}</p>{{ currency($pending) }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div data-unit="manualPayout"
                         class="singleNav">
                        <h3>
                            <i class="fa fa-exchange"></i>{{ _mt($moduleId,'Payout.Manual_Payout') }}
                        </h3>
                        {{--<div class="payoutAmount">--}}
                        {{--<div class="processed">--}}
                        {{--<i class="icon-energy"></i>--}}
                        {{--<span>--}}
                        {{--<p>{{ _mt($moduleId,'Payout.Processed') }}</p>--}}
                        {{--<span> {{ currency($approved) }} </span>--}}
                        {{--</span>--}}
                        {{--</div>--}}
                        {{--<div class="pending">--}}
                        {{--<i class="icon-envelope"></i>--}}
                        {{--<span>--}}
                        {{--<p>{{ _mt($moduleId,'Payout.Pending') }}</p>{{ currency($pending) }}--}}
                        {{--</span>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
            <div class="secondSection col-md-8">
                <div class="payoutPanel row"></div>
            </div>
        </div>
    </div>
    <script>
        "use strict";
        //Document ready scripts
        $(function () {
            updateProcessed();
            initPayoutGraph();
            //Select2
            $('.select2').select2({
                width: '100%'
            });
            //Load unit
            loadUnit($('.singleNav.active').attr('data-unit'));
        });

        //nav functionality
        $('.singleNav').click(function () {
            $(this).addClass('active').siblings().removeClass('active');
            loadUnit($(this).attr('data-unit'))
        });

        function updateProcessed() {
            $.post('{{ route(strtolower(getScope()).'.payout.manual.processed') }}', '', function (response) {

                var options = {
                    useEasing: true,
                    useGrouping: true,
                    separator: ',',
                    decimal: '.',
                    formattingFn: function (number) {
                        return '$' + number;
                    },
                };

                /* var counter = new CountUp("balanceAmount", Number($('#balanceAmount').attr('data-amount')), response, 0, 2.5, options);
                 counter.start();*/

            });
        }

        //Ajax info retrieval
        function loadUnit(unit, elem, route, args, postParams) {
            var options = {unit: unit, args: args};
            elem = elem ? jQuerize(elem) : $('.payoutPanel');
            simulateLoading(elem);
            route = route ? route : '{{ route(strtolower(getScope()).".payout.unit") }}';
            if (postParams) $.extend(options, postParams);

            return $.post(route, options, function (response) {
                elem.html(response);
            });
        }

        //Payout stat graph
        function initPayoutGraph() {
            google.charts.load('current', {'packages': ['corechart']});
            google.charts.setOnLoadCallback(drawChart);
        }

        //Draw chart
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Year', 'Requests', 'Payouts'],
                ['2015', 1000, 400],
                ['2016', 1170, 460],
                ['2017', 660, 1120],
                ['2018', 1030, 540]
            ]);

            var options = {
                title: 'Payout status',
                curveType: 'function',
                legend: {position: 'bottom'}
            };

            var chart = new google.visualization.LineChart(document.getElementById('payoutGraph'));

            chart.draw(data, options);
        }
    </script>
    <style>
        .payoutPanel.row .filters.row {
            margin: 0px;
            margin-top: 15px !important;
            margin-bottom: 15px !important;
        }

        .payoutPanel.row .eachFilter.operation select {
            display: block;
            padding: 4px;
            border: 1px solid #ddd;
            width: 100%;
        }

        .payoutPanel.row .eachFilter.operation input[type="text"] {
            padding: 5px;
            border: 1px solid #ddd;
            width: 100%;
        }

        .payoutWrapper.row button.filterRequest {
            margin: 30px 0px 0px 0px;
        }

        .payoutAmount .pending i {
            padding-top: 11px;
        }
    </style>
@endsection
