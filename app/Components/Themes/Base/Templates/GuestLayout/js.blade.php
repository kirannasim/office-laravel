@push('scripts')
    {{--<!-- <script type="text/javascript" src="{{ asset('js/app.js') }}"></script> -->--}}
    <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('global/plugins/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('global/plugins/ladda/spin.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('global/plugins/ladda/ladda.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('global/plugins/webui-popover-master/dist/jquery.webui-popover.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('global/plugins/bindWithDelay/bindWithDelay.js') }}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{ asset('global/scripts/app.min.js') }}" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    @if(isset($scripts) && $scripts)
        @foreach($scripts as $script)
            <script src="{{ $script }}" type="text/javascript"></script>
        @endforeach
    @endif
    <script src="{{ asset('global/plugins/backstretch/jquery.backstretch.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="{{ themeAssetUrl('layouts/layout/scripts/layout.min.js') }}" type="text/javascript"></script>
    <!-- END THEME LAYOUT SCRIPTS -->
@endpush
