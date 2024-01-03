@if($notifications->count())

    <button class="btn btn-default deleteButton" style="float: right;
        margin-bottom: 10px;"> {{ _t('notification.delete') }}  </button>
    <table class="table table-striped table-bordered table-hover dataTable dtr-inline reporttable" role="grid"
           aria-describedby="sample_1_info" style="width: 1028px;">
        <thead>
        <tr>
            <th><input type="checkbox" name="markAll" class="markAll"></th>
            <th> {{ _t('notification.sl') }}</th>
            <th> {{ _t('notification.subject') }}</th>
            <th> {{ _t('notification.content') }}</th>
            <th> {{ _t('notification.status') }}</th>
            <th> {{ _t('notification.date') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($notifications as $notification)
            <tr>
                <td><input type="checkbox" name="list[]" value="{{ $notification->id }}" class="eachMarkCheckbox"></td>
                <td>{{ ($notifications->currentPage() * $notifications->perPage()) - $notifications->perPage() + $loop->iteration }}</td>
                <td> {{ isset($notification['data']['subject']) ? $notification['data']['subject'] : 'NA' }} </td>
                <td> {{ isset($notification['data']['body']) ? $notification['data']['body'] : 'NA' }} </td>
                <td> {{ isset($notification->read_at) ?  _t('notification.read')  : _t('notification.unread')  }} </td>
                <td> {{ date('Y-m-d',strtotime($notification->created_at)) }} </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="paginationWrapper">
        {!! $notifications->links() !!}
    </div>
@else
    <th> {{ _mt($moduleId, 'ActivityReport.no_activity_found') }}</th>
@endif
<script type="text/javascript">
    'use strict';

    $('.paginationWrapper .pagination li a').click(function (e) {
        e.preventDefault();
        var route = $(this).attr('href');
        fetchNotificationList(route);
    });

    $('.reporttable table-scrollable').slimScroll({height: '400px'});

    $('.markAll').change(function () {
        if ($(this).is(":checked")) {
            $('.eachMarkCheckbox').prop('checked', true);
        } else {
            $('.eachMarkCheckbox').prop('checked', false);
        }
    });

    $('.deleteButton').click(function () {
        markNotificationAsRead();
    });


    function markNotificationAsRead() {

        var ids = [];
        $('.eachMarkCheckbox:checkbox:checked').each(function () {
            ids.push(this.value);
        });

        if (ids.length) {
            $.post("{{ scopeRoute("notification.delete") }}", {markIds: ids}, function () {
                toastr.success("{{ _t('notification.notification_deleted') }}");
                fetchNotificationList();
            })
        } else {
            toastr.error("{{ _t('notification.select_at_least_one_checkbox') }}");
        }
    }

</script>


