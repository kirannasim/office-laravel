@extends(ucfirst(getScope()).'.Layout.master')
@section('content')
    @include('_includes.network_nav')
    <div class="portlet light" style="margin-top: 40px;">
        <div class="row">
            <div class="col-sm-2 form-group">
                <label>{{ _mt($moduleId, 'TabularTree.Locate') }}</label>
                <input type="text" class="form-control locationUserFiller"
                       placeholder="{{ _mt($moduleId, 'TabularTree.enter_username') }}"/>
            </div>
            <div class="col-sm-2 form-group">
                <label>{{ _mt($moduleId, 'TabularTree.Username') }}</label>
                <input type="text" class="form-control userFiller"
                       placeholder="{{ _mt($moduleId, 'TabularTree.enter_username') }}"/>
                <input type="hidden" name="filters[user_id]" id="user_id">
            </div>
            <div class="col-sm-2 form-group">
                <label>{{ _mt($moduleId, 'TabularTree.Tree_Type') }}</label>
                <select name="type" id="type" class="form-control treeType">
                    <option value="placement"
                            @if($type == 'placement') selected @endif >{{ _mt($moduleId, 'TabularTree.Placement') }}</option>
                    <option value="sponsor"
                            @if($type == 'sponsor') selected @endif >{{ _mt($moduleId, 'TabularTree.Sponsor') }}</option>
                </select>
            </div>
            <div class="col-sm-3"></div>
        </div>
        <div class="portlet-body form" style="height: auto;">
            <div class="treeWrapper">
                <div class="row">
                    <div class="col-md-6">
                        <div class="portlet-body">
                            <li role="treeitem" aria-selected="false" aria-level="0"
                                aria-expanded="true" class="jstree-node  jstree-last jstree-open" aria-busy="false">
                                <i class="jstree-icon jstree-ocl" role="presentation"></i>
                                <a class="jstree-anchor tree-head" href="#" tabindex="-1" id="{{ $user }}_anchor">
                                    <i class="jstree-icon jstree-themeicon fa fa-user icon-lg icon-state-danger jstree-themeicon-custom"
                                       role="presentation"></i><span
                                            class="treee-head-user">{{  usernameFromId($user) }}</span></a></li>
                        </div>
                        <ul role="group" class="jstree-children" style="">
                            <div id="tree" class="tree-demo"></div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        "use strict";

        $(document).ready(function () {

            if ('{{ $moduleData->get("view_tooltip") }}' == '1') {
                $('body').on('mouseover', '.treeWrapper .jstree-node a', function () {
                    var me = $(this);
                    var elements = me.attr('id').split('_');
                    var userId = elements[0];
                    $(this).webuiPopover({
                        trigger: 'hover',
                        type: 'async',
                        url: "{{ route(strtolower(getScope()).'.tree.tabularTree.tooltip',['id'=> false]) }}/" + userId,
                    });
                });
            }

            function renderTree(userId) {
                $.jstree.destroy();

                $("#tree").jstree({
                    "core": {
                        "themes": {
                            "responsive": false
                        },
                        // so that create works
                        "check_callback": true,
                        'data': {
                            'url': function (node) {
                                return "{!! route(strtolower(getScope()).'.tree.tabularTree.loadTreeNode') !!}";
                            },
                            'data': function (node) {
                                //console.log(node);
                                return {'parent': node.parent ? node.id : userId, 'type': '{{ $type }}'};
                            }
                        }
                    },
                    "types": {
                        "default": {
                            "icon": "fa fa-folder icon-state-warning icon-lg"
                        },
                        "file": {
                            "icon": "fa fa-file icon-state-warning icon-lg"
                        }
                    },
                    "state": {"key": "demo3"},
                    "plugins": ["dnd", "state", "types"]
                });
            }

            var UITree = function () {
                return {
                    //main function to initiate the module
                    init: function () {
                        renderTree();
                    }
                };
            }();

            $(function () {
                UITree.init();
            });

            //user tree view
            $(function () {
                //User fetcher
                var selectedCallback = function (target, id, name) {
                    $('.userFiller').val(name);
                    $('.tree-head').attr('id', id + '_anchor');
                    $('.treee-head-user').text(name);
                    renderTree(id);
                };

                var options = {
                    target: '.userFiller',
                    route: '{{ route("user.api") }}',
                    action: 'getUsers',
                    name: 'username',
                    ajaxData: {downlineRelation: '{{ $type }}', includeSelf: true},
                    selectedCallback: selectedCallback
                };
                $('.userFiller').ajaxFetch(options);
            });

            //user location search
            $(function () {
                //User fetcher
                var locationSearchCallback = function (target, id, name) {
                    $('.locationUserFiller').val(name);
                    var data = {};
                    data['userId'] = id;
                    data['type'] = '{{ $type }}';
                    data['parentId'] = $('.tree-head').attr('id').split('_')[0];
                    $.post('{{ route(strtolower(getScope()).'.tree.tabularTree.getParentTreeNodes') }}', data, function (response) {
                        openNodes(response);
                    });
                };

                var options = {
                    target: '.locationUserFiller',
                    route: '{{ route("user.api") }}',
                    action: 'getUsers',
                    name: 'username',
                    ajaxData: {downlineRelation: '{{ $type }}', includeSelf: true},
                    selectedCallback: locationSearchCallback
                };
                $('.locationUserFiller').ajaxFetch(options);
            });
        });

        function openNodes(nodes) {
            var node = nodes.pop();

            $("#tree").jstree('open_node', node, function (e, d) {
                openNodes(nodes);
            });
        }


        $(".treeType").change(function () {
            var treeType = $(this).val();
            if ('{{ $type }}' != treeType) {
                var url = '{{ route(strtolower(getScope()).".tree.tabularTree") }}' + '/' + treeType;
                window.location.href = url;
            }
        });
    </script>
@endsection