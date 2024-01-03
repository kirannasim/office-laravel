@extends(ucfirst(getScope()).'.Layout.master')
@section('content')
    <div class="topEarnersReportWrapper">
        <div class="col-md-12 reportFilters">
        </div>
        <div class="col-md-12 reportContainer">
        </div>
        {{-- <div class="col-md-12 userEarningInfo">
         </div>--}}

    </div>

    <script>
        "use strict";

        function loadTopEarnersUnit(unit, placeholder, postParams, route) {
            route = route ? route : '{{ scopeRoute('topEarners.units') }}';

            return loadUnit(unit, placeholder, route, null, postParams).done(function (response) {
                Ladda.stopAll();
            }).fail(function (reponse) {
                Ladda.stopAll();
            });
        }

        function fetchTopEarnersData(filters) {
            loadTopEarnersUnit('reportData', '.reportContainer', $.extend(formValues('.filterForm'), filters));
        }

        $(function () {
            loadTopEarnersUnit('reportFilters', '.reportFilters');
        });

    </script>
    <style>
        .page-content {
            overflow: hidden;
        }
    </style>
@endsection

