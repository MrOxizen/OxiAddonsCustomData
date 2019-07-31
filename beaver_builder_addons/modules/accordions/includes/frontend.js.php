    jQuery(document).ready(function() {
       jQuery(".SA-FL-accordion-heading:eq(1)").addClass("active");
       jQuery(".SA-FL-accordion-heading:eq(1)").next().slideDown();
       jQuery(".SA-FL-accordion-heading").on("click", function() {
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