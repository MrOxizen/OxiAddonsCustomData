<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Team_Member_Carousel;

use Elementor\Modules\DynamicTags\Module as TagsModule;
use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Group_Control_Background as Group_Control_Background;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Scheme_Typography as Scheme_Typography;
use \Elementor\Utils as Utils;
use \Elementor\Widget_Base as Widget_Base;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Team Member Carousel Widget
 */
class Team_Member_Carousel extends Widget_Base
{

    /**
     * Retrieve team member carousel widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'sa-el-team-member-carousel';
    }

    /**
     * Retrieve team member carousel widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Team Member Carousel', SA_ELEMENTOR_TEXTDOMAIN);
    }

    /**
     * Retrieve the list of categories the team member carousel widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['sa-el-addons'];
    }

    /**
     * Retrieve team member carousel widget icon.
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-accordion oxi-el-admin-icon';
    }

    /**
     * Register team member carousel widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @access protected
     */
    protected function _register_controls()
    {

        /*-----------------------------------------------------------------------------------*/
        /*    CONTENT TAB
        /*-----------------------------------------------------------------------------------*/

        /**
         * Content Tab: Team Members
         */
        $this->start_controls_section(
            'section_team_member',
            [
                'label' => __('Team Members', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'team_member_details',
            [
                'label' => '',
                'type' => Controls_Manager::REPEATER,
                'default' => [
                    [
                        'team_member_name' => 'Team 01',
                        'team_member_position' => 'Web Developer',
                        'facebook_url' => '#',
                        'twitter_url' => '#',
                        'google_plus_url' => '#',
                    ],
                    [
                        'team_member_name' => 'Team 02',
                        'team_member_position' => 'Web Designer',
                        'facebook_url' => '#',
                        'twitter_url' => '#',
                        'google_plus_url' => '#',
                    ],
                    [
                        'team_member_name' => 'Team 03',
                        'team_member_position' => 'Testing Engineer',
                        'facebook_url' => '#',
                        'twitter_url' => '#',
                        'google_plus_url' => '#',
                    ],
                ],
                'fields' => [
                    [
                        'name' => 'team_member_name',
                        'label' => __('Name', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::TEXT,
                        'dynamic' => [
                            'active' => true,
                        ],
                        'default' => __('John Doe', SA_ELEMENTOR_TEXTDOMAIN),
                    ],
                    [
                        'name' => 'team_member_position',
                        'label' => __('Position', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::TEXT,
                        'dynamic' => [
                            'active' => true,
                        ],
                        'default' => __('Web Developer', SA_ELEMENTOR_TEXTDOMAIN),
                    ],
                    [
                        'name' => 'team_member_description',
                        'label' => __('Description', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::TEXTAREA,
                        'dynamic' => [
                            'active' => true,
                        ],
                        'default' => __('Enter member description here ', SA_ELEMENTOR_TEXTDOMAIN),
                    ],
                    [
                        'name' => 'team_member_image',
                        'label' => __('Image', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::MEDIA,
                        'dynamic' => [
                            'active' => true,
                        ],
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'social_links_heading',
                        'label' => __('Social Links', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::HEADING,
                        'separator' => 'before',
                    ],
                    [
                        'name' => 'facebook_url',
                        'label' => __('Facebook', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::TEXT,
                        'dynamic' => [
                            'active' => true,
                            'categories' => [
                                TagsModule::POST_META_CATEGORY,
                            ],
                        ],
                        'description' => __('Enter Facebook page or profile URL of team member', SA_ELEMENTOR_TEXTDOMAIN),
                    ],
                    [
                        'name' => 'twitter_url',
                        'label' => __('Twitter', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::TEXT,
                        'dynamic' => [
                            'active' => true,
                            'categories' => [
                                TagsModule::POST_META_CATEGORY,
                            ],
                        ],
                        'description' => __('Enter Twitter profile URL of team member', SA_ELEMENTOR_TEXTDOMAIN),
                    ],
                    [
                        'name' => 'google_plus_url',
                        'label' => __('Google+', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::TEXT,
                        'dynamic' => [
                            'active' => true,
                            'categories' => [
                                TagsModule::POST_META_CATEGORY,
                            ],
                        ],
                        'description' => __('Enter Google+ profile URL of team member', SA_ELEMENTOR_TEXTDOMAIN),
                    ],
                    [
                        'name' => 'linkedin_url',
                        'label' => __('Linkedin', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::TEXT,
                        'dynamic' => [
                            'active' => true,
                            'categories' => [
                                TagsModule::POST_META_CATEGORY,
                            ],
                        ],
                        'description' => __('Enter Linkedin profile URL of team member', SA_ELEMENTOR_TEXTDOMAIN),
                    ],
                    [
                        'name' => 'instagram_url',
                        'label' => __('Instagram', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::TEXT,
                        'dynamic' => [
                            'active' => true,
                            'categories' => [
                                TagsModule::POST_META_CATEGORY,
                            ],
                        ],
                        'description' => __('Enter Instagram profile URL of team member', SA_ELEMENTOR_TEXTDOMAIN),
                    ],
                    [
                        'name' => 'youtube_url',
                        'label' => __('YouTube', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::TEXT,
                        'dynamic' => [
                            'active' => true,
                            'categories' => [
                                TagsModule::POST_META_CATEGORY,
                            ],
                        ],
                        'description' => __('Enter YouTube profile URL of team member', SA_ELEMENTOR_TEXTDOMAIN),
                    ],
                    [
                        'name' => 'pinterest_url',
                        'label' => __('Pinterest', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::TEXT,
                        'dynamic' => [
                            'active' => true,
                            'categories' => [
                                TagsModule::POST_META_CATEGORY,
                            ],
                        ],
                        'description' => __('Enter Pinterest profile URL of team member', SA_ELEMENTOR_TEXTDOMAIN),
                    ],
                    [
                        'name' => 'dribbble_url',
                        'label' => __('Dribbble', SA_ELEMENTOR_TEXTDOMAIN),
                        'type' => Controls_Manager::TEXT,
                        'dynamic' => [
                            'active' => true,
                            'categories' => [
                                TagsModule::POST_META_CATEGORY,
                            ],
                        ],
                        'description' => __('Enter Dribbble profile URL of team member', SA_ELEMENTOR_TEXTDOMAIN),
                    ],
                ],
                'title_field' => '{{{ team_member_name }}}',
            ]
        );

        $this->add_control(
            'member_social_links',
            [
                'label' => __('Show Social Icons', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => __('Yes', SA_ELEMENTOR_TEXTDOMAIN),
                'label_off' => __('No', SA_ELEMENTOR_TEXTDOMAIN),
                'return_value' => 'yes',
            ]
        );

        $this->end_controls_section();

        /**
         * Content Tab: Team Member Settings
         */
        $this->start_controls_section(
            'section_member_box_settings',
            [
                'label' => __('Team Member Settings', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'name_html_tag',
            [
                'label' => __('Name HTML Tag', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'h4',
                'options' => [
                    'h1' => __('H1', SA_ELEMENTOR_TEXTDOMAIN),
                    'h2' => __('H2', SA_ELEMENTOR_TEXTDOMAIN),
                    'h3' => __('H3', SA_ELEMENTOR_TEXTDOMAIN),
                    'h4' => __('H4', SA_ELEMENTOR_TEXTDOMAIN),
                    'h5' => __('H5', SA_ELEMENTOR_TEXTDOMAIN),
                    'h6' => __('H6', SA_ELEMENTOR_TEXTDOMAIN),
                    'div' => __('div', SA_ELEMENTOR_TEXTDOMAIN),
                    'span' => __('span', SA_ELEMENTOR_TEXTDOMAIN),
                    'p' => __('p', SA_ELEMENTOR_TEXTDOMAIN),
                ],
            ]
        );

        $this->add_control(
            'position_html_tag',
            [
                'label' => __('Position HTML Tag', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'div',
                'options' => [
                    'h1' => __('H1', SA_ELEMENTOR_TEXTDOMAIN),
                    'h2' => __('H2', SA_ELEMENTOR_TEXTDOMAIN),
                    'h3' => __('H3', SA_ELEMENTOR_TEXTDOMAIN),
                    'h4' => __('H4', SA_ELEMENTOR_TEXTDOMAIN),
                    'h5' => __('H5', SA_ELEMENTOR_TEXTDOMAIN),
                    'h6' => __('H6', SA_ELEMENTOR_TEXTDOMAIN),
                    'div' => __('div', SA_ELEMENTOR_TEXTDOMAIN),
                    'span' => __('span', SA_ELEMENTOR_TEXTDOMAIN),
                    'p' => __('p', SA_ELEMENTOR_TEXTDOMAIN),
                ],
            ]
        );

        $this->add_control(
            'social_links_position',
            [
                'label' => __('Social Icons Position', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'after_desc',
                'options' => [
                    'before_desc' => __('Before Description', SA_ELEMENTOR_TEXTDOMAIN),
                    'after_desc' => __('After Description', SA_ELEMENTOR_TEXTDOMAIN),
                ],
                'condition' => [
                    'member_social_links' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'overlay_content',
            [
                'label' => __('Overlay Content', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none' => __('None', SA_ELEMENTOR_TEXTDOMAIN),
                    'social_icons' => __('Social Icons', SA_ELEMENTOR_TEXTDOMAIN),
                    'all_content' => __('Content + Social Icons', SA_ELEMENTOR_TEXTDOMAIN),
                ],
            ]
        );

        $this->add_control(
            'member_title_divider',
            [
                'label' => __('Divider after Name', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
                'label_on' => __('Show', SA_ELEMENTOR_TEXTDOMAIN),
                'label_off' => __('Hide', SA_ELEMENTOR_TEXTDOMAIN),
                'return_value' => 'yes',
            ]
        );

        $this->add_control(
            'member_position_divider',
            [
                'label' => __('Divider after Position', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'hide',
                'label_on' => __('Show', SA_ELEMENTOR_TEXTDOMAIN),
                'label_off' => __('Hide', SA_ELEMENTOR_TEXTDOMAIN),
                'return_value' => 'yes',
            ]
        );

        $this->add_control(
            'member_description_divider',
            [
                'label' => __('Divider after Description', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'hide',
                'label_on' => __('Show', SA_ELEMENTOR_TEXTDOMAIN),
                'label_off' => __('Hide', SA_ELEMENTOR_TEXTDOMAIN),
                'return_value' => 'yes',
            ]
        );

        $this->end_controls_section();

        /**
         * Content Tab: Slider Settings
         */
        $this->start_controls_section(
            'section_slider_settings',
            [
                'label' => __('Slider Settings', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_responsive_control(
            'items',
            [
                'label' => __('Visible Items', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => ['size' => 3],
                'tablet_default' => ['size' => 2],
                'mobile_default' => ['size' => 1],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 10,
                        'step' => 1,
                    ],
                ],
                'size_units' => '',
            ]
        );

        $this->add_responsive_control(
            'margin',
            [
                'label' => __('Margin', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => ['size' => 10],
                'tablet_default' => ['size' => 10],
                'mobile_default' => ['size' => 10],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'size_units' => '',
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label' => __('Autoplay', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => __('Yes', SA_ELEMENTOR_TEXTDOMAIN),
                'label_off' => __('No', SA_ELEMENTOR_TEXTDOMAIN),
                'return_value' => 'yes',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'autoplay_speed',
            [
                'label' => __('Autoplay Speed', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => ['size' => 2000],
                'range' => [
                    'px' => [
                        'min' => 500,
                        'max' => 5000,
                        'step' => 1,
                    ],
                ],
                'size_units' => '',
                'condition' => [
                    'autoplay' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'pause_on_hover',
            [
                'label' => __('Pause On Hover', SA_ELEMENTOR_TEXTDOMAIN),
                'description' => __('Pause slider when hover on slider area.', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'default' => '',
                'label_on' => __('Pause', SA_ELEMENTOR_TEXTDOMAIN),
                'label_off' => __('Play', SA_ELEMENTOR_TEXTDOMAIN),
                'return_value' => 'yes',
                'condition' => [
                    'autoplay' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'infinite_loop',
            [
                'label' => __('Infinite Loop', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => __('Yes', SA_ELEMENTOR_TEXTDOMAIN),
                'label_off' => __('No', SA_ELEMENTOR_TEXTDOMAIN),
                'return_value' => 'yes',
            ]
        );

        $this->add_control(
            'grab_cursor',
            [
                'label' => __('Grab Cursor', SA_ELEMENTOR_TEXTDOMAIN),
                'description' => __('Shows grab cursor when you hover over the slider', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'default' => '',
                'label_on' => __('Show', SA_ELEMENTOR_TEXTDOMAIN),
                'label_off' => __('Hide', SA_ELEMENTOR_TEXTDOMAIN),
                'return_value' => 'yes',
            ]
        );

        $this->add_control(
            'name_navigation_heading',
            [
                'label' => __('Navigation', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'arrows',
            [
                'label' => __('Arrows', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => __('Yes', SA_ELEMENTOR_TEXTDOMAIN),
                'label_off' => __('No', SA_ELEMENTOR_TEXTDOMAIN),
                'return_value' => 'yes',
            ]
        );

        $this->add_control(
            'dots',
            [
                'label' => __('Dots', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => __('Yes', SA_ELEMENTOR_TEXTDOMAIN),
                'label_off' => __('No', SA_ELEMENTOR_TEXTDOMAIN),
                'return_value' => 'yes',
            ]
        );

        $this->end_controls_section();

        /*-----------------------------------------------------------------------------------*/
        /*    STYLE TAB
        /*-----------------------------------------------------------------------------------*/

        /**
         * Style Tab: Box Style
         */
        $this->start_controls_section(
            'section_member_box_style',
            [
                'label' => __('Box Style', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'member_box_alignment',
            [
                'label' => __('Alignment', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Content
         */
        $this->start_controls_section(
            'section_member_content_style',
            [
                'label' => __('Content', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'member_box_bg_color',
            [
                'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-content-normal' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'member_box_border',
                'label' => __('Border', SA_ELEMENTOR_TEXTDOMAIN),
                'placeholder' => '1px',
                'default' => '1px',
                'separator' => 'before',
                'selector' => '{{WRAPPER}} .sa-el-tm-content-normal',
            ]
        );

        $this->add_control(
            'member_box_border_radius',
            [
                'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-content-normal' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'member_box_padding',
            [
                'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-content-normal' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'pa_member_box_shadow',
                'selector' => '{{WRAPPER}} .sa-el-tm-content-normal',
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Overlay
         */
        $this->start_controls_section(
            'section_member_overlay_style',
            [
                'label' => __('Overlay', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'overlay_content!' => 'none',
                ],
            ]
        );

        $this->add_responsive_control(
            'overlay_alignment',
            [
                'label' => __('Alignment', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-overlay-content-wrap' => 'text-align: {{VALUE}};',
                ],
                'condition' => [
                    'overlay_content!' => 'none',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'overlay_background',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .sa-el-tm-overlay-content-wrap:before',
                'condition' => [
                    'overlay_content!' => 'none',
                ],
            ]
        );

        $this->add_control(
            'overlay_opacity',
            [
                'label' => __('Opacity', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1,
                        'step' => 0.1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-overlay-content-wrap:before' => 'opacity: {{SIZE}};',
                ],
                'condition' => [
                    'overlay_content!' => 'none',
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Image
         */
        $this->start_controls_section(
            'section_member_image_style',
            [
                'label' => __('Image', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'member_image_width',
            [
                'label' => __('Image Width', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['%', 'px'],
                'range' => [
                    'px' => [
                        'max' => 1200,
                    ],
                ],
                'tablet_default' => [
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-image img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'member_image_border',
                'label' => __('Border', SA_ELEMENTOR_TEXTDOMAIN),
                'placeholder' => '1px',
                'default' => '1px',
                'selector' => '{{WRAPPER}} .sa-el-tm-image img',
            ]
        );

        $this->add_control(
            'member_image_border_radius',
            [
                'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-image img, {{WRAPPER}} .sa-el-tm-overlay-content-wrap:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'member_image_margin',
            [
                'label' => __('Margin Bottom', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 10,
                    'unit' => 'px',
                ],
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'tablet_default' => [
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-image' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Name
         */
        $this->start_controls_section(
            'section_member_name_style',
            [
                'label' => __('Name', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'member_name_typography',
                'label' => __('Typography', SA_ELEMENTOR_TEXTDOMAIN),
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .sa-el-tm-name',
            ]
        );

        $this->add_control(
            'member_name_text_color',
            [
                'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-name' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'member_name_margin',
            [
                'label' => __('Margin Bottom', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 10,
                    'unit' => 'px',
                ],
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'tablet_default' => [
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-name' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'name_divider_heading',
            [
                'label' => __('Divider', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'member_title_divider' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'name_divider_color',
            [
                'label' => __('Divider Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-title-divider' => 'border-bottom-color: {{VALUE}}',
                ],
                'condition' => [
                    'member_title_divider' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'name_divider_style',
            [
                'label' => __('Divider Style', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'solid',
                'options' => [
                    'solid' => __('Solid', SA_ELEMENTOR_TEXTDOMAIN),
                    'dotted' => __('Dotted', SA_ELEMENTOR_TEXTDOMAIN),
                    'dashed' => __('Dashed', SA_ELEMENTOR_TEXTDOMAIN),
                    'double' => __('Double', SA_ELEMENTOR_TEXTDOMAIN),
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-title-divider' => 'border-bottom-style: {{VALUE}}',
                ],
                'condition' => [
                    'member_title_divider' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'name_divider_width',
            [
                'label' => __('Divider Width', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 100,
                    'unit' => 'px',
                ],
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'max' => 800,
                    ],
                ],
                'tablet_default' => [
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-title-divider' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'member_title_divider' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'name_divider_height',
            [
                'label' => __('Divider Height', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 4,
                ],
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'max' => 20,
                    ],
                ],
                'tablet_default' => [
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-title-divider' => 'border-bottom-width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'member_title_divider' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'name_divider_margin',
            [
                'label' => __('Margin Bottom', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 10,
                    'unit' => 'px',
                ],
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'tablet_default' => [
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-title-divider-wrap' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'member_title_divider' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Position
         */
        $this->start_controls_section(
            'section_member_position_style',
            [
                'label' => __('Position', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'member_position_typography',
                'label' => __('Typography', SA_ELEMENTOR_TEXTDOMAIN),
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .sa-el-tm-position',
            ]
        );

        $this->add_control(
            'member_position_text_color',
            [
                'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-position' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'member_position_margin',
            [
                'label' => __('Margin Bottom', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 10,
                    'unit' => 'px',
                ],
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'tablet_default' => [
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-position' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'position_divider_heading',
            [
                'label' => __('Divider', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'member_position_divider' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'position_divider_color',
            [
                'label' => __('Divider Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-position-divider' => 'border-bottom-color: {{VALUE}}',
                ],
                'condition' => [
                    'member_position_divider' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'position_divider_style',
            [
                'label' => __('Divider Style', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'solid',
                'options' => [
                    'solid' => __('Solid', SA_ELEMENTOR_TEXTDOMAIN),
                    'dotted' => __('Dotted', SA_ELEMENTOR_TEXTDOMAIN),
                    'dashed' => __('Dashed', SA_ELEMENTOR_TEXTDOMAIN),
                    'double' => __('Double', SA_ELEMENTOR_TEXTDOMAIN),
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-position-divider' => 'border-bottom-style: {{VALUE}}',
                ],
                'condition' => [
                    'member_position_divider' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'position_divider_width',
            [
                'label' => __('Divider Width', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 100,
                    'unit' => 'px',
                ],
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'max' => 800,
                    ],
                ],
                'tablet_default' => [
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-position-divider' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'member_position_divider' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'position_divider_height',
            [
                'label' => __('Divider Height', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 4,
                ],
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'max' => 20,
                    ],
                ],
                'tablet_default' => [
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-position-divider' => 'border-bottom-width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'member_position_divider' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'position_divider_margin',
            [
                'label' => __('Margin Bottom', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 10,
                    'unit' => 'px',
                ],
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'tablet_default' => [
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-position-divider-wrap' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'member_position_divider' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Description
         */
        $this->start_controls_section(
            'section_member_description_style',
            [
                'label' => __('Description', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'member_description_typography',
                'label' => __('Typography', SA_ELEMENTOR_TEXTDOMAIN),
                'scheme' => Scheme_Typography::TYPOGRAPHY_4,
                'selector' => '{{WRAPPER}} .sa-el-tm-description',
            ]
        );

        $this->add_control(
            'member_description_text_color',
            [
                'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-description' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'member_description_margin',
            [
                'label' => __('Margin Bottom', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 10,
                    'unit' => 'px',
                ],
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'tablet_default' => [
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-description' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'description_divider_heading',
            [
                'label' => __('Divider', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'member_description_divider' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'description_divider_color',
            [
                'label' => __('Divider Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-description-divider' => 'border-bottom-color: {{VALUE}}',
                ],
                'condition' => [
                    'member_description_divider' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'description_divider_style',
            [
                'label' => __('Divider Style', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'default' => 'solid',
                'options' => [
                    'solid' => __('Solid', SA_ELEMENTOR_TEXTDOMAIN),
                    'dotted' => __('Dotted', SA_ELEMENTOR_TEXTDOMAIN),
                    'dashed' => __('Dashed', SA_ELEMENTOR_TEXTDOMAIN),
                    'double' => __('Double', SA_ELEMENTOR_TEXTDOMAIN),
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-description-divider' => 'border-bottom-style: {{VALUE}}',
                ],
                'condition' => [
                    'member_description_divider' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'description_divider_width',
            [
                'label' => __('Divider Width', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 100,
                    'unit' => 'px',
                ],
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'max' => 800,
                    ],
                ],
                'tablet_default' => [
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-description-divider' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'member_description_divider' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'description_divider_height',
            [
                'label' => __('Divider Height', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 4,
                ],
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'max' => 20,
                    ],
                ],
                'tablet_default' => [
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-description-divider' => 'border-bottom-width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'member_description_divider' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'description_divider_margin',
            [
                'label' => __('Margin Bottom', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 10,
                    'unit' => 'px',
                ],
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'tablet_default' => [
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-description-divider-wrap' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'member_description_divider' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Social Icons
         */
        $this->start_controls_section(
            'section_member_social_links_style',
            [
                'label' => __('Social Icons', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'member_icons_gap',
            [
                'label' => __('Icons Gap', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => ['size' => 10],
                'size_units' => ['%', 'px'],
                'range' => [
                    'px' => [
                        'max' => 60,
                    ],
                ],
                'tablet_default' => [
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-social-links li:not(:last-child)' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'member_icon_size',
            [
                'label' => __('Icon Size', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'max' => 30,
                    ],
                ],
                'default' => [
                    'size' => '14',
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-social-links .sa-el-tm-social-icon' => 'font-size: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('tabs_links_style');

        $this->start_controls_tab(
            'tab_links_normal',
            [
                'label' => __('Normal', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'member_links_icons_color',
            [
                'label' => __('Icons Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-social-links .sa-el-tm-social-icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'member_links_bg_color',
            [
                'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-social-links .sa-el-tm-social-icon-wrap' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'member_links_border',
                'label' => __('Border', SA_ELEMENTOR_TEXTDOMAIN),
                'placeholder' => '1px',
                'default' => '1px',
                'separator' => 'before',
                'selector' => '{{WRAPPER}} .sa-el-tm-social-links .sa-el-tm-social-icon-wrap',
            ]
        );

        $this->add_control(
            'member_links_border_radius',
            [
                'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-social-links .sa-el-tm-social-icon-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'member_links_padding',
            [
                'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-social-links .sa-el-tm-social-icon-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_links_hover',
            [
                'label' => __('Hover', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'member_links_icons_color_hover',
            [
                'label' => __('Icons Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-social-links .sa-el-tm-social-icon-wrap:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'member_links_bg_color_hover',
            [
                'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-social-links .sa-el-tm-social-icon-wrap:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'member_links_border_color_hover',
            [
                'label' => __('Border Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .sa-el-tm-social-links .sa-el-tm-social-icon-wrap:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /**
         * Style Tab: Arrows
         */
        $this->start_controls_section(
            'section_arrows_style',
            [
                'label' => __('Arrows', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'arrows' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'arrow',
            [
                'label' => __('Choose Arrow', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'default' => 'fa fa-angle-right',
                'options' => [
                    'fa fa-angle-right' => __('Angle', SA_ELEMENTOR_TEXTDOMAIN),
                    'fa fa-angle-double-right' => __('Double Angle', SA_ELEMENTOR_TEXTDOMAIN),
                    'fa fa-chevron-right' => __('Chevron', SA_ELEMENTOR_TEXTDOMAIN),
                    'fa fa-chevron-circle-right' => __('Chevron Circle', SA_ELEMENTOR_TEXTDOMAIN),
                    'fa fa-arrow-right' => __('Arrow', SA_ELEMENTOR_TEXTDOMAIN),
                    'fa fa-long-arrow-right' => __('Long Arrow', SA_ELEMENTOR_TEXTDOMAIN),
                    'fa fa-caret-right' => __('Caret', SA_ELEMENTOR_TEXTDOMAIN),
                    'fa fa-caret-square-o-right' => __('Caret Square', SA_ELEMENTOR_TEXTDOMAIN),
                    'fa fa-arrow-circle-right' => __('Arrow Circle', SA_ELEMENTOR_TEXTDOMAIN),
                    'fa fa-arrow-circle-o-right' => __('Arrow Circle O', SA_ELEMENTOR_TEXTDOMAIN),
                    'fa fa-toggle-right' => __('Toggle', SA_ELEMENTOR_TEXTDOMAIN),
                    'fa fa-hand-o-right' => __('Hand', SA_ELEMENTOR_TEXTDOMAIN),
                ],
            ]
        );

        $this->add_responsive_control(
            'arrows_size',
            [
                'label' => __('Arrows Size', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'default' => ['size' => '22'],
                'range' => [
                    'px' => [
                        'min' => 15,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-button-next, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'left_arrow_position',
            [
                'label' => __('Align Left Arrow', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 40,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-button-prev' => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'right_arrow_position',
            [
                'label' => __('Align Right Arrow', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 40,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-button-next' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('tabs_arrows_style');

        $this->start_controls_tab(
            'tab_arrows_normal',
            [
                'label' => __('Normal', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'arrows_bg_color_normal',
            [
                'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-button-next, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrows_color_normal',
            [
                'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-button-next, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'arrows_border_normal',
                'label' => __('Border', SA_ELEMENTOR_TEXTDOMAIN),
                'placeholder' => '1px',
                'default' => '1px',
                'selector' => '{{WRAPPER}} .swiper-container-wrap .swiper-button-next, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev',
            ]
        );

        $this->add_control(
            'arrows_border_radius_normal',
            [
                'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-button-next, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_arrows_hover',
            [
                'label' => __('Hover', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'arrows_bg_color_hover',
            [
                'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-button-next:hover, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrows_color_hover',
            [
                'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-button-next:hover, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrows_border_color_hover',
            [
                'label' => __('Border Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-button-next:hover, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_responsive_control(
            'arrows_padding',
            [
                'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-button-next, {{WRAPPER}} .swiper-container-wrap .swiper-button-prev' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Dots
         */
        $this->start_controls_section(
            'section_dots_style',
            [
                'label' => __('Dots', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'dots' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'dots_position',
            [
                'label' => __('Position', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'inside' => __('Inside', SA_ELEMENTOR_TEXTDOMAIN),
                    'outside' => __('Outside', SA_ELEMENTOR_TEXTDOMAIN),
                ],
                'default' => 'outside',
            ]
        );

        $this->add_responsive_control(
            'dots_size',
            [
                'label' => __('Size', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 2,
                        'max' => 40,
                        'step' => 1,
                    ],
                ],
                'size_units' => '',
                'selectors' => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullet' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_spacing',
            [
                'label' => __('Spacing', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 30,
                        'step' => 1,
                    ],
                ],
                'size_units' => '',
                'selectors' => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullet' => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->start_controls_tabs('tabs_dots_style');

        $this->start_controls_tab(
            'tab_dots_normal',
            [
                'label' => __('Normal', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'dots_color_normal',
            [
                'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullet' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'active_dot_color_normal',
            [
                'label' => __('Active Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullet-active' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'dots_border_normal',
                'label' => __('Border', SA_ELEMENTOR_TEXTDOMAIN),
                'placeholder' => '1px',
                'default' => '1px',
                'selector' => '{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullet',
            ]
        );

        $this->add_control(
            'dots_border_radius_normal',
            [
                'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullet' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_margin',
            [
                'label' => __('Margin', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'allowed_dimensions' => 'vertical',
                'placeholder' => [
                    'top' => '',
                    'right' => 'auto',
                    'bottom' => '',
                    'left' => 'auto',
                ],
                'selectors' => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullets' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_dots_hover',
            [
                'label' => __('Hover', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'dots_color_hover',
            [
                'label' => __('Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullet:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'dots_border_color_hover',
            [
                'label' => __('Border Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .swiper-container-wrap .swiper-pagination-bullet:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $image = $this->get_settings('member_image');

        $this->add_render_attribute(
            'team-member-carousel-wrap',
            [
                'class' => ['swiper-container-wrap', 'sa-el-team-member-carousel-wrap'],
            ]
        );

        if ($settings['dots_position']) {
            $this->add_render_attribute('team-member-carousel-wrap', 'class', 'swiper-container-wrap-dots-' . $settings['dots_position']);
        }

        $this->add_render_attribute(
            'team-member-carousel',
            [
                'class' => ['swiper-container', 'sa-el-tm-wrapper', 'sa-el-tm-carousel'],
                'id' => 'swiper-container-' . esc_attr($this->get_id()),
                'data-pagination' => '.swiper-pagination-' . esc_attr($this->get_id()),
                'data-arrow-next' => '.swiper-button-next-' . esc_attr($this->get_id()),
                'data-arrow-prev' => '.swiper-button-prev-' . esc_attr($this->get_id()),
            ]
        );

        $this->add_render_attribute('team-member-carousel', 'data-id', 'swiper-container-' . esc_attr($this->get_id()));

        if (!empty($settings['items']['size'])) {
            $this->add_render_attribute('team-member-carousel', 'data-items', $settings['items']['size']);
        }

        if (!empty($settings['items_tablet']['size'])) {
            $this->add_render_attribute('team-member-carousel', 'data-items-tablet', $settings['items_tablet']['size']);
        }

        if (!empty($settings['items_mobile']['size'])) {
            $this->add_render_attribute('team-member-carousel', 'data-items-mobile', $settings['items_mobile']['size']);
        }

        if (!empty($settings['margin']['size'])) {
            $this->add_render_attribute('team-member-carousel', 'data-margin', $settings['margin']['size']);
        }

        if (!empty($settings['margin_tablet']['size'])) {
            $this->add_render_attribute('team-member-carousel', 'data-margin-tablet', $settings['margin_tablet']['size']);
        }

        if (!empty($settings['margin_mobile']['size'])) {
            $this->add_render_attribute('team-member-carousel', 'data-margin-mobile', $settings['margin_mobile']['size']);
        }

        if (!empty($settings['slider_speed']['size'])) {
            $this->add_render_attribute('team-member-carousel', 'data-speed', $settings['slider_speed']['size']);
        }

        if ($settings['autoplay'] == 'yes' && !empty($settings['autoplay_speed']['size'])) {
            $this->add_render_attribute('team-member-carousel', 'data-autoplay', $settings['autoplay_speed']['size']);
        } else {
            $this->add_render_attribute('team-member-carousel', 'data-autoplay', "0");
        }

        if ($settings['infinite_loop'] == 'yes') {
            $this->add_render_attribute('team-member-carousel', 'data-loop', "1");
        }

        if ($settings['grab_cursor'] == 'yes') {
            $this->add_render_attribute('team-member-carousel', 'data-grab-cursor', "1");
        }

        if ($settings['arrows'] == 'yes') {
            $this->add_render_attribute('team-member-carousel', 'data-arrows', "1");
        }

        if ($settings['dots'] == 'yes') {
            $this->add_render_attribute('team-member-carousel', 'data-dots', "1");
        }

        if ($settings['pause_on_hover'] == 'yes') {
            $this->add_render_attribute('team-member-carousel', 'data-pause-on-hover', "1");
        }

        if ($settings['dots_position']) {
            $this->add_render_attribute('team-member-carousel', 'class', 'sa-el-tm-carousel-dots-' . $settings['dots_position']);
        }

        ?>
        <div <?php echo $this->get_render_attribute_string('team-member-carousel-wrap'); ?>>
            <div <?php echo $this->get_render_attribute_string('team-member-carousel'); ?>>
                <div class="swiper-wrapper">
                    <?php foreach ($settings['team_member_details'] as $index => $item) : ?>
                        <div class="swiper-slide">
                            <div class="sa-el-tm">
                                <div class="sa-el-tm-image">
                                    <?php echo '<img src="' . $item['team_member_image']['url'] . '" alt="' . esc_attr(get_post_meta($item['team_member_image']['id'], '_wp_attachment_image_alt', true)) . '">'; ?>

                                    <?php if ($settings['overlay_content'] == 'social_icons') { ?>
                                        <div class="sa-el-tm-overlay-content-wrap">
                                            <div class="sa-el-tm-content">
                                                <?php
                                                if ($settings['member_social_links'] == 'yes') {
                                                    $this->member_social_links($item);
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if ($settings['overlay_content'] == 'all_content') { ?>
                                        <div class="sa-el-tm-overlay-content-wrap">
                                            <div class="sa-el-tm-content">
                                                <?php
                                                if ($settings['member_social_links'] == 'yes') {
                                                    if ($settings['social_links_position'] == 'before_desc') {
                                                        $this->member_social_links($item);
                                                    }
                                                }
                                                ?>
                                                <?php $this->render_description($item); ?>
                                                <?php
                                                if ($settings['member_social_links'] == 'yes') {
                                                    if ($settings['social_links_position'] == 'after_desc') {
                                                        $this->member_social_links($item);
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <?php if ($settings['overlay_content'] == 'all_content') { ?>
                                    <div class="sa-el-tm-content sa-el-tm-content-normal">
                                        <?php
                                        // Name
                                        $this->render_name($item);

                                        // Position
                                        $this->render_position($item);
                                        ?>
                                    </div>
                                <?php } ?>
                                <?php if ($settings['overlay_content'] != 'all_content') { ?>
                                    <div class="sa-el-tm-content sa-el-tm-content-normal">
                                        <?php
                                        $this->render_name($item);
                                        ?>
                                        <?php $this->render_position($item); ?>
                                        <?php
                                        if ($settings['member_social_links'] == 'yes' && $settings['overlay_content'] == 'none') {
                                            if ($settings['social_links_position'] == 'before_desc') {
                                                $this->member_social_links($item);
                                            }
                                        }
                                        ?>
                                        <?php $this->render_description($item); ?>
                                        <?php
                                        if ($settings['member_social_links'] == 'yes' && $settings['overlay_content'] == 'none') {
                                            if ($settings['social_links_position'] == 'after_desc') {
                                                $this->member_social_links($item);
                                            }
                                        }
                                        ?>
                                    </div><!-- .sa-el-tm-content -->
                                <?php } ?>
                            </div><!-- .sa-el-tm -->
                        </div><!-- .swiper-slide -->
                    <?php endforeach; ?>
                </div>
            </div>
            <?php
            $this->render_dots();

            $this->render_arrows();
            ?>
        </div>
    <?php
    }

    protected function render_name($item)
    {
        $settings = $this->get_settings_for_display();

        if ($item['team_member_name'] != '') {
            printf('<%1$s class="sa-el-tm-name">%2$s</%1$s>', $settings['name_html_tag'], $item['team_member_name']);
        }
        ?>
        <?php if ($settings['member_title_divider'] == 'yes') { ?>
            <div class="sa-el-tm-title-divider-wrap">
                <div class="sa-el-tm-divider sa-el-tm-title-divider"></div>
            </div>
        <?php }
    }

    protected function render_position($item)
    {
        $settings = $this->get_settings_for_display();

        if ($item['team_member_position'] != '') {
            printf('<%1$s class="sa-el-tm-position">%2$s</%1$s>', $settings['position_html_tag'], $item['team_member_position']);
        }
        ?>
        <?php if ($settings['member_position_divider'] == 'yes') { ?>
            <div class="sa-el-tm-position-divider-wrap">
                <div class="sa-el-tm-divider sa-el-tm-position-divider"></div>
            </div>
        <?php }
    }

    protected function render_description($item)
    {
        $settings = $this->get_settings_for_display();
        if ($item['team_member_description'] != '') { ?>
            <div class="sa-el-tm-description">
                <?php echo $this->parse_text_editor($item['team_member_description']); ?>
            </div>
        <?php } ?>
        <?php if ($settings['member_description_divider'] == 'yes') { ?>
            <div class="sa-el-tm-description-divider-wrap">
                <div class="sa-el-tm-divider sa-el-tm-description-divider"></div>
            </div>
        <?php }
    }

    private function member_social_links($item)
    {

        $facebook_url = $item['facebook_url'];
        $twitter_url = $item['twitter_url'];
        $google_plus_url = $item['google_plus_url'];
        $linkedin_url = $item['linkedin_url'];
        $instagram_url = $item['instagram_url'];
        $youtube_url = $item['youtube_url'];
        $pinterest_url = $item['pinterest_url'];
        $dribbble_url = $item['dribbble_url'];
        ?>
        <div class="sa-el-tm-social-links-wrap">
            <ul class="sa-el-tm-social-links">
                <?php
                if ($facebook_url) {
                    printf('<li><a href="%1$s"><span class="sa-el-tm-social-icon-wrap"><span class="sa-el-tm-social-icon fa fa-facebook"></span></span></a></li>', esc_url($facebook_url));
                }
                if ($twitter_url) {
                    printf('<li><a href="%1$s"><span class="sa-el-tm-social-icon-wrap"><span class="sa-el-tm-social-icon fa fa-twitter"></span></span></a></li>', esc_url($twitter_url));
                }
                if ($google_plus_url) {
                    printf('<li><a href="%1$s"><span class="sa-el-tm-social-icon-wrap"><span class="sa-el-tm-social-icon fa fa-google-plus"></span></span></a></li>', esc_url($google_plus_url));
                }
                if ($linkedin_url) {
                    printf('<li><a href="%1$s"><span class="sa-el-tm-social-icon-wrap"><span class="sa-el-tm-social-icon fa fa-linkedin"></span></span></a></li>', esc_url($linkedin_url));
                }
                if ($instagram_url) {
                    printf('<li><a href="%1$s"><span class="sa-el-tm-social-icon-wrap"><span class="sa-el-tm-social-icon fa fa-instagram"></span></span></a></li>', esc_url($instagram_url));
                }
                if ($youtube_url) {
                    printf('<li><a href="%1$s"><span class="sa-el-tm-social-icon-wrap"><span class="sa-el-tm-social-icon fa fa-youtube"></span></span></a></li>', esc_url($youtube_url));
                }
                if ($pinterest_url) {
                    printf('<li><a href="%1$s"><span class="sa-el-tm-social-icon-wrap"><span class="sa-el-tm-social-icon fa fa-pinterest"></span></span></a></li>', esc_url($pinterest_url));
                }
                if ($dribbble_url) {
                    printf('<li><a href="%1$s"><span class="sa-el-tm-social-icon-wrap"><span class="sa-el-tm-social-icon fa fa-dribbble"></span></span></a></li>', esc_url($dribbble_url));
                }
                ?>
            </ul>
        </div>
    <?php
    }

    /**
     * Render team member carousel dots output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @access protected
     */
    protected function render_dots()
    {
        $settings = $this->get_settings_for_display();

        if ($settings['dots'] == 'yes') { ?>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-<?php echo esc_attr($this->get_id()); ?>"></div>
        <?php }
    }

    /**
     * Render team member carousel arrows output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @access protected
     */
    protected function render_arrows()
    {
        $settings = $this->get_settings_for_display();

        if ($settings['arrows'] == 'yes') { ?>
            <?php
            if ($settings['arrow']) {
                $pa_next_arrow = $settings['arrow'];
                $pa_prev_arrow = str_replace("right", "left", $settings['arrow']);
            } else {
                $pa_next_arrow = 'fa fa-angle-right';
                $pa_prev_arrow = 'fa fa-angle-left';
            }
            ?>
            <!-- Add Arrows -->
            <div class="swiper-button-next swiper-button-next-<?php echo esc_attr($this->get_id()); ?>">
                <i class="<?php echo esc_attr($pa_next_arrow); ?>"></i>
            </div>
            <div class="swiper-button-prev swiper-button-prev-<?php echo esc_attr($this->get_id()); ?>">
                <i class="<?php echo esc_attr($pa_prev_arrow); ?>"></i>
            </div>
        <?php }
    }

    protected function _content_template()
    { }
}
