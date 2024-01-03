@include('Common.Partials.reportHeader')
@if($changedSponsorData->count())
    <table>
        <thead>
        <tr>
            <th>{{ _mt($moduleId,'ChangeSponsor.sl_no') }}</th>
            <th> {{ _mt($moduleId,'ChangeSponsor.user') }}</th>
            <th> {{ _mt($moduleId,'ChangeSponsor.from') }}</th>
            <th> {{ _mt($moduleId,'ChangeSponsor.to') }}</th>
            <th> {{ _mt($moduleId,'ChangeSponsor.date') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($changedSponsorData as $sponsorData)
            <tr>
                <td> {{ $loop->iteration }} </td>
                <td> {{ usernameFromId($sponsorData->user_id) }} </td>
                <td> {{ usernameFromId($sponsorData->from_sponsor) }} </td>
                <td> {{ usernameFromId($sponsorData->to_sponsor) }} </td>
                <td> {{ date('Y-m-d',strtotime($sponsorData->created_at)) }} </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    {{ _mt($moduleId,'ChangeSponsor.no_sponsor_changes') }}
@endif