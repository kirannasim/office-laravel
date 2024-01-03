<!-- Here defines the theme scripts -->

@push('scripts')
    <!-- <script type="text/javascript" src="{{ asset('js/app.js') }}"></script> -->
    
    <script src="{{ asset('global/plugins/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ themeAssetUrl('Js/custom.js') }}"></script>
    <script type="text/javascript" src="{{ themeAssetUrl('Js/main.js') }}"></script>
    <script src="{{ themeAssetUrl('global/plugins/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ themeAssetUrl('global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ themeAssetUrl('global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
    <script src="{{ themeAssetUrl('global/plugins/jquery.cookie.js') }}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ themeAssetUrl('global/plugins/jquery-validation/js/jquery.validate.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ themeAssetUrl('global/plugins/jquery-validation/js/additional-methods.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ themeAssetUrl('global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
@endpush
