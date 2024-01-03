<form class="filterForm">
    <div class="filters row">
        <div class="eachFilter operation col-md-3 col-sm-3">
            <label>{{ _mt($moduleId,'WalletReport.payer') }}</label>
            <input type="text" class="payer" placeholder="{{ _mt($moduleId,'WalletReport.enter_username') }}"/>
            <input type="hidden" name="filters[payer]" id="payer">
        </div>
        <div class="eachFilter operation col-md-3 col-sm-3">
            <label>{{ _mt($moduleId,'WalletReport.payee') }}</label>
            <input type="text" class="payee" placeholder="{{ _mt($moduleId,'WalletReport.enter_username') }}"/>
            <input type="hidden" name="filters[payee]" id="payee">
        </div>
        <div class="eachFilter operation col-md-3 col-sm-3">
            <label>{{ _mt($moduleId,'WalletReport.from') }}</label>
            <select name="filters[from_module]" class="select2">
                <option value=""> {{ _mt($moduleId,'WalletReport.all') }}</option>
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
                <input type="hidden" name="filters[minimum]" value="{{ $default_filter['minAmount'] }}"
                       class="js-input-from">
                <input type="hidden" name="filters[maximum]" value="{{ $default_filter['maxAmount'] }}"
                       class="js-input-to">
            </div>
        </div>
        <div class="eachFilter operation col-md-3 col-sm-3">
            <label>{{ _mt($moduleId,'WalletReport.to') }}</label>
            <select name="filters[to_module]" class="select2">
                <option value=""> {{ _mt($moduleId,'WalletReport.all') }}</option>
                @foreach($wallets as $wallet)
                    @if($wallet->registry['slug'] != 'Wallet-BusinessWallet')
                        <option value="{{ $wallet->moduleId }}"> {{ $wallet->registry['name'] }} </option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="eachFilter operation col-md-3 col-sm-3">
            <label>{{ _mt($moduleId,'WalletReport.date') }}</label>
            <input type="text" class="flterDate" value="" name="filters[date]"/>
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
        var selectedCallbackPayer = function (target, id, name) {
            $('.payer').val(name);
            $('#payer').val(id);
        };
        var payerOptions = {
            target: '.payer',
            route: '{{ route("user.api") }}',
            action: 'getUsers',
            name: 'username',
            selectedCallback: selectedCallbackPayer,
            clearCallback: function (element) {
                element.siblings('input[name="filters[payer]"]').val('')
            }
        };
        $('.payer').ajaxFetch(payerOptions);

        var selectedCallbackPayee = function (target, id, name) {
            $('.payee').val(name);
            $('#payee').val(id);
        };
        var options = {
            target: '.payee',
            route: '{{ route("user.api") }}',
            action: 'getUsers',
            name: 'username',
            selectedCallback: selectedCallbackPayee,
            clearCallback: function (element) {
                element.siblings('input[name="filters[payee]"]').val('')
            }
        };
        $('.payee').ajaxFetch(options);


        //fetch report table while filter is clicked
        $('.filterRequest').click(function () {
            fetchFundTransferData();
        });

        // Ladda.bind('.ladda-button');

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

        $('.flterDate').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD'
            },
            startDate: '{{ $default_filter['startDate'] }}',
            endDate: '{{ $default_filter['endDate'] }}',
            autoApply: true,
            autoUpdateInput: true
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
