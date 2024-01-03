@inject('hookServices','App\Blueprint\Services\hookServices')
<div class="portletHousing col-md-12">
    <div class="portlet light bordered fieldWizard">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cubes font-grey-gallery"></i>
                <span class="caption-subject bold font-grey-gallery uppercase">{{ _t('settings.package') }}</span>
                <span class="caption-helper">
                @if(isset($package_id))
                        {{ _t('settings.edit_package') }}
                    @else
                        {{ _t('settings.add_package') }}
                    @endif
            </span>
            </div>
            <div class="inputs">
                <button type="button"
                        class="btn btn-circle dark btn-outline sbold packageList">{{ _t('settings.back') }}</button>
            </div>
        </div>
        <form role="form" class="packageForm" id="packageForm">
            @if(isset($package_id))
                <input type="hidden" name="action" value="edit">
            @else
                <input type="hidden" name="action" value="insert">
            @endif
            <div class="portlet-body" style="position: relative;">
                @if($cart_status)
                    @include('admin.Cartform.opencart_product_form')
                @else
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ _t('settings.package_name') }}</label>
                                <input type="text" name="name" class="form-control" id="name"
                                       placeholder="{{ _t('settings.Enter_package_name') }}"
                                       value="{{ $packageData->get('name') }}">
                                <input type="hidden" name="update_id" @if(isset($package_id)) value="{{ $package_id }}"
                                       @else value="" @endif>
                            </div>
                            <div class="form-group">
                                <label for="price">{{ _t('settings.price') }}</label>
                                <input type="text" name="price" class="form-control" id="price"
                                       placeholder="{{ _t('settings.Enter_price') }}"
                                       value="{{ $packageData->get('price') }}">
                            </div>
                            <div class="form-group">
                                <label for="product_value">{{ _t('settings.product_value') }}</label>
                                <input type="text" name="pv" class="form-control" id="pv"
                                       placeholder="{{ _t('settings.enter_product_value') }}"
                                       value="{{ $packageData->get('pv') }}">
                            </div>
                            {!! $hookServices->filter('packageFormBottom', '', 'root', ['package' => $packageData]) !!}
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <textarea class="packageDescription" name="description" id="description"
                                        placeholder="{{ _t('settings.Package_descriptions') }}">{{ $packageData->get('description') }}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="fmTrigger" data-input="thumbnail" data-preview="holder"
                                       class="btn btn-outline dark fmTrigger">
                                       <i class="fa fa-picture-o"></i> {{ _t('settings.choose') }}
                                    </a>
                                </span>
                                    <img id="holder" class="fmImage"
                                         src="{{ asset($packageData->get('image','place_holder.png')) }}">
                                    <input id="thumbnail"
                                           value="{{ $packageData->get('image','http://placehold.it/150x150') }}"
                                           class="form-control"
                                           name="image" type="hidden" name="filepath">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn dark ladda-button packageSubmit"
                                        data-style="contract">{{ _t('settings.save') }}
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    "use strict";
    //Document ready functions

    $('.packageList').click(function () {
        loadPackageList();
    });
    //bind filemanager to button
    var domain = '{{ asset('filemanage') }}';

    $('.fmTrigger').filemanager('image', {prefix: domain});

    $('.packageDescription').summernote({
        placeholder: 'Enter Description here',
        height: 150
    });

    $(function () {
        var form = $('#packageForm');
        var error1 = $('.alert-danger', form);
        var success1 = $('.alert-success', form);

        $.validator.addMethod('ajaxValidate', function (value, element, param) {
            var isValid = !$(element).parent().hasClass('ajaxValidationError');
            return isValid; // return bool here if valid or not.
        }, function (param, element) {
            return $(element).siblings('.help-block-error').text();
        });

        var validator = form.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            rules: {
                'name': {
                    required: true,
                    ajaxValidate: true,
                },
                'price': {
                    required: true,
                    number: true,
                    ajaxValidate: true,
                },
                'pv': {
                    required: true,
                    number: true,
                    ajaxValidate: true,
                },
                'description': {
                    required: true,
                    ajaxValidate: true,
                },
            },
            messages: {
                'name': {
                    required: "{{ _t('settings.please_enter_package_name') }}",
                },
                'price': {
                    required: "{{ _t('settings.please_enter_package_price') }}",
                    number: "{{ _t('settings.invalid_amount') }}",
                },
                'pv': {
                    required: "{{ _t('settings.please_enter_package_product_value') }}",
                    number: "{{ _t('settings.invalid_amount') }}",
                },
                'description': {
                    required: "{{ _t('settings.please_enter_package_description') }}",
                },
            },

            errorPlacement: function (error, element) {
                if (element.is(':checkbox')) {
                    error.insertAfter(element.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline"));
                } else if (element.is(':radio')) {
                    error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline"));
                } else {
                    error.insertAfter(element); // for other inputs, just perform default behavior
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

        //Registration request

        $('.packageForm .packageSubmit').click(function () {

            $('.ajaxValidationError').removeClass('ajaxValidationError');

            var successCallBack = function (response) {
                Ladda.stopAll();
                loadPackageList();
                toastr.success("{{ _t('settings.package_updated_sucessfully') }}");
            }

            if (!form.valid()) {
                Ladda.stopAll();
                return false;
            }

            var failCallBack = function (response) {
                Ladda.stopAll();
                var errors = response.responseJSON;

                for (var key in errors) {
                    var elemKey = key;
                    $('#adminConfig [name="' + elemKey + '"]').parent().addClass('ajaxValidationError');
                    var errorOption = {};
                    errorOption[elemKey] = errors[key];
                    validator.showErrors(errorOption);
                }
                Ladda.stopAll();
            };

            var options = {
                form: form,
                actionUrl: "{{ route('package.store') }}",
                successCallBack: successCallBack,
                failCallBack: failCallBack
            };
            sendForm(options);
        });
    });

    //Small patch

    $('body').on('keyup click', '.ajaxValidationError input', function () {
        $(this).parent().removeClass('ajaxValidationError');
    });
</script>
