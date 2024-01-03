@include('Report.JoiningReport.Views.Partials.reportHeader')
@if($payoutReleasedData->count())
    <table class="table ">
        <thead>
        <tr>
            <th> {{ _mt($moduleId,'Payout.sl_no') }}</th>
            <th> {{ _mt($moduleId,'Payout.user') }}</th>
            <th> {{ _mt($moduleId,'Payout.amount') }}</th>
            <th> {{ _mt($moduleId,'Payout.date') }}</th>

        </tr>
        </thead>
        <tbody>
        @foreach($payoutReleasedData as $payout)
            <tr>
                <td> {{ $loop->iteration }} </td>
                <td> {{ usernameFromId($payout->payer) }} </td>
                <td> {{ $payout->amount }} </td>
                <td> {{ date('Y-m-d',strtotime($payout->created_at)) }} </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    {{ _mt($moduleId,'payout.no_payout_released') }}
@endif
