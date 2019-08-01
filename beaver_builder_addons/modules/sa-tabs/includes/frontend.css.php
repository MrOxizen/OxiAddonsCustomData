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
    ), '.fl-node-' . $id . ' .oxi__addons_wrapper');
}
SA_FLBUILDER_HELPER::sa_fl_custom_border_radius('general', $settings, '.fl-node-' . $id . ' .oxi__addons_wrapper', 'true');
?>
.fl-node-<?php echo $id; ?> .oxi__addons_wrapper{
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
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'width' => $settings->title_icon_size ? $settings->title_icon_size . 'px;' : '',
    'height' => $settings->title_icon_size ? $settings->title_icon_size . 'px;' : '',
), '.fl-node-' . $id . ' .oxi__addons_image');
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
    ), '.fl-node-' . $id . ' .oxi__tab_ul .oxi__tab_li:hover');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'color' => $settings->title_hover_icon_color,
    ), '.fl-node-' . $id . ' .oxi__tab_ul .oxi__tab_li:hover .oxi__icon');
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

    if ($settings->icon_position == 'left') {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'padding-right' => $settings->icon_gap ? $settings->icon_gap . 'px;' : '',
        ), '.fl-node-' . $id . ' .oxi__icon_image_main');
    } elseif ($settings->icon_position == 'right') {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'padding-left' => $settings->icon_gap ? $settings->icon_gap . 'px;' : '',
        ), '.fl-node-' . $id . ' .oxi__icon_image_main');
    } elseif ($settings->icon_position == 'stacked') {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'display' => 'block',
            'flex-row' => 'reverse',
        ), '.fl-node-' . $id . ' .oxi__tab_ul .oxi__tab_li');
    }
}


// start coding for description
SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'description_typography', '.fl-node-' . $id . ' .oxi__tab_content *');
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('dsc', $settings, 'padding', '.fl-node-' . $id . ' .oxi__tab_content', 'px');
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('desc_margin', $settings, 'padding', '.fl-node-' . $id . ' .oxi__tab_content_main', 'px');
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'background-color' => $settings->desc_bg_color,
), '.fl-node-' . $id . ' .oxi__tab_content_main');
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'color' => $settings->desc_color,
), '.fl-node-' . $id . ' .oxi__tab_content *');

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
if ($settings->tab_layout == 'vertical') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'width' =>  $settings->tab_width ? $settings->tab_width . '%' : '50%',
    ), '.fl-node-' . $id . ' .oxi__tab_nav_main');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'display' => 'flex',
        'display' => '-webkit-flex',
    ), '.fl-node-' . $id . ' .oxi__addons_wrapper');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'display' => 'block',
    ), '.fl-node-' . $id . ' .oxi__tab_ul');
    if ($settings->caret_style == 'inside') {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'bottom' => '0px',
            'border-left' => $settings->caret_size ? $settings->caret_size . 'px' : '10px',
            'border-left-style' => 'solid',
            'border-right' => $settings->caret_size ? $settings->caret_size . 'px' : '10px',
            'border-right-style' => 'solid',
            'border-bottom' => $settings->caret_size ? $settings->caret_size . 'px' : '10px',
            'border-bottom-style' => 'solid',
            'border-bottom-color' => $settings->caret_color ? $settings->caret_color : '#fff',
        ), '.fl-node-' . $id . ' .oxi__tab_ul .oxi__tab_li.active::after');
        ?>
        .fl-node-<?php echo $id; ?> .oxi__tab_ul .oxi__tab_li.active::after{
        border-right-color: transparent !important;
        border-left-color: transparent !important;
        }
    <?php

    } else {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'left' => 'auto',
            'right' => $settings->caret_size ? '-' . $settings->caret_size . 'px' : '-10px',
            'border-left' => $settings->caret_size ? $settings->caret_size . 'px' : '10px',
            'border-left-style' => 'solid',
            'border-right' => '0px',
            'border-top' => $settings->caret_size ? $settings->caret_size . 'px' : '10px',
            'border-top-style' => 'solid',
            'border-bottom' => $settings->caret_size ? $settings->caret_size . 'px' : '10px',
            'border-bottom-style' => 'solid',
            'border-left-color' => $settings->caret_color ? $settings->caret_color : '#000',
        ), '.fl-node-' . $id . ' .oxi__tab_ul .oxi__tab_li.active::after');
        ?>
        .fl-node-<?php echo $id; ?> .oxi__tab_ul .oxi__tab_li.active::after{
        border-top-color: transparent !important;
        border-bottom-color: transparent !important;
        }
    <?php
    }
} else {
    // start coding for caret styling
    if ($settings->caret == 'enable') {
        if ($settings->caret_style == 'inside') {
            SA_FLBUILDER_HELPER::sa_fl_general_style(array(
                'bottom' => '0px',
                'border-left' => $settings->caret_size ? $settings->caret_size . 'px' : '10px',
                'border-left-style' => 'solid',
                'border-right' => $settings->caret_size ? $settings->caret_size . 'px' : '10px',
                'border-right-style' => 'solid',
                'border-bottom' => $settings->caret_size ? $settings->caret_size . 'px' : '10px',
                'border-bottom-style' => 'solid',
                'border-bottom-color' => $settings->caret_color ? $settings->caret_color : '#fff',
            ), '.fl-node-' . $id . ' .oxi__tab_ul .oxi__tab_li.active::after');
            ?>
            .fl-node-<?php echo $id; ?> .oxi__tab_ul .oxi__tab_li.active::after{
            border-right-color: transparent !important;
            border-left-color: transparent !important;
            }
        <?php

        } else {
            SA_FLBUILDER_HELPER::sa_fl_general_style(array(
                'bottom' => $settings->caret_size ? '-' . $settings->caret_size . 'px' : '-10px',
                'border-left' => $settings->caret_size ? $settings->caret_size . 'px' : '10px',
                'border-left-style' => 'solid',
                'border-right' => $settings->caret_size ? $settings->caret_size . 'px' : '10px',
                'border-right-style' => 'solid',
                'border-top' => $settings->caret_size ? $settings->caret_size . 'px' : '10px',
                'border-top-style' => 'solid',
                'border-top-color' => $settings->caret_color ? $settings->caret_color : '#000',
            ), '.fl-node-' . $id . ' .oxi__tab_ul .oxi__tab_li.active::after');
            ?>
            .fl-node-<?php echo $id; ?> .oxi__tab_ul .oxi__tab_li.active::after{
            border-right-color: transparent !important;
            border-left-color: transparent !important;
            }
        <?php
        }
    }
}
