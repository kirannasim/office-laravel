<form class="filterForm">
    <div class="filters row">
        @if(getScope() == 'admin')
            <div class="eachFilter operation col-md-3 col-sm-3">
                <label>{{ _mt($moduleId, 'HoldingTank.username') }}</label>
                <input type="text" class="userFiller" placeholder="Enter user name"/>
                <input type="hidden" name="filters[userId]" id="user_id">
            </div>
        @endif
        <div class="eachFilter operation col-md-3 col-sm-3">
            <button type="button" class="btn dark filterRequest ladda-button" data-style="contract"
                    @if(getScope() == 'user')style="display: none" @endif>
                <i class="fa fa-filter"></i>{{ _mt($moduleId, 'HoldingTank.filter') }}
            </button>
            @if(getScope() == 'admin')
                <button type="button" class="btn dark clearFilter ladda-button" data-style="contract">
                    <i class="fa fa-refresh"></i>{{ _mt($moduleId, 'HoldingTank.reset') }}
                </button>
            @endif
        </div>
    </div>
</form>

@if(getScope() == 'admin')
<script>
    "use strict";
    $(function () {
        fetchHoldingTankList();

        Ladda.bind('.ladda-button');

        //fetch report table while filter is clicked
        $('.filterRequest').click(function () {
            fetchHoldingTankList();
        });

        $('.clearFilter').click(function () {
            loadHoldingTankUnit('holdingTankList', '.holdingTankList');
            loadHoldingTankUnit('filter', '.filterByUser');
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

    });
</script>
@endif

<style>
    @media (max-width: 991px) {
        .eachFilter.operation.col-md-3.col-sm-3:last-child {
            width: 50%;
        }
    }

    @media (max-width: 767px) {
        .reportFilters .eachFilter.operation.col-md-3.col-sm-3 {
            width: 50%;
            float: left;
        }
    }

    @media (max-width: 480px) {
        .reportFilters .eachFilter.operation.col-md-3.col-sm-3 {
            width: 100% !important;
            float: none;
        }

        .reportFilters .filters .eachFilter button {
            margin: 10px 0px;
        }
    }

    @media (max-width: 360px) {
        .reportOptions button.btn {
            margin-right: 0px;
            margin-bottom: 5px;
        }
    }
</style>
