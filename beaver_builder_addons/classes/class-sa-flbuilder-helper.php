 
<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('SA_flbuilder_helper')) {
    /**
     * This class initializes BB Ultiamte Addon Helper
     *
     * @class BB_Ultimate_Addon_Helper
     */
    class SA_flbuilder_helper
    {

        /**
         * for render box shadow fl builder
         */
        public static function sa_fl_custom_box_shadow($setting)
        {
            $box =  FLBuilderColor::shadow($setting);
            echo 'border-radius:' . $box . '; ';
        }
        /**
         * for render padding, margin and border-raidus at once function call;
         */
        public static function sa_fl_custom_padding_margin(string $type, $settings, string $media = '')
        {
            $padding = [];
            $border_radius = [];
            $margin = [];
            foreach ($settings as $key => $data) {
                if ($type != '') {
                    if (preg_match('/(padding)/', $key)) {
                        if ($media != '') {
                            if (mb_strpos($key, $media) !== false) {
                                if ($type != 'top' && $type != 'right' && $type != 'bottom' && $type != 'left') {
                                    if (mb_strpos($key, $type) !== false) {
                                        $padding[$key] = $data;
                                    }
                                }
                            }
                        } else {
                            if ($type != 'top' && $type != 'right' && $type != 'bottom' && $type != 'left') {
                                if (!preg_match('/(responsive)/', $key) && !preg_match('/(medium)/', $key)) {
                                    $padding[$key] = $data;
                                }
                            }
                        }
                    }
                    if (preg_match('/(radius)/', $key)) {
                        if ($media != '') {
                            if ($key == 'radius') {
                                $border_radius[$key] = $data;
                            } else {
                                if (mb_strpos($key, $media) !== false) {
                                    if ($type != 'top' && $type != 'right' && $type != 'bottom' && $type != 'left') {
                                        if (mb_strpos($key, $type) !== false) {
                                            $border_radius[$key] = $data;
                                        }
                                    }
                                }
                            }
                        } else {
                            if ($type != 'top' && $type != 'right' && $type != 'bottom' && $type != 'left') {
                                if (!preg_match('/(responsive)/', $key) && !preg_match('/(medium)/', $key)) {
                                    $border_radius[$key] = $data;
                                }
                            }
                        }
                    }
                    if (preg_match('/(margin)/', $key)) {
                        if ($media != '') {
                            if (mb_strpos($key, $media) !== false) {
                                if ($type != 'top' && $type != 'right' && $type != 'bottom' && $type != 'left') {
                                    if (mb_strpos($key, $type) !== false) {
                                        $margin[$key] = $data;
                                    }
                                }
                            }
                        } else {
                            if ($type != 'top' && $type != 'right' && $type != 'bottom' && $type != 'left') {
                                if (!preg_match('/(responsive)/', $key) && !preg_match('/(medium)/', $key)) {
                                    if (mb_strpos($key, $type) !== false) {
                                        $margin[$key] = $data;
                                    }
                                }
                            }
                        }
                    }
                }
            }

            if (is_array($padding) && !empty($padding)) {
                self::padding_setting($padding, $type, $media);
            }
            if (is_array($margin) && !empty($margin)) {
                self::margin_setting($margin, $type, $media);
            }
            if (is_array($border_radius) && !empty($border_radius)) {
                self::border_radius_setting($border_radius, $type, $media);
            }
        }

        private static function padding_setting(array $padding, string $type, string $media)
        {
            $keys = array_keys($padding);
            $string_array = json_encode($keys);
            $explode = explode('_', $string_array)[0];
            $key_type  = explode('"', $explode)[1];
            if ($key_type === $type) {
                if ($media == '') {
                    if (is_array($padding) && !empty($padding)) {
                        echo ('' != $padding['' . $type . '_padding_top']) ? 'padding-top:' . $padding['' . $type . '_padding_top'] . 'px;' : '';
                        echo ('' != $padding['' . $type . '_padding_right']) ? 'padding-right:' . $padding['' . $type . '_padding_right'] . 'px;' : '';
                        echo ('' != $padding['' . $type . '_padding_bottom']) ? 'padding-bottom:' . $padding['' . $type . '_padding_bottom'] . 'px;' : '';
                        echo ('' != $padding['' . $type . '_padding_left']) ? 'padding-left:' . $padding['' . $type . '_padding_left'] . 'px;' : '';
                    }
                } else {
                    if (is_array($padding) && !empty($padding)) {
                        echo ('' != $padding['' . $type . '_padding_top_' . $media . '']) ? 'padding-top:' . $padding['' . $type . '_padding_top_' . $media . ''] . 'px;' : '';
                        echo ('' != $padding['' . $type . '_padding_right_' . $media . '']) ? 'padding-right:' . $padding['' . $type . '_padding_right_' . $media . ''] . 'px;' : '';
                        echo ('' != $padding['' . $type . '_padding_bottom_' . $media . '']) ? 'padding-bottom:' . $padding['' . $type . '_padding_bottom_' . $media . ''] . 'px;' : '';
                        echo ('' != $padding['' . $type . '_padding_left_' . $media . '']) ? 'padding-left:' . $padding['' . $type . '_padding_left_' . $media . ''] . 'px;' : '';
                    }
                }
            }
        }
        private static function border_radius_setting(array $border_radius, string $type, string $media)
        {
            if (count($border_radius) == count($border_radius, COUNT_RECURSIVE)) {
                $keys = array_keys($border_radius);
                $string_array = json_encode($keys);
                $explode = explode('_', $string_array)[0];
                $key_type  = explode('"', $explode)[1];
                if ($key_type === $type) {
                    if ($media == '') {
                        if (is_array($border_radius) && !empty($border_radius)) {
                            echo ('' != $border_radius['' . $type . '_border_radius_top']) ? ' border-top-left-radius:' . $border_radius['' . $type . '_border_radius_top'] . 'px;' : '';
                            echo ('' != $border_radius['' . $type . '_border_radius_right']) ? ' border-top-right-radius:' . $border_radius['' . $type . '_border_radius_right'] . 'px;' : '';
                            echo ('' != $border_radius['' . $type . '_border_radius_bottom']) ? ' border-bottom-right-radius:' . $border_radius['' . $type . '_border_radius_bottom'] . 'px;' : '';
                            echo ('' != $border_radius['' . $type . '_border_radius_left']) ? ' border-bottom-left-radius:' . $border_radius['' . $type . '_border_radius_left'] . 'px;' : '';
                        }
                    } else {
                        if (is_array($border_radius) && !empty($border_radius)) {
                            echo ('' != $border_radius['' . $type . '_border_radius_top_' . $media . ' ']) ? 'border-top-left-radius:' . $border_radius['' . $type . ' _border_radius_top_' . $media . ''] . ' px;' : '';
                            echo ('' != $border_radius['' . $type . '_border_radius_right_' . $media . ' ']) ? 'border-top-right-radius: ' . $border_radius['' . $type . '_border_radius_right_ ' . $media . ''] . ' px;' : '';
                            echo ('' != $border_radius['' . $type . '_border_radius_bottom_' . $media . ' ']) ? 'border-bottom-right-radius: ' . $border_radius['' . $type . '_border_radius_bottom_' . $media . ''] . ' px;' : '';
                            echo ('' != $border_radius['' . $type . '_border_radius_left_' . $media . ' ']) ? 'border-bottom-left-radius: ' . $border_radius['' . $type . '_border_radius_left_' . $media . ''] . ' px; ' : '';
                        }
                    }
                }
            } else {
                if (is_array($border_radius) && !empty($border_radius)) {
                    echo ('' != $border_radius['radius']['top_left']) ? 'border-top-left-radius:' . $border_radius['radius']['top_left'] . 'px;' : ' ';
                    echo ('' != $border_radius['radius']['top_right']) ? 'border-top-right-radius:' . $border_radius['radius']['top_right'] . 'px;' : ' ';
                    echo ('' != $border_radius['radius']['bottom_left']) ? 'border-bottom-right-radius:' . $border_radius['radius']['bottom_left'] . 'px;' : ' ';
                    echo ('' != $border_radius['radius']['bottom_right']) ? 'border-bottom-left-radius:' . $border_radius['radius']['bottom_right'] . 'px;' : ' ';
                }
            }
        }

        private static function margin_setting(array $margin, string $type, string $media)
        {
            $keys = array_keys($margin);
            $string_array = json_encode($keys);
            $explode = explode('_', $string_array)[0];
            $key_type  = explode('"', $explode)[1];
            if ($key_type === $type) {
                if ($media == '') {
                    if (is_array($margin) && !empty($margin)) {
                        echo ('' != $margin['' . $type . '_margin_top']) ? 'margin-top:' . $margin['' . $type . '_margin_top'] . 'px;' : '';
                        echo ('' != $margin['' . $type . '_margin_right']) ? 'margin-right:' . $margin['' . $type . '_margin_right'] . 'px;' : '';
                        echo ('' != $margin['' . $type . '_margin_bottom']) ? 'margin-bottom:' . $margin['' . $type . '_margin_bottom'] . 'px;' : '';
                        echo ('' != $margin['' . $type . '_margin_left']) ? 'margin-left:' . $margin['' . $type . '_margin_left'] . 'px;' : '';
                    }
                } else {
                    if (is_array($margin) && !empty($margin)) {
                        echo ('' != $margin['' . $type . '_margin_top_' . $media . '']) ? 'margin-top:' . $margin['' . $type . '_margin_top_' . $media . ''] . 'px;' : '';
                        echo ('' != $margin['' . $type . '_margin_right_' . $media . '']) ? 'margin-right:' . $margin['' . $type . '_margin_right_' . $media . ''] . 'px;' : '';
                        echo ('' != $margin['' . $type . '_margin_bottom_' . $media . '']) ? 'margin-bottom:' . $margin['' . $type . '_margin_bottom_' . $media . ''] . 'px;' : '';
                        echo ('' != $margin['' . $type . '_margin_left_' . $media . '']) ? 'margin-left:' . $margin['' . $type . '_margin_left_' . $media . ''] . 'px;' : '';
                    }
                }
            }
        }
        /**
         * sa fl builder custom border package
         */
        public static function sa_fl_border_package($settings, $setting_name, $selector)
        {
            FLBuilderCSS::border_field_rule(array(
                'settings'     => $settings,
                'setting_name'     => $setting_name,
                'selector'     => $selector,
            ));
        }
        /**
         * sa fl builder Padding margin border radisu all
         */
        public static function sa_fl_dimension_utility($prefix, $settings, $setting_name, $selector, $unit)
        {
            if ($setting_name == 'padding') {
                $props = array(
                    'padding-top'      => '' . $prefix . '_' . $setting_name . '_top',
                    'padding-right'  => '' . $prefix . '_' . $setting_name . '_right',
                    'padding-bottom' => '' . $prefix . '_' . $setting_name . '_bottom',
                    'padding-left'      => '' . $prefix . '_' . $setting_name . '_left',
                );
            } elseif ($setting_name == 'margin') {
                $props = array(
                    'margin-top'      => '' . $prefix . '_' . $setting_name . '_top',
                    'margin-right'  => '' . $prefix . '_' . $setting_name . '_right',
                    'margin-bottom' => '' . $prefix . '_' . $setting_name . '_bottom',
                    'margin-left'      => '' . $prefix . '_' . $setting_name . '_left',
                );
            }
            FLBuilderCSS::dimension_field_rule(array(
                'settings'    => $settings,
                'setting_name'     => $setting_name,
                'selector'     => $selector,
                'unit'        => $unit,
                'props'        => $props
            ));
        }
    }
}
new SA_flbuilder_helper();
