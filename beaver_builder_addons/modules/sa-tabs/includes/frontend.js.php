jQuery(document).ready(function(){
var id = parseInt(jQuery('.oxi-<?php echo $id; ?>').attr('data-inital'));
if(typeof id == 'number'){
var itemLi = jQuery('.oxi-<?php echo $id; ?>').eq(id).addClass('active');
var itemContent = jQuery('.oxi-content-<?php echo $id; ?>').eq(id).addClass('active');
}
jQuery('.oxi-<?php echo $id; ?>').click(function(){
var tab_id = jQuery(this).attr('data-tab');
jQuery('.oxi-<?php echo $id; ?>').removeClass('active');
jQuery('.oxi-content-<?php echo $id; ?>').removeClass('active');
jQuery(this).addClass('active');
jQuery("#"+tab_id).addClass('active');
})

});