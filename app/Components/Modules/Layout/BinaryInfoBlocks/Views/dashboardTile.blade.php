@foreach($styles as $style)
    {!! $style !!}
@endforeach
@foreach($scripts as $script)
    {!! $script !!}
@endforeach

<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat2 statInner binaryInfoTile" data-target="">
        <div class="display">
            <div class="number dropdown">
                <h3 class="font-blue-sharp">
                    <span class="counter" data-value="{{ $totalPair }}"></span><label>Total Pair</label>
                </h3>
                <small class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                    TVC Info
                </small>
            </div>
            <div class="icon">
                <i class="fa fa-user"></i>
            </div>
        </div>
        <div class="progress-info">
            <div class="progress">
                <span style="width: 100%;" class="progress-bar progress-bar-success blue-sharp">
                    <span class="sr-only">76% progress</span>
                </span>
            </div>
        </div>
        <div class="row BinaryTotal">
            <div class="col-sm-6 LeftBox">
                <h3>Left Total</h3>
                <h5>{{ $binaryInfo['leftpoints'] }}</h5>
            </div>
            <div class="col-sm6 RightBox">
                <h3>Right Total</h3>
                <h5>{{ $binaryInfo['rightpoints'] }}</h5>
            </div>
        </div>
        <div class="row BinaryCarry">
            <div class="col-sm-6 LeftBox">
                <h3>Left Carry</h3>
                <h5>{{ $binaryInfo['leftCarry'] }}</h5>
            </div>
            <div class="col-sm6 RightBox">
                <h3>Right Carry</h3>
                <h5>{{ $binaryInfo['rightCarry'] }}</h5>
            </div>
        </div>
    </div>
</div>

<style>

    .dashboard-stat2.statInner.binaryInfoTile label {
        font-size: 12px;
        padding-left: 2px;
    }

    .row.BinaryTotal {
        margin: 0px;
        text-align: center;
        color: #4e84b2;
        /* border-top: solid 1px #eee;*/
    }

    .row.BinaryCarry {
        margin: 0px;
        text-align: center;
        color: #4e84b2;
        /* border-bottom: solid 1px #eee;*/
    }

    .LeftBox {
        border-right: solid 1px #eceff1;
        /*color: #0b7fd4;*/
    }

    .row.BinaryTotal h3 {
        font-size: 14px;
        text-align: center;
        margin: 10px 0px;
    }

    .row.BinaryTotal h5 {
        font-weight: bold;
        margin: 9px 0px;
    }

    .row.BinaryCarry h3 {
        font-size: 14px;
        text-align: center;
        margin: 10px 0px;
    }

    .row.BinaryCarry h5 {
        font-weight: bold;
        margin: 9px 0px;
    }

    .row.BinaryPair {
        margin: 0px;
        text-align: center;
        /* background-color: #d6d6d6; */
        color: #797676;
    }

    .row.BinaryPair h3 {
        font-size: 14px;
        text-align: center;
        margin: 8px 0px;
    }

    .row.BinaryPair h5 {
        font-weight: bold;
        margin: 6px 0px;
    }

    .RightBox {


    }
</style>
