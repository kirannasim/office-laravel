@if($rankedUsersData->count())
    <table class="table table-striped table-bordered table-hover dataTable dtr-inline reporttable" role="grid"
           aria-describedby="sample_1_info" style="width: 1028px;">
        <thead>
        <tr>
            <th> {{ _mt($moduleId, 'IBEnroleeReport.sl_no') }}</th>
            <th> {{ _mt($moduleId, 'IBEnroleeReport.rank_name') }}</th>
            <th> {{ _mt($moduleId, 'IBEnroleeReport.count') }}</th>

        </tr>
        </thead>
        <tbody>
        @foreach($rankedUsersData as $rank)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td> {{ $rank->rank->rank->name }} </td>
                <td> {{ $rank->total }} </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <th> {{ _mt($moduleId, 'IBEnroleeReport.no_ranked_users') }}</th>
@endif

