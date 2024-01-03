<div class="basicProfile">
    <ul class="profileTab">
        <li class="active" data-target="profile">Profile</li>
        {{-- <li data-target="accounts">Accounts</li>--}}
    </ul>
    <div class="panel active" data-target="profile">
        <div class="eachData">
            <label>{{ _mt($moduleId,'payout.username') }}</label>
            <span class="value">{{ $user->username }}</span>
        </div>
        <div class="eachData">
            <label>{{ _mt($moduleId,'payout.full_name') }}</label>
            <span class="value">{{ $user->metaData->firstname . ' ' . $user->metaData->lastname }}</span>
        </div>
        @if($user->sponsor())
            <div class="eachData sponsor">
                <label>{{ _mt($moduleId,'payout.sponsor') }}</label>
                <span class="value">{{ $user->sponsor()->username }}</span>
            </div>
        @endif
        @if($user->parent())
            <div class="eachData sponsor">
                <label>{{ _mt($moduleId,'payout.parent') }}</label>
                <span class="value">{{ $user->parent()->username }}</span>
            </div>
        @endif
        <div class="eachData">
            <label>{{ _mt($moduleId,'payout.email') }}</label>
            <span class="value">{{ $user->email }}</span>
        </div>
        @if($user->telephone)
            <div class="eachData">
                <label>{{ _mt($moduleId,'payout.telephone') }}</label>
                <span class="value">{{ $user->telephone }}</span>
            </div>
        @endif
    </div>
    <div class="panel" data-target="accounts">
        <div class="payoutSummary" id="payoutSummary_{{ $user->id }}"></div>
        <div class="balance">
            <label>{{ _mt($moduleId,'payout.balance') }}</label>{{ currency(252) }}
        </div>
        <div class="withDrawn">
            <label>{{ _mt($moduleId,'payout.withdrawn') }}</label>{{ currency(10) }}
        </div>
    </div>
</div>

<script>
    "use strict";
    $(function () {
        $('.basicProfile ul.profileTab li').click(function () {
            $(this).addClass('active').siblings().removeClass('active');
            $('.basicProfile .panel[data-target="' + $(this).attr('data-target') + '"]')
                .addClass('active').siblings().removeClass('active');
        });
        // progress circle
        google.charts.load("current", {packages: ["corechart"]});
        google.charts.setOnLoadCallback(drawProfileWalletChart);
    });

    function drawProfileWalletChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Balance', 40],
            ['Payout', 60],
        ]);

        var options = {
            title: 'Balance vs payout',
            pieHole: 0.2,
            fontSize: 11,
            width: 180,
            height: 180,
            chartArea: {
                width: '80%'
            },
            is3D: true,
            legend: {
                position: 'labeled',
                textStyle: {color: '#241717', fontSize: 10},
                alignment: 'bottom'
            }
        };

        var chart = new google.visualization.PieChart(document.getElementById('payoutSummary_{{ $user->id }}'));
        chart.clearChart();
        chart.draw(data, options);
    }
</script>

<style>
    .payoutSummary {
        margin: auto;
        width: 180px;
        height: 180px;
    }
</style>
