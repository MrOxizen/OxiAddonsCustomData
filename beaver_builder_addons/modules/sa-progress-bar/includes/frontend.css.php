<?php

/**
 * start coding for fornend for dynamic style
 * @package shortcode addons
 */
 

SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'display' => 'flex',  
), '.fl-node-' . $id . ' .oxi_sa_main_wrapper');

if($settings->alignment == 'left'){
    SA_FLBUILDER_HELPER::sa_fl_general_style(array( 
        'justify-content' => 'flex-start', 
    ), '.fl-node-' . $id . ' .oxi_sa_main_wrapper');
}elseif($settings->alignment == 'right'){
    SA_FLBUILDER_HELPER::sa_fl_general_style(array( 
        'justify-content' => 'flex-end', 
    ), '.fl-node-' . $id . ' .oxi_sa_main_wrapper');
}elseif($settings->alignment == 'center'){
    SA_FLBUILDER_HELPER::sa_fl_general_style(array( 
        'justify-content' => 'center', 
    ), '.fl-node-' . $id . ' .oxi_sa_main_wrapper');
}


// Typography Sub heading 
SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'font_typo', '.fl-node-' . $id . ' .oxi__sa_progress_title');
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'color' => $settings->title_color, 
), '.fl-node-' . $id . ' .oxi__sa_progress_title');
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('title', $settings, 'padding', '.fl-node-' . $id . ' .oxi__sa_progress_title', 'px');
// for parcentace value
SA_FLBUILDER_HELPER::sa_fl_typography_setting($settings, 'count_typo', '.fl-node-' . $id . ' .oxi__sa_progress_percentage');
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'color' => $settings->count_color, 
), '.fl-node-' . $id . ' .oxi__sa_progress_percentage');
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('count', $settings, 'padding', '.fl-node-' . $id . ' .oxi__sa_progress_percentage', 'px');


if($settings->layout == 'line'){ 
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'width' => $settings->width ? $settings->width.'%' : '80%',
    ), '.fl-node-' . $id . ' .oxi__sa_progress_bar_main');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array( 
        'height' => $settings->height ? $settings->height.'px' : '20px',
    ), '.fl-node-' . $id . ' .oxi__sa_progress_bar');
    SA_FLBUILDER_HELPER::sa_fl_custom_border_radius('background', $settings, '.fl-node-' . $id . ' .oxi__sa_progress_bar', 'true');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array( 
        'height' => $settings->fill_height ? $settings->fill_height.'px' : '10px',
    ), '.fl-node-' . $id . ' .oxi__sa_progress_line');

    if ($settings->background_type == 'color') {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'background-color' => $settings->fill_background_color,
        ), '.fl-node-' . $id . ' .oxi__sa_progress_line');
    } elseif ($settings->background_type == 'gradient') {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'background' => FLBuilderColor::gradient($settings->gradient),
        ), '.fl-node-' . $id . ' .oxi__sa_progress_line');
    }
    SA_FLBUILDER_HELPER::sa_fl_custom_border_radius('fill', $settings, '.fl-node-' . $id . ' .oxi__sa_progress_line', 'true');
    if($settings->show_stripe == 'true'){
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'background-image' => '-webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent)',
            'background-image' => '-o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent)',
            'background-image' => 'linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent)',
            'background-size' => '40px 40px',
            '-webkit-animation' => 'progress-bar-stripes 2s linear infinite',
        ), '.fl-node-' . $id . ' .oxi__sa_progress_line'); 
        if($settings->stripe_animation == 'left'){
            SA_FLBUILDER_HELPER::sa_fl_general_style(array( 
                '-webkit-animation' => 'progress-bar-stripes-left 2s linear infinite',
                '-o-animation' => 'progress-bar-stripes-left 2s linear infinite',
                'animation' => 'progress-bar-stripes-left 2s linear infinite',
            ), '.fl-node-' . $id . ' .oxi__sa_progress_line'); 
        }elseif($settings->stripe_animation == 'right'){
            SA_FLBUILDER_HELPER::sa_fl_general_style(array( 
                '-webkit-animation' => 'progress-bar-stripes-right 2s linear infinite',
                '-o-animation' => 'progress-bar-stripes-right 2s linear infinite',
                'animation' => 'progress-bar-stripes-right 2s linear infinite',
            ), '.fl-node-' . $id . ' .oxi__sa_progress_line'); 
        }
    }
 }elseif($settings->layout == 'circle'){
    SA_FLBUILDER_HELPER::sa_fl_general_style(array( 
        'text-align' => 'center', 
    ), '.fl-node-' . $id . ' .oxi__sa_progress_title'); 
    
 }