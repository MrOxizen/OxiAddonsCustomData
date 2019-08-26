<?php
/**
 * @package shortcode addons
 */
// echo '<pre>';
// print_r($settings);
// echo '</pre>';
 
$title = $display_count = '';

if ($settings->title != '') {
    $title = '<' . $settings->tag . ' class="oxi__sa_progress_title">' . $settings->title . '</' . $settings->tag . '>';
}
if ($settings->dis_count == 'on') {
    $display_count = '<div class="oxi__sa_progress_percentage oxi__progress__label"></div>';
}
?>

<div class="oxi_sa_main_wrapper">
    <?php if($settings->layout == 'line'){ ?>
    <div class="oxi__sa_progress_bar_main oxi_sa_progress_<?php echo $id ?>"  role="oxi__progress" data-goal="<?php echo $settings->counter_value ? $settings->counter_value : '70' ?>" data-speed="<?php echo $settings->animation_duration ? $settings->animation_duration : '60' ?>"> 
        <div class="oxi__sa_heading">
            <?php echo $title ?>
            <?php echo $display_count ?>
        </div>
        <div class="oxi__sa_progress_bar" style="background: #<?php echo $settings->background_color ?>">
            <div class="oxi__sa_progress_line oxi__progress__bar"></div>
        </div>
    </div> 
    <?php } elseif($settings->layout == 'circle') {
            if ($settings->dis_count == 'on') {
                $display_count = '<strong class="oxi__sa_progress_percentage"></strong>';
            }
        ?>
        <div class="oxi_sa_progress_main oxi_sa_progress_<?php echo $id ?>"> 
            <div class="oxi__sa_heading_count"> 
                <?php echo $display_count ?>
                <?php echo $title ?>
            </div>
        </div>
    <?php } ?>
</div>
 