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
        height: auto;
        margin: 0px auto;
    }
    <?php
    FLBuilderCSS::typography_field_rule(array(
        'settings' => $settings,
        'setting_name' => 'heading_font_typo',
        'selector' => ".fl-node-$id .SA-FL-accordion-heading-$id .SA-FL-accordion-heading-text",
    ));
    SA_FLBUILDER_HELPER::sa_fl_dimension_utility('body', $settings, 'padding', '.fl-node-'.$id.' .SA-FL-accordion-heading-'.$id.'', 'px');
    SA_FLBUILDER_HELPER::sa_fl_dimension_utility('body', $settings, 'margin', '.fl-node-'.$id.' .SA-FL-accordion-heading-'.$id.'', 'px');
    if($settings->accordion_border_style != 'none'){
         SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'border-width' => $settings->body_border_width ? $settings->body_border_width . 'px;' : '',
        'border-color' => $settings->accordion_border_color,
        'border-style' => $settings->accordion_border_style,

    ), '.fl-node-' . $id . ' .SA-FL-accordion-heading-'.$id.'');
    }
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'background-color' => $settings->accordion_dbg_color,
        'color' => $settings->deactive_heading_color,
        'display' => 'flex',
        'align-items' => 'center',
        'align-items' => 'center',
        '-webkit-transition' => 'all 0.2s linear',
        '-moz-transition' => 'all 0.2s linear',
        'transition' => 'all 0.2s linear',
        'cursor' => 'pointer',
    ), '.fl-node-' . $id . ' .SA-FL-accordion-heading-'.$id.'');
    
    
    
    SA_FLBUILDER_HELPER::sa_fl_dimension_utility('sa', $settings, 'padding', '.fl-node-'.$id.' .SA-FL-accordion-heading-'.$id.' .SA-FL-accordion-heading-text', 'px');
    
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'background-color' => $settings->accordion_abg_color,
        'border-color' => $settings->accordion_aborder_color,
        'color' => $settings->active_heading_color,
    ), '.fl-node-' . $id . ' .SA-FL-accordion-heading-'.$id.'.active');
    
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'background-color' => $settings->accordion_abg_color,
        'border-color' => $settings->accordion_aborder_color,
        'color' => $settings->active_heading_color,
    ), '.fl-node-' . $id . ' .SA-FL-accordion-heading-'.$id.':hover');
    
    ?>
   
    .fl-node-<?php echo $id; ?> .SA-FL-accordion-heading-<?php echo $id; ?>.active .span-active{
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
    .fl-node-<?php echo $id; ?> .SA-FL-accordion-heading-<?php echo $id; ?> .span-deactive{
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
    
    .fl-node-<?php echo $id; ?> .SA-FL-accordion-heading-<?php echo $id; ?>:hover .span-deactive{
            color: #<?php echo $settings->active_icons_settings->icon_color; ?>;
            border-color: #<?php echo $settings->active_icons_settings->icon_border_color; ?>;
            background: #<?php echo $settings->active_icons_settings->icon_bg_color; ?>;
        }
    .fl-node-<?php echo $id; ?> .SA-FL-accordion-heading-<?php echo $id; ?> .span-active{
            display: none;
        }
    .fl-node-<?php echo $id; ?> .SA-FL-accordion-heading-<?php echo $id; ?>.active .span-deactive{
            display: none;
        }
     <?php
    FLBuilderCSS::typography_field_rule(array(
        'settings' => $settings,
        'setting_name' => 'description_font_typo',
        'selector' => ".fl-node-$id .SA-FL-accordion-conetent-$id",
    ));
    
    
    ?>
    .fl-node-<?php echo $id; ?> .SA-FL-accordion-conetent-<?php echo $id; ?>{
        background-color: #<?php echo $settings->accordion_descbg_color; ?>;
        display:none;
        padding-top: <?php echo $settings->description_padding_top; ?>px;
        padding-right: <?php echo $settings->description_padding_right; ?>px;
        padding-bottom: <?php echo $settings->description_padding_bottom; ?>px;
        padding-left: <?php echo $settings->description_padding_left; ?>px;
        color: #<?php echo $settings->description_color; ?>;
        border-top: <?php echo $settings->body_description_border_width_top; ?>px;
        border-right: <?php echo $settings->body_description_border_width_right; ?>px;
        border-bottom: <?php echo $settings->body_description_border_width_bottom; ?>px;
        border-left: <?php echo $settings->body_description_border_width_left; ?>px;
        border-style: <?php echo $settings->accordion_description_border_style; ?>;
        border-color: #<?php echo $settings->accordion_description_border_color; ?>;
        margin-top: <?php echo $settings->description__margin_top; ?>px;
        margin-right: <?php echo $settings->description__margin_right; ?>px;
        margin-bottom: <?php echo $settings->description__margin_bottom; ?>px;
        margin-left: <?php echo $settings->description__margin_left; ?>px;
    }
    

@media only screen and (min-width : 669px) and (max-width : 993px){
    .fl-node-<?php echo $id; ?> .SA-FL-accordion-heading-<?php echo $id; ?>{
        padding-top: <?php echo $settings->body_padding_top_medium; ?>px;
        padding-right: <?php echo $settings->body_padding_right_medium; ?>px;
        padding-bottom: <?php echo $settings->body_padding_bottom_medium; ?>px;
        padding-left: <?php echo $settings->body_padding_left_medium; ?>px;

        margin-top: <?php echo $settings->body_margin_top_medium; ?>px;
        margin-right: <?php echo $settings->body_margin_right_medium; ?>px;
        margin-bottom: <?php echo $settings->body_margin_bottom_medium; ?>px;
        margin-left: <?php echo $settings->body_margin_left_medium; ?>px;
    }
    .fl-node-<?php echo $id; ?> .SA-FL-accordion-heading-<?php echo $id; ?> .SA-FL-accordion-heading-text{
        padding-top: <?php echo $settings->sa_accordion_title_padding_top_medium; ?>px;
        padding-right: <?php echo $settings->sa_accordion_title_padding_right_medium; ?>px;
        padding-bottom: <?php echo $settings->sa_accordion_title_padding_bottom_medium; ?>px;
        padding-left: <?php echo $settings->sa_accordion_title_padding_left_medium; ?>px;
        }
    }
@media only screen and (max-width : 668px){
    .fl-node-<?php echo $id; ?> .SA-FL-accordion-heading-<?php echo $id; ?>{
        padding-top: <?php echo $settings->body_padding_top_responsive; ?>px;
        padding-right: <?php echo $settings->body_padding_right_responsive; ?>px;
        padding-bottom: <?php echo $settings->body_padding_bottom_responsive; ?>px;
        padding-left: <?php echo $settings->body_padding_left_responsive; ?>px;

        margin-top: <?php echo $settings->body_margin_top_responsive; ?>px;
        margin-right: <?php echo $settings->body_margin_right_responsive; ?>px;
        margin-bottom: <?php echo $settings->body_margin_bottom_responsive; ?>px;
        margin-left: <?php echo $settings->body_margin_left_responsive; ?>px;
    }
    .fl-node-<?php echo $id; ?> .SA-FL-accordion-heading-<?php echo $id; ?> .SA-FL-accordion-heading-text{
        padding-top: <?php echo $settings->sa_accordion_title_padding_top_responsive; ?>px;
        padding-right: <?php echo $settings->sa_accordion_title_padding_right_responsive; ?>px;
        padding-bottom: <?php echo $settings->sa_accordion_title_padding_bottom_responsive; ?>px;
        padding-left: <?php echo $settings->sa_accordion_title_padding_left_responsive; ?>px;
        }
    }


<?php
    
}
