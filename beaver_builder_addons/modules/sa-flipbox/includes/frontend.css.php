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
    $fontsidebgtype = $settings->front_background_type;
    $iconboxbackstyle = $settings->oxi_flip_back_icons->icon_style;
    $backsidebgtype = $settings->back_background_type;
    $flipboxtype = $settings->flip_box_type;
    $flipboxtextalign = $settings->flip_box_text_align_option;
    ?>
    <?php ?>
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-flipbox {
    background-color: transparent;
    width: 100%;
    height: 100%;
    perspective: 1000px;
    }

    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-row {
    position: relative;
    width: 100%;
    height: 100%;
    min-height: <?php echo $settings->flip_box_min_height; ?>px;
    <?php
    if ("oxi_text_left" == $flipboxtextalign) {
        echo "text-align: left;";
    } elseif ("oxi_text_right" == $flipboxtextalign) {
        echo "text-align: right;";
    } else {
        echo "text-align: center;";
    }
    ?>

    transition: transform 0.8s;
    transform-style: preserve-3d;
    }
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-fontside, .oxi-addons-BB-FL-backside {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    } 
    <?php
    SA_FLBUILDER_HELPER::sa_fl_dimension_utility('inner', $settings, 'padding', '.fl-node-' . $id . ' .oxi-addons-BB-FL-font-overlay', 'px');
    SA_FLBUILDER_HELPER::sa_fl_dimension_utility('inner', $settings, 'padding', '.fl-node-' . $id . ' .oxi-addons-BB-FL-back-overlay', 'px');

    if ('horizontal_flip_left' == $flipboxtype) {
        $hfl = "transform: rotateY(180deg);
        -webkit-transform: rotateY(180deg);
       -moz-transform: rotateY(180deg);
        -ms-transform: rotateY(180deg);";
        ?>
        .fl-node-<?php echo $id; ?> .oxi-addons-BB-flipbox:hover .oxi-addons-BB-FL-row {
        <?php echo $hfl; ?>
        }
        .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-backside {
        <?php echo $hfl; ?>
        }
        <?php
    }
    if ('horizontal_flip_right' == $flipboxtype) {
        $hfr = "transform: rotateY(-180deg);
        -webkit-transform:  rotateY(-180deg);
       -moz-transform:  rotateY(-180deg);
        -ms-transform:  rotateY(-180deg);";
        ?>
        .fl-node-<?php echo $id; ?> .oxi-addons-BB-flipbox:hover .oxi-addons-BB-FL-row {
        <?php echo $hfr; ?>
        }
        .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-backside {
        <?php echo $hfr; ?>
        }
        <?php
    }
    if ('vertical_flip_top' == $flipboxtype) {
        $vft = "transform: rotateX(180deg);
        -webkit-transform:  rotateX(180deg);
       -moz-transform:  rotateX(180deg);
        -ms-transform: rotateX(180deg);";
        ?>
        .fl-node-<?php echo $id; ?> .oxi-addons-BB-flipbox:hover .oxi-addons-BB-FL-row {
        <?php echo $vft; ?>
        }
        .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-backside {
        <?php echo $vft; ?>
        }
        <?php
    }
    if ('vertical_flip_bottom' == $flipboxtype) {
        $vfb = "transform: rotateX(-180deg);
        -webkit-transform: rotateX(-180deg);
       -moz-transform: rotateX(-180deg);
        -ms-transform: rotateX(-180deg);";
        ?>
        .fl-node-<?php echo $id; ?> .oxi-addons-BB-flipbox:hover .oxi-addons-BB-FL-row {
        <?php echo $vfb; ?>
        }
        .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-backside {
        <?php echo $vfb; ?>
        }
        <?php
    }

    FLBuilderCSS::border_field_rule(array(
        'settings' => $settings,
        'setting_name' => 'front_border',
        'selector' => ".fl-node-$id .oxi-addons-BB-FL-fontside",
            )
    );
    FLBuilderCSS::typography_field_rule(array(
        'settings' => $settings,
        'setting_name' => 'front_title_font_typo',
        'selector' => ".fl-node-$id .oxi-addons-BB-FL-fontside .oxi-addons-BB-FL-F-title",
    ));
    FLBuilderCSS::typography_field_rule(array(
        'settings' => $settings,
        'setting_name' => 'front_desc_typography',
        'selector' => ".fl-node-$id .oxi-addons-BB-FL-fontside .oxi-addons-BB-FL-F-details",
    ));
    FLBuilderCSS::typography_field_rule(array(
        'settings' => $settings,
        'setting_name' => 'back_title_font_typo',
        'selector' => ".fl-node-$id .oxi-addons-BB-FL-backside .oxi-addons-BB-FL-F-title",
    ));
    FLBuilderCSS::typography_field_rule(array(
        'settings' => $settings,
        'setting_name' => 'back_desc_typography',
        'selector' => ".fl-node-$id .oxi-addons-BB-FL-backside .oxi-addons-BB-FL-F-details",
    ));
    ?>

    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-fontside {
    <?php
    echo ( '' != $settings->front_background_color ) ? 'background-color: #' . $settings->front_background_color . ';' : '';
    if ('color' == $fontsidebgtype) {
        
    } else {
        echo ( '' != $settings->front_bg_image_src ) ? 'background: url( "' . $settings->front_bg_image_src . '");' : '';
        echo ( $settings->front_bg_image_repeat ) ? 'background-repeat: repeat;' : 'background-repeat: no-repeat;';
        echo ( '' != $settings->front_bg_image_display ) ? 'background-size: ' . $settings->front_bg_image_display . ';' : '';
        echo ( '' != $settings->front_bg_image_pos ) ? 'background-position: ' . $settings->front_bg_image_pos . ';' : '';
    }
    ?>

    }
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-fontside-icon-area{
    margin-top:<?php echo $settings->oxi_flip_icons->icon_margin_top; ?>px;
    margin-bottom:<?php echo $settings->oxi_flip_icons->icon_margin_bottom; ?>px;
    }
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-fontside-icon-inner{
    display: inline-block;
    }
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-fontside .oxi-addons-BB-FL-F-Icon{
    <?php
    if ($iconboxstyle == "simple") {
        ?>
        font-size:<?php echo $settings->oxi_flip_icons->icon_size; ?>px;
        color: #<?php echo $settings->oxi_flip_icons->icon_color; ?>;
        <?php
    }
    if ($iconboxstyle == "circle") {
        ?>
        font-size:<?php echo $settings->oxi_flip_icons->icon_size; ?>px;
        color: #<?php echo $settings->oxi_flip_icons->icon_color; ?>;
        width: 60px;
        height: 60px;
        background: #<?php echo $settings->oxi_flip_icons->icon_bg_color; ?>;
        border-radius: 100%;
        opacity: <?php echo $settings->oxi_flip_icons->icon_bg_color_opc; ?>;
        display: flex;
        justify-content: center;
        align-items: center;
        <?php
    }
    if ($iconboxstyle == "square") {
        ?>
        font-size:<?php echo $settings->oxi_flip_icons->icon_size; ?>px;
        color: #<?php echo $settings->oxi_flip_icons->icon_color; ?>;
        width: 60px;
        height: 60px;
        background: #<?php echo $settings->oxi_flip_icons->icon_bg_color; ?>;
        opacity: <?php echo $settings->oxi_flip_icons->icon_bg_color_opc; ?>;
        display: flex;
        justify-content: center;
        align-items: center;
        <?php
    }
    if ($iconboxstyle == "custom") {
        ?>
        font-size:<?php echo $settings->oxi_flip_icons->icon_size; ?>px;
        color: #<?php echo $settings->oxi_flip_icons->icon_color; ?>;
        width: <?php echo $settings->oxi_flip_icons->icon_bg_size; ?>px;
        height: <?php echo $settings->oxi_flip_icons->icon_bg_size; ?>px;
        background: #<?php echo $settings->oxi_flip_icons->icon_bg_color; ?>;
        opacity: <?php echo $settings->oxi_flip_icons->icon_bg_color_opc; ?>;
        border-radius: <?php echo $settings->oxi_flip_icons->icon_bg_border_radius; ?>px;
        border-style: <?php echo $settings->oxi_flip_icons->icon_border_style; ?>;
        border-width: <?php echo $settings->oxi_flip_icons->icon_border_width; ?>px;
        border-color: #<?php echo $settings->oxi_flip_icons->icon_border_color; ?>;
        display: flex;
        justify-content: center;
        align-items: center;
        <?php
    }
    ?>
    }
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-fontside .oxi-addons-BB-FL-F-title,
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-fontside .oxi-addons-BB-FL-F-title h1,
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-fontside .oxi-addons-BB-FL-F-title h2,
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-fontside .oxi-addons-BB-FL-F-title h3,
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-fontside .oxi-addons-BB-FL-F-title h4,
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-fontside .oxi-addons-BB-FL-F-title h5,
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-fontside .oxi-addons-BB-FL-F-title h6{
    width: 100%;
    color: #<?php echo $settings->front_title_typography_color; ?>;
    margin-top: <?php echo $settings->front_title_typography_margin_top; ?>px;
    margin-bottom: <?php echo $settings->front_title_typography_margin_bottom; ?>px;
    }
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-fontside .oxi-addons-BB-FL-F-details{
    width: 100%;
    color: #<?php echo $settings->front_desc_typography_color; ?>;
    margin-top: <?php echo $settings->front_desc_typography_margin_top; ?>px;
    margin-bottom: <?php echo $settings->front_desc_typography_margin_bottom; ?>px;
    }


    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-backside .oxi-addons-BB-FL-F-title,
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-backside .oxi-addons-BB-FL-F-title h1,
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-backside .oxi-addons-BB-FL-F-title h2,
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-backside .oxi-addons-BB-FL-F-title h3,
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-backside .oxi-addons-BB-FL-F-title h4,
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-backside .oxi-addons-BB-FL-F-title h5,
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-backside .oxi-addons-BB-FL-F-title h6{
    width: 100%;
    color: #<?php echo $settings->back_title_typography_color; ?>;
    margin-top: <?php echo $settings->back_title_typography_margin_top; ?>px;
    margin-bottom: <?php echo $settings->back_title_typography_margin_bottom; ?>px;
    }
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-backside .oxi-addons-BB-FL-F-details{
    width: 100%;
    color: #<?php echo $settings->back_desc_typography_color; ?>;
    margin-top: <?php echo $settings->back_desc_typography_margin_top; ?>px;
    margin-bottom: <?php echo $settings->back_desc_typography_margin_bottom; ?>px;
    }





    <?php
    FLBuilderCSS::border_field_rule(array(
        'settings' => $settings,
        'setting_name' => 'back_border',
        'selector' => ".fl-node-$id .oxi-addons-BB-FL-backside",
            )
    );
    ?>

    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-backside{
    <?php
    if ('color' == $backsidebgtype) {
        echo ( '' != $settings->back_background_color ) ? 'background: #' . $settings->back_background_color . ';' : '';
    } else {
        echo ( '' != $settings->back_bg_image_src ) ? 'background: url( "' . $settings->back_bg_image_src . '");' : '';
        echo ( $settings->back_bg_image_repeat ) ? 'background-repeat: repeat;' : 'background-repeat: no-repeat;';
        echo ( '' != $settings->back_bg_image_display ) ? 'background-size: ' . $settings->back_bg_image_display . ';' : '';
        echo ( '' != $settings->back_bg_image_pos ) ? 'background-position: ' . $settings->back_bg_image_pos . ';' : '';
    }
    ?>
    }
    
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-backside-icon-inner{
    display: inline-block;
    }
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-backside .oxi-addons-BB-FL-B-Icon{
    <?php
    if ($iconboxbackstyle == "simple") {
        ?>
        font-size:<?php echo $settings->oxi_flip_back_icons->icon_size; ?>px;
        color: #<?php echo $settings->oxi_flip_back_icons->icon_color; ?>;
        <?php
    }
    if ($iconboxbackstyle == "circle") {
        ?>
        font-size:<?php echo $settings->oxi_flip_back_icons->icon_size; ?>px;
        color: #<?php echo $settings->oxi_flip_back_icons->icon_color; ?>;
        width: 60px;
        height: 60px;
        background: #<?php echo $settings->oxi_flip_back_icons->icon_bg_color; ?>;
        border-radius: 100%;
        opacity: <?php echo $settings->oxi_flip_back_icons->icon_bg_color_opc; ?>;
        display: flex;
        justify-content: center;
        align-items: center;
        <?php
    }
    if ($iconboxbackstyle == "square") {
        ?>
        font-size:<?php echo $settings->oxi_flip_back_icons->icon_size; ?>px;
        color: #<?php echo $settings->oxi_flip_back_icons->icon_color; ?>;
        width: 60px;
        height: 60px;
        background: #<?php echo $settings->oxi_flip_back_icons->icon_bg_color; ?>;
        opacity: <?php echo $settings->oxi_flip_back_icons->icon_bg_color_opc; ?>;
        display: flex;
        justify-content: center;
        align-items: center;
        <?php
    }
    if ($iconboxbackstyle == "custom") {
        ?>
        font-size:<?php echo $settings->oxi_flip_back_icons->icon_size; ?>px;
        color: #<?php echo $settings->oxi_flip_back_icons->icon_color; ?>;
        width: <?php echo $settings->oxi_flip_back_icons->icon_bg_size; ?>px;
        height: <?php echo $settings->oxi_flip_back_icons->icon_bg_size; ?>px;
        background: #<?php echo $settings->oxi_flip_back_icons->icon_bg_color; ?>;
        opacity: <?php echo $settings->oxi_flip_back_icons->icon_bg_color_opc; ?>;
        border-radius: <?php echo $settings->oxi_flip_back_icons->icon_bg_border_radius; ?>px;
        border-style: <?php echo $settings->oxi_flip_back_icons->icon_border_style; ?>;
        border-width: <?php echo $settings->oxi_flip_back_icons->icon_border_width; ?>px;
        border-color: #<?php echo $settings->oxi_flip_back_icons->icon_border_color; ?>;
        display: flex;
        justify-content: center;
        align-items: center;
        <?php
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
    if ($backsidebgtype != 'color' ) {
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
    if ($backsidebgtype != 'color' ) {
    ?>
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-font-overlay{
    width:100%;
    height: 100%;
    background: <?php echo $settings->front_bg_image_overlay; ?>
    }
    <?php
    }
    ?>
    


    @media only screen and (min-width : 669px) and (max-width : 993px){
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-row {
    min-height: <?php echo $settings->flip_box_min_height_medium; ?>px;
    }
    }
    @media only screen and (max-width : 668px){
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-row {
    min-height: <?php echo $settings->flip_box_min_height_small; ?>px;
    }
    }   











    <?php
}
?>