@foreach($scripts as $script)
    <script type="text/javascript" src="{{ $script }}"></script>
@endforeach
<!-- BEGIN CHART PORTLET-->
<div class="portlet light bordered payInOutChart">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-bar-chart font-green-haze"></i>
            <span class="caption-subject bold uppercase font-green-haze"> {{_mt($moduleId,'IPayWallet.pay_in_out_diagram') }}</span>
        </div>
    </div>
    <div class="portlet-body">
        <div id="chart_7" class="chart"></div>
    </div>
</div>

<script>
    var ChartsAmcharts = function () {

        var initPieChart = function () {
            var chart = AmCharts.makeChart("chart_7", {
                "type": "pie",
                "theme": "light",
                "fontFamily": 'Open Sans',
                "color": '#888',
                "dataProvider": [{
                    "name": "{{_mt($moduleId,'IPayWallet.pay_in') }}",
                    "amount": '{{$payIn}}',
                    "color": '#d4dc5a'
                }, {
                    "name": "{{_mt($moduleId,'IPayWallet.payout') }}",
                    "amount": '{{ $payOut }}',
                    "color": '#6ae6ec'
                }],
                "valueField": "amount",
                "titleField": "name",
                "colorField": "color",
                "outlineAlpha": 0.4,
                "depth3D": 15,
                "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
                "angle": 30,
                "exportConfig": {}
            });
        };

        return {
            //main function to initiate the module

            init: function () {
                initPieChart();
            }
        };
    }();

    jQuery(document).ready(function () {
        ChartsAmcharts.init();
    });
</script>