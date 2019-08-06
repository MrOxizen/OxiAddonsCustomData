<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Team_Member;

use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Scheme_Typography as Scheme_Typography;
use \Elementor\Widget_Base as Widget_Base;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Control_Media;
use Elementor\Group_Control_Image_Size;

defined('ABSPATH') || die();

class Team_Member extends Widget_Base
{

    public function get_name()
    {
        return 'sa_el_team_member';
    }
    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Team Member', SA_ELEMENTOR_TEXTDOMAIN);
    }

    /**
     * Get widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-person oxi-el-admin-icon';
    }

    public function get_categories()
    {
        return ['sa-el-addons'];
    }

    protected static function get_profile_names()
    {
        return [
            '500px' => __('500px', SA_ELEMENTOR_TEXTDOMAIN),
            'facebook' => __('Facebook', SA_ELEMENTOR_TEXTDOMAIN),
            'apple' => __('Apple', SA_ELEMENTOR_TEXTDOMAIN),
            'github' => __('Github', SA_ELEMENTOR_TEXTDOMAIN),
            'behance' => __('Behance', SA_ELEMENTOR_TEXTDOMAIN),
            'linkedin' => __('LinkedIn', SA_ELEMENTOR_TEXTDOMAIN),
            'bitbucket' => __('BitBucket', SA_ELEMENTOR_TEXTDOMAIN),
            'codepen' => __('CodePen', SA_ELEMENTOR_TEXTDOMAIN),
            'delicious' => __('Delicious', SA_ELEMENTOR_TEXTDOMAIN),
            'deviantart' => __('DeviantArt', SA_ELEMENTOR_TEXTDOMAIN),
            'digg' => __('Digg', SA_ELEMENTOR_TEXTDOMAIN),
            'dribbble' => __('Dribbble', SA_ELEMENTOR_TEXTDOMAIN),
            'email' => __('Email', SA_ELEMENTOR_TEXTDOMAIN),
            'flickr' => __('Flicker', SA_ELEMENTOR_TEXTDOMAIN),
            'foursquare' => __('FourSquare', SA_ELEMENTOR_TEXTDOMAIN),
            'houzz' => __('Houzz', SA_ELEMENTOR_TEXTDOMAIN),
            'instagram' => __('Instagram', SA_ELEMENTOR_TEXTDOMAIN),
            'jsfiddle' => __('JS Fiddle', SA_ELEMENTOR_TEXTDOMAIN),
            'medium' => __('Medium', SA_ELEMENTOR_TEXTDOMAIN),
            'pinterest' => __('Pinterest', SA_ELEMENTOR_TEXTDOMAIN),
            'product-hunt' => __('Product Hunt', SA_ELEMENTOR_TEXTDOMAIN),
            'reddit' => __('Reddit', SA_ELEMENTOR_TEXTDOMAIN),
            'slideshare' => __('Slide Share', SA_ELEMENTOR_TEXTDOMAIN),
            'snapchat' => __('Snapchat', SA_ELEMENTOR_TEXTDOMAIN),
            'soundcloud' => __('SoundCloud', SA_ELEMENTOR_TEXTDOMAIN),
            'spotify' => __('Spotify', SA_ELEMENTOR_TEXTDOMAIN),
            'stack-overflow' => __('StackOverflow', SA_ELEMENTOR_TEXTDOMAIN),
            'tripadvisor' => __('TripAdvisor', SA_ELEMENTOR_TEXTDOMAIN),
            'tumblr' => __('Tumblr', SA_ELEMENTOR_TEXTDOMAIN),
            'twitch' => __('Twitch', SA_ELEMENTOR_TEXTDOMAIN),
            'twitter' => __('Twitter', SA_ELEMENTOR_TEXTDOMAIN),
            'vimeo' => __('Vimeo', SA_ELEMENTOR_TEXTDOMAIN),
            'vk' => __('VK', SA_ELEMENTOR_TEXTDOMAIN),
            'website' => __('Website', SA_ELEMENTOR_TEXTDOMAIN),
            'whatsapp' => __('WhatsApp', SA_ELEMENTOR_TEXTDOMAIN),
            'wordpress' => __('WordPress', SA_ELEMENTOR_TEXTDOMAIN),
            'xing' => __('Xing', SA_ELEMENTOR_TEXTDOMAIN),
            'yelp' => __('Yelp', SA_ELEMENTOR_TEXTDOMAIN),
            'youtube' => __('YouTube', SA_ELEMENTOR_TEXTDOMAIN),
        ];
    }

    /**
     * Register content related controls
     */
    protected function _register_controls()
    {
        $this->start_controls_section(
            '_section_info',
            [
                'label' => __('Information', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __('Photo', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'large',
                'separator' => 'none',
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Name', SA_ELEMENTOR_TEXTDOMAIN),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Your Member Name', SA_ELEMENTOR_TEXTDOMAIN),
                'placeholder' => __('Type Member Name', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'job_title',
            [
                'label' => __('Job Title', SA_ELEMENTOR_TEXTDOMAIN),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('Your Officer', SA_ELEMENTOR_TEXTDOMAIN),
                'placeholder' => __('Type Member Job Title', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'bio',
            [
                'label' => __('Short Bio', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __('Write something amazing about the Your member', SA_ELEMENTOR_TEXTDOMAIN),
                'rows' => 5
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __('Title HTML Tag', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1'  => [
                        'title' => __('H1', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2'  => [
                        'title' => __('H2', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3'  => [
                        'title' => __('H3', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4'  => [
                        'title' => __('H4', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5'  => [
                        'title' => __('H5', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6'  => [
                        'title' => __('H6', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h3',
                'toggle' => false,
            ]
        );

        $this->add_responsive_control(
            'align',
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
                    'justify' => [
                        'title' => __('Justify', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'fa fa-align-justify',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_social',
            [
                'label' => __('Social Profiles', SA_ELEMENTOR_TEXTDOMAIN),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'name',
            [
                'label' => __('Profile Name', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SELECT2,
                'select2options' => [
                    'allowClear' => false,
                ],
                'options' => self::get_profile_names()
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label' => __('Profile Link', SA_ELEMENTOR_TEXTDOMAIN),
                'placeholder' => __('Add your profile link', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::URL,
                'label_block' => false,
                'autocomplete' => false,
                'show_external' => false,
                'condition' => [
                    'name!' => 'email'
                ]
            ]
        );

        $repeater->add_control(
            'email',
            [
                'label' => __('Email Address', SA_ELEMENTOR_TEXTDOMAIN),
                'placeholder' => __('Add your email address', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'input_type' => 'email',
                'condition' => [
                    'name' => 'email'
                ]
            ]
        );

        $repeater->add_control(
            'customize',
            [
                'label' => __('Want To Customize?', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', SA_ELEMENTOR_TEXTDOMAIN),
                'label_off' => __('No', SA_ELEMENTOR_TEXTDOMAIN),
                'return_value' => 'yes',
            ]
        );

        $repeater->start_controls_tabs(
            '_tab_icon_colors',
            [
                'condition' => ['customize' => 'yes']
            ]
        );
        $repeater->start_controls_tab(
            '_tab_icon_normal',
            [
                'label' => __('Normal', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $repeater->add_control(
            'color',
            [
                'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa-el-team-member-links > {{CURRENT_ITEM}}' => 'color: {{VALUE}}',
                ],
                'condition' => ['customize' => 'yes']
            ]
        );

        $repeater->add_control(
            'bg_color',
            [
                'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa-el-team-member-links > {{CURRENT_ITEM}}' => 'background-color: {{VALUE}}',
                ],
                'condition' => ['customize' => 'yes']
            ]
        );

        $repeater->end_controls_tab();
        $repeater->start_controls_tab(
            '_tab_icon_hover',
            [
                'label' => __('Hover', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $repeater->add_control(
            'hover_color',
            [
                'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa-el-team-member-links > {{CURRENT_ITEM}}:hover, {{WRAPPER}} .sa-el-team-member-links > {{CURRENT_ITEM}}:focus' => 'color: {{VALUE}}',
                ],
                'condition' => ['customize' => 'yes']
            ]
        );

        $repeater->add_control(
            'hover_bg_color',
            [
                'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa-el-team-member-links > {{CURRENT_ITEM}}:hover, {{WRAPPER}} .sa-el-team-member-links > {{CURRENT_ITEM}}:focus' => 'background-color: {{VALUE}}',
                ],
                'condition' => ['customize' => 'yes']
            ]
        );

        $repeater->add_control(
            'hover_border_color',
            [
                'label' => __('Border Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa-el-team-member-links > {{CURRENT_ITEM}}:hover, {{WRAPPER}} .sa-el-team-member-links > {{CURRENT_ITEM}}:focus' => 'border-color: {{VALUE}}',
                ],
                'condition' => ['customize' => 'yes']
            ]
        );

        $repeater->end_controls_tab();
        $repeater->end_controls_tabs();

        $this->add_control(
            'show_profiles',
            [
                'label' => __('Show Profiles', 'plugin-domain'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'your-plugin'),
                'label_off' => __('Hide', 'your-plugin'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'profiles',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(name.slice(0,1).toUpperCase() + name.slice(1)) #>',
                'default' => [
                    [
                        'link' => ['url' => 'https://facebook.com/'],
                        'name' => 'facebook'
                    ],
                    [
                        'link' => ['url' => 'https://twitter.com/'],
                        'name' => 'twitter'
                    ],
                    [
                        'link' => ['url' => 'https://linkedin.com/'],
                        'name' => 'linkedin'
                    ]
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_image',
            [
                'label' => __('Photo', SA_ELEMENTOR_TEXTDOMAIN),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'image_width',
            [
                'label' => __('Width', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    '%' => [
                        'min' => 20,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 100,
                        'max' => 700,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-team-member-figure' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_height',
            [
                'label' => __('Height', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 700,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-team-member-figure' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_spacing',
            [
                'label' => __('Bottom Spacing', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-team-member-figure' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_padding',
            [
                'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-team-member-figure > img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'selector' => '{{WRAPPER}} .sa-el-team-member-figure > img'
            ]
        );

        $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-team-member-figure > img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'image_box_shadow',
                'exclude' => [
                    'box_shadow_position',
                ],
                'selector' => '{{WRAPPER}} .sa-el-team-member-figure > img'
            ]
        );

        $this->add_control(
            'image_bg_color',
            [
                'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa-el-team-member-figure > img' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __('Name, Job Title & Bio', SA_ELEMENTOR_TEXTDOMAIN),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __('Content Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-team-member-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            '_heading_title',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Name', SA_ELEMENTOR_TEXTDOMAIN),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => __('Bottom Spacing', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-team-member-name' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa-el-team-member-name' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .sa-el-team-member-name',
                'scheme' => Scheme_Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'title_text_shadow',
                'selector' => '{{WRAPPER}} .sa-el-team-member-name',
            ]
        );

        $this->add_control(
            '_heading_job_title',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Job Title', SA_ELEMENTOR_TEXTDOMAIN),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'job_title_spacing',
            [
                'label' => __('Bottom Spacing', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-team-member-position' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'job_title_color',
            [
                'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa-el-team-member-position' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'job_title_typography',
                'selector' => '{{WRAPPER}} .sa-el-team-member-position',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'job_title_text_shadow',
                'selector' => '{{WRAPPER}} .sa-el-team-member-position',
            ]
        );

        $this->add_control(
            '_heading_bio',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Short Bio', SA_ELEMENTOR_TEXTDOMAIN),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'bio_spacing',
            [
                'label' => __('Bottom Spacing', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-team-member-bio' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'bio_color',
            [
                'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa-el-team-member-bio' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'bio_typography',
                'selector' => '{{WRAPPER}} .sa-el-team-member-bio',
                'scheme' => Scheme_Typography::TYPOGRAPHY_3,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'bio_text_shadow',
                'selector' => '{{WRAPPER}} .sa-el-team-member-bio',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_social',
            [
                'label' => __('Social Icons', SA_ELEMENTOR_TEXTDOMAIN),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'links_spacing',
            [
                'label' => __('Right Spacing', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-team-member-links > a:not(:last-child)' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'links_padding',
            [
                'label' => __('Padding', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-team-member-links > a' => 'padding: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'links_icon_size',
            [
                'label' => __('Icon Size', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-team-member-links > a' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'links_border',
                'selector' => '{{WRAPPER}} .sa-el-team-member-links > a'
            ]
        );

        $this->add_responsive_control(
            'links_border_radius',
            [
                'label' => __('Border Radius', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .sa-el-team-member-links > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('_tab_links_colors');
        $this->start_controls_tab(
            '_tab_links_normal',
            [
                'label' => __('Normal', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'links_color',
            [
                'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa-el-team-member-links > a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'links_bg_color',
            [
                'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa-el-team-member-links > a' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->start_controls_tab(
            '_tab_links_hover',
            [
                'label' => __('Hover', SA_ELEMENTOR_TEXTDOMAIN),
            ]
        );

        $this->add_control(
            'links_hover_color',
            [
                'label' => __('Text Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa-el-team-member-links > a:hover, {{WRAPPER}} .sa-el-team-member-links > a:focus' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'links_hover_bg_color',
            [
                'label' => __('Background Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa-el-team-member-links > a:hover, {{WRAPPER}} .sa-el-team-member-links > a:focus' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'links_hover_border_color',
            [
                'label' => __('Border Color', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sa-el-team-member-links > a:hover, {{WRAPPER}} .sa-el-team-member-links > a:focus' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'links_border_border!' => '',
                ]
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $this->add_inline_editing_attributes('title', 'none');
        $this->add_render_attribute('title', 'class', 'sa-el-team-member-name');

        $this->add_inline_editing_attributes('job_title', 'none');
        $this->add_render_attribute('job_title', 'class', 'sa-el-team-member-position');

        $this->add_inline_editing_attributes('bio', 'basic');
        $this->add_render_attribute('bio', 'class', 'sa-el-team-member-bio');
        ?>

        <?php if ($settings['image']['url'] || $settings['image']['id']) :
            $this->add_render_attribute('image', 'src', $settings['image']['url']);
            $this->add_render_attribute('image', 'alt', Control_Media::get_image_alt($settings['image']));
            $this->add_render_attribute('image', 'title', Control_Media::get_image_title($settings['image']));
            $settings['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
            ?>
            <figure class="sa-el-team-member-figure">
                <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'image'); ?>
            </figure>
        <?php endif; ?>

        <div class="sa-el-team-member-body">
            <?php if ($settings['title']) :
                printf(
                    '<%1$s %2$s>%3$s</%1$s>',
                    tag_escape($settings['title_tag']),
                    $this->get_render_attribute_string('title'),
                    esc_html($settings['title'])
                );
            endif; ?>

            <?php if ($settings['job_title']) : ?>
                <div <?php echo $this->get_render_attribute_string('job_title'); ?>><?php echo esc_html($settings['job_title']); ?></div>
            <?php endif; ?>

            <?php if ($settings['bio']) : ?>
                <div <?php echo $this->get_render_attribute_string('bio'); ?>>
                    <p><?php echo wp_kses_data($settings['bio']); ?></p>
                </div>
            <?php endif; ?>

            <?php if ($settings['show_profiles'] && is_array($settings['profiles'])) : ?>
                <div class="sa-el-team-member-links">
                    <?php
                    foreach ($settings['profiles'] as $profile) :
                        $icon = $profile['name'];
                        $url = esc_url($profile['link']['url']);

                        if ($profile['name'] === 'website') {
                            $icon = 'globe';
                        } elseif ($profile['name'] === 'email') {
                            $icon = 'envelope';
                            $url = 'mailto:' . antispambot($profile['email']);
                        }

                        printf(
                            '<a target="_blank" rel="noopener" data-tooltip="hello" href="%s" class="elementor-repeater-item-%s"><i class="fa fa-%s" aria-hidden="true"></i></a>',
                            $url,
                            esc_attr($profile['_id']),
                            esc_attr($icon)
                        );
                    endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php
    }

    public function _content_template()
    { }
}
