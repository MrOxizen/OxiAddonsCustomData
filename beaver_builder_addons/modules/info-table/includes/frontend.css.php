<?php

/**
 * start coding for fornend for dynamic style
 * @package shortcode addons
 */

SA_FLBUILDER_HELPER::sa_fl_border_package($settings, 'front_border', '.fl-node-' . $id . ' .oxi__addons_info_table_main');
// Typography heading 
SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'heading_font_typo', '.fl-node-' . $id . ' .oxi__addons_header');

SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'color' => $settings->heading_color,
), '.fl-node-' . $id . ' .oxi__addons_header');
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('heading', $settings, 'padding', '.fl-node-' . $id . ' .oxi__addons_header', 'px');
// Typography Sub heading 
SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'sub_heading_font_typo', '.fl-node-' . $id . ' .oxi__addons_sub_header');

SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'color' => $settings->sub_heading_color,
), '.fl-node-' . $id . ' .oxi__addons_sub_header');
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('sub_heading', $settings, 'padding', '.fl-node-' . $id . ' .oxi__addons_sub_header', 'px');
// Typography Description 
SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'description_font_typo', '.fl-node-' . $id . ' .oxi__addons_details *');

SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'color' => $settings->description_color,
), '.fl-node-' . $id . ' .oxi__addons_details *');
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('dsc', $settings, 'padding', '.fl-node-' . $id . ' .oxi__addons_details *', 'px');

//heading and subheading style
if ($settings->background_type == 'color') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'background-color' => $settings->heading_subheading_background_color,
    ), '.fl-node-' . $id . ' .oxi__adons_header_sub_header');
} elseif ($settings->background_type == 'gradient') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'background' => FLBuilderColor::gradient($settings->heading_subheading_gradient),
    ), '.fl-node-' . $id . ' .oxi__adons_header_sub_header');
}
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('heading_sub_heading', $settings, 'padding', '.fl-node-' . $id . ' .oxi__adons_header_sub_header', 'px');


// Button Styling  
if ($settings->info_link_type == 'cta') {
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

    SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'btn_typography', '.fl-node-' . $id . ' .oxi__addons_button');
    SA_FLBUILDER_HELPER::sa_fl_dimension_utility('btn', $settings, 'padding', '.fl-node-' . $id . ' .oxi__addons_button', 'px');
    SA_FLBUILDER_HELPER::sa_fl_custom_border_radius('btn', $settings, '.fl-node-' . $id . ' .oxi__addons_button', 'true');
}
// icon styleing  
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('icon_image', $settings, 'padding', '.fl-node-' . $id . ' .oxi__icon_image_main', 'px');
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'font-size' => $settings->icon_size ? $settings->icon_size . 'px;' : '',
), '.fl-node-' . $id . ' .oxi__icon');

if ($settings->alignment === 'left') {
    ?>
    .fl-node-<?php echo $id; ?> .oxi__icon_image_main {
    justify-content: flex-start;
    }
<?php
} else if ($settings->alignment === 'right') {
    ?>
    .fl-node-<?php echo $id; ?> .oxi__icon_image_main {
    justify-content: flex-end;
    }
<?php
} else if ($settings->alignment === 'center') {
    ?>
    .fl-node-<?php echo $id; ?> .oxi__icon_image_main {
    justify-content: center;
    }
<?php
}
?>
@media only screen and (min-width : 669px) and (max-width : 993px){
<?php
if ($settings->alignment_medium === 'left') {
    ?>
    .fl-node-<?php echo $id; ?> .oxi__icon_image_main {
    justify-content: flex-start;
    }

<?php
} else if ($settings->alignment_medium === 'right') {
    ?>
    .fl-node-<?php echo $id; ?> .oxi__icon_image_main {
    justify-content: flex-end;
    }
<?php
} else if ($settings->alignment_medium === 'center') {
    ?>
    .fl-node-<?php echo $id; ?> .oxi__icon_image_main {
    justify-content: center;
    }
<?php
}
?>
}
@media only screen and (max-width : 668px){
<?php
if ($settings->alignment_responsive === 'left') {
    ?>
    .fl-node-<?php echo $id; ?> .oxi__icon_image_main {
    justify-content: flex-start;
    }
<?php
} else if ($settings->alignment_responsive === 'right') {
    ?>
    .fl-node-<?php echo $id; ?> .oxi__icon_image_main {
    justify-content: flex-end;
    }
<?php
} else if ($settings->alignment_responsive === 'center') {
    ?>
    .fl-node-<?php echo $id; ?> .oxi__icon_image_main {
    justify-content: center;
    }
<?php
}
?>
}
<?php
if ($settings->image_type == 'icon') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'color' => $settings->icon_color,
    ), '.fl-node-' . $id . ' .oxi__icon');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'color' => $settings->icon_hover_color,
    ), '.fl-node-' . $id . ' .oxi__icon_image:hover .oxi__icon');

    if ($settings->icon_style != 'simple') {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'background-color' => $settings->icon_bg_color,
        ), '.fl-node-' . $id . ' .oxi__icon_image');
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'background-color' => $settings->icon_bg_hover_color,
        ), '.fl-node-' . $id . ' .oxi__icon_image:hover');
        if ($settings->icon_style == 'circle') {
            SA_FLBUILDER_HELPER::sa_fl_general_style(array(
                'width' => '120px',
                'height' => '120px',
                'border-radius' => '120px',
            ), '.fl-node-' . $id . ' .oxi__icon_image');
        } elseif ($settings->icon_style == 'square') {
            SA_FLBUILDER_HELPER::sa_fl_general_style(array(
                'width' => '120px',
                'height' => '120px',
                'border-radius' => '0px',
            ), '.fl-node-' . $id . ' .oxi__icon_image');
        } elseif ($settings->icon_style == 'custom') {

            SA_FLBUILDER_HELPER::sa_fl_general_style(array(
                'width' => $settings->icon_bg_size ? $settings->icon_bg_size . 'px;' : '',
                'height' => $settings->icon_bg_size ? $settings->icon_bg_size . 'px;' : '',
            ), '.fl-node-' . $id . ' .oxi__icon_image');
            SA_FLBUILDER_HELPER::sa_fl_custom_border_radius('icon_bg', $settings, '.fl-node-' . $id . ' .oxi__icon_image', 'true');
            if ($settings->icon_border_style != 'none') {
                SA_FLBUILDER_HELPER::sa_fl_general_style(array(
                    'border-width' => $settings->icon_border_width ? $settings->icon_border_width . 'px;' : '',
                    'border-color' => $settings->icon_border_color,
                    'border-style' => $settings->icon_border_style,
                ), '.fl-node-' . $id . ' .oxi__icon_image');
                SA_FLBUILDER_HELPER::sa_fl_general_style(array(
                    'border-color' => $settings->icon_border_hover_color,
                ), '.fl-node-' . $id . ' .oxi__icon_image:hover');
            }
        }
    }
}
if ($settings->image_type == 'photo') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'width' => $settings->img_size ? $settings->img_size . 'px;' : '',
        'height' => $settings->img_size ? $settings->img_size . 'px;' : '',
    ), '.fl-node-' . $id . ' .oxi__image');

    if ($settings->image_style != 'simple') {
        if ($settings->image_style == 'circle') {
            SA_FLBUILDER_HELPER::sa_fl_general_style(array(
                'border-radius' =>  $settings->img_size ? $settings->img_size . 'px;' : '',
                'width' =>  '150px',
                'height' =>  '150px',
                'background-color' =>  '3185ba',
            ), '.fl-node-' . $id . ' .oxi__addons_image');
        } elseif ($settings->image_style == 'square') {
            SA_FLBUILDER_HELPER::sa_fl_general_style(array(
                'width' =>  '150px',
                'height' =>  '150px',
                'background-color' =>  '3185ba',
                'border-radius' => '0px',
            ), '.fl-node-' . $id . ' .oxi__addons_image');
        } elseif ($settings->image_style == 'custom') {
            SA_FLBUILDER_HELPER::sa_fl_general_style(array(
                'width' => $settings->img_bg_size ? $settings->img_bg_size . 'px;' : '',
                'height' => $settings->img_bg_size ? $settings->img_bg_size . 'px;' : '',
                'background-color' =>  $settings->img_bg_color,
            ), '.fl-node-' . $id . ' .oxi__addons_image');

            SA_FLBUILDER_HELPER::sa_fl_general_style(array(
                'background-color' =>  $settings->img_bg_hover_color,
            ), '.fl-node-' . $id . ' .oxi__addons_image:hover');

            SA_FLBUILDER_HELPER::sa_fl_custom_border_radius('img', $settings, '.fl-node-' . $id . ' .oxi__addons_image', 'true');
            if ($settings->img_border_style != 'none') {
                SA_FLBUILDER_HELPER::sa_fl_general_style(array(
                    'border-width' => $settings->img_border_width ? $settings->img_border_width . 'px;' : '',
                    'border-color' => $settings->img_border_color,
                    'border-style' => $settings->img_border_style,
                ), '.fl-node-' . $id . ' .oxi__addons_image');
                SA_FLBUILDER_HELPER::sa_fl_general_style(array(
                    'border-color' => $settings->img_border_hover_color,
                ), '.fl-node-' . $id . ' .oxi__addons_image:hover');
            }
        }
    }
}


// description setting style

SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'background-color' => $settings->desc_background_color,
    'background-color' => $settings->desc_background_color,
    'border-top-width' => $settings->desc_border_width ? $settings->desc_border_width . 'px;' : '',
    'border-top-style' => $settings->desc_border_style,
    'border-top-color' => $settings->desc_border_color,
), '.fl-node-' . $id . ' .oxi__addons_details');

// style design 03 
if ($settings->box_design == 'design03') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'height' => $settings->box_height ? $settings->box_height . 'px' : '120px',
        'margin-bottom' => $settings->box_height ? $settings->box_height . 'px' : '120px',
    ), '.fl-node-' . $id . ' .oxi__icon_image_main');

    if ($settings->background_type == 'color') {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'background-color' => $settings->heading_subheading_background_color ? $settings->heading_subheading_background_color : 'rgb(123, 188, 204)',
        ), '.fl-node-' . $id . ' .oxi__icon_image_main');
    } elseif ($settings->background_type == 'gradient') {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'background' => FLBuilderColor::gradient($settings->heading_subheading_gradient),
        ), '.fl-node-' . $id . ' .oxi__icon_image_main');
    }
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'position' => 'absolute',
        'bottom' => '0',
        '-webkit-transform' => 'translateY(50%)',
        '-ms-transform' => 'translateY(50%)',
        'transform' => 'translateY(50%)',
    ), '.fl-node-' . $id . ' .oxi__icon_image');
}
