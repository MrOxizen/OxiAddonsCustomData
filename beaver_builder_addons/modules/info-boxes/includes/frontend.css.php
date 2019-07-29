<?php

/**
 * start coding for fornend for dynamic style
 * @package shortcode addons
 */
// Typography heading 
SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'title_font_typo', '.fl-node-' . $id . ' .oxi__addons_header');
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'color' => $settings->heading_color,
), '.fl-node-' . $id . ' .oxi__addons_header');
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('heading', $settings, 'padding', '.fl-node-' . $id . ' .oxi__addons_header', 'px');
// Typography Description 
SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'description_font_typo', '.fl-node-' . $id . ' .oxi__addons_details p');
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'color' => $settings->description_color,
), '.fl-node-' . $id . ' .oxi__addons_details p');
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('dsc', $settings, 'padding', '.fl-node-' . $id . ' .oxi__addons_details p', 'px');



//style for info boxes style 

if ($settings->info_boxes_type == 'img-on-top') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'flex-direction' => 'column',
    ), '.fl-node-' . $id . ' .oxi__addons_img_heading_desc');
} elseif ($settings->info_boxes_type == 'img-on-left') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'flex-direction' => 'row',
    ), '.fl-node-' . $id . ' .oxi__addons_img_heading_desc');

    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'flex-shrink' => '0',
    ), '.fl-node-' . $id . ' .oxi__icon_image_main');
} elseif ($settings->info_boxes_type == 'img-on-right') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'flex-direction' => 'row-reverse',
    ), '.fl-node-' . $id . ' .oxi__addons_img_heading_desc');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'flex-shrink' => '0',
    ), '.fl-node-' . $id . ' .oxi__icon_image_main');
}
// for style global 
/**
 * general background color and gradient
 */
if ($settings->main_background_type === 'color') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'background-color' => $settings->main_background_color,
    ), '.fl-node-' . $id . ' .oxi__addons_info_boxes_main');
} else {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'background' => FLBuilderColor::gradient($settings->main_gradient),
    ), '.fl-node-' . $id . ' .oxi__addons_info_boxes_main');
}
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('main', $settings, 'padding', '.fl-node-' . $id . ' .oxi__addons_info_boxes_main', 'px');
SA_FLBUILDER_HELPER::sa_fl_border_package($settings, 'info_boxes_border_settings', '.fl-node-' . $id . ' .oxi__addons_info_boxes_main');
if ($settings->main_hover == 'enable') {
    if ($settings->main_hover_background_type === 'color') {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'background-color' => $settings->main_hover_background_color,
        ), '.fl-node-' . $id . ' .oxi__addons_info_boxes_main:hover');
    } else {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'background' => FLBuilderColor::gradient($settings->main_hover_gradient),
        ), '.fl-node-' . $id . ' .oxi__addons_info_boxes_main:hover');
    }
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'border-color' => $settings->main_border_color,
    ), '.fl-node-' . $id . ' .oxi__addons_info_boxes_main:hover');
    SA_FLBUILDER_HELPER::sa_fl_custom_border_radius('main_hover', $settings, '.fl-node-' . $id . ' .oxi__addons_info_boxes_main:hover', 'true');
}
//start coding for image icon setting
if ($settings->img_icon_alignment == 'left') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'justify-content' => 'flex-start',
    ), '.fl-node-' . $id . ' .oxi__icon_image_main');
} elseif ($settings->img_icon_alignment == 'right') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'justify-content' => 'flex-end',
    ), '.fl-node-' . $id . ' .oxi__icon_image_main');
} elseif ($settings->img_icon_alignment == 'center') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'justify-content' => 'center',
    ), '.fl-node-' . $id . ' .oxi__icon_image_main');
}

if ($settings->icon_img_border_style != 'none') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'border-width' => $settings->icon_img_border_width ? $settings->icon_img_border_width . 'px;' : '',
        'border-color' => $settings->icon_img_border_color,
        'border-style' => $settings->icon_img_border_style,
    ), '.fl-node-' . $id . ' .oxi__addons_image');
    //if border hover enable
    if ($settings->icon_img_hover == 'enable') {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'border-color' => $settings->icon_img_border_hover_color,
        ), '.fl-node-' . $id . ' .oxi__addons_image:hover');
    }
}
//if border hover enable
if ($settings->icon_img_hover == 'enable') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'background-color' => $settings->icon_bg_hover_color,
        'border-radius' => $settings->icon_img_hover_border_radius,
    ), '.fl-node-' . $id . ' .oxi__addons_image:hover');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'color' => $settings->icon_hover_color,
    ), '.fl-node-' . $id . ' .oxi__icon:hover');
}
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'border-color' => $settings->icon_bg_color,
), '.fl-node-' . $id . ' .oxi__addons_image');
SA_FLBUILDER_HELPER::sa_fl_custom_border_radius('icon_img', $settings, '.fl-node-' . $id . ' .oxi__addons_image', 'true');
// style for image icon type 
if ($settings->image_icon_type == 'icon') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'font-size' => $settings->icon_size ? $settings->icon_size . 'px' : '',
        'color' => $settings->icon_color,
    ), '.fl-node-' . $id . ' .oxi__icon');
} elseif ($settings->image_icon_type == 'photo') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'width' => $settings->image_size ? $settings->image_size . 'px' : '',
        'height' => $settings->image_size ? $settings->image_size . 'px' : '',
        'max-width' => '100%',
    ), '.fl-node-' . $id . ' .oxi__addons_image');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'width' => $settings->icon_img_bg_size ? $settings->icon_img_bg_size . 'px' : '',
        'height' => $settings->icon_img_bg_size ? $settings->icon_img_bg_size . 'px' : '',
        'max-width' => '100%',
    ), '.fl-node-' . $id . ' .oxi__icon_image');
}

// Button Styling  
if ($settings->info_link_type == 'cta') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'text-align' => $settings->btn_alignment,
    ), '.fl-node-' . $id . ' .oxi__addons_button_main');

    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'color' => $settings->btn_text_color,
        'background-color' => $settings->btn_bg_color,
        'margin-top' => $settings->btn_top_margin . 'px;',
        'margin-bottom' => $settings->btn_bottom_margin . 'px;',
    ), '.fl-node-' . $id . ' .oxi__addons_button');

    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'color' => $settings->btn_text_hover_color,
        'background-color' => $settings->btn_bg_hover_color,
    ), '.fl-node-' . $id . ' .oxi__addons_button:hover');

    SA_FLBUILDER_HELPER::sa_fl_custom_border_radius('btn', $settings, '.fl-node-' . $id . ' .oxi__addons_button', 'true');
    SA_FLBUILDER_HELPER::sa_fl_dimension_utility('btn', $settings, 'padding', '.fl-node-' . $id . ' .oxi__addons_button', 'px');
    SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'btn_font_typo', '.fl-node-' . $id . ' .oxi__addons_button');
}
