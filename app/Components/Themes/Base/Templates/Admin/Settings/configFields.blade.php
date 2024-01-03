@extends('Admin.Layout.master')
@section('content')
    @component('Components.demoWarning') @endcomponent
    <div class="row fieldsWraper">
        <div class="portletHousing col-md-6">
            <div class="portlet light bordered fieldWizard">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cubes font-grey-gallery"></i>
                        <span class="caption-subject bold font-grey-gallery uppercase">Settings Fields </span>
                        <span class="caption-helper">Configure fields</span>
                    </div>
                    <div class="actions">
                        <div class="actions">
                            <a href="javascript:;" class="btn btn-circle btn-default addConfigField">
                                <i class="fa fa-plus"></i> Add </a>
                        </div>
                    </div>
                </div>
                <div class="portlet-body fieldFormUnitHolder"></div>
            </div>
        </div>
        <div class="portletHousing col-md-6">
            <div class="portlet light bordered fieldGroupWizard">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cube font-grey-gallery"></i>
                        <span class="caption-subject bold font-grey-gallery uppercase">Settings field group </span>
                        <span class="caption-helper">Configure field groups</span>
                    </div>
                    <div class="actions">
                        <div class="actions">
                            <a href="javascript:;" class="btn btn-circle btn-default addConfigGroup">
                                <i class="fa fa-plus"></i> Add </a>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <form class="configGroupForm">
                        <input type="hidden" name="privilage" value="">
                        <input type="hidden" name="action" value="save">
                        <input type="hidden" name="group_id" value="">
                        <div class="eachField row">
                            <label class="col-md-4">
                                <img class="flagIco"
                                     src="{{ asset('images/flags/flags_iso/24/' . currentLocal() . '.png') }}">Title
                            </label>
                            <div class="col-md-8">
                                <input type="text" value="" name="title[{{ currentLocal() }}]"
                                       placeholder="Group title - {{ currentLocalName() }}">
                                <button type="button" class="btn dark btn-outline showTranslation">
                                    <i class="fa fa-language"></i>Translations
                                </button>
                            </div>
                        </div>
                        <div class="configTranslations">
                            @foreach(getLocals() as $key => $local)
                                @if ($key == currentLocal())
                                    @continue
                                @endif
                                <div class="eachField row">
                                    <label class="col-md-4">
                                        <img class="flagIco"
                                             src="{{ asset('images/flags/flags_iso/24/' . $key . '.png') }}">Title
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" value="" name="title[{{ $key }}]"
                                               placeholder="Group title - {{ $local['name'] }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="eachField row">
                            <label class="col-md-4">
                                <img class="flagIco"
                                     src="{{ asset('images/flags/flags_iso/24/' . currentLocal() . '.png') }}">Description</label>
                            <div class="col-md-8">
                                <textarea value="" name="description[{{ currentLocal() }}]"
                                          placeholder="Group description - {{ currentLocalName() }}"></textarea>
                                <button type="button" class="btn dark btn-outline showTranslation">
                                    <i class="fa fa-language"></i>Translations
                                </button>
                            </div>
                        </div>
                        <div class="configTranslations">
                            @foreach(getLocals() as $key => $local)
                                @if ($key == currentLocal())
                                    @continue
                                @endif
                                <div class="eachField row">
                                    <label class="col-md-4">
                                        <img class="flagIco"
                                             src="{{ asset('images/flags/flags_iso/24/' . $key . '.png') }}">Description
                                    </label>
                                    <div class="col-md-8">
                                        <textarea value="" name="description[{{ $key }}]"
                                                  placeholder="Group description - {{ $local['name'] }}"></textarea>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="eachField row">
                            <label class="col-md-4">Parent group</label>
                            <div class="col-md-8">
                                <select name="parent" class="parentSelect select2" style="width:100%;">
                                    <option value="0">Select group</option>
                                    @foreach($fieldGroups as $group)
                                        <option value="{{ $group->id }}">{{ $group->getTitle() }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="eachField row">
                            <label class="col-md-4">Tag</label>
                            <div class="col-md-8">
                                <select name="tag_id" class="tagSelect select2" style="width:100%;">
                                    <option value="0">Select tag</option>
                                    @foreach($fieldTags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->getTitle() }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="eachField row">
                            <label class="col-md-4">Sort order</label>
                            <div class="col-md-8">
                                <input type="number" value="" name="sort_order">
                            </div>
                        </div>
                        <div class="eachField row">
                            <label class="col-md-4">Icon color</label>
                            <div class="col-md-8">
                                <input class="colorPicker" name="style[icon_color]" type="text" value="">
                            </div>
                        </div>
                        <div class="eachField row">
                            <label class="col-md-4">Text color</label>
                            <div class="col-md-8">
                                <input class="colorPicker" name="style[text_color]" type="text" value="">
                            </div>
                        </div>
                        <div class="eachField row">
                            <label class="col-md-4">Background color</label>
                            <div class="col-md-8">
                                <input class="colorPicker" name="style[background]" type="text" value="">
                            </div>
                        </div>
                        <div class="eachField iconGroup row">
                            <label class="col-md-4">Select icon</label>
                            <div class="col-md-8">
                                <div class="innerIconWrap">
                                    <div class="col-md-6">
                                        <button type="button" class="iconFont btn green">Font</button>
                                        <div class="icon_font_holder"></div>
                                        <input type="hidden" class="icon_font" name="iconFont" value="">
                                    </div>
                                    <div class="col-md-6">
                                        <button class="iconImage btn red" data-input="icon_image_thumb"
                                                data-preview="icon_image_holder">Image
                                        </button>
                                        <img src="" class="icon_image_holder" id="icon_image_holder">
                                        <input type="hidden" id="icon_image_thumb" class="icon_image"
                                               name="image" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="eachField row">
                            <div class="col-md-12">
                                <button type="button" class="btn green ladda-button saveFieldGroup"
                                        data-style="contract">
                                    <i class="fa fa-save"></i> save
                                </button>
                                <button type="button" class="btn blue backToGroup">
                                    <i class="fa fa-arrow-left"></i> back
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="settingsFieldGroups">
                        @if($fieldGroups->count())
                            <div class="table-responsive tableWrapper">
                                <table class="table table-bordered table-striped table-responsive fieldTable">
                                    <thead>
                                    <th>SL NO</th>
                                    <th>Title</th>
                                    <th>Core/Custom</th>
                                    <th>Editable</th>
                                    <th>icon</th>
                                    <th>Image</th>
                                    <th>Tag</th>
                                    <th>Sort order</th>
                                    <th>Edit</th>
                                    <th>Remove</th>
                                    </thead>
                                    <tbody>
                                    @foreach($fieldGroups as $group)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="groupLabel">{{ $group->getTitle() }}</td>
                                            <td class="isCore">
                                                {!! $group->core?'<span class="fieldRelation core">core</span>':'<span class="fieldRelation custom">custom</span>' !!}
                                            </td>
                                            <td class="editable">
                                                {!! $group->editable?'<i class="core fa fa-check"></i>':'<i class="custom fa fa-close"></i>' !!}
                                            </td>
                                            <td class="groupIco">
                                                <i class="{{ $group->iconFont }}"></i>
                                            </td>
                                            <td class="col-md-2 groupImage">
                                                {!! makeThumbnail($group->image) !!}
                                            </td>
                                            <td class="groupTag">
                                                {{ $group->tag?$group->tag->getTitle():'No tag' }}
                                            </td>
                                            <td>{{ $group->sort_order }}</td>
                                            <td>
                                                <button type="button" class="btn blue ladda-button editFieldGroup"
                                                        data-style="contract"
                                                        data-id="{{ $group->id }}"><i class="fa fa-pencil"></i></button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn red removeFieldGroup ladda-button"
                                                        data-style="contract" data-id="{{ $group->id }}"><i
                                                            class="fa fa-close"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="noFields">No groups found !</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="portlet light bordered fieldTagWizard">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cube font-grey-gallery"></i>
                        <span class="caption-subject bold font-grey-gallery uppercase">Settings tags </span>
                        <span class="caption-helper">Settings tags summary</span>
                    </div>
                    <div class="actions">
                        <div class="actions">
                            <a href="javascript:;" class="btn btn-circle btn-default addConfigTag">
                                <i class="fa fa-plus"></i> Add </a>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <form class="configTagForm">
                        <input type="hidden" name="action" value="save">
                        <input type="hidden" name="tag_id" value="">
                        <div class="eachField row">
                            <label class="col-md-4">
                                <img class="flagIco"
                                     src="{{ asset('images/flags/flags_iso/24/' . currentLocal() . '.png') }}">Tag name
                            </label>
                            <div class="col-md-8">
                                <input type="text" value="" name="title[{{ currentLocal() }}]"
                                       placeholder="Tag title - {{ currentLocalName() }}">
                                <button type="button" class="btn dark btn-outline showTranslation">
                                    <i class="fa fa-language"></i>Translations
                                </button>
                            </div>
                        </div>
                        <div class="configTranslations">
                            @foreach(getLocals() as $key => $local)
                                @if ($key == currentLocal())
                                    @continue
                                @endif
                                <div class="eachField row">
                                    <label class="col-md-4">
                                        <img class="flagIco"
                                             src="{{ asset('images/flags/flags_iso/24/' . $key . '.png') }}">Tag
                                        name
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" value="" name="title[{{ $key }}]"
                                               placeholder="Tag title - {{ $local['name'] }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="eachField row">
                            <label class="col-md-4">
                                <img class="flagIco"
                                     src="{{ asset('images/flags/flags_iso/24/' . currentLocal() . '.png') }}">Description</label>
                            <div class="col-md-8">
                                <textarea value="" name="description[{{ currentLocal() }}]"
                                          placeholder="Tag description"></textarea>
                                <button type="button" class="btn dark btn-outline showTranslation">
                                    <i class="fa fa-language"></i>Translations
                                </button>
                            </div>
                        </div>
                        <div class="configTranslations">
                            @foreach(getLocals() as $key => $local)
                                @if ($key == currentLocal())
                                    @continue
                                @endif
                                <div class="eachField row">
                                    <label class="col-md-4">
                                        <img class="flagIco"
                                             src="{{ asset('images/flags/flags_iso/24/' . $key . '.png') }}">
                                        Description
                                    </label>
                                    <div class="col-md-8">
                                        <textarea value="" name="description[{{ $key }}]"
                                                  placeholder="Tag description"></textarea>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="eachField row">
                            <div class="col-md-12">
                                <button type="button" class="btn green ladda-button saveFieldTag"
                                        data-style="contract">
                                    <i class="fa fa-save"></i> save
                                </button>
                                <button type="button" class="btn blue backToTag">
                                    <i class="fa fa-arrow-left"></i> back
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="fieldTagWrap">
                        @if($fieldTags->count())
                            <div class="table-responsive">
                                <table class="tagSummaryTable table table-bordered table-striped fieldTable">
                                    <thead>
                                    <th>SL No</th>
                                    <th>Tag name</th>
                                    <th>Slug</th>
                                    <th>Total field groups</th>
                                    <th>Core/Custom</th>
                                    <th>Editable</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    </thead>
                                    <tbody>
                                    @foreach($fieldTags as $tag)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $tag->getTitle() }}</td>
                                            <td><span class="slug">{{ $tag->slug }}</span></td>
                                            <td>{{ $tag->fieldGroups->count()?:'No groups' }}</td>
                                            <td class="isCore">
                                                {!! $tag->core?'<span class="fieldRelation core">core</span>':'<span class="fieldRelation custom">custom</span>' !!}
                                            </td>
                                            <td class="editable">
                                                {!! $tag->editable?'<i class="core fa fa-check"></i>':'<i class="custom fa fa-close"></i>' !!}
                                            </td>
                                            <td>
                                                <button class="btn blue editTag ladda-button" data-style="contract"
                                                        data-id="{{ $tag->id }}">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                            </td>
                                            <td>
                                                <button class="btn red deleteTag ladda-button" data-style="contract"
                                                        data-id="{{ $tag->id }}">
                                                    <i class="fa fa-close"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="noTags">No tags available</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        "use strict";

        function requestFieldForm(data) {
            simulateLoading('.fieldFormUnitHolder');
            return $.post('{{ route('config.fieldForm') }}', data, function (response) {
                $('.fieldFormUnitHolder').html(response);
            });
        }

        var initializer = function () {
            //Color picker initialize
            var settings = {
                animationSpeed: 50,
                animationEasing: 'swing',
                change: null,
                changeDelay: 0,
                control: 'hue',
                defaultValue: '',
                format: 'hex',
                hide: null,
                hideSpeed: 100,
                inline: false,
                keywords: '',
                letterCase: 'lowercase',
                opacity: false,
                position: 'bottom left',
                show: null,
                showSpeed: 100,
                theme: 'default',
                swatches: []
            };

            $('.colorPicker').minicolors(settings);

            //Initialize datepicker
            $('.datePicker').datepicker({
                format: 'mm/dd/yyyy',
                startDate: '-3d'
            });

            //Initialize switch
            $('[name="showSwitch[radio]"], [name="showSwitch[checkbox]"]').bootstrapSwitch({
                size: 'mini',
            });

            //Initialize Ladda
            Ladda.bind('.ladda-button');
        };

        //Document ready scripts
        $(function () {
            initializer();
            // load form
            requestFieldForm();
            //Initialize icon picker
            var callback = function (trigger, icon) {
                trigger.next('.icon_font_holder').html('<i class="' + icon + '"></i>').next('input').val(icon);
            };
            var options = {trigger: '.iconFont', callback: callback};

            iconPickerInit(options);

            //bind file-manager to button

            var domain = '{{ asset('filemanage') }}';

            $('.iconImage').filemanager('image', {prefix: domain});

            //Initialize validator for field group
            var form = $('.configGroupForm');
            var groupValidateInstance = form.validate({
                doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    groupName: {
                        minlength: 2,
                        required: true
                    }
                },
                errorPlacement: function (error, element) { // render error placement for each input type
                    error.insertAfter(element);
                },
            });

            //Initialize validator for field tag

            var form = $('.configTagForm');
            var tagValidateInstance = form.validate({
                doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    name: {
                        minlength: 2,
                        required: true
                    },
                    description: {
                        required: true,
                        minlength: 10
                    }
                },
                errorPlacement: function (error, element) { // render error placement for each input type
                    error.insertAfter(element);
                }
            });

            //Show config group form
            $('body').on('click', '.addConfigGroup', function () {
                resetGroupForm();
                $('.configGroupForm').slideDown().siblings().slideUp();
            });

            //Show config group form
            $('body').on('click', '.addConfigTag', function () {
                resetTagForm();
                $('.configTagForm').slideDown().siblings().slideUp();
            });

            //Show config group form
            $('body').on('click', '.addConfigField', function () {
                requestFieldForm({action: 'save'});
            });

            //Back to filedGroup
            $('body').on('click', '.backToGroup', function () {
                resetGroupForm();
                $('.configGroupForm').hide().siblings().slideDown();
            });

            //Back to filedGroup
            $('body').on('click', '.backToTag', function () {
                resetTagForm();
                $('.configTagForm').hide().siblings().slideDown();
            });

            //send tag save/update request
            $('body').on('click', '.saveFieldTag', function () {
                var form = $('.configTagForm');
                form.find('.error').remove();
                if (!form.valid()) {
                    Ladda.stopAll();
                    return false;
                }
                var options = form.serialize();
                $.post('{{ route("config.tag.handler") }}', options, function (response) {
                    Ladda.stopAll();
                    refreshPart(['.fieldTagWrap']).done(function () {
                        form[0].reset();
                        form.slideUp().siblings().slideDown();
                    }).done(function () {
                        Ladda.bind('.ladda-button');
                    });
                }).fail(function (response) {
                    Ladda.stopAll();
                    showAjaxErrors(tagValidateInstance, response);
                });
            });

            //send group save/update request
            $('body').on('click', '.saveFieldGroup', function () {
                var options = $('.configGroupForm').serialize();
                $.post('{{ route("config.group.handler") }}', options, function (response) {
                    Ladda.stopAll();
                    simulateLoading(['.settingsFieldGroups', '.fieldsWrapper']);
                    refreshPart(['.fieldGroupWizard', '.fieldTagWizard']).done(function () {
                        requestFieldForm();
                    }).done(function () {
                        Ladda.bind('.ladda-button');
                    });
                }).fail(function (response) {
                    Ladda.stopAll();
                    var errors = response.responseJSON;
                    //console.log(errors);
                    for (key in errors) {
                        var errobj = {};
                        var k = (key === ('title.' + '{{ currentLocal() }}')) ? 'title[{{ currentLocal() }}]' : key;
                        console.log(k);
                        errobj[k] = errors[key];
                        groupValidateInstance.showErrors(errobj);
                    }
                });
            });

            //send field save/update request
            $('body').on('click', '.saveField', function () {
                $('.errorWrapper.field').slideUp().empty();
                var options = $('.configFieldForm').serialize();
                var post = $.post('{{ route("config.field.handler") }}', options, function (response) {
                    Ladda.stopAll();
                    requestFieldForm();
                });
                post.fail(function (response) {
                    Ladda.stopAll();
                    var errors = response.responseJSON;
                    //console.log(errors);
                    for (key in errors) {
                        $('.errorWrapper.field').slideDown().append('<div class="eachError error">' + errors[key] + '</div>');
                    }
                });
            });
        });

        //Delete field group
        $('body').on('click', '.removeFieldGroup', function () {
            var me = $(this);
            var options = {id: $(this).attr('data-id'), action: 'delete'};
            var post = $.post('{{ route("config.group.handler") }}', options, function () {
                me.closest('tr').remove();
                Ladda.stopAll();
            }).fail(function (response) {
                alert(response.responseJSON[403]);
                Ladda.stopAll();
            });
        });

        //Add select custom choice
        $('body').on('click', '#addSelectChoice,#addRadioChoice,#addCheckChoice', function () {
            var lastItem = $(this).closest('.customOptionsWrapper').find('.eachCustomSelectOption').last();
            var nextId = Number(lastItem.attr('data-queue')) + 1;
            var fieldType = lastItem.attr('data-type');
            //console.log(lastId);
            var output = lastItem.clone();
            output.attr('data-queue', nextId);
            output.find('input[type="text"]').each(function () {
                var nameAttr = $(this).attr('name');
                var modifiedName = nameAttr.replace(/\w+\[\w+\]\[\d\]\[(\w+)\](\[(\w+)\])?/, "customOption[" + fieldType + "][" + nextId + "][$1]$2");
                $(this).attr('name', modifiedName);
            });
            lastItem.after(output);
        });

        //Delete custom field
        $('body').on('click', '.deleteCustomField', function () {
            if ($(this).closest('.customOptionsWrapper').find('.eachCustomSelectOption').length > 1)
                $(this).closest('.eachCustomSelectOption').remove();
        });

        //Edit field
        $('body').on('click', '.editField', function () {
            $('.fieldsWrapper').slideUp().siblings('.configFieldForm').slideDown();
            requestFieldForm({field: $(this).data('id')});
        });

        //Edit field group
        $('body').on('click', '.editFieldGroup', function () {
            var options = {action: 'query', id: $(this).attr('data-id')};
            $.post('{{ route("config.group.handler") }}', options, function (response) {
                Ladda.stopAll();
                $('.configGroupForm [name="action"]').val('update');
                $('.configGroupForm [name="group_id"]').val(response.id);
                for (var key in response.description) {
                    $('.configGroupForm [name="description[' + key + ']"]').val(response.description[key]);
                }
                for (var key in response.title) {
                    $('.configGroupForm [name="title[' + key + ']"]').val(response.title[key]);
                }
                $('.configGroupForm [name="tag_id"]').val(response.tag_id);
                $('.configGroupForm [name="sort_order"]').val(response.sort_order);
                $('.configGroupForm [name="iconFont"]').val(response.iconFont);
                $('.configGroupForm [name="parent"]').val(response.parent);
                $('.configGroupForm [name="style[text_color]"]').val(response.style['text_color']);
                $('.configGroupForm [name="style[icon_color]"]').val(response.style['icon_color']);
                $('.configGroupForm [name="style[background]"]').val(response.style['background']);
                $('.icon_font_holder').html('<i class="' + response.iconFont + '"></i>');
                $('.configGroupForm [name="image"]').val(response.image);
                $('.icon_image_holder').attr('src', response.image);
                $('.configGroupForm').show().siblings().slideUp();
            });
        });

        //Edit field tag
        $('body').on('click', '.editTag', function () {
            var options = {action: 'query', id: $(this).attr('data-id')};
            $.post('{{ route("config.tag.handler") }}', options, function (response) {
                Ladda.stopAll();
                $('.configTagForm [name="action"]').val('update');
                $('.configTagForm [name="tag_id"]').val(response.id);
                for (var key in response.description) {
                    $('.configTagForm [name="description[' + key + ']"]').val(response.description[key]);
                }
                for (var key in response.title) {
                    $('.configTagForm [name="title[' + key + ']"]').val(response.title[key]);
                }
                $('.configTagForm [name="sort_order"]').val(response.sort_order);
                $('.configTagForm').show().siblings().slideUp();
            });
        });

        //Generate custom fields
        function generateCustomFields(type, data) {
            //console.log(data);
            var target = $('.customOptionsWrapper.' + type);
            var theClone = target.find('.eachCustomSelectOption').first();
            target.find('.innerWrapper').empty();
            for (var key in data) {
                theClone.find('input[type="text"]').each(function () {
                    var nameAttr = $(this).attr('name');
                    var modifiedName = nameAttr.replace(/\w+\[(\w+)\]\[\d\]\[(\w+)\](\[(\w+)\])?/, "customOption[$1][" + key + "][$2]$3");
                    $(this).attr('name', modifiedName).val(data[key]['label'][i]);
                });
                for (var i in data[key]['label']) {
                    theClone.find('[name="customOption[' + type + '][' + key + '][label][' + i + ']"]').val(data[key]['label'][i]);
                }
                theClone.find('[name="customOption[' + type + '][' + key + '][value]"]').val(data[key]['value']);
                theClone.attr('data-queue', key);
                target.find('.innerWrapper').append(theClone.clone());
            }
        }

        //Fields back button
        $('body').on('click', '.backToFields', function () {
            resetFieldForm();
            $('.configFieldForm').slideUp().siblings('.fieldsWrapper').slideDown();
        });

        //Delete single field
        $('body').on('click', '.deleteField', function () {
            var me = $(this);
            var options = {id: me.attr('data-id'), action: 'delete'};
            var post = $.post('{{ route("config.field.handler") }}', options, function (response) {
                Ladda.stopAll();
                me.closest('tr').remove();
            });

            post.fail(function (response) {
                Ladda.stopAll();
            })
        });

        //Show validation meta input
        $('body').on('change', '.validationSelect', function () {
            if ($(this).find('option:selected').hasClass('hasExtra')) {
                var metaType = $(this).find('option:selected').attr('data-type');
                if (!metaType) return false;
                $('.validationMetasWrap').slideDown().find('.validationMetaField.' + metaType).removeClass('hidden').siblings('.validationMetaField').addClass('hidden');
            } else {
                addRule();
                $('.validationMetasWrap').slideUp();
            }
        });

        //Set validation meta
        $('body').on('click', '.saveValidation', function () {
            var metaValue = $('.validationMetaField').not('hidden').find('.field').val();
            if (!metaValue) {
                $('.validationError').slideDown();
                return false;
            }
            addRule(metaValue);
            $('.validationMetasWrap').slideUp().find('input, textarea').val('');
        });

        //Add meta rule value
        function addRule(metaValue, rule, ruleName) {
            rule = rule ? rule : $('.validationSelect option:selected').val();
            ruleName = ruleName ? ruleName : $('.validationSelect option:selected').text();
            var metaPart = metaValue ? ':' + metaValue : '';
            var output = '<span class="eachRule"><i class="fa fa-close"></i>';
            output += '<input type="hidden" value="' + rule + metaPart + '" name="field_validation[]">';
            output += ruleName + '</span>';
            //console.log(output);
            if ($('.eachRule input[name="field_validation[' + rule + ']"]').length) return false;
            $('.noRules').remove();
            $('.validationRules').append(output).closest('.validationRulesWrap').slideDown();
        }

        //Delete validation rule
        $('body').on('click', '.eachRule i', function () {
            $(this).parent().remove().promise().done(function () {
                if (!$('.validationRules .eachRule').length) {
                    resetValidationRules();
                }
            });
        });

        //Reset meta rules
        function resetValidationRules() {
            $('.validationRules').html('<div class="noRules">No rules to show</div>');
        }

        //reset field form
        function resetFieldForm() {
            var form = $('.configFieldForm');
            form[0].reset();
            resetValidationRules();
            resetCustomFields();
            form.find('[name="action"]').val('save');
            form.find('[name="field_id"]').val('');
            form.find('.errorWrapper').slideUp();
        }

        //reset group form
        function resetGroupForm() {
            var form = $('form.configGroupForm');
            form.find('.help-block-error').remove();
            form[0].reset();
            form.find('.icon_font_holder').empty();
            form.find('.icon_image_holder').attr('src', '');
            form.find('.icon_image_thumb').val('');
            form.find('[name="action"]').val('save');
            form.find('[name="group_id"]').val('');
            resetValidationRules();
        }

        //reset tag form
        function resetTagForm() {
            var form = $('form.configTagForm');
            form.find('.error').remove();
            form[0].reset();
            form.find('[name="action"]').val('save');
            form.find('[name="tag_id"]').val('');
        }

        function resetCustomFields() {
            $('.customOptionsWrapper .innerWrapper').each(function () {
                var firstElem = $(this).find('.eachCustomSelectOption').first().clone();
                $(this).empty();
                firstElem.find('input[type="text"]').each(function () {
                    var nameAttr = $(this).attr('name');
                    var modifiedName = nameAttr.replace(/\w+\[(\w+)\]\[\d\]\[(\w+)\]\[(\w+)\]/, "customOption[$1][0][$2][$3]");
                    $(this).attr('name', modifiedName);
                });
                $(this).append(firstElem.clone());
            });
        }

        //Show/hide translations
        $('body').on('click', '.showTranslation', function () {
            $(this).closest('.eachField, .innerOption').next('.configTranslations').slideToggle();
        });
    </script>
@endsection
