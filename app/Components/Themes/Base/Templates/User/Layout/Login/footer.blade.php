<div class="copyright"> 2014 © Metronic - Admin Dashboard Template.</div>
@include('Layout.Login.js')
@stack('scripts')
<script>
    $(document).ready(function () {
        $.backstretch([
                "{{ themeAssetUrl('pages/media/bg/1.jpg') }}",
                "{{ themeAssetUrl('pages/media/bg/2.jpg') }}",
                "{{ themeAssetUrl('pages/media/bg/3.jpg') }}",
                "{{ themeAssetUrl('pages/media/bg/4.jpg') }}"
            ],
            {fade: 1e3, duration: 8e3}
        );
        $('#clickmewow').click(function () {
            $('#radio1003').attr('checked', 'checked');
        });
    });
</script>
</body>
</html>
