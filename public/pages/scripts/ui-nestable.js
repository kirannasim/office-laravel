"use strict";
var UINestable = function () {

    var updateOutput = function (e) {
        var list = e.length ? e : $(e.target),
            output = list.data('output');

        if (output == undefined) return;

        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };

    var dropCallback = function(plugin, details){

        if (!plugin) return;

        var sourceEl = plugin.sourceEl;

        sourceEl.attr('data-parent_id', sourceEl.parents('li.dd-item').length ? sourceEl.closest('ol').parent('li.dd-item').attr('data-id') : 0 ).promise().done(function(){
            updateOutput($('#leftMenuList').data('output', $('.leftMenuData')));
        });
    };

    return {
        //main function to initiate the module
        init: function () {
            // activate Nestable for list 1
            $('#leftMenuList').nestable({
                group: 0,
                dropCallback: dropCallback
            }).on('change', updateOutput);

            // activate Nestable for list 2
            $('#nestable_list_2').nestable({
                group: 1
            }).on('change', updateOutput);

            // output initial serialised data
            updateOutput($('#leftMenuList').data('output', $('.leftMenuData')));
            updateOutput($('#topMenuList').data('output', $('.topMenuData')));

            $('#nestable_list_menu').on('click', function (e) {
                var target = $(e.target),
                    action = target.data('action');
                if (action === 'expand-all') {
                    $('.dd').nestable('expandAll');
                }
                if (action === 'collapse-all') {
                    $('.dd').nestable('collapseAll');
                }
            });
            //$('#nestable_list_3').nestable();
        },
        updateOutput: updateOutput
    };
}();

jQuery(document).ready(function() {
   UINestable.init();
});