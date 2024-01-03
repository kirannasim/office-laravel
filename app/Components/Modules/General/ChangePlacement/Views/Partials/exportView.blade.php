@include('Common.partial.reportHeader')

@if($changedPlacementData->count())
    <table>
        <thead>
        <tr>
            <th>{{ _mt($moduleId,'ChangePlacement.sl_no') }}</th>
            <th> {{ _mt($moduleId,'ChangePlacement.user') }}</th>
            <th> {{ _mt($moduleId,'ChangePlacement.from') }}</th>
            <th> {{ _mt($moduleId,'ChangePlacement.to') }}</th>
            <th> {{ _mt($moduleId,'ChangePlacement.date') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($changedPlacementData as $placementData)
            <tr>
                <td> {{ $loop->iteration }} </td>
                <td> {{ usernameFromId($placementData->user_id) }} </td>
                <td> {{ usernameFromId($placementData->from_placement) }} </td>
                <td> {{ usernameFromId($placementData->to_placement) }} </td>
                <td> {{ date('Y-m-d',strtotime($placementData->created_at)) }} </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    {{ _mt($moduleId,'ChangePlacement.no_placement_changes') }}
@endif