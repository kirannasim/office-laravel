<div class="walletOverview walletSettings">
    <div class="navWrapper setIcon">
        <ul class="navUl">
            <li data-unit="settings">
                <i class="fa fa-key"></i>
                <p>
                    @if(isset($walletSettings->transaction_password) && $walletSettings->transaction_password != null){{ _mt($moduleId,'IPayWallet.change_transaction_password') }} @else {{ _mt($moduleId,'IPayWallet.set_transaction_password') }} @endif
                </p>
            </li>
            <li data-unit="ipWhiteList">
                <i class="fa fa-television"></i>
                <p>{{ _mt($moduleId,'IPayWallet.IP_Restriction') }}</p>
            </li>
        </ul>
    </div>
    <div class="subPartials"></div>
</div>

<script type="text/javascript">
    'use strict';

    function loadPasswordChange() {
        simulateLoading('.subPartials');
        $('.subPartials').attr('data-unit', 'passwordChanger');
        refreshAjaxData($('.subPartials'));
    }

    $(function () {
        loadPasswordChange();

        Ladda.bind('.ladda-button');
        window.transactionPassSuccessCallback = function (response) {
            $('.transactionPassLoader').slideUp().siblings('.successNotice').slideDown();
        };

        //Switch tabs
        $('.walletOverview.walletSettings .navUl li').hover(function () {
            $(this).addClass('active').siblings().removeClass('active');
        }, function () {
            $(this).removeClass('active').siblings().removeClass('active');
        });

        //Load partials
        $('.walletOverview.walletSettings .navUl li').click(function () {
            var me = $(this);
            $('.subPartials').attr('data-unit', $(this).attr('data-unit'));
            refreshAjaxData($('.subPartials'));
        });
    });
</script>