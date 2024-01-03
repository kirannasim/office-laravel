@extends('Admin.Layout.master')
@section('content')
    @component('Components.demoWarning') @endcomponent
    <div class="row">
        <div class="portletHousing col-md-7">
            <div class="portlet light bordered fieldWizard">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-edit font-grey-gallery"></i>
                        <span class="caption-subject bold font-grey-gallery uppercase">{{ _t('settings.cron_job_form') }}</span>
                    </div>
                </div>
                <div class="cronForm"></div>
            </div>
        </div>
        <div class="cronInfo"></div>
    </div>
    <div class="row">
        <div class="portletHousing col-md-12">
            <div class="portlet light bordered fieldWizard">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-list font-grey-gallery"></i>
                        <span class="caption-subject bold font-grey-gallery uppercase">{{ _t('settings.current_cron_jobs') }}</span>
                    </div>
                </div>
                <div class="cronJobList"></div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        "use strict";

        //load news list
        function loadList(route) {
            simulateLoading($('.cronJobList'));
            route = route ? route : "{{route('cron.jobList')}}";
            return $.get(route, function (response) {
                $('.cronJobList').html(response);
                Ladda.bind('.editNews');
                Ladda.bind('.deleteNews');
            });
        }

        // Load form
        function loadForm() {
            simulateLoading($('.cronForm'));
            var endPoint = "{{ route('cron.form') }}";
            return $.get(endPoint, function (response) {
                $('.cronForm').html(response);
                Ladda.bind('.submitForm');
            });
        }

        // Load info
        function loadInfo() {
            simulateLoading($('.cronInfo'));
            var endPoint = "{{ route('cron.info') }}";
            return $.get(endPoint, function (response) {
                $('.cronInfo').html(response);
                Ladda.bind('.email-submit');
            });
        }

        //edit form
        function editCron(id) {
            var options = {id: id};
            $.post('{{ route("cron.getCronJob") }}', options, function (response) {
                Ladda.stopAll();
                var data = JSON.parse(response);
                $("#id").val(data['id']);
                $('#minute_options').val(data['minute']).trigger('change');
                $('#hour_options').val(data['hour']).trigger('change');
                $('#day_options').val(data['day']).trigger('change');
                $('#month_options').val(data['month']).trigger('change');
                $('#weekday_options').val(data['weekday']).trigger('change');
                $('#route').val(data['route']).trigger('change');
                $('#url').val(data['url']);
                $('#task').val(data['task']).trigger('change');
                $('#status').val(data['status']).trigger('change');
            });
        }

        //delete form
        function deleteCron(id) {
            var options = {id: id};
            $.post('{{ route("cron.deleteCronJob") }}', options, function (response) {
                toastr.success('{{ _t('settings.cron_deleted_successfully') }}');
                Ladda.stopAll();
                loadList();
            });
        }

        $(function () {
            loadForm().done(function () {
                loadInfo();
                loadList();
            });
        });
    </script>
@endsection