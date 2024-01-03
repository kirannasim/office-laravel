
<div class="row personalInfoGridWrapper">
    <div class="col-sm-2">
        <a href="{{route('user.report')}}" class="infoGrid @if (Request::url() === (route('user.report'))) active @endif">
            <h3>Annual</h3>
        </a>
    </div>
    <div class="col-sm-2">
        <a href="{{ route('user.report.binaryPoint') }}" class="infoGrid @if (Request::url() === (route('user.report.binaryPoint'))) active @endif">
            <h3>CV Points</h3>
        </a>
    </div>
    <div class="col-sm-2">
        <a href="{{ route('user.report.ReferralList.myReferral') }}" class="infoGrid @if (Request::url() === (route('user.report.ReferralList.myReferral'))) active @endif">
            <h3>Referral List</h3>
        </a>
    </div>
    <div class="col-sm-2">
        <a href="{{ route('user.clientReport.index') }}" class="infoGrid @if (Request::url() === (route('user.clientReport.index'))) active @endif">
            <h3>Client Report</h3>
        </a>
    </div>
    <div class="col-sm-2">
        <a href="{{ route('user.report.earning') }}" class="infoGrid @if (Request::url() === (route('user.report.earning'))) active @endif">
            <h3>Earning Report</h3>
        </a>
    </div>
    <div class="col-sm-2">
        <a href="{{ route('user.report.activity') }}" class="infoGrid @if (Request::url() === (route('user.report.activity'))) active @endif">
            <h3>Activity</h3>
        </a>
    </div>
</div>
