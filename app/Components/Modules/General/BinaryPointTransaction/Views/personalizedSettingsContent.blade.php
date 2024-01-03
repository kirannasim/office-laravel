<div class="personalizedPanel personalizeBinaryPoint" data-target="binaryPoint">
    <div class="heading">
        <h3> {{ _mt($moduleId,'BinaryPointTransaction.distribute_binary_point') }}</h3>
    </div>
    <form name="changePersonalizeBinaryPointForm" id="changePersonalizeBinaryPointForm_{{ $userId }}">
        <div class="col-sm-6 LeftBox">
            <label>{{ _mt($moduleId,'BinaryPointTransaction.left_total') }}</label>
            <h5>{{ $binaryPoints['leftpoints'] ?: 0}}</h5>
        </div>
        <div class="col-sm-6 RightBox">
            <label>{{ _mt($moduleId,'BinaryPointTransaction.right_total') }}</label>
            <h5>{{ $binaryPoints['rightpoints'] ?: 0 }}</h5>
        </div>
        <div class="col-sm-6 LeftBox" style="border-bottom:0px;">
            <label>{{ _mt($moduleId,'BinaryPointTransaction.left_carry') }}</label>
            <h5>{{ $binaryPoints['leftCarry'] ?: 0 }}</h5>
        </div>
        <div class="col-sm-6 RightBox" style="border-bottom:0px;">
            <label>{{ _mt($moduleId,'BinaryPointTransaction.right_carry') }}</label>
            <h5>{{ $binaryPoints['rightCarry'] ?: 0 }}</h5>
        </div>
        <input type="hidden" name="user_id" id="member_id" value="{{ $userId }}">
        <div class="eachField row">
            <div class="col-md-4">
                <label>{{ _mt($moduleId,'BinaryPointTransaction.select_position') }}</label>
            </div>
            <div class="col-md-7">
                <select class="form-control" name="position">
                    <option value="">{{ _mt($moduleId,'BinaryPointTransaction.select') }}</option>
                    <option value="1">{{ _mt($moduleId,'BinaryPointTransaction.left') }}</option>
                    <option value="2">{{ _mt($moduleId,'BinaryPointTransaction.right') }}</option>
                </select>
            </div>
        </div>
        <div class="eachField row">
            <div class="col-md-4">
                <label>{{ _mt($moduleId,'BinaryPointTransaction.point') }}</label>
            </div>
            <div class="col-md-5">
                <input type="text" class="form-control" name="point">
            </div>
        </div>
        <div class="eachField row">
            <div class="col-md-5">
                <button type="button" class="btn btn-success ladda-button submitForm"
                        data-style="contract">{{ _mt($moduleId,'BinaryPointTransaction.save') }}</button>
            </div>
        </div>
    </form>
</div>
<script>

    $(function () {
        Ladda.bind('.ladda-button');

        //submit sponsor change form
        $('.submitForm').click(function () {
            var formData = $('#changePersonalizeBinaryPointForm_{{ $userId }}').serialize();
            $.post('{{ scopeRoute("binaryPoint.save") }}', formData, function (response) {
                toastr.success(" {{ _mt($moduleId,'BinaryPointTransaction.pointChangedSuccessfully') }} ");
            });
        });
    });

    //select2
    $('select').select2({
        width: '70%'
    });
</script>
<style>
    .personalizedPanelWrapper {
        padding-bottom: 15px;
    }
</style>