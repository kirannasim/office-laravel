@if($payoutStatus)
    <div class="portlet light col-md-12 newPayout">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-speech"></i>
                <span class="caption-subject bold uppercase">{{ _mt($moduleId,'Payout.Request_Payout') }}</span>
                <span class="caption-helper">{{ _mt($moduleId,'Payout.send_request') }}</span>
            </div>
        </div>
        <div class="portlet-body">
            <div class="PayoutRequestWrapper">
                {!! Form::open(['route' => strtolower(getScope()).'.payout.request.selectWallet','class' => 'walletSelectForm ajaxSave','id' => 'payoutRequestForm', 'novalidate' => 'novalidate']) !!}
                <input type="hidden" name="context" value="payout">
                <div class="row payoutRequestProgress">
                    <div class="progressHolder col-md-12">
                        <div class="milestone selectWallet active" data-target="walletSelection">
                            <span>1</span>
                            <p>{{ _mt($moduleId,'Payout.Select_wallet') }}</p>
                        </div>
                        <div class="milestone target">
                            <span>2</span>
                            <p>{{ _mt($moduleId,'Payout.Withdraw_to') }}</p>
                        </div>
                        <div class="milestone process">
                            <span>3</span>
                            <p>{{ _mt($moduleId,'Payout.Process') }}</p>
                        </div>
                        <div class="milestone finish">
                            <i class="fa fa-check"></i>
                        </div>
                    </div>
                </div>
                <div class="panel active" data-target="walletSelection">
                    <div class="row walletInfo"></div>
                </div>
                <div class="panel" data-target="target">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="walletPicker">
                                <h3>{{ _mt($moduleId,'Payout.Withdraw_to') }}</h3>
                                <select class="select2 gateway" name="gateway" id="gateway">
                                    @foreach($targets as $target)
                                        <option value="{{ $target->moduleId }}">{{ $target->registry['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="payoutView">{{--{!! $targets[0]->payoutView() !!}--}}</div>
                        </div>
                    </div>
                </div>
                <div class="panel" data-target="process">
                    <div class="txnPassWrapper"></div>
                </div>
                <div class="panel" data-target="finish">
                    <div class="payoutRequestSuccess">
                        <h2><i class="fa fa-check"></i> Your request has been submitted</h2>
                        <button type="button" class="btn blue backToNewRequest"><i class="fa fa-refresh"></i>Back
                        </button>
                    </div>
                </div>
                <div class="actionButtons">
                    <button class="btn blue prev" type="button" style="display: none;"><i
                                class="fa fa-angle-left"></i> Back
                    </button>
                    <button class="btn green proceed" type="button">{{ _mt($moduleId,'Payout.Proceed') }} <i
                                class="fa fa-angle-right"></i></button>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="col-md-12">
        {{ _mt($moduleId,'Payout.you_have_request_in_pending') }}
    </div>
@endif
<script>
    "use strict";

    $(function () {
        //select2
        $('.select2').select2({
            width: '100%',
        });

        $('.NextStep').click(function () {
            loadPayoutRequestForm();
        });

        $('.newPayout .proceed').click(function () {
                var me = $(this);
                var currentPanel = $('.newPayout .panel.active');
                var currentProgress = $('.progressHolder .milestone.active');

                currentProgress.addClass('done').next().addClass('active');

                switch (currentPanel.data('target')) {
                    case 'target':
                        me.hide();
                        $('.newPayout .prev').hide();
                        loadPayoutTxnPass();
                        currentPanel.next().addClass('active').siblings().removeClass('active');
                        break;
                    case 'walletSelection':
                        var errorsElem = $('.PayoutRequestWrapper .payout.requestedAmount .errors');
                        errorsElem.slideUp();
                        validateRequest().done(function () {
                            me.prev().show();
                            currentPanel.next().addClass('active').siblings().removeClass('active');
                        }).fail(function (response) {
                            var moveOn = false;
                            var errors = response.responseJSON;
                            errorsElem.empty().slideDown();

                            for (var key in errors)
                                errorsElem.append('<div class="error">' + errors[key][0] + '</div>');
                        });

                        break;
                    default:
                        currentPanel.next().addClass('active').siblings().removeClass('active');
                        me.hide();
                        break;
                }
            }
        );

        $('.newPayout .prev').click(function () {
                var me = $(this);
                var currentPanel = $('.newPayout .panel.active');
                var currentProgress = $('.progressHolder .milestone.active').last();

                if (currentProgress.index() == 0) return;

                currentProgress.removeClass('active done');
                currentPanel.prev().addClass('active').siblings().removeClass('active').promise().done(function () {
                    switch (currentPanel.data('target')) {
                        case 'process':
                            me.siblings().show();
                            break;
                    }
                });
            }
        );

        $('.backToNewRequest').click(function () {
            $('.singleNav.active').trigger('click');
        });

        $(".gateway").change(function () {
            console.log($("#gateway").val());
            loadGatewayView({'gateway': $("#gateway").val()});
        });

        loadGatewayView({'gateway': $("#gateway").val()});

        loadWalletPicker();
    });

    function loadPayoutTxnPass() {
        simulateLoading($('.newPayout .txnPassWrapper'));

        $.get($('.walletPicker select option:selected').data('txn'), function (response) {
            $('.newPayout .txnPassWrapper').html(response).promise().done(function () {
                window.paymentSuccessCallback = function (response) {
                    $('.progressHolder .milestone.process, .progressHolder .milestone.finish').addClass('active done');
                    $('.PayoutRequestWrapper .panel').removeClass('active');
                    $('.PayoutRequestWrapper .panel[data-target="finish"]').addClass('active');
                };
                setTimeout(function () {
                    $('.payoutRequestSuccess').addClass('done');
                }, 700);
                window.txnPassRequestOptions = formValues('.PayoutRequestWrapper form');
            });
        });
    }

    function loadWalletPicker() {
        simulateLoading($('.newPayout .walletInfo'));

        return $.post('{{ scopeRoute("payout.request.walletPicker") }}', function (response) {
            $('.newPayout .walletInfo').html(response);
        });
    }

    function loadGatewayView(args) {
        simulateLoading($('.PayoutRequestWrapper .payoutView'));

        return $.post('{{ scopeRoute("payout.request.gatewayView") }}', args, function (response) {
            $('.PayoutRequestWrapper .payoutView').html(response);
        });
    }

    function validateRequest() {
        var formData = formValues('.PayoutRequestWrapper form');
        return $.post('{{ scopeRoute("payout.request.validate") }}', formData, function (response) {
            console.log(response)
        }).fail(function (response) {
            console.log(response)
        });
    }
</script>
