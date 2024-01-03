@if($activities->count())
    <table class="table table-striped table-bordered table-hover dataTable dtr-inline reporttable" role="grid"
           aria-describedby="sample_1_info" style="width: 1028px;">
        <thead>
        <tr>
            <th> {{ _mt($moduleId, 'ActivityReport.sl_no') }}</th>
            <th> {{ _mt($moduleId, 'ActivityReport.date') }}</th>
            <th> {{ _mt($moduleId, 'ActivityReport.username') }}</th>
            <th> {{ _mt($moduleId, 'ActivityReport.activity') }}</th>
            <th> {{ _mt($moduleId, 'ActivityReport.ip') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($activities as $activity)
            <tr>
                <td>{{ ($activities->currentPage() * $activities->perPage()) - $activities->perPage() + $loop->iteration }}</td>
                <td> {{ date('Y-m-d H:i:s',strtotime($activity->created_at)) }} </td>
                <td> {{ $activity->user ? $activity->user->username : 'NA' }} </td>
                <td>
                    {{ $activity->activity ? $activity->activity->description : 'NA' }}
                    @if (count($activity->changes))
                        <br/>
                        <small>
                            @foreach($activity->changes as $changed_field => $data)
                                &nbsp; - {{ $changed_field }}:
                                "{{ $data['from'] }}"
                                <b>&raquo;</b>
                                "{{ $data['to'] }}"
                                <br/>
                            @endforeach
                        </small>
                    @endif
                </td>
                <td> {{ $activity->ip }} </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="paginationWrapper">
        {!! $activities->links() !!}
    </div>
@else
    <th> {{ _mt($moduleId, 'ActivityReport.no_activity_found') }}</th>
@endif
<script type="text/javascript">
    'use strict';

    $('.paginationWrapper .pagination li a').click(function (e) {
        e.preventDefault();
        var route = $(this).attr('href');
        fetchActivityReport(route);
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
                responsive: true,
                "bInfo": false,
                "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><t><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                "searching": false,
                fixedHeader: true,
                scrollY:true,
                paging: false,
                // pageLength: 10,
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
