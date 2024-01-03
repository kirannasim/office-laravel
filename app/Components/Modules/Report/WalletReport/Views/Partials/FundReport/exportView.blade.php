{{--@include('Report.WalletReport.Views.Partials.reportHeader')--}}
@if($fundData->count())
    <table>
        <thead>
        <tr>
            <th> {{ _mt($moduleId,'WalletReport.sl_no') }}</th>
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
                <td> {{ $fund->metaData->firstname }} </td>
                <td> {{ $fund->metaData->lastname }} </td>
                <td> {{ $fund->wallet["$walletSlug"]['balance'] }} </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    {{ _mt($moduleId,'WalletReport.no_users') }}
@endif
