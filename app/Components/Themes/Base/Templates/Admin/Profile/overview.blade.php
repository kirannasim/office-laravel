@extends('Admin.Layout.master')
@section('content')

    <div class="profile-content">

        <div class="row">
            <div class="col-md-6">
                <!-- BEGIN PORTLET -->
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption caption-md">
                            <i class="icon-bar-chart theme-font hide"></i>
                            <span class="caption-subject font-blue-madison bold uppercase">{{_t('profile.downlines')}}</span>
                            <span class="caption-helper hide">weekly stats...</span>
                        </div>
                        <div class="actions">
                            <div class="btn-group btn-group-devided" data-toggle="buttons">
                                <label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
                                    <input type="radio" name="options" class="toggle"
                                           id="option1">{{_t('profile.today')}}</label>
                                <label class="btn btn-transparent grey-salsa btn-circle btn-sm">
                                    <input type="radio" name="options" class="toggle"
                                           id="option2">{{_t('profile.week')}}</label>
                                <label class="btn btn-transparent grey-salsa btn-circle btn-sm">
                                    <input type="radio" name="options" class="toggle"
                                           id="option2">{{_t('profile.month')}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row number-stats margin-bottom-30">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="stat-left">
                                    <div class="stat-chart">
                                        <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
                                        <div id="sparkline_bar">
                                            <canvas width="90" height="45"
                                                    style="display: inline-block; width: 90px; height: 45px; vertical-align: top;"></canvas>
                                        </div>
                                    </div>
                                    <div class="stat-number">
                                        <div class="title"> {{_t('profile.total')}} </div>
                                        <div class="number"> 2460</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="stat-right">
                                    <div class="stat-chart">
                                        <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
                                        <div id="sparkline_bar2">
                                            <canvas width="90" height="45"
                                                    style="display: inline-block; width: 90px; height: 45px; vertical-align: top;"></canvas>
                                        </div>
                                    </div>
                                    <div class="stat-number">
                                        <div class="title"> {{_t('profile.new')}} </div>
                                        <div class="number"> 719</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-scrollable table-scrollable-borderless">
                            <table class="table table-hover table-light">
                                <thead>
                                <tr class="uppercase">
                                    <th colspan="2"> MEMBER</th>
                                    <th> Earnings</th>
                                    <th> CASES</th>
                                    <th> CLOSED</th>
                                    <th> RATE</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="fit">
                                        <img class="user-pic" src="../assets/pages/media/users/avatar4.jpg"></td>
                                    <td>
                                        <a href="javascript:;" class="primary-link">Brain</a>
                                    </td>
                                    <td> $345</td>
                                    <td> 45</td>
                                    <td> 124</td>
                                    <td>
                                        <span class="bold theme-font">80%</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fit">
                                        <img class="user-pic" src="../assets/pages/media/users/avatar5.jpg"></td>
                                    <td>
                                        <a href="javascript:;" class="primary-link">Nick</a>
                                    </td>
                                    <td> $560</td>
                                    <td> 12</td>
                                    <td> 24</td>
                                    <td>
                                        <span class="bold theme-font">67%</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fit">
                                        <img class="user-pic" src="../assets/pages/media/users/avatar6.jpg"></td>
                                    <td>
                                        <a href="javascript:;" class="primary-link">Tim</a>
                                    </td>
                                    <td> $1,345</td>
                                    <td> 450</td>
                                    <td> 46</td>
                                    <td>
                                        <span class="bold theme-font">98%</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fit">
                                        <img class="user-pic" src="../assets/pages/media/users/avatar7.jpg"></td>
                                    <td>
                                        <a href="javascript:;" class="primary-link">Tom</a>
                                    </td>
                                    <td> $645</td>
                                    <td> 50</td>
                                    <td> 89</td>
                                    <td>
                                        <span class="bold theme-font">58%</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END PORTLET -->
            </div>
            <div class="col-md-6">
                <!-- BEGIN PORTLET -->
                <div class="portlet light ">
                    <div class="portlet-title tabbable-line">
                        <div class="caption caption-md">
                            <i class="icon-globe theme-font hide"></i>
                            <span class="caption-subject font-blue-madison bold uppercase">Feeds</span>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_1_1" data-toggle="tab"> {{_t('profile.debit')}} </a>
                            </li>
                            <li>
                                <a href="#tab_1_2" data-toggle="tab"> {{_t('profile.credit')}} </a>
                            </li>
                        </ul>
                    </div>
                    <div class="portlet-body">
                        <!--BEGIN TABS-->
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1_1">
                                <div class="slimScrollDiv"
                                     style="position: relative; overflow: hidden; width: auto; height: 320px;">
                                    <div class="scroller" style="height: 320px; overflow: hidden; width: auto;"
                                         data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2"
                                         data-initialized="1">
                                        <ul class="feeds">

                                            @foreach($transactions as $tran)
                                                @if($tran['payer']==$id)
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-success">
                                                                        <i class="fa fa-bell-o"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> {{_t('profile.you_have_rceived')}}  {{$tran['amount']}}  {{$tran['context']}}

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> {{date('Y-m-d',strtotime($tran['created_at']))}} </div>
                                                        </div>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="slimScrollBar"
                                         style="background: rgb(215, 220, 226); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 142.618px;"></div>
                                    <div class="slimScrollRail"
                                         style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_1_2">
                                <div class="slimScrollDiv"
                                     style="position: relative; overflow: hidden; width: auto; height: 337px;">
                                    <div class="scroller" style="height: 337px; overflow: hidden; width: auto;"
                                         data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2"
                                         data-initialized="1">
                                        <ul class="feeds">

                                            @foreach($transactions as $tran)
                                                @if($tran['payee']==$id)
                                                    <li>
                                                        <a href="javascript:;">
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> {{_t('profile.you_have_paid')}} {{$tran['amount']}}  {{$tran['context']}} </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> {{date('Y-m-d',strtotime($tran['created_at']))}} </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach

                                        </ul>
                                    </div>
                                    <div class="slimScrollBar"
                                         style="background: rgb(215, 220, 226); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div>
                                    <div class="slimScrollRail"
                                         style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div>
                                </div>
                            </div>
                        </div>
                        <!--END TABS-->
                    </div>
                </div>
                <!-- END PORTLET -->
            </div>
        </div>

    </div>

    <script type="text/javascript">

        $(document).ready(function () {
            $("#sparkline_bar").sparkline([8, 9, 10, 11, 10, 10, 12, 10, 10, 11, 9, 12, 11], {
                type: 'bar',
                width: '100',
                barWidth: 6,
                height: '45',
                barColor: '#F36A5B',
                negBarColor: '#e02222'
            });

            $("#sparkline_bar2").sparkline([9, 11, 12, 13, 12, 13, 10, 14, 13, 11, 11, 12, 11], {
                type: 'bar',
                width: '100',
                barWidth: 6,
                height: '45',
                barColor: '#5C9BD1',
                negBarColor: '#e02222'
            });
        })

        $(document).ready(function () {
            window.Echo.private('sendMailNortification')
                .listen('', (e) => {
                    console.log(e.update);
                });
        })

    </script>

@endsection


