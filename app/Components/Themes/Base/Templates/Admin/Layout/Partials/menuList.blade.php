@inject('menuFactory','App\Blueprint\Services\MenuServices')

<li class="dd-item" data-id="{{ $menu['id'] }}" data-parent_id="{{ $menu['parent_id'] }}">
    <i class="fa fa-cog menuSettings" style="line-height:2;"></i>
    <div class="dd-handle">
        {{ $label }}
        @if($menu['description']) <span class="menuNote">{{ $menu['description'] }}</span> @endif
    </div>
    <form class="menuData">
        <input type="hidden" value="{{ $menu['id'] }}" name="menus[leftmenu][{{ $menu['id'] }}][id]">
        <div class="eachfield row currentLanguage">
            <div class="col-md-3">
                <label>Name ({{ currentLocal() }}) :</label>
            </div>
            <div class="col-md-9">
                <input type="text" data-lang="{{ currentLocal() }}" class="name" value="{{ $menu->getLabel() }}"
                       placeholder="Menu name" name="menus[leftmenu][{{ $menu['id'] }}][label][{{ currentLocal() }}]">
                <button type="button" class="btn btn-outline green showAllLanguages">All languages</button>
            </div>
        </div>
        <div class="eachfield row">
            <div class="col-md-3">
                <label>Description :</label>
            </div>
            <div class="col-md-9">
                <input type="text" placeholder="Menu description" name="menus[leftmenu][{{ $menu['id'] }}][description]"
                       class="description" value="{{ $menu['description'] }}">
            </div>
        </div>
        @foreach($menu['label'] as $key => $name)
            @if ($key == currentLocal())
                @continue
            @endif
            <div class="eachfield row otherLanguages">
                <div class="col-md-3">
                    <label>Name ({{ $key }}) :</label>
                </div>
                <div class="col-md-9">
                    <input type="text" data-lang="{{ $key }}" placeholder="Menu name"
                           name="menus[leftmenu][{{ $menu['id'] }}][label][{{ $key }}]" value="{{ $name }}"
                           class="name">
                </div>
            </div>
        @endforeach
        <div class="eachfield row">
            <div class="col-md-3">
                <label>Link :</label>
            </div>
            <div class="col-md-9">
                <input type="text" placeholder="Menu link" name="menus[leftmenu][{{ $menu['id'] }}][link]" class="link"
                       value="{{ $menu['link'] }}">
            </div>
        </div>
        <div class="eachfield row">
            <div class="col-md-3">
                <label>Sort order :</label>
            </div>
            <div class="col-md-9">
                <input type="text" placeholder="Menu link" name="menus[leftmenu][{{ $menu['id'] }}][sort_order]"
                       class="link" value="{{ $menu['sort_order'] }}">
            </div>
        </div>
        <div class="eachfield row">
            <div class="col-md-3">
                <label>Route :</label>
            </div>
            <div class="col-md-9">
                <select class="route select2" name="menus[leftmenu][{{ $menu['id'] }}][route]">
                    <option value="">Select route</option>
                    @foreach($routes as $route)
                        <option value="{{ $route->id }}" {{ $route->id == $menu['route'] ? 'selected' : '' }}
                        data-params="{{ implode('|', (array)$route->route_params) }}">
                            {{ $route->title?:'No name specified' }}
                            ({{ $route->route_name }})
                        </option>
                    @endforEach
                </select>
            </div>
        </div>
        <div class="eachfield row">
            <div class="routeParams col-md-9 col-md-offset-3"></div>
        </div>
        <div class="eachfield iconGroup row">
            <div class="col-md-3">
                <label>Menu icon :</label>
            </div>
            <div class="col-md-9">
                <div class="col-md-6">
                    <button type="button" class="btn green iconFont">Font</button>
                    <div class="icon_font_holder">
                        <i class="{{ $menu['icon_font'] }}"></i>
                    </div>
                    <input type="hidden" class="icon_font" name="menus[leftmenu][{{ $menu['id'] }}][icon_font]"
                           value="{{ $menu['icon_font'] }}">
                </div>
                <div class="col-md-6">
                    <button type="button" class="iconImage btn blue" data-input="icon_image_thumb"
                            data-preview="icon_image_holder">image
                    </button>
                    <img src="@if($menu['icon_image']) {{ asset($menu['icon_image']) }} @endif"
                         class="icon_image_holder" id="icon_image_holder">
                    <input type="hidden" id="icon_image_thumb" class="icon_image"
                           name="menus[leftmenu][{{ $menu['id'] }}][icon_image]" value="{{ $menu['icon_image'] }}">
                </div>
            </div>
        </div>
        {!! defineFilter('menuFormBottom', '', 'root', ['type' => 'left', 'menu' => $menu]) !!}
        <div class="eachfield row actionButton">
            <div class="col-md-7 col-md-offset-3">
                <button type="button" data-menuId="{{ $menu['id'] }}"
                        class="saveMenu btn blue mt-ladda-btn ladda-button btn-circle btn-outline" data-style="contract"
                        data-spinner-color="#333">
                    <span class="ladda-label">Save</span>
                    <span class="ladda-spinner"></span>
                    <div class="ladda-progress" style="width: 0px;"></div>
                </button>
                <button type="button" data-menuId="{{ $menu['id'] }}"
                        class="deleteMenu btn red mt-ladda-btn ladda-button btn-circle btn-outline"
                        data-style="contract" data-spinner-color="#333">
                    <span class="ladda-label">Delete</span>
                    <span class="ladda-spinner"></span>
                    <div class="ladda-progress" style="width: 0px;"></div>
                </button>
            </div>
        </div>
    </form>
    @if(isset($menu['child']) && $menu['child'])
        <ol class="dd-list">
            {!! $menuFactory->listLeftMenu($menu['child']) !!}
        </ol>
    @endif
</li>
