<div class="BinaryPlacement">
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-4">Position
        </label>
        <div class="col-md-4 col-sm-5">
            <select name="position" id="position" class="positionPicker" class="form-control">
                <option value="1">Left</option>
                <option value="2">Right</option>
            </select>
        </div>
    </div>
</div>

<script>
    "use strict";

    $(function () {
        //select2
        $('.positionPicker').select2({
            width: '100%',
        });
    });
</script>
