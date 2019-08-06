<?php

/**
 * start coding for fornend for dynamic style
 * @package shortcode addons
 */
// title add typography, padding, color, setting
SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'title_font_top_typo', '.fl-node-' . $id . ' .oxi__addons_title');
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'color' => $settings->title_color,
), '.fl-node-' . $id . ' .oxi__addons_title');
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('title', $settings, 'padding', '.fl-node-' . $id . ' .oxi__addons_title', 'px');
//Sub title add typography, padding, color, setting
SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'sub_title_font_typo', '.fl-node-' . $id . ' .oxi__addons_subtitle');
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'color' => $settings->sub_title_color,
), '.fl-node-' . $id . ' .oxi__addons_subtitle');
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('sub_title', $settings, 'padding', '.fl-node-' . $id . ' .oxi__addons_subtitle', 'px');

// start coding for box styling 
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'background-color' => $settings->box_bg_color,
), '.fl-node-' . $id . ' .oxi__addons_alert_wrapper');
SA_FLBUILDER_HELPER::sa_fl_border_package($settings, 'box_border', '.fl-node-' . $id . ' .oxi__addons_alert_wrapper');

//start coding for icon styling
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('icon', $settings, 'padding', '.fl-node-' . $id . ' .oxi__addons_icon', 'px');
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'background-color' => $settings->icon_bg_color,
), '.fl-node-' . $id . ' .oxi__addons_icon');
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'font-size' => $settings->icon_size ? $settings->icon_size . 'px;' : '',
    'color' => $settings->icon_color,
), '.fl-node-' . $id . ' .oxi__addons_icon .oxi__icons');
//start coding for cross icon styling


SA_FLBUILDER_HELPER::sa_fl_dimension_utility('cross_icon', $settings, 'padding', '.fl-node-' . $id . ' .cross__icons', 'px');
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'font-size' => $settings->cross_icon_size ? $settings->cross_icon_size . 'px;' : '',
    'color' => $settings->cross_icon_color,
), '.fl-node-' . $id . '  .cross__icons');
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'color' => $settings->cross_hovecross__iconsr_icon_color,
), '.fl-node-' . $id . ' .:hover');
