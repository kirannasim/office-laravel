<div class="heading">
    <h3>{{ _t('member.wallets') }}</h3>
</div>
<div class="walletsWrapper row" data-user="{{ $user->id }}">
    <div class="col-md-3 col-sm-3 managementNav">
        @foreach($wallets as $wallet)
            <div class="eachWallet @if ($loop->first) active @endif" data-wallet="{{ $wallet->moduleId }}">
                <i class="icon-wallet"></i>{{ $wallet->data->get('name') }}
            </div>
        @endforeach
    </div>
    <div class="walletHolder col-md-9 col-sm-9">
        @foreach($wallets as $wallet)
            <div class="wallet @if ($loop->first) active @endif" data-target="{{ $wallet->moduleId }}">
                <div class="eachSection col-md-12 mfkToggleWrap">
                    {{--@if($wallet->registry['slug'] != "Wallet-BusinessWallet")
                        <div class="loadTransaction" data-id="{{ $wallet->moduleId }}"> Transactions</div>
                    @endif--}}
                    <h4 class="mfkToggle open">{{ _t('member.summary') }}</h4>

                    <div class="sectionWrapper row toggleBody" style="display: block">
                        <div class="txnInfo">
                            <div class="balanceHolder col-md-7">
                                <i class="fa fa-google-wallet"></i>
                                {{ currency($wallet->data['balance']) }}
                            </div>
                            <div class="txnMeta col-md-5">
                                <div class="txnOut">
                                    <i class="fa fa-caret-up"></i>
                                    <span class="amount">{{ prettyCurrency($wallet->data['cashOut']['amount']) }}</span>
                                </div>
                                <div class="txnIn">
                                    <i class="fa fa-caret-down"></i>
                                    <span class="amount">{{ prettyCurrency($wallet->data['cashIn']['amount']) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="eachSection col-md-12 mfkToggleWrap">
                    <h4 class="mfkToggle open">{{ _t('member.cashinflow') }}</h4>
                    <div class="sectionWrapper row toggleBody" style="display: block">
                        <div class="col-md-4">
                            <div class="flowDetails">
                                <div class="each">
                                    <label>{{ _t('member.Total') }}</label>
                                    <span class="value">{{ currency($wallet->data['cashIn']['amount']) }}</span>
                                </div>
                                <div class="each">
                                    <label>{{ _t('member.transactions') }}</label>
                                    <span class="value">{{ $wallet->data['cashIn']['txnNos'] }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="cashInFlow {{ $wallet->data['name'] }}CashIn"
                                 id="{{ $wallet->data['name'] }}CashInFlow" data-module="{{ $wallet->moduleId }}"></div>
                        </div>
                    </div>
                </div>
                <div class="eachSection col-md-12 mfkToggleWrap">
                    <h4 class="mfkToggle open">{{ _t('member.cashoutflow') }}</h4>
                    <div class="sectionWrapper row toggleBody" style="display: block">
                        <div class="col-md-4">
                            <div class="flowDetails">
                                <div class="each">
                                    <label>{{ _t('member.Total') }}</label>
                                    <span class="value">{{ currency($wallet->data['cashOut']['amount']) }}</span>
                                </div>
                                <div class="each">
                                    <label>{{ _t('member.transactions') }}</label>
                                    <span class="value">{{ $wallet->data['cashOut']['txnNos'] }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="cashOutFlow {{ $wallet->data['name'] }}CashOut"
                                 id="{{ $wallet->data['name'] }}CashOut" data-module="{{ $wallet->moduleId }}"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<script>
    "use strict";

    $(function () {
        var graphs = {};
        @foreach($wallets as $wallet)
            graphs['{{ $wallet->moduleId }}'] = {
            cashIn: {!! json_encode($wallet->data['cashIn']['graph']) !!},
            cashOut: {!! json_encode($wallet->data['cashOut']['graph']) !!},
            moduleId: {{ $wallet->moduleId }}
        };
        @endforeach
        // switch wallet
        $('.managementNav .eachWallet').click(function () {
            var walletId = $(this).attr('data-wallet');
            $(this).addClass('active').siblings().removeClass('active');
            var target = $('.walletHolder .wallet[data-target="' + walletId + '"]');
            target.addClass('active').siblings().removeClass('active');
            if ($(this).hasClass('graphInitialized'))
                return;
            ['cashIn', 'cashOut'].forEach(function (value) {
                $('.walletsWrapper[data-user="{{ $user->id }}"] .' + value + 'Flow[data-module="' + walletId + '"]').highcharts({
                    chart: {
                        zoomType: 'x',
                        style: {
                            fontFamily: 'Open Sans'
                        },
                        height: '200'
                    },
                    title: {
                        text: value + ' Flow'
                    },
                    xAxis: {
                        type: 'category'
                    },
                    yAxis: {
                        title: {
                            text: "{{ _t('member.amount') }}"
                        },
                        minPadding: 0.5
                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        area: {
                            fillColor: {
                                linearGradient: {
                                    x1: 0,
                                    y1: 0,
                                    x2: 0,
                                    y2: 1
                                },
                                stops: [
                                    [0, Highcharts.getOptions().colors[0]],
                                    [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                                ]
                            },
                            marker: {
                                radius: 2
                            },
                            lineWidth: 1,
                            states: {
                                hover: {
                                    lineWidth: 1
                                }
                            },
                            threshold: null
                        }
                    },
                    series: [{
                        type: 'area',
                        name: value + ' per month',
                        data: graphs[walletId][value]
                    }]
                });
            });
            $(this).addClass('graphInitialized');
        });
        $('.managementNav .eachWallet.active').trigger('click');
    });


    $('.loadTransaction').click(function () {
        var moduleId = $(this).attr('data-id');
        var user_id = "{{ $user->id }}";
        $.post("{{ route('management.members.transactions') }}", {
            moduleId: moduleId,
            user_id: user_id
        }, function (response) {
            $('.walletsWrapper').html(response);
        })
    });

</script>
<style>
    .loadTransaction {
        position: absolute;
        right: 10px;
        cursor: pointer;
        color: #3598dd;
        text-decoration: underline;
    }

    .loadTransaction:hover {
        color: #155c8e;
    }

    .walletsWrapper.row {
        margin: 0px;
    }

    .walletsWrapper.row .transactionList {
        padding: 15px 15px;
    }
</style>
