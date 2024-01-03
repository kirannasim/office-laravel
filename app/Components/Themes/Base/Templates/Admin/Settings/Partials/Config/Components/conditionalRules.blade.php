@php
    $selectedField = $condition ? $condition['field'] : null;
    $conditionalValue = $condition ? $condition['value'] : null;
    $conditionalOperand = $condition ? $condition['operand'] : null;
    $concat = $condition ? $condition['concat'] : '&&';
@endphp
<div class="eachCondition" data-row="{{ $key }}">
    <div class="eachField row">
        <label class="col-md-4">Show if</label>
        <div class="col-md-8">
            <select name="conditional_rules[{{ $key }}][field]">
                @foreach($conditionalFields as $eachfield)
                    <option value="{{ $eachfield->id }}" {{ $eachfield->id == $selectedField ? 'selected' : '' }}>
                        {{ $eachfield->getTitle() }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="eachField row">
        <label class="col-md-4">'s value Is</label>
        <div class="col-md-4">
            <select name="conditional_rules[{{ $key }}][operand]">
                <option value="==">Equal to</option>
                <option value=">">Greater than</option>
                <option value=">=">Greater than or equal</option>
                <option value="<">Less than</option>
                <option value="<=">Less than or equal</option>
            </select>
        </div>
        <div class="col-md-4 conditionalInput">
            <input type="text" value="{{ $conditionalValue }}" name="conditional_rules[{{ $key }}][value]"
                   placeholder="value">
        </div>
    </div>
    <div class="eachField row">
        <div class="conditionConcat col-md-offset-8 col-md-4">
            <div class="eachConcat">
                <input type="radio" name="conditional_rules[{{ $key }}][concat]" value="&&" class="icheck"
                        {{ ($concat == '&&') ? 'checked' : '' }}>
                <label>And</label>
            </div>
            <div class="eachConcat">
                <input type="radio" name="conditional_rules[{{ $key }}][concat]" value="||"
                       class="icheck" {{ ($concat == '||') ? 'checked' : '' }}>
                <label>Or</label>
            </div>
        </div>
    </div>
</div>
