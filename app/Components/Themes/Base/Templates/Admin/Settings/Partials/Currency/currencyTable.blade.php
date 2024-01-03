<div class="row">
    <div class="col-sm-12">
        <div class="portlet">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa fa-money"></i>Currency Table
                </div>
                {{--<div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                    <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                    <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                </div>--}}
                <button type="button" class="bubble pulse-button animated addNewCurrency"><i class="fa fa-plus"></i> add
                    New
                </button>
            </div>
            <div class="portlet-body currencyTable">
                <div class="table-scrollable">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th> sl.no</th>
                            <th> Name</th>
                            <th> code</th>
                            <th> Symbol</th>
                            <th> Exchange Rate</th>
                            <th> Action</th>
                            <th> More</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($currencies as $currency)

                            {{ dd($currency) }}
                            <tr>
                                <td> {{ $loop->iteration }} </td>
                                <td> {{ $currency->name }} </td>
                                <td> {{ $currency->code }} </td>
                                <td> {{ $currency->symbol }} </td>
                                <td> {{ $currency->exchange_rate }} </td>
                                <td>
                                    <button class="btn btn-primary editCurrency" title="edit"
                                            data-id="{{$currency->id}}"><i class="fa fa-edit"></i></button>

                                    <label class="switch CurrencyAction">
                                        <input type="checkbox" class="changeCurrencyStatus"
                                               @if($currency->active) checked @endif value="{{ $currency->id }}">
                                        <span class="slider"></span>
                                    </label>
                                </td>
                                <td>
                                    <label class="switch CurrencyMore">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    "use strict";

    $('.addNewCurrency').click(function () {
        loadCurrencyForm();
    });

    $('.editCurrency').click(function () {
        var currencyId = $(this).attr('data-id');
        loadCurrencyForm(currencyId);
    });

    $('.disableCurrency').click(function () {
        var id = $(this).attr('data-id');
        $.post("{{ route('currency.disable') }}", {currencyId: id}, function (response) {
            toastr.success('Currency Disabled sucessfully');
            loadCurrencyTable();
        })
    });

    $('.enableCurrency').click(function () {
        var id = $(this).attr('data-id');
        $.post("{{ route('currency.enable') }}", {currencyId: id}, function (response) {
            toastr.success('Currency Enabled sucessfully');
            loadCurrencyTable();
        })
    });


    $('.changeCurrencyStatus').change(function () {
        if ($(this).is(":checked")) {
            var route = "{{ route('currency.enable') }}"
        } else {
            var route = "{{ route('currency.disable') }}";
        }
        var id = $(this).val();

        $.post(route, {currencyId: id}, function (response) {
            toastr.success('Currency updated sucessfully');
            loadCurrencyTable();
        }).fail(function () {
            toastr.error('Cant Update Currency');
            loadCurrencyTable();
        });

    });
</script>
