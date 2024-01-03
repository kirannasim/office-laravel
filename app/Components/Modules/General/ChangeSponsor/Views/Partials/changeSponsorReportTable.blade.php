@if($changedSponsorData->count())
    <div class="reportOptions">
        <button type="button" class="btn btn-outline blue downloadPdf"><i
                    class="fa fa-file-pdf-o"></i>{{ _mt($moduleId,'ChangeSponsor.pdf') }}</button>
        <button type="button" class="btn btn-outline green downloadExcel"><i
                    class="fa fa-file-excel-o"></i>{{ _mt($moduleId,'ChangeSponsor.excel') }}</button>
        <button type="button" class="btn btn-outline red downloadCsv"><i
                    class="fa fa-file-text-o"></i>{{ _mt($moduleId,'ChangeSponsor.csv') }}</button>
        <button type="button" class="btn btn-outline dark printReport"><i
                    class="fa fa-print"></i>{{ _mt($moduleId,'ChangeSponsor.print') }}</button>
    </div>
    <table class="table table-striped table-bordered table-hover dataTable dtr-inline reporttable" role="grid"
           aria-describedby="sample_1_info" style="width: 1028px;">
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
    <div class="paginationWrapper">
        {{ $changedSponsorData->links() }}
    </div>
@else
    {{ _mt($moduleId,'ChangeSponsor.no_sponsor_changes') }}
@endif

<script type="text/javascript">
    'use strict';

    $('.paginationWrapper .pagination li a').click(function (e) {
        e.preventDefault();
        var route = $(this).attr('href');
        fetchSponsorChangeReport(route);
    });

    var TableDatatablesButtons = function () {

        var initTable1 = function () {
            var table = $('.reporttable');
            var oTable = table.dataTable({

                // Internationalisation. For more info refer to http://datatables.net/manual/i18n
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
                // setup responsive extension: http://datatables.net/extensions/responsive/
                responsive: true,
                //"ordering": false, disable column ordering
                "paging": false, //disable pagination
                "searching": false,
                "bInfo": false,

                "order": false,
                "lengthMenu": [
                    [5, 10, 15, 20, -1],
                    [5, 10, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "pageLength": 10,
                "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
            });
        }

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
        $.post('{{ route('changeSponsorReport.download.pdf') }}', $('.filterForm').serialize(), function (response) {
            var pdf = window.open(response.link);
            setTimeout(function () {
                pdf.close();
            }, 1000);
        });
    });

    // Download report as Excel
    $('.downloadExcel').click(function () {
        $.post('{{ route('changeSponsorReport.download.excel') }}', $('.filterForm').serialize(), function (response) {
            var excel = window.open(response.link);
            setTimeout(function () {
                excel.close();
            }, 1000);
        });
    });

    // Download report as csv
    $('.downloadCsv').click(function () {
        $.post('{{ route('changeSponsorReport.download.csv') }}', $('.filterForm').serialize(), function (response) {
            var csv = window.open(response.link);
            setTimeout(function () {
                csv.close();
            }, 1000);
        });
    });

    // print report
    $('.printReport').click(function () {
        $.post('{{ route('changeSponsorReport.print') }}', $('.filterForm').serialize(), function (response) {
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
