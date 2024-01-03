<meta charset="utf-8"/>
<title>@yield('title')</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="@yield('metaDescription')" name="description"/>
<script src="{{ themeAssetUrl('global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
@include('Layout.Login.css')
@stack('styles')
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
<!-- END HEAD -->