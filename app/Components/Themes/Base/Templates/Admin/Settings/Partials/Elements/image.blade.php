<button class="btn green imagePicker{{ $salt }}" data-input="imgInput{{ $salt }}"
        data-preview="image_holder{{ $salt }}"><i class="fa fa-image"></i> select
</button>
<input type="hidden" id="imgInput{{ $salt }}" name="{{ $name }}" value="{{ $value }}">
<img src="{{ $src }}" id="image_holder{{ $salt }}">

<script>
    $(function () {
        //bind filemanager to button
        var domain = '{{ asset('filemanage') }}';
        $('.imagePicker{{ $salt }}').filemanager('image', {prefix: domain});
    });
</script>