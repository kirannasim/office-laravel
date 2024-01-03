@extends('Admin.Layout.master')
@section('title','getoncode invoice')

@section('content')
    <div class="InvoiceWrapper" id="InvoiceWrapper">
        <div class="invoice-content-2 bordered">
            <div class="row invoice-head">
                <div class="col-md-7 col-xs-6">
                    <div class="invoice-logo">
                        <img src="{{themeAssetUrl('layouts/layout/img/logo-invert.png')}}"/>
                        <h1 class="uppercase">{{_t('order.invoice')}}</h1>
                    </div>
                </div>
                <div class="col-md-5 col-xs-6">
                    <div class="company-address">
                        <span class="bold uppercase">{{ $company_name}}</span>
                        <br>
                        {!! $company_address !!}

                    </div>
                </div>
            </div>
            <div class="row invoice-cust-add">
                <div class="col-xs-3">
                    <h2 class="invoice-title uppercase">{{_t('order.customer')}}</h2>
                    <p class="invoice-desc">{{ idToUsername($order->user_id) }}</p>
                </div>
                <div class="col-xs-3">
                    <h2 class="invoice-title uppercase">{{_t('order.date')}}</h2>
                    <p class="invoice-desc">{{ $order->created_at }}</p>
                </div>
                <div class="col-xs-6">
                    <h2 class="invoice-title uppercase">{{_t('order.address')}}</h2>
                    <p class="invoice-desc inv-address">{{ $delivery_address }}</p>
                </div>
            </div>
            @if(getConfig('package','status'))
                <div class="row invoice-body">
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th class="invoice-title uppercase">{{_t('order.description')}}</th>
                                <th class="invoice-title uppercase text-center">{{_t('order.quantity')}}</th>
                                <th class="invoice-title uppercase text-center">{{_t('order.price')}}</th>
                                <th class="invoice-title uppercase text-center">{{_t('order.discount')}}</th>
                                <th class="invoice-title uppercase text-center">{{_t('order.subtotal')}}</th>
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
                                    <td class="text-center sbold">@if(!$product['quantity'])
                                            1 @else{{ $product['quantity'] }}@endif</td>
                                    <td class="text-center sbold">{{ $product['subtotal'] }}$</td>
                                    <td class="text-center sbold">{{ $product['discount'] }}$</td>
                                    <td class="text-center sbold">{{ $product['total'] }}$</td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            @php
                $discount_total=0;
            @endphp
            @foreach($order->totals as $total)
                @if($total->opid==null)

                    <div class="row invoice-subtotal @if($total->type=='discount') discount_class @else fees_class  @endif"
                         style="text-align: right">
                        <div class="col-xs-9">
                            <p class="invoice-desc">{{ $total->title }}</p>
                        </div>
                        <div class="col-xs-3">
                            <p class="invoice-desc">{{ $total->amount }}$</p>
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


            <div class="row invoice-subtotal">
                <div class="col-xs-3">
                    <h2 class="invoice-title uppercase">{{_t('order.subtotal')}}</h2>
                    <p class="invoice-desc">{{ $order->subtotal }}</p>
                </div>
                <div class="col-xs-3">
                    <h2 class="invoice-title uppercase">{{_t('order.discount')}}</h2>
                    <p class="invoice-desc">{{ $discount_total }}$</p>
                </div>
                <div class="col-xs-6">
                    <h2 class="invoice-title uppercase">{{_t('order.total')}}</h2>
                    <p class="invoice-desc grand-total">{{ $order->total }}$</p>
                </div>
            </div>


        </div>

    </div>
    <div class="well">

        <div class="row">
            <div>
                <a class="btn btn-lg green-haze hidden-print uppercase print-btn" onclick="javascript:window.print();">Print</a>
            </div>
            <div>
                <button class="btn btn-lg red" id="download_pdf">
                    <i class="fa fa-file-pdf-o"></i> {{_t('order.download')}}
                </button>
            </div>
        </div>

    </div>

    {!!  Form::open(['route' => 'utils.api','class' => 'hidden','id' => 'pdfForm'])  !!}
    <input type="hidden" name="action" value="createPdf">
    <textarea name="data[content]" class="hidden pdfContent"></textarea>
    {!! Form::close() !!}
    <script type="text/javascript">
        $('#download_pdf').click(function () {
            downloadPdf();
        });

        function downloadPdf() {
            $('.pdfContent').val($('#InvoiceWrapper').html());
            $('#pdfForm').submit();
        }
    </script>
    <style>
        .discount_class {
            background-color: rgba(143, 188, 143, 0.22);
        }

        .fees_class {
            background-color: rgba(135, 206, 250, 0.42);
        }
    </style>


@endsection
