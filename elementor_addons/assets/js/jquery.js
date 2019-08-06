/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
(function ($) {
    window.isEditMode = false;

    $(window).on("elementor/frontend/init", function () {
        window.isEditMode = elementorFrontend.isEditMode();
    });

})(jQuery);

function OxiAddonsELEqualHeightWidth(data) {
    var cw = jQuery(data).outerWidth();
    var ch = jQuery(data).outerHeight();
    if (cw > ch) {
        jQuery(data).css({"height": cw + "px"});
        jQuery(data).css({"width": cw + "px"});
    } else {
        jQuery(data).css({"height": ch + "px"});
        jQuery(data).css({"width": ch + "px"});
    }
}

setTimeout(function () {
    OxiAddonsEqualHeightWidth(jQuery(".OxiAddonsELEqualHeightWidth"));
}, 1500);