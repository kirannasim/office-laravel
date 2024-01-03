@if($paymentGateways)
    <div class="col-md-3 col-sm-3 col-xs-12 gatewayNavWrap">
        <div class="gatewayNavInner">
            @foreach($paymentGateways as $gateway)
                <div class="paymentNavTab @if($loop->first) active @endif"
                     data-id="{{ $gateway->moduleId }}">
                <span class="paymentIco">
                    @if(isset($gateway->registry['icon']['image']))
                        <img src="{{ $gateway->registry['icon']['image'] }}">
                    @else
                        <i style="color: {{ isset($gateway->registry['icon']['color'])?$gateway->registry['icon']['color']:'' }}"
                           class="{{ $gateway->registry['icon']['font'] }}"></i>
                    @endif
                </span>
                    <span class="paymentLabel">{{ $gateway->registry['name'] }}</span>
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-12 paymentContainerWrap">
        @foreach($paymentGateways as $gateway)
            <div class="paymentContainer row @if($loop->first) active @endif" data-id="{{ $gateway->moduleId }}">
                {!! app()->make($gateway->registry['handle'])->renderView() !!}
            </div>
        @endforeach
        <input name="gateway" type="hidden"
               value="{{ isset($paymentGateways[0]->moduleId) ? $paymentGateways[0]->moduleId : '' }}">
    </div>
@else
    <div class="noGateways">
        {{_t('register.no_payment_gateway_installed')}}
    </div>
@endif

<script>
    "use strict";

    //Tab switching
    $('body').on('click', '.paymentNavTab', function () {
        $(this).addClass('active').siblings().removeClass('active');
        $(this).find('i').addClass('active');
        $(this).siblings().find('i').removeClass('active');
        var moduleId = $(this).attr('data-id');
        var target = $('.paymentContainer[data-id="' + moduleId + '"]');
        $('[name="gateway"]').val(moduleId);
        target.addClass('active').siblings().removeClass('active');
    });
</script>
