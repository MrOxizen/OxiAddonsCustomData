<?php
SA_FLBUILDER_HELPER::sa_fl_border_package($settings->button, 'front_button_border', '.fl-node-' . $id . ' .oxi__button');
SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings->button, 'button_font_typo', '.fl-node-' . $id . ' .oxi__button');

/**
 * general background color and gradient
 */
if ($settings->button->button_background_type === 'color') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'background-color' => $settings->button->button_background_color,
            ), '.fl-node-' . $id . ' .oxi__button');
} else {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'background' => FLBuilderColor::gradient($settings->button->button_gradient),
            ), '.fl-node-' . $id . ' .oxi__button');
}

SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'color' => $settings->button->text_color,
        ), '.fl-node-' . $id . ' .oxi__button');


/**
 * button alignment responsive role;
 */
if ($settings->button->button_width !== 'full') {
    ?>
    .fl-node-<?php echo $id; ?> .oxi__button_wrapper{
    display:flex;
    }
    <?php
    if ($settings->button->alignment === 'left') {
        echo '.fl-node-' . $id . ' .oxi__button_wrapper{
                     justify-content: flex-start;
                }';
    } else if ($settings->button->alignment === 'center') {
        echo '.fl-node-' . $id . ' .oxi__button_wrapper{
                     justify-content: center;
                }';
    } else {
        echo '.fl-node-' . $id . ' .oxi__button_wrapper{
                     justify-content: flex-end;
                }';
    }
    ?>
    @media only screen and (min-width : 669px) and (max-width : 993px){
    <?php
    if ($settings->button->alignment_medium === 'left') {
        echo '.fl-node-' . $id . ' .oxi__button_wrapper{
                     justify-content: flex-start;
                }';
    } else if ($settings->button->alignment_medium === 'center') {
        echo '.fl-node-' . $id . ' .oxi__button_wrapper{
                     justify-content: center;
                }';
    } else {
        echo '.fl-node-' . $id . ' .oxi__button_wrapper{
                     justify-content: flex-end;
                }';
    }
    ?>
    }
    @media only screen and (max-width : 668px){
    <?php
    if ($settings->button->alignment_responsive === 'left') {
        echo '.fl-node-' . $id . ' .oxi__button_wrapper{
                     justify-content: flex-start;
                }';
    } else if ($settings->button->alignment_responsive === 'center') {
        echo '.fl-node-' . $id . ' .oxi__button_wrapper{
                     justify-content: center;
                }';
    } else {
        echo '.fl-node-' . $id . ' .oxi__button_wrapper{
                     justify-content: flex-end;
                }';
    }
    ?>
    }
    <?php
}
/**
 * coding for custom width, auto and full width
 */
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('button', $settings, 'padding', '.fl-node-' . $id . ' .oxi__button', 'px');
if ($settings->button->button_width === 'auto') {
    ?>
    .fl-node-<?php echo $id; ?> .oxi__button{
    display: flex;
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
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'width' => $settings->button->custom_width . 'px',
        'height' => $settings->button->custom_height . 'px',
        'display' => 'flex',
        'justify-content' => 'center',
        'align-items' => 'center',
        'padding' => '0'
            ), '.fl-node-' . $id . ' .oxi__button');
}




if (!empty($settings)) {

    $iconboxstyle = $settings->oxi_flip_icons->icon_style;
    $iconboxbackstyle = $settings->oxi_flip_back_icons->icon_style;
    $eventwidgetbgtype = $settings->back_background_type;
    $headerimage = $settings->header_image_settings;
    $eventtype = $settings->flip_box_type;
    $eventtextalign = $settings->flip_box_text_align_option;
    ?>
    <?php ?>
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-event {
    background-color: transparent;
    width: 100%;
    height: 100%;
    }

    .fl-node-<?php echo $id; ?> .oxi-addons-BB-Card-row {
    width: 100%;
    overflow: hidden;
    max-width: <?php echo $settings->card_max_width; ?>%;
    <?php
    if ("oxi_text_left" == $eventtextalign) {
        echo "text-align: left;";
    } elseif ("oxi_text_right" == $eventtextalign) {
        echo "text-align: right;";
    } else {
        echo "text-align: center;";
    }
    ?>
    }

    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-fontside, .oxi-addons-BB-Card-row {
    width: 100%;
    height: 100%;
    } 
    <?php
    SA_FLBUILDER_HELPER::sa_fl_dimension_utility('inner', $settings, 'padding', '.fl-node-' . $id . ' .oxi-addons-BB-Card-row', 'px');
    SA_FLBUILDER_HELPER::sa_fl_dimension_utility('event_content', $settings, 'padding', '.fl-node-' . $id . ' .oxi-addons-BB-FL-back-overlay', 'px');







    FLBuilderCSS::typography_field_rule(array(
        'settings' => $settings,
        'setting_name' => 'back_title_font_typo',
        'selector' => ".fl-node-$id .oxi-addons-BB-FL-eventwidget .oxi-addons-BB-FL-F-title",
    ));
    FLBuilderCSS::typography_field_rule(array(
        'settings' => $settings,
        'setting_name' => 'back_desc_font_typo',
        'selector' => ".fl-node-$id .oxi-addons-BB-FL-eventwidget .oxi-addons-BB-FL-F-details",
    ));
    ?>
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-eventwidget .oxi-addons-BB-FL-F-title,
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-eventwidget .oxi-addons-BB-FL-F-title h1,
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-eventwidget .oxi-addons-BB-FL-F-title h2,
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-eventwidget .oxi-addons-BB-FL-F-title h3,
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-eventwidget .oxi-addons-BB-FL-F-title h4,
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-eventwidget .oxi-addons-BB-FL-F-title h5,
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-eventwidget .oxi-addons-BB-FL-F-title h6{
    width: 100%;
    color: #<?php echo $settings->back_title_typography_color; ?>;
    padding-top: <?php echo $settings->back_title_typography_margin_top; ?>px;
    padding-bottom: <?php echo $settings->back_title_typography_margin_bottom; ?>px;
    }
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-eventwidget .oxi-addons-BB-FL-F-details{
    width: 100%;
    color: #<?php echo $settings->back_desc_typography_color; ?>;
    padding-top: <?php echo $settings->back_desc_typography_margin_top; ?>px;
    padding-bottom: <?php echo $settings->back_desc_typography_margin_bottom; ?>px;
    }





    <?php
    FLBuilderCSS::border_field_rule(array(
        'settings' => $settings,
        'setting_name' => 'back_border',
        'selector' => ".fl-node-$id .oxi-addons-BB-Card-row",
            )
    );
    ?>

    .fl-node-<?php echo $id; ?> .oxi-addons-BB-header_image{
    <?php
    if ('color' == $headerimage) {
        echo ( '' != $settings->header_background_color ) ? 'background: #' . $settings->header_background_color . ';' : '';
    } else {
        echo ( '' != $settings->header_image_src ) ? 'background: url( "' . $settings->header_image_src . '");' : '';
        echo ( $settings->header_image_repeat ) ? 'background-repeat: repeat;' : 'background-repeat: no-repeat;';
        echo ( '' != $settings->header_image_display ) ? 'background-size: ' . $settings->header_image_display . ';' : '';
        echo ( '' != $settings->header_image_pos ) ? 'background-position: ' . $settings->header_image_pos . ';' : '';
    }
    ?>

    }
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-header_image::after{
    content: '';
    display: inline-block;
    padding-bottom: <?php echo $settings->header_image_height; ?>%;
    }
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-eventwidget{
    <?php
    if ('color' == $eventwidgetbgtype) {
        echo ( '' != $settings->back_background_color ) ? 'background: #' . $settings->back_background_color . ';' : '';
    } else {
        echo ( '' != $settings->back_bg_image_src ) ? 'background: url( "' . $settings->back_bg_image_src . '");' : '';
        echo ( $settings->back_bg_image_repeat ) ? 'background-repeat: repeat;' : 'background-repeat: no-repeat;';
        echo ( '' != $settings->back_bg_image_display ) ? 'background-size: ' . $settings->back_bg_image_display . ';' : '';
        echo ( '' != $settings->back_bg_image_pos ) ? 'background-position: ' . $settings->back_bg_image_pos . ';' : '';
    }
    ?>
    }
    .fl-node-<?php echo $id; ?> .oxi__button{
    transition: all 0.5s ease;
    overflow: hidden;
    }

    .fl-node-<?php echo $id; ?> .oxi__button:hover{
    <?php
    if ($settings->button->hover_box_shadow != '') {
        SA_FLBUILDER_HELPER::sa_fl_custom_box_shadow($settings->hover_box_shadow);
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
            'background-color' => $settings->button->button_hover_background_color,
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
                'background-color' => $settings->button->button_hover_background_color,
                'transition' => 'all .3s',
                '-webkit-transform-origin' => '50%',
                'transform-origin' => '50%',
                    ), '.fl-node-' . $id . ' .oxi__button:after');
            SA_FLBUILDER_HELPER::sa_fl_general_style(array(
                '-webkit-transform' => $hover_scale,
                'transform' => $hover_scale,
                'opacity' => '1',
                'background-color' => $settings->button->button_hover_background_color,
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
                'background-color' => $settings->button->button_hover_background_color,
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
                'background-color' => $settings->button->button_hover_background_color,
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
    ?>

    <?php
    if ($eventwidgetbgtype != 'color') {
        ?>   
        .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-back-overlay{
        width:100%;
        height: 100%;
        background: <?php echo $settings->back_bg_image_overlay; ?>
        }
        <?php
    }
    ?>

    <?php
    if ($eventwidgetbgtype != 'color') {
        ?>
        .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-font-overlay{
        width:100%;
        height: 100%;
        background: <?php echo $settings->front_bg_image_overlay; ?>
        }
        <?php
    }


    FLBuilderCSS::border_field_rule(array(
        'settings' => $settings,
        'setting_name' => 'date_month_border_package',
        'selector' => ".fl-node-$id .oxi-addons-BB-header-DM",
            )
    );
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'background-color' => $settings->date_month_background_color,
        'width' => $settings->date_month_width . 'px',
        'height' => $settings->date_month_height . 'px',
        'top' => $settings->d_M_position_bottom . '%',
        'left' => $settings->d_M_position_left . '%',
            ), '.fl-node-' . $id . ' .oxi-addons-BB-header-DM');

    FLBuilderCSS::typography_field_rule(array(
        'settings' => $settings,
        'setting_name' => 'header_date_typo',
        'selector' => ".fl-node-$id .oxi-addons-BB-header-DM p",
    ));

 

    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'color' => $settings->header_date_typography_color,
        'margin-top' => $settings->header_date_typography_margin_top . 'px',
        'margin-bottom' => $settings->header_date_typography_margin_bottom . 'px',
            ), '.fl-node-' . $id . ' .oxi-addons-BB-header-DM p');



    if ($settings->header_position == 'top') {
        ?>
        .fl-node-<?php echo $id; ?> .oxi-addons-BB-Card-row{
           flex-direction: column; 
        }
    <?php }else if($settings->header_position == 'left'){ ?>
        .fl-node-<?php echo $id; ?> .oxi-addons-BB-Card-row{
            justify-content: center;
            align-items: center;
        }
        .fl-node-<?php echo $id; ?> .oxi-addons-BB-Card-row{
           flex-direction: row;
        }
        .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-eventwidget-icon-area{
            width: <?php echo $settings->header_image_Width; ?>%;
        }
        .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-eventwidget{
            width: 100%;
        }
    <?php }else if($settings->header_position == 'right'){  ?>
        .fl-node-<?php echo $id; ?> .oxi-addons-BB-Card-row{
            justify-content: center;
            align-items: center;
        }
        .fl-node-<?php echo $id; ?> .oxi-addons-BB-Card-row{
           flex-direction: row; 
        }
        .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-eventwidget-icon-area{
            width: <?php echo $settings->header_image_Width; ?>%;
            order: 1;
        }
        .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-eventwidget{
            width: 100%;
        }
        
    <?php } ?>






    @media only screen and (min-width : 669px) and (max-width : 993px){
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-Card-row {
    width: 100%;
    max-width: <?php echo $settings->flip_box_min_height_medium; ?>px;
    }
    }
    @media only screen and (max-width : 668px){
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-Card-row {
    width: 100%;
    max-width: <?php echo $settings->flip_box_min_height_small; ?>px;
    }
    }   











    <?php
}
?>