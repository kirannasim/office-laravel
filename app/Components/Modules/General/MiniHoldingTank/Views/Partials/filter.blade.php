<form class="filterForm">
    @if(getScope() == 'admin')
        <div class="filters row">
            <div class="eachFilter operation col-md-3 col-sm-3">
                <label>{{ _mt($moduleId, 'MiniHoldingTank.user') }}</label>
                <input type="text" class="userFiller" placeholder="Enter user name"/>
                <input type="hidden" name="filters[user_id]" id="user_id">
            </div>
            <div class="eachFilter operation col-md-3 col-sm-3">
                <button type="button" class="btn dark filterRequest ladda-button" data-style="contract">
                    <i class="fa fa-filter"></i>{{ _mt($moduleId, 'MiniHoldingTank.filter') }}
                </button>
                <button type="button" class="btn dark clearFilter ladda-button" data-style="contract">
                    <i class="fa fa-refresh"></i>{{ _mt($moduleId, 'MiniHoldingTank.reset') }}
                </button>
            </div>
        </div>
    @endif
</form>

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
<script>
    "use strict";
    $(function () {
        Ladda.bind('.ladda-button');

        //fetch report table while filter is clicked
        $('.filterRequest').click(function () {
            fetchHoldingUsers();
        });

        $('.clearFilter').click(function () {
            loadHoldingTankFilters();
        });

        //User fetcher
        var selectedCallback = function (target, id, name) {

            $('.userFiller').val(name);
            $('#user_id').val(id);

        };
        var options = {
            target: '.userFiller',
            route: '{{ route("user.api") }}',
            action: 'getUsers',
            name: 'username',
            selectedCallback: selectedCallback,
            clearCallback: function (element) {
                element.siblings('input[name="filters[user_id]"]').val('')
            }
        };
        $('.userFiller').ajaxFetch(options);

        //Member ID fetcher
        var selectedIdCallback = function (target, id, name) {

            $('.memberIdFiller').val(name);
            $('#member_id').val(name);

        };

        //select2
        $('select').select2({});
    });
</script>
