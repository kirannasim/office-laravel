<div class="b2bPayment">
    <h3>
        <img id="ddql132r4EVM4M:" src="{{asset('images/zotapay.png')}}" jsaction="load:str.tbn" class="rg_ic rg_i" alt="Image result for b2b pay logo" style="width: 225px; height: 100px; margin-left: 19px; margin-right: 19px; margin-top: -26px;" data-atf="1">
    </h3>
    <div class="content">
        <button class="btn button #ff26bb ladda-button btn-outline btn-circle zotaPaymentStart"
                data-spinner-color=#ff26bb
                type="button"
                data-style="contract">
            <i class="fa fa-money"></i>Pay now
        </button>
        <div class="b2bPaymentErrors" style="display: none"></div>
    </div>
</div>

<script type="text/javascript">
    $('.zotaPaymentStart').click(function () {
        var options = {
            actionUrl: '{{ scopeRoute("payment.handler") }}',
            successCallBack: function (response) {
                Ladda.stopAll();
                if (response['result']['next'] == 'pending') {
                    window.location.replace(response['result']['redirectUri']);
                }
            },
            failCallBack: function (response) {
                Ladda.stopAll();
            }
        };
        sendForm(options);
    });

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