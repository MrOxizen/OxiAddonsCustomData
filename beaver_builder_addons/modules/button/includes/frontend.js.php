<?php

/**
 *  sa js
 * 
 */

?>
(function($) {

jQuery(document).ready( function() {


$('.fl-col-content').on('click',function(){
setTimeout(function(){
var val = $('[name="styling"]').val();
if(val == 'icon'){
$('#fl-field-button_padding').hide();
}
},500)
})


});
})(jQuery);