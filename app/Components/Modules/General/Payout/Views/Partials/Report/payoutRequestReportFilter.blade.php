<form class="filterForm">
    <div class="filters row">
        <div class="eachFilter operation col-md-4">
            <label>{{ _mt($moduleId,'Payout.user') }}</label>
            <input type="text" class="userFiller" placeholder="Enter user name"/>
            <input type="hidden" name="filters[user_id]" id="user_id">
        </div>
        <div class="eachFilter operation col-md-4">
            <label>{{ _mt($moduleId,'Payout.wallet') }}</label>
            <select name="filters[wallet]">
                <option value=""> {{ _mt($moduleId,'Payout.all') }}</option>
                @foreach($wallets as $wallet)
                    <option value="{{ $wallet->moduleId }}"> {{ $wallet->registry['name'] }} </option>
                @endforeach
            </select>
        </div>
        <div class="eachFilter operation col-md-4">
            <label>{{ _mt($moduleId,'Payout.amount') }}</label>
            <input type="text" class="amountRange" value="">
            <div class="extra-controls">
                <input type="hidden" name="filters[amountFrom]" value="{{ $default_filter['minAmount'] }}"
                       class="js-input-from">
                <input type="hidden" name="filters[amountTo]" value="{{ $default_filter['maxAmount'] }}"
                       class="js-input-to">
            </div>
        </div>
        <div class="eachFilter operation col-md-4">
            <label>{{ _mt($moduleId,'Payout.date') }}</label>
            <input type="text" class="joinDate" value="" name="filters[date]"/>
        </div>

        <div class="eachFilter operation col-md-4">
            <button type="button" class="btn dark filterRequest ladda-button" data-style="contract">
                <i class="fa fa-filter"></i>{{ _mt($moduleId,'Payout.filter') }}
            </button>
        </div>
    </div>
</form>

<script>
    $(function () {
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
            selectedCallback: selectedCallback
        };
        $('.userFiller').ajaxFetch(options);


        //fetch report table while filter is clicked
        $('.filterRequest').click(function () {
            //simulateLoading('.treelistTable')
            $.post('{{ scopeRoute('payout.report.request.fetch') }}', $('.filterForm').serialize(), function (response) {
                $('.reportContainer').html(response);
                //  Ladda.stopAll();
            })
        });

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

        var $range = $(".amountRange"),
            $inputFrom = $(".js-input-from"),
            $inputTo = $(".js-input-to"),
            instance,
            min = '{{ $default_filter['minAmount'] }}',
            max = '{{ $default_filter['maxAmount']  }}',
            from = '{{ $default_filter['minAmount']  }}',
            to = '{{ $default_filter['maxAmount']  }}';

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


    });
</script>
