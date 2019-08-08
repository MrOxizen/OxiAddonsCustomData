<?php

/**
 * APIs.
 *
 * @package LFE
 */

namespace SAEL;

defined('ABSPATH') || exit;

/**
 * Handle Remote API requests.
 *
 * @package SAEL
 */
class SAEL_Temp_Remote {

    protected static $lfe_instance = NULL;

    const TRANSIENT_TEMPLATE = 'sael_template_info';
    const TRANSIENT_CATEGORY = 'sael_category_info';
    const TEMPLATES = 'https://www.shortcode-addons.com/wp-json/shortcode-elementor/v1/category/template';
    const CATEGORIES = 'https://www.shortcode-addons.com/wp-json/shortcode-elementor/v1/category/';

    public function __construct() {
        $this->hooks();
    }

    /**
     * Access plugin instance. You can create further instances by calling
     */
    public static function sael_get_instance() {
        if (NULL === self::$lfe_instance)
            self::$lfe_instance = new self;

        return self::$lfe_instance;
    }

    /**
     * API template URL.
     * Holds the URL for getting a single template data.
     *
     * @var string API template URL.
     */
    private static $template_url = 'https://www.shortcode-addons.com/wp-json/shortcode-elementor/v1/category/template/%d';

    /**
     * Initialize
     */
    public function hooks() {
        add_action('wp_ajax_sael_handle_sync', array($this, 'template_sync'));
        add_action('wp_ajax_nopriv_sael_handle_sync', array($this, 'template_sync'));
    }

    /**
     * Get a sync templates list.
     * @return mixed|\WP_Error
     */
    public function template_sync() {

        $response = $this->templates_list($force_update = true);
        $response = $this->categories_list($force_update = true);

        if ($response) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    /**
     * Get a templates list.
     * @return mixed|\WP_Error
     */
    public function templates_list($force_update = FALSE) {

        $response = get_transient(self::TRANSIENT_TEMPLATE);

        if (!$response || $force_update) {

            $request = wp_remote_request(self::TEMPLATES);
            if (!is_wp_error($request)) {

                $response = json_decode(wp_remote_retrieve_body($request), true);
                set_transient(self::TRANSIENT_TEMPLATE, $response, 5 * DAY_IN_SECONDS);
            } else {
                $response = $request->get_error_message();
            }
        }

        return $response;
    }

    /**
     * Get a templates categories.
     * @return mixed|\WP_Error
     */
    public function categories_list($force_update = FALSE) {
        $response = get_transient(self::TRANSIENT_CATEGORY);

        if (!$response || $force_update) {

            $request = wp_remote_request(self::CATEGORIES);
            if (!is_wp_error($request)) {

                $response = json_decode(wp_remote_retrieve_body($request), true);
                set_transient(self::TRANSIENT_CATEGORY, $response, 5 * DAY_IN_SECONDS);
            } else {
                $response = $request->get_error_message();
            }
        }
        return $response;
    }

    /**
     * Get a single template content.
     *
     * @param int $template_id Template ID.
     * @return mixed|\WP_Error
     */
    public function get_template_content($template_id) {
        $url = sprintf(self::$template_url, $template_id);

        $response = wp_remote_request($url);
        if (is_wp_error($response)) {
            return $response;
        }

        $response_code = (int) wp_remote_retrieve_response_code($response);
        if (200 !== $response_code) {
            return new \WP_Error('response_code_error', sprintf('The request returned with a status code of %s.', $response_code));
        }

        $template_content = json_decode(wp_remote_retrieve_body($response), true);
        if (isset($template_content['error'])) {
            return new \WP_Error('response_error', $template_content['error']);
        }

        if (empty($template_content['content'])) {
            return new \WP_Error('template_data_error', 'An invalid data was returned.');
        }
        return $template_content;
    }

}

new SAEL_Temp_Remote();
