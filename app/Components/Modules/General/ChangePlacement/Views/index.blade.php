@foreach($scripts as $script)
    <script type="text/javascript" src="{{ $script }}"></script>
@endforeach
@foreach($styles as $style)
    <link href="{{ $style }}" rel="stylesheet" type="text/css"/>
@endforeach
<div class="heading">
    <h3>{{ _mt($moduleId,'ChangePlacement.changePlacement') }}</h3>
</div>
<div class="noteMember">
    <h3>{{ _mt($moduleId,'ChangePlacement.note') }}</h3>
    <ul>
        <li>{{ _mt($moduleId,'ChangePlacement.note1') }}</li>
        <li>{{ _mt($moduleId,'ChangePlacement.note2') }}</li>
    </ul>
</div>
<form name="changePlacementForm" id="changePlacementForm">
    <input type="hidden" name="user_id" id="member_id" value="{{ $user_id }}">
    <div class="eachField row">
        <div class="col-md-3">
            <label>{{ _mt($moduleId,'ChangePlacement.sponsor') }}</label>
        </div>
        <div class="col-md-4">
            <div class="input-group">
                {{ idToUsername($placement_id) }}
            </div>
        </div>
    </div>
    <div class="eachField row">
        <div class="col-md-3">
            <label>{{ _mt($moduleId,'ChangePlacement.position') }}</label>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                @if($position == 1) <span id="position" >Left</span> @else <span id="position"  >Right</span> @endif
            </div>
        </div>
    </div>
    <div class="eachField row">
        <div class="col-md-3">
            @if($sponsor_members == 0)
                <button type="button" class="btn btn-success ladda-button submitForm" data-style="contract">{{ _mt($moduleId,'ChangePlacement.swap') }}</button>
            @endif
        </div>
    </div>
</form>

<script>
    "use strict";

    $(function () {
        Ladda.bind('.ladda-button');
        var selectedCallback = function (target, id, name) {
            $('#placement_name').val(name);
            $('#placement_id').val(id);
        };

        var options = {
            target: '.userFiller',
            route: '{{ route("user.api") }}',
            action: 'getUsers',
            name: 'username',
            selectedCallback: selectedCallback
        };
        $('.userFiller').ajaxFetch(options);

        //select2
        $('select').select2({});
    });

    //enable user select option
    // $('.enablePlacementEdit').click(function () {
    //     $('#placement_name').prop('disabled', false);
    // });

    // submit placement change form
    $('.submitForm').click(function () {
        $.validator.addMethod('ajaxValidate', function (value, element, param) {
            var isValid = !$(element).parent().hasClass('ajaxValidationError');
            return isValid; // return bool here if valid or not.
        }, function (param, element) {
            return $(element).siblings('.help-block-error').text();
        });

        var form = $('#changePlacementForm');

        var validator = form.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            rules: {},
            messages: {},

            errorPlacement: function (error, element) {
                if (element.is(':checkbox')) {
                    error.insertAfter(element.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline"));
                } else if (element.is(':radio')) {
                    error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline"));
                } else {
                    error.insertAfter(element.parent()); // for other inputs, just perform default behavior
                }
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group

            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },
        });

        var formData =$('div.slice.active #changePlacementForm').serialize();

        $.post('{{ route("ChangePlacement.save") }}', formData, function (response) {
            toastr.success(" {{ _mt($moduleId, 'ChangePlacement.placementChangedSuccessfully') }} ");

            if (response.new_position == 1) {
                $('body #position').html('Left');
            }else if (response.new_position == 2) {
                $('body #position').html('Right');
            }

            $('#placement_name').prop('disabled', true);
            Ladda.stopAll();
        }).fail(function (response) {
            Ladda.stopAll();
            var errors = response.responseJSON;
            for (var key in errors) {
                $('#changePlacementForm [name="' + key + '"]').parent().addClass('ajaxValidationError');
                var errorOption = {};
                errorOption[key] = errors[key];
                validator.showErrors(errorOption);
            }
        });
    });
</script>

<style>
    .alertText {
        color: red;
    }
</style>