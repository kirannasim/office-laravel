<div class="heading">
    <h3>{{ _mt('General-DefaultBinaryPositionSelector','BinaryPositionSelector.defaultBinaryPosition') }}</h3>
</div>
<form name="changeBinaryPositionForm" id="changeBinaryPositionForm">
    <input type="hidden" name="user_id" id="member_id" value="{{ $user_id }}">
    <div class="eachField row">
        <div class="col-md-4">
            <label>{{ _mt('General-DefaultBinaryPositionSelector','BinaryPositionSelector.defaultPosition') }}</label>
        </div>
        <div class="col-md-8">
            <select class="form-control" name="default_binary_position">
                @foreach($binaryPositions as $position)
                    <option value="{{ $position->id }}"
                            @if($currentPosition == $position->id) selected @endif>{{ $position->title }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="eachField row">
        <div class="col-md-3">
            <button type="button" class="btn btn-success ladda-button submitForm"
                    data-style="contract">{{ _mt('General-DefaultBinaryPositionSelector','BinaryPositionSelector.save') }}</button>
        </div>
    </div>
</form>

<script>
    "use strict";

    //submit sponsor change form
    $('.submitForm').click(function () {
        var formData = $('#changeBinaryPositionForm').serialize();
        $.post('{{ scopeRoute("defaultBinaryPosition.save") }}', formData, function (response) {
            toastr.success(" {{ _mt('General-DefaultBinaryPositionSelector','BinaryPositionSelector.positionChangedSuccessfully') }} ");
        });

    });

    //select2
    $('select').select2({
        width: '50%'
    });
</script>
<style>
    .personalizedPanelWrapper {
        padding-bottom: 15px;
    }
</style>
