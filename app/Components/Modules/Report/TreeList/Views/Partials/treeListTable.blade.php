@if($downlines->count())
    <div>
        <table class="table table-bordered table-hover reporttable">
            <thead>
            <tr>
                <th> {{ _mt($moduleId, 'TreeList.sl_no') }}</th>
                <th> {{ _mt($moduleId, 'TreeList.member_id') }}</th>
                <th> {{ _mt($moduleId, 'TreeList.firstname') }}</th>
                <th> {{ _mt($moduleId, 'TreeList.lastname') }}</th>
                <th> {{ _mt($moduleId, 'TreeList.username') }}</th>
                <th> {{ _mt($moduleId, 'TreeList.rank') }}</th>
                <th> {{ _mt($moduleId, 'TreeList.country') }}</th>
                <th> {{ _mt($moduleId, 'TreeList.position') }}</th>
                <th> {{ _mt($moduleId, 'TreeList.email') }}</th>
                <th> {{ _mt($moduleId, 'TreeList.joining_date') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($downlines as $downline)
                <tr>
                    <td>{{ ($downlines->currentPage() * $downlines->perPage()) - $downlines->perPage() + $loop->iteration }}</td>
                    <td> {{ isset($downline->user) ? $downline->user->customer_id : '' }} </td>
                    <td> {{ isset($downline->user->metaData) ? $downline->user->metaData->firstname : ''}} </td>
                    <td> {{ isset($downline->user->metaData) ? $downline->user->metaData->lastname : ''}} </td>
                    <td> {{ isset($downline->user) ? $downline->user->username : ''}} </td>
                    <td> {{ isset($downline->rank) ? $downline->rank->rank->name : ''}} </td>
                    <td> {{ isset($downline->user->metaData) ?  $downline->user->metaData->country->name : ''}}</td>
                    <td> @if(isset($downline->position) == 1) Left @else Right @endif </td>
                    <td> {{ isset($downline->user) ? $downline->user->email : ''}} </td>
                    <td> {{ $downline->created_at }} </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="paginationWrapper">
            {!! $downlines->links() !!}
        </div>
    </div>
@else
    {{ _mt($moduleId, 'TreeList.no_downline_available') }}
@endif
<script>
    'use strict';
    $('.paginationWrapper .pagination li a').click(function (e) {
        e.preventDefault();
        var route = $(this).attr('href');
        fetchTreeList(route);
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
                // Or you can use remote translation file
                //"language": {
                //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
                //},


                buttons: [
                    // {extend: 'print', className: 'btn dark btn-outline'},
                    // {extend: 'pdf', className: 'btn green btn-outline'},
                    // {extend: 'excel', className: 'btn yellow btn-outline '},
                    // {extend: 'csv', className: 'btn purple btn-outline '},

                ],
                // setup responsive extension: http://datatables.net/extensions/responsive/
                responsive: true,
                //"ordering": false, disable column ordering
                "paging": false, //disable pagination
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

                // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
                // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js).
                // So when dropdowns used the scrollable div should be removed.
                //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
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
</script>
