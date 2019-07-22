/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
(function($) {
    window.isEditMode = false;

    $(window).on("elementor/frontend/init", function() {
        window.isEditMode = elementorFrontend.isEditMode();
    });
})(jQuery);