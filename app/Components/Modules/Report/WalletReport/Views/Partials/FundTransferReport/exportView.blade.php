{{--@include('Report.WalletReport.Views.Partials.reportHeader')--}}
@inject('moduleService', 'App\Blueprint\Services\ModuleServices')
@if($fundTransferData->count())
    <table>
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
                <td> {{ $loop->iteration }} </td>
                <td> {{ $fundTransfer->payerUser->username }} </td>
                <td> {{ $fundTransfer->payeeUser->username }} </td>
                <td> {{ $moduleService->getModuleById($fundTransfer->Operation->from_module)->registry['name'] }} </td>
                <td> {{ $moduleService->getModuleById($fundTransfer->Operation->to_module)->registry['name'] }} </td>
                <td> {{ $fundTransfer->amount }} </td>
                <td> {{ date('Y-m-d',strtotime($fundTransfer->created_at)) }} </td>

            </tr>
        @endforeach
        </tbody>
    </table>
@else
    {{ _mt($moduleId,'WalletReport.no_fund_transfer') }}
@endif
