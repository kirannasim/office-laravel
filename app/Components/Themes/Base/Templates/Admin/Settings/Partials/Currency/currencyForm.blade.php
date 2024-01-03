<div class="row">
    <div class="col-sm-12">
        <button type="button" class="bubble pulse-button animated showCurrencyTable"> Back</button>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 currencyAddsection">
        <form name="currencyForm" name="currencyForm" class="currencyForm">
            @if(isset($currencyData))
                <input type="hidden" name="edit_id" value="{{ $currencyData->id }}">
            @endif
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label">Name</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <input type="text" name="name" @if(isset($currencyData)) value="{{ $currencyData->name }}"
                               @endif class="form-control" placeholder="Enter Name">
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label">Code</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-code"></i>
                        </span>
                        <input type="text" name="code" @if(isset($currencyData)) value="{{ $currencyData->code }}"
                               @endif class="form-control" placeholder="Enter code">
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label">Symbol</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-lightbulb-o"></i>
                        </span>
                        <input type="text" name="symbol" @if(isset($currencyData)) value="{{ $currencyData->symbol }}"
                               @endif class="form-control" placeholder="Enter Symbol">
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label">Exchange rate</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-usd"></i>
                        </span>
                        <input type="text" name="exchange_rate"
                               @if(isset($currencyData)) value="{{ $currencyData->exchange_rate }}"
                               @endif class="form-control" placeholder="Enter Exchange Rate">
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <button type="button" class="btn dark btn-primary saveCurrency"> Save</button>
            </div>
        </form>
    </div>
</div>
<script>"use strict";

    $('.saveCurrency').click(function () {
        $.post("{{ route('currency.save') }}", $('.currencyForm').serialize(), function (response) {
            toastr.success('Currency Updated sucessfully');
        })
        loadCurrencyTable();
    });

    $('.showCurrencyTable').click(function () {
        loadCurrencyTable();
    })
</script>
