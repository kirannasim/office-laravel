@push('scripts')
    <!--[if lt IE 9]>
<script src="{{ asset('global/plugins/respond.min.js') }}"></script>
<script src="{{ asset('global/plugins/excanvas.min.js') }}"></script>
<script src="{{ asset('global/plugins/ie8.fix.min.js') }}"></script>
<![endif]-->
    <!-- BEGIN CORE PLUGINS -->
    <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
    <script src="{{ asset('global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('global/plugins/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('global/plugins/icheck/icheck.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('global/plugins/ladda/spin.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('global/plugins/ladda/ladda.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('global/plugins/digitalClock/assets/js/script.js') }}" type="text/javascript"></script>
    <script src="{{ asset('global/plugins/webui-popover-master/dist/jquery.webui-popover.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('global/plugins/bindWithDelay/bindWithDelay.js') }}" type="text/javascript"></script>
    <script src="{{ asset('global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('global/plugins/jquery-circle-progress-master/dist/circle-progress.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('global/plugins/countUpJS/dist/countUp.js') }}" type="text/javascript"></script>

    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    @if(isset($scripts) && $scripts)
        @foreach($scripts as $script)
            <script src="{{ $script }}" type="text/javascript"></script>
        @endforeach
    @endif
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{ asset('global/scripts/app.min.js') }}" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->

    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="{{ themeAssetUrl('layouts/layout/scripts/layout.min.js') }}" type="text/javascript"></script>
    <script src="{{ themeAssetUrl('layouts/layout/scripts/demo.min.js') }}" type="text/javascript"></script>
    {{--<script src="{{ asset('js/calender.js') }}" type="text/javascript"></script>--}}
    <!-- END THEME LAYOUT SCRIPTS -->
    <!-- BEGIN PAGE LEVEL BOTTOM PLUGINS -->
    @if(isset($bottomScripts) && $bottomScripts)
        @foreach($bottomScripts as $script)
            <script src="{{ $script }}" type="text/javascript"></script>
        @endforeach
    @endif
    <!-- END PAGE LEVEL BOTTOM PLUGINS -->
@endpush
