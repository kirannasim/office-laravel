<div name="highchart_1" id="highchart_1"></div>

<script>
    $(function () {
        console.log(JSON.parse('{!! json_encode($referrals) !!}'));
        $('#highchart_1').highcharts({
            chart: {
                height: 180,
                style: {
                    fontFamily: 'Open Sans'
                }
            },
            title: {
                text: '',
                x: -20 //center
            },
            subtitle: {
                text: '',
                x: -20
            },
            xAxis: {
                categories: JSON.parse('{!! json_encode($xAxises) !!}')
            },
            yAxis: {
                title: {
                    text: ''
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: ''
            },
            legend: false,
            series: [{
                name: 'Referrals',
                type: 'column',
                data: JSON.parse('{!! json_encode($referrals) !!}')
            }]
        });
    });
</script>
<style>
    text.highcharts-credits {
        display: none;
    }
</style>
