<div class="portlet light col-md-12">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-speech"></i>
            <span class="caption-subject bold uppercase">{{ _mt($moduleId,'Payout.request_list') }}</span>
        </div>
        <div class="actions">
            <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"
               data-original-title="" title=""> </a>
        </div>
    </div>
    <div class="portlet-body">
        <div class="requestListWrapper">
            @if($requests->count())
                <div class="table-scrollable">
                    <table class="table table-striped table-hover">
                        <thead>
                        <th>{{ _mt($moduleId,'Payout.sl_no') }}</th>
                        <th>{{ _mt($moduleId,'Payout.amount') }}</th>
                        <th>{{ _mt($moduleId,'Payout.wallet') }}</th>
                        <th>{{ _mt($moduleId,'Payout.withdrawn_to') }}</th>
                        <th>{{ _mt($moduleId,'Payout.status') }}</th>
                        <th>{{ _mt($moduleId,'Payout.date') }}</th>
                        <th>{{ _mt($moduleId,'Payout.Action') }}</th>
                        </thead>
                        <tbody>
                        @foreach($requests as $request)
                            <tr>
                                <td>{{ ($requests->currentPage() * $requests->perPage()) - $requests->perPage() + $loop->iteration }}</td>
                                <td>{{ $request->request_amount }}</td>
                                <td>{{ getModule((int)$request->wallet)->registry['name'] }}</td>
                                <td>{{ getModule((int)$request->gateway)->registry['name'] }}</td>
                                <td>{{ $request->payoutStatus->title }}</td>
                                <td>{{ $request->created_at }}</td>
                                <td>
                                    @if($request->payoutStatus->slug == 'pending')
                                        <button type="button" class="btn red ladda-button cancelRequest"
                                                data-id="{{ $request->id }}" data-style="contract">
                                            <i><span class="fa fa-trash"></span></i>
                                        </button>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="paginationWrapper">
                    {{ $requests->links() }}
                </div>
            @else
                {{ _mt($moduleId,'Payout.no_data_found') }}
            @endif
        </div>
    </div>
</div>
<script>
    $(function () {
        Ladda.bind('.ladda-button');
    });

    $('.cancelRequest').click(function () {
        let options = {id: $(this).data('id')};
        let me = $(this);

        return $.post('{{ route("user.payout.request.cancel") }}', options, function (response) {
            Ladda.stopAll();
            me.closest('tr').remove();
            toastr.success('{{ _mt($moduleId,'Payout.payout_request_canceled_successfully') }}');
        });
    });

    $('.paginationWrapper .pagination li a').click(function (e) {
        e.preventDefault();
        var route = $(this).attr('href');
        loadUnit('requestList', '.payoutPanel', route);
    });

    var TableDatatablesButtons = function () {
        var initTable1 = function () {
            var table = $('#autoresponders');
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
                    {extend: 'pdf', className: 'btn green btn-outline'},
                    {extend: 'excel', className: 'btn yellow btn-outline '},
                ],
                // setup responsive extension: http://datatables.net/extensions/responsive/
                responsive: true,
                //"ordering": false, disable column ordering
                //"paging": false, disable pagination

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
</script>

<style>
    .requestListWrapper button.btn.red.ladda-button.cancelRequest {
        border: solid 1px #e7505a;
        background-color: transparent;
        width: 35px;
        color: #e7505a;
        font-size: 16px;
    }
</style>


