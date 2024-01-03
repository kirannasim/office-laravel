@include('Common.Partials.reportHeader')
@if($changedPositionData->count())
    <table>
        <thead>
        <tr>
            <th>{{ _mt($moduleId,'BinaryPositionSelector.sl_no') }}</th>
            <th> {{ _mt($moduleId,'BinaryPositionSelector.user') }}</th>
            <th> {{ _mt($moduleId,'BinaryPositionSelector.from') }}</th>
            <th> {{ _mt($moduleId,'BinaryPositionSelector.to') }}</th>
            <th> {{ _mt($moduleId,'BinaryPositionSelector.date') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($changedPositionData as $data)
            <tr>
                <td> {{ $loop->iteration }} </td>
                <td> {{ usernameFromId($data->user_id) }} </td>
                <td> {{ usernameFromId($data->from_selector) }} </td>
                <td> {{ usernameFromId($data->to_selector) }} </td>
                <td> {{ date('Y-m-d',strtotime($data->created_at)) }} </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    {{ _mt($moduleId,'BinaryPositionSelector.no_position_changes') }}
@endif