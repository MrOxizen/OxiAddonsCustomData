    jQuery(document).ready(function() {
       <?php
        foreach ($settings->add_accordion as $key => $value) {
             if($value->accordion_active_deactive == 'active'){
        ?>
        jQuery(".SA-FL-accordion-heading-<?php echo $id; ?>:eq(<?php echo $key; ?>)").addClass("active");
        jQuery(".SA-FL-accordion-heading-<?php echo $id; ?>:eq(<?php echo $key; ?>)").next().slideDown();
        <?php
             }
        }
       ?>

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