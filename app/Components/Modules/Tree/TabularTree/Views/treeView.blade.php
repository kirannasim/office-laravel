<ul role="group" class="jstree-children" style="">
    <div id="tree" class="tree-demo"></div>
</ul>
<script>
    "use strict";

    $(document).ready(function () {

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
                            return "{!! scopeRoute('tree.tabularTree.loadTreeNode') !!}";
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
            var loadTree = function () {
                renderTree();
            };

            return {
                //main function to initiate the module
                init: function () {
                    loadTree();
                }
            };
        }();

        $(function () {
            UITree.init();
        });
    });
</script>
<style>
    .tree-head {
        /* font-weight: 600; */
        /* margin-bottom: 10px; */
    }

    .portlet-body > .treeitem {
    }

    .treeWrapper .portlet-body > .jstree-node {
        font-weight: 600;
        margin-bottom: 5px;
        right: 4px;
        position: relative;
        font-size: 15px;
    }

    .treeWrapper .portlet-body > .jstree-node i {
        font-size: 18px;
        display: inline-block;
        line-height: 1;
        margin: 0;
    }
</style>