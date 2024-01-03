@extends(ucfirst(getScope()).'.Layout.master')
@section('content')
    <div class="holdingTankWrapper">
        <div class="row">
            <div class="col-md-12 holdingTankFilters">
            </div>
            <div class="col-md-12 HoldingTankUserContainer" style="margin: 30px">
            </div>
        </div>
    </div>

    <script>
    </script>
    <style>
        .page-content {
            overflow: hidden;
        }
    </style>


    <script>
        "use strict";

        $(function () {
            loadHoldingTankFilters();
        });

        function loadHoldingTankFilters() {
            simulateLoading('.holdingTankFilters');
            $.get('{{ scopeRoute('miniHoldingTank.filters') }}', function (response) {
                $('.holdingTankFilters').html(response);

                @if(getScope() != 'user')
                $('.filterRequest').trigger('click');
                @else
                fetchHoldingUsers();
                @endif
            });
        }

        function fetchHoldingUsers(route) {
            simulateLoading('.HoldingTankUserContainer');
            route = route ? route : '{{ scopeRoute('miniHoldingTank.fetch') }}';
            $.post(route, $('.filterForm').serialize(), function (response) {
                $('.HoldingTankUserContainer').html(response);
                Ladda.stopAll();
            })
        }
    </script>


@endsection


