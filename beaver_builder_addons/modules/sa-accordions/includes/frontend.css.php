<?php
if (!empty($settings)) {
?>
    .fl-node-<?php echo $id; ?> .SA-FL-accordion-main-area{
        max-width: 100%;
        height: auto;
        margin: 0px;
    }
    .fl-node-<?php echo $id; ?> .SA-FL-accordions{
        width: 100%;
        max-width: 500px;
        height: auto;
        background: #<?php echo $settings->accordion_dbg_color; ?>;
        margin: 0px auto;
    }
    <?php
    FLBuilderCSS::border_field_rule(array(
        'settings' => $settings,
        'setting_name' => 'body_border_width',
        'selector' => ".fl-node-$id .SA-FL-accordion-heading",
            )
    );
    
    ?>
    .fl-node-<?php echo $id; ?> .SA-FL-accordion-heading{
        display: flex;
        align-items: center;
        padding: 10px 15px;
        color: #555;
        font-weight: 600;
        border-style: <?php echo $settings->accordion_border_style; ?>;
        border-color: #<?php echo $settings->accordion_border_color; ?>;
        -webkit-transition:all 0.2s linear;
        -moz-transition:all 0.2s linear;
        transition:all 0.2s linear;
        cursor: pointer;
    }
    .fl-node-<?php echo $id; ?> .SA-FL-accordion-heading.active{
        background: #<?php echo $settings->accordion_abg_color; ?>;
        color: #fff;
    }
    .fl-node-<?php echo $id; ?> .SA-FL-accordion-heading:hover{
        background: #<?php echo $settings->accordion_abg_color; ?>;
        color: #fff;
    }
    .fl-node-<?php echo $id; ?> .SA-FL-accordion-heading.active .span-active{
            display: flex;
            align-items: center;
            justify-content: center;
            background: #<?php echo $settings->active_icons_settings->icon_bg_color; ?>;
            font-size: <?php echo $settings->active_icons_settings->icon_size; ?>px;
            width: 100%;
            max-width: <?php echo $settings->active_icons_settings->icon_bg_size; ?>px;
            height: <?php echo $settings->active_icons_settings->icon_bg_size; ?>px;
            color: #<?php echo $settings->active_icons_settings->icon_color; ?>;
            border-width: <?php echo $settings->active_icons_settings->icon_border_width; ?>px;
            border-style: <?php echo $settings->active_icons_settings->icon_border_style; ?>;
            border-color: #<?php echo $settings->active_icons_settings->icon_border_color; ?>;
            border-radius: <?php echo $settings->active_icons_settings->icon_bg_border_radius; ?>px;
            margin: 5px;
            
        }
    .fl-node-<?php echo $id; ?> .SA-FL-accordion-heading .span-deactive{
            display: flex;
            align-items: center;
            justify-content: center;
            background: #<?php echo $settings->deactive_icons_settings->icon_bg_color; ?>;
            font-size: <?php echo $settings->deactive_icons_settings->icon_size; ?>px;
            width: 100%;
            max-width: <?php echo $settings->deactive_icons_settings->icon_bg_size; ?>px;
            height: <?php echo $settings->deactive_icons_settings->icon_bg_size; ?>px;
            color: #<?php echo $settings->deactive_icons_settings->icon_color; ?>;
            border-width: <?php echo $settings->deactive_icons_settings->icon_border_width; ?>px;
            border-style: <?php echo $settings->deactive_icons_settings->icon_border_style; ?>;
            border-color: #<?php echo $settings->deactive_icons_settings->icon_border_color; ?>;
            border-radius: <?php echo $settings->deactive_icons_settings->icon_bg_border_radius; ?>px;
            margin: 5px;
            
        }
    
    .fl-node-<?php echo $id; ?> .SA-FL-accordion-heading:hover .span-deactive{
            color: #<?php echo $settings->active_icons_settings->icon_color; ?>;
            border-color: #<?php echo $settings->active_icons_settings->icon_border_color; ?>;
            background: #<?php echo $settings->active_icons_settings->icon_bg_color; ?>;
        }
    .fl-node-<?php echo $id; ?> .SA-FL-accordion-heading .span-active{
            display: none;
        }
    .fl-node-<?php echo $id; ?> .SA-FL-accordion-heading.active .span-deactive{
            display: none;
        }
    
    .fl-node-<?php echo $id; ?> .SA-FL-accordion-conetent{
        background-color: #fff;
        border-bottom: 1px solid #ddd;
        display:none;
        padding: 10px 15px;
        margin: 0;
        color: #333;
    }
    




<?php
    
}
