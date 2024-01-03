@inject('htmlHelper', 'App\Blueprint\Facades\HtmlServer')
<div class="configWrapper row">
    <div class="configNavigation col-md-3">
        <div class="navContainer">
            @foreach($fieldGroups as $group)
                <div class="eachConfigNav @if($loop->first) active @endif"
                     data-id="{{ $group->getTitle() }}"
                     style="@if(isset($group->style['text_color'])) color: {{ $group->style['text_color'] }} ; @endif
                     @if(isset($group->style['background']) && $group->style['background']) background: {{ $group->style['background'] }} ; @endif">
                    <i class="{{ $group->image ? $group->image : ($group->iconFont ?: 'fa fa-cubes') }}" style="
                    @if(isset($group->style['icon_color'])) color: {{ $group->style['icon_color'] }} ; @endif "></i>
                    <span>{{ $group->getTitle() }}</span>
                </div>
            @endforeach
        </div>
    </div>
    <div class="configFieldWrapper col-md-9">
        @forelse($fieldGroups as $group)
            <form class="configGroup {{ $group->getTitle() }} @if($loop->first) active @endif"
                  data-groupId="{{ $group->getTitle() }}" action="{{ route('global.config.save') }}">
                <h3><span>{{ $group->getTitle() }}</span> configurations</h3>
                {!! $htmlHelper::renderFieldGroup($group->id, null, ['defaultValueMethod' => 'config', 'class' => $group->children()->count() ? 'hasSubGroup' : '']) !!}
                @if($group->children()->count())
                    <div class="subGroupNavHolder col-md-3">
                        @foreach($group->children as $childGroup)
                            <div class="subGroupNav {{ $loop->first ? 'active' : '' }}" data-id="{{ $childGroup->id }}">
                                <span class="icon">
                                    <i class="{{ $childGroup->iconFont ?: 'fa fa-cubes' }}"></i>
                                </span>
                                {{ $childGroup->getTitle() }}
                            </div>
                        @endforeach
                    </div>
                    <div class="subGroupHolder col-md-9">
                        @foreach($group->children as $childGroup)
                            <div class="subGroupPane {{ $loop->first ? 'active' : '' }}"
                                 data-id="{{ $childGroup->id }}">
                                <h3><span>{{ $childGroup->getTitle() }}</span> configurations</h3>
                                {!! $htmlHelper::renderFieldGroup($childGroup->id, null, ['defaultValueMethod' => 'config']) !!}
                            </div>
                        @endforeach
                    </div>
                @endif
            </form>
        @empty
            <div class="noFieldGroups">No Settings groups found</div>
        @endforelse
        <div class="row">
            <div class="col-md-offset-9 col-md-3">
                <button type="button" class="btn green ladda-button saveConfig" data-style="contract">
                    <i class="fa fa-check"></i>Save
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    "use strict";

    function initConditionalDisplay() {
        $('.eachConfigField.conditional').each(function () {
            var ruleData = JSON.parse($(this).find('input.conditionalRules').val());
            var element = $(this);
            //console.log(ruleData);
            var result = '';
            ruleData.forEach(function (rule, index) {
                if (!rule) return;

                var targetElem = $('[name="{{ session('advFieldName') }}[' + rule.field + ']"]');

                switch (targetElem.attr('type')) {
                    case 'radio':
                        targetElem = $('[name="{{ session('advFieldName') }}[' + rule.field + ']"]:checked');
                        break;
                    default:
                        break;
                }
                console.log(targetElem.val());
                var concat = ((index == ruleData.length - 1) ? '' : rule.concat);
                result += dynamicCompare(targetElem.val(), rule.operand, rule.value) + concat;
            });
            //console.log(element);
            if (eval(result)) element.show(); else element.hide();
            console.log(result);
        });
    }

    $('input.icheck').on('ifChecked', function (event) {
        initConditionalDisplay();
    });

    $('body').on('change', '.eachConfigField select', function () {
        initConditionalDisplay();
    });

    $(function () {
        initConditionalDisplay();

        $('.subGroupNav').click(function () {
            $(this).addClass('active').siblings().removeClass('active');
            $('.subGroupPane[data-id="' + $(this).data('id') + '"]').addClass('active').siblings().removeClass('active');
        });
    });
</script>