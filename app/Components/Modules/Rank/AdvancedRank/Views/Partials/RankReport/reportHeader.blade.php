@if($displayLogo)
    <img src="{{ logo() }}">
@endif
<h style="align:center"> {!! getConfig('company_information','company_name') !!}</h>
<h2> {{ $reportName }}</h2>
<h2> {{ date('Y-m-d H:i:s') }} </h2>