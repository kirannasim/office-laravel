@include('Common.partial.reportHeader')

@if($accountStatusData->count())
    <table>
        <thead>
        <tr>
            <th>{{ _mt($moduleId,'AccountStatus.sl_no') }}</th>
            <th> {{ _mt($moduleId,'AccountStatus.user') }}</th>
            <th> {{ _mt($moduleId,'AccountStatus.status') }}</th>
            <th> {{ _mt($moduleId,'AccountStatus.login') }}</th>
            <th> {{ _mt($moduleId,'AccountStatus.commission') }}</th>
            <th> {{ _mt($moduleId,'AccountStatus.payout') }}</th>
            <th> {{ _mt($moduleId,'AccountStatus.fund_transfer') }}</th>

        </tr>
        </thead>
        <tbody>
        @foreach($accountStatusData as $statusData)
            <tr>
                <td> {{ $loop->iteration }} </td>
                <td> {{ usernameFromId($statusData->user_id) }} </td>
                <td> {{ $statusData->title }} </td>
                <td> @if(checkAccess($statusData->user_id,'login')) {{ _mt($moduleId,'AccountStatus.enabled') }} @else {{ _mt($moduleId,'AccountStatus.disabled') }} @endif </td>
                <td> @if(checkAccess($statusData->user_id,'commission')) {{ _mt($moduleId,'AccountStatus.enabled') }} @else {{ _mt($moduleId,'AccountStatus.disabled') }} @endif </td>
                <td> @if(checkAccess($statusData->user_id,'payout')) {{ _mt($moduleId,'AccountStatus.enabled') }} @else {{ _mt($moduleId,'AccountStatus.disabled') }} @endif </td>
                <td> @if(checkAccess($statusData->user_id,'fund_transfer')) {{ _mt($moduleId,'AccountStatus.enabled') }} @else {{ _mt($moduleId,'AccountStatus.disabled') }} @endif </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    {{ _mt($moduleId,'AccountStatus.status_not_available') }}
@endif
