<?php

namespace SA_ELEMENTOR_ADDONS\Elements\Testimonial;

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}

use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Group_Control_Border as Group_Control_Border;
use \Elementor\Group_Control_Image_Size as Group_Control_Image_Size;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Utils as Utils;
use \Elementor\Widget_Base as Widget_Base;

class Testimonial extends Widget_Base {

	public function get_name() {
		return 'sa-el-testimonial';
	}

	public function get_title() {
		return esc_html__( 'Testimonial', SA_ELEMENTOR_TEXTDOMAIN );
	}

	public function get_icon() {
		return 'eicon-testimonial oxi-el-admin-icon';
	}

   public function get_categories() {
		return [ 'sa-el-addons' ];
	}


	protected function _register_controls() {


  		$this->start_controls_section(
  			'sa_el_section_testimonial_image',
  			[
  				'label' => esc_html__( 'Testimonial Image', SA_ELEMENTOR_TEXTDOMAIN )
  			]
  		);

		$this->add_control(
			'sa_el_testimonial_enable_avatar',
			[
				'label' => esc_html__( 'Display Avatar?', SA_ELEMENTOR_TEXTDOMAIN ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __( 'Testimonial Avatar', SA_ELEMENTOR_TEXTDOMAIN ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'sa_el_testimonial_enable_avatar' => 'yes',
				],
			]
		);


		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'		=> 'image',
				'default'	=> 'thumbnail',
				'condition' => [
					'image[url]!' => '',
					'sa_el_testimonial_enable_avatar' => 'yes',
				],
			]
		);


		$this->end_controls_section();

  		$this->start_controls_section(
  			'sa_el_section_testimonial_content',
  			[
  				'label' => esc_html__( 'Testimonial Content', SA_ELEMENTOR_TEXTDOMAIN )
  			]
  		);

		$this->add_control(
			'sa_el_testimonial_name',
			[
				'label' => esc_html__( 'User Name', SA_ELEMENTOR_TEXTDOMAIN ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Mr John', SA_ELEMENTOR_TEXTDOMAIN ),
				'dynamic' => [ 'active' => true ]
			]
		);

		$this->add_control(
			'sa_el_testimonial_company_title',
			[
				'label' => esc_html__( 'Company Name', SA_ELEMENTOR_TEXTDOMAIN ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( ' New York', SA_ELEMENTOR_TEXTDOMAIN ),
				'dynamic' => [ 'active' => true ]
			]
		);

		$this->add_control(
			'sa_el_testimonial_description',
			[
				'label' => esc_html__( 'Testimonial Description', SA_ELEMENTOR_TEXTDOMAIN ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,', SA_ELEMENTOR_TEXTDOMAIN ),
			]
		);


		$this->add_control(
			'sa_el_testimonial_enable_rating',
			[
				'label' => esc_html__( 'Display Rating?', SA_ELEMENTOR_TEXTDOMAIN ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);


		$this->add_control(
		  'sa_el_testimonial_rating_number',
		  [
		     'label'       => __( 'Rating Number', SA_ELEMENTOR_TEXTDOMAIN ),
		     'type' => Controls_Manager::SELECT,
		     'default' => 'rating-five',
		     'options' => [
		     	'rating-one'  => __( '1', SA_ELEMENTOR_TEXTDOMAIN ),
		     	'rating-two' => __( '2', SA_ELEMENTOR_TEXTDOMAIN ),
		     	'rating-three' => __( '3', SA_ELEMENTOR_TEXTDOMAIN ),
		     	'rating-four' => __( '4', SA_ELEMENTOR_TEXTDOMAIN ),
		     	'rating-five'   => __( '5', SA_ELEMENTOR_TEXTDOMAIN ),
		     ],
			'condition' => [
				'sa_el_testimonial_enable_rating' => 'yes',
			],
		  ]
		);

		$this->end_controls_section();


		if (!apply_filters(SA_ELEMENTOR_TEXTDOMAIN . '/pro-enable', ['', '', TRUE])) {
            $this->start_controls_section(
                    'sa_el_section_pro', [
                'label' => __('Go Premium for More Features', SA_ELEMENTOR_TEXTDOMAIN)
                    ]
            );

            $this->add_control(
                    'sa_el_control_get_pro', [
                'label' => __('Unlock more possibilities', SA_ELEMENTOR_TEXTDOMAIN),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    '1' => [
                        'title' => __('', SA_ELEMENTOR_TEXTDOMAIN),
                        'icon' => 'fa fa-unlock-alt',
                    ],
                ],
                'default' => '1',
                'description' => '<span class="pro-feature"> Get the  <a href="https://www.oxilab.org/downloads/short-code-addons/" target="_blank">Pro version</a> for more stunning elements and customization options.</span>'
                    ]
            );

            $this->end_controls_section();
        }


		$this->start_controls_section(
			'sa_el_section_testimonial_styles_general',
			[
				'label' => esc_html__( 'Testimonial Styles', SA_ELEMENTOR_TEXTDOMAIN ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'sa_el_testimonial_style',
			[
				'label'		=> __( 'Select Style', SA_ELEMENTOR_TEXTDOMAIN ),
				'type'		=> Controls_Manager::SELECT,
				'default'	=> 'default-style',
				'options'	=> [
					'default-style'						=> __( 'Default', SA_ELEMENTOR_TEXTDOMAIN ),
					'classic-style'						=> __( 'Classic', SA_ELEMENTOR_TEXTDOMAIN ),
					'middle-style'						=> __( 'Content | Image | Bio', SA_ELEMENTOR_TEXTDOMAIN ),
					'icon-img-left-content'				=> __( 'Image | Content', SA_ELEMENTOR_TEXTDOMAIN ),
					'icon-img-right-content'			=> __( 'Content | Image', SA_ELEMENTOR_TEXTDOMAIN ),
					'content-bottom-icon-title-inline'		=> __( 'Content Top | Title Inline', SA_ELEMENTOR_TEXTDOMAIN ),
					'content-top-icon-title-inline'	=> __( 'Content Bottom | Title Inline', SA_ELEMENTOR_TEXTDOMAIN )
				]
			]
		);

		$this->add_control(
			'sa_el_testimonial_alignment',
			[
				'label' => esc_html__( 'Layout Alignment', SA_ELEMENTOR_TEXTDOMAIN ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => true,
				'options' => [
					'default' => [
						'title' => __( 'Default', SA_ELEMENTOR_TEXTDOMAIN ),
						'icon' => 'fa fa-ban',
					],
					'left' => [
						'title' => esc_html__( 'Left', SA_ELEMENTOR_TEXTDOMAIN ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', SA_ELEMENTOR_TEXTDOMAIN ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', SA_ELEMENTOR_TEXTDOMAIN ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'default',
				'selectors' => [
					'{{WRAPPER}} .sa-el-testimonial-content' => 'text-align: {{VALUE}};',
					'{{WRAPPER}} .sa-el-testimonial-image' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'sa_el_testimonial_user_display_block',
			[
				'label' => esc_html__( 'Display User & Company Block?', SA_ELEMENTOR_TEXTDOMAIN ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'sa_el_section_testimonial_image_styles',
			[
				'label' => esc_html__( 'Testimonial Image Style', SA_ELEMENTOR_TEXTDOMAIN ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition'	=> [
					'sa_el_testimonial_enable_avatar'	=> 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'sa_el_testimonial_image_width',
			[
				'label' => esc_html__( 'Image Width', SA_ELEMENTOR_TEXTDOMAIN ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 150,
					'unit' => 'px',
				],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'size_units' => [ '%', 'px' ],
				'selectors' => [
					'{{WRAPPER}} .sa-el-testimonial-image figure > img' => 'width:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'sa_el_testimonial_max_image_width',
			[
				'label' => esc_html__( 'Image Max Width', SA_ELEMENTOR_TEXTDOMAIN ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 100,
					'unit' => '%',
				],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ '%' ],
				'selectors' => [
					'{{WRAPPER}} .sa-el-testimonial-image' => 'max-width:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'sa_el_testimonial_image_margin',
			[
				'label' => esc_html__( 'Margin', SA_ELEMENTOR_TEXTDOMAIN ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .sa-el-testimonial-image img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'sa_el_testimonial_image_padding',
			[
				'label' => esc_html__( 'Padding', SA_ELEMENTOR_TEXTDOMAIN ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .sa-el-testimonial-image img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'sa_el_testimonial_image_border',
				'label' => esc_html__( 'Border', SA_ELEMENTOR_TEXTDOMAIN ),
				'selector' => '{{WRAPPER}} .sa-el-testimonial-image img',
			]
		);

		$this->add_control(
			'sa_el_testimonial_image_rounded',
			[
				'label' => esc_html__( 'Rounded Avatar?', SA_ELEMENTOR_TEXTDOMAIN ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'testimonial-avatar-rounded',
				'default' => '',
			]
		);


		$this->add_control(
			'sa_el_testimonial_image_border_radius',
			[
				'label' => esc_html__( 'Border Radius', SA_ELEMENTOR_TEXTDOMAIN ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .sa-el-testimonial-image img' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
				],
				'condition' => [
					'sa_el_testimonial_image_rounded!' => 'testimonial-avatar-rounded',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'sa_el_section_testimonial_typography',
			[
				'label' => esc_html__( 'Color &amp; Typography', SA_ELEMENTOR_TEXTDOMAIN ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'sa_el_testimonial_name_heading',
			[
				'label' => __( 'User Name', SA_ELEMENTOR_TEXTDOMAIN ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'sa_el_testimonial_name_color',
			[
				'label' => esc_html__( 'User Name Color', SA_ELEMENTOR_TEXTDOMAIN ),
				'type' => Controls_Manager::COLOR,
				'default' => '#272727',
				'selectors' => [
					'{{WRAPPER}} .sa-el-testimonial-content .sa-el-testimonial-user' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'sa_el_testimonial_name_typography',
				'selector' => '{{WRAPPER}} .sa-el-testimonial-content .sa-el-testimonial-user',
			]
		);

		$this->add_control(
			'sa_el_testimonial_company_heading',
			[
				'label' 	=> __( 'Company Name', SA_ELEMENTOR_TEXTDOMAIN ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before'
			]
		);

		$this->add_control(
			'sa_el_testimonial_company_color',
			[
				'label' => esc_html__( 'Company Color', SA_ELEMENTOR_TEXTDOMAIN ),
				'type' => Controls_Manager::COLOR,
				'default' => '#272727',
				'selectors' => [
					'{{WRAPPER}} .sa-el-testimonial-content .sa-el-testimonial-user-company' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'sa_el_testimonial_position_typography',
				'selector' => '{{WRAPPER}} .sa-el-testimonial-content .sa-el-testimonial-user-company',
			]
		);

		$this->add_control(
			'sa_el_testimonial_description_heading',
			[
				'label' => __( 'Testimonial Text', SA_ELEMENTOR_TEXTDOMAIN ),
				'type' => Controls_Manager::HEADING,
				'separator'	=> 'before'
			]
		);

		$this->add_control(
			'sa_el_testimonial_description_color',
			[
				'label' => esc_html__( 'Testimonial Text Color', SA_ELEMENTOR_TEXTDOMAIN ),
				'type' => Controls_Manager::COLOR,
				'default' => '#7a7a7a',
				'selectors' => [
					'{{WRAPPER}} .sa-el-testimonial-content .sa-el-testimonial-text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
             'name' => 'sa_el_testimonial_description_typography',
				'selector' => '{{WRAPPER}} .sa-el-testimonial-content .sa-el-testimonial-text',
			]
		);

		$this->end_controls_section();
	}
	
	protected function render_testimonial_image() {
		$settings = $this->get_settings();
		$image = Group_Control_Image_Size::get_attachment_image_html( $settings );
		if( ! empty($image) && ! empty($settings['sa_el_testimonial_enable_avatar']) ) {
			ob_start();
			?>
			<div class="sa-el-testimonial-image">
				<?php if( 'yes' == $settings['sa_el_testimonial_enable_avatar'] ) : ?>
					<figure><?php echo Group_Control_Image_Size::get_attachment_image_html( $settings ); ?></figure>
				<?php endif; ?>
			</div>
			<?php
			echo ob_get_clean();
		}
	}

	protected function render_testimonial_rating() {
		$settings = $this->get_settings_for_display('sa_el_testimonial_enable_rating');

		if ( $settings == 'yes' ) :
			ob_start();
		?>
		<ul class="testimonial-star-rating">
			<li><i class="fa fa-star" aria-hidden="true"></i></li>
			<li><i class="fa fa-star" aria-hidden="true"></i></li>
			<li><i class="fa fa-star" aria-hidden="true"></i></li>
			<li><i class="fa fa-star" aria-hidden="true"></i></li>
			<li><i class="fa fa-star" aria-hidden="true"></i></li>
		</ul>
		<?php
			echo ob_get_clean();
		endif;
	}

	protected function render_user_name_and_company() {
		$settings = $this->get_settings_for_display();
		if( ! empty($settings['sa_el_testimonial_name']) ) : ?><p <?php echo $this->get_render_attribute_string('sa_el_testimonial_user'); ?>><?php echo $settings['sa_el_testimonial_name']; ?></p><?php endif;
		if( ! empty($settings['sa_el_testimonial_company_title']) ) : ?><p class="sa-el-testimonial-user-company"><?php echo $settings['sa_el_testimonial_company_title']; ?></p><?php endif;
	}

	protected function testimonial_desc() {
		$settings = $this->get_settings_for_display();
		echo '<div class="sa-el-testimonial-text">'.wpautop($settings['sa_el_testimonial_description']).'</div>';
	}


	protected function render() {

	  $settings = $this->get_settings_for_display();
	  $rating = $this->get_settings_for_display('sa_el_testimonial_enable_rating');

	  $this->add_render_attribute(
		  'sa_el_testimonial_wrap',
		  [
			  'id'	=> 'sa-el-testimonial-'.esc_attr($this->get_id()),
			  'class'	=> [
				  'sa-el-testimonial-item',
				  'clearfix',
				  $this->get_settings('sa_el_testimonial_image_rounded'),
				  esc_attr($settings['sa_el_testimonial_style']),
			  ]
		  ]
	  );

	if ( $rating == 'yes' )
		$this->add_render_attribute('sa_el_testimonial_wrap', 'class', $this->get_settings('sa_el_testimonial_rating_number'));

	$this->add_render_attribute('sa_el_testimonial_user', 'class', 'sa-el-testimonial-user');
	if ( ! empty( $settings['sa_el_testimonial_user_display_block'] ) )
		$this->add_render_attribute('sa_el_testimonial_user', 'style', 'display: block; float: none;');
	

	?>

	<div <?php echo $this->get_render_attribute_string('sa_el_testimonial_wrap'); ?>>

		<?php if('classic-style' == $settings['sa_el_testimonial_style']) { ?>
			<div class="sa-el-testimonial-content">
				<?php
					$this->testimonial_desc();
				?>
				<div class="clearfix">
					<?php $this->render_user_name_and_company(); ?>
				</div>
				<?php $this->render_testimonial_rating( $settings ); ?>
			</div>
			<?php $this->render_testimonial_image(); ?>
		<?php } ?>

		<?php if('middle-style' == $settings['sa_el_testimonial_style']) { ?>
			<div class="sa-el-testimonial-content">
				<?php
					$this->testimonial_desc();
				?>
				<?php $this->render_testimonial_image(); ?>
				<div class="clearfix">
					<?php $this->render_user_name_and_company(); ?>
				</div>
				<?php $this->render_testimonial_rating( $settings ); ?>
			</div>
		<?php } ?>

		<?php if('default-style' == $settings['sa_el_testimonial_style']) { ?>
			<?php $this->render_testimonial_image(); ?>
			<div class="sa-el-testimonial-content">
				<?php
					$this->testimonial_desc();
					$this->render_testimonial_rating( $settings );
					$this->render_user_name_and_company();
				?>
			</div>
		<?php } ?>

		<?php if('icon-img-left-content' == $settings['sa_el_testimonial_style']) { ?>
			<?php
				$this->render_testimonial_image();
			?>
			<div class="sa-el-testimonial-content">
				<?php
					$this->testimonial_desc();
					$this->render_testimonial_rating( $settings );
				?>
				<div class="bio-text clearfix">
					<?php $this->render_user_name_and_company(); ?>
				</div>
			</div>
		<?php } ?>

		<?php if('icon-img-right-content' == $settings['sa_el_testimonial_style']) { ?>
			<?php
				$this->render_testimonial_image();
			?>
			<div class="sa-el-testimonial-content">
				<?php
					$this->testimonial_desc();
					$this->render_testimonial_rating( $settings );
				?>
				<div class="bio-text-right"><?php $this->render_user_name_and_company(); ?></div>
			</div>
		<?php } ?>

		<?php if('content-top-icon-title-inline' == $settings['sa_el_testimonial_style']) { ?>
			<div class="sa-el-testimonial-content sa-el-testimonial-inline-bio">
				<?php $this->render_testimonial_image(); ?>
				<div class="bio-text"><?php $this->render_user_name_and_company(); ?></div>
				<?php $this->render_testimonial_rating( $settings ); ?>
			</div>
			<div class="sa-el-testimonial-content">
				<?php $this->testimonial_desc(); ?>
			</div>
		<?php } ?>

		<?php if('content-bottom-icon-title-inline' == $settings['sa_el_testimonial_style']) { ?>
			<div class="sa-el-testimonial-content">
				<?php $this->testimonial_desc(); ?>
			</div>
			<div class="sa-el-testimonial-content sa-el-testimonial-inline-bio">
				<?php $this->render_testimonial_image(); ?>
				<div class="bio-text"><?php $this->render_user_name_and_company(); ?></div>
				<?php $this->render_testimonial_rating( $settings ); ?>
			</div>
		<?php } ?>

	</div>

	<?php }

	protected function content_template() {}
}