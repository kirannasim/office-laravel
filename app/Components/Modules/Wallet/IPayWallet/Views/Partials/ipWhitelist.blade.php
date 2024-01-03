@php
    $ip = isset($walletSettings->ip) ? $walletSettings->ip : null;
    $ipStatus = isset($walletSettings->ip_status) ? $walletSettings->ip_status : 0;
@endphp

<div class="whiteListIp">
    <h2>{{ _mt($moduleId,'IPayWallet.IP_Restriction') }}</h2>
    <div class="errorNotice">
        <h3>{{ _mt($moduleId,'IPayWallet.something_went_wrong') }}</h3>
        <div class="errorWrapper"></div>
    </div>
    <div class="tabHolder">
        <div class="tab">
            <div class="buttonBase {{ $ipStatus ? 'on' : 'off' }}">
                <span class="on">{{ _mt($moduleId,'IPayWallet.on') }}</span>
                <span class="off">{{ _mt($moduleId,'IPayWallet.off') }}</span>
                <span class="switch"></span>
            </div>
            <div class="inputHolder">
                <input type="text" name="ipAddress" id="ipAddress" placeholder="IP Address"
                       value="{{ $ip }}" {{ $ipStatus ? '' : 'disabled' }}>
                <input type="hidden" name="ipStatus" value="{{ $ipStatus }}">
            </div>
            <button class="btn gray getSystemIp ladda-button" data-style="contract" type="button">
                <i class="fa fa-refresh"></i>
            </button>
            <button class="btn green updateIp ladda-button" data-style="contract" type="button">
                <i class="fa fa-check"></i>
            </button>
        </div>
    </div>
    <div class="transactionPassLoader"></div>
</div>

<script type="text/javascript">
    "use strict";

    //Document ready
    $(function () {
        Ladda.bind('.ladda-button');
        window.transactionPassSuccessCallback = function (response) {
            $('.transactionPassLoader').slideUp().siblings('.tabHolder').slideDown();

            var clone = $('.updateIp').clone();

            $('.updateIp').html('saved !');

            setTimeout(function () {
                $('.updateIp').html(clone.html());
            }, 1000);
        };
    });

    $('.buttonBase').click(function () {
        if ($(this).hasClass('on')) {
            $(this).removeClass('on').addClass('off');
            $('.whiteListIp .tab input[type="text"]').attr('disabled', 'disabled');
            $('.tab input[name="ipStatus"]').val(0);
        } else {
            $(this).removeClass('off').addClass('on');
            $('.whiteListIp .tab input[type="text"]').removeAttr('disabled');
            $('.tab input[name="ipStatus"]').val(1);
        }
    });

    $('.updateIp').click(function () {
        var me = $(this);
        $('.walletWrapper .errorNotice').slideUp();

        if (!validateIp() && $('.whiteListIp .buttonBase').hasClass('on')) {
            addValidationError({invalidIp: "{{ _mt($moduleId,'IPayWallet.IP_is_invalid') }}"});
            Ladda.stopAll();
            return false;
        }

        var post = $.post('{{ route(strtolower(getScope()).".ipaywallet.validate.ip.whitelist") }}', {
            ip: $('input[name="ipAddress"]').val(),
            ipStatus: $('input[name="ipStatus"]').val()
        }, function (response) {
            $('.tabHolder').slideUp();
            refreshAjaxData($('.transactionPassLoader'), '{!! route(strtolower(getScope()).".ipaywallet.tran.password.view") !!}');
            $('.transactionPassLoader').show();
            // postPayment();
        }).fail(function (response) {
            Ladda.stopAll();

            switch (response.status) {
                case 422:
                    var errors = response.responseJSON;
                    addValidationError(errors);
                    break;
            }
        });
    });

    function validateIp() {
        return $('.whiteListIp .tab input[type="text"]').val().length > 7;
    }

    //Reset all payment errors
    function resetValidationtErrors() {
        $('.errorNotice').slideUp().find('.errorWrapper').empty().slideUp();
    }

    //Add payment errors
    function addValidationError(errors) {
        //console.log(errors);
        $('.errorNotice').slideDown().find('.errorWrapper').empty().slideDown();

        for (var key in errors) {
            var message = $.isArray(errors[key]) ? errors[key][0] : errors[key];
            var outPut = '<div class="eachError">';
            outPut += '<span class="key">' + key + '</span><i>-</i>';
            outPut += '<span class="message">' + message + '</span>';
            outPut += '</div>';

            $('.errorNotice .errorWrapper').append(outPut);
        }
    }

    $('.getSystemIp').click(function () {
        $.getJSON('http://ipinfo.io', function (data) {
            $('#ipAddress').val(data['ip']);
            Ladda.stopAll();
        });
    });

</script>