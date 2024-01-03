<div class="summaryWrapper table-responsive">
    <h4>{{_t('order.order_summery')}}</h4>
    <table class="summaryTable table table-bordered table-striped fieldTable">
        <thead>
        <tr>
            <th>{{_t('order.slno')}}</th>
            <th class="order-item">{{_t('order.item')}}</th>
            <th colspan="1">{{_t('order.price')}}</th>
            <th colspan="1">{{_t('order.net_amount')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product['entity']['name'] }}</td>
                <td>{{ currency($product['entity']['price']) }}</td>
                <td>
                    {{ currency($product['amount']) }}
                    {{--@php dd($product);@endphp--}}

                    @forelse($product['shipping'] as $charge)
                        <div class="productShipping">
                            <span class="title">{{ $charge['title'] }}</span>
                            <span class="amount">
                                {{ currency($charge['amount']) }} {{_t('order.added')}}
                            </span>
                        </div>
                    @empty
                    @endforelse

                    @forelse($product['discount'] as $discount)
                        <div class="productDiscount">
                            <span class="title">{{ $discount['title'] }}</span>
                            <span class="amount">
                                {{ currency($discount['amount']) }} {{_t('order.off_applied')}}
                            </span>
                        </div>
                    @empty
                    @endforelse
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td colspan="2"></td>
            <td colspan="1">{{_t('order.sub_total')}}</td>
            <td colspan="1">{{ currency($subTotal) }}</td>
        </tr>
        @foreach($fees as $fee)
            <tr>
                <td colspan="2"></td>
                <td colspan="1" class="feeTitle">{{ $fee['title'] }}</td>
                <td colspan="1" class="feeAmount">{{ currency($fee['amount']) }}</td>
            </tr>
        @endforeach

        @foreach($shipping as $shippingCharge)
            <tr>
                <td colspan="2"></td>
                <td colspan="1" class="feeTitle">{{ $shippingCharge['title'] }}</td>
                <td colspan="1" class="feeAmount">{{ currency($shippingCharge['amount']) }}</td>
            </tr>
        @endforeach

        @foreach($taxes as $tax)
            <tr>
                <td colspan="2"></td>
                <td colspan="1" class="feeTitle">{{ $tax['title'] }}</td>
                <td colspan="1" class="feeAmount">{{ currency($tax['amount']) }}</td>
            </tr>
        @endforeach

        @foreach($discounts as $discount)
            <tr>
                <td colspan="2"></td>
                <td colspan="1" class="discountTitle">{{ $discount['title'] }}</td>
                <td colspan="1" class="discountAmount">{{ currency($discount['amount']) }}</td>
            </tr>
        @endforeach

        <tr class="order-footer">
            <td colspan="2"></td>
            <td colspan="1" style="padding-top: 16px;">{{_t('order.total')}}</td>
            <td colspan="1" class="order-total">{{ currency($total) }}</td>
        </tr>
        </tfoot>
    </table>
</div>

