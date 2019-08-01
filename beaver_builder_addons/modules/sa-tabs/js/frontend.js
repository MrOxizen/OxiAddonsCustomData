jQuery(document).ready(function(){  
    var getID = jQuery('.oxi__tab_wraper_main').attr('id'); 
	
	var id = parseInt(jQuery('#'+getID+' .oxi__tab_li').attr('data-inital')); 
	if(typeof id == 'number'){
		var itemLi = jQuery('#'+getID+' .oxi__tab_li').eq(id).addClass('active');  
		var itemContent =  jQuery('#'+getID+' .oxi__tab_content').eq(id).addClass('active'); 
	}  
	jQuery('#'+getID+' .oxi__tab_li').click(function(){
		var tab_id = jQuery(this).attr('data-tab'); 
		jQuery('.oxi__tab_li').removeClass('active');
		jQuery('.oxi__tab_content').removeClass('active'); 
		jQuery(this).addClass('active');
		jQuery("#"+tab_id).addClass('active');
	})

 

});