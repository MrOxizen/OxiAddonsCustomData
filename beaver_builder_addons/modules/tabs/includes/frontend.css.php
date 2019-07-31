<?php

/**
 * start coding for fornend for dynamic style
 * @package shortcode addons
 */
//start coding for global settings outer side 
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('general', $settings, 'padding', '.fl-node-' . $id . '  .oxi__addons_wrapper', 'px');
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('general_margin', $settings, 'padding', '.fl-node-' . $id . ' .oxi__tab_wraper_main', 'px');
// for global border
if ($settings->general_border_style != 'none') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'border-width' => $settings->general_border_width ? $settings->general_border_width . 'px;' : '',
        'border-color' => $settings->general_border_color,
        'border-style' => $settings->general_border_style,
    ), '.fl-node-' . $id . ' .oxi__tab_wraper_main');
}
SA_FLBUILDER_HELPER::sa_fl_custom_border_radius('general', $settings, '.fl-node-' . $id . ' .oxi__tab_wraper_main', 'true');
?>
.fl-node-<?php echo $id; ?> .oxi__tab_wraper_main{
<?php
if ($settings->general_shadow != '') {
    SA_FLBUILDER_HELPER::sa_fl_custom_box_shadow($settings->general_shadow);
}
?>
}
<?php

// start coding for horizontal tab 
if ($settings->tab_layout == 'horizontal') { }
// start coding for horizontal tab 
if ($settings->tab_layout == 'vertical') { }


// global title setting
SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'title_typography', '.fl-node-' . $id . ' .oxi_addon_title');
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('heading', $settings, 'padding', '.fl-node-' . $id . ' .oxi__tab_li', 'px');
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('title', $settings, 'margin', '.fl-node-' . $id . ' .oxi__tab_li', 'px');
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'background-color' => $settings->title_bg_color,
    'color' => $settings->title_color,
), '.fl-node-' . $id . ' .oxi__tab_ul .oxi__tab_li');
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'font-size' => $settings->title_icon_size ? $settings->title_icon_size . 'px;' : '',
    'color' => $settings->title_icon_color,
), '.fl-node-' . $id . ' .oxi__icon_image_main .oxi__icon');

if ($settings->title_border_style != 'none') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'border-width' => $settings->title_border_width ? $settings->title_border_width . 'px;' : '',
        'border-color' => $settings->title_border_color,
        'border-style' => $settings->title_border_style,
    ), '.fl-node-' . $id . ' .oxi__tab_ul .oxi__tab_li');
}
SA_FLBUILDER_HELPER::sa_fl_custom_border_radius('title', $settings, '.fl-node-' . $id . ' .oxi__tab_ul .oxi__tab_li', 'true');

//start coding for hover styling
if ($settings->tab_title_hover == 'enable') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'background-color' => $settings->title_hover_bg_color,
        'color' => $settings->title_hover_color,
        'border-color' => $settings->title_hover_border_color,
    ), '.fl-node-' . $id . ' .oxi__tab_ul .oxi__tab_li');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'color' => $settings->title_hover_icon_color,
    ), '.fl-node-' . $id . ' .oxi__tab_ul .oxi__tab_li .oxi__icon');
}
//start coding for hover styling
if ($settings->tab_title_active == 'enable') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'background-color' => $settings->title_active_bg_color,
        'color' => $settings->title_active_color,
        'border-color' => $settings->title_active_border_color,
    ), '.fl-node-' . $id . ' .oxi__tab_ul .oxi__tab_li.active');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'color' => $settings->title_active_icon_color,
    ), '.fl-node-' . $id . ' .oxi__tab_ul .oxi__tab_li.active .oxi__icon');
}

// start coding for Icon style
if ($settings->tab_icon == 'enable') {
    if ($settings->tab_icon_position == 'left') {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'padding-right' => $settings->icon_gap ? $settings->icon_gap . 'px;' : '',
        ), '.fl-node-' . $id . ' .oxi__icon_image_main');
    } elseif ($settings->tab_icon_position == 'right') {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'padding-left' => $settings->icon_gap ? $settings->icon_gap . 'px;' : '',
        ), '.fl-node-' . $id . ' .oxi__icon_image_main');
    } elseif ($settings->tab_icon_position == 'stacked') { }
}


// start coding for description
SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'description_typography', '.fl-node-' . $id . ' .oxi__tab_content p');
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('dsc', $settings, 'padding', '.fl-node-' . $id . ' .oxi__tab_content', 'px');
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('desc_margin', $settings, 'padding', '.fl-node-' . $id . ' .oxi__tab_content_main', 'px');
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'background-color' => $settings->desc_bg_color,
), '.fl-node-' . $id . ' .oxi__tab_content_main');
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'color' => $settings->desc_color,
), '.fl-node-' . $id . ' .oxi__tab_content p');

if ($settings->desc_border_style != 'none') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'border-width' => $settings->desc_border_width ? $settings->desc_border_width . 'px;' : '',
        'border-color' => $settings->desc_border_color,
        'border-style' => $settings->desc_border_style,
    ), '.fl-node-' . $id . ' .oxi__tab_content_main');
}
?>
.fl-node-<?php echo $id; ?> .oxi__tab_content_main{
<?php
if ($settings->desc_shadow != '') {
    SA_FLBUILDER_HELPER::sa_fl_custom_box_shadow($settings->desc_shadow);
}
?>
}
<?php

// start coding for caret styling

if ($settings->caret == 'enable') { }
