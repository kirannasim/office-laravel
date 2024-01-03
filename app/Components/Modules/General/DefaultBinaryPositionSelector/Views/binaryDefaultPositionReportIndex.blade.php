@extends(ucfirst(getScope()).'.Layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 reportFilters">
        </div>
        <div class="col-md-12 reportContainer">
        </div>
    </div>

    <script>"use strict";

        $(function () {
            loadReportFilters();
        });

        //load filter for the report
        function loadReportFilters() {
            simulateLoading('.reportFilters');
            $.get('{{ route('defaultBinaryPositionReport.filters') }}', function (response) {
                $('.reportFilters').html(response);
                Ladda.stopAll();
                $('.filterRequest').trigger('click')
            });
        }

        function fetchPositionChangeReport(route) {
            simulateLoading('.reportContainer');
            route = route ? route : '{{ route('defaultBinaryPositionReport.fetch') }}';
            $.post(route, $('.filterForm').serialize(), function (response) {
                $('.reportContainer').html(response);
                Ladda.stopAll();
            });
        }
    </script>
    <style>
        .page-content {
            overflow: hidden;
        }
    </style>
@endsection
