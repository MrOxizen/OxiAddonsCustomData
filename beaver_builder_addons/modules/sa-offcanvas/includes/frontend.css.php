<?php
SA_FLBUILDER_HELPER::sa_fl_border_package($settings, 'front_border', '.fl-node-' . $id . ' .oxi__button');
SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'button_font_typo', '.fl-node-' . $id . ' .oxi__button');

/**
 * general background color and gradient
 */
if ($settings->button->button_background_type === 'color') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'background-color' => $settings->button->button_background_color.' !important',
            ), '.fl-node-' . $id . ' .oxi__button');
} else {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'background' => FLBuilderColor::gradient($settings->button->button_gradient),
            ), '.fl-node-' . $id . ' .oxi__button');
}

SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'color' => $settings->button->text_color,
        ), '.fl-node-' . $id . ' .oxi__button');
// button position styleing
SA_FLBUILDER_HELPER::sa_fl_responsive_setting('text-align', $settings, 'alignment', '.fl-node-' . $id . ' .oxi__button_wrapper_main');



/**
 * coding for custom width, auto and full width
 */
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('button', $settings, 'padding', '.fl-node-' . $id . ' .oxi__button', 'px');
if ($settings->button->button_width === 'auto') {
    ?>
    .fl-node-<?php echo $id; ?> .oxi__button{
    display: inline-block;
    }
    <?php
} elseif ($settings->button->button_width === 'full') {
    ?>
    .fl-node-<?php echo $id; ?> .oxi__button{
    display: flex;
    justify-content: center;
    width: 100%;
    }
    <?php
} else {
    ?>
    .fl-node-<?php echo $id; ?> .oxi__button_wrapper{
    height: <?php echo $settings->button->custom_height; ?>px;
    justify-content: center;
    }
    <?php
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'width' => $settings->button->custom_width . 'px',
        'height' => $settings->button->custom_height . 'px',
        'display' => 'inline-block',
        'padding' => '0'
            ), '.fl-node-' . $id . ' .oxi__button');
}

if (!empty($settings)) {
    ?>
    .fl-node-<?php echo $id; ?> .oxi__button{
    transition: all 0.5s ease;
    overflow: hidden;
    }

    .fl-node-<?php echo $id; ?> .oxi__button:hover{
    <?php
    $data = json_decode(json_encode($settings->button), true);
    if ($data['hover_box_shadow'] != '') {

        SA_FLBUILDER_HELPER::sa_fl_custom_box_shadow($data['hover_box_shadow']);
    }

    if ($settings->button->hover_border_color != '') {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'border-color' => $settings->button->hover_border_color,
                ), '.fl-node-' . $id . ' .oxi__button:hover');
    }
    ?>
    }
    <?php
    if ($settings->button->icon_position == 'left') {
        ?>
        .fl-node-<?php echo $id; ?> .oxi__icon-selector{
        padding-right: <?php echo $settings->button->icon_spacing ?>px
        }
        <?php
    } else {
        ?>
        .fl-node-<?php echo $id; ?> .oxi__icon-selector{
        padding-left: <?php echo $settings->button->icon_spacing ?>px
        }
        <?php
    }
    /**
     * start coding for styling button
     */
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'color' => $settings->button->hover_text_color,
            ), '.fl-node-' . $id . ' .oxi__button:hover');
    if ($settings->button->button_hover_background_type === 'color') {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'background-color' => $settings->button->button_hover_background_color.' !important',
                ), '.fl-node-' . $id . ' .oxi__button:hover');
    } else {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'background' => FLBuilderColor::gradient($settings->button->button_hover_gradient),
                ), '.fl-node-' . $id . ' .oxi__button:hover');
    }

    if ($settings->button->styling === 'shutter') {
        if ($settings->button->shutter_effects === 'shutter_in_hori') {
            $scale = 'scaleX(1)';
            $hover_scale = 'scaleX(0)';
        }
        if ($settings->button->shutter_effects === 'shutter_in_var') {
            $scale = 'scaleY(1)';
            $hover_scale = 'scaleY(0) ';
        }
        if ($settings->button->shutter_effects === 'shutter_out_hori') {
            $scale = 'scaleX(.3)  rotateY(90deg)';
            $hover_scale = 'scaleX(1) ';
        }
        if ($settings->button->shutter_effects === 'shutter_out_var') {
            $scale = 'scaleY(.3)  rotateX(90deg)';
            $hover_scale = 'scaleY(1)';
        }
        if ($settings->button->button_hover_background_type === 'color') {
            SA_FLBUILDER_HELPER::sa_fl_general_style(array(
                'content' => '""',
                'position' => 'absolute',
                'top' => '0',
                '-webkit-transform' => $scale,
                'transform' => $scale,
                'left' => '0',
                'display' => 'block',
                'width' => '100%',
                'height' => '100%',
                'opacity' => '0',
                'background-color' => $settings->button->button_hover_background_color.' !important',
                'transition' => 'all .3s',
                '-webkit-transform-origin' => '50%',
                'transform-origin' => '50%',
                    ), '.fl-node-' . $id . ' .oxi__button:after');
            SA_FLBUILDER_HELPER::sa_fl_general_style(array(
                '-webkit-transform' => $hover_scale,
                'transform' => $hover_scale,
                'opacity' => '1',
                'background-color' => $settings->button->button_hover_background_color.' !important',
                    ), '.fl-node-' . $id . ' .oxi__button:hover:after');
        }
    } else if ($settings->button->styling === 'rayen') {
        $width = $hover_height = $height = $top = $bottom = $right = $bottom = $left = $hover_width = '';
        if ($settings->button->rayen_effects === 'left_to_right') {
            $width = '0';
            $height = '100%';
            $top = '0';
            $left = '0';
            $hover_width = '100%';
        } else if ($settings->button->rayen_effects === 'right_to_left') {
            $width = '0';
            $height = '100%';
            $top = '0';
            $right = '0';
            $hover_width = '100%';
        } else if ($settings->button->rayen_effects === 'top_to_bottom') {
            $width = '100%';
            $height = '0%';
            $top = '0';
            $left = '0';
            $hover_height = '100%';
        } else if ($settings->button->rayen_effects === 'bottom_to_top') {
            $width = '100%';
            $height = '0';
            $bottom = '0';
            $left = '0';
            $hover_height = '100%';
        }
        if ($settings->button->button_hover_background_type === 'color') {
            SA_FLBUILDER_HELPER::sa_fl_general_style(array(
                'content' => '""',
                'position' => 'absolute',
                'top' => $top,
                'left' => $left,
                'right' => $right,
                'bottom' => $bottom,
                'background-color' => $settings->button->button_hover_background_color.' !important',
                'width' => $width,
                'height' => $height,
                'transition' => 'all 0.3s ease'
                    ), '.fl-node-' . $id . ' .oxi__button::after');
            SA_FLBUILDER_HELPER::sa_fl_general_style(array(
                'width' => $hover_width,
                'height' => $hover_height,
                    ), '.fl-node-' . $id . ' .oxi__button:hover:after');
        }
    } else if ($settings->button->styling === 'winona') {
        $top = $right = $bottom = $left = $width = $height = $transform = $hover_transform = $text_transform = '';
        if ($settings->button->winona_effects === 'left_to_right') {
            $width = '100%';
            $height = '100%';
            $right = '0';
            $top = '0';
            $transform = 'translateX(-100%)';
            $hover_transform = 'translateX(0)';
            $text_transform = 'translateX(150%)';
        } else if ($settings->button->winona_effects === 'right_to_left') {
            $width = '100%';
            $height = '100%';
            $right = '0';
            $top = '0';
            $transform = 'translateX(100%)';
            $hover_transform = 'translateX(0)';
            $text_transform = 'translateX(-150%)';
        } else if ($settings->button->winona_effects === 'top_to_bottom') {
            $width = '100%';
            $height = '100%';
            $left = '0';
            $bottom = '0';
            $transform = 'translateY(-100%)';
            $hover_transform = 'translateY(0)';
            $text_transform = 'translateY(150%)';
        } else if ($settings->button->winona_effects === 'bottom_to_top') {
            $width = '100%';
            $height = '100%';
            $left = '0';
            $top = '0';
            $transform = 'translateY(100%)';
            $hover_transform = 'translateY(0)';
            $text_transform = 'translateY(-150%)';
        }
        if ($settings->button->button_hover_background_type === 'color') {
            SA_FLBUILDER_HELPER::sa_fl_general_style(array(
                'content' => 'attr(data-attr)',
                'position' => 'absolute',
                'top' => $top,
                'left' => $left,
                'right' => $right,
                'bottom' => $bottom,
                'width' => $width,
                'height' => $height,
                'opacity' => '0',
                'transition' => 'all 0.3s ease',
                'transform' => $transform,
                'background-color' => $settings->button->button_hover_background_color.' !important',
                    ), '.fl-node-' . $id . ' .oxi__button::after');
            SA_FLBUILDER_HELPER::sa_fl_general_style(array(
                'opacity' => '1',
                'transform' => $hover_transform,
                    ), '.fl-node-' . $id . ' .oxi__button:hover:after');
            SA_FLBUILDER_HELPER::sa_fl_general_style(array(
                'opacity' => '0',
                'transform' => $text_transform,
                    ), '.fl-node-' . $id . ' .oxi__button:hover .oxi__button_wrapper');
        }
    } else if ($settings->button->styling === 'tamaya') {
        ?>
        .fl-node-<?php echo $id; ?> .oxi__button::before,
        .fl-node-<?php echo $id; ?> .oxi__button::after {
        display: block;
        content: attr(data-attr);
        position: absolute;
        width: 100%;
        height: 50%;
        left: 0;
        overflow: hidden;
        -webkit-transition: -webkit-transform 0.3s;
        transition: -webkit-transform 0.3s;
        -o-transition: transform 0.3s;
        transition: transform 0.3s;
        transition: transform 0.3s, -webkit-transform 0.3s;
        -webkit-transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
        -o-transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
        transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
        z-index: 2;
        }
        .oxi__button>.oxi__button_wrapper {
        display: block;
        -webkit-transform: scale3d(0.2, 0.2, 1);
        transform: scale3d(0.2, 0.2, 1);
        opacity: 0;
        -webkit-transition: -webkit-transform 0.3s, opacity 0.3s;
        -webkit-transition: opacity 0.3s, -webkit-transform 0.3s;
        transition: opacity 0.3s, -webkit-transform 0.3s;
        -o-transition: transform 0.3s, opacity 0.3s;
        transition: transform 0.3s, opacity 0.3s;
        transition: transform 0.3s, opacity 0.3s, -webkit-transform 0.3s;
        -webkit-transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
        -o-transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
        transition-timing-function: cubic-bezier(0.2, 1, 0.3, 1);
        }
        .fl-node-<?php echo $id; ?> .oxi__button::before {
        <?php
        if ($settings->button->button_width === 'custom') {
            ?>
            bottom: 14px;
            <?php
        } else {
            ?>
            top: 0;
            padding-top: <?php echo $settings->button->button_padding_top ? $settings->button->button_padding_top : '15px' ?>;
            padding-bottom: <?php echo $settings->button->button_padding_bottom ? $settings->button->button_padding_bottom : '15px' ?>;
            <?php
        }
        ?>
        }

        .fl-node-<?php echo $id; ?> .oxi__button::after {
        bottom:0;
        line-height: 0;
        }

        .fl-node-<?php echo $id; ?> .oxi__button:hover::after {
        bottom: -1px;
        }
        .fl-node-<?php echo $id; ?> .oxi__button:hover::before {
        bottom: 25px;
        }

        .fl-node-<?php echo $id; ?> .oxi__button:hover::before {
        -webkit-transform: translate3d(0, -100%, 0);
        transform: translate3d(0, -100%, 0);
        }

        .fl-node-<?php echo $id; ?> .oxi__button:hover::after {
        -webkit-transform: translate3d(0, 100%, 0);
        transform: translate3d(0, 100%, 0);
        }

        .fl-node-<?php echo $id; ?> .oxi__button:hover .oxi__button_wrapper {
        opacity: 1;
        -webkit-transform: scale3d(1, 1, 1);
        transform: scale3d(1, 1, 1);
        }
        <?php
    }
}
?>



<?php
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'background-color' => $settings->offcanvas_bar_bg,
        ), '.fl-node-' . $id . ' .oxi_addons_bar_style');
if ($settings->offcanvas_bar_border_style != 'none') {
    SA_FLBUILDER_HELPER::sa_fl_dimension_utility('offcanvas_bar', $settings, 'border', '.fl-node-' . $id . ' .oxi_addons_bar_style', 'px');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'border-color' => $settings->offcanvas_bar_border_color,
        'border-style' => $settings->offcanvas_bar_border_style,
            ), '.fl-node-' . $id . ' .oxi_addons_bar_style');
}
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('offcanvas_bar', $settings, 'padding', '.fl-node-' . $id . ' .oxi_addons_bar_style', 'px');
SA_FLBUILDER_HELPER::sa_fl_custom_border_radius('offcanvas_bar', $settings, '.fl-node-' . $id . ' .oxi_addons_bar_style', 'true');




SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'background-color' => $settings->offcanvas_content_bg,
        ), '.fl-node-' . $id . ' .oxi_offcanvas_bar_content');
if ($settings->offcanvas_content_border_style != 'none') {
    SA_FLBUILDER_HELPER::sa_fl_dimension_utility('offcanvas_content', $settings, 'border', '.fl-node-' . $id . ' .oxi_offcanvas_bar_content', 'px');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'border-color' => $settings->offcanvas_content_border_color,
        'border-style' => $settings->offcanvas_content_border_style,
            ), '.fl-node-' . $id . ' .oxi_offcanvas_bar_content');
}
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('offcanvas_content', $settings, 'padding', '.fl-node-' . $id . ' .oxi_offcanvas_bar_content', 'px');
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('offcanvas_content', $settings, 'margin', '.fl-node-' . $id . ' .oxi_offcanvas_bar_content', 'px');
SA_FLBUILDER_HELPER::sa_fl_custom_border_radius('offcanvas_content', $settings, '.fl-node-' . $id . ' .oxi_offcanvas_bar_content', 'true');




if ($settings->close_button == 'enable') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'color' => $settings->offcanvas_close_icon_color,
        'font-size' => $settings->offcanvas_close_icon_size . 'px',
            ), '.fl-node-' . $id . ' .sa-offcanvas-close-'.$id.'');
    SA_FLBUILDER_HELPER::sa_fl_dimension_utility('offcanvas_close_icon', $settings, 'margin', '.fl-node-' . $id . '  .sa-offcanvas-close-'.$id.'', '%');
}





SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'font_typo', '.fl-node-' . $id . ' .oxi_offcanvas_bar_title');
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'color' => $settings->title_color,
), '.fl-node-' . $id . ' .oxi_offcanvas_bar_title');
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('offcanvas_heading', $settings, 'padding', '.fl-node-' . $id . ' .oxi_offcanvas_bar_title', 'px');

SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'desc_font_typo', '.fl-node-' . $id . ' .oxi_foocanvas_bar_description');
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'color' => $settings->desc_color,
), '.fl-node-' . $id . ' .oxi_foocanvas_bar_description');
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('desc', $settings, 'padding', '.fl-node-' . $id . ' .oxi_foocanvas_bar_description', 'px');

if($settings->direction_style == 'top' || $settings->direction_style == 'bottom'){
?>
   .fl-node-<?php echo $id; ?> .oxi_offcanvas_content_area{
       display:flex; 
    } 
<?php
}



?>

    
    
    
.fl-node-<?php echo $id; ?> .oxi-offcanvas-left-content-<?php echo $id; ?>{
        top: 0;
        left:0;
        width: <?php echo $settings->offcanvas_bar_width; ?>px;
        height: 100%;
        margin-left:-<?php echo $settings->offcanvas_bar_width; ?>px;
    }
    .fl-node-<?php echo $id; ?> .oxi-offcanvas-left-content-<?php echo $id; ?>.oxi-active{
        top: 0;
        left: 0;
        width: <?php echo $settings->offcanvas_bar_width; ?>px;
        height: 100%;
        margin-left: 0;
    }
    .fl-node-<?php echo $id; ?> .oxi-offcanvas-right-content-<?php echo $id; ?>{
        top: 0;
        right:0;
        width: <?php echo $settings->offcanvas_bar_width; ?>px;
        height: 100%;
        margin-right:-<?php echo $settings->offcanvas_bar_width; ?>px;
    }
    .fl-node-<?php echo $id; ?> .oxi-offcanvas-right-content-<?php echo $id; ?>.oxi-active{
        top: 0;
        right: 0;
        width: <?php echo $settings->offcanvas_bar_width; ?>px;
        height: 100%;
        margin-right: 0;
    }
    .fl-node-<?php echo $id; ?> .oxi-offcanvas-top-content-<?php echo $id; ?>{
        top: 0;
        right:0;
        width: 100%;
        height: <?php echo $settings->offcanvas_bar_height; ?>px;
        margin-top:-<?php echo $settings->offcanvas_bar_height; ?>px;
    }
    .fl-node-<?php echo $id; ?> .oxi-offcanvas-top-content-<?php echo $id; ?>.oxi-active{
        top: 0;
        right: 0;
        left:0;
        width: 100%;
        height: <?php echo $settings->offcanvas_bar_height; ?>px;
        margin-top: 0;
    }
    .fl-node-<?php echo $id; ?> .oxi-offcanvas-bottom-content-<?php echo $id; ?>{
        bottom: 0;
        right:0;
        width: 100%;
        height: <?php echo $settings->offcanvas_bar_height; ?>px;
        margin-bottom:-<?php echo $settings->offcanvas_bar_height; ?>px;
    }
    .fl-node-<?php echo $id; ?> .oxi-offcanvas-bottom-content-<?php echo $id; ?>.oxi-active{
        bottom: 0;
        right: 0;
        left:0;
        width: 100%;
        height: <?php echo $settings->offcanvas_bar_height; ?>px;
        margin-bottom: 0;
    }

    .fl-node-<?php echo $id; ?> .oxi-offcanvas-left-content-<?php echo $id; ?>,
    .fl-node-<?php echo $id; ?> .oxi-offcanvas-right-content-<?php echo $id; ?>,
    .fl-node-<?php echo $id; ?> .oxi-offcanvas-top-content-<?php echo $id; ?>, 
    .fl-node-<?php echo $id; ?> .oxi-offcanvas-bottom-content-<?php echo $id; ?>{
        position: fixed;
        z-index: 99999999;
        overflow-y: auto;
        transition: all 0.5s;
    }
    .fl-node-<?php echo $id; ?> .oxi-offcanvas-left-content-<?php echo $id; ?>.oxi-active,
    .fl-node-<?php echo $id; ?> .oxi-offcanvas-right-content-<?php echo $id; ?>.oxi-active,
    .fl-node-<?php echo $id; ?> .oxi-offcanvas-top-content-<?php echo $id; ?>.oxi-active, 
    .fl-node-<?php echo $id; ?> .oxi-offcanvas-bottom-content-<?php echo $id; ?>.oxi-active{
        position: fixed;
        z-index: 99999999;
        overflow-y: auto;
        transition: all 0.5s;
    }
    .fl-node-<?php echo $id; ?> .oxi-addons-OC-conetent-overlay-<?php echo $id; ?>{
        display: none;
    }
    .fl-node-<?php echo $id; ?> .oxi-addons-OC-conetent-overlay-<?php echo $id; ?>.oxi-active{
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        z-index: 99999999;
        overflow-y: auto;
        display: block;
        cursor: pointer;
    }
    .fl-node-<?php echo $id; ?> .sa-offcanvas-close-<?php echo $id; ?>{
        cursor: pointer;
    }
    
    <?php
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'background-color' => $settings->offcanvas_overlay_color,
    'opacity' => $settings->offcanvas_overlay_opacity,
        ), '.fl-node-'.$id.' .oxi-addons-OC-conetent-overlay-'.$id.'.oxi-active');
    
    
    ?>

    
    
    
    @media only screen and (min-width : 669px) and (max-width : 993px){
    .fl-node-<?php echo $id; ?> .oxi-offcanvas-left-content-<?php echo $id; ?>{
        width: <?php echo $settings->offcanvas_bar_width_medium; ?>px;
        margin-left:-<?php echo $settings->offcanvas_bar_width_medium; ?>px;
    }
    .fl-node-<?php echo $id; ?> .oxi-offcanvas-left-content-<?php echo $id; ?>.oxi-active{
        width: <?php echo $settings->offcanvas_bar_width_medium; ?>px;
    }
    .fl-node-<?php echo $id; ?> .oxi-offcanvas-right-content-<?php echo $id; ?>{
        width: <?php echo $settings->offcanvas_bar_width_medium; ?>px;
        margin-right:-<?php echo $settings->offcanvas_bar_width_medium; ?>px;
    }
    .fl-node-<?php echo $id; ?> .oxi-offcanvas-right-content-<?php echo $id; ?>.oxi-active{
        width: <?php echo $settings->offcanvas_bar_width_medium; ?>px;
    }
    .fl-node-<?php echo $id; ?> .oxi-offcanvas-top-content-<?php echo $id; ?>{
        height: <?php echo $settings->offcanvas_bar_height_medium; ?>px;
        margin-top:-<?php echo $settings->offcanvas_bar_height_medium; ?>px;
    }
    .fl-node-<?php echo $id; ?> .oxi-offcanvas-top-content-<?php echo $id; ?>.oxi-active{
        height: <?php echo $settings->offcanvas_bar_height_medium; ?>px;

    }
    .fl-node-<?php echo $id; ?> .oxi-offcanvas-bottom-content-<?php echo $id; ?>{
        height: <?php echo $settings->offcanvas_bar_height_medium; ?>px;
        margin-bottom:-<?php echo $settings->offcanvas_bar_height_medium; ?>px;
    }
    .fl-node-<?php echo $id; ?> .oxi-offcanvas-bottom-content-<?php echo $id; ?>.oxi-active{
        height: <?php echo $settings->offcanvas_bar_height_medium; ?>px;
        }
    }
    @media only screen and (max-width : 668px){
    responsive
    .fl-node-<?php echo $id; ?> .oxi-offcanvas-left-content-<?php echo $id; ?>{
        width: <?php echo $settings->offcanvas_bar_width_responsive; ?>px;
        margin-left:-<?php echo $settings->offcanvas_bar_width_responsive; ?>px;
    }
    .fl-node-<?php echo $id; ?> .oxi-offcanvas-left-content-<?php echo $id; ?>.oxi-active{
        width: <?php echo $settings->offcanvas_bar_width_responsive; ?>px;
    }
    .fl-node-<?php echo $id; ?> .oxi-offcanvas-right-content-<?php echo $id; ?>{
        width: <?php echo $settings->offcanvas_bar_width_responsive; ?>px;
        margin-right:-<?php echo $settings->offcanvas_bar_width_responsive; ?>px;
    }
    .fl-node-<?php echo $id; ?> .oxi-offcanvas-right-content-<?php echo $id; ?>.oxi-active{
        width: <?php echo $settings->offcanvas_bar_width_responsive; ?>px;
    }
    .fl-node-<?php echo $id; ?> .oxi-offcanvas-top-content-<?php echo $id; ?>{
        height: <?php echo $settings->offcanvas_bar_height_responsive; ?>px;
        margin-top:-<?php echo $settings->offcanvas_bar_height_responsive; ?>px;
    }
    .fl-node-<?php echo $id; ?> .oxi-offcanvas-top-content-<?php echo $id; ?>.oxi-active{
        height: <?php echo $settings->offcanvas_bar_height_responsive; ?>px;

    }
    .fl-node-<?php echo $id; ?> .oxi-offcanvas-bottom-content-<?php echo $id; ?>{
        height: <?php echo $settings->offcanvas_bar_height_responsive; ?>px;
        margin-bottom:-<?php echo $settings->offcanvas_bar_height_responsive; ?>px;
    }
    .fl-node-<?php echo $id; ?> .oxi-offcanvas-bottom-content-<?php echo $id; ?>.oxi-active{
        height: <?php echo $settings->offcanvas_bar_height_responsive; ?>px;
        }
    
    }



