@extends(ucfirst(getScope()).'.Layout.master')
@section('content')
    <div class="row">
        <div class="col-md-12 reportFilters"></div>
        <div class="col-md-12 reportContainer"></div>
    </div>

    <script>
        "use strict";

        $(function () {
            loadTreeListFilters();
        });

        function loadTreeListFilters() {
            $.get('{{ route('treelist.filters') }}', function (response) {
                $('.reportFilters').html(response);
                $('.filterRequest').trigger('click')
            });
        }

        function fetchTreeList(route) {
            route = route ? route : '{{ route('treelist.downlines') }}';
            $.post(route, $('.filterForm').serialize(), function (response) {
                $('.reportContainer').html(response);
                Ladda.stopAll();
            })
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
@endsection
