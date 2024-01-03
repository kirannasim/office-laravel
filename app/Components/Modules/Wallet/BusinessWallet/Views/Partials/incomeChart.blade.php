@foreach($scripts as $script)
    <script type="text/javascript" src="{{ $script }}"></script>
@endforeach
<div class="incomeChart admin" id="incomeChart"></div>
<script type="text/javascript">
    "use strict";

    jQuery(document).ready(function () {
        // LINE CHART 1
        $('#incomeChart').highcharts({
            chart: {
                style: {
                    fontFamily: 'Open Sans',
                    fontSize: 15
                }
            },
            title: {
                text: "{{_mt('Wallet-BusinessWallet','BusinessWallet.payment_received') }}",
                x: -20 //center
            },
            /*		subtitle: {
                        text: 'Based on variouse source',
                        x: -20
                    },*/
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
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
                valueSuffix: "{{ _mt('Wallet-BusinessWallet','BusinessWallet.amount_received') }}"
            },
            legend: {
                layout: 'vertical',
                align: 'left',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'income',
                data: '{!! json_encode($monthlyIncome) !!}'
            }, {
                name: 'expense',
                data: '{!! json_encode($monthlyExpense) !!}'
            }]
        });
    });
</script>