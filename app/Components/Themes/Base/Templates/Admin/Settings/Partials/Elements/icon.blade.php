<div class="htmlElement">
    <label for="button" class="col-md-4">
        {{ $label }}
    </label>
    <div class="htmlElementInput button col-md-8">
        <button type="button" class="btn blue iconFont">Pick</button>
        <div class="icon_font_holder"><i class="{{ $value }}"></i></div>
        <input type="hidden" class="icon_font" name="{{ $name }}" value="{{ $value }}">
    </div>
</div>

<script>
    $(function () {
        //Initialize icon picker
        var callback = function (trigger, icon) {
            trigger.next('.icon_font_holder').html('<i class="' + icon + '"></i>').next('input').val(icon);
        };

        var options = {trigger: '.iconFont', callback: callback};

        iconPickerInit(options);
    });
</script>