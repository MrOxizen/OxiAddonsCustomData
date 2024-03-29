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
// heading Middle add typography, padding, color, setting
SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'font_middle_typo', '.fl-node-' . $id . ' .oxi__addons_heading_middle');
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'color' => $settings->title_middle_color,
), '.fl-node-' . $id . ' .oxi__addons_heading_middle');
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('heading_middle', $settings, 'padding', '.fl-node-' . $id . ' .oxi__addons_heading_middle', 'px');

// heading bottom add typography, padding, color, setting
SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'font_bottom_typo', '.fl-node-' . $id . ' .oxi__addons_heading_bottom');
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'color' => $settings->title_bottom_color,
), '.fl-node-' . $id . ' .oxi__addons_heading_bottom');
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('heading_bottom', $settings, 'padding', '.fl-node-' . $id . ' .oxi__addons_heading_bottom', 'px');


SA_FLBUILDER_HELPER::sa_fl_responsive_setting('text-align', $settings, 'alignment', '.fl-node-' . $id . ' .oxi__addons_line_divider_tab');

if ($settings->separator_style != 'none') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'border-top-width' => $settings->separator_line_height . 'px',
        'border-top-style' => $settings->separator_line_style,
        'border-top-color' => $settings->separator_line_color,
    ), '.fl-node-' . $id . ' .oxi__addons_seperator_span');

    SA_FLBUILDER_HELPER::sa_fl_responsive_setting('width', $settings, 'separator_line_width', '.fl-node-' . $id . ' .oxi__addons_seperator_width_tab');
}
if ($settings->separator_style === 'line') {
    ?>
.fl-node-<?php echo $id; ?> .oxi__addons_seperator_width_tab {
width: <?php echo $settings->separator_line_width; ?>%;
}
.fl-node-<?php echo $id; ?> .oxi__addons_line_divider_tab {
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
