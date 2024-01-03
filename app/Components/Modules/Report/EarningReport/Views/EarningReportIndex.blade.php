@extends(ucfirst(getScope()).'.Layout.master')
@section('content')
    @if(getScope()=='user')
        @include('_includes.reports_nav')
        <div class="heading" style="margin-top: 50px">
            <h3>{{ _mt($moduleId, 'EarningReport.earning_report') }}</h3>
        </div>
    @endif()

    <div class="row">
        <div class="col-md-12 reportFilters">
        </div>
        <div class="col-md-12 reportContainer">
        </div>
    </div>

    <script>
        "use strict";

        $(function () {
            loadReportFilters();
        });

        function loadReportFilters() {
            simulateLoading('.reportFilters');
            $.get('{{ scopeRoute('earningReport.filters') }}', function (response) {
                $('.reportFilters').html(response);
                $('.filterRequest').trigger('click')
            });
        }

        function fetchEarningReport(route) {
            simulateLoading('.reportContainer')
            route = route ? route : '{{ scopeRoute('earningReport.fetch') }}';
            $.post(route, $('.filterForm').serialize(), function (response) {
                $('.reportContainer').html(response);
                Ladda.stopAll();
            })
        }
    </script>
    <style>
        .page-content {
            overflow: hidden;
        }
    </style>
@endsection
