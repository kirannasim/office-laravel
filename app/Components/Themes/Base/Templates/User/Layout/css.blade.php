@push('styles')
    <!-- START GLOBAL MANDATORY STYLES -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/DinProFont.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/user/elysium.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/user/responsive.css') }}" rel="stylesheet" type="text/css"/>
    {{--<link href="{{ asset('global/plugins/line-awesome-master/dist/css/line-awesome-font-awesome.css') }}"
          rel="stylesheet" type="text/css"/>--}}
    <link href="{{ asset('css/all_5.10.20.css') }}"
          rel="stylesheet" type="text/css"/>
    {{--<link href="{{ asset('global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>--}}
    <link href="{{ asset('global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('global/plugins/icheck/skins/all.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('global/plugins/ladda/ladda-themeless.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('global/plugins/webui-popover-master/dist/jquery.webui-popover.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
    {{--<link href="{{ asset('global/css/error.min.css') }}" rel="stylesheet" type="text/css"/>--}}
    <!-- END PAGE LEVEL PLUGIN STYLES -->

    <!-- BEGIN PAGE STYLES -->
    @if(isset($styles) && $styles)
        @foreach($styles as $style)
            <link href="{{ $style }}" rel="stylesheet" type="text/css"/>
        @endforeach
    @endif
    <!-- END PAGE STYLES -->

    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ asset('global/css/components.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('global/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->

    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{ themeAssetUrl('layouts/layout/css/layout.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ themeAssetUrl('layouts/layout/css/themes/' .activeLayout(). '.css') }}" rel="stylesheet"
          type="text/css" id="style_color"/>
    <link href="{{ themeAssetUrl('layouts/layout/css/custom.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END THEME LAYOUT STYLES -->
@endpush