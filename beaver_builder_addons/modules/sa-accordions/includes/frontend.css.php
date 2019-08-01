<?php
if (!empty($settings)) {
?>
    .fl-node-<?php echo $id; ?> .SA-FL-accordion-main-area{
        max-width: 500px;
        height: auto;
        margin: 10px auto;
    }
    .fl-node-<?php echo $id; ?> .SA-FL-accordions{
        width: 100%;
        height: auto;
        background-color: #f5f5f5;
    }
    .fl-node-<?php echo $id; ?> .SA-FL-accordion-heading{
        display: flex;
        align-items: center;
        padding: 10px 15px;
        color: #555;
        font-weight: 600;
        border-bottom: 1px solid #ddd;
        -webkit-transition:all 0.2s linear;
        -moz-transition:all 0.2s linear;
        transition:all 0.2s linear;
        cursor: pointer;
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
    .fl-node-<?php echo $id; ?> .SA-FL-accordion-heading:hover{
        background-color:#3399cc;
        color: #fff;
    }
    .fl-node-<?php echo $id; ?> .SA-FL-accordion-heading:hover .span-deactive{
            color: #fff;
            border-color: yellow;
            background: red;
        }
    .fl-node-<?php echo $id; ?> .SA-FL-accordion-heading .span-active{
            display: none;
        }
    .fl-node-<?php echo $id; ?> .SA-FL-accordion-heading.active .span-deactive{
            display: none;
        }
    .fl-node-<?php echo $id; ?> .SA-FL-accordion-heading.active{
        background-color:#3399cc;
        color: #fff;
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
