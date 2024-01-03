@include('Report.JoiningReport.Views.Partials.reportHeader')
@if($joiningData->count())
    <table>
        <thead>
        <tr>
            <th style="width: 50px;"> {{ _mt($moduleId, 'JoiningReport.sl_no') }}</th>
            <th style="width: 98px;"> {{ _mt($moduleId, 'JoiningReport.username') }}</th>
            <th style="width: 96px;"> {{ _mt($moduleId, 'JoiningReport.firstname') }}</th>
            <th style="width: 95px;"> {{ _mt($moduleId, 'JoiningReport.lastname') }}</th>
            <th style="width: 75px;"> {{ _mt($moduleId, 'JoiningReport.sponsor') }}</th>
            <th style="width: 163px;"> {{ _mt($moduleId, 'JoiningReport.email') }}</th>
            <th style="width:107px;"> {{ _mt($moduleId, 'JoiningReport.joining_date') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($joiningData as $user)
            <tr>
                <td> {{ $loop->iteration }} </td>
                <td> {{ $user->username }} </td>
                <td> {{ $user->metaData->firstname }} </td>
                <td> {{ $user->metaData->lastname }} </td>
                <td> {{ usernameFromId($user->repoData['sponsor_id']) }} </td>
                <td> {{ $user->email }} </td>
                <td> {{ date('Y-m-d',strtotime($user->created_at)) }} </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    {{ _mt($moduleId, 'JoiningReport.No_Joinings_found') }}
@endif
