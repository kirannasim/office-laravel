<div class="b2bPayment">
    <div class="content">
        <div class="b2bPaymentErrors" style="display: none"></div>
    </div>
    <div class="content-payment">
        <button class="btn button #ff26bb ladda-button btn-outline btn-circle loadpayment"
                data-spinner-color=#ff26bb
                type="button"
                data-style="contract">
            <i class="fa fa-money"></i>Pay now
        </button>
    </div>
</div>

<script type="text/javascript">
     $('.loadpayment').click(function(){
        var options = {
            actionUrl: '{{ scopeRoute("payment.handler") }}',
            successCallBack: function (response) {
                Ladda.stopAll();
                var form = document.createElement("form");
                form.method = "POST";
                form.action = "{{route('Genome.payment')}}";
                response = JSON.parse(response.result.message);
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
            },
            failCallBack: function (response) {

            }
        };
        sendForm(options);
    })
    
</script>

<style>
    .b2bPayment button {
        width: auto !important;
        font-weight: 600;
        padding: 3px 10px !important;
        margin: 25px auto;
        display: block;
    }

    .b2bPaymentErrors {
        text-align: center;
        max-width: 500px;
        margin: auto;
        font-size: 12px;
        border-radius: 5px !important;

        background: #4F91FF;
        color: #4F91FF;
    }

    .b2bPayment button img {
        width: 27px;
        margin-right: 5px;
        color: #0FD6C5;
    }

    
</style>

