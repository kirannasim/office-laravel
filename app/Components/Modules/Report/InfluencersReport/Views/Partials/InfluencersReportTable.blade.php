    <table class="table table-striped table-bordered table-hover dataTable dtr-inline reporttable" role="grid"
           aria-describedby="sample_1_info" style="width: 1028px;">
        <thead>
        <tr>
            <th> {{ _mt($moduleId, 'InfluencersReport.sl_no') }}</th>
            <th> {{ _mt($moduleId, 'InfluencersReport.member_id') }}</th>
            <th> {{ _mt($moduleId, 'InfluencersReport.first_name') }}</th>
            <th> {{ _mt($moduleId, 'InfluencersReport.last_name') }}</th>
            <th> {{ _mt($moduleId, 'InfluencersReport.user') }}</th>
            <th> {{ _mt($moduleId, 'InfluencersReport.rank') }}</th>
            <th> {{ _mt($moduleId, 'InfluencersReport.country') }}</th>
            <th> {{ _mt($moduleId, 'InfluencersReport.sponsor') }}</th>
            <th> {{ _mt($moduleId, 'InfluencersReport.email') }}</th>
            <th> {{ _mt($moduleId, 'InfluencersReport.joining_date') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ ($users->currentPage() * $users->perPage()) - $users->perPage() + $loop->iteration }}</td>
                <td> {{$user->customer_id}} </td>
                <td> {{$user->metaData->firstname}} </td>
                <td> {{$user->metaData->lastname}} </td>
                <td> {{$user->username}} </td>
                <td> {{$user->rank ? $user->rank->rank->name : ''}}</td>
                <td> {{$user->metaData->country->name}} </td>
                <td> {{$user->userSponsor ? $user->userSponsor->username : ''}} </td>
                <td> {{$user->email}} </td>
                <td> {{$user->created_at}} </td>
            </tr>
        @endforeach
        </tbody>
    </table>
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
