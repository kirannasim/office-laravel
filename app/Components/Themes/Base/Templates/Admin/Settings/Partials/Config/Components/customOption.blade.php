@php
    $key = isset($key) ? $key : 0;
    $value = isset($value) ? $value : '';
@endphp
<div class="eachCustomSelectOption" data-queue="{{ $key }}" data-type="{{ $type }}">
    <div class="row innerOption labels">
        <div class="col-md-4">
            <img class="flagIco" src="{{ asset('images/flags/flags_iso/24/' . currentLocal() . '.png') }}">Label
        </div>
        <div class="col-md-8">
            <input type="text" placeholder="Enter label"
                   value="{{ isset($label[currentLocal()]) ? $label[currentLocal()] : '' }}"
                   name="customOption[{{ $type }}][{{ $key }}][label][{{ currentLocal() }}]">
            <button type="button" class="btn dark btn-outline showTranslation">
                <i class="fa fa-language"></i>Translations
            </button>
        </div>
    </div>
    <div class="configTranslations">
        @foreach(getLocals() as $code => $local)
            @if ($code == currentLocal())
                @continue
            @endif
            <div class="eachField row">
                <label class="col-md-4">
                    <img class="flagIco"
                         src="{{ asset('images/flags/flags_iso/24/' . $code . '.png') }}">Value
                </label>
                <div class="col-md-8">
                    <input type="text" placeholder="Enter value" value="{{ isset($label[$code]) ? $label[$code] : '' }}"
                           name="customOption[{{ $type }}][{{ $key }}][label][{{ $code }}]">
                </div>
            </div>
        @endforeach
    </div>
    <div class="row innerOption value">
        <div class="col-md-4">
            <img class="flagIco"
                 src="{{ asset('images/flags/flags_iso/24/' . currentLocal() . '.png') }}">Value
        </div>
        <div class="col-md-8">
            <input type="text" placeholder="Enter value" value="{{ $value }}"
                   name="customOption[{{ $type }}][{{ $key }}][value]">
        </div>
    </div>
    <div class="row innerOption">
        <div class="col-md-12">
            <button type="button" class="btn red deleteCustomField">
                <i class="fa fa-close"></i>
                <span>Delete</span>
            </button>
        </div>
    </div>
</div>
