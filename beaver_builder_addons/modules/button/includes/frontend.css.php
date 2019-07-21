<?php
SA_FLBUILDER_HELPER::sa_fl_border_package($settings, 'front_border', '.fl-node-' . $id . ' .oxi__button');
SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'button_font_typo', '.fl-node-' . $id . ' .oxi__button');

/**
 * general background color and gradient
 */
if ($settings->button_background_type === 'color') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'background-color' => $settings->button_background_color,
    ), '.fl-node-' . $id . ' .oxi__button');
} else {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'background' => FLBuilderColor::gradient($settings->button_gradient),
    ), '.fl-node-' . $id . ' .oxi__button');
}

SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'color' => $settings->text_color,
), '.fl-node-' . $id . ' .oxi__button');


/**
 * for hover background , color and gradient
 */
if ($settings->button_hover_background_type === 'color') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'background-color' => $settings->button_hover_background_color,
    ), '.fl-node-' . $id . ' .oxi__button:hover');
} else {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'background' => FLBuilderColor::gradient($settings->button_hover_gradient),
    ), '.fl-node-' . $id . ' .oxi__button:hover');
}
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'color' => $settings->hover_text_color,
), '.fl-node-' . $id . ' .oxi__button:hover');


/**
 * button alignment responsive role;
 */
if ($settings->button_width !== 'full') {
    ?>
    .fl-node-<?php echo $id; ?> .oxi__button_wrapper{
    display:flex;
    }
    <?php
    SA_FLBUILDER_HELPER::sa_fl_responsive_setting('justify-content', $settings, 'alignment', '.oxi__button_wrapper');
}
/**
 * coding for custom width, auto and full width
 */
if ($settings->styling !== 'icon') {
    SA_FLBUILDER_HELPER::sa_fl_dimension_utility('button', $settings, 'padding', '.fl-node-' . $id . ' .oxi__button', 'px');
    if ($settings->button_width === 'auto') {
        ?>
        .fl-node-<?php echo $id; ?> .oxi__button{
        display: inline-block;
        }
    <?php
    } elseif ($settings->button_width === 'full') {
        ?>
        .fl-node-<?php echo $id; ?> .oxi__button{
        display: block;
        }
    <?php
    } else {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'width' => $settings->custom_width . 'px',
            'height' => $settings->custom_height . 'px',
            'display' => 'flex',
            'justify-content' => 'center',
            'align-items' => 'center',
            'padding' => '0'
        ), '.fl-node-' . $id . ' .oxi__button');
    }
} else {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'width' => $settings->icon_button_width . 'px',
        'height' => $settings->icon_button_height . 'px',
        'display' => 'flex',
        'justify-content' => 'center',
        'align-items' => 'center',
        'padding' => '0'
    ), '.fl-node-' . $id . ' .oxi__button');
}

if (!empty($settings)) {
    ?>
    .fl-node-<?php echo $id; ?> .oxi__button{
    transition: all 0.5s ease;
    overflow: hidden;
    }
    .fl-node-<?php echo $id; ?> .oxi__button:hover{
    <?php
    SA_FLBUILDER_HELPER::sa_fl_custom_box_shadow($settings->hover_box_shadow);
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'border-color' => $settings->hover_border_color,
    ), '.fl-node-' . $id . ' .oxi__button:hover');

    ?>
    }
    <?php
    /**
     * start coding for styling button
     */
    if ($settings->icon_style === 'show_text') {
        ?>
        .fl-node-<?php echo $id; ?> .oxi__button{
        position: relative;
        }
        .fl-node-<?php echo $id; ?> .oxi__button .oxi__icon-selector {
        visibility: hidden;
        opacity: 0;
        }
        .fl-node-<?php echo $id; ?> .oxi__button .oxi__button-text{
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        width: 100%;
        transition: all 0.5s ease;
        }
        <?php
        if ($settings->icon_animation  == 'default') {
            ?>
            .fl-node-<?php echo $id; ?> .oxi__button:hover .oxi__button-text{
            visibility: hidden;
            opacity: 0;
            }
            .fl-node-<?php echo $id; ?> .oxi__button .oxi__icon-selector{
            position: absolute;
            left: 50%;
            transition: all 0.5s ease;
            transform: translateX(-50%);
            }
            .fl-node-<?php echo $id; ?> .oxi__button:hover .oxi__icon-selector{
            visibility: visible;
            opacity: 1;
            }
        <?php
        } elseif ($settings->icon_animation  == 'right_to_left') {
            ?>
            .fl-node-<?php echo $id; ?> .oxi__button:hover .oxi__button-text{
            transform: translateX(100%);
            visibility: hidden;
            opacity: 0;
            }
            .fl-node-<?php echo $id; ?> .oxi__button .oxi__icon-selector{
            position: absolute;
            left: 0;
            transition: all 0.5s ease;
            transform: translateX(-50%);
            }
            .fl-node-<?php echo $id; ?> .oxi__button:hover .oxi__icon-selector{
            visibility: visible;
            opacity: 1;
            left: 50%;
            }
        <?php
        } elseif ($settings->icon_animation  == 'left_to_right') {
            ?>
            .fl-node-<?php echo $id; ?> .oxi__button:hover .oxi__button-text{
            transform: translateX(100%);
            visibility: hidden;
            opacity: 0;
            }
            .fl-node-<?php echo $id; ?> .oxi__button .oxi__icon-selector{
            position: absolute;
            left: 0;
            transition: all 0.5s ease;
            transform: translateX(-50%);
            }
            .fl-node-<?php echo $id; ?> .oxi__button:hover .oxi__icon-selector{
            visibility: visible;
            opacity: 1;
            left: 50%;
            }
        <?php
        }
    } elseif ($settings->icon_style === 'show_icon') {
        ?>
        .fl-node-<?php echo $id; ?> .oxi__button:hover .oxi__button-text{
        transform: translateX(100%);
        visibility: hidden;
        opacity: 0;
        }
        .fl-node-<?php echo $id; ?> .oxi__button .oxi__icon-selector{
        position: absolute;
        left: 0;
        transition: all 0.5s ease;
        transform: translateX(-50%);
        }
        .fl-node-<?php echo $id; ?> .oxi__button:hover .oxi__icon-selector{
        visibility: visible;
        opacity: 1;
        left: 50%;
        }
    <?php
    } else { }
}
?>