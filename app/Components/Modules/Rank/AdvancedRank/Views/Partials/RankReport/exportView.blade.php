@include('Report.JoiningReport.Views.Partials.reportHeader')
@if($rankData->count())
    <table>
        <thead>
        <tr>
            <th>{{ _mt($moduleId,'AdvancedRank.sl_no') }}</th>
            <th> {{ _mt($moduleId,'AdvancedRank.user') }}</th>
            <th> {{ _mt($moduleId,'AdvancedRank.firstname') }}</th>
            <th> {{ _mt($moduleId,'AdvancedRank.lastname') }}</th>
            <th> {{ _mt($moduleId,'AdvancedRank.rank') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rankData as $eachRank)
            <tr>
                <td> {{ $loop->iteration }} </td>
                <td> {{ usernameFromId($eachRank->user_id) }} </td>
                <td> {{ $eachRank->user->metaData ? $eachRank->user->metaData->firstname : '' }} </td>
                <td> {{ $eachRank->user->metaData ? $eachRank->user->metaData->lastname : '' }} </td>
                <td> {{ $eachRank->rank ? $eachRank->rank->name : '' }} </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    {{ _mt($moduleId,'AdvancedRank.no_ranked_users') }}
@endif