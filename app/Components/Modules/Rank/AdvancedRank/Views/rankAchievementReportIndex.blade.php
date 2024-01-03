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
            $.get('{{ route('advancedRankAchievementHistoryReport.filters') }}', function (response) {
                $('.reportFilters').html(response);
                Ladda.stopAll();
                $('.filterRequest').trigger('click')
            });
        }

        function fetchRankAchievementReport(route) {
            simulateLoading('.reportContainer');
            route = route ? route : '{{ route('advancedRankAchievementHistoryReport.fetch') }}';
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
        .reportContainer{
            margin-top: 10px;
        }
    </style>
@endsection
