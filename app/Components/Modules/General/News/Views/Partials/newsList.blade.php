<div class="row NewsWrapper">
    <div class="col-sm-12">
        @if($news_data->count())
            <div class="NewsTableWrapper" id="NewsTableWrapper" name="NewsTableWrapper">
                <div class="portlet-body table-responsive">
                    <table class="table table-striped table-bordered table-hover dtr-inline" role="grid"
                           aria-describedby="sample_1_info" id="autoresponders">
                        <thead>
                        <tr>
                            <th>{{ _mt($moduleId,'News.Sl_No') }}</th>
                            <th>{{ _mt($moduleId,'News.Title') }}</th>
                            <th>{{ _mt($moduleId,'News.Date') }}</th>
                            <th>{{ _mt($moduleId,'News.Action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($news_data as $news)
                            <tr>
                                <td>{{ ($news_data->currentPage() * $news_data->perPage()) - $news_data->perPage() + $loop->iteration }}</td>
                                <td>{{ isset($news->title[Lang::locale()]) ? $news->title[Lang::locale()] : '' }}</td>
                                <td>{{ $news->dispatch_date }}</td>
                                <td style="width: 125px;">
                                    <button type="button" class="btn blue ladda-button editNews" data-style="contract"
                                            onclick="editNews({{ $news->id }})"><i><span
                                                    class="fa fa-edit editForm"></span></i>
                                    </button>
                                    <button type="button" class="btn red ladda-button deleteNews"
                                            onclick="deleteNews({{ $news->id }})" data-style="contract"><i><span
                                                    class="fa fa-trash"></span></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="paginationWrapper">
                        {{ $news_data->links() }}
                    </div>
                </div>
            </div>
        @else
            No news found
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

</style>