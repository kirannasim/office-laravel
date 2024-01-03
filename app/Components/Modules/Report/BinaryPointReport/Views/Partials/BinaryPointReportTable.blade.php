@if($binaryPoints->count())
    <div class="row binaryPoint-Report">
        <div class="col">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb binaryPointBox">
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-green icon-graph"></i>
                    <div class="widget-thumb-body">
                        <span class="widget-thumb-subtitle">{{ _mt($moduleId, 'BinaryPointReport.Left_Total') }}</span>
                        <span class="widget-thumb-body-stat">{{ $overView['leftpoints'] }}</span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>
        <div class="col">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb binaryPointBox">
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-red icon-graph"></i>
                    <div class="widget-thumb-body">
                        <span class="widget-thumb-subtitle"> {{ _mt($moduleId, 'BinaryPointReport.Right_Total') }}</span>
                        <span class="widget-thumb-body-stat">{{ $overView['rightpoints'] }}</span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>
        <div class="col">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb binaryPointBox">
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-purple icon-bar-chart"></i>
                    <div class="widget-thumb-body">
                        <span class="widget-thumb-subtitle">{{ _mt($moduleId, 'BinaryPointReport.Left_Carry') }}</span>
                        <span class="widget-thumb-body-stat">{{ $overView['leftCarry'] }}</span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>
        <div class="col">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb binaryPointBox">
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-blue icon-bar-chart"></i>
                    <div class="widget-thumb-body">
                        <span class="widget-thumb-subtitle">{{ _mt($moduleId, 'BinaryPointReport.Right_Carry') }}</span>
                        <span class="widget-thumb-body-stat">{{ $overView['rightCarry'] }}</span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>
        <div class="col">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb binaryPointBox">
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-blue icon-bar-chart"></i>
                    <div class="widget-thumb-body">
                        <span class="widget-thumb-subtitle">{{ _mt($moduleId, 'BinaryPointReport.cycles') }}</span>
                        <span class="widget-thumb-body-stat">{{ $overView['cycle'] }}</span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>
    </div>
    <table class="table table-striped table-bordered table-hover dataTable dtr-inline reporttable" role="grid"
           aria-describedby="sample_1_info" style="width: 1028px;">
        <thead>
        <tr>
            <th> {{ _mt($moduleId, 'BinaryPointReport.sl_no') }}</th>
            <th> {{ _mt($moduleId, 'BinaryPointReport.date') }}</th>
            <th> {{ _mt($moduleId, 'BinaryPointReport.position') }}</th>
            <th> {{ _mt($moduleId, 'BinaryPointReport.point') }}</th>
            <th> {{ _mt($moduleId, 'BinaryPointReport.type') }}</th>
            <th> {{ _mt($moduleId, 'BinaryPointReport.from_user') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($binaryPoints as $binaryPoint)
            <tr>
                <td>{{ ($binaryPoints->currentPage() * $binaryPoints->perPage()) - $binaryPoints->perPage() + $loop->iteration }}</td>
                <td> {{ date('Y-m-d',strtotime($binaryPoint->created_at)) }} </td>
                <td> {{ $binaryPoint->position == 1 ? _mt($moduleId, 'BinaryPointReport.left') : _mt($moduleId, 'BinaryPointReport.right')}} </td>
                <td> {{ $binaryPoint->point }} </td>
                <td> {{ $binaryPoint->is_credit == 1 ? _mt($moduleId, 'BinaryPointReport.credit') : _mt($moduleId, 'BinaryPointReport.debit') }} </td>
                <td> {{ usernameFromId($binaryPoint->from_user) }} </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="paginationWrapper">
        {!! $binaryPoints->links() !!}
    </div>
@else
    {{ _mt($moduleId, 'BinaryPointReport.no_data_found') }}
@endif
<style type="text/css">
    .binaryPoint-Report
    {
        display: flex;
        padding-left: 15px;
        padding-right: 15px;
    }
    .binaryPoint-Report .col
    {
        width: 20%;
    }
</style>
<script type="text/javascript">
    'use strict';

    $('.paginationWrapper .pagination li a').click(function (e) {
        e.preventDefault();
        var route = $(this).attr('href');
        fetchReport(route);
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

    $('.reporttable table-scrollable').slimScroll({height: '400px'});
</script>
