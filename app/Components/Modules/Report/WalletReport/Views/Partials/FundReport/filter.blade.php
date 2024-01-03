<form class="filterForm">
    <div class="filters row">
        <div class="eachFilter operation col-md-3 col-sm-3">
            <label>{{ _mt($moduleId,'WalletReport.user') }}</label>
            <input type="text" class="userFiller" placeholder="{{ _mt($moduleId,'WalletReport.enter_username') }}"/>
            <input type="hidden" name="filters[userId]" id="user_id">
        </div>
        <div class="eachFilter operation col-md-3 col-sm-3">
            <label>{{ _mt($moduleId,'WalletReport.wallet') }}</label>
            <select name="filters[wallet]" class="select2">
                @foreach($wallets as $wallet)
                    @if($wallet->registry['slug'] != 'Wallet-BusinessWallet')
                        <option value="{{ $wallet->moduleId }}"> {{ $wallet->registry['name'] }} </option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="eachFilter operation col-md-3 col-sm-3">
            <label>{{ _mt($moduleId,'WalletReport.amount') }}</label>
            <input type="text" class="amountRange" value="">
            <div class="extra-controls">
                <input type="hidden" name="filters[minBalance]" value="{{ $default_filter['minAmount'] }}"
                       class="js-input-from">
                <input type="hidden" name="filters[maxBalance]" value="{{ $default_filter['maxAmount'] }}"
                       class="js-input-to">
            </div>
        </div>
        <div class="eachFilter operation col-md-3 col-sm-3">
            <button type="button" class="btn dark filterRequest ladda-button" data-style="contract">
                <i class="fa fa-filter"></i>{{ _mt($moduleId,'WalletReport.filter') }}
            </button>
            <button type="button" class="btn dark clearFilter ladda-button" data-style="contract">
                <i class="fa fa-refresh"></i>{{ _mt($moduleId, 'WalletReport.reset') }}
            </button>
        </div>
    </div>
</form>

<script>
    'use strict';

    $(function () {
        $('.select2').select2({
            width: '100%'
        });
        Ladda.bind('.ladda-button');
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
                element.siblings('input[name="filters[userId]"]').val('')
            }
        };
        $('.userFiller').ajaxFetch(options);


        //fetch report table while filter is clicked
        $('.filterRequest').click(function () {
            fetchFundData();
        });

        var $range = $(".amountRange"),
            $inputFrom = $(".js-input-from"),
            $inputTo = $(".js-input-to"),
            instance,
            min = '{{ $default_filter['minAmount'] }}',
            max = '{{ $default_filter['maxAmount'] }}',
            from = '{{ $default_filter['minAmount'] }}',
            to = '{{ $default_filter['maxAmount'] }}';

        $(".amountRange").ionRangeSlider({
            type: "double",
            min: min,
            max: max,
            grid: true,
            from: from,
            to: to,
            onStart: updateInputs,
            onChange: updateInputs
        });

        instance = $range.data("ionRangeSlider");

        function updateInputs(data) {
            from = data.from;
            to = data.to;

            $inputFrom.prop("value", from);
            $inputTo.prop("value", to);
        }

        $inputFrom.on("input", function () {
            var val = $(this).prop("value");

            // validate
            if (val < min) {
                val = min;
            } else if (val > to) {
                val = to;
            }

            instance.update({
                from: val
            });
        });

        $('.clearFilter').click(function () {
            loadReportFilters();
        });
    })
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