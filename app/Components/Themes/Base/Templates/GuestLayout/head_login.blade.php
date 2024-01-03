<meta charset="utf-8"/>
<title>{!! getConfig('company_information','company_name') !!} @if(isset($title)) -  {{ $title }}@endif</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="@yield('metaDescription')" name="description"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="{{ asset('global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('global/plugins/bootstrap_4/js/bootstrap_4.1.3.min.js') }}" type="text/javascript"></script>

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

<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
      type="text/css"/>
<link href="{{ asset('global/plugins/font-awesome-free/css/fontawesome-free-all.min.css') }}" rel="stylesheet"
      type="text/css"/>
<link href="{{ asset('global/plugins/bootstrap_4/css/bootstrap_4.1.3.min.css') }}" rel="stylesheet" type="text/css"/>
@if(isset($styles) && $styles)
    @foreach($styles as $style)
        <link href="{{ $style }}" rel="stylesheet" type="text/css"/>
    @endforeach
@endif

@stack('styles')
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="{{ asset(getConfig('company_information', 'favicon')) }}"/>
<!-- END HEAD -->
