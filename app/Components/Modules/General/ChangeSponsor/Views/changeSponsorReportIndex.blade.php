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

        //load filter for the report
        function loadreportFilters() {
            simulateLoading('.reportFilters');
            $.get('{{ route('changeSponsorReport.filters') }}', function (response) {
                $('.reportFilters').html(response);
                Ladda.stopAll();
                $('.filterRequest').trigger('click')
            });
        }

        function fetchSponsorChangeReport(route) {
            simulateLoading('.reportContainer');
            route = route ? route : '{{ route('changeSponsorReport.fetch') }}';
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
