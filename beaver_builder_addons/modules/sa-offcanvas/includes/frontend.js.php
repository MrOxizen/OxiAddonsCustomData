 
      jQuery(function () {

        jQuery(document).on("beforecreate.offcanvas", function (e) {
            var dataOffcanvas = jQuery(e.target).data('offcanvas-component'); 
            dataOffcanvas.onInit = function () { 
            };
        });  
        jQuery(document).on("clicked.offcanvas-trigger clicked.offcanvas", function (e) {
            var dataBtnText = jQuery(e.target).text(); 
        });

        jQuery(document).on("open.offcanvas", function (e) {
            var dataOffcanvasID = jQuery(e.target).attr('id'); 
        });

        jQuery(document).on("resizing.offcanvas", function (e) {
            var dataOffcanvasID = jQuery(e.target).attr('id'); 
        });

        jQuery(document).on("close.offcanvas", function (e) {
            var dataOffcanvasID = jQuery(e.target).attr('id'); 
        });

        jQuery(document).on("destroy.offcanvas", function (e) {
            var dataOffcanvasID = jQuery(e.target).attr('id'); 
        });

        jQuery('#bottom').on("create.offcanvas", function (e) {
            var api = jQuery(this).data('offcanvas-component'); 
            jQuery('.sa-destroy').on('click', function () {
                api.destroy(); 
            });
        });

        jQuery('#left').offcanvas({

            modifiers: "left,overlay",
            triggerButton: '.sa-offcanvas-trigger-left'
        });

        jQuery('.sa-enhance').on('click', function () { 
            jQuery(document).trigger("enhance");
        });

    jQuery(document).trigger("enhance");
    });  
  setTimeout(function(){
    jQuery('.oxi_offcanvas_content_area').css({display: 'block'})
    jQuery('.sa-offcanvas-close').css({display: 'block'})
  },500)