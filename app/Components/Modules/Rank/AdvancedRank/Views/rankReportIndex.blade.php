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
            loadreportFilters();
        });

        function loadreportFilters() {
            simulateLoading('.reportFilters');
            $.get('{{ route('advancedRankReport.filters') }}', function (response) {
                $('.reportFilters').html(response);
                Ladda.stopAll();
                $('.filterRequest').trigger('click')
            });
        }

        function fetchRankReport(route) {
            route = route ? route : '{{ route('advancedRankReport.fetch') }}';
            simulateLoading('.reportContainer');
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
