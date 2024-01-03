@extends(ucfirst(getScope()).'.Layout.master')
@section('content')
@if ('admin' == getScope())
    <div class="row">
        <div class="col-md-12 reportFilters"></div>
        <div class="col-md-12 reportContainer"></div>
    </div>
    <script>
        "use strict";
        $(function () {
            foundersLaunchReportFilters();
        });

        function foundersLaunchReportFilters() {
            $.get('{{ scopeRoute('foundersLaunchReport.filters') }}', function (response) {
                $('.reportFilters').html(response);
                @if ('admin' == getScope())
                    $('.filterRequest').trigger('click')
                @else
                    fetchfoundersLaunchReport();
                @endif
            });
        }

        function fetchfoundersLaunchReport(route) {
            route = route ? route : '{{ scopeRoute('foundersLaunchReport.founders') }}';
            $.post(route, $('.filterForm').serialize(), function (response) {
                $('.reportContainer').html(response);
                Ladda.stopAll();
            });
        }
    </script>
    <style>
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
@endif
@endsection
