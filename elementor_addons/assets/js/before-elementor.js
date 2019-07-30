 
 setTimeout(function () {
    !function (e, n, t) {
        "use strict";
        e.on("panel:init", function () {
            n("#elementor-panel-elements-search-input").on("keyup", _.debounce(function () {
                n("#elementor-panel-elements").find(".oxi-el-admin-icon").parents(".elementor-element").addClass("sa-el-widgets-addons")
            }, 100))
        }), e.hooks.addAction("panel/open_editor/widget", function (e, n) {
            l(n)
        })
    }(elementor, jQuery, window);
}, 1000);