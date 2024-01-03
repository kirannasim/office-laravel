<div class="col-lg-4 col-xs-12 col-sm-12 columns overview">
    <div class="portlet light systemModulesPortlet">
        <div class="portlet-title">
            <div class="caption">
                <span class="caption-subject bold uppercase font-dark">{{ _t('index.system_modules') }}</span>
            </div>
            <div class="actions">
                <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#" data-original-title=""
                   title=""> </a>
            </div>
        </div>
        <div class="portlet-body">
            <div class="moduleOverview">
                <div class="modulesCount">
                    <i class="fa fa-cube"></i>
                    {{ _t('index.total') }} <span>{{ $totalModules }} {{ _t('index.modules') }}</span>
                </div>
            </div>
            <div class="section pools mfkToggleWrap" data-toggle-type="class">
                <h3 class="mfkToggle">
                    {{ _t('index.pools') }}
                    <span class="iconGroup">
                        <i class="fa fa-angle-up on"></i>
                        <i class="fa fa-angle-down off"></i>
                    </span>
                </h3>
                <div class="sectionBody toggleBody hidden">
                    <div class="box all">
                        <div class="meta">
                            <i class="ico"></i> {{ _t('index.total') }}
                        </div>
                        <span class="total">{{ count($pools) }}</span>
                    </div>
                    <div class="box empty">
                        <div class="meta">
                            <i class="ico"></i>{{ _t('index.empty') }}
                        </div>
                        <span class="total">{{ $emptyPools }}</span>
                    </div>
                </div>
            </div>
            <div class="section class mfkToggleWrap" data-toggle-type="class">
                <h3 class="mfkToggle">
                    {{ _t('index.class') }}
                    <span class="iconGroup">
                        <i class="fa fa-angle-up on"></i>
                        <i class="fa fa-angle-down off"></i>
                    </span>
                </h3>
                <div class="sectionBody toggleBody hidden">
                    <div class="box premium">
                        <div class="meta">
                            <i class="ico"></i>{{ _t('index.premium') }}
                        </div>
                        <span class="total">{{ count($premiumModules) }}</span>
                    </div>
                    <div class="box free">
                        <div class="meta">
                            <i class="ico"></i>{{ _t('index.free') }}
                        </div>
                        <span class="total">{{ $totalModules - count($premiumModules) }}</span>
                    </div>
                </div>
            </div>
            <div class="section status mfkToggleWrap" data-toggle-type="class">
                <h3 class="mfkToggle open">
                    {{ _t('index.status') }}
                    <span class="iconGroup">
                        <i class="fa fa-angle-up on"></i>
                        <i class="fa fa-angle-down off"></i>
                    </span>
                </h3>
                <div class="sectionBody toggleBody">
                    <div class="box active">
                        <div class="meta">
                            <i class="ico"></i>{{ _t('index.active') }}
                        </div>
                        <span class="total">{{ $totalModules - count($inactiveModules) - count($modulesToBeInstalled) }}</span>
                    </div>
                    <div class="box inactive">
                        <div class="meta">
                            <i class="ico"></i>{{ _t('index.inactive') }}
                        </div>
                        <span class="total">{{ count($inactiveModules) }}</span>
                    </div>
                    <div class="box toInstall">
                        <div class="meta">
                            <i class="ico"></i>{{ _t('index.not_installed') }}
                        </div>
                        <span class="total">{{ count($modulesToBeInstalled) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-4 col-xs-12 col-sm-12 columns activeInactiveGraph">
    <div class="portlet light systemModulesPortlet">
        <div class="portlet-title">
            <div class="caption">
                <span class="caption-subject bold uppercase font-dark">{{ _t('index.module_status_chart') }}</span>
            </div>
            <div class="actions">
                <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#" data-original-title=""
                   title=""> </a>
            </div>
        </div>
        <div class="portlet-body">
            <div class="moduleStatusChartHolder"></div>
        </div>
    </div>
</div>
<div class="col-lg-4 col-xs-12 col-sm-12 columns premiumModulesList">
    <div class="portlet light systemModulesPortlet">
        <div class="portlet-title">
            <div class="caption">
                <span class="caption-subject bold uppercase font-dark">{{ _t('index.premium_modules') }}</span>
            </div>
            <div class="actions">
                <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#" data-original-title=""
                   title=""> </a>
            </div>
        </div>
        <div class="portlet-body">
            <div class="listHolder">
                @forelse($premiumModules as $key => $module)
                    <div class="each">
                        <span class="counter">{{ $key+1 }})</span>
                        <h3>{{ app($module)->getRegistry()['name'] }}
                            <span class="author">by <i>{{ app($module)->getRegistry()['author'] }}</i></span>
                        </h3>
                        <div class="info">
                            <div class="eachInfo">
                                <label>{{ _t('index.version') }}</label>
                                <span class="value">{{ app($module)->getRegistry()['version'] }}</span>
                            </div>
                            <div class="eachInfo">
                                <label>{{ _t('index.support_status') }}</label>
                                <span class="value expired">{{ _t('index.expired') }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="noModules">{{ _t('index.no_premium_modules') }}</div>
                @endforelse
            </div>
        </div>
    </div>
</div>
<script>
    "use strict";

    $(function () {
        setupModulesComparisonGraph('.moduleStatusChartHolder');
    });

    function setupModulesComparisonGraph(element) {
        jQuerize(element).highcharts({
            chart: {
                height: 265,
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45
                }
            },
            title: {
                text: ''
            },
            plotOptions: {
                pie: {
                    innerSize: 50,
                    depth: 30
                }
            },
            series: [{
                name: 'Number of modules',
                data: {!! json_encode($statusComparisonGraph) !!},
                showInLegend: true
            }]
        });
    }
</script>