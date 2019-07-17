<?php
if (!empty($settings)) {
    $iconboxstyle = $settings->oxi_flip_icons->icon_style;
    $fontsidebgtype = $settings->front_background_type;
    $iconboxbackstyle = $settings->oxi_flip_back_icons->icon_style;
    $backsidebgtype = $settings->back_background_type;
    ?>
    <?php
    FLBuilderCSS::border_field_rule(array(
            'settings' => $settings,
            'setting_name' => 'front_border',
            'selector' => ".fl-node-$id .oxi-addons-BB-FL-fontside",
                )
        );
    ?>

    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-fontside {
    <?php
    
    echo ( '' != $settings->front_background_color ) ? 'background-color: #' . $settings->front_background_color . ';' : '';
    if ( 'color' == $fontsidebgtype ) {
		
	} else {
		echo ( '' != $settings->front_bg_image_src ) ? 'background: url( "' . $settings->front_bg_image_src . '");' : '';
		echo ( $settings->front_bg_image_repeat ) ? 'background-repeat: repeat;' : 'background-repeat: no-repeat;';
		echo ( '' != $settings->front_bg_image_display ) ? 'background-size: ' . $settings->front_bg_image_display . ';' : '';
		echo ( '' != $settings->front_bg_image_pos ) ? 'background-position: ' . $settings->front_bg_image_pos . ';' : '';
	}
    
    ?>

    }
    .fl-node-<?php echo $id; ?> .oxi-addons-BB-FL-fontside-icon-area{
    margin-top:20px;
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
    if ( 'color' == $backsidebgtype ) {
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
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <?php
}
?>