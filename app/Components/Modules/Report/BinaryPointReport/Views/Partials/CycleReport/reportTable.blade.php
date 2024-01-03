
    <table class="table table-striped table-bordered table-hover dataTable dtr-inline reporttable" role="grid"
           aria-describedby="sample_1_info" style="width: 700px;table-layout: fixed;">
        <thead>
        <tr>
            <th> {{ _mt($moduleId, 'BinaryPointReport.date') }}</th>
            <th> {{ _mt($moduleId, 'BinaryPointReport.cycles') }}</th>
        </tr>
        </thead>
        <tbody>
            @if($cycleDatas->count())
                <?php $sum = 0 ?>
                @foreach($cycleDatas->reverse() as $key=>$cycleData)
                    <?php $sum += $cycleData->pair ?>
                    <tr>
                        <td> {{ date('Y-m-d h:i:s',strtotime($cycleData->created_at)) }} </td>
                        <td> {{ $cycleData->pair }} </td>
                    </tr>
                @endforeach

                <tr>
                    <td></td>
                    <td>{{$sum}}</td>
                </tr>
            @else
                <tr>
                <td colspan="3" class="text-center">
                    {{ _mt($moduleId, 'BinaryPointReport.no_data_found') }}
                </td>
                <tr>
            @endif
        </tbody>
    </table>

