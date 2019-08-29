<?php

/**
 * start coding for fornend for dynamic style
 * @package shortcode addons
 */

 if($settings->background_settings == 'on'){
    SA_FLBUILDER_HELPER::sa_fl_border_package($settings, 'counter_border_settings', '.fl-node-' . $id . ' .oxi__sa_counter_main');
     /**
     * Counter box background color and gradient
     */
    if ($settings->main_background_type === 'color') {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'background-color' => $settings->main_background_color,
        ), '.fl-node-' . $id . ' .oxi__sa_counter_main');
    } else {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'background' => FLBuilderColor::gradient($settings->main_gradient),
        ), '.fl-node-' . $id . ' .oxi__sa_counter_main');
    }
 
 }

SA_FLBUILDER_HELPER::sa_fl_dimension_utility('main', $settings, 'padding', '.fl-node-' . $id . '  .oxi__sa_counter_main', 'px');
// Typography heading 
SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'title_font_typo', '.fl-node-' . $id . ' .oxi__sa_counter_title');

SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'color' => $settings->title_color,
), '.fl-node-' . $id . ' .oxi__sa_counter_title');

SA_FLBUILDER_HELPER::sa_fl_dimension_utility('title', $settings, 'padding', '.fl-node-' . $id . '  .oxi__sa_counter_title', 'px');


// Typography heading 
SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'counter_sign_font_typo', '.fl-node-' . $id . ' .oxi__sa_counter_number');

SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'color' => $settings->counter_sign_color,
), '.fl-node-' . $id . ' .oxi__sa_counter_number');
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('counter_sign', $settings, 'padding', '.fl-node-' . $id . '  .oxi__sa_counter_number', 'px');







// icon and image settings 

//start coding for image icon setting
if ($settings->img_icon_alignment == 'left') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'justify-content' => 'flex-start',
    ), '.fl-node-' . $id . ' .oxi__counter_icon_image_main');
} elseif ($settings->img_icon_alignment == 'right') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'justify-content' => 'flex-end',
    ), '.fl-node-' . $id . ' .oxi__counter_icon_image_main');
} elseif ($settings->img_icon_alignment == 'center') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'justify-content' => 'center',
    ), '.fl-node-' . $id . ' .oxi__counter_icon_image_main');
}
  
if ($settings->icon_img_border_style != 'none') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'border-width' => $settings->icon_img_border_width ? $settings->icon_img_border_width . 'px;' : '',
        'border-color' => $settings->icon_img_border_color,
        'border-style' => $settings->icon_img_border_style,
    ), '.fl-node-' . $id . ' .oxi__counter_icon_image'); 
}
 
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'background-color' => $settings->icon_bg_color,
    'width' => $settings->icon_img_bg_size ? $settings->icon_img_bg_size . 'px' : '',
    'height' => $settings->icon_img_bg_size ? $settings->icon_img_bg_size . 'px' : '',
), '.fl-node-' . $id . ' .oxi__counter_icon_image');
SA_FLBUILDER_HELPER::sa_fl_custom_border_radius('icon_img', $settings, '.fl-node-' . $id . ' .oxi__counter_icon_image', 'true');

SA_FLBUILDER_HELPER::sa_fl_dimension_utility('icon', $settings, 'margin', '.fl-node-' . $id . '  .oxi__counter_icon_image', 'px');
// style for image icon type 
if ($settings->image_icon_type == 'icon') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'font-size' => $settings->icon_size ? $settings->icon_size . 'px' : '48px',
        'color' => $settings->icon_color,
        'width' => $settings->icon_img_bg_size ? $settings->icon_img_bg_size . 'px' : '',
    'height' => $settings->icon_img_bg_size ? $settings->icon_img_bg_size . 'px' : '',
    ), '.fl-node-' . $id . ' .oxi__counter_icon');
} elseif ($settings->image_icon_type == 'photo') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'width' => $settings->image_size ? $settings->image_size . 'px' : '',
        'height' => $settings->image_size ? $settings->image_size . 'px' : '',
        'max-width' => '100%',
    ), '.fl-node-' . $id . ' .oxi__counter_addons_image'); 
}


if ($settings->divider_show == 'show') { 
        SA_FLBUILDER_HELPER::sa_fl_general_style(array( 
            'bottom' => '0', 
            'background-color' => $settings->divider_color,
            'width' => $settings->divider_width ? $settings->divider_width . 'px' : '50px',
            'height' => $settings->divider_height ? $settings->divider_height . 'px' : '4px',
        ), '.fl-node-' . $id . ' .oxi__sa_divider::after');

        if ($settings->divider_alignment == 'left') {
            SA_FLBUILDER_HELPER::sa_fl_general_style(array(
                'left' => $settings->padding_left ? $settings->padding_left .'px' : '',
            ), '.fl-node-' . $id . ' .oxi__sa_divider::after');
        } elseif ($settings->divider_alignment == 'right') {
            SA_FLBUILDER_HELPER::sa_fl_general_style(array( 
                'right' => $settings->padding_right ? $settings->padding_right .'px' : '0',
            ), '.fl-node-' . $id . ' .oxi__sa_divider::after');
        } elseif ($settings->divider_alignment == 'center') {
            SA_FLBUILDER_HELPER::sa_fl_general_style(array(
                'left' => '50%',
                'transform' => 'translateX(-50%)',
            ), '.fl-node-' . $id . ' .oxi__sa_divider::after');
        }
}


if($settings->counter_style == 'design_two'){
    SA_FLBUILDER_HELPER::sa_fl_general_style(array( 
        'flex' => '1', 
    ), '.fl-node-' . $id . ' .oxi__counter_icon_image_main');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'display' => 'flex',  
    ), '.fl-node-' . $id . ' .oxi__sa_counter_main');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'align-items' => 'center', 
    ), '.fl-node-' . $id . ' .oxi__counter_icon_image_main');
 
}