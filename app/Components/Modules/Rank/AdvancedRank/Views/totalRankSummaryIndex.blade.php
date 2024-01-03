@extends(ucfirst(getScope()).'.Layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 reportFilters"></div>
        <div class="col-md-12 reportContainer"></div>
    </div>

    <script>"use strict";

        $(function () {
            loadreportFilters();
        });

        function loadreportFilters() {
            simulateLoading('.reportFilters');
            $.get('{{ route('totalRankSummaryReport.filters') }}', function (response) {
                $('.reportFilters').html(response);
                Ladda.stopAll();
                $('.filterRequest').trigger('click')
            });
        }


        function fetchTotalRankSummary(route) {
            route = route ? route : '{{ route('totalRankSummaryReport.fetch') }}';
            simulateLoading('.reportContainer');
            $.post(route, $('.filterForm').serialize(), function (response) {
                $('.reportContainer').html(response);
                Ladda.stopAll();
            });
        }

    </script>
    <style>
        /*.page-content {*/
            /*overflow: hidden;*/
        /*}*/

        @media (max-width: 767px) {
            .reportFilters .eachFilter.operation.col-md-3.col-sm-3 {
                width: 50%;
                float: left;
            }
        }

        @media (max-width: 480px) {
            .reportFilters .eachFilter.operation.col-md-3.col-sm-3 {
                width: 100%;
                float: none;
            }

            .reportFilters .filters .eachFilter button {
                margin: 10px 0px;
            }
        }
    </style>
@endsection
