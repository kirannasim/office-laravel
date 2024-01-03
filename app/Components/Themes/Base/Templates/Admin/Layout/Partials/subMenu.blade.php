@inject('menuFactory','App\Blueprint\Services\MenuServices')

<li class="nav-item{{ $isCurrent ? ' active' : '' }}" data-id="{{ $menu['id'] }}"
    @if ($bookmarked) data-bookmarkId="{{ $bookmarked->id }}" @endif>
    <a href="{{ $href }}" class="nav-link nav-toggle">
        @if ($menu['icon_image'])
            <img src="{{ asset($menu['icon_image']) }}">
        @else
            <i class="{{ $menu['icon_font'] }}"></i>
        @endif
        {{--<span class="favourite @if ($bookmarked) bookmarked @endif">
            <i class="@if ($bookmarked) fa fa-star @else fal fa-star @endif"></i>
        </span>--}}
        <span class="title">{{ $label }}</span>
        <span class="selected"></span>
        @if(isset($menu['child']) && $menu['child']) <span class="arrow"></span> @endif
    </a>
    @if(isset($menu['child']) && $menu['child'])
        <ul class="sub-menu" style="display: none;">
            {!! $menuFactory->renderLeftMenu($menu['child']) !!}
        </ul>
    @endif
</li>
