@inject('moduleService', 'App\Blueprint\Services\ModuleServices')
@include('Report.JoiningReport.Views.Partials.reportHeader')
@if($payoutRequestData->count())
    <table>
        <thead>
        <tr>
            <th> {{ _mt($moduleId,'Payout.sl_no') }}</th>
            <th> {{ _mt($moduleId,'Payout.user') }}</th>
            <th> {{ _mt($moduleId,'Payout.amount_requested') }}</th>
            <th> {{ _mt($moduleId,'Payout.amount_released') }}</th>
            <th> {{ _mt($moduleId,'Payout.wallet') }}</th>
            <th> {{ _mt($moduleId,'Payout.status') }}</th>
            <th> {{ _mt($moduleId,'Payout.date') }}</th>

        </tr>
        </thead>
        <tbody>
        @foreach($payoutRequestData as $payoutRequest)
            <tr>
                <td> {{ $loop->iteration }} </td>
                <td> {{ usernameFromId($payoutRequest->user_id) }} </td>
                <td> {{ $payoutRequest->request_amount }} </td>
                <td> {{ $payoutRequest->release_amount }} </td>
                <td> {{ $moduleService->getModuleById($payoutRequest->wallet)->registry['name'] }} </td>
                <td> {{ $payoutRequest->status }} </td>
                <td> {{ date('Y-m-d',strtotime($payoutRequest->created_at)) }} </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    {{ _mt($moduleId,'payout.no_payout_request') }}
@endif
