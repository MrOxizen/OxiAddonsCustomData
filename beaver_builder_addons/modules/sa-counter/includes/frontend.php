<?php
/**
 * @package shortcode addons
 */
// echo '<pre>';
// print_r($settings);
// echo '</pre>';
 
$title = $number = $icon_image = $divider = $sign = '';
 
if($settings->counter_title != ''){
    $title = '<'.$settings->tag.' class="oxi__sa_counter_title">'. $settings->counter_title .'</'.$settings->tag.'>';
}
if($settings->counter_style == 'design_one' ){
    $sign = $settings->sign;
}
if($settings->counter_number != ''){
    $number = '<div class="oxi__sa_counter_number"><span class="oxi__number_' . $id . '">'. $settings->counter_number .'</span> '. $sign  .'</div>';
}
if($settings->divider_show != ''){
    $divider = '<div class="oxi__sa_divider"></div>';
}
if ($settings->image_icon_type == 'icon') {
    $icon_image = '
        <div class="oxi__counter_icon_image_main">
            <div class="oxi__counter_icon_image">
                <i class="oxi__counter_icon ' . $settings->icon_main . '"></i>
            </div>
        </div>
    ';
} elseif ($settings->image_icon_type == 'photo') {
    $image = '';
    if ($settings->photo_source == 'library') {
        if ($settings->photo_main_src != '') {
            $image = '<img class="oxi__addons_image" src="' . $settings->photo_main_src . '" alt="' . $settings->info_title . '-image"/>';
        }
    } else if ($settings->photo_source == 'url') {
        if ($settings->photo_url != '') {
            $image = '<img class="oxi__counter_addons_image" src="' . $settings->photo_url . '" alt="' . $settings->info_title . '-image"/>';
        }
    }
    $icon_image = '
        <div class="oxi__counter_icon_image_main">
            <div class="oxi__counter_icon_image">
             ' . $image . '
            </div>
        </div>
    ';
}
$counter = '';
if($settings->counter_style == 'design_one'){
    if($settings->divider_position == 'icon_divider'){
        $counter = '
            '.$icon_image.'
            '.$divider.'
            '.$number.'
            '.$title.'
        ';
    }elseif($settings->divider_position == 'counter_divider'){
        $counter = '
        '.$icon_image.' 
        '.$number.'
        '.$divider.'
        '.$title.'
    ';
    }
}elseif($settings->counter_style == 'design_two'){
    if($settings->divider_position_two == 'title_divider'){
        $counter = '
            '.$icon_image.'
           <div class="oxi__sa_design_wrapper">
                '.$title.'
                '.$divider.'
                '.$number.' 
           </div>
        ';
    }elseif($settings->divider_position_two == 'counter_divider'){
        $counter = '
        '.$icon_image.' 
        <div class="oxi__sa_design_wrapper">
            '.$title.'
            '.$number.' 
            '.$divider.'
        </div>
    ';
    }
}
?>
<div class="oxi__sa_main_wrapper" id="oxi__wayponits_<?php echo $id ?>">
    <div class="oxi__sa_counter_main">
        <?php echo $counter ?>
    </div>
</div>