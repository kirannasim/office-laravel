<table class="table table-bordered table-hover reporttable">
    <thead>
    <tr>
        <th>{{ _mt($moduleId, 'PackageSalesReport.sl_no') }}</th>
        <th>{{ _mt($moduleId, 'PackageSalesReport.package') }}</th>
        <th>{{ _mt($moduleId, 'PackageSalesReport.jan') }}</th>
        <th>{{ _mt($moduleId, 'PackageSalesReport.feb') }}</th>
        <th>{{ _mt($moduleId, 'PackageSalesReport.march') }}</th>
        <th>{{ _mt($moduleId, 'PackageSalesReport.april') }}</th>
        <th>{{ _mt($moduleId, 'PackageSalesReport.may') }}</th>
        <th>{{ _mt($moduleId, 'PackageSalesReport.june') }}</th>
        <th>{{ _mt($moduleId, 'PackageSalesReport.july') }}</th>
        <th>{{ _mt($moduleId, 'PackageSalesReport.august') }}</th>
        <th>{{ _mt($moduleId, 'PackageSalesReport.september') }}</th>
        <th>{{ _mt($moduleId, 'PackageSalesReport.october') }}</th>
        <th>{{ _mt($moduleId, 'PackageSalesReport.november') }}</th>
        <th>{{ _mt($moduleId, 'PackageSalesReport.december') }}</th>
        <th>{{ _mt($moduleId, 'PackageSalesReport.amount') }}</th>

    </tr>
    </thead>
    <tbody>
    @foreach($packageSales as $key=>$count)

        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ getPackageInfo($key)['name'] }}</td>
            @foreach($count['count'] as $sales)
                <td>{{ $sales }}</td>
            @endforeach
            <td>€{{ $count['sum']}}</td>
        </tr>
    @endforeach
    <tr>
        <td></td>
        <td>Total</td>
        @foreach($totalCounts['count'] as $totalCount)
            <td>{{ $totalCount }}</td>
        @endforeach
    </tr>
</table>