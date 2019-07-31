jQuery(document).ready(function(){
    jQuery(".SA-FL-accordion-header").addClass("active");
    jQuery(".SA-FL-accordion-header").next().slideDown();
    jQuery(".SA-FL-accordion-header").click(function(){
        if(jQuery(this).hasClass("active")){
                var activeTab = jQuery(this).attr("ref");
                jQuery(activeTab).slideUp();
                jQuery(this).removeClass("active");
            }else{
                var activeTab = jQuery(this).attr("ref");
                jQuery(activeTab).slideDown();
                jQuery(this).addClass("active");
            }
    });
    
});

