<div class="portlet light col-md-12">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-speech"></i>
            <span class="caption-subject bold uppercase">{{ _mt($moduleId,'Payout.Release_Payout') }}</span>
            <span class="caption-helper">{{ _mt($moduleId,'Payout.Manual_release') }}</span>
        </div>
        <div class="actions">
            <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"
               data-original-title="" title=""> </a>
        </div>
    </div>
    <div class="portlet-body">
        <div class="userWrapper">
            <div class="processFlow">
                <div class="timeline col-md-10">
                    <div class="col-md-4 mileStone active" data-position="select">
                        <i>1</i>
                        <div class="line">
                            <p>{{ _mt($moduleId,'Payout.Select') }}</p>
                        </div>
                    </div>
                    <div class="col-md-4 mileStone" data-position="shortlist">
                        <i>2</i>
                        <div class="line">
                            <p>{{ _mt($moduleId,'Payout.Configure') }}</p>
                        </div>
                    </div>
                    <div class="col-md-4 mileStone" data-position="process">
                        <i>3</i>
                        <div class="line">
                            <p>{{ _mt($moduleId,'Payout.Authorize_process') }}</p>
                        </div>
                    </div>
                </div>
                <div class="navigationButtons col-md-2">
                    <button type="button" data-target="init" class="btn backToPayout gray"
                            data-style="contract">
                        <i class="fa fa-arrow-left"></i>
                    </button>
                    <button type="button" data-action="init" class="btn dark proceedPayout ladda-button"
                            data-style="contract">
                        <i class="fa fa-arrow-right"></i>
                    </button>
                </div>
            </div>
            <div class="securityPin" data-unit="securityPin"></div>
            <div class="payoutProgress">
                <div class="innerBox">
                    <h3>
                        <i class="fa fa-spin fa-hourglass"></i> {{ _mt($moduleId,'Payout.please_wait_we_are_processing') }}
                    </h3>
                </div>
            </div>
            <div class="successPayout">
                <h2>
                    <i class="fa fa-check"></i>{{ _mt($moduleId,'Payout.Done') }} ..
                </h2>
                <p>{{ _mt($moduleId,'Payout.You_have_successfully_processed_the_payout') }}</p>
                {{--<div class="payoutInfo">
                    {{ _mt($moduleId,'Payout.Total_of') }} <span class="amount"></span> {{ _mt($moduleId,'Payout.in') }}
                    <span class="totalPayouts"></span>{{ _mt($moduleId,'Payout.payouts') }}
                </div>--}}
                <div class="actions">
                    {{--<button type="button" class="btn blue ladda-button payoutStatement" data-style="contract">
                        <i class="fa fa-file-text-o"></i>{{ _mt($moduleId,'Payout.payouts') }}
                    </button>--}}
                    <button type="button" class="btn red ladda-button processAnother" data-style="contract">
                        <i class="fa fa-exchange"></i>{{ _mt($moduleId,'Payout.Process_another') }}
                    </button>
                </div>
                <div class="statement"></div>
            </div>
            <form class="selectedPayouts">
                <input type="hidden" name="wallet" value="{{ $filters['wallet']['default'] }}">
                <input type="hidden" name="context" value="manualPayoutRelease">
                <div class="payoutErrors"></div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="finalizedAmount">
                            <label>{{ _mt($moduleId,'Payout.payout_amount') }}</label>
                            <input type="text" placeholder="Payout amount" name="amount">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="walletPicker">
                            <label>{{ _mt($moduleId,'Payout.withdrawn_from') }}</label>
                            <select class="select2" name="gateway" id="gateway">
                                @foreach($targets as $target)
                                    <option value="{{ $target->moduleId }}">{{ $target->registry['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="toAppend"></div>
            </form>
            <div class="allUsers">
                <form class="filterForm">
                    <div class="filters row">
                        <div class="eachFilter col-md-3">
                            <label>{{ _mt($moduleId,'Payout.Pick_wallet') }}</label>
                            <select class="select2" name="filters[wallet]">
                                @foreach($filters['wallet']['values'] as $wallet)
                                    @if($wallet->moduleId != $businessWallet)
                                        <option {{ ($filters['wallet']['default'] == $wallet->moduleId) ? 'selected' : '' }} value="{{$wallet->moduleId }}">{{ $wallet->registry['name'] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="eachFilter col-md-3">
                            <label>{{ _mt($moduleId,'Payout.Minimum_balance') }}</label>
                            <input type="text" value="{{ $filters['minBalance']['default'] }}"
                                   name="filters[minBalance]"
                                   placeholder="Minimum balance">
                        </div>
                        <div class="eachFilter col-md-3">
                            <label>{{ _mt($moduleId,'Payout.Maximum_balance') }}</label>
                            <input type="text" value="{{ $filters['maxBalance']['default'] }}"
                                   name="filters[maxBalance]"
                                   placeholder="Maximum balance">
                        </div>
                        <div class="eachFilter col-md-3">
                            <label>{{ _mt($moduleId,'Payout.Select_user') }}</label>
                            <input type="text" value="" class="userFiller"
                                   placeholder="Enter username">
                            <input type="hidden" name="filters[userId]" value="">
                        </div>
                    </div>
                    <div class="filters row">
                        <div class="filterButtonWrapper col-md-5">
                            <button type="button" class="btn dark payoutFilter ladda-button" data-style="contract">
                                <i class="fa fa-filter"></i>{{ _mt($moduleId,'Payout.Filter') }}
                            </button>
                        </div>
                    </div>
                </form>
                <div class="loadHere manualPayoutWrapper"></div>
            </div>
        </div>
    </div>
</div>

<script>
    "use strict";

    window.securityPinCallback_403 = function (response) {
        setTimeout(function () {
            refreshSecurityPin();
        }, 2000);
    }

    window.securityPinSuccessCallback = function (response) {
        $('.securityPin').hide().siblings('.payoutProgress').slideDown();
        releasePayout().done(function () {
            $('.payoutProgress').hide().siblings('.successPayout').slideDown();
        }).fail(function (response) {
            console.log(response);
        });
    }

    function refreshSecurityPin() {
        simulateLoading('.payoutPanel .securityPin');

        return $.post('{{ scopeRoute('payout.generateSecurityPin') }}', function (response) {
            $('.payoutPanel .securityPin').html(response).promise().done(function () {
                $('.securityPinWrapper').slideDown();
            });
        });
    }

    function releasePayout() {
        var formData = formValues('.selectedPayouts');
        return $.post('{{ scopeRoute('payment.handler') }}', formData, function (response) {
            $('.payoutPanel .successPayout').html(response.responseJSON).promise().done(function () {
                $('.securityPinWrapper').slideDown();
            });
        });
    }

    //Document ready functions
    $(function () {
        //init Ladda
        Ladda.bind('.ladda-button');
        //Select2
        $('.select2').select2({
            width: '100%'
        });
        //Filter user
        $('.payoutFilter').click(function () {
            loadUnit('users', $('.allUsers .loadHere'), false, [], formValues('.filterForm')).done(function () {
                Ladda.stopAll();
            });
        });
        //Ajax fetch init
        var selectedCallback = function (target, id, name) {
            target.val(name).siblings('input[name="filters[userId]"]').val(id);
        };
        var clearCallback = function (target) {
            target.siblings('input[type="hidden"]').val('');
        };
        var options = {
            target: '.userFiller',
            route: '{{ route("user.api") }}',
            action: 'getUsers',
            name: 'username',
            selectedCallback: selectedCallback,
            clearCallback: clearCallback
        };
        $('.userFiller').ajaxFetch(options);
        //Load users
        loadUnit('users', $('.allUsers .loadHere'), false, [], formValues('.filterForm'));
        //short list payout
        $('body')
            .off('click', '.proceedPayout')
            .on('click', '.proceedPayout', function () {
                switch ($(this).attr('data-action')) {
                    case 'init':
                        //Init payout
                        Ladda.stopAll();
                        if (!$('.allUsers input.icheck:checked').length) return;
                        $(this).siblings('.backToPayout').show();
                        $('.allUsers').slideUp().siblings('.selectedPayouts').show()
                            .find('input[name="wallet"]').val($('select[name="filters[wallet]"]').val())
                            .siblings('.toAppend').empty()
                            .html($('.userContainer.selected').parent().clone()).promise().done(function () {
                            $('.selectedPayouts .col-md-4').addClass('shortListed').chunk(3).wrap('<div class="row"></div>')
                        });
                        $(this).attr('data-action', 'authorize');
                        break;
                    case 'authorize':
                        //Authorize & validate
                        $('.mileStone[data-position="shortlist"]').addClass('active');
                        $('.backToPayout').attr('data-target', 'shortlist');

                        requestPayout($('.selectedPayouts')).done(function () {
                            $('.mileStone[data-position="process"]').addClass('active');
                            refreshSecurityPin().done(function () {
                                $('.selectedPayouts').slideUp();
                                $('.securityPinWrapper').slideDown();
                            });
                            Ladda.stopAll();
                        });

                        break;
                }
            });
        //Set payout amount
        $('.finalizedAmount input[type="text"]').keyup(function () {
            $('.selectedPayouts .amount input[type="number"]').val($(this).val());
        });
        //back and clear selected payout
        $('body')
            .off('click', '.backToPayout')
            .on('click', '.backToPayout', function () {
                switch ($(this).attr('data-target')) {
                    case 'init':
                        $(this).hide().siblings('.proceedPayout').show();
                        $('.selectedPayouts').hide().find('.toAppend').empty().siblings('input[name="wallet"]').val('');
                        $('.allUsers').show();
                        break;

                    case 'shortlist':
                        $(this).attr('data-target', 'init');
                        $('.proceedPayout').attr('data-action', 'init');
                        $('.transactionPass').hide().empty().siblings('.selectedPayouts').show();
                        $('.mileStone[data-position="shortlist"]').removeClass('active');
                        break;

                    case 'authorize':
                        $(this).attr('data-target', 'shortlist');
                        $('.successPayout').hide().siblings('.transactionPass').show();
                        break;
                }
            });
    });
    // Process another payout
    $('.processAnother').click(function () {
        $('.timeline .mileStone').not('.timeline .mileStone[data-position="select"]').removeClass('active');
        $('.proceedPayout').attr('data-action', 'init').show();
        $('.backToPayout').attr('data-action', 'init').show();
        $('.successPayout,.transactionPass, .selectedPayouts').hide().siblings('.allUsers').show();
        loadUnit('users', $('.allUsers .loadHere'), false, [], formValues('.filterForm')).done(function () {
            Ladda.stopAll();
        });
    });

    // request payout release
    function requestPayout(form) {
        $('.payoutErrors').empty().slideUp();
        var options = form ? form.serialize() : {};

        return $.post("{{ scopeRoute('payout.validate') }}", options, function (response) {
            Ladda.stopAll();
        }).fail(function (response) {
            Ladda.stopAll();
            console.log(response);
            switch (response.status) {
                case 422:
                    var errors = response.responseJSON;
                    $('.payoutErrors').empty().slideDown();
                    var errArr = [];
                    for (var key in errors) {
                        $('.payoutErrors').append('<div class="eachError">' + errors[key] + '</div>');
                    }
                    break;

                case 403:
                    loadUnit('transactionPassView', $('.transactionPass'), null, {verifyOnly: false}).done(function () {
                        $('.selectedPayouts').slideUp();
                        $('.transactionPass').show();
                        $('.proceedPayout').hide();
                    });
                    break;
            }
        });
    }
</script>

<style>
    .userContainer img {
        max-width: 100%;
        display: inline-block;
        float: left;
        width: 35px;
        margin-right: 5px;
    }

    .userContainer span.tools {
        float: right;
        right: 0;
        padding: 5px;
        top: 0;
        position: absolute;
    }

    .userContainer .meta {
        display: inline-block;
    }

    .payoutPanel .securityPin {
        margin-top: 25px;
    }

    .userContainer .meta h3 {
        font-size: 15px;
        font-weight: 600;
        margin: 0 0 5px;
        color: #585858;
    }

    .userContainer {
        border-top-left-radius: 5px !important;
        border-bottom-right-radius: 5px !important;
        margin-top: 15px;
        padding: 5px;
        position: relative;
        border: 1px solid #cccccc;
    }

    .userContainer .meta .balance {
        font-size: 14px;
        color: #7d7d7d;
    }

    .userContainer span.tools i {
        cursor: pointer;
        width: 20px;
        border: 1px solid #c1c1c1;
        padding: 1px;
        text-align: center;
        color: #c1c1c1;
    }

    .userContainer span.tools i:hover {
        color: #484848;
        border-color: #404040;
    }

    .selectAll {
        margin-top: 10px;
        font-size: 14px;
        color: #6f6f6f;
        font-weight: 600;
        text-align: right;
    }

    button.backToPayout {
        display: none;
    }

    button.proceedPayout,
    button.backToPayout {
        padding: 4px;
        margin-left: 10px;
    }

    .shortListed .amount {
        display: block !important;
    }

    .userContainer .amount {
        margin-top: 10px;
        display: none;
    }

    .userContainer .amount input {
        width: 100%;
        padding: 3px;
        border: 1px solid #ddd;
    }

    .selectedPayouts {
        display: none;
    }

    .userContainer .amount input {
        width: 100%;
        padding: 3px;
        border: 1px solid #ddd;
    }

    .userContainer .amount {
        margin-top: 10px;
    }

    .userWrapper .timeline {
        overflow: hidden;
        margin-bottom: 0;
    }

    .timeline:before {
        display: none;
    }

    .timeline .mileStone i {
        width: 35px;
        height: 35px;
        font-style: normal;
        padding: 5px;
        color: #ccc6c6;
        text-align: center;
        font-size: 15px;
        border-radius: 50%;
        display: inline-block;
        border: 2px solid #d6d1d1;
    }

    .timeline .mileStone.active i {
        border-color: #364150;
        color: #364150;
    }

    .timeline .mileStone .line {
        flex: 1;
    }

    .timeline .mileStone.active .line p {
        border-color: #364150;
    }

    .timeline .mileStone .line p {
        border-bottom: 2px solid #d8d8d8;
        font-size: 12px;
        text-indent: 3px;
        margin: 0;
        color: #adadad;
    }

    .timeline .mileStone {
        display: flex;
        padding: 0;
        margin-top: 10px;
    }

    .eachFilter input[type="text"] {
        width: 100%;
        outline: none;
    }

    .finalizedAmount {
        margin-bottom: 20px;

    }

    .finalizedAmount input {
        width: 100%;
        padding: 4px;
        outline: none;
        border: 1px solid #ddd;
    }

    .finalizedAmount i {
        margin-right: 5px;
    }

    .finalizedAmount button {
        margin-left: 10px;
        width: 120px !important;
    }

    .payoutFilter i {
        margin-right: 5px;
    }

    .payoutFilter {
        padding: 4px 10px;
    }

    .finalizedAmount input {
        display: block;
        width: 100% !important;
        float: none;
        min-height: 35px;
    }

    .payoutErrors {
        display: none;
        margin-top: 8px;
        background: #f5717a;
        color: white;
        border-top-right-radius: 3px !important;
        border-bottom-left-radius: 3px !important;
    }

    .payoutErrors .eachError {
        padding: 3px 8px;
        color: white;
        font-size: 13px;
        border-bottom: 5px solid white;
    }

    .payoutErrors .eachError:last-child {
        border-bottom: none;
    }

    .transactionPass {
        margin-top: 20px;
    }

    button.proceedPayout, button.backToPayout {
        margin-left: 10px;
        flex: 1;
    }

    button.proceedPayout p {
        display: inline-block;
        margin: 0;
    }

    button.proceedPayout i.back {
        display: none;
    }

    .basicProfile ul.profileTab {
        padding: 0;
        display: flex;
        overflow: hidden;
    }

    .basicProfile ul.profileTab li {
        list-style: none;
        cursor: pointer;
        font-size: 13px;
        flex: 1;
        border-bottom: 1px solid #cccccc;
        padding: 5px;
        float: left;
        color: #ccc;
    }

    .basicProfile {
        overflow: hidden;
    }

    .webui-popover-inner {
        min-width: 150px;
    }

    .basicProfile ul.profileTab li.active {
        color: #545454;
        border-bottom: 1px solid black;
    }

    .basicProfile ul.profileTab {
        padding: 0;
        display: flex;
        margin-bottom: 0;
        overflow: hidden;
    }

    .basicProfile ul.profileTab li {
        list-style: none;
        cursor: pointer;
        font-size: 13px;
        flex: 1;
        font-weight: 600;
        border-bottom: 2px solid #cccccc;
        padding: 5px;
        float: left;
        color: #ccc;
    }

    .basicProfile {
        overflow: hidden;
    }

    .webui-popover-inner {
        min-width: 150px;
    }

    .basicProfile ul.profileTab li.active {
        color: #545454;
        border-bottom: 2px solid #585858;
    }

    ul.profileTab .eachData {
        font-size: 12px;
    }

    .basicProfile .eachData {
        white-space: nowrap;
        color: #717171;
        display: flex;
        justify-content: space-between;
        overflow: hidden;
        font-size: 13px;
        padding: 4px;
        border-bottom: 1px dotted #dcdcdc;
    }

    .basicProfile .eachData label {
        margin-right: 12px !important;
        font-weight: 600;
        margin: 0;
        color: #6f7b79;
    }

    .basicProfile .eachData:last-child {
        border-bottom: none;
    }

    .basicProfile .panel.active {
        display: block;
        margin-bottom: 0;
    }

    .basicProfile .panel {
        display: none;
    }

    .basicProfile .panel .balance {
        font-size: 18px;
        border-bottom: 1px dotted #d0d0d0;
        padding: 2px 5px;
        /* text-align: center; */
        color: #19a98b;
    }

    .basicProfile .panel .balance label {
        font-size: 13px;
        margin-right: 5px;
        min-width: 30%;
        font-weight: 600;
        color: #828282;
    }

    .basicProfile .panel .withDrawn {
        /* text-align: center; */
        font-size: 18px;
        padding: 2px 5px;
        /* text-align: center; */
        color: #e7505a;
    }

    .basicProfile .panel .withDrawn label {
        font-size: 13px;
        color: #828282;
        min-width: 30%;
        font-weight: 600;
        margin-right: 5px;
    }

    .basicProfile .eachData.userId span {
        font-weight: 600;
        color: #e43a45;
    }

    .navigationButtons {
        display: flex;
        justify-content: flex-end;
    }

    .processFlow {
        overflow: hidden;
        margin-top: 10px;
    }

    .allUsers .noUsers {
        text-align: center;
        padding: 10px;
        font-size: 16px;
        font-style: italic;
        color: #a9a6a6;
    }

    .successPayout {
        text-align: center;
        display: none;
    }

    .successPayout p {
        margin: 0;
        padding: 5px;
        font-size: 16px;
        color: #616161;
    }

    .successPayout h2 {
        font-weight: 600;
        font-size: 30px;
        color: #616161;
    }

    .successPayout h2 i {
        margin-right: 5px;
        color: #1bbc9b;
    }

    .payoutInfo {
        margin-top: 10px;
        font-size: 15px;
        color: #989797;
        font-family: monospace;
    }

    .payoutInfo .amount {
        font-size: 25px;
        color: #504e4e;
    }

    .payoutInfo .totalPayouts {
        color: #e7505a;
        font-size: 25px;
    }

    button.payoutStatement {
        width: auto !important;
        border-radius: 2px !important;
        font-size: 14px;
    }

    .successPayout .statement {
        min-height: 100px;
        display: block;
    }

    button.payoutStatement i {
        margin-right: 5px;
    }

    button.payoutStatement {
        padding: 5px 7px;
    }

    button.processAnother {
        padding: 5px 7px;
        width: auto !important;
        border-radius: 2px !important;
    }

    .securityPin.errors {
        text-align: center;
        background: #d12929;
        max-width: 400px;
        padding: 3px;
        font-size: 13px;
        margin: 15px auto;
        color: white;
    }

    .payoutProgress {
        display: none;
        text-align: center;
        padding: 15px;
    }

    .payoutProgress h3 {
        font-size: 18px;
        font-weight: 600;
        color: #8b8484;
    }

    .payoutProgress h3 i {
        color: #cf9238;
    }

    .successPayout .actions {
        margin-top: 20px;
    }
</style>
