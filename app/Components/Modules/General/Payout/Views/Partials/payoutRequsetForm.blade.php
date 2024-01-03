<div class="requestPayout-tile">
    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
        <h4 class="widget-thumb-heading"> Balance</h4>
        <div class="widget-thumb-wrap">
            <i class="widget-thumb-icon bg-green icon-bulb"></i>
            <div class="widget-thumb-body">
                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="">{{ $balance }}</span>
            </div>
        </div>
    </div>
    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
        <h4 class="widget-thumb-heading"> minimum</h4>
        <div class="widget-thumb-wrap">
            <i class="widget-thumb-icon bg-green icon-bulb"></i>
            <div class="widget-thumb-body">
                <span class="widget-thumb-body-stat" data-counter="counterup"
                      data-value=""> {{ $payoutConfig['minimum'] }}</span>
            </div>
        </div>
    </div>
    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
        <h4 class="widget-thumb-heading"> maximum </h4>
        <div class="widget-thumb-wrap">
            <i class="widget-thumb-icon bg-green icon-bulb"></i>
            <div class="widget-thumb-body">
                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="">
                   {{ $payoutConfig['maximum'] }}</span>
            </div>
        </div>
    </div>
    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
        <h4 class="widget-thumb-heading"> accepted </h4>
        <div class="widget-thumb-wrap">
            <i class="widget-thumb-icon bg-green icon-bulb"></i>
            <div class="widget-thumb-body">
                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="">
                   {{ $accepted }}</span>
            </div>
        </div>
    </div>
    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
        <h4 class="widget-thumb-heading"> Pending </h4>
        <div class="widget-thumb-wrap">
            <i class="widget-thumb-icon bg-green icon-bulb"></i>
            <div class="widget-thumb-body">
                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="">
                    {{ $requested }}</span>
            </div>
        </div>
    </div>

</div>

<div class="row">
    {!! Form::open(['route' => 'save.payout.request','class' => 'payoutRequestForm ajaxSave','id' => 'payoutRequestForm']) !!}
    <input type="hidden" name="wallet" id="wallet" value="{{ $wallet }}">
    <div class="form-group">
        <div class="col-md-6">
            <label class="control-label">Amount</label>
            <input type="number" name="request_amount" id="request_amount" class="form-control"
                   placeholder="Enter Amount">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6">
            <label class="control-label">gateway</label>
            <select class="select2" name="gateway" id="gateway">
                @foreach($gateways as $gateway)
                    <option value="{{ $gateway['id'] }}">{{ $gateway['name'] }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <label class="control-label">remark</label>
            <textarea name="remark" id="remark" class="form-control" rows="3"></textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-9">
            <button type="button" class="btn dark savePayoutRequest ladda-button" data-style="contract">
                <i class="fa fa-filter"></i>Next
            </button>
        </div>
    </div>
    {!! form::close() !!}

</div>
<script>"use strict";

    $(function () {
        //Select2
        $('.select2').select2({
            width: '100%'
        });
    });

    $('.savePayoutRequest').click(function () {
        simulateLoading('.PayourRequestWrapper');
        $.post("{{ route('save.payout.request') }}", $('.payoutRequestForm').serialize(), function (response) {
            loadSucessMessage();
        });
    });

    function loadSucessMessage() {
        $.post("{{ route('payout.requset.sucess') }}", $('.payoutRequestForm').serialize(), function (response) {
            $('.PayourRequestWrapper').html(response);
        });

    }


</script>
