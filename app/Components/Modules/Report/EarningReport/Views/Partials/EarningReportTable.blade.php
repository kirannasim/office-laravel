@if($earnings->count())
    <table class="table table-striped table-bordered table-hover dataTable dtr-inline reporttable" role="grid"
           aria-describedby="sample_1_info">
        <thead>
        <tr>
            <th> {{ _mt($moduleId, 'EarningReport.date') }}</th>
            <th> {{ _mt($moduleId, 'EarningReport.amount') }}</th>
            <th> {{ _mt($moduleId, 'EarningReport.description') }}</th>
            <th> {{ _mt($moduleId, 'EarningReport.wallet') }}</th>

            @if(getScope() == 'admin')
                <th> {{ _mt($moduleId, 'EarningReport.user') }}</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($earnings as $earning)
            {{--            {{ dd($earning) }}--}}
            <tr>
                {{--<td>{{ ($earnings->currentPage() * $earnings->perPage()) - $earnings->perPage() + $loop->iteration }}</td>--}}

                {{--@if(getScope() == 'admin')--}}
                {{--<td> {{ $earning->user ? $earning->user->username : 'NA' }} </td>--}}
                {{--@endif--}}
                <td> {{ date('Y-m-d',strtotime($earning->transaction->created_at)) }} </td>
                <td> € {{ $earning->transaction->actual_amount }} </td>
                <td> {{ getModule($earning->module_id)->getRegistry()['name'] }}

                    @if((getModule($earning->module_id)->registry['slug'] === 'Commission-DirectReferralBonus') || (getModule($earning->module_id)->registry['slug'] === 'Commission-IndirectReferralBonus'))
                        <br>
                        <span>{{ _mt($moduleId, 'EarningReport.from') }}  {{ usernameFromId($earning->ref_user_id) }}  ({{ getUser($earning->ref_user_id)->email }})</span> @endif


                </td>
                <td> {{ getModule($earning->transaction->operation->to_module)->getRegistry()['name'] }} </td>
                @if(getScope() === 'admin')
                    <td> {{ idToUsername($earning->transaction->payee) }} </td>
                @endif

            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="paginationWrapper">
        {{--{!! $activities->links() !!}--}}
    </div>
@else
    <h4> {{ _mt($moduleId, 'EarningReport.no_earning_found') }}</h4>
@endif
<script type="text/javascript">
    'use strict';


    $('.paginationWrapper .pagination li a').click(function (e) {
        e.preventDefault();
        var route = $(this).attr('href');
        fetchEarningReport(route);
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
                // "paging": false, //disable pagination
                "searching": false,
                "bInfo": false,
                "dom": "<'row' <'col-md-12'>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><t><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                fixedHeader: true,
                scrollY:400,
                "scrollCollapse": true,
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
