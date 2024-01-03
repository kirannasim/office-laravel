<meta charset="utf-8"/>
<title>{!! getConfig('company_information','company_name') !!} @if(isset($title)) -  {{ $title }}@endif</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="@yield('metaDescription')" name="description"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
@if(isset($jsVariables) && $jsVariables)
    <script type="text/javascript">
        "use strict";
        var loggedId = '{{ session('loggedIdEncrypted') }}';
                @foreach($jsVariables as $key => $variable)
        var {{ $key }} =
        '{{ $variable }}';
        @endforeach
    </script>
@endif
<link rel="shortcut icon" href="{!! asset('global/plugins/highcharts/highcharts.js') !!}" type="image/x-icon"/>
<script src="{{ asset('global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="//{{ env('SOCKET_HOST', request()->getHost()) }}:6002/socket.io/socket.io.js"></script>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/custom.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/highcharts/highcharts.js') }}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/highcharts/highcharts-3d.js') }}" type="text/javascript"></script>
@if(isset($headScripts) && $headScripts)
    @foreach($headScripts as $script)
        <script src="{{ $script }}" type="text/javascript"></script>
    @endforeach
@endif
<!-- BEGIN GLOBAL MANDATORY STYLES -->
@include('Employee.Layout.css')
@stack('styles')
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="{{ asset(getConfig('company_information', 'favicon')) }}"/>
