<div class="reportPrintHead"
     style="width:100%;height:100px; overflow: hidden;border-bottom: solid 1px #eee; margin-bottom: 15px;">

    <div class="reportPrintLeft" style="float: left;width: 250px;">
        <h5 style="text-align: left; margin: 2px 0px !important;"> {!! getConfig('company_information','company_name') !!}</h5>
        <h2 style="text-align: left;"> {{ $reportName }}</h2>
    </div>
    <div class="reportPrintRight" style="float: right;width: 250px;">
        @if($displayLogo)
            <div class="reportLogo" style="height:50px; overflow: hidden; display: block;">
                <img src="{{ logo() }}" style="width: 150px; float: right;display: block; overflow: hidden;">
            </div>
        @endif
        <h5 style="text-align: right; margin-top:5px;float: right;display: block;"> {{ date('Y-m-d H:i:s') }} </h5>
    </div>
</div>
