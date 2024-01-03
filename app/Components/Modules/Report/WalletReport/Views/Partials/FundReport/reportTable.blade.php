@if($fundData->count())
    <div class="reportOptions">
        <button type="button" class="btn btn-outline blue downloadPdf"><i
                    class="fa fa-file-pdf-o"></i>{{ _mt($moduleId,'WalletReport.pdf') }}</button>
        <button type="button" class="btn btn-outline green downloadExcel"><i
                    class="fa fa-file-excel-o"></i>{{ _mt($moduleId,'WalletReport.excel') }}</button>
        <button type="button" class="btn btn-outline red downloadCsv"><i
                    class="fa fa-file-text-o"></i>{{ _mt($moduleId,'WalletReport.csv') }}</button>
        <button type="button" class="btn btn-outline dark printReport"><i
                    class="fa fa-print"></i>{{ _mt($moduleId,'WalletReport.print') }}</button>
    </div>
    <table class="table table-striped table-bordered table-hover dataTable dtr-inline reporttable" role="grid"
           aria-describedby="sample_1_info" style="width: 100%;">
        <thead>
        <tr>
            <th>{{ _mt($moduleId,'WalletReport.sl_no') }}</th>
            <th> {{ _mt($moduleId,'WalletReport.user') }}</th>
            <th> {{ _mt($moduleId,'WalletReport.firstname') }}</th>
            <th> {{ _mt($moduleId,'WalletReport.lastname') }}</th>
            <th> {{ _mt($moduleId,'WalletReport.balance') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($fundData as $fund)
            <tr>
                <td> {{ $loop->iteration }} </td>
                <td> {{ $fund->username }} </td>
                <td> {{ $fund->metaData ? $fund->metaData->firstname : 'NA' }} </td>
                <td> {{ $fund->metaData ? $fund->metaData->lastname : 'NA' }} </td>
                <td> € {{ number_format(getModule('Wallet-'.ucfirst($walletSlug))->getBalance($fund),2,'.','.' )}} </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="paginationWrapper">
        {!! $fundData->links() !!}
    </div>
@else
    {{ _mt($moduleId,'WalletReport.no_data_found') }}
@endif
<script type="text/javascript">
    'use strict';

    $('.paginationWrapper .pagination li a').click(function (e) {
        e.preventDefault();
        var route = $(this).attr('href');
        fetchFundData(route);
    });

    // Download report as pdf
    $('.downloadPdf').click(function () {
        $.post('{{ route(strtolower(getScope()).'.walletReport.fundReport.download.pdf') }}', $('.filterForm').serialize(), function (response) {
            window.open(response.link);
        });
    });

    // Download report as Excel
    $('.downloadExcel').click(function () {
        $.post('{{ route(strtolower(getScope()).'.walletReport.fundReport.download.excel') }}', $('.filterForm').serialize(), function (response) {
            window.open(response.link);
        });
    });

    // Download report as csv
    $('.downloadCsv').click(function () {
        $.post('{{ route(strtolower(getScope()).'.walletReport.fundReport.download.csv') }}', $('.filterForm').serialize(), function (response) {
            window.open(response.link);
        });
    });

    // print report
    $('.printReport').click(function () {
        $.post('{{ route(strtolower(getScope()).'.walletReport.fundReport.print') }}', $('.filterForm').serialize(), function (response) {
            var HTML = response;

            var WindowObject = window.open("", "PrintWindow", "width=750,height=650,top=50,left=50,toolbars=no,scrollbars=yes,status=no,resizable=yes");
            WindowObject.document.writeln(HTML);
            WindowObject.document.close();
            WindowObject.focus();
            WindowObject.print();
            WindowObject.close();
        });
    });
</script>