@if($notifications->count())
    <table class="table table-striped table-bordered table-hover dataTable dtr-inline notificationTable" role="grid"
           aria-describedby="sample_1_info" style="width: 1028px;">
        <thead>
        <tr>
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
                <td>{{ ($notifications->currentPage() * $notifications->perPage()) - $notifications->perPage() + $loop->iteration }}</td>
                <td> {{ isset($notification['data']['subject']) ? $notification['data']['subject'] : 'NA' }} </td>
                <td> {{ isset($notification['data']['body']) ? $notification['data']['body'] : 'NA' }} </td>
                <td> {{ isset($notification['data']['read_at']) ?  _t('notification.read')  : _t('notification.unread')  }} </td>
                <td> {{ date('Y-m-d',strtotime($notification->created_at)) }} </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="paginationWrapper">
        {!! $notifications->links() !!}
    </div>
@else
    <h5> {{ _t('notification.no_notifications_found') }}</h5>
@endif
<script type="text/javascript">
    'use strict';

    $('.paginationWrapper .pagination li a').click(function (e) {
        e.preventDefault();
        var route = $(this).attr('href');
        fetchNotificationList(route);
    });

    $('.notificationTable table-scrollable').slimScroll({height: '400px'});
</script>


