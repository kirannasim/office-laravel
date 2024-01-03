@if($rankData->count())
    <div class="reportOptions" style="margin-top: 10px">
        <button type="button" class="btn btn-outline blue downloadPdf"><i
                    class="fa fa-file-pdf-o"></i>{{ _mt($moduleId,'AdvancedRank.pdf') }}</button>
        <button type="button" class="btn btn-outline green downloadExcel"><i
                    class="fa fa-file-excel-o"></i>{{ _mt($moduleId,'AdvancedRank.excel') }}</button>
        <button type="button" class="btn btn-outline red downloadCsv"><i
                    class="fa fa-file-text-o"></i>{{ _mt($moduleId,'AdvancedRank.csv') }}</button>
        <button type="button" class="btn btn-outline dark printReport"><i
                    class="fa fa-print"></i>{{ _mt($moduleId,'AdvancedRank.print') }}</button>
    </div>
    <table class="table table-striped table-bordered table-hover dataTable dtr-inline reporttable" role="grid"
           aria-describedby="sample_1_info" style="width: 1028px;">
        <thead>
        <tr>
            <th>{{ _mt($moduleId,'AdvancedRank.sl_no') }}</th>
            <th> {{ _mt($moduleId,'AdvancedRank.user') }}</th>
            <th> {{ _mt($moduleId,'AdvancedRank.firstname') }}</th>
            <th> {{ _mt($moduleId,'AdvancedRank.lastname') }}</th>
            <th> {{ _mt($moduleId,'AdvancedRank.newRank') }}</th>
            <th> {{ _mt($moduleId,'AdvancedRank.curDate') }}</th>
            <th> {{ _mt($moduleId,'AdvancedRank.highRank') }}</th>
            <th> {{ _mt($moduleId,'AdvancedRank.highDate') }}</th>
            <th> {{ _mt($moduleId,'AdvancedRank.sponsor') }}</th>
            <th> {{ _mt($moduleId,'AdvancedRank.country') }}</th>
            <th> {{ _mt($moduleId,'AdvancedRank.email') }}</th>
        </tr>
        </thead>
        <tbody>
            @foreach($rankData as $eachRank)
                    <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td> {{ usernameFromId($eachRank->user_id) }} </td>
                        <td> {{ $eachRank->user->metaData ? $eachRank->user->metaData->firstname : '' }} </td>
                        <td> {{ $eachRank->user->metaData ? $eachRank->user->metaData->lastname : '' }} </td>
                        <td> {{ isset($eachRank->user->rankHistory) ?  $eachRank->user->rankHistory()->orderBy('created_at','desc')->first()->rank->name    : ''}}     </td>
                        <td> {{ isset($eachRank->user->rankHistory) ?  $eachRank->user->rankHistory()->orderBy('created_at','desc')->first()->rank->created_at->format('Y-m-d') : ''}}  </td>
                        <td> {{ isset($eachRank->user->rankHistory) ?  $eachRank->user->rankHistory()->orderBy('rank_id','desc')->first()->rank->name   : ''}}     </td>
                        <td> {{ isset($eachRank->user->rankHistory) ?  $eachRank->user->rankHistory()->orderBy('rank_id','desc')->first()->rank->created_at->format('Y-m-d') : ''}}  </td>
                        <td> {{ $eachRank->user->repoData ? $eachRank->user->repoData->sponsorUser->username : '' }} </td>
                        <td> {{ $eachRank->user->metaData ? $eachRank->user->metaData->country->name : ''}} </td>
                        <td> {{ $eachRank->user->metaData ? $eachRank->user->email : '' }} </td>
                    </tr>
            @endforeach
        </tbody>
    </table>
    <div class="paginationWrapper">
        {{ $rankData->links() }}
    </div>
@else
    {{ _mt($moduleId,'AdvancedRank.no_ranked_users') }}
@endif

<script type="text/javascript">
    "use strict";

    $('.paginationWrapper .pagination li a').click(function (e) {
        e.preventDefault();
        var route = $(this).attr('href');
        fetchRankReport(route);
    });


    var TableDatatablesButtons = function () {

        var initTable1 = function () {
            var table = $('.reporttable');
            var oTable = table.dataTable({
                "language": {
                    "aria": {
                        "sortAscending": ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    },
                    "emptyTable": "No data available in table",
                    "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                    "infoEmpty": "No entries found",
                    "infoFiltered": "(filtered1 from _MAX_ total entries)",
                    "lengthMenu": "_MENU_ entries",
                    "search": "Search:",
                    "zeroRecords": "No matching records found"
                },
                buttons: [],
                responsive: true,
                "paging": false,
                "searching": false,
                "bInfo": false,

                "order": [
                    [0, 'asc']
                ],
                "lengthMenu": [
                    [5, 10, 15, 20, -1],
                    [5, 10, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "pageLength": 10,
                "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
            });
        };

        return {

            //main function to initiate the module
            init: function () {

                if (!jQuery().dataTable) {
                    return;
                }

                initTable1();
                //initAjaxDatatables();
            }

        };
    }();
    jQuery(document).ready(function () {
        TableDatatablesButtons.init();
    });

    // Download report as pdf
    $('.downloadPdf').click(function () {
        $.post('{{ route('advancedRankReport.download.pdf') }}', $('.filterForm').serialize(), function (response) {
            window.open(response.link);
        });
    });

    // Download report as Excel
    $('.downloadExcel').click(function () {
        $.post('{{ route('advancedRankReport.download.excel') }}', $('.filterForm').serialize(), function (response) {
            window.open(response.link);
        });
    });

    // Download report as csv
    $('.downloadCsv').click(function () {
        $.post('{{ route('advancedRankReport.download.csv') }}', $('.filterForm').serialize(), function (response) {
            window.open(response.link);
        });
    });

    // print report
    $('.printReport').click(function () {
        $.post('{{ route('advancedRankReport.print') }}', $('.filterForm').serialize(), function (response) {
            var HTML = response;

            var WindowObject = window.open("", "PrintWindow", "width=750,height=650,top=50,left=50,toolbars=no,scrollbars=yes,status=no,resizable=yes");
            WindowObject.document.writeln(HTML);
            WindowObject.document.close();
            WindowObject.focus();
            WindowObject.print();
            WindowObject.close();
        });
    });

    $('.reporttable table-scrollable').slimScroll({height: '400px'});
</script>