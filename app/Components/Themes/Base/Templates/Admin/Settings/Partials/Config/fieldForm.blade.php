<div class="settingsFields">
    <div class="errorWrapper field"></div>
    <form class="configFieldForm" @if($field || ($action == 'save')) style="display: block;" @endif>
        <input type="hidden" name="action" value="{{ $action }}">
        <input type="hidden" name="field_id" value="{{ $field ? $field->id : '' }}">
        <div class="eachField row">
            <label class="col-md-4">
                <img class="flagIco" src="{{ asset('images/flags/flags_iso/24/' . currentLocal() . '.png') }}">
                Label
            </label>
            <div class="col-md-8">
                <input type="text" value="{{ $field ? $field->getTitle() : '' }}" name="label[{{ currentLocal() }}]"
                       placeholder="Field Label - {{ currentLocal() }}">
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
                        <input type="text"
                               value="{{ $field ? (isset($field->label[$key]) ? $field->label[$key] : '') : '' }}"
                               name="label[{{ $key }}]"
                               placeholder="Field Label - {{ $local['name'] }}">
                    </div>
                </div>
            @endforeach
        </div>
        <div class="eachField row">
            <label class="col-md-4">
                <img class="flagIco"
                     src="{{ asset('images/flags/flags_iso/24/' . currentLocal() . '.png') }}">Placeholder</label>
            <div class="col-md-8">
                <input type="text" value="{{ $field ? $field->getPlaceholder() : '' }}"
                       name="placeholder[{{ currentLocal() }}]"
                       placeholder="Placeholder">
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
                        <input type="text"
                               value="{{ $field ? (isset($field->placeholder[$key]) ? $field->placeholder[$key] : '') : '' }}"
                               name="placeholder[{{ $key }}]"
                               placeholder="Placeholder - {{ $local['name'] }}">
                    </div>
                </div>
            @endforeach
        </div>
        <div class="eachField row">
            <label class="col-md-4">Label link</label>
            <div class="col-md-8">
                <input type="text" value="{{ $field ? $field->link : '' }}" name="link" placeholder="Link">
            </div>
        </div>
        <div class="eachField row">
            <label class="col-md-4">Validation rules</label>
            <div class="col-md-8">
                <select class="validationSelect select2">
                    <option>Select validation rule</option>
                    @foreach($validationRules as $value => $rule)
                        <option value="{{ $value }}" @if(isset($rule['paramType'])) class="hasExtra"
                                data-type="{{ $rule['paramType'] }}" @endif>{{ $rule['name'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="eachField row validationRulesWrap"
             @if($field && $field->field_validation) style="display:block;" @endif>
            <label class="col-md-4">Rules</label>
            <div class="col-md-8 validationRules">
                @if($field)
                    @forelse((array)$field->field_validation as $rule)
                        <span class="eachRule">
                        <i class="fa fa-close"></i>
                        <input type="hidden" value="{{ $rule }}" name="field_validation[]">
                            {{ $validationRules[explode(':', $rule)[0]]['name'] }}
                    </span>
                    @empty
                        <div class="noRules">No rules to show</div>
                    @endforelse
                @endif
            </div>
        </div>
        <div class="eachField row validationMetasWrap">
            <label class="col-md-4">Set value</label>
            <div class="validationMetas col-md-8">
                <div class="validationMetaField text hidden">
                    <input class="field" type="text" value="">
                </div>
                <div class="validationMetaField textarea hidden">
                    <textarea class="field" value=""></textarea>
                </div>
                <div class="validationMetaField inputWithIcon date hidden">
                    <i class="fa fa-calendar"></i>
                    <input class="field" type="text" readonly class="datePicker"
                           value="{{ date('Y-m-d') }}">
                </div>
                <div class="validationError">You should enter a value</div>
                <div class="row">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-outline green saveValidation">
                            <i class="fa fa-check"></i> Set
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="conditionalFields">
            <div class="eachField row">
                <h4 class="col-md-12">
                    Conditional rules
                    <input class="icheck" type="checkbox"
                           {{ ($field && $field->conditional_rules) ? 'checked' : '' }} name="enableConditionalRules">
                </h4>
            </div>
            <div class="conditionsWrapper">
                @if($field && $field->conditional_rules)
                    @foreach($field->conditional_rules as $key => $conditionalRule)
                        @component('Admin.Settings.Partials.Config.Components.conditionalRules', ['key' => $key, 'conditionalFields' => $conditionalFields, 'condition' => $conditionalRule])
                        @endcomponent
                    @endforeach
                @else
                    @component('Admin.Settings.Partials.Config.Components.conditionalRules', ['key' => 0, 'conditionalFields' => $conditionalFields, 'condition' => null])
                    @endcomponent
                @endif
            </div>
            <div class="eachField row">
                <div class="col-md-offset-8 col-md-4">
                    <button type="button" class="btn btn-outline green addConditionalRule">Add rule</button>
                </div>
            </div>
        </div>
        <div class="eachField row">
            <label class="col-md-4">Field Group</label>
            <div class="col-md-8">
                <select name="field_group">
                    @foreach($fieldGroups as $group)
                        <option value="{{ $group->id }}"
                                @if($field && ($field->field_group == $group->id)) selected @endif>
                            {{ $group->getTitle() }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="eachField row">
            <label class="col-md-4">Field Type</label>
            <div class="col-md-8">
                @php
                    $fieldTypes = [
                        ['name' => 'Text', 'value' => 'text', 'target' => ''],
                        ['name' => 'Textarea', 'value' => 'textarea', 'target' => 'textAreaOptions'],
                        ['name' => 'Select', 'value' => 'select', 'target' => 'selectFieldChoices'],
                        ['name' => 'Multi Select', 'value' => 'multiSelect', 'target' => 'selectFieldChoices'],
                        ['name' => 'Radio', 'value' => 'radio', 'target' => 'radioFieldChoices'],
                        ['name' => 'Checkbox', 'value' => 'checkbox', 'target' => 'checkFieldChoices'],
                        ['name' => 'Image', 'value' => 'image', 'target' => ''],
                        ['name' => 'Icon', 'value' => 'icon', 'target' => ''],
                        ['name' => 'Button', 'value' => 'button', 'target' => 'buttonChoices'],
                    ];
                    $currentFieldTarget = '';
                    $currentField = '';
                @endphp
                <select name="field_type" class="depends" data-class="fieldChoices">
                    <option value="">Select Field</option>
                    @foreach($fieldTypes as $fieldType)
                        <option @if($field && ($field->field_type == $fieldType['value']))
                                @php
                                    $currentFieldTarget = $fieldType['target'];
                                    $currentField = $field->field_type;
                                @endphp
                                selected @endif data-target="{{ $fieldType['target'] }}"
                                value="{{ $fieldType['value'] }}">
                            {{ $fieldType['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="eachField row">
            <label class="col-md-4">Sort order</label>
            <div class="col-md-8">
                <input type="text" placeholder="Sort order" value="{{ $field ? $field->sort_order : '' }}"
                       name="sort_order">
            </div>
        </div>
        <div class="fieldChoices button" id="buttonChoices"
             @if ($currentFieldTarget == 'buttonChoices') style="display: block;" @endif>
            <div class="eachField row">
                <label class="col-md-4">color</label>
                <div class="col-md-8">
                    <input class="colorPicker" name="button[color]" type="text"
                           value="{{ isset($field->field_choices['button']['color']) ? $field->field_choices['button']['color'] : '#706c6c' }}">
                </div>
            </div>
            <div class="eachField row">
                <label class="col-md-4">Background color</label>
                <div class="col-md-8">
                    <input class="colorPicker" name="button[background]" type="text"
                           value="{{ isset($field->field_choices['button']['background']) ? $field->field_choices['button']['background'] : '#58d1b5' }}">
                </div>
            </div>
            <div class="eachField row">
                <label class="col-md-4">Text</label>
                <div class="col-md-8">
                    <input class="buttonText" name="button[text]" type="text"
                           value="{{ isset($field->field_choices['button']['text']) ? $field->field_choices['button']['text'] : '' }}">
                </div>
            </div>
            <div class="eachField row">
                <label class="col-md-4">icon</label>
                <div class="col-md-8">
                    <label class="iconFont">Select</label>
                    <div class="icon_font_holder">
                        <i class="{{ isset($field->field_choices['button']['icon']) ? $field->field_choices['button']['icon'] : 'fa fa-user' }}"></i>
                    </div>
                    <input type="hidden" class="icon" name="button[icon]"
                           value="{{ isset($field->field_choices['button']['icon']) ? $field->field_choices['button']['icon'] : 'fa fa-user' }}">
                </div>
            </div>
            <div class="eachField row">
                <label class="col-md-4">Loading animate</label>
                <div class="col-md-8">
                    <input class="buttonText bootstrapSwitch"
                           {{ (isset($field->field_choices['button']['loading']) && $field->field_choices['button']['loading']) ? 'checked' : '' }} name="button[loading]"
                           type="checkbox">
                </div>
            </div>
            <div class="eachField row">
                <label class="col-md-4">Preset actions</label>
                <div class="col-md-8">
                    @php
                        $buttonActions = [
                            ['name' => 'Custom link', 'value' => 'link', 'target' => 'buttonLink'],
                            ['name' => 'Clear system cache', 'value' => 'system.api/clearCache', 'target' => ''],
                            ['name' => 'Clear module cache', 'value' => 'system.api/clearCache/module', 'target' => ''],
                            ['name' => 'Clear menu cache', 'value' => 'system.api/clearCache/menu', 'target' => ''],
                            ['name' => 'Cleanup system', 'value' => 'system.api/cleanup', 'target' => ''],
                        ];
                    @endphp
                    <select class="depends" data-class="fieldChoices.button.link" name="button[action]">
                        <option>Select action</option>
                        @foreach($buttonActions as $buttonAction)
                            <option data-target="{{ $buttonAction['target'] }}"
                                    {{ (isset($field->field_choices['button']['action']) && $field->field_choices['button']['action'] == $buttonAction['value']) ? 'selected' : '' }} value="{{ $buttonAction['value'] }}">
                                {{ $buttonAction['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="fieldChoices button link eachField row" id="buttonLink">
                <div class="eachChoice">
                    <label class="col-md-4">Link</label>
                    <div class="col-md-8">
                        <input type="text"
                               value="{{ isset($field->field_choices['button']['link']) ? $field->field_choices['button']['link'] : '' }}"
                               name="button[link]" placeholder="Button link">
                    </div>
                </div>
                <div class="eachChoice">
                    <label class="col-md-4">Target</label>
                    <div class="col-md-8">
                        @php
                            $buttonTargets = [
                                ['name' => 'Blank', 'value' => '_blank'],
                                ['name' => 'Self', 'value' => '_self'],
                                ['name' => 'Parent', 'value' => '_parent'],
                                ['name' => 'Top', 'value' => '_top'],
                            ];
                            $currentButtonTarget = isset($field->field_choices['button']['link']) ? $field->field_choices['button']['link'] : '';
                        @endphp
                        <select class="select2 targetSelect" name="button[target]">
                            @foreach($buttonTargets as $target)
                                <option {{ ($currentButtonTarget == $target['value']) ? 'selected' : '' }} value="{{ $target['value'] }}">{{ $target['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="fieldChoices select depends" id="selectFieldChoices"
             data-class="fieldChoices.custom"
             @if ($currentFieldTarget == 'selectFieldChoices') style="display: block;" @endif>
            <div class="eachField row">
                <label class="col-md-4">Select choice type</label>
                @php
                    $selectChoices = [
                        ['name' => 'Modules', 'value' => 'module', 'target' => 'selectPool'],
                        ['name' => 'Themes', 'value' => 'theme', 'target' => 'selectThemes'],
                        ['name' => 'Languages', 'value' => 'language', 'target' => ''],
                        ['name' => 'Currencies', 'value' => 'currency', 'target' => ''],
                        ['name' => 'Countries', 'value' => 'country', 'target' => ''],
                        ['name' => 'Users', 'value' => 'user', 'target' => ''],
                        ['name' => 'Menus', 'value' => 'menu', 'target' => ''],
                        ['name' => 'Custom Options', 'value' => 'custom', 'target' => 'selectCustomChoices'],
                    ];
                    $currentChoice = isset($field->field_choices['choice_type']) ? $field->field_choices['choice_type'] : '';
                    $currentPool = isset($field->field_choices['pool']) ? $field->field_choices['pool'] : '';
                @endphp
                <div class="col-md-8">
                    <select name="choice_type" class="depends" data-class="fieldChoices.select.custom">
                        @foreach($selectChoices as $choice)
                            @php
                                $currentSelectTarget = ($currentChoice == $choice['value']) ? $choice['target'] : '';
                            @endphp
                            <option {{ ($currentChoice == $choice['value']) ? 'selected' : '' }} data-target="{{ $choice['target'] }}"
                                    value="{{ $choice['value'] }}">{{ $choice['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="fieldChoices select custom pools" id="selectPool"
             @if($currentSelectTarget == 'selectPool')
             style="display: block;"
                @endif>
            <div class="eachField row">
                <label class="col-md-4">Select pool</label>
                <div class="col-md-8">
                    <select name="module_pool" class="depends" data-class="fieldChoices.select.custom.pool">
                        <option value="0">All</option>
                        @foreach($modulePools as $pool)
                            <option {{ ($currentPool == $pool) ? 'selected' : '' }} value="{{ $pool }}">{{ $pool }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="fieldChoices select custom" id="selectCustomChoices"
             @if($currentSelectTarget == 'selectCustomChoices')
             style="display: block;"
                @endif>
            <div class="customOptionsWrapper select">
                @php
                    $customValues = isset($field->field_choices['custom_choice']) ? $field->field_choices['custom_choice'] : [];
                    $selectCustomChoices = ($currentSelectTarget == 'selectCustomChoices') ? $customValues : [];
                @endphp
                <div class="innerWrapper">
                    @forelse($selectCustomChoices as $key => $choice)
                        @component('Admin.Settings.Partials.Config.Components.customOption', ['type' => 'select', 'label' => $choice['label'], 'key' => $key, 'value' => $choice['value']])
                        @endcomponent
                    @empty
                        @component('Admin.Settings.Partials.Config.Components.customOption', ['type' => 'select']) @endcomponent
                    @endforelse
                </div>
                <div class="col-md-12 addChoice">
                    <button type="button" class="btn green btn-outline addChoice"
                            id="addSelectChoice">Add Choice
                    </button>
                </div>
            </div>
        </div>
        <div class="fieldChoices radios custom" id="radioFieldChoices"
             @if($currentFieldTarget == 'radioFieldChoices')
             style="display: block;"
                @endif>
            <div class="eachField row">
                <label class="col-md-4">Show switch</label>
                <div class="col-md-8"><input type="checkbox" name="showSwitch[radio]"></div>
            </div>
            <div class="customOptionsWrapper radio">
                @php
                    $radioCustomChoices = ($currentFieldTarget == 'radioFieldChoices') ? $customValues : [];
                @endphp
                <div class="innerWrapper">
                    @forelse($radioCustomChoices as $key => $choice)
                        @component('Admin.Settings.Partials.Config.Components.customOption', ['type' => 'radio', 'label' => $choice['label'], 'key' => $key, 'value' => $choice['value']])
                        @endcomponent
                    @empty
                        @component('Admin.Settings.Partials.Config.Components.customOption', ['type' => 'radio']) @endcomponent
                    @endforelse
                </div>
                <div class="col-md-12 addChoice">
                    <button type="button" class="btn green btn-outline addChoice"
                            id="addRadioChoice">Add Choice
                    </button>
                </div>
            </div>
        </div>
        <div class="fieldChoices checkboxes custom" id="checkFieldChoices"
             @if($currentFieldTarget == 'checkFieldChoices')
             style="display: block;"
                @endif>
            <div class="eachField row">
                <label class="col-md-4">Show switch</label>
                <div class="col-md-8">
                    <input type="checkbox"
                           {{ (($currentFieldTarget == 'checkFieldChoices') && $field->field_choices['show_switch']['checkbox']) ? 'checked' : '' }} name="showSwitch[checkbox]">
                </div>
            </div>
            <div class="customOptionsWrapper checkbox">
                @php
                    $checkboxCustomChoices = ($currentFieldTarget == 'checkFieldChoices') ? $customValues : [];
                @endphp
                <div class="innerWrapper">
                    @forelse($checkboxCustomChoices as $key => $choice)
                        @component('Admin.Settings.Partials.Config.Components.customOption', ['type' => 'checkbox', 'label' => $choice['label'], 'key' => $key, 'value' => $choice['value']])
                        @endcomponent
                    @empty
                        @component('Admin.Settings.Partials.Config.Components.customOption', ['type' => 'checkbox']) @endcomponent
                    @endforelse
                </div>
                <div class="col-md-12 addChoice">
                    <button type="button" class="btn green btn-outline addChoice" id="addCheckChoice">Add Choice
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 buttonWrap">
                <button type="button" class="btn green ladda-button saveField" data-style="contract">
                    <i class="fa fa-save"></i>save
                </button>
                <button type="button" class="btn blue backToFields">
                    <i class="fa fa-angle-left"></i>Back
                </button>
            </div>
        </div>
    </form>
    <div class="fieldsWrapper" @if($field || ($action == 'save')) style="display: none;" @endif>
        <div class="panel-group accordion" id="tagAccordion">
            @foreach($fieldTags as $tag)
                <div class="tagGroupPanel panel panel-default">
                    <div class="panel-heading">
                        <h4 class="tagTitle panel-title">
                            <a class="accordion-toggle accordion-toggle-styled @if(!$loop->first) collapsed @endif"
                               data-toggle="collapse" data-parent="#tagAccordion"
                               href="#tagGroup_{{ $loop->iteration }}"> {{ $tag->getTitle() }}
                                <span class="fieldRelation {{ $tag->core?'core':'custom' }}">{{ $tag->core?'core':'custom' }}</span>
                            </a>
                        </h4>
                    </div>
                    <div id="tagGroup_{{ $loop->iteration }}"
                         class="tagGroup panel-collapse collapse @if($loop->first) in @endif">
                        @forelse($tag->fieldGroups as $key => $group)
                            <div class="fieldGroupPanel panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle accordion-toggle-styled collapsed"
                                           data-toggle="collapse"
                                           data-parent="#tagGroup_{{ $loop->parent->iteration }}"
                                           href="#collapse_{{ $loop->parent->iteration }}_{{ $loop->iteration }}">
                                            {{ $group->getTitle() }}
                                            <span class="fieldRelation {{ $group->core?'core':'custom' }}">
                                                {{ $group->core?'core':'custom' }}
                                            </span>
                                            @if($group->parent)
                                                <span class="parent">Parent: <span>{{ $group->parentGroup->getTitle() }}</span></span>
                                            @endif
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse_{{ $loop->parent->iteration }}_{{ $loop->iteration }}"
                                     class="panel-collapse collapse">
                                    <div class="panel-body table-responsive">
                                        @if($group->fields->count())
                                            <table class="table table-bordered table-striped table-responsive fieldTable">
                                                <thead>
                                                <tr>
                                                    <td>Label</td>
                                                    <td>Name</td>
                                                    <td>Type</td>
                                                    <td>Edit</td>
                                                    <td>Remove</td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($group->fields as $field)
                                                    <tr>
                                                        <td>{{ collect($field->label)->get(currentLocal(), 'No label') }}</td>
                                                        <td>{{ collect($field->label)->get(currentLocal(), 'No label') }}</td>
                                                        <td>{{ $field->field_type }}</td>
                                                        <td>
                                                            <button class="btn green editField ladda-button"
                                                                    data-style="contract"
                                                                    data-id="{{ $field->id }}">
                                                                <i class="fa fa-pencil"></i>
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <button class="btn red deleteField ladda-button"
                                                                    data-style="contract"
                                                                    data-id="{{ $field->id }}">
                                                                <i class="fa fa-close"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <div class="noFields">No fields found !</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="noFields">No groups found !</div>
                        @endforelse
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<script>
    "use strict";

    $(function () {
        //Initialize select2
        $(".configFieldForm select").select2({
            placeholder: "Select",
            allowClear: true,
            width: '100%',
            escapeMarkup: function (m) {
                return m;
            }
        });

        //Initialize switch
        $('[name="showSwitch[radio]"], [name="showSwitch[checkbox]"], .bootstrapSwitch').bootstrapSwitch({
            size: 'mini'
        });

        //Initialize Ladda
        Ladda.bind('.ladda-button');

        //Initialize datepicker
        $('.datePicker').datepicker({
            format: 'mm/dd/yyyy',
            startDate: '-3d'
        });

        //iCheck
        $('input[type="radio"].icheck, input[type="checkbox"].icheck').iCheck({
            checkboxClass: 'icheckbox_minimal',
            radioClass: 'iradio_minimal',
            increaseArea: '20%' // optional
        });
    });

    //Select dependant
    $('body').off('change.select2', '.depends')
        .on('change.select2', '.depends', function () {
            //console.log($(this).parent().attr('data-class'));
            var target = $('#' + $(this).find('option:selected').attr('data-target'));
            //console.log(target);
            $('.' + $(this).attr('data-class')).not(target).slideUp();
            if (target.length) target.slideDown().find('select').trigger('change.select2');
        });

    $('body').off('click', '.addConditionalRule')
        .on('click', '.addConditionalRule', function () {
            $('.eachConcat .icheck').iCheck('destroy');
            $('.eachCondition select').select2('destroy');
            var lastCondition = $('.conditionsWrapper .eachCondition').last();
            var cloned = lastCondition.clone();
            var index = cloned.data('row');
            var nextIndex = Number(index) + 1;
            //console.log(nextIndex);
            cloned.find('input, select').each(function () {
                $(this).attr('name', $(this).attr('name').replace(/conditional_rules\[(\d+)\]\[(\w+)\]/i, function (str, index, name) {
                    //console.log('conditionalRules[' + nextIndex + '][' + name + ']');
                    return 'conditional_rules[' + nextIndex + '][' + name + ']';
                }));
            });
            cloned.attr('data-row', nextIndex)
                .find('select option[value="' + lastCondition.find('select').val() + '"]').remove();
            //console.log(cloned);
            $('.conditionsWrapper').append(cloned).promise().done(function () {
                $('.eachConcat .icheck').iCheck({
                    checkboxClass: 'icheckbox_minimal',
                    radioClass: 'iradio_minimal',
                    increaseArea: '20%' // optional
                });
                $('.eachCondition select').select2({
                    width: '100%'
                });
            });
        });
</script>
