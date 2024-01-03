<div id='default_binary_position_selector' class="dashboard-content">
    <div>
        <div class="col-sm-6">
            <div class="portlet light ">
                <div class="portlet-title" style="min-height: 30px;">
                    <div class="caption caption-md">
                        <i class="icon-globe theme-font hide"></i>
                        <span class="caption-subject font-blue-madison bold uppercase">{{ _mt('General-DefaultBinaryPositionSelector','BinaryPositionSelector.defaultBinaryPosition') }}</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <form name="changeBinaryPositionForm" id="changeBinaryPositionForm">
                        <input type="hidden" name="user_id" id="member_id" value="{{ loggedId() }}">
                        <div class="eachField row">
                            <div class="col-sm-4">
                                <label> {{ _mt('General-DefaultBinaryPositionSelector','BinaryPositionSelector.defaultPosition') }} </label>
                            </div>
                            <div class="col-sm-8">
                                <select class="form-control" name="default_binary_position">
                                    @foreach($binaryPositions as $position)
                                        <option value="{{ $position->id }}"
                                                @if($currentPosition == $position->id) selected @endif>{{ $position->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="eachField row">
                            <div class="col-sm-3">
                                <button type="button" class="btn btn-success ladda-button submitForm"
                                        data-style="contract">{{ _mt('General-DefaultBinaryPositionSelector','BinaryPositionSelector.save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    "use strict";

    $('.submitForm').click(function () {
        var formData = $('#changeBinaryPositionForm').serialize();
        $.post('{{ scopeRoute("defaultBinaryPosition.save") }}', formData, function (response) {
            toastr.success(" {{ _mt('General-DefaultBinaryPositionSelector','BinaryPositionSelector.positionChangedSuccessfully') }} ");
            Ladda.stopAll();
        }).fail(function () {
            toastr.error(" {{ _mt('General-DefaultBinaryPositionSelector', 'BinaryPositionSelector.please_change_position') }} ");
            Ladda.stopAll();
        });

    });

    //select2
    $('select').select2({
        width: '50%'
    });
</script>
<style>
    .overviewContent {
        font-weight: bold;
        color: #c56969
    }
</style>
