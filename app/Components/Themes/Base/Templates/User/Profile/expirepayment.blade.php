 @extends('User.Layout.master')
    @section('content')
    @include('_includes.profile_nav')
    <div class="row">
        <div class="col-sm-12">
            <h4>Your Payment Methods</h4>
        </div>
        <div class="col-sm-12">
            <h4>Default : MasterCard 0011 Expiry:2025</h4>
        </div>

        <div class="col-sm-12">
            <h4>+ Add a new Recuring Payment</h4>
        </div>
    </div>

   <div class="row">
    <div class="col-sm-8">
        <div class="paycontainer" style="margin-top: 20px;">
            <div class="row">
                <div class="col-sm-4">
                    <img src="{{asset('images/logo1.png')}}" class="logo"/>
                </div>
                <div class="col-sm-8">
                    <h4 class="logocolor" style="font-size: 20px;">{{currency(79.95)}} MONTHLY SUBSCRIPTION PAYMENT</h4>
                </div>
            </div>
            <div class="row content_payment">
                <!-- <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-3" style="text-align: center;">
                            <div class="payment-item">
                                <img src="{{asset('images/payment/visa.png')}}" class="payicon">
                            </div>
                            <div class="radio-list">
                                <label class="radio-container">
                                    <input type="radio" name="payment_monthly_" value="visa"/>
                                    <span class="checkbox-circle"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3" style="text-align: center;">
                            <div class="payment-item">
                                <img src="{{asset('images/payment/paypal.png')}}" class="payicon">
                            </div>
                            <div class="radio-list">
                                <label class="radio-container">
                                    <input type="radio" name="payment_monthly_" value="paypal"
                                           data-title="Male"/>
                                    <span class="checkbox-circle"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3" style="text-align: center;">
                            <div class="payment-item">
                                <img src="{{asset('images/payment/klarna.png')}}" class="payicon">
                            </div>
                            <div class="radio-list">
                                <label class="radio-container">
                                    <input type="radio" name="payment_monthly_" value="klarna"
                                           data-title="Male"
                                           checked="checked"/>
                                    <span class="checkbox-circle"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="col-sm-10">
                    <div class="" style="text-align: center;">
                        <div class="row" style="display: flex;margin-top: 20px;">
                            <div class="col-sm-6">
                               <span class="btn btn-payment" attr_type="Payment-TransferWise" style="margin-left: auto;height:45px;display: flex;align-items: center;width: 100%"><span style="margin: auto;">IBAN PAYMENT</span></span> 
                            </div>
                            <!-- <div class="col-sm-6">
                                <span class="btn btn-payment" attr_type="Payment-B2BPay" style="width: 100%;justify-content: center;height: 45px; align-items: center;display: flex;">
                                <img src="{{asset('images/payment/Bitcoin.png')}}" style="width:50px;position: absolute;left: 0;"/>BITCOIN PAYMENT</span> 
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <input type="hidden" name="gateway"/>
                    <div class="row" style="padding-top: 31px;display: flex;">
                        <button class="btn btn-success enter" style="margin-left: auto;" attr_type="freepay" sub="">ENTER</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 
    <div class="row" style="margin-top: 30px;">
        <div class="col-sm-12">
            <h4>+ Add a Recuring For 1 Month</h4>
        </div>
        <div class="col-sm-8">
            <div class="paycontainer" style="margin-top: 20px;">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="{{asset('images/logo1.png')}}" class="logo"/>
                    </div>
                    <div class="col-sm-8">
                        <h4 class="logocolor" style="font-size: 20px;">{{currency(79.95)}} MONTHLY SUBSCRIPTION PAYMENT</h4>
                    </div>
                </div>
                <div class="row content_payment">
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-3" style="text-align: center;">
                                <div class="payment-item">
                                    <img src="{{asset('images/payment/visa.png')}}" class="payicon">
                                </div>
                                <div class="radio-list">
                                    <label class="radio-container">
                                        <input type="radio" name="payment_monthly_subscription" value="visa"/>
                                        <span class="checkbox-circle"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-3" style="text-align: center;">
                                <div class="payment-item">
                                    <img src="{{asset('images/payment/paypal.png')}}" class="payicon">
                                </div>
                                <div class="radio-list">
                                    <label class="radio-container">
                                        <input type="radio" name="payment_monthly_subscription" value="paypal"
                                               data-title="Male"/>
                                        <span class="checkbox-circle"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-3" style="text-align: center;">
                                <div class="payment-item">
                                    <img src="{{asset('images/payment/klarna.png')}}" class="payicon">
                                </div>
                                <div class="radio-list">
                                    <label class="radio-container">
                                        <input type="radio" name="payment_monthly_subscription" value="klarna"
                                               data-title="Male"
                                               checked="checked"/>
                                        <span class="checkbox-circle"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <input type="hidden" name="gateway"/>
                        <div class="row" style="padding-top: 50px;display: flex;">
                            <button class="btn btn-success enter" style="margin: auto;" sub="subscription">ENTER</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <script type="text/javascript">
        $('.enter').click(function(){
                var payment = "";
                $('input[name=payment_monthly_' + $(this).attr('sub') + ']').each(function(){
                    if(this.checked)
                    {
                        payment = $(this).val();
                    }
                })

                var gateway = "Payment-Genome";
                if(payment == 'visa')
                {
                    gateway = "Payment-ZotaPay";
                }

                var subscription = $(this).attr('sub');

                if(subscription == 'subscription')
                {
                    gateway = 'Payment-Genome';
                }
                
                if($(this).attr('attr_type') == 'freepay')
                {
                    gateway = 'Payment-Freejoin';
                }
                

                $.get("{{route('user.getGatewayitem')}}",{context:$('input[name=context]').val(),gateway:gateway}).then(res=>{
                    $('input[name=gateway]').val(res.id);
                   $.ajax({
                    url:'{{route("user.payment.handler")}}',
                    type:"POST",
                    data:{
                        gateway:res.id,
                        paymentmethod:payment,
                        expire:true,
                        recuriting:subscription,
                        amount:79.95,
                        context:'registration'     
                    },
                   
                    success: function (response) {
                        //Ladda.stopAll();
                        if(gateway == 'Payment-Zota')
                        {
                            if (response['result']['next'] == 'pending') {
                                window.location.replace(response['result']['redirectUri']);
                            }    
                        }
                        else if(gateway == 'Payment-Freejoin')
                        {
                            if (window.hasOwnProperty('paymentSuccessCallback')) {
                                window.paymentSuccessCallback(response, 'freejoin');
                            } 
                        }
                        else
                        {
                            var form = document.createElement("form");
                            form.method = "POST";
                            form.action = "{{route('Genome.payment')}}";
                            response = JSON.parse(response.result.message);
                            response['paymentmethod'] = payment;
                            response['expire'] = true;
                            response['recuriting'] = subscription;
                            for(item in response)
                            {
                                  const hiddenField = document.createElement('input');
                                  hiddenField.type = 'hidden';
                                  hiddenField.name = item;
                                  hiddenField.value = response[item];

                                  form.appendChild(hiddenField);
                            }

                            document.body.appendChild(form);
                            form.submit();
                        }
                        window.location.href = '{{route("user.home")}}';
                    },
                    failCallBack: function (response) {
                        Ladda.stopAll();
                    }
                })            
            })

            return false;

        })

        $('input[name=agreement]').change(function(){
            let checked = this.checked;
            $('.proceed').attr('disabled',!checked);
        })
        $('.btn-payment').click(function(){
            $('.btn-payment').each(function(){
                $(this).removeClass('btn-payment-selected');
            })

            $(this).addClass('btn-payment-selected');
        })

        $('select[name=country_id]').change(function(){
            $.get('{{route("transferwise.countryfilter")}}',{country:$(this).val()},function(res){
                res = JSON.parse(res);
                if(res.success)
                {
                    $('.btn-payment[attr_type=Payment-TransferWise]').html('IBAN PAYMENT');
                }   
                else
                {
                    $('.btn-payment[attr_type=Payment-TransferWise]').html('SWIFT PAYMENT');
                }
            })
        })
    </script>

    <style type="text/css">
        .payicon
        {
            width: 70%;
        }

        .paycontainer .logocolor
        {
            font-size: 13px;
        }
        .paycontainer .proceed
        {
            background-color: #08b790;
            border-color: #08b790;
            width: 50%;
        }

        .enter
        {
            background-color: #08b790;
            border-color: #08b790;   
            width: unset;
        }

        .payment-item
        {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            height:50px;
            width: 100%;
            justify-content: center;
        }

        .content_payment
        {
            margin: 20px;
            background-color: white;
            padding:20px;
        }

        .paycontainer .radio-list
        {
            width: 100%;
            height:30px;
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .payicon
    {
        width: 70%;
    }

    .paycontainer .logocolor
    {
        font-size: 13px;
    }
    .paycontainer .proceed
    {
        background-color: #08b790;
        border-color: #08b790;
        width: 50%;
    }

    .enter
    {
        background-color: #08b790;
        border-color: #08b790;   
    }

    .payment-item
    {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        height:50px;
        width: 100%;
        justify-content: center;
    }

    .content_payment
    {
        margin: 20px;
        background-color: white;
        padding:20px;
    }

    .paycontainer .radio-list
    {
        width: 100%;
        height:30px;
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .payicon
    {
        width: 70%;
    }

    .paycontainer .logocolor
    {
        font-size: 19px;
    }
    .paycontainer .proceed
    {
        background-color: #08b790;
        border-color: #08b790;
        width: 50%;
    }

    .enter
    {
        background-color: #08b790;
        border-color: #08b790;   
    }

    .payment-item
    {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
        height:50px;
        width: 100%;
        justify-content: center;
    }

    .content_payment
    {
        margin: 15px 20px 0 20px;
        background-color: white;
        padding:20px;
        justify-content: center;
    }

    .paycontainer .radio-list
    {
        width: 100%;
        height:30px;
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .footer_row
    {
        margin-top: 20px;
    }

    .footer_row .info img
    {
        width:45px;
        vertical-align: middle;
        display: inline-block;
    }

    .info
    {
        margin-top:20px;
    }
    .footer_desc
    {
        margin:0px 30px;
        display: inline-block;
        vertical-align: middle;
        color:grey;
        font-size: 14px;
    }

    .btn-payment
    {
        background-color: black;
        color: white;
        margin:auto;
        cursor:pointer;
        width: 200px;
    }

    .btn-payment-selected
    {
        background-color: grey;
    }

    .btn-payment:hover
    {
        background-color: grey;
    }
    </style>
    @endsection



