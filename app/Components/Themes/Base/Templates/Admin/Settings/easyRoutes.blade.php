@extends('Admin.Layout.master')
@section('content')
    <div class="row packageWraper">
        <div class="portlet light packageWizard">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-puzzle font-grey-gallery"></i>
                    <span class="caption-subject bold font-grey-gallery uppercase"> {{_t('settings.Route_Wizard')}} </span>
                    <span class="caption-helper">Filter routes</span>
                </div>
                <div class="tools">
                    <a href="" class="collapse" data-original-title="" title=""> </a>
                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                    <a href="" class="reload" data-original-title="" title=""> </a>
                    <a href="" class="fullscreen" data-original-title="" title=""> </a>
                    <a href="" class="remove" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body form">
                <div class="routeFilterWrapper row">
                    <div class="col-md-6 routeSplitter">
                        <div class="innerWrapper">
                            <h3>All routes
                                <button class="btn green ladda-button addAll" data-style="contract">Add All</button>
                            </h3>
                            <div class="searchRoute">
                                <input type="text" placeholder="Search routes ...">
                                <button class="addSelectedRoutes btn blue ladda-button" style="width:auto;"
                                        data-style="contract">Add selected
                                </button>
                            </div>
                            <div class="routeHolder systemRoutes">
                                @forelse($routes as $route)
                                    <div class="eachRoute" id="{{ str_replace('.', '_', $route->getName()) }}">
                                        {{ $route->getName() }}
                                        <span class="controls">
                                    <button class="ladda-button btn green addEasyRoute" data-style="contract">
                                        <input class="routeController" type="hidden"
                                               value="{{ explode('@', $route->getActionName())[0] }}">
                                        <input class="routeUri" type="hidden" value="{{ $route->uri() }}">
                                        <input class="routeName" type="hidden" value="{{ $route->getName() }}">
                                        <input class="routeParams" type="hidden"
                                               value="{{ json_encode($route->parameterNames()) }}">
                                        <i class="fa fa-share"></i>
                                    </button>
                                </span>
                                    </div>
                                @empty
                                    <div class="noRoutes">All routes are in sync!</div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 routeSplitter">
                        <div class="innerWrapper">
                            <h3>Easy routes
                                <button class="btn red ladda-button revertAll" data-style="contract">Revert All</button>
                            </h3>
                            <div class="searchRoute">
                                <input type="text" placeholder="Search routes ...">
                                <button class="revertSelectedRoutes btn blue ladda-button" style="width:auto;"
                                        data-style="contract">Revert selected
                                </button>
                            </div>
                            <div class="routeHolder easyRoute">
                                @forelse($easyRoutes as $route)
                                    <div class="eachRoute" data-id="{{ $route->id }}">
                                        {{ $route->route_name }}
                                        <span class="controls">
                                    <button class="btn green editEasyRoute">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <button class="btn blue ladda-button revertEasyRoute" data-id="{{ $route->id }}"
                                            data-style="contract">
                                        <i class="fa fa-reply"></i>
                                    </button>
                                </span>
                                    </div>
                                    <form class="easyRouteMeta">
                                        <input type="hidden" name="id" value="{{ $route->id }}">
                                        <input type="hidden" name="action" value="updateRoute">
                                        <div class="eachField row">
                                            <div class="col-md-3">
                                                <label>Title</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" name="title" placeholder="Enter title"
                                                       value="{{ $route->title }}">
                                            </div>
                                        </div>
                                        <div class="eachField row">
                                            <div class="col-md-3">
                                                <label>Description</label>
                                            </div>
                                            <div class="col-md-9">
                                                <textarea name="description">{{ $route->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="eachField row">
                                            <div class="col-md-3">
                                                <button type="button" class="btn green saveEasyRoute ladda-button"
                                                        data-style="contract">
                                                    save <i class="fa fa-save"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                @empty
                                    <div class="noRoutes">There are no routes found!</div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        "use strict";

        //Document ready functions
        $(function () {
            $('.routeHolder').slimScroll({height: '70vh'});
        });

        //Add easy route
        function saveEasyRoute(routes, action, button) {
            var options = {action: action, routes: routes};
            $.post("{{ route('easyroutes.action') }}", options, function (response) {
                Ladda.stopAll();
                simulateLoading($('.routeHolder'));
                refreshPart(['.routeHolder.systemRoutes', '.routeHolder.easyRoute']).done(function () {
                    Ladda.bind('.ladda-button');
                }).fail(function () {
                    simulateLoading($('.routeHolder'), true);
                });
            }).fail(function (response) {
                Ladda.stopAll();
            });
            $('.searchRoute input').val('');
        }

        //Add easy routes
        $('body').on('click', '.addEasyRoute', function () {
            var routes = [
                {
                    route_name: $(this).find('input[type="hidden"].routeName').val(),
                    route_uri: $(this).find('input[type="hidden"].routeUri').val(),
                    route_controller: $(this).find('input[type="hidden"].routeController').val(),
                    route_params: $(this).find('input[type="hidden"].routeParams').val(),
                }
            ];
            var me = $(this);
            saveEasyRoute(routes, 'addRoute', me);
        });

        //Show easy route meta
        $('body').on('click', '.editEasyRoute', function () {
            $('.easyRouteMeta').not($(this).closest('.eachRoute').next('.easyRouteMeta').slideDown()).slideUp();
        });

        //Search routes
        $('body').on('keyup', '.searchRoute input[type="text"]', function () {
            var me = $(this);
            $(this).closest('.innerWrapper').find('.eachRoute').each(function () {
                //console.log($(this).text().indexOf(me.val()));
                if ($(this).text().indexOf(me.val()) === -1)
                    $(this).addClass('hidden');
                else
                    $(this).removeClass('hidden');
            });

            if ($(this).val() && $(this).closest('.innerWrapper').find('.eachRoute').not('.hidden').length)
                $(this).siblings('button').show();
            else
                $(this).siblings('button').hide();
        });

        //check all
        $('body').on('click', '.eachPrivilageGroup .itemMetaWrap button', function () {
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
                $(this).closest('.itemGroup').find('.eachItem').find('input.iCheck').iCheck('uncheck');
            } else {
                $(this).addClass('active');
                $(this).closest('.itemGroup').find('.eachItem').not('.hidden').find('input.iCheck').iCheck('check');
            }
        });

        //Save easyroute meta
        $('body').on('click', '.saveEasyRoute', function () {
            var options = $(this).closest('form').serialize();
            var me = $(this);
            return $.post("{{ route('easyroutes.action') }}", options, function (response) {
                Ladda.stopAll();
                me.closest('.easyRouteMeta').slideUp();
            }).fail(function (response) {
                Ladda.stopAll();
            });
        });

        //Save easyroute meta
        $('body').on('click', '.revertEasyRoute', function () {
            saveEasyRoute([$(this).attr('data-id')], 'deleteRoute', $(this));
        });

        //Revert All
        $('body').on('click', '.revertAll', function () {
            saveEasyRoute(false, 'revertAll');
        });

        //Add All
        $('body').on('click', '.addAll', function () {
            saveEasyRoute(false, 'addAll');
        });

        //Add selected
        $('body').on('click', '.searchRoute button.addSelectedRoutes', function () {
            var routes = [];
            var me = $(this);
            $(this).closest('.innerWrapper').find('.eachRoute').not('.hidden').each(function () {
                routes.push(
                    {
                        route_name: $(this).find('input.routeName').val(),
                        route_controller: $(this).find('input.routeController').val(),
                        route_uri: $(this).find('input.routeUri').val(),
                    }
                );
            });
            saveEasyRoute(routes, 'addRoute', me);
        });

        //Revert selected

        $('body').on('click', '.searchRoute button.revertSelectedRoutes', function () {
            var routes = [];
            var me = $(this);
            $(this).closest('.innerWrapper').find('.eachRoute').not('.hidden').each(function () {
                routes.push($(this).attr('data-id'));
            });
            saveEasyRoute(routes, 'delete', me);
        });
    </script>
@endsection
