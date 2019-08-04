<?php

/**
 * start coding for fornend for dynamic style
 * @package shortcode addons
 */
SA_FLBUILDER_HELPER::sa_fl_responsive_setting('text-align', $settings, 'icon_alignment', '.fl-node-' . $id . ' .oxi__addons_icon_wrapper');
SA_FLBUILDER_HELPER::sa_fl_dimension_utility('icon', $settings, 'margin', '.fl-node-' . $id . ' .oxi__addons_icon', 'px');
SA_FLBUILDER_HELPER::sa_fl_general_style(array(
    'font-size' =>  $settings->icon_size ? $settings->icon_size . 'px' : '50px',
    'color' =>  $settings->icon_color ? $settings->icon_color : 'fff',
    'line-height' =>  $settings->icon_bg_size ? $settings->icon_bg_size . 'px' : '100px',
    'display' =>  'flex',
    'justify-content' =>  'center',
    'align-items' =>  'center',
), '.fl-node-' . $id . ' .oxi__addons_main_wrapper .oxi__icons');

if ($settings->effects == 'style1') {
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'max-width' =>  $settings->icon_bg_size ? $settings->icon_bg_size . 'px' : '100px',
        'height' =>  $settings->icon_bg_size ? $settings->icon_bg_size . 'px' : '100px',
        'background-color' => $settings->icon_bg_color ? $settings->icon_bg_color : 'ff44dd',
        'border-radius' =>  $settings->icon_bg_size ? $settings->icon_bg_size / 2 . 'px' : '50px',
    ), '.fl-node-' . $id . ' .oxi__addons_icon');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'top' =>  '-5px',
        'left' =>  '-5px',
        'padding' =>  '5px',
        'box-shadow' =>  '0 0 0 ' . $settings->icon_hover_border_width . 'px  #' . $settings->icon_hover_border_color  . '',
        '-webkit-transition' =>  '-webkit-transform 0.2s, opacity 0.2s',
        '-webkit-transform' =>  'scale(.8)',
        '-moz-transition' =>  '-moz-transform 0.2s, opacity 0.2s',
        '-moz-transform' =>  'scale(.8)',
        '-ms-transform' =>  'transform 0.2s, opacity 0.2s',
        'opacity' =>  '0',
    ), '.fl-node-' . $id . ' .oxi__addons_icon::after');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        '-webkit-transform' =>  'scale(1)',
        '-moz-transform' =>  'scale(1)',
        '-ms-transform' =>  'scale(1)',
        'transform' =>  'scale(1)',
        'opacity' =>  '1',
    ), '.fl-node-' . $id . ' .oxi__addons_icon:hover::after');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'background-color' => $settings->icon_hover_bg_color ? $settings->icon_hover_bg_color : '713065',
    ), '.fl-node-' . $id . ' .oxi__addons_icon:hover');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'color' =>  $settings->icon_hover_color ? $settings->icon_hover_color : 'ffff',
    ), '.fl-node-' . $id . ' .oxi__addons_icon:hover .oxi__icons');
    if ($settings->zoom_style != 'in') {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'transform' =>  'scale(.8)',
        ), '.fl-node-' . $id . ' .oxi__addons_icon::after');
    } else {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'transform' =>  'scale(1.2)',
        ), '.fl-node-' . $id . ' .oxi__addons_icon::after');
    }
} elseif ($settings->effects == 'style2') { // START CODING FOR STYLE TWO
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'box-shadow' =>  '0 0 0 5px #323232',
    ), '.fl-node-' . $id . ' .oxi__addons_icon');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'max-width' =>  $settings->icon_bg_size ? $settings->icon_bg_size . 'px' : '100px',
        'height' =>  $settings->icon_bg_size ? $settings->icon_bg_size . 'px' : '100px',
        'border-radius' =>  $settings->icon_bg_size ? $settings->icon_bg_size / 2 . 'px' : '50px',
        'box-shadow' =>  '0 0 0 ' . $settings->icon_hover_border_width . 'px  #' . $settings->icon_hover_border_color  . '',
        'z-index' =>  '1',
    ), '.fl-node-' . $id . ' .oxi__addons_icon');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'top' =>  '-5px',
        'left' =>  '-5px',
        'padding' =>  '5px',
        'background-color' => $settings->icon_bg_color ? $settings->icon_bg_color : '3659ac',
        '-webkit-transition' =>  'all 0.4s',
        '-moz-transition' =>  'all 0.4s',
        '-ms-transform' =>  'all 0.4s',
        'z-index' => '-1',
        'box-shadow' => 'none'
    ), '.fl-node-' . $id . ' .oxi__addons_icon::after');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'max-width' =>  $settings->icon_bg_size ? $settings->icon_bg_size . 'px' : '100px',
        'width' =>  '100%',
        'height' =>  $settings->icon_bg_size ? $settings->icon_bg_size . 'px' : '100px',
        'border-radius' =>  $settings->icon_bg_size ? $settings->icon_bg_size / 2 . 'px' : '50px',
        'box-shadow' =>  '0 0 0 ' . $settings->icon_hover_border_width . 'px  #' . $settings->icon_hover_border_color  . '',
    ), '.fl-node-' . $id . ' .oxi__addons_icon:hover');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'color' =>  $settings->icon_hover_color ? $settings->icon_hover_color : '323232',
    ), '.fl-node-' . $id . ' .oxi__addons_icon:hover .oxi__icons');
    if ($settings->zoom_style != 'in') {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            '-webkit-transform' =>  'scale(1.3)',
            '-moz-transform' =>  'scale(1.3)',
            '-ms-transform' =>  'scale(1.3)',
            'transform' =>  'scale(1.3)',
            'opacity' =>  '0',
        ), '.fl-node-' . $id . ' .oxi__addons_icon:hover::after');
    } else {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            '-webkit-transform' =>  'scale(0)',
            '-moz-transform' =>  'scale(0)',
            '-ms-transform' =>  'scale(0)',
            'transform' =>  'scale(0)',
        ), '.fl-node-' . $id . ' .oxi__addons_icon:hover::after');
    }
} elseif ($settings->effects == 'style3') { // START CODING FOR STYLE TWO
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'box-shadow' =>  '0 0 0 5px #323232',
    ), '.fl-node-' . $id . ' .oxi__addons_icon');

    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'max-width' =>  $settings->icon_bg_size ? $settings->icon_bg_size . 'px' : '100px',
        'height' =>  $settings->icon_bg_size ? $settings->icon_bg_size . 'px' : '100px',
        'border-radius' =>  $settings->icon_bg_size ? $settings->icon_bg_size / 2 . 'px' : '50px',
        'box-shadow' =>  '0 0 0 ' . $settings->icon_hover_border_width . 'px  #' . $settings->icon_hover_border_color  . '',
        'z-index' =>  '1',
    ), '.fl-node-' . $id . ' .oxi__addons_icon');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'top' =>  '-5px',
        'left' =>  '-5px',
        'padding' =>  '5px',
        'background-color' => $settings->icon_bg_color ? $settings->icon_bg_color : '3659ac',
        '-webkit-transition' =>  'all 0.4s',
        '-moz-transition' =>  'all 0.4s',
        '-ms-transform' =>  'all 0.4s',
        'z-index' => '-1',
        'box-shadow' => 'none',
        '-webkit-transform' =>  'scale(1.3)',
        '-moz-transform' =>  'scale(1.3)',
        '-ms-transform' =>  'scale(1.3)',
        'transform' =>  'scale(1.3)',
        'opacity' =>  '0',
    ), '.fl-node-' . $id . ' .oxi__addons_icon::after');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'max-width' =>  $settings->icon_bg_size ? $settings->icon_bg_size . 'px' : '100px',
        'width' =>  '100%',
        'height' =>  $settings->icon_bg_size ? $settings->icon_bg_size . 'px' : '100px',
        'border-radius' =>  $settings->icon_bg_size ? $settings->icon_bg_size / 2 . 'px' : '50px',
        'box-shadow' =>  '0 0 0 ' . $settings->icon_hover_border_width . 'px  #' . $settings->icon_hover_border_color  . '',
    ), '.fl-node-' . $id . ' .oxi__addons_icon:hover');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'color' =>  $settings->icon_hover_color ? $settings->icon_hover_color : 'fff',
    ), '.fl-node-' . $id . ' .oxi__addons_icon:hover .oxi__icons');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        '-webkit-transform' =>  'scale(1)',
        '-moz-transform' =>  'scale(1)',
        '-ms-transform' =>  'scale(1)',
        'transform' =>  'scale(1)',
        'opacity' =>  '1',
    ), '.fl-node-' . $id . ' .oxi__addons_icon:hover::after');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'color' =>  '3659ac',
    ), '.fl-node-' . $id . ' .oxi__addons_icon .oxi__icons');
} elseif ($settings->effects == 'style4') { // START CODING FOR STYLE three
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'box-shadow' =>  '0 0 0 5px #ff5722',
    ), '.fl-node-' . $id . ' .oxi__addons_icon');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'box-shadow' =>  '0 0 0 8px #bf360c',
    ), '.fl-node-' . $id . ' .oxi__addons_icon:hover');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'display' =>  'none',
    ), '.fl-node-' . $id . ' .oxi__addons_icon::after');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'overflow' => 'hidden',
        'max-width' =>  $settings->icon_bg_size ? $settings->icon_bg_size . 'px' : '100px',
        'height' =>  $settings->icon_bg_size ? $settings->icon_bg_size . 'px' : '100px',
        'border-radius' =>  $settings->icon_bg_size ? $settings->icon_bg_size / 2 . 'px' : '50px',
        'box-shadow' =>  '0 0 0 ' . $settings->icon_border_width . 'px  #' . $settings->icon_hover_border_color  . '',
        'z-index' =>  '1',
        '-webkit-transition' =>  'all 0.4s',
        '-moz-transition' =>  'all 0.4s',
        '-ms-transform' =>  'all 0.4s',
    ), '.fl-node-' . $id . ' .oxi__addons_icon');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        '-webkit-transition' =>  'all 0.4s',
        '-moz-transition' =>  'all 0.4s',
        '-ms-transform' =>  'all 0.4s',
    ), '.fl-node-' . $id . ' .oxi__icons');

    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'max-width' =>  $settings->icon_bg_size ? $settings->icon_bg_size . 'px' : '100px',
        'width' =>  '100%',
        'height' =>  $settings->icon_bg_size ? $settings->icon_bg_size . 'px' : '100px',
        'border-radius' =>  $settings->icon_bg_size ? $settings->icon_bg_size / 2 . 'px' : '50px',
        'box-shadow' =>  '0 0 0 ' . $settings->icon_hover_border_width . 'px  #' . $settings->icon_hover_border_color  . '',
        'background-color' => $settings->icon_bg_color ? $settings->icon_bg_color : 'ff5722',
    ), '.fl-node-' . $id . ' .oxi__addons_icon:hover');

    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'color' =>  'ff5722',
    ), '.fl-node-' . $id . ' .oxi__addons_icon .oxi__icons');

    if ($settings->effect_position == 'left_to_right') {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'color' =>  $settings->icon_hover_color ? $settings->icon_hover_color : 'fff',
            '-webkit-animation' =>  'toRightFromLeft 0.3s forwards',
            '-moz-animation' =>  'toRightFromLeft 0.3s forwards',
            'animation' =>  'toRightFromLeft 0.3s forwards',
        ), '.fl-node-' . $id . ' .oxi__addons_icon:hover .oxi__icons');
        ?>
        @keyframes toRightFromLeft {
        49% {
        -webkit-transform: translateX(100%);
        }
        50% {
        opacity: 0;
        -webkit-transform: translateX(-100%);
        }
        51% {
        opacity: 1;
        }
        }
    <?php
    } elseif ($settings->effect_position == 'right_to_left') {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'color' =>  $settings->icon_hover_color ? $settings->icon_hover_color : 'fff',
            '-webkit-animation' =>  'toLeftFromRight 0.3s forwards',
            '-moz-animation' =>  'toLeftFromRight 0.3s forwards',
            'animation' =>  'toLeftFromRight 0.3s forwards',
        ), '.fl-node-' . $id . ' .oxi__addons_icon:hover .oxi__icons');
        ?>
        @keyframes toLeftFromRight {
        49% {
        -webkit-transform: translateX(-100%);
        }
        50% {
        opacity: 0;
        -webkit-transform: translateX(100%);
        }
        51% {
        opacity: 1;
        }
        }
    <?php
    } elseif ($settings->effect_position == 'top_to_bottom') {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'color' =>  $settings->icon_hover_color ? $settings->icon_hover_color : 'fff',
            '-webkit-animation' =>  'toTopFromBottom 0.3s forwards',
            '-moz-animation' =>  'toTopFromBottom 0.3s forwards',
            'animation' =>  'toTopFromBottom 0.3s forwards',
        ), '.fl-node-' . $id . ' .oxi__addons_icon:hover .oxi__icons');
        ?>
        @keyframes toTopFromBottom {
        49% {
        -webkit-transform: translateY(100%);
        }
        50% {
        opacity: 0;
        -webkit-transform: translateY(-100%);
        }
        51% {
        opacity: 1;
        }
        }
    <?php
    } elseif ($settings->effect_position == 'bottom_to_top') {
        SA_FLBUILDER_HELPER::sa_fl_general_style(array(
            'color' =>  $settings->icon_hover_color ? $settings->icon_hover_color : 'fff',
            '-webkit-animation' =>  'toBottomToLeft 0.3s forwards',
            '-moz-animation' =>  'toBottomToLeft 0.3s forwards',
            'animation' =>  'toBottomToLeft 0.3s forwards',
        ), '.fl-node-' . $id . ' .oxi__addons_icon:hover .oxi__icons');
        ?>
        @keyframes toBottomToLeft {
        49% {
        -webkit-transform: translateY(-100%);
        }
        50% {
        opacity: 0;
        -webkit-transform: translateY(100%);
        }
        51% {
        opacity: 1;
        }
        }
    <?php
    }
} elseif ($settings->effects == 'style5') { // START CODING FOR STYLE Four
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'box-shadow' =>  '0 0 0 5px #ff5722',
    ), '.fl-node-' . $id . ' .oxi__addons_icon');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'box-shadow' =>  '0 0 0 8px #bf360c',
    ), '.fl-node-' . $id . ' .oxi__addons_icon:hover');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'display' =>  'none',
    ), '.fl-node-' . $id . ' .oxi__addons_icon::after');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'overflow' => 'hidden',
        'max-width' =>  $settings->icon_bg_size ? $settings->icon_bg_size . 'px' : '100px',
        'height' =>  $settings->icon_bg_size ? $settings->icon_bg_size . 'px' : '100px',
        'border-radius' =>  $settings->icon_bg_size ? $settings->icon_bg_size / 2 . 'px' : '50px',
        'box-shadow' =>  '0 0 0 ' . $settings->icon_border_width . 'px  #' . $settings->icon_hover_border_color  . '',
        'z-index' =>  '1',
        '-webkit-transition' =>  'all 0.4s',
        '-moz-transition' =>  'all 0.4s',
        '-ms-transform' =>  'all 0.4s',
    ), '.fl-node-' . $id . ' .oxi__addons_icon');
    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        '-webkit-transition' =>  'all 0.4s',
        '-moz-transition' =>  'all 0.4s',
        '-ms-transform' =>  'all 0.4s',
    ), '.fl-node-' . $id . ' .oxi__icons');

    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'max-width' =>  $settings->icon_bg_size ? $settings->icon_bg_size . 'px' : '100px',
        'width' =>  '100%',
        'height' =>  $settings->icon_bg_size ? $settings->icon_bg_size . 'px' : '100px',
        'border-radius' =>  $settings->icon_bg_size ? $settings->icon_bg_size / 2 . 'px' : '50px',
        'box-shadow' =>  '0 0 0 ' . $settings->icon_hover_border_width . 'px  #' . $settings->icon_hover_border_color  . '',
        'background-color' => $settings->icon_bg_color ? $settings->icon_bg_color : 'ff5722',
    ), '.fl-node-' . $id . ' .oxi__addons_icon:hover');

    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'color' =>  'ff5722',
    ), '.fl-node-' . $id . ' .oxi__addons_icon .oxi__icons');

    SA_FLBUILDER_HELPER::sa_fl_general_style(array(
        'color' =>  $settings->icon_hover_color ? $settings->icon_hover_color : 'fff',
        '-webkit-animation' =>  'spinAround 2s linear infinite',
        '-moz-animation' =>  'spinAround 2s linear infinite',
        'animation' =>  'spinAround 2s linear infinite',
    ), '.fl-node-' . $id . ' .oxi__addons_icon:hover .oxi__icons');
    ?>
    @-webkit-keyframes spinAround {
    from {
    -webkit-transform: rotate(0deg)
    }
    to {
    -webkit-transform: rotate(360deg);
    }
    }
    @-moz-keyframes spinAround {
    from {
    -moz-transform: rotate(0deg)
    }
    to {
    -moz-transform: rotate(360deg);
    }
    }
    @keyframes spinAround {
    from {
    transform: rotate(0deg)
    }
    to {
    transform: rotate(360deg);
    }
    }
<?php
}
