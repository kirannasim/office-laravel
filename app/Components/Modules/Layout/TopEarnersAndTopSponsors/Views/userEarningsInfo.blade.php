<div class="earningsInfoHolder">
    <div class="earningsChartHolder"></div>
    @if(strtolower(getScope()) == 'admin')
        <div class="earnedAmount">
            {{ _mt($moduleId, 'TopEarnersAndTopSponsors.total_earned') }}
            <span>{{ prettyCurrency($earnedAmount) }}</span>
            <button class="btn btn-circle green btn-outline btn-sm">{{ _mt($moduleId, 'TopEarnersAndTopSponsors.total_earned') }}</button>
        </div>
        <div class="commissionDetails">
            @forelse($transactions as $transaction)
                <div class="commission">
                    <label>{{ $transaction[0] }}</label>
                    <span class="amount">{{ prettyCurrency($transaction[1]) }}</span>
                </div>
            @empty
                <div class="noCommissions">{{ _mt($moduleId, 'TopEarnersAndTopSponsors.no_data_found') }}</div>
            @endforelse
        </div>
    @endif
</div>
<script>
    "use strict";

    function setupEarningsGraph(element) {
        jQuerize(element).highcharts({
            chart: {
                height: 330,
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45
                }
            },
            title: {
                text: "{{ _mt($moduleId, 'TopEarnersAndTopSponsors.total_earned') }} {{ $user->username }}"
            },
            plotOptions: {
                pie: {
                    innerSize: 50,
                    depth: 30
                }
            },
            series: [{
                name: "{{ _mt($moduleId, 'TopEarnersAndTopSponsors.earned_amount') }}",
                data: JSON.parse('{!! json_encode($transactions) !!}')
            }]
        });
    }

    $(function () {
        setupEarningsGraph('.earningsChartHolder');
        $('.earnersAndSponsors .userDetailsPane .innerHolder').css('min-height', $('.topEarnersListPane .innerHolder').height());
    });

    $('.earnedAmount button').click(function () {
        $('.earningsInfoHolder .commissionDetails').slideToggle();
    });
</script>