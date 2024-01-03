<div class="row personalInfoGridWrapper" style="margin-bottom: 20px;">
	<div class="col-sm-4" style="padding: 0px 2px;">
        <a class="infoGrid @if(Request::url() == route('user.ewallet')) active @endif" href="{{route('user.ewallet')}}">
            <h3>E-Wallet</h3>
        </a>
    </div>
    <div class="col-sm-4" style="padding: 0px 2px;">
        <a  class="infoGrid @if(Request::url() == route('user.ipaywallet')) active @endif" href="{{route('user.ipaywallet')}}">
            <h3>IPayWallet</h3>
        </a>
    </div>
    <div class="col-sm-4" style="padding: 0px 2px;">
        <a href="{{ route('user.payout') }}" class="infoGrid  @if (Request::url() === (route('user.payout'))) active @endif" >
            <h3>Payout</h3>
        </a>
    </div>
</div>
<style type="text/css">
	.infoGrid
	{
		cursor: pointer;
	}

    .active
    {
        background-color: #08b790 !important;
    }
    .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu > li.active > a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu > li.active.open > a, .page-sidebar .page-sidebar-menu > li.active > a, .page-sidebar .page-sidebar-menu > li.active.open > a 
    {
        background-color: #08b790 !important;   
    }
</style>