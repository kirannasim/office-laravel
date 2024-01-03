@php
    $filterLabels = [
                'today' => _mt($moduleId, 'TopEarnersAndTopSponsors.today'),
                'week' => _mt($moduleId, 'TopEarnersAndTopSponsors.this_week'),
                'month' => _mt($moduleId, 'TopEarnersAndTopSponsors.this_month'),
                'year' => _mt($moduleId, 'TopEarnersAndTopSponsors.this_year'),
                'all' => _mt($moduleId, 'TopEarnersAndTopSponsors.all_time')
            ];
@endphp
<div class="sponsorInfoWrapper">
    <div class="dropdown filterGroup filterGear dateFilter" data-block="wallets">
        <div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <i class="icon-settings"></i>
        </div>
        <ul class="dropdown-menu dropdown-menu-default pull-right">
            <li data-from="{{ \Carbon\Carbon::today() }}" data-filter="today" data-groupBy="hour"
                class="{{ ($filterBy == 'today') ? 'active' : '' }}">
                <a href="#"><i class="icon-calendar"></i> {{ _mt($moduleId, 'TopEarnersAndTopSponsors.today') }} </a>
            </li>
            <li data-from="{{ \Carbon\Carbon::now()->startOfWeek() }}" data-filter="week" data-groupBy="day"
                class="{{ ($filterBy == 'week') ? 'active' : '' }}">
                <a href="#"><i class="icon-calendar"></i> {{ _mt($moduleId, 'TopEarnersAndTopSponsors.this_week') }}
                </a>
            </li>
            <li data-from="{{ \Carbon\Carbon::now()->startOfMonth() }}" data-filter="month" data-groupBy="day"
                class="{{ ($filterBy == 'month') ? 'active' : '' }}">
                <a href="#"><i class="icon-calendar"></i> {{ _mt($moduleId, 'TopEarnersAndTopSponsors.this_month') }}
                </a>
            </li>
            <li data-from="{{ \Carbon\Carbon::now()->startOfYear() }}" data-filter="year" data-groupBy="month"
                class="{{ ($filterBy == 'year') ? 'active' : '' }}">
                <a href="#"><i class="icon-calendar"></i> {{ _mt($moduleId, 'TopEarnersAndTopSponsors.this_year') }}</a>
            </li>
            <li data-from="" data-filter="all" data-groupBy="year" class="{{ ($filterBy == 'all') ? 'active' : '' }}">
                <a href="#"><i class="icon-calendar"></i>{{ _mt($moduleId, 'TopEarnersAndTopSponsors.all_time') }}</a>
            </li>
        </ul>
    </div>
    <div class="referralStatsGraph"></div>
</div>

<script>
    "use strict";

    function setupReferralStatsGraph(elem, options) {
        var defaults = {
            chart: {
                zoomType: 'xy',
                height: 285,
            },
            title: {
                text: "{{ _mt($moduleId, 'TopEarnersAndTopSponsors.referral_report_for') }} {{ $user->username }}"
            },
            subtitle: {
                text: "{{ _mt($moduleId, 'TopEarnersAndTopSponsors.report_of') }} {{ $filterLabels[$filterBy] }}"
            },
            xAxis: [{
                type: "category",
                crosshair: true,
            }],
            yAxis: [{ // Primary yAxis
                labels: {
                    style: {
                        color: Highcharts.getOptions().colors[1]
                    }
                },
                title: {
                    text: "{{ _mt($moduleId, 'TopEarnersAndTopSponsors.total_referrals') }}",
                    style: {
                        color: Highcharts.getOptions().colors[1]
                    }
                }
            }],
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
                name: "{{ _mt($moduleId, 'TopEarnersAndTopSponsors.total_referrals') }}",
                type: 'column',
                data: JSON.parse('{!! json_encode($graph) !!}')
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        credits: {
                            enabled: false
                        }
                    },
                    legend: {
                        align: 'center',
                        verticalAlign: 'bottom',
                        layout: 'vertical',
                    }
                }]
            }
        };
        options = $.extend({}, defaults, options);
        jQuerize(elem).highcharts(options);
    }

    $('.sponsorInfoWrapper .filterGroup ul li').click(function (e) {
        e.preventDefault();
        var filters = {
            groupBy: $(this).data('groupby'),
            filterBy: $(this).data('filter'),
            fromDate: $(this).data('from')
        };
        getUnit('.userDetailsPane .innerHolder', 'sponsorInfo', {}, {userId: '{{ $user->id }}', filters: filters});
    });

    $(function () {
        setupReferralStatsGraph('.referralStatsGraph');
        $('.earnersAndSponsors .userDetailsPane .innerHolder').css('min-height', $('.earnersAndSponsors .userListPane').height());
    });
</script>