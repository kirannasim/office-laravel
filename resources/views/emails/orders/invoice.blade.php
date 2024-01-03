@component('mail::message')
    {{_t('order.invoice_text')}}

    <b>{{_t('order.bill_to')}}</b>

    {{ $delivery_address }}

    @component('mail::panel')
        <b>{{_t('order.invoice_detail')}}</b><br>
        {{_t('order.invoice_number')}}:  {{ $order_id  }}<br>
        {{_t('order.invoice_date')}}:  {{ $order->created_at }}<br>
        {{_t('order.invoice_amount_due')}}:  $ {{ $order->total }}<br>
    @endcomponent

    @if(getConfig('package','status'))
        @component('mail::table')
            <table>
                <thead>
                <tr>
                    <th>{{_t('order.description')}}</th>
                    <th>{{_t('order.quantity')}}</th>
                    <th>{{_t('order.price')}}</th>
                    <th>{{_t('order.discount')}}</th>
                    <th>{{_t('order.subtotal')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order_products as $product)
                    @php
                        $product_info = getPackageInfo($product['product_id'])
                    @endphp
                    <tr>
                        <td>
                            <h3>{{ $product_info->name }}</h3>
                            <p> {{ $product_info->description }} </p>
                        </td>
                        <td>@if(!$product['quantity']) 1 @else{{ $product['quantity'] }}@endif</td>
                        <td>{{ $product['subtotal'] }}$</td>
                        <td>{{ $product['discount'] }}$</td>
                        <td>{{ $product['total'] }}$</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endcomponent
    @endif
    @php
        $discount_total=0;
    @endphp
    @foreach($order->totals as $total)
        @if($total->opid==null)
            <div>
                <div>
                    <p>{{ $total->title }}</p>
                </div>
                <div>
                    <p>{{ $total->amount }}$</p>
                </div>
            </div>
            @php
                if($total->type=='discount')
                {
                $discount_total = $discount_total+$total->amount;
                }
            @endphp
        @endif
    @endforeach
    <div>
        <div>
            <h2>{{_t('order.subtotal')}}</h2>
            <p>{{ $order->subtotal }}</p>
        </div>
        <div>
            <h2>{{_t('order.discount')}}</h2>
            <p>{{ $discount_total }}$</p>
        </div>
        <div>
            <h2>{{_t('order.total')}}</h2>
            <p>{{ $order->total }}$</p>
        </div>
    </div>
    @component('mail::button', ['url' => ''])
        {{_t('order.contact_us')}}
    @endcomponent
    {{_t('order.thanks')}},<br>
    {{ config('app.name') }}
@endcomponent
