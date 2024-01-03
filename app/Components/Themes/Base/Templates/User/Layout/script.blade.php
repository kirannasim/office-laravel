<!-- Here defines the theme scripts -->


@push('scripts')
    {{ <script type="text/javascript" src="asset('js/app.js')" /> }}
    {{ <script type="text/javascript" src="themeAssetUrl('Js/custom.js')" /> }}
    {{ <script type="text/javascript" src="themeAssetUrl('Js/main.js')" /> }}
@endpush