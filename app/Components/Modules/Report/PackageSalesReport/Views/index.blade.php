@extends(ucfirst(getScope()).'.Layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 reportFilters">
        </div>
        <div class="col-md-12 reportContainer">
        </div>
    </div>

    <script>
        "use strict";

        $(function () {
            loadreportFilters();
        });

        function loadreportFilters() {
            simulateLoading('.reportFilters');
            $.get('{{ scopeRoute('packageSales.filters') }}', function (response) {
                $('.reportFilters').html(response);
                $('.filterRequest').trigger('click')
            });
        }

        function fetchPackageSalesReport(route) {
            simulateLoading('.reportContainer')
            route = route ? route : '{{ scopeRoute('packageSales.fetch') }}';
            $.post(route, $('.filterForm').serialize(), function (response) {
                $('.reportContainer').html(response);
                Ladda.stopAll();
            })
        }
    </script>
@endsection