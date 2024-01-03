@foreach($modules as $pool => $parent)
    <div id="{{ $pool }}" class="eachPool">
        @forelse($parent as $eachModule)
            <div class="moduleHolder {{ $eachModule->getRegistry()['class'] }}">
                <div class="moduleHead">
                    <span class="moduleIco">
                        <i class="fa fa-cube"></i>
                    </span>
                    {{ $eachModule->registry['name'] }}
                    <div class="moduleControls">
                        <span class="btn btn-outline blue moduleInfo"><i class="fa fa-info"></i></span>
                        @if($eachModule->registry['active'])
                            @if ($eachModule->getConfigRoute())
                                <a href="#" data-href="{{ $eachModule->getConfigRoute() }}"
                                   class="btn btn-outline green moduleConfig"
                                   data-open-as="{{ $eachModule->configPageType }}">
                                    <i class="fa fa-cog"></i>
                                </a>
                            @endif
                            <span data-id="{{ $eachModule->moduleId }}" data-style="contract"
                                  data-spinner-color="#3598dc"
                                  class="btn btn-outline ladda-button blue moduleDeactivate">Deactivate</span>
                            <span data-id="{{ $eachModule->moduleId }}" data-style="contract"
                                  data-spinner-color="#eea236"
                                  class="btn btn-outline ladda-button red moduleUninstall">Uninstall</span>
                        @elseif($eachModule->moduleId)
                            <span data-id="{{ $eachModule->moduleId }}" data-style="contract"
                                  data-spinner-color="#3598dc"
                                  class="btn btn-outline ladda-button blue moduleActivate">Activate</span>
                            <span data-id="{{ $eachModule->moduleId }}" data-style="contract"
                                  data-spinner-color="#eea236"
                                  class="btn btn-outline ladda-button red moduleUninstall">Uninstall</span>
                        @else
                            <span data-module="{{ $eachModule->registry['slug'] }}" data-style="contract"
                                  data-spinner-color="#32c5d2"
                                  class="btn btn-outline ladda-button green moduleInstall">Install</span>
                            <span data-module="{{ $eachModule->registry['slug'] }}" data-style="contract"
                                  data-spinner-color="#eea236"
                                  class="btn btn-outline ladda-button red moduleUninstall">Uninstall</span>
                        @endif
                    </div>
                </div>
                <div class="moduleMeta">
                    @forelse(collect($eachModule->getRegistry())->only(['name','author','version','description', 'class','screenshot']) as $metaKey => $metaValue)
                        @if($metaKey == 'screenshot')
                            <div class="eachMeta {{ $metaKey }}">
                                <label>{{ $metaKey }}</label>
                                <img src="{{ asset('photos/admin/logos/hybrid-logo.png') }}">
                            </div>

                        @else
                            <div class="eachMeta {{ $metaKey }}">
                                <label>{{ $metaKey }}</label>
                                <span class="metaValue {{ $metaValue }}">{{ $metaValue }}</span>
                            </div>
                        @endif
                    @empty
                        <div class="noMeta">There are no meta informations found</div>
                    @endforelse
                </div>
            </div>
        @empty
            <div class="noModules"><i class="fa fa-info"></i>Sorry there are no modules in this
                pool !
            </div>
        @endforelse
    </div>
@endforeach

<script>
    "use strict";

    /**
     * document ready functions
     */
    $(function () {
        Ladda.bind('.ladda-button');
    });
</script>
