<?php

final class SA_FLBUILDER_HELPER
{
    use \SA_FLBUILDER_ADDONS\Helper\Public_Helper;
    /**
     * for render box shadow fl builder
     */
    public static function sa_fl_custom_box_shadow($setting)
    {
        $box = FLBuilderColor::shadow($setting);
        echo 'box-shadow:' . $box . '; ';
    }

    /**
     * for render padding, margin and border-raidus at once function call;
     */
    public static function sa_fl_custom_border_radius(string $prefix, $settings, $selector, string $media = '')
    {
        $border_radius = [];
        foreach ($settings as $key => $data) {
            if ($prefix != '') {
                if (preg_match('/(radius)/', $key)) {
                    if ($prefix != 'top' && $prefix != 'right' && $prefix != 'bottom' && $prefix != 'left') {
                        if (mb_strpos($key, $prefix) !== false) {
                            $border_radius[$key] = $data;
                        }
                    }
                }
            }
        }
        if (is_array($border_radius) && !empty($border_radius)) {
            self::border_radius_setting($border_radius, $prefix, $selector, $media);
        }
    }


    private static function border_radius_setting(array $border_radius, string $prefix, $selector, string $media)
    {
        ?>
        <?php echo $selector; ?>{
        <?php
        if (is_array($border_radius) && !empty($border_radius)) {
            echo ('' != $border_radius['' . $prefix . '_border_radius_top']) ? ' border-top-left-radius:' . $border_radius['' . $prefix . '_border_radius_top'] . 'px;' : '';
            echo ('' != $border_radius['' . $prefix . '_border_radius_right']) ? ' border-top-right-radius:' . $border_radius['' . $prefix . '_border_radius_right'] . 'px;' : '';
            echo ('' != $border_radius['' . $prefix . '_border_radius_bottom']) ? ' border-bottom-right-radius:' . $border_radius['' . $prefix . '_border_radius_bottom'] . 'px;' : '';
            echo ('' != $border_radius['' . $prefix . '_border_radius_left']) ? ' border-bottom-left-radius:' . $border_radius['' . $prefix . '_border_radius_left'] . 'px;' : '';
        }
        ?>
        }
        @media only screen and (min-width : 669px) and (max-width : 993px){
        <?php echo $selector; ?>{
        <?php
        if (is_array($border_radius) && !empty($border_radius)) {
            echo ('' != $border_radius['' . $prefix . '_border_radius_top_medium']) ? ' border-top-left-radius:' . $border_radius['' . $prefix . '_border_radius_top_medium'] . 'px;' : '';
            echo ('' != $border_radius['' . $prefix . '_border_radius_right_medium']) ? ' border-top-right-radius:' . $border_radius['' . $prefix . '_border_radius_right_medium'] . 'px;' : '';
            echo ('' != $border_radius['' . $prefix . '_border_radius_bottom_medium']) ? ' border-bottom-right-radius:' . $border_radius['' . $prefix . '_border_radius_bottom_medium'] . 'px;' : '';
            echo ('' != $border_radius['' . $prefix . '_border_radius_left_medium']) ? ' border-bottom-left-radius:' . $border_radius['' . $prefix . '_border_radius_left_medium'] . 'px;' : '';
        }
        ?>
        }
        }
        @media only screen and (max-width : 668px){
        <?php echo $selector; ?>{
        <?php
        if (is_array($border_radius) && !empty($border_radius)) {
            echo ('' != $border_radius['' . $prefix . '_border_radius_top_responsive']) ? ' border-top-left-radius:' . $border_radius['' . $prefix . '_border_radius_top_responsive'] . 'px;' : '';
            echo ('' != $border_radius['' . $prefix . '_border_radius_right_responsive']) ? ' border-top-right-radius:' . $border_radius['' . $prefix . '_border_radius_right_responsive'] . 'px;' : '';
            echo ('' != $border_radius['' . $prefix . '_border_radius_bottom_responsive']) ? ' border-bottom-right-radius:' . $border_radius['' . $prefix . '_border_radius_bottom_responsive'] . 'px;' : '';
            echo ('' != $border_radius['' . $prefix . '_border_radius_left_responsive']) ? ' border-bottom-left-radius:' . $border_radius['' . $prefix . '_border_radius_left_responsive'] . 'px;' : '';
        }
        ?>
        }
        }
    <?php
    }


    /**
     * sa fl builder custom border package
     */
    public static function sa_fl_border_package($settings, $setting_name, $selector)
    {
        if ($setting_name != '') {
            FLBuilderCSS::border_field_rule(array(
                'settings' => $settings,
                'setting_name' => $setting_name,
                'selector' => $selector,
            ));
        }
    }

    /**
     * sa fl builder Padding margin border radisu all
     */
    public static function sa_fl_dimension_utility($prefix, $settings, $setting_name, $selector, $unit)
    {
        if ($setting_name != '') {
            if ($setting_name == 'padding') {
                $props = array(
                    'padding-top' => '' . $prefix . '_' . $setting_name . '_top',
                    'padding-right' => '' . $prefix . '_' . $setting_name . '_right',
                    'padding-bottom' => '' . $prefix . '_' . $setting_name . '_bottom',
                    'padding-left' => '' . $prefix . '_' . $setting_name . '_left',
                );
            } elseif ($setting_name == 'margin') {
                $props = array(
                    'margin-top' => '' . $prefix . '_' . $setting_name . '_top',
                    'margin-right' => '' . $prefix . '_' . $setting_name . '_right',
                    'margin-bottom' => '' . $prefix . '_' . $setting_name . '_bottom',
                    'margin-left' => '' . $prefix . '_' . $setting_name . '_left',
                );
            } elseif ($setting_name == 'border') {
                $props = array(
                    'border-top' => '' . $prefix . '_' . $setting_name . '_top',
                    'border-right' => '' . $prefix . '_' . $setting_name . '_right',
                    'border-bottom' => '' . $prefix . '_' . $setting_name . '_bottom',
                    'border-left' => '' . $prefix . '_' . $setting_name . '_left',
                );
            }
            FLBuilderCSS::dimension_field_rule(array(
                'settings' => $settings,
                'setting_name' => $setting_name,
                'selector' => $selector,
                'unit' => $unit,
                'props' => $props
            ));
        }
    }

    /**
     *   sa fl builder typography Settings
     */
    public static function sa_fl_typography_setting($settings, $setting_name, $selector)
    {
        if ($setting_name != '') {
            FLBuilderCSS::typography_field_rule(array(
                'settings' => $settings,
                'setting_name' => $setting_name,
                'selector' => $selector,
            ));
        }
    }
    /**
     *   sa fl builder All element responsive  Settings
     */
    public static function sa_fl_responsive_setting($element, $settings, $setting_name, $selector)
    {
        if ($setting_name != '') {
            FLBuilderCSS::responsive_rule(array(
                'settings'    => $settings,
                'setting_name'    => $setting_name,
                'selector'    => $selector,
                'prop'        => $element,
            ));
        }
    }
    /**
     *   sa fl builder All element responsive  Settings
     */
    public static function sa_fl_general_style($array = array(), $selector, $media = '')
    {
        if ($selector != '') {
            FLBuilderCSS::rule(array(
                'selector' => $selector,
                'media' => $media, // optional
                'props' => $array
            ));
        }
    }
    /**
     *  Get link rel attribute
     *
     *  @since 1.0
     *  @param string $target gets an string for the link.
     *  @param string $is_nofollow gets an string for is no follow.
     *  @param string $echo gets an string for echo.
     *  @return string
     */
    static public function Sa_fl_builder_get_link_rel($target, $is_nofollow = 0, $echo = 0)
    {

        $attr = '';
        if ('_blank' == $target) {
            $attr .= 'noopener';
        }

        if (1 == $is_nofollow) {
            $attr .= ' nofollow';
        }

        if ('' == $attr) {
            return;
        }

        $attr = trim($attr);
        if (!$echo) {
            return 'rel="' . $attr . '"';
        }
        return 'rel="' . $attr . '"';
    }
}
new SA_FLBUILDER_HELPER();
