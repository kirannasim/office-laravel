<div class="reportOptions">
    <button type="button" class="btn btn-outline green downloadExcel"><i
                class="fa fa-file-excel-o"></i>{{ _mt($moduleId,'PackageSalesReport.excel') }}</button>
</div>
<div style="overflow-x: auto;">
    <table class="table table-bordered table-hover fixed" id="Report_PackageSales" style="width: auto">
        <thead>
        <tr>
            <th>{{ _mt($moduleId, 'PackageSalesReport.sl_no') }}</th>
            <th>{{ _mt($moduleId, 'PackageSalesReport.package') }}</th>
            <th>{{ _mt($moduleId, 'PackageSalesReport.amount') }}</th>
            @foreach($thead as $item)
                <?php $key = $item->format($type);?>
                <th>{{$key}}</th>
            @endforeach
        </tr>
        </thead>

        <tbody>
        @foreach($packageSales as $index=>$dates)
            <tr>
                <td>{{ $loop->iteration  }}</td>
                <td>{{ getPackageInfo($index)['name'] }}</td>
                <td>€ {{ number_format ( $dates['total'] , 2 , "." , "," )}}</td>
                @foreach($thead as $date)
                    <?php $value = 0;?>
                    <?php $formated = $date->format($type);
                        $prods = isset($dates[$formated]) ? $dates[$formated] : [];
                        foreach ($prods as $prod) {
                            $value +=1;
                        }
                    ?>
                    <td>{{ $value }}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>

    </table>
</div>

<script>
    $( document ).ready(function() {
        $('#Report_PackageSales th:eq(1)').css({'width':'240px','min-width':'240px'});
        $('#Report_PackageSales th:eq(2)').css({'width':'190px','min-width':'190px'});
        for (var i = 3; i < $('#Report_PackageSales th').length; i++){
            $('#Report_PackageSales th').eq(i).css({'width':'90px','min-width':'90px'});
        }


    });

    // Download report as Excel
    $('.downloadExcel').click(function () {
        exportTableToExcel('Report_PackageSales','Report_PackageSales');
    });


    function exportTableToExcel(tableID, filename = ''){
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

        // Specify file name
        filename = filename?filename+'.xls':'excel_data.xls';

        // Create download link element
        downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if(navigator.msSaveOrOpenBlob){
            var blob = new Blob(['\ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob( blob, filename);
        }else{
            // Create a link to the file
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

            // Setting the file name
            downloadLink.download = filename;

            //triggering the function
            downloadLink.click();
        }
    }

</script>
