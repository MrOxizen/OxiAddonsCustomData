<?php

/**
 * start coding for fornend for dynamic style
 * @package shortcode addons
 */

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
if ($settings->box_layout == 'layout01') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'margin-top' => $settings->feature_top_margin ? $settings->feature_top_margin . 'px' : '10px',
    ), '.fl-node-' . $id . '  .oxi__addons_price_table_wrapper .oxi__addons_feature_main');
}
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'margin-bottom' => $settings->feature_bottom_margin ? $settings->feature_bottom_margin . 'px' : '10px',
), '.fl-node-' . $id . '  .oxi__addons_price_table_wrapper .oxi__addons_feature_main');
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
        'color' => $settings->ribbon_color,
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
    ), '.fl-node-' . $id . ' .oxi__addons_price_table_wrapper .oxi__addons_main_title_value');
} elseif ($settings->background_type == 'gradient') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'background' => FLBuilderColor::gradient($settings->title_gradient),
    ), '.fl-node-' . $id . '  .oxi__addons_price_table_wrapper .oxi__addons_main_title_value');
}
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('title', $settings, 'padding', '.fl-node-' . $id . ' .oxi__addons_price_table_wrapper .oxi__addons_main_title_value', 'px');
SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'heading_font_typo', '.fl-node-' . $id . '  .oxi__addons_price_table_wrapper .oxi__addons_title');
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'color' => $settings->heading_color,
), '.fl-node-' . $id . '  .oxi__addons_price_table_wrapper .oxi__addons_title');
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('heading', $settings, 'padding', '.fl-node-' . $id . ' .oxi__addons_price_table_wrapper .oxi__addons_title', 'px');


/**
 * start coding for 
 * Button style
 */
if ($settings->price_button == 'show') {
    SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'btn_typography', '.fl-node-' . $id . '  .oxi__addons_price_table_wrapper .oxi__addons_button');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'text-align' => $settings->btn_alignment,
    ), '.fl-node-' . $id . ' .oxi__addons_price_table_wrapper .oxi__addons_button_main');

    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'color' => $settings->btn_text_color,
        'background-color' => $settings->btn_bg_color,
        'margin-top' =>   $settings->btn_top_margin . 'px',
        'margin-bottom' =>  $settings->btn_bottom_margin . 'px',
    ), '.fl-node-' . $id . ' .oxi__addons_price_table_wrapper .oxi__addons_button');

    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'color' => $settings->btn_text_hover_color,
        'background-color' => $settings->btn_bg_hover_color,
    ), '.fl-node-' . $id . ' .oxi__addons_price_table_wrapper .oxi__addons_button:hover');

    SA_FLBUILDER_HELPER::sa_fl_custom_border_radius('btn', $settings, '.fl-node-' . $id . ' .oxi__addons_price_table_wrapper .oxi__addons_button', 'true');
    SA_FLBUILDER_HELPER::sa_fl_dimension_utility('btn', $settings, 'padding', '.fl-node-' . $id . ' .oxi__addons_price_table_wrapper .oxi__addons_button', 'px');

    if ($settings->btn_border_style != 'none') {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'border-width' => $settings->btn_border_width ? $settings->btn_border_width . 'px;' : '',
            'border-color' => $settings->btn_border_color,
            'border-style' => $settings->btn_border_style,
        ), '.fl-node-' . $id . ' .oxi__addons_price_table_wrapper .oxi__addons_button');
        //if border hover enable 
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'border-color' => $settings->btn_hover_border_color,
        ), '.fl-node-' . $id . ' .oxi__addons_price_table_wrapper .oxi__addons_button:hover');
    }
}
?>
.fl-node-<?php echo $id; ?> .oxi__addons_price_table_wrapper .oxi__addons_button{
<?php
if ($settings->box_shadow != '') {
    SA_FLBUILDER_HELPER::sa_fl_custom_box_shadow($settings->box_shadow);
}
?>
}
.fl-node-<?php echo $id; ?> .oxi__addons_price_table_wrapper .oxi__addons_button:hover{
<?php
if ($settings->box_hover_shadow != '') {
    SA_FLBUILDER_HELPER::sa_fl_custom_box_shadow($settings->box_hover_shadow);
}
?>
}
<?php

/**
 * start coding for 
 * Duration typography
 */
SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'duration_typography', '.fl-node-' . $id . '  .oxi__addons_price_table_wrapper .oxi__addons_duration');
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'color' => $settings->duration_color,
), '.fl-node-' . $id . ' .oxi__addons_price_table_wrapper .oxi__addons_duration');
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('duration', $settings, 'padding', '.fl-node-' . $id . ' .oxi__addons_price_table_wrapper .oxi__addons_duration', 'px');

/**
 * start coding for 
 * Price typography
 */
SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'price_font_typo', '.fl-node-' . $id . '  .oxi__addons_price_table_wrapper .oxi__addons_price');
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'color' => $settings->price_color,
), '.fl-node-' . $id . ' .oxi__addons_price_table_wrapper .oxi__addons_price');
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('price', $settings, 'padding', '.fl-node-' . $id . ' .oxi__addons_price_table_wrapper .oxi__addons_price', 'px');
/**
 * start coding for layout two
 */
if ($settings->box_layout == 'layout02') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'display' => 'flex',
        'justify-content' => 'center',
        'position' => 'absolute',
        'left' => '0',
        'top' => '100%',
        'transform' => 'translateY(-50%)',
        'width' => '100%',
    ), '.fl-node-' . $id . '  .oxi__addons_price_table_wrapper .oxi__addons_price_duration');

    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'margin-top' => $settings->feature_top_margin_02_layout ? $settings->feature_top_margin_02_layout . 'px' : '80px',
    ), '.fl-node-' . $id . '  .oxi__addons_price_table_wrapper .oxi__addons_feature_main');

    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'margin-bottom' => $settings->title_top_margin ? $settings->title_top_margin . 'px' : '50px',
    ), '.fl-node-' . $id . '  .oxi__addons_price_table_wrapper .oxi_specer');

    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'align-items' =>  'center',
        'flex-direction' =>  'column',
        'width' => $settings->cricle_bg_size ? $settings->cricle_bg_size . 'px' : '100px',
        'height' => $settings->cricle_bg_size ? $settings->cricle_bg_size . 'px' : '100px',
        'background-color' => $settings->cricle_bg_color,
        'border-radius' => '100px',
    ), '.fl-node-' . $id . '  .oxi__addons_price_table_wrapper .oxi__addons_price_main');
    if ($settings->cricle_border_style != 'none') {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'border-width' => $settings->cricle_border_width ? $settings->cricle_border_width . 'px;' : '',
            'border-color' => $settings->cricle_border_color,
            'border-style' => $settings->cricle_border_style,
        ), '.fl-node-' . $id . ' .oxi__addons_price_table_wrapper .oxi__addons_price_main');
    }
    SA_FLBUILDER_HELPER::sa_fl_custom_border_radius('cricle', $settings, '.fl-node-' . $id . ' .oxi__addons_price_table_wrapper .oxi__addons_price_main', 'true');
}
