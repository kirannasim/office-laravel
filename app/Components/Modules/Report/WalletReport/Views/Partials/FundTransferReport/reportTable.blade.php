@inject('moduleService', 'App\Blueprint\Services\ModuleServices')
@if($fundTransferData->count())
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
            <th> {{ _mt($moduleId,'WalletReport.payer') }}</th>
            <th> {{ _mt($moduleId,'WalletReport.payee') }}</th>
            <th> {{ _mt($moduleId,'WalletReport.from') }}</th>
            <th> {{ _mt($moduleId,'WalletReport.to') }}</th>
            <th> {{ _mt($moduleId,'WalletReport.amount') }}</th>
            <th> {{ _mt($moduleId,'WalletReport.date') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($fundTransferData as $fundTransfer)
            <tr>
                <td> {{ ($fundTransferData->currentPage() * $fundTransferData->perPage()) - $fundTransferData->perPage() + $loop->iteration }} </td>
                <td> {{ usernameFromId($fundTransfer->payer)  }} </td>
                <td> {{ usernameFromId($fundTransfer->payee) }} </td>
                <td> {{ $moduleService->getModuleById($fundTransfer->Operation->from_module)->registry['name'] }} </td>
                <td> {{ $moduleService->getModuleById($fundTransfer->Operation->to_module)->registry['name'] }} </td>
                <td> {{ currency($fundTransfer->amount) }} </td>
                <td> {{ date('Y-m-d',strtotime($fundTransfer->created_at)) }} </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="paginationWrapper">
        {!! $fundTransferData->links() !!}
    </div>
@else
    {{ _mt($moduleId,'WalletReport.no_fund_transfer') }}
@endif
<script type="text/javascript">
    'use strict';
    $('.paginationWrapper .pagination li a').click(function (e) {
        e.preventDefault();
        var route = $(this).attr('href');
        fetchFundTransferData(route);
    });

    // Download report as pdf
    $('.downloadPdf').click(function () {
        $.post('{{ route(strtolower(getScope()).'.walletReport.FundTransferReport.download.pdf') }}', $('.filterForm').serialize(), function (response) {
            window.open(response.link);
        });
    });

    // Download report as Excel
    $('.downloadExcel').click(function () {
        $.post('{{ route(strtolower(getScope()).'.walletReport.FundTransferReport.download.excel') }}', $('.filterForm').serialize(), function (response) {
            window.open(response.link);
        });
    });

    // Download report as csv
    $('.downloadCsv').click(function () {
        $.post('{{ route(strtolower(getScope()).'.walletReport.FundTransferReport.download.csv') }}', $('.filterForm').serialize(), function (response) {
            window.open(response.link);
        });
    });

    // print report
    $('.printReport').click(function () {
        $.post('{{ route(strtolower(getScope()).'.walletReport.FundTransferReport.print') }}', $('.filterForm').serialize(), function (response) {
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