@if($holdingTanks->count())
    <table class="table table-striped table-bordered table-hover dataTable dtr-inline reporttable" role="grid"
           aria-describedby="sample_1_info" style="width: 1028px;">
        <thead>
        <tr>
            <th> {{ _mt($moduleId, 'HoldingTank.sl_no') }}</th>
            <th> {{ _mt($moduleId, 'HoldingTank.customer_id') }}</th>
            <th> {{ _mt($moduleId, 'HoldingTank.username') }}</th>
            <th> {{ _mt($moduleId, 'HoldingTank.firstname') }}</th>
            <th> {{ _mt($moduleId, 'HoldingTank.lastname') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($holdingTanks as $key => $holdingTank)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $holdingTank->user->customer_id }}</td>
                <td>{{ $holdingTank->user->username }}</td>
                <td>{{ $holdingTank->user->metaData?$holdingTank->user->metaData->firstname:'' }} </td>
                <td>{{$holdingTank->user->metaData?$holdingTank->user->metaData->lastname:'' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <div class="noData">
        <i class="fa fa-exclamation"></i>
        {{ _mt($moduleId, 'HoldingTank.No_data') }}
    </div>
@endif