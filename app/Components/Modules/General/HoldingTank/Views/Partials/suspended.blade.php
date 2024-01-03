@extends(ucfirst(getScope()).'.Layout.master')

@section('content')
@include('_includes.network_nav')
<div class="row">
    <div class="col-sm-6 col-sm-offset-3 holdingTankSuspend">
        <i class="fa fa-close"></i>
        <h3>{{ _mt($moduleId,'HoldingTank.holding_tank_not_available') }}</h3>
    </div>
</div>
<style>
    .holdingTankSuspend {
        border: solid 1px #dadada;
        background-color: #fff;
        border-left: solid 5px red;
        padding: 25px;
        text-align: center;
        margin-top: 35px;
        margin-bottom: 35px;
        box-shadow: #ddd 4px 2px 0px;
    }

    .holdingTankSuspend i {
        font-size: 20px;
        color: #da3333;
        border: solid 2px #f75050;
        height: 30px;
        width: 30px;
        vertical-align: middle;
        text-align: center;
        padding-top: 7px;
        border-radius: 50%;
        margin: auto;
        display: block;
    }

    .holdingTankSuspend h3 {
        font-size: 22px;
        font-weight: 400;
    }
</style>
@endsection