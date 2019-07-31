jQuery(document).ready(function(){  
    var getID = jQuery('.oxi__tab_wraper_main').attr('id'); 
    var itemLi = jQuery('#'+getID+' .oxi__tab_li');
    itemLi[0].classList.add('active'); 
    var itemContent =  jQuery('#'+getID+' .oxi__tab_content');
    itemContent[0].classList.add('active'); 
    
	jQuery('#'+getID+' .oxi__tab_li').click(function(){
		var tab_id = jQuery(this).attr('data-tab'); 
		jQuery('.oxi__tab_li').removeClass('active');
		jQuery('.oxi__tab_content').removeClass('active'); 
		jQuery(this).addClass('active');
		jQuery("#"+tab_id).addClass('active');
	})

});