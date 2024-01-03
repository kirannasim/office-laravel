@if($userData->count())
    <table class="table table-striped table-bordered table-hover dataTable dtr-inline reporttable" role="grid"
           aria-describedby="sample_1_info" style="width: 1028px;">
        <thead>
        <tr>
            <th> {{ _mt($moduleId, 'PersonalEnrollmentReport.sl_no') }}</th>
            <th> {{ _mt($moduleId, 'PersonalEnrollmentReport.username') }}</th>
            <th> {{ _mt($moduleId, 'PersonalEnrollmentReport.date') }}</th>

        </tr>
        </thead>
        <tbody>
        @foreach($userData as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td> {{ $user->user->username }} </td>
                <td> {{ date('y-m-d',strtotime($user->user->created_at)) }} </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <th> {{ _mt($moduleId, 'PersonalEnrollmentReport.no_users_found') }}</th>
@endif

