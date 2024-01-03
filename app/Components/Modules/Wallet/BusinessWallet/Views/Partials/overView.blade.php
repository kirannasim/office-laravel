<div class="walletOverview col-md-12">
    @foreach($scripts as $script)
        <script type="text/javascript" src="{{ $script }}"></script>
    @endforeach
    <div class="navWrapper">
        <ul class="navUl">
            <li data-unit="incomeChart">
                <i class="icon-eye"></i>
                <p>{{_mt($moduleId,'BusinessWallet.income_expense_overview') }}</p>
            </li>
            <li data-unit="transactionList">
                <i class="icon-wallet"></i>
                <p>{{_mt($moduleId,'BusinessWallet.transactions') }}</p>
            </li>
            <li data-unit="payInOutChart">
                <i class="icon-bar-chart"></i>
                <p>{{_mt($moduleId,'BusinessWallet.io_graph') }}</p>
            </li>
        </ul>
    </div>
    <div class="subPartials"></div>
</div>

<script type="text/javascript">
    "use strict";

    function loadIncomeChart() {
        simulateLoading('.subPartials');
        $('.subPartials').attr('data-unit', 'incomeChart');
        refreshAjaxData($('.subPartials'));
    }

    $(function () {
        loadIncomeChart();
    });
</script>