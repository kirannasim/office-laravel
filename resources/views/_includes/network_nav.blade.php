@if(getScope() == "user" && loggedId())
<div class="row personalInfoGridWrapper">
    <div class="col-sm-2">
         <a href="{{ route('user.tree.userRegister') }}" class="infoGrid @if (Request::url() === (route('user.tree.userRegister'))) active @endif">
            <h3>NEW ENROLLEE</h3>
        </a>
    </div>
    <div class="col-sm-2">
        <a href="{{ route('user.tree.genealogyTree') }}" class="infoGrid @if (Request::url() === (route('user.tree.genealogyTree'))) active @endif">
            <h3>PLACEMENT TREE</h3>
        </a>
    </div>
    <div class="col-sm-2">
        <a href="{{ route('user.tree.tabularTree','placement') }}" class="infoGrid @if (Request::url() === (route('user.tree.tabularTree','placement'))) active @endif">
            <h3>TREE EXPLORER</h3>
        </a>
    </div>
    <div class="col-sm-2">
        <a href="{{ route('user.tree.genealogyTree','sponsor') }}" class="infoGrid @if (Request::url() === (route('user.tree.genealogyTree','sponsor'))) active @endif">
            <h3>SPONSOR</h3>
        </a>
    </div>
    <div class="col-sm-2">
        <a href="{{ route('user.holdingTank') }}" class="infoGrid @if (Request::url() === (route('user.holdingTank'))) active @endif">
            <h3>HOLDING TANK</h3>
        </a>
    </div>
    <div class="col-sm-2">
        <a href="{{ route('user.ReferralList.myReferral') }}" class="infoGrid @if (Request::url() === (route('user.ReferralList.myReferral'))) active @endif">
            <h3>REFERRAL LIST</h3>
        </a>
    </div>
</div>
@endif