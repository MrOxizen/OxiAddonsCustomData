<?php

/**
 * start coding for fornend for dynamic style
 * @package shortcode addons
 */
// heading top add typography, padding, color, setting
SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'font_top_typo', '.fl-node-' . $id . ' .oxi__addons_heading_top');
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'color' => $settings->title_top_color,
), '.fl-node-' . $id . ' .oxi__addons_heading_top');
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('heading_top', $settings, 'padding', '.fl-node-' . $id . ' .oxi__addons_heading_top', 'px');
