<div class="securityPinWrapper">
    <input type="hidden" name="nonce"
           value="{{ $nonce }}">
    <input type="hidden" name="action" value="{{ $action }}">
    <div class="innerWrap">
        <div class="eachField">
            <label>{{ _t('security.Please_enter_your_pin') }}</label>
        </div>
        <div class="eachField">
            <input type="password" placeholder="{{ _t('security.Enter_pin') }}">
        </div>
        <div class="eachField">
            <button class="btn blue submitPin ladda-button" data-style="contract" type="button">
                {{ _t('security.Submit') }}
            </button>
        </div>
    </div>
</div>
<div class="securityPin errors"></div>
<script type="text/javascript">
    "use strict";

    $(function () {
        Ladda.bind('.ladda-button');
    });

    $('body').off('click', '.securityPinWrapper .submitPin')
        .on('click', '.securityPinWrapper .submitPin', function () {
            var options = {
                pin: $('.securityPinWrapper input[type="password"]').val(),
                nonce: $('.securityPinWrapper input[name="nonce"]').val(),
                action: $('.securityPinWrapper input[name="action"]').val(),
            };

            if (window.hasOwnProperty('pinRequestOptions'))
                options = $.extend(options, window.pinRequestOptions);

            $.post('{!! route("securityPin.validate") !!}', options, function (response) {
                Ladda.stopAll();

                if (window.hasOwnProperty('securityPinSuccessCallback'))
                    window.securityPinSuccessCallback(response);

            }).fail(function (response) {
                Ladda.stopAll();
                $('.securityPin.errors').slideDown();

                if (window.hasOwnProperty('failureCallback'))
                    window.securityPinFailCallback(response);

                switch (response.status) {
                    case 403:
                        $('.securityPin.errors')
                            .empty().append('<div class="error">Unauthorized attempt!</div>')
                            .slideDown();

                        if (window.hasOwnProperty('securityPinCallback_403'))
                            window.securityPinCallback_403();

                        break;
                    case 401:
                        var errors = response.responseJSON;
                        $('.securityPin.errors')
                            .empty().html('<div class="error">' + errors.error + '</div>')
                            .slideDown();

                        if (window.hasOwnProperty('securityPinCallback_401'))
                            window.securityPinCallback_403();
                        break;
                    case 422:
                        var errors = response.responseJSON;
                        $('.securityPin.errors')
                            .empty().closest('.securityPinWrapper .pinLoader')
                            .slideUp().siblings().slideDown();

                        if (window.hasOwnProperty('securityPinCallback_422'))
                            window.securityPinCallback_422();
                        break;
                }
            });
        });
</script>

<style>
    .securityPin.errors {
        display: none;
        text-align: center;
        background: #d12929;
        max-width: 400px;
        padding: 3px;
        font-size: 13px;
        margin: 15px auto;
        color: white;
    }
</style>
