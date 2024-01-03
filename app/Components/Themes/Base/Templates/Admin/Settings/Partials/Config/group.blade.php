@inject('htmlHelper', 'App\Blueprint\Services\HtmlServices')
@forelse($group->fields as $key => $item)
    @php
        switch ($options->get('defaultValueMethod')){
            case 'config':
            $value = getConfig((int)$item->field_group , $item->field_name);
            break;
            case 'post':
            $value = request()->input($item->field_name, null);
            break;
            default:
            $value = null;
            break;
        }
    @endphp
    {!! $htmlHelper->render($item, $value, $options->get($item->field_type, [])) !!}
@empty
    @if(!$hideEmptyDialogue)
        <div class="noFields">No settings fields found in this group</div>
    @endif
@endforelse
<div class="marginAdjuster {{ $options->get('class') }}"></div>