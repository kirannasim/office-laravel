<div class="summaryWrapper table-responsive">
    <h4>{{_t('order.order_summery')}}</h4>
    <table class="summaryTable table table-bordered table-striped fieldTable">
        <thead>
        <th>{{_t('order.item')}}</th>
        <th>{{_t('order.net_amount')}}</th>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
        @foreach($fees as $fee)
            <tr>
                <td class="feeTitle">{{ $fee['title'] }}</td>
                <td class="feeAmount">{{ currency($fee['amount']) }}</td>
            </tr>
        @endforeach

        @foreach($taxes as $tax)
            <tr>
                <td class="feeTitle">{{ $tax['title'] }}</td>
                <td class="feeAmount">{{ currency($tax['amount']) }}</td>
            </tr>
        @endforeach

        @foreach($discounts as $discount)
            <tr>
                <td class="discountTitle">{{ $discount['title'] }}</td>
                <td class="discountAmount">{{ currency($discount['amount']) }}</td>
            </tr>
        @endforeach

        <tr class="order-footer">
            <td colspan="1" style="padding-top: 16px;">{{_t('order.total')}}</td>
            <td colspan="1" class="order-total">{{ currency($total) }}</td>
        </tr>
        </tfoot>
    </table>
</div>
