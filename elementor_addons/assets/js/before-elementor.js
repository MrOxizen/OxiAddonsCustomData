 
 setTimeout(function () {
    !function (e, n, t) {
        "use strict";
        e.on("panel:init", function () {
            n("#elementor-panel-elements-search-input").on("keyup", _.debounce(function () {
                n("#elementor-panel-elements").find(".oxi-el-admin-icon").parents(".elementor-element").addClass("sa-el-widgets-addons")
            }, 100))
        })
    }(elementor, jQuery, window);
}, 1000);