@extends('Admin.Layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 notificationListContainer">
        </div>
    </div>



    <script>
        function fetchNotificationList(route) {
            simulateLoading('.notificationListContainer')
            route = route ? route : '{{ scopeRoute('notification.list') }}';
            $.post(route, function (response) {
                $('.notificationListContainer').html(response);
                Ladda.stopAll();
            })
        }

        $(function () {
            fetchNotificationList();
        });
    </script>
@endsection
