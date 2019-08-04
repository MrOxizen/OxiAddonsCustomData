<?php
/**
 * start coding for fornend for dynamic style
 * @package shortcode addons
 */
// footer add typography, padding, color, setting
SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'font_typo', '.fl-node-' . $id . ' .oxi__addons_header');
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'color' => $settings->title_color,
        ), '.fl-node-' . $id . ' .oxi__addons_header');
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('footer', $settings, 'padding', '.fl-node-' . $id . ' .oxi__addons_header', 'px');
// details add typography, padding, color, setting
SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'desc_font_typo', '.fl-node-' . $id . ' .oxi__addons_details *');
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'color' => $settings->desc_color,
        ), '.fl-node-' . $id . ' .oxi__addons_details *');
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('desc', $settings, 'padding', '.fl-node-' . $id . ' .oxi__addons_details *', 'px');
// Line Text Seperator add typography, padding, color, setting
if ($settings->separator_style === 'line_text') {
    SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'separator_font_typo', '.fl-node-' . $id . ' .oxi__line_text');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'color' => $settings->separator_text_color,
            ), '.fl-node-' . $id . ' .oxi__line_text');
}

SA_FLBUILDER_HELPER::sa_fl_responsive_setting('text-align', $settings, 'alignment', '.fl-node-' . $id . ' .oxi__addons_line_divider');

if ($settings->separator_style != 'none') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'border-top-width' => $settings->separator_line_height . 'px',
        'border-top-style' => $settings->separator_line_style,
        'border-top-color' => $settings->separator_line_color,
            ), '.fl-node-' . $id . ' .oxi__addons_seperator_span');

    SA_FLBUILDER_HELPER::sa_fl_responsive_setting('width', $settings, 'separator_line_width', '.fl-node-' . $id . ' .oxi__addons_seperator_width');
}
if ($settings->separator_style === 'line') {
    ?>
    .fl-node-<?php echo $id; ?> .oxi__addons_seperator_width {
    width: <?php echo $settings->separator_line_width; ?>%;
    }
    .fl-node-<?php echo $id; ?> .oxi__addons_line_divider {
    display: inline-block;
    }
    .fl-node-<?php echo $id; ?> .oxi__addons_seperator {
    display: inline-block;
    }
    <?php
}

if ($settings->separator_style !== 'line') {
    if ($settings->alignment === 'left') {
        ?>
        .fl-node-<?php echo $id; ?> .oxi__margin {
        margin-right: auto;
        }
        .fl-node-<?php echo $id; ?> .oxi__before {
        display: none;
        }
        .fl-node-<?php echo $id; ?> .oxi__after {
        width: 100%;
        }
        <?php
    } else if ($settings->alignment === 'right') {
        ?>
        .fl-node-<?php echo $id; ?> .oxi__margin {
        margin-left: auto;
        }
        .fl-node-<?php echo $id; ?> .oxi__after {
        display: none;
        }
        .fl-node-<?php echo $id; ?> .oxi__before {
        width: 100%;
        }
        <?php
    } else if ($settings->alignment === 'center') {
        ?>
        .fl-node-<?php echo $id; ?> .oxi__margin {
        margin-right: auto;
        margin-left: auto;
        }
        .fl-node-<?php echo $id; ?> .oxi__before {
        width: 50%;
        display: table-cell;
        }
        .fl-node-<?php echo $id; ?> .oxi__after {
        width: 50%;
        display: table-cell;
        }
        <?php
    }
    ?>
    @media only screen and (min-width : 669px) and (max-width : 993px){
    <?php
    if ($settings->alignment_medium === 'left') {
        ?>
        .fl-node-<?php echo $id; ?> .oxi__margin {
        margin-right: auto;
        margin-left: 0;
        }
        .fl-node-<?php echo $id; ?> .oxi__before {
        display: none;
        }
        .fl-node-<?php echo $id; ?> .oxi__after {
        width: 100%;
        }

        <?php
    } else if ($settings->alignment_medium === 'right') {
        ?>
        .fl-node-<?php echo $id; ?> .oxi__margin {
        margin-left: auto;
        margin-right: 0;
        }
        .fl-node-<?php echo $id; ?> .oxi__after {
        display: none;
        }
        .fl-node-<?php echo $id; ?> .oxi__before {
        width: 100%;
        }
        <?php
    } else if ($settings->alignment_medium === 'center') {
        ?>
        .fl-node-<?php echo $id; ?> .oxi__margin {
        margin-right: auto;
        margin-left: auto;
        }
        .fl-node-<?php echo $id; ?> .oxi__before {
        width: 50%;
        display: table-cell;
        }
        .fl-node-<?php echo $id; ?> .oxi__after {
        width: 50%;
        display: table-cell;
        }
        <?php
    }
    ?>
    }
    @media only screen and (max-width : 668px){
    <?php
    if ($settings->alignment_responsive === 'left') {
        ?>
        .fl-node-<?php echo $id; ?> .oxi__margin {
        margin-right: auto;
        margin-left: 0;
        }
        .fl-node-<?php echo $id; ?> .oxi__before {
        display: none;
        }
        .fl-node-<?php echo $id; ?> .oxi__after {
        width: 100%;
        }
        <?php
    } else if ($settings->alignment_responsive === 'right') {
        ?>
        .fl-node-<?php echo $id; ?> .oxi__margin {
        margin-left: auto;
        margin-right: 0;
        }
        .fl-node-<?php echo $id; ?> .oxi__after {
        display: none;
        }
        .fl-node-<?php echo $id; ?> .oxi__before {
        width: 100%;

        }
        <?php
    } else if ($settings->alignment_responsive === 'center') {
        ?>
        .fl-node-<?php echo $id; ?> .oxi__margin {
        margin-right: auto;
        margin-left: auto;
        }
        .fl-node-<?php echo $id; ?> .oxi__before {
        width: 50%;
        display: table-cell;
        }
        .fl-node-<?php echo $id; ?> .oxi__after {
        width: 50%;
        display: table-cell;
        }
        <?php
    }
    ?>
    }
    <?php
}
/**
 * style for icon 
 */
if ($settings->icon != '') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'font-size' => $settings->icon_size . 'px',
        'padding-left' => $settings->padding_left . 'px',
        'padding-right' => $settings->padding_right . 'px',
        'color' => $settings->separator_icon_color,
            ), '.fl-node-' . $id . ' .oxi__addons_image_icon_divider  .oxi__icon');
}
if ($settings->img_size != '') {

    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'width' => $settings->img_size . 'px',
            ), '.fl-node-' . $id . ' .oxi__addons_image_icon_divider');
}
if ($settings->responsive_img_size != '') {
    ?>
    @media only screen and (max-width : 668px){
    .fl-node-<?php echo $id; ?> .oxi__addons_image_icon_divider {
    width: <?php echo $settings->responsive_img_size; ?>px !important;
    }
    }
    <?php
}
/**
 * for responsive capabilitys
 */
if ($settings->responsive_compatibility != 'none') {
    ?>
    .fl-node-<?php echo $id ?> .oxi__line_text{
    display:block;
    }
    <?php
} else if ($settings->responsive_compatibility != 'mobile_device') {
    ?>
    @media only screen and (max-width : 668px){
    .fl-node-<?php echo $id ?> .oxi__line_text{
    display:none;
    }
    }
    <?php
} else if ($settings->responsive_compatibility != 'medium_device') {
    ?>
    @media only screen and ((max-width : 993px){
    .fl-node-<?php echo $id ?> .oxi__line_text{
    display:none;
    }
    }
    <?php
}
?>


<?php
if ($settings->add_footer_icon != '') {
    foreach ($settings->add_footer_icon as $value) {
        if ($value->link != '') {
            ?>   
            .fl-node-<?php echo $id; ?> .oxi__addons_footer_icon_area a{
            display: flex;
            align-items: center;
            justify-content: center;
            background: #<?php echo $value->icon_bg_color; ?>;
            font-size: <?php echo $value->icon_size; ?>px;
            width: 100%;
            max-width: <?php echo $value->icon_bg_size; ?>px;
            height: <?php echo $value->icon_bg_size; ?>px;
            color: #<?php echo $value->icon_color; ?>;
            border-width: <?php echo $value->icon_border_width; ?>px;
            border-style: <?php echo $value->icon_border_style; ?>;
            border-color: #<?php echo $value->icon_border_color; ?>;
            border-radius: <?php echo $value->icon_bg_border_radius; ?>px;
            margin: 5px;

            }


            <?php
        } else {
            ?>   
            .fl-node-<?php echo $id; ?> .oxi__addons_footer_icon_area .oxi_footer_info_icon{
            display: flex;
            align-items: center;
            justify-content: center;
            background: #<?php echo $value->icon_bg_color; ?>;
            font-size: <?php echo $value->icon_size; ?>px;
            width: 100%;
            max-width: <?php echo $value->icon_bg_size; ?>px;
            height: <?php echo $value->icon_bg_size; ?>px;
            color: #<?php echo $value->icon_color; ?>;
            border-width: <?php echo $value->icon_border_width; ?>px;
            border-style: <?php echo $value->icon_border_style; ?>;
            border-color: #<?php echo $value->icon_border_color; ?>;
            border-radius: <?php echo $value->icon_bg_border_radius; ?>px;
            margin: 5px;

            }  


            <?php
        }
    }
}

if($settings->icon_align === 'left'){
    $icontextalign = "justify-content:flex-start;";
}else if($settings->icon_align === 'center'){
    $icontextalign = "justify-content:center;";
}else{
    $icontextalign = "justify-content:flex-end;";
}
?>

.fl-node-<?php echo $id ?> .oxi__addons_footer_icon_area{
    display: flex;
    width: 100%;
    <?php echo $icontextalign; ?>
}
