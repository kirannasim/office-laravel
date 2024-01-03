<meta charset="utf-8"/>
<title>{!! getConfig('company_information','company_name') !!} @if(isset($title)) -  {{ $title }}@endif</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="@yield('metaDescription')" name="description"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
@if(isset($jsVariables) && $jsVariables)
    <script type="text/javascript">
        "use strict";
        let loggedId = '{{ session('loggedIdEncrypted') }}';
                @foreach(defineFilter('jsvars', $jsVariables, 'header') as $key => $variable)
        let {{ $key }} =
        '{{ $variable }}';
        @endforeach
    </script>
@endif
{!! defineFilter('scriptInjections', '', 'header') !!}
<script src="{{ asset('global/plugins/jquery.min.js') }}" type="text/javascript"></script>
{{--<script src="//{{ env('SOCKET_HOST', request()->getHost()) }}:6002/socket.io/socket.io.js"></script>--}}
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
@include('User.Layout.css')
@stack('styles')
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="{{ asset(getConfig('company_information', 'favicon')) }}"/>
{!! defineFilter('styleInjections', '', 'header') !!}

<script type="text/javascript" src="{{ asset('js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/moment-timezone.js') }}"></script>
<script type="text/javascript" src="{{asset('js/daterangepicker.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/daterangepicker.css')}}">