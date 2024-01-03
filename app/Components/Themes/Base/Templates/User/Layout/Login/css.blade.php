<!-- Here defines the theme stylesheets -->

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ themeAssetUrl('css/custom.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ themeAssetUrl('css/style.css') }}"/>
    <link href="{{ themeAssetUrl('global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ themeAssetUrl('global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ themeAssetUrl('global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ themeAssetUrl('global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
    <link href="{{ themeAssetUrl('global/plugins/gritter/css/jquery.gritter.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ themeAssetUrl('global/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet"
          type="text/css"/>
    <!-- END PAGE LEVEL PLUGIN STYLES -->
    <!-- BEGIN PAGE STYLES -->
    <link href="{{ themeAssetUrl('admin/pages/css/tasks.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END PAGE STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="{{ themeAssetUrl('global/css/components.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ themeAssetUrl('global/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ themeAssetUrl('pages/css/login-4.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush
