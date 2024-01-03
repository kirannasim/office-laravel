<table class="table table-striped table-bordered table-hover dataTable dtr-inline reporttable" role="grid"
       aria-describedby="sample_1_info">
    <thead>
    <tr>
        <th>{{ _mt($moduleId,'AdvancedRank.sl_no') }}</th>
        <th> {{ _mt($moduleId,'AdvancedRank.Rank_Name') }}</th>
        <th> {{ _mt($moduleId,'AdvancedRank.jan') }}</th>
        <th> {{ _mt($moduleId,'AdvancedRank.feb') }}</th>
        <th> {{ _mt($moduleId,'AdvancedRank.march') }}</th>
        <th> {{ _mt($moduleId,'AdvancedRank.april') }}</th>
        <th> {{ _mt($moduleId,'AdvancedRank.may') }}</th>
        <th> {{ _mt($moduleId,'AdvancedRank.june') }}</th>
        <th> {{ _mt($moduleId,'AdvancedRank.july') }}</th>
        <th> {{ _mt($moduleId,'AdvancedRank.august') }}</th>
        <th> {{ _mt($moduleId,'AdvancedRank.september') }}</th>
        <th> {{ _mt($moduleId,'AdvancedRank.october') }}</th>
        <th> {{ _mt($moduleId,'AdvancedRank.november') }}</th>
        <th> {{ _mt($moduleId,'AdvancedRank.december') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($rankCounts as $key=>$rankCount)
        <tr>
            <td> {{ $loop->iteration }} </td>
            <td>{{ $rankCount['name'] }}</td>
            @foreach($rankCount['count'] as $monthlyCount)
                <td> {{ $monthlyCount }} </td>
            @endforeach
        </tr>
    @endforeach
    <tr>
        <td colspan="2">Total</td>
        @foreach($totalCounts as $totalCount)
            <td> {{ $totalCount }} </td>
        @endforeach
    </tr>
    </tbody>
</table>