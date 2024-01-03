<div class="row cronJobsWrapper">
    <div class="col-sm-12">
        @if($cronJobs->count())
            <div class="currentCronTable" id="currentCronTable" name="currentCronTable">
                <div class="portlet-body table-responsive">
                    <table class="table table-striped table-bordered table-hover dtr-inline" role="grid"
                           aria-describedby="sample_1_info" id="autoresponders">
                        <thead>
                        <tr>
                            <th>{{ _t('settings.Sl_no') }}</th>
                            <th>{{ _t('settings.minute') }}</th>
                            <th>{{ _t('settings.hour') }}</th>
                            <th>{{ _t('settings.day') }}</th>
                            <th>{{ _t('settings.month') }}</th>
                            <th>{{ _t('settings.weekday') }}</th>
                            <th>{{ _t('settings.task/url') }}</th>
                            <th>{{ _t('settings.status') }}</th>
                            <th>{{ _t('settings.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cronJobs as $cron)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $cron->minute }}</td>
                                <td>{{ $cron->hour }}</td>
                                <td>{{ $cron->day }}</td>
                                <td>{{ $cron->month }}</td>
                                <td>{{ $cron->weekday }}</td>
                                <td>
                                    @if($cron->task)
                                        {{ \App\Blueprint\Services\CronServices::getJobBySlug($cron->task)['name'] }}
                                    @elseif($cron->url)
                                        {{ $cron->url }}
                                    @endif
                                </td>
                                <td>
                                    @if($cron->status == 1)  {{ _t('settings.enable') }}
                                    @else  {{ _t('settings.disable') }}
                                    @endif
                                </td>
                                <td style="width: 125px;">
                                    <button type="button" class="btn blue ladda-button" data-style="contract"
                                            onclick="editCron({{ $cron->id }})"><i><span
                                                    class="fa fa-edit editForm"></span></i>
                                    </button>
                                    <button type="button" class="btn red ladda-button"
                                            onclick="deleteCron({{ $cron->id }})" data-style="contract"><i><span
                                                    class="fa fa-trash"></span></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            {{ _t('settings.no_cron_jobs') }}
        @endif
    </div>
</div>

<script>
    "use strict";

    $('.paginationWrapper .pagination li a').click(function (e) {
        e.preventDefault();
        var route = $(this).attr('href');
        LoadList(route);
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
</script>