<?php
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
    padding-top:<?php echo $settings->inner_padding_dimension_top; ?>px;
    padding-bottom:<?php echo $settings->inner_padding_dimension_bottom; ?>px;
    padding-left:<?php echo $settings->inner_padding_dimension_left; ?>px;
    padding-right:<?php echo $settings->inner_padding_dimension_right; ?>px;
    }    
    <?php
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
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-fontside .oxi-addons-BB-FL-F-title{
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
    
    
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-backside .oxi-addons-BB-FL-F-title{
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
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-backside-icon-area{
    margin-top:20px;
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





    @media only screen and (min-width : 669px) and (max-width : 993px){
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-row {
    min-height: <?php echo $settings->flip_box_min_height_medium; ?>px;
    }
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-fontside, .oxi-addons-BB-FL-backside {
    padding-top:<?php echo $settings->inner_padding_dimension_top_medium; ?>px;
    padding-bottom:<?php echo $settings->inner_padding_dimension_bottom_medium; ?>px;
    padding-left:<?php echo $settings->inner_padding_dimension_left_medium; ?>px;
    padding-right:<?php echo $settings->inner_padding_dimension_right_medium; ?>px;
    } 
    }
    @media only screen and (max-width : 668px){
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-row {
    min-height: <?php echo $settings->flip_box_min_height_small; ?>px;
    }
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-fontside, .oxi-addons-BB-FL-backside {
    padding-top:<?php echo $settings->inner_padding_dimension_top_responsive; ?>px;
    padding-bottom:<?php echo $settings->inner_padding_dimension_bottom_responsive; ?>px;
    padding-left:<?php echo $settings->inner_padding_dimension_left_responsive; ?>px;
    padding-right:<?php echo $settings->inner_padding_dimension_right_responsive; ?>px;
    } 
    }   











    <?php
}
?>