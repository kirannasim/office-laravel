@include('Report.JoiningReport.Views.Partials.reportHeader')
@if($salesData->count())
    <table style="width: 100%;">
        <thead>
        <tr>
            <th>{{ _mt($moduleId,'SalesReport.sl_no') }}</th>
            <th> {{ _mt($moduleId,'SalesReport.user') }}</th>
            <th> {{ _mt($moduleId,'SalesReport.package') }}</th>
            <th> {{ _mt($moduleId,'SalesReport.total') }}</th>
            <th> {{ _mt($moduleId,'SalesReport.date') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($salesData as $sale)
            <tr>
                <td> {{ $loop->iteration }} </td>
                <td> {{ usernameFromId($sale->user_id) }} </td>
                <td>
                    @foreach($sale->products as $product)
                        {{  $product->package ? $product->package->name : '' }}
                    @endforeach
                </td>
                <td> {{ $sale->subtotal }} </td>
                <td> {{ $sale->created_at }} </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    {{ _mt($moduleId,'SalesReport.no_sale_available') }}
@endif
