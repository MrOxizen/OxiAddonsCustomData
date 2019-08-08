<?php

/**
 * start coding for fornend for dynamic style
 * @package shortcode addons
 */

SA_FLBUILDER_HELPER::sa_fl_border_package($settings, 'front_border', '.fl-node-' . $id . ' .oxi__addons_info_table_main');

SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'heading_font_typo', '.fl-node-' . $id . ' .oxi__addons_header');

SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'color' => $settings->heading_color,
), '.fl-node-' . $id . ' .oxi__addons_header');
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('heading', $settings, 'padding', '.fl-node-' . $id . ' .oxi__addons_header', 'px');
// Typography Sub heading 
SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'sub_heading_font_typo', '.fl-node-' . $id . ' .oxi__addons_sub_header');

/**
 * start coding for 
 * Price Table Box outer
 */
SA_FLBUILDER_HELPER::sa_fl_border_package($settings, 'pice_border_package', '.fl-node-' . $id . ' .oxi__addons_price_table_main');

/**
 * start coding for 
 * feature Settings 
 */
if ($settings->feature_odd_bg_color != '') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'background-color' => $settings->feature_odd_bg_color,
    ), '.fl-node-' . $id . ' .oxi__addons_feature:nth-child(odd)');
}
if ($settings->feature_even_bg_color != '') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'background-color' => $settings->feature_even_bg_color,
    ), '.fl-node-' . $id . ' .oxi__addons_price_table_wrapper .oxi__addons_feature:nth-child(even)');
}
if ($settings->feature_border_style != 'none') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'border-bottom-width' => $settings->feature_border_width  ? $settings->feature_border_width . 'px' : '',
        'border-bottom-style' => $settings->feature_border_style,
        'border-bottom-color' => $settings->feature_border_color,
    ), '.fl-node-' . $id . ' .oxi__addons_price_table_wrapper .oxi__addons_feature');
}
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('feature', $settings, 'padding', '.fl-node-' . $id . ' .oxi__addons_price_table_wrapper .oxi__addons_feature', 'px');
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'color' => $settings->feature_color,
), '.fl-node-' . $id . ' .oxi__addons_price_table_wrapper .oxi__addons_feature');
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'color' => $settings->feature_span_color,
), '.fl-node-' . $id . ' .oxi__addons_price_table_wrapper .oxi__addons_feature > span');
// Typography  For Feature
SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'feature_font_typo', '.fl-node-' . $id . ' .oxi__addons_price_table_wrapper .oxi__addons_feature');

/**
 * start coding for
 * ribbon
 */
if ($settings->ribbon == 'show') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'content' => "'$settings->ribbon_text'",
        'background-color' => $settings->rib_bg_color,
        'width' => $settings->rib_width . 'px',
        'height' =>  $settings->rib_height . 'px',
        'color' => $settings->rib_color,
    ), '.fl-node-' . $id . ' .oxi__addons_price_table_wrapper .oxi__addons_main_title_value::after');
    if ($settings->position == 'left') {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'left' => $settings->rib_horizontal . 'px',
            'top' => $settings->rib_vertical . 'px',
            'transform' => 'rotate(-46deg)',
        ), '.fl-node-' . $id . ' .oxi__addons_price_table_wrapper .oxi__addons_main_title_value::after');
    } elseif ($settings->position == 'right') {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'right' => $settings->rib_horizontal . 'px',
            'top' => $settings->rib_vertical . 'px',
            'transform' => 'rotate(46deg)',
        ), '.fl-node-' . $id . ' .oxi__addons_price_table_wrapper .oxi__addons_main_title_value::after');
    }
    SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'ribbon_font_typo', '.fl-node-' . $id . ' .oxi__addons_price_table_wrapper .oxi__addons_main_title_value::after');
}

/**
 * start coding for 
 * title
 */
if ($settings->background_type == 'color') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'background-color' => $settings->title_bg,
    ), '.fl-node-' . $id . ' .oxi__addons_price_table_wrapper .oxi__addons_price_main');
} elseif ($settings->background_type == 'gradient') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'background' => FLBuilderColor::gradient($settings->title_gradient),
    ), '.fl-node-' . $id . '  .oxi__addons_price_table_wrapper .oxi__addons_price_main');
}
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('title', $settings, 'padding', '.fl-node-' . $id . ' .oxi__addons_price_table_wrapper .oxi__addons_price_main', 'px');
SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'heading_font_typo', '.fl-node-' . $id . '  .oxi__addons_price_table_wrapper .oxi__addons_title');
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'color' => $settings->heading_color,
), '.fl-node-' . $id . '  .oxi__addons_price_table_wrapper .oxi__addons_title');
/**
 * start coding for 
 * Button style
 */
SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'btn_typography', '.fl-node-' . $id . '  .oxi__addons_price_table_wrapper .oxi__addons_button');
