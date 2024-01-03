<div class="heading">
    <h3>{{ _t('member.commissions') }}</h3>
    <div class="commissionWrapper row" data-user="{{ $user->id }}" style="margin-right: 0px;">
        <div class="col-md-3 col-sm-3 managementNav">
            @foreach($commissions as $commission)
                <div class="eachCommission @if ($loop->first) active @endif"
                     data-commission="{{ $commission->moduleId }}">
                    <i class="icon-graph"></i>{{ $commission->registry['name'] }}
                </div>
            @endforeach
        </div>
        <div class="commissionHolder col-md-9 col-sm-9">
            @foreach($commissions as $commission)
                <div class="commissionPanel @if ($loop->first) active @endif"
                     data-commission="{{ $commission->moduleId }}">
                    <div class="section summary">
                        <h4>{{ $commission->registry['name'] }} {{ _t('member.summary') }}</h4>
                        <div class="sectionRow row">
                            <div class="stats col-md-5">
                                <div class="credited">
                                    <i class="icon-check"></i>{{ _t('member.credited') }}
                                    <span>{{ currency($commission->data['credited']['amount']) }}</span>
                                    <div class="txns">
                                        <i class="fa fa-caret-down"></i>
                                        ({{ _t('member.total') }}
                                        <span>{{ $commission->data['credited']['txn']->count() }}</span> {{ _t('member.txns') }}
                                        )
                                    </div>
                                    @if($commission->data['credited']['txn']->count())
                                        <div class="lastTxn">
                                            {{ _t('member.last_txn') }} <span class="txnInfo"><i
                                                        class="txnId">#{{ $commission->data['credited']['txn']->last()->id }}</i> {{ _t('member.on') }} {{ $commission->data['credited']['txn']->last()->created_at->diffForHumans() }}</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="pending">
                                    <i class="icon-clock"></i> {{ _t('member.pending') }}
                                    <span>{{ currency($commission->data['pending']['amount']) }}</span>
                                    <div class="txns">
                                        <i class="fa fa-caret-down"></i>
                                        ({{ _t('member.total') }}
                                        <span>{{ $commission->data['pending']['txn']->count() }}</span> {{ _t('member.txns') }}
                                        )
                                    </div>
                                    @if($commission->data['pending']['txn']->count())
                                        <div class="lastTxn">
                                            {{ _t('member.last_txn') }} <span class="txnInfo"><i
                                                        class="txnId">#{{ $commission->data['pending']['txn']->last()->id }}</i> {{ _t('member.on') }} {{ $commission->data['pending']['txn']->last()->created_at->diffForHumans() }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="graphData col-md-7" data-commission="{{ $commission->moduleId }}">
                                <div class="graphHolder pieChart"></div>
                                <div class="graphHolder columnChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<script type="text/javascript">
    "use strict";

    $(function () {
        var graph = {};

        @foreach($commissions as $commission)
            graph[{{ $commission->moduleId }}] = {
            credited: {{ $commission->data['credited']['amount'] }},
            pending: {{ $commission->data['pending']['amount'] }},
            total: {{ $commission->data['pending']['amount'] + $commission->data['credited']['amount'] }},
            creditedGraph: {!! $commission->data['credited']['graph'] !!},
            pendingGraph: {!! $commission->data['pending']['graph'] !!}
        };
        @endforeach

        $('.managementNav .eachCommission').click(function () {
            var commissionId = $(this).attr('data-commission');
            $(this).addClass('active').siblings().removeClass('active');
            var target = $('.commissionHolder .commissionPanel[data-commission="' + commissionId + '"]');
            target.addClass('active').siblings().removeClass('active');

            if ($(this).hasClass('graphInitialized')) return true;

            $('.commissionWrapper[data-user="{{ $user->id }}"] .graphData[data-commission="' + commissionId + '"] .graphHolder.pieChart').highcharts({
                chart: {
                    type: 'pie',
                    height: 200,
                    options3d: {
                        enabled: true,
                        alpha: 45
                    }
                },
                title: {
                    text: "{{ _t('member.credited_vs_pending') }}"
                },
                plotOptions: {
                    pie: {
                        innerSize: 30,
                        depth: 20
                    }
                },
                series: [{
                    name: "{{ _t('member.credited_vs_pending') }}",
                    data: [
                        ['Credited', Math.round((graph[commissionId]['credited'] / graph[commissionId]['total']) * 100)],
                        ['Pending', Math.round((graph[commissionId]['pending'] / graph[commissionId]['total']) * 100)]
                    ]
                }]
            });

            $('.commissionWrapper[data-user="{{ $user->id }}"] .graphData[data-commission="' + commissionId + '"] .graphHolder.columnChart').highcharts({
                chart: {
                    type: 'areaspline',
                    height: 220
                },
                title: {
                    text: ''
                },
                legend: {
                    layout: 'vertical',
                    align: 'left',
                    verticalAlign: 'top',
                    x: 150,
                    y: 20,
                    floating: true,
                    borderWidth: 1,
                    backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
                },
                xAxis: {
                    type: 'category',
                    plotBands: [{ // visualize the weekend
                        from: 4.5,
                        to: 6.5,
                        color: 'rgba(68, 170, 213, .2)'
                    }]
                },
                yAxis: {
                    title: {
                        text: "{{ _t('member.commission_in') }}" + '$'
                    }
                },
                tooltip: {
                    shared: true,
                    valueSuffix: ' units'
                },
                credits: {
                    enabled: false
                },
                plotOptions: {
                    areaspline: {
                        fillOpacity: 0.5
                    }
                },
                series: [{
                    name: "{{ _t('member.credited') }}",
                    data: graph[commissionId]['creditedGraph']
                }, {
                    name: "{{ _t('member.pending') }}",
                    data: graph[commissionId]['pendingGraph']
                }]
            });

            $(this).addClass('graphInitialized');
        });

        $('.commissionWrapper[data-user="{{ $user->id }}"] .managementNav .eachCommission').first().trigger('click');
    });
</script>
