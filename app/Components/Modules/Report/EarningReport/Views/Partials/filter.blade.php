<form class="filterForm">
    <div class="filters row">
        @if(getScope() == 'admin')
            <div class="eachFilter operation col-md-3 col-sm-3">
                <label>{{ _mt($moduleId, 'EarningReport.user') }}</label>
                <input type="text" class="userFiller"
                       placeholder="{{ _mt($moduleId,'EarningReport.Enter_user_name') }}">
                <input type="hidden" name="filters[user_id]" id="user_id">
            </div>
        @endif
        <div class="eachFilter operation col-md-3 col-sm-3">
            <label>{{ _mt($moduleId, 'EarningReport.date') }}</label>
            <input type="text" class="joinDate" value="" name="filters[date]"/>
        </div>
        <div class="eachFilter operation col-md-3 col-sm-3">
            <label>{{ _mt($moduleId, 'EarningReport.commission') }}</label>
            <select name="filters[commission]">
                <option value="">{{ _mt($moduleId,'EarningReport.all') }}</option>
                @foreach($commissions as $commission)
                    <option value="{{ $commission->moduleId }}"> {{ $commission->registry['name'] }} </option>
                @endforeach
            </select>
        </div>

        <div class="eachFilter operation col-md-3 col-sm-3">
            <label>{{ _mt($moduleId, 'EarningReport.wallets') }}</label>
            <select name="filters[wallet]">
                <option value="">{{ _mt($moduleId,'EarningReport.Select_Wallet') }}</option>
                @foreach($wallets as $wallet)
                    @if($wallet->registry['slug'] != 'Wallet-BusinessWallet')
                        <option value="{{ $wallet->moduleId }}"> {{ $wallet->registry['name'] }} </option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="eachFilter operation col-md-3 col-sm-3">
            <label>{{ _mt($moduleId, 'EarningReport.date_range') }}</label>
            <select name="filters[date_range]">
                <option value="">{{ _mt($moduleId, 'EarningReport.select') }}</option>
                <option value="today">{{ _mt($moduleId, 'EarningReport.today') }}</option>
                <option value="week">{{ _mt($moduleId, 'EarningReport.this_week') }}</option>
                <option value="month">{{ _mt($moduleId, 'EarningReport.this_month') }}</option>
                <option value="year">{{ _mt($moduleId, 'EarningReport.this_year') }}</option>
            </select>
        </div>
        <div class="eachFilter operation col-md-3 col-sm-3">
            <button type="button" class="btn dark filterRequest ladda-button" data-style="contract">
                <i class="fa fa-filter"></i>{{ _mt($moduleId, 'EarningReport.filter') }}
            </button>
            <button type="button" class="btn dark clearFilter ladda-button" data-style="contract">
                <i class="fa fa-refresh"></i>{{ _mt($moduleId, 'EarningReport.reset') }}
            </button>
        </div>
    </div>
</form>

<script>
    "use strict";
    $(function () {
        Ladda.bind('.ladda-button');

        //fetch report table while filter is clicked
        $('.filterRequest').click(function () {
            fetchEarningReport();
        });

        $('.clearFilter').click(function () {
            loadReportFilters();
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
            name: '{{ _mt($moduleId,'EarningReport.username') }}',
            selectedCallback: selectedCallback,
            clearCallback: function (element) {
                element.siblings('input[name="filters[user_id]"]').val('')
            }
        };
        $('.userFiller').ajaxFetch(options);

        // Ladda.bind('.ladda-button');

        $('.joinDate').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD'
            },
            startDate: '{{ $default_filter['startDate'] }}',
            endDate: '{{ $default_filter['endDate'] }}',
            autoApply: true,
            autoUpdateInput: true
        });
    });
</script>
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
