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
            $.get('{{ scopeRoute('payout.report.request.filters') }}', function (response) {
                $('.reportFilters').html(response);
                $('.filterRequest').trigger('click')
            });
        }
    </script>
    <style>
        .page-content {
            overflow: hidden;
        }
    </style>
@endsection
