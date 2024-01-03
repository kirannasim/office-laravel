@include('Common.partial.reportHeader')

@if($accountHistoryData->count())
    <table>
        <thead>
        <tr>
            <th>{{ _mt($moduleId,'AccountStatus.sl_no') }}</th>
            <th> {{ _mt($moduleId,'AccountStatus.user') }}</th>
            <th> {{ _mt($moduleId,'AccountStatus.status') }}</th>
            <th> {{ _mt($moduleId,'AccountStatus.date') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($accountHistoryData as $historyData)
            <tr>
                <td> {{ $loop->iteration }} </td>
                <td> {{ usernameFromId($historyData->user_id) }} </td>
                <td> {{ $historyData->status }} </td>
                <td> {{ $historyData->created_at }} </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    {{ _mt($moduleId,'AccountStatus.no_account_history') }}
@endif
