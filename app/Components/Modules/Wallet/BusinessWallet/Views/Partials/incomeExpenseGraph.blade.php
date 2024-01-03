<div class="incomeChart " id="incomeChart"></div>

<script type="text/javascript">
    "use strict";

    jQuery(document).ready(function () {
        // HIGHCHARTS DEMOS

        // LINE CHART 1
        $('#incomeChart').highcharts({
            chart: {
                style: {
                    fontFamily: 'Open Sans',
                    fontSize: 15
                }
            },
            title: {
                text: "{{_mt($moduleId,'BusinessWallet.income_expense_overview') }}",
                x: -20 //center
            },
            /*		subtitle: {
                        text: 'Based on variouse source',
                        x: -20
                    },*/
            xAxis: {
                type: 'category',
                categories: {!! json_encode($xAxises) !!}
            },
            yAxis: {
                title: {
                    text: "{{_mt($moduleId,'BusinessWallet.income_expense') }}",
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: '$'
            },
            legend: {
                layout: 'vertical',
                align: 'left',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: "{{_mt($moduleId,'BusinessWallet.income') }}",
                type: 'column',
                data: JSON.parse('{!! json_encode($monthlyIncome) !!}')
            }, {
                name: "{{_mt($moduleId,'BusinessWallet.expense') }}",
                type: 'column',
                data: JSON.parse('{!! json_encode($monthlyExpense) !!}')
            }]
        });
        //Switch tabs
        $('.walletOverview .navUl li').hover(function () {
            $(this).addClass('active').siblings().removeClass('active');
        }, function () {
            $(this).removeClass('active').siblings().removeClass('active');
        });
        //Load partials
        $('body').off('click', '.walletOverview .navUl li').on('click', '.walletOverview .navUl li', function () {
            var me = $(this);
            $('.subPartials').attr('data-unit', $(this).attr('data-unit'));
            refreshAjaxData($('.subPartials'));
        });
    });
</script>