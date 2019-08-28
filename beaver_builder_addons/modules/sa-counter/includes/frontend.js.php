 jQuery(".oxi__number_<?php echo $id ?>").counterUp({
        delay: <?php echo $settings->counter_delay ? ($settings->counter_delay * 1000) : 10 ?>,
        time: <?php echo $settings->counter_duration ? ($settings->counter_duration * 1000) : 3000 ?>
    });
 
