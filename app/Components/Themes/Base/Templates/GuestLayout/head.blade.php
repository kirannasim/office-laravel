<meta charset="utf-8"/>
<title>{!! getConfig('company_information','company_name') !!} @if(isset($title)) -  {{ $title }}@endif</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="@yield('metaDescription')" name="description"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{ asset('global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL TOP PLUGINS -->
@if(isset($headScripts) && $headScripts)
    @foreach($headScripts as $script)
        <script src="{{ $script }}" type="text/javascript"></script>
    @endforeach
@endif

@if(isset($jsVariables) && $jsVariables)
    <script type="text/javascript">
                @foreach($jsVariables as $key => $variable)
        var {{ $key }} =
        '{{ $variable }}';
        @endforeach
    </script>
@endif

<!-- END PAGE LEVEL TOP PLUGINS -->
<!-- BEGIN GLOBAL MANDATORY STYLES -->
@include('GuestLayout.css')
@stack('styles')
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="{{ asset(getConfig('company_information', 'favicon')) }}"/>
<!-- END HEAD -->