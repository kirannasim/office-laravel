@inject('htmlHelper', 'App\Blueprint\Facades\HtmlServer')
<div class="htmlElement">
    {!! $htmlHelper::processLabel($label, $options->get('label')) !!}
    <div class="htmlElementInput button col-md-8">
        @if($buttonType == 'link')
            <a href="{{ $link }}" target="{{ $target }}">
                @endif
                <button type="button" id="{{ $uniqueId }}"
                        class="btn {{ (isset($loading) && $loading) ? 'ladda-button' : '' }}"
                        data-style="contract">
                    @if(isset($icon) && $icon)
                        <i class="{{ $icon }}"></i>
                    @endif
                    {{ $text }}</button>
                @if($buttonType == 'link')
            </a>
        @endif
    </div>
</div>
@if($buttonType == 'action')
    <script>
        $('#' + '{{ $uniqueId }}').click(function () {
            var options = {action: '{{ $action }}', data: '{{ $params }}'};
            $.post('{{ $route }}', options, function (response) {
                Ladda.stopAll();
                console.log(response);
            }).fail(function (response) {
                Ladda.stopAll();
            });
        });
    </script>
@endif
<style>
    #{{ $uniqueId }}{
        @if($color) color: {{ $color }} !important; @endif
        @if($background) background: {{ $background }}!important; @endif
        width:auto!important;
    }
</style>