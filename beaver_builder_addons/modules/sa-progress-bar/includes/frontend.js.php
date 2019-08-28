 

jQuery('.fl-row-content-wrap').on('click',function(){ 
    setTimeout(function(){
        var value = jQuery('[name=layout] option:selected').val(); 
        if(value == 'line'){
            jQuery('.fl-lightbox-content-wrap').removeClass('oxi_gradient_height'); 
        }else{
            jQuery('.fl-lightbox-content-wrap').addClass('oxi_gradient_height');
        }
    },500)
}); 
jQuery('[name=layout]').on('change', function(){
    var value = jQuery(this).val();
    if(value == 'line'){
            jQuery('.fl-lightbox-content-wrap').removeClass('oxi_gradient_height'); 
        }else{
            jQuery('.fl-lightbox-content-wrap').addClass('oxi_gradient_height');
        }
})
<?php
    if($settings->layout == 'line'){
        ?>
        jQuery(".oxi_sa_progress_<?php echo $id ?>").waypoint(function () {
            jQuery(".oxi_sa_progress_<?php echo $id ?>").asProgress({"namespace": "oxi__progress"});
            jQuery(".oxi_sa_progress_<?php echo $id ?>").asProgress("start");
        }, {
            offset: "80%"
        });  
        <?php
    }elseif($settings->layout == 'circle'){ ?>
 
      
        jQuery(".oxi_sa_progress_<?php echo $id ?>").waypoint(function () {
            var progressBarOptions = {
                startAngle: -1.55,
                size: <?php echo  $settings->circle_size ? $settings->circle_size : '150' ?>,
                value: <?php echo $settings->circle_counter_value ? $settings->circle_counter_value : '0.75' ?>,
                thickness: <?php echo $settings->circle_fill_thickness ? $settings->circle_fill_thickness : '8' ?>,
                fill: {
                    <?php
                         if ($settings->background_type == 'color') { ?>
                             'color' : '#<?php echo $settings->fill_background_color ?>', 
                        <?php } elseif ($settings->background_type == 'gradient') { 
                                $color1 =$settings->gradient['colors'][0];
                                $color2 =$settings->gradient['colors'][1]; 
                                if(ctype_xdigit($color1) && strlen($color1)==6){
                                    $color1 = '#'.$color1;
                                }else{
                                    $color1 = $color1;
                                }
                                if(ctype_xdigit($color2) && strlen($color2)==6){
                                    $color2 = '#'.$color2;
                                }else{
                                    $color2 = $color2;
                                }
                            ?> 
                            'gradient' : ['<?php echo $color1 ?>','<?php echo $color2 ?>'], 
                      <?php  }    
                    ?>
                },
                emptyFill: '#<?php echo $settings->background_color ? $settings->background_color : '888' ?>',
                animation: { duration: <?php echo $settings->circle_animation_duration ? $settings->circle_animation_duration : '500'?>, easing: "circleProgressEasing" }
        }
        jQuery('.oxi_sa_progress_<?php echo $id ?>').circleProgress(progressBarOptions).on('circle-animation-progress', function(event, progress, stepValue) {
            var stepVal = String(stepValue.toFixed(2)).substr(1);
            jQuery(this).find('strong').html(Math.round(100 * stepVal) + '<i>%</i>');
        });
    }, {
        offset: "80%"
    });   
        <?php
    }

?>

