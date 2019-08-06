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

setTimeout(function () {
    jQuery(".OxiAddonsELEqualHeightWidth").each(function () {
        var cw = jQuery(this).outerWidth();
        var ch = jQuery(this).outerHeight();
        if (cw > ch) {
            jQuery(this).css({"height": cw + "px"});
            jQuery(this).css({"width": cw + "px"});
        } else {
            jQuery(this).css({"height": ch + "px"});
            jQuery(this).css({"width": ch + "px"});
        }
    });
}, 1500);