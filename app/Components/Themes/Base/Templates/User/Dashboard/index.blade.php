@extends('User.Layout.master')
@section('content')
    <div class="row personalInfoGridWrapper">
        {{--<div class="col-sm-2">
            <div class="infoGrid">
                <h3>TVC Cycles</h3>
                <h5>{{ $cycle }}</h5>
            </div>
        </div>--}}
        <div class="col-sm-2">
            <div class="infoGrid">
                <h3>Member ID</h3>
                <h5>{{ loggedUser()->customer_id }}</h5>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="infoGrid">
                <h3>Name</h3>
                <h5>{{ loggedUser()->metaData->firstname }} {{ loggedUser()->metaData->lastname }}</h5>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="infoGrid">
                <h3>CURRENT RANK</h3>
                <h5>{{ $currentRank && !empty($currentRank->rank) ? $currentRank->rank->name : 'No Rank' }}</h5>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="infoGrid">
                <h3>HIGHEST RANK</h3>
                <h5>{{ $highestRank && !empty($highestRank->rank) ? $highestRank->rank->name : 'No Rank'  }}</h5>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="infoGrid">
                <h3>PACKAGE</h3>
                <h5>{{ $package ? $package->name : 'No package' }}</h5>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="infoGrid">
                <h3>STATUS</h3>
                <h5>@if($active && ($active->extended_date < $today)) Active @else Inactive @endif</h5>
            </div>
        </div>
        {{--<div class="col-sm-2">
            <div class="infoGrid">
                <h3>EARNINGS</h3>
                <h5 class="amount"><span>€</span>{{ $commissionTotal }}</h5>
            </div>
        </div>--}}

    </div>
    <div class="row">
        <div class="col-sm-10">

            <div class="row careerWrapper" style="margin-top: 10px;">
                <div class="col-sm-12">
                    <br/>
                    <p onclick="copyLink(this,event)" attr_href="https://www.elysiumnetwork.io/{{ loggedUser()->customer_id }}"><b>Your</b> elysiumnetwork    <b>REFERRAL LINK: https://www.elysiumnetwork.io/{{ loggedUser()->customer_id }}</b></p>
                    <p onclick="copyLink(this,event)" attr_href="https://www.elysiumcapital.io/{{ loggedUser()->customer_id }}" style="margin-top: 20px;"><b>Your</b> elysiumcapital     <b>REFERRAL LINK: https://www.elysiumcapital.io/{{ loggedUser()->customer_id }}</b></p>
                    <script>
                        function copyLink(element, event) {
                            event.preventDefault();
                            var $temp = $("<input>");
                            $("body").append($temp);
                            $temp.val($(element).attr('attr_href')).select();
                            document.execCommand("copy");
                            $temp.remove();
                            alert('Copied to Clipboard');
                        }
                    </script>
                </div>
            </div>

             <div class="row careerWrapper" style="align-items: center;display: flex;">
                <div style="float: left;margin-left: 15px;display: flex;align-items: center;"><h3 style="margin-top: 2px;margin-bottom: 0px;">AUTOMATIC PLACEMENT SETTINGS</h3></div>
                <div class="radio-list" style="display: flex;align-items: center;margin-left: 15px;">
                    {{--<label class="radio-container">--}}
                        {{--<input type="radio" name="placement" value="auto"--}}
                               {{--data-title="AUTOMATIC"--}}
                               {{--checked="checked"/>--}}
                        {{--<span class="checkbox-circle"></span>--}}
                        {{--<h3 class="checkbox-name" style="margin-left: 34px !important;margin-top: 2px !important;">AUTOMATIC</h3>--}}
                    {{--</label>--}}
                    <label class="radio-container">
                        <input type="radio" name="placement" value="lleg"
                               data-title="LEFT LEG" {{($user->repoData && $user->repoData->default_binary_position == 1)?'checked':''}}/>
                        <span class="checkbox-circle"></span>
                        <h3 class="checkbox-name" style="margin-left: 34px !important;margin-top: 2px !important;">LEFT LEG</h3>
                    </label>
                    <label class="radio-container">
                        <input type="radio" name="placement" value="auto"
                               data-title="rleg"
                               {{($user->repoData && $user->repoData->default_binary_position == 2)?'checked':''}}/>
                        <span class="checkbox-circle"></span>
                        <h3 class="checkbox-name" style="margin-left: 34px !important;margin-top: 2px !important;">RIGHT LEG</h3>
                    </label>
                    <label class="radio-container">
                        <input type="radio" name="placement" value="sleg"
                               data-title="STRONG LEG" disabled="" />
                        <span class="checkbox-circle"></span>
                        <h3 class="checkbox-name" style="margin-left: 34px !important;margin-top: 2px !important;">STRONG LEG</h3>
                    </label>
                    <label class="radio-container">
                        <input type="radio" name="placement" value="wleg"
                               data-title="WEAK LEG" disabled="" />
                        <span class="checkbox-circle"></span>
                        <h3 class="checkbox-name" style="margin-left: 34px !important;margin-top: 2px !important;">WEAK LEG</h3>
                    </label>
                    <label class="radio-container">
                        <input type="radio" name="placement" value="htank"
                               data-title="LEFT LEG" disabled="" />
                        <span class="checkbox-circle"></span>
                        <h3 class="checkbox-name" style="margin-left: 34px !important;margin-top: 2px !important;">HOLDING TANK</h3>
                    </label>
                </div>

            </div>
            
            
            <div class="row careerWrapper">
                <div class="col-sm-12">
                    <h3>Career Status</h3>
                </div>
                <div class="col-sm-12">
                    <div style="display: flex;">
                        @foreach($ranks as $eachRank)
                            @if($currentRank && $eachRank->id <= $currentRank->rank->id)
                                <div class="careerStatus red">
                                    @if($eachRank->id > 10 )
                                        <img src="../images/earnings/career-iconD-red.png"/>
                                    @else
                                        <img src="../images/earnings/career-icon-red.png"/>
                                    @endif
                                    <h4>{{ $eachRank->name }}</h4>
                                </div>
                            @else
                                <div class="careerStatus gray">
                                    @if($eachRank->id > 10 )
                                        <img src="../images/earnings/career-iconD-gray.png"/>
                                    @else
                                        <img src="../images/earnings/career-icon-gray.png"/>
                                    @endif
                                    <h4>{{ $eachRank->name }}</h4>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
    </div>
    <div class="row qualifiedWrapperBox">
        <div class="col-sm-12">
            <h3>EARNINGS <span class="activeEarning"><i class="square"></i> <i class="square green"></i> Active</span>
                <span class="inactiveEarning"><i class="square"></i> Inactive</span>
                <a href="{{ scopeRoute('packageUpgrade') }}" style="color: #343246;"> <span class="upgradeEarning">
                        <i class="fa fa-plus-circle" style="margin-right: 2px"></i>UPGRADE</span> </a>
            </h3>
        </div>
                @php
                    $slNO = 1;
                    $month = 0;
                    $year = 0;
                @endphp

                <div class="col-sm-12">
                    @foreach($commissions->chunk(4) as $chunk)
                        <div class="col-sm-6">
                            @foreach($chunk as $commission)
                            @php
                                $month += $commission['monthly'];
                                $year += $commission['yearly'];
                            @endphp
                                <div class="row">
                                    <div class="col-sm-12 earningsGrid">
                                        <div class="row">
                                            <div class="panel-group d-accordion">
                                                <div class="panel panel-default">
                                                    <div class="col-sm-3 @if(($commission['commission']->registry['code'] === 'PFC')
                                                                         || ($commission['commission']->registry['code'] === 'QBP')) gridGreen
                                                                         @else gridRed @endif">
                                                        <h3>0{{ $slNO }}</h3><span class="line"></span>
                                                        <h3><?php if(($commission['commission']->registry['code'] === 'DCU')): ?>DCM<?php else :?><?php echo e($commission['commission']->registry['code']); ?><?php endif;?></h3>
                                                    </div>
                                                    <div class="col-sm-9 @if(($commission['commission']->registry['code'] === 'PFC')
                                                                         || ($commission['commission']->registry['code'] === 'QBP')) gridWhite gridGreen-text
                                                                         @elseif ($commission['eligibility']) gridWhite @else gridWhite gridGray-text @endif">
                                                        <h3> <?php if(($commission['commission']->registry['code'] === 'DCU')): ?>Dynamic Compression Multi-Tier Bonus<?php else :?><?php echo e($commission['commission']->registry['name']); ?><?php endif;?> <span
                                                                    class="info" data-toggle="modal"
                                                                    data-target="#{{ $commission['commission']->registry['code'] }}modal"><img
                                                                        src="../images/earnings/info-icon.png"> </span></h3>
                                                        <div class="row gridWhite-inner">
                                                            <div class="col-sm-5">
                                                                <h3>THIS MONTH</h3>
                                                                {{--                                                        <h5><span>€</span>{{ $commission['monthly'] }}</h5>--}}
                                                                <h5><span>{{ currency($commission['monthly']) }}</span></h5>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <h3>THIS YEAR</h3>
                                                                {{--                                                        <h5><span>€</span>{{ $commission['yearly'] }}</h5>--}}
                                                                <h5><span>{{ currency($commission['yearly']) }}</span></h5>
                                                            </div>
                                                            <div class="col-sm-2 panel-heading collapsed showCommissionTable"
                                                                 data-code="{{ $commission['commission']->registry['code'] }}"
                                                                 data-id="{{ $commission['commission']->moduleId }}"
                                                                 data-toggle="collapse"
                                                                 data-parent=".d-accordion"
                                                                 href="#{{ $commission['commission']->registry['code'] }}">
                                                                <i class="fa fa-angle-down pull-right"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div id="{{ $commission['commission']->registry['code'] }}"
                                                             class="panel-collapse collapse" aria-expanded="false">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="{{ $commission['commission']->registry['code'] }}modal"
                                             role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;
                                                        </button>
                                                        <img src="../images/earnings/{{ $commission['commission']->registry['code'] }}.jpg"
                                                             class="img-responsive"/>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @php
                                    $slNO = $slNO + 1;
                                @endphp
                            @endforeach
                        </div>
                    @endforeach

                    <div class="total">
                        <span class="desc">Total Earnings This month</span>
                        <span class="sign">€</span>
                        <span class="subtotal">{{number_format($month,2)}}</span>
                    </div>
                    <div class="total">
                        <span class="desc">Total Earnings This year</span>
                        <span class="sign">€</span>
                        <span class="subtotal">{{number_format($year,2)}}</span>
                    </div>
                </div>

                {{--@forelse($commissions->chunk(2) as $chunk)--}}
                {{--<div class="commissionContainer">--}}
                {{--@foreach($commissions as $commission)--}}
                {{--<div class="col-sm-6">--}}
                {{--<div class="row">--}}
                {{--<div class="col-sm-12 earningsGrid">--}}
                {{--<div class="row">--}}
                {{--<div class="panel-group d-accordion">--}}
                {{--<div class="panel panel-default">--}}
                {{--<div class="col-sm-3 @if($commission['eligibility']) gridRed @else gridGray @endif">--}}
                {{--<h3>{{ $slNO }}</h3><span class="line"></span>--}}
                {{--<h3>{{ $commission['commission']->registry['code'] }}</h3>--}}
                {{--</div>--}}
                {{--<div class="col-sm-9 gridWhite">--}}
                {{--<h3> {{ $commission['commission']->registry['name'] }} <span--}}
                {{--class="info" data-toggle="modal"--}}
                {{--data-target="#{{ $commission['commission']->registry['code'] }}modal"><i--}}
                {{--class="fa fa-info-circle"></i> </span></h3>--}}
                {{--<div class="row gridWhite-inner">--}}
                {{--<div class="col-sm-5">--}}
                {{--<h3>THIS MONTH</h3>--}}
                {{--<h5><span>€</span>{{ $commission['monthly'] }}</h5>--}}
                {{--</div>--}}
                {{--<div class="col-sm-5">--}}
                {{--<h3>THIS YEAR</h3>--}}
                {{--<h5><span>€</span>{{ $commission['yearly'] }}</h5>--}}
                {{--</div>--}}
                {{--<div class="col-sm-2 panel-heading collapsed showCommissionTable"--}}
                {{--data-code="{{ $commission['commission']->registry['code'] }}"--}}
                {{--data-id="{{ $commission['commission']->moduleId }}"--}}
                {{--data-toggle="collapse"--}}
                {{--data-parent=".d-accordion"--}}
                {{--href="#{{ $commission['commission']->registry['code'] }}">--}}
                {{--<i class="fa fa-angle-down pull-right"></i>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-12">--}}
                {{--<div id="{{ $commission['commission']->registry['code'] }}"--}}
                {{--class="panel-collapse collapse in" aria-expanded="true">--}}

                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<!-- Modal -->--}}
                {{--<div class="modal fade" id="{{ $commission['commission']->registry['code'] }}modal"--}}
                {{--role="dialog">--}}
                {{--<div class="modal-dialog">--}}
                {{--<!-- Modal content-->--}}
                {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                {{--<button type="button" class="close" data-dismiss="modal">&times;--}}
                {{--</button>--}}
                {{--<img src="../images/earnings/{{ $commission['commission']->registry['code'] }}.jpg"--}}
                {{--class="img-responsive"/>--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--@php--}}
                {{--$slNO = $slNO+1;--}}
                {{--@endphp--}}

                {{--@endforeach--}}
                {{--</div>--}}
                {{--@empty--}}
                {{--@endforelse--}}

                <script>
                    $(function () {
                        $('.showCommissionTable').click(function () {
                            var commissionArea = $(this).attr('data-code');
                            var commissionId = $(this).attr('data-id');
                            loadCommissionTable(commissionId, commissionArea);
                        });

                        $('input[name="placement"]').change(function(){
                            let value = 1;

                            $('input[name="placement"]').each(function(){
                                if(this.checked)
                                {
                                    let item = $(this).val();
                                    if(item == 'lleg')
                                    {
                                        value = 1;
                                    }
                                    else
                                    {
                                        value = 2;
                                    }
                                }
                            })

                            $.post('{{route("user.dashboard.autoplace")}}',{position:value},function(res){
                                if(res.success)
                                {

                                }
                            })
                        })

                        
                    });

                    function loadCommissionTable(commissionId, commissionArea, route) {
                        simulateLoading("#" + commissionArea);

                        route = route ? route : '{{ scopeRoute('transaction') }}';

                        $.post(route, {commissionId: commissionId}, function (response) {
                            $("#" + commissionArea).html(response);
                        });
                    }
                </script>
            </div>
        </div>
    </div>
    <style>
        .page-content {
            background: #dcddde;
        }

        .page-bar {
            background: none !important;
        }

    </style>
@endsection
<style>
    .row.linksHolder {
        margin-bottom: 20px;
    }
</style>
