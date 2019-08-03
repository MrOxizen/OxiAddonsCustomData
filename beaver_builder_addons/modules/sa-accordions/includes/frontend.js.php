    jQuery(document).ready(function() {
       jQuery(".SA-FL-accordion-heading-<?php echo $id; ?>:eq(0)").addClass("active");
       jQuery(".SA-FL-accordion-heading-<?php echo $id; ?>:eq(0)").next().slideDown();
       jQuery(".SA-FL-accordion-heading-<?php echo $id; ?>").on("click", function() {
         if (jQuery(this).hasClass("active")) {
                 var activeTab = jQuery(this).attr("ref");
                 jQuery(activeTab).slideUp(200);
                 jQuery(this).removeClass("active");
                 
         } else {
                var activeTab = jQuery(this).attr("ref");
                jQuery(activeTab).slideDown(200);
                jQuery(this).addClass("active"); 
         }
       });
});