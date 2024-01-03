<div class="row">
    <div class="col-md-6">
        <h3>{{ _t('pendingRegistration.List_of_records') }}</h3>
        @if($registrations->count())
            <div class="listHolder">
                @foreach($registrations as $registration)
                    <div class="eachList @if($registration->status )resolved @else pending @endif  @if ($loop->first)
                            This is the first iteration.
     active @endif" data-id="{{ $registration->id }}">
                        <span class="id">#{{ ($registrations->currentPage() * $registrations->perPage()) - $registrations->perPage() + $loop->iteration }}</span>
                        <span class="gateway">{{ ucfirst($registration->key) }}</span>
                        <span class="username">{{ ucfirst($registration->value['orderData']['username']) }}</span>
                        <span class="amount">{{ currency($registration->value['cartDetails']['total']) }}</span>
                        <span class="timestamp">{{ $registration->created_at->format('D Y') }}{{--'D Y H:i A'--}}
                        <span>({{ $registration->created_at->diffForHumans() }})</span></span>
                    </div>
                @endforeach
            </div>
            <div class="paginationWrapper">
                {!! $registrations->links() !!}
            </div>
        @else
            <h3>{{ _t('pendingRegistration.no_data_found') }}</h3>
        @endif
    </div>
    <div class="col-md-6">
        <div class="detailsHolder">
            <h3>{{ _t('pendingRegistration.Details') }}</h3>
            <div class="detailsWrapper" @if($registrations->count()) data-id="{{ $registrations->first()->id }}" @endif>
            </div>
        </div>
    </div>
</div>

<script>
    'use strict';


    $('.paginationWrapper .pagination li a').click(function (e) {
        e.preventDefault();
        var route = $(this).attr('href');
        fetchTreeList(route);
    });


    var TableDatatablesButtons = function () {

        var initTable = function () {
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
                "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
            });
        }

        return {
            //main function to initiate the module
            init: function () {
                if (!jQuery().dataTable) {
                    return;
                }
                initTable();
            }
        };
    }();
    jQuery(document).ready(function () {
        TableDatatablesButtons.init();
    });

    //delete autoresponder form
    $('.activateUser').click(function () {
        var id = $(this).attr('data-id');
        $.post('{{ route('employee.management.pendingRegistrationActivate') }}', {bankWireRegId: id}, function () {
            toastr.success("{{ _t('pendingRegistration.Registration_activated_successfully') }}");
            fetchData();
        })
    })

    $(function () {
        //Refresh ajax details
        $('.detailsWrapper').each(function () {
            refreshAjaxData($(this));
        });
    });

    //Navigation
    $('body').off('click', '.eachList').on('click', '.eachList', function () {
        var me = $(this);
        $(this).addClass('loading').siblings().removeClass('loading');
        $('.detailsWrapper').attr('data-id', $(this).attr('data-id'));
        refreshAjaxData($('.detailsWrapper')).done(function () {
            me.addClass('active').removeClass('loading').siblings().removeClass('active');
        });
    });

    //Ajax info retrieval
    function refreshAjaxData(elem, route, args, postParams) {
        simulateLoading(elem);
        route = route ? route : '{{ route('employee.management.pendingRegistration.getDetails') }}';
        var options = {id: elem.attr('data-id'), args: args};

        if (postParams) $.extend(options, postParams);

        return $.post(route, options, function (response) {
            elem.html(response);
        });
    }
</script>
