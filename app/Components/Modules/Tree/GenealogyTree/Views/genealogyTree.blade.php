@if(!$ajaxRequest)
    @extends(ucfirst(getScope()).'.Layout.master')
@section('content')
    @endif
    @include('_includes.network_nav')
    <div class="portlet" style="margin-top: 40px;">
        <div class="row">
            <div class="col-sm-2 form-group">
                <label>{{ _mt($moduleId, 'GenealogyTree.Username') }}</label>
                <input class="form-control userFiller" type="text"
                       placeholder="{{ _mt($moduleId, 'GenealogyTree.enter_username') }}">
                <input type="hidden" name="filters[user_id]" id="user_id">
            </div>
            {{--<div class="col-sm-3">
                <div class="AvatarBlock currencyPicker dropdown">
                    <button type="button" class="btn btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"
                            aria-expanded="false">
                        <span> <i class="fa fa-info"></i>{{ _mt($moduleId, 'GenealogyTree.Avatar_Representations') }}
                            <i class="fa fa-angle-down"></i></span>
                    </button>
                    <ul class="dropdown-menu pull-right">
                        <h3 class="AvatarTitle">{{ $moduleData->get('icon_representation') }}</h3>
                        @foreach ($iconList as $item)
                            <li>
                                <span><img src="{{ asset($item['icon']) }}"> {{ $item['title'] }} </span>
                            </li>
                        @endforeach
                        --}}{{-- <li>
                              <span><label class="avtColor"></label> sample text </span>
                         </li>--}}{{--
                    </ul>
                </div>
            </div>--}}
             <div class="col-sm-8 portlet-body form" style="height: auto;margin-left:40px;">
                <div class="treeWrapper">
                    <div class="treeOptions">
                        <span class="trigger"><i class="fa fa-cogs"></i> Options</span>
                    </div>
                    <div class="treeSwitches">
                        <span class="reset switch" data-action="reset">
                            <i class="fa fa-refresh"></i>
                        </span>
                    </div>
                    {!! $content !!}
                </div>
            </div>
        </div>
       
    </div>

    <script type="text/javascript">
        'use strict';

        //Adjust dropdown position
        function adjustPosition(elem, target) {
            elem.width(target.outerWidth()).slideDown().offset({
                left: target.offset().left,
                top: (target.offset().top + target.outerHeight())
            });
        }

        //Get users
        function getUsers(data) {
            var options = {
                limit: 10,
                action: 'getUsers'
            };
            options.data = data;

            return $.post("{{ route('user.api') }}", options);
        }

        $(".treeType").change(function () {
            var treeType = $(this).val();
            if ('{{ $type }}' != treeType) {
                var url = '{{ scopeRoute("tree.genealogyTree") }}' + '/' + treeType;
                window.location.href = url;
            }
        });


    </script>
    <style type="text/css">

        .treeWrapper {
            position: relative;
        }

        form.treeFilters {
            margin-bottom: 0px;
            position: relative;
            border-bottom: 2px solid #36c6d3 !important;
            display: block;
            padding: 0 !important;
            box-shadow: 3px 9px 10px rgba(68, 68, 68, 0.11);
        }

        .treeFilters input[type="text"] {
            padding: 5px;
            border: 1px solid #dddddd;
            outline: none !important;
            width: 100%;
        }

        .arrowNav:after {
            content: '';
            position: relative;
            width: 0px;
            display: block;
            margin: auto;
            border-top: 10px solid #36c6d3 !important;
            border: 10px solid rgba(255, 255, 255, 0.02);
            height: 0px;
        }

        .arrowNav {
            position: relative;
        }

        form.treeFilters > div {
            padding: 10px;
        }

        .ajaxDropDown .eachResult {
            padding: 6px;
            border-bottom: 1px solid #e5e5e5;
            cursor: pointer;
            color: black;
        }

        .ajaxDropDown {
            position: absolute;
            z-index: 999;
            display: none;
            max-width: 400px;
            background: white;
            border: 1px solid #dadada;
            border-bottom: 3px solid #36c6d3;
            box-shadow: 4px 6px 12px rgba(62, 62, 62, 0.28);
        }

        .ajaxNoResult i {
            color: black;
            font-size: 15px;
        }

        .ajaxNoResult {
            padding: 10px;
            font-size: 13px;
            color: #a5a5a5;
            font-style: italic;
        }

        .AvatarBlock.dropdown {
            float: right;
            background-color: transparent !important;
            margin-top: 19px;
        }

        .AvatarBlock.dropdown button.btn {
            background-color: transparent;
            border: solid 1px #eee;
            color: #888;
            padding: 10px 10px;
            font-size: 14px;
        }

        .AvatarBlock.dropdown button.btn span i {
            padding: 0px 4px;
        }

        .AvatarBlock ul.dropdown-menu {
        }

        .AvatarBlock ul.dropdown-menu h3.AvatarTitle {
            margin: 0;
            font-size: 15px;
            padding: 10px;
            border-bottom: 1px solid #eee;
            font-weight: 400;
            color: #9e9898;
            white-space: nowrap;
            background: #eaedf2;
        }

        .AvatarBlock ul.dropdown-menu:after {
            border-bottom: 7px solid #eaedf2;
        }

        .AvatarBlock ul.dropdown-menu li {
            border-bottom: solid 1px #eeeeee96;
            padding: 8px 16px;
            color: #6f6f6f;
            text-decoration: none;
            display: block;
            clear: both;
            font-weight: 300;
            line-height: 18px;
            white-space: nowrap;
        }

        .AvatarBlock ul.dropdown-menu li span img {
            width: 15px;
        }

        .AvatarBlock ul.dropdown-menu li span label.avtColor {
            width: 15px;
            height: 15px;
            background-color: red;
            display: inline-block;
            margin: 0px;
        }
    </style>
    @if(!$ajaxRequest)
@endsection
@endif