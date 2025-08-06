<?php

namespace ACUASAFEPLUGIN\Element;

use Elementor\Controls_Manager;
use Elementor\Controls_Stack;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class H3_Shop extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'acuasafe_h3_shop';
	}

	/**
	 * Get widget title.
	 * Retrieve button widget title.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'H3 Shop', 'acuasafe' );
	}

	/**
	 * Get widget icon.
	 * Retrieve button widget icon.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-briefcase';
	}

	/**
	 * Get widget categories.
	 * Retrieve the list of categories the button widget belongs to.
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since  2.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'acuasafe' ];
	}
	
	/**
	 * Register button widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'h3_shop',
			[
				'label' => esc_html__( 'H3 Shop', 'acuasafe' ),
			]
		);
		$this->add_control(
			'sec_class',
			[
				'label'       => __( 'Section Class', 'rashid' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Section Class', 'rashid' ),
			]
		);
		$this->add_control(
			'bgimg',
			[
				'label' => esc_html__('Background image', 'rashid'),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'rashid' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'rashid' ),
			]
		);
		
		$this->end_controls_section();
		
		// New Tab#1

		$this->start_controls_section(
					'content_section',
					[
						'label' => __( 'Shop Block', 'rashid' ),
						'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
					]
				);
				$this->add_control(
				  'repeat', 
					[
						'type' => Controls_Manager::REPEATER,
						'seperator' => 'before',
						'default' => 
							[
								['block_title' => esc_html__('Projects Completed', 'rashid')],
							],
						'fields' => 
							[
								'block_column'=>
								[
									'name' => 'block_column',
									'label'   => esc_html__( 'Column', 'rashid' ),
									'type'    => Controls_Manager::NUMBER,
									'default' => 2,
									'min'     => 1,
									'max'     => 12,
									'step'    => 1,
								],
								'block_image'=>
								[
									'name' => 'block_image',
									'label' => __( 'Image', 'rashid' ),
									'type' => Controls_Manager::MEDIA,
									'default' => ['url' => Utils::get_placeholder_image_src(),],
								],
								'block_alt_text'=>
								[
									'name' => 'block_alt_text',
									'label' => esc_html__('Alt Text', 'rashid'),
									'type' => Controls_Manager::TEXTAREA,
									'default' => esc_html__('', 'rashid')
								],
								'block_bgimg'=>
								[
									'name' => 'block_bgimg',
									'label' => esc_html__('Background image', 'rashid'),
									'type' => Controls_Manager::MEDIA,
									'default' => ['url' => Utils::get_placeholder_image_src(),],
								],
								'block_subtitle'=>
								[
									'name' => 'block_subtitle',
									'label' => esc_html__('Subtitle', 'rashid'),
									'type' => Controls_Manager::TEXTAREA,
									'default' => esc_html__('', 'rashid')
								],
								'block_title'=>
								[
									'name' => 'block_title',
									'label' => esc_html__('Title', 'rashid'),
									'type' => Controls_Manager::TEXTAREA,
									'default' => esc_html__('', 'rashid')
								],
								'block_price'=>
								[
									'name' => 'block_price',
									'label' => esc_html__('Price', 'rashid'),
									'type' => Controls_Manager::TEXTAREA,
									'default' => esc_html__('', 'rashid')
								],
								'block_text'=>
								[
									'name' => 'block_text',
									'label' => esc_html__('Text', 'rashid'),
									'type' => Controls_Manager::TEXTAREA,
									'default' => esc_html__('', 'rashid')
								],
								'block_button'=>
								[
									'name' => 'block_button',
									'label'       => __( 'Button', 'rashid' ),
									'type'        => Controls_Manager::TEXT,
									'dynamic'     => [
										'active' => true,
									],
									'placeholder' => __( 'Enter your Button Title', 'rashid' ),
								],
								'block_btnlink'=>
								[
									'name' => 'block_btnlink',
									'label' => __( 'Button Url', 'rashid' ),
									'type' => Controls_Manager::URL,
									'placeholder' => __( 'https://your-link.com', 'rashid' ),
									'show_external' => true,
									'default' => [
									'url' => '',
									'is_external' => true,
									'nofollow' => true,
									],
								],
							],
						'title_field' => '{{block_title}}',
					 ]
			);
				
				
		$this->end_controls_section();	
		
		
		// Section Title 	==================
		
		$this->start_controls_section(
			'section_title_settings',
			array(
				'label' => __( 'Section Title Setting', 'acuasafe' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);		
		
		$this->add_control(
			'show_section_title',
			array(
				'label' => esc_html__( 'Show Section Title', 'acuasafee' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'show' => [
						'show' => esc_html__( 'Show', 'acuasafe' ),	
						'icon' => 'eicon-check-circle',
					],
					'none' => [
						'none' => esc_html__( 'Hide', 'acuasafe' ),
						'icon' => 'eicon-close-circle',
					],
				],
				'default' => 'show',
				'selectors' => array(
					'{{WRAPPER}} .shop-section .sec-title h2' => 'display: {{VALUE}} !important',
				),   
			) 
		);  
		
		$this->add_control(
			'section_title_alingment',
			array(
				'label' => esc_html__( 'Alignment', 'acuasafe' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'acuasafe' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'acuasafe' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'acuasafe' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'condition'    => array( 'show_section_title' => 'show' ),
				'toggle' => true,
				'selectors' => array(
				
					'{{WRAPPER}} .shop-section .sec-title h2' => 'text-align: {{VALUE}} !important',
				),
			)
		);
		
		$this->add_control(
			'section_title_margin',
			array(
				'label'     => __( 'Margin', 'acuasafe' ),
				'condition'    => array( 'show_section_title' => 'show' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}} .shop-section .sec-title h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		$this->add_control(
			'section_title_padding',
			array(
				'label'     => __( 'Padding', 'acuasafe' ),
				'condition'    => array( 'show_section_title' => 'show' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}} .shop-section .sec-title h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'section_title_typography',
				'condition'    => array( 'show_section_title' => 'show' ),
				'label'    => __( 'Typography', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .shop-section .sec-title h2',
			)
		);
		
		$this->add_control(
			'section_title_color',
			array(
				'label'     => __( 'Color', 'acuasafe' ),
				'condition'    => array( 'show_section_title' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .shop-section .sec-title h2' => 'color: {{VALUE}} !important',
				),
			)
		);

		$this->end_controls_section();	
		
		//End of  Title 	==================	
		
	//Text==========================
		$this->start_controls_section(
			'text_settings',
			array(
				'label' => __( 'Text Setting', 'acuasafee' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		
		$this->add_control(
			'show_text',
			array(
				'label' => esc_html__( 'Show Text', 'acuasafee' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'show' => [
						'show' => esc_html__( 'Show', 'acuasafee' ),	
						'icon' => 'eicon-check-circle',
					],
					'none' => [
						'none' => esc_html__( 'Hide', 'acuasafee' ),
						'icon' => 'eicon-close-circle',
					],
				],
				'default' => 'show',
				'selectors' => array(
					'{{WRAPPER}} .shop-section .shop-block-one .inner-box .lower-content span' => 'display: {{VALUE}} !important',
				),    
			)
		);
		
		$this->add_control(
			'text_alignment',
			array(
				'label' => esc_html__( 'Alignment', 'acuasafee' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'acuasafee' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'acuasafee' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'acuasafee' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'condition'    => array( 'show_text' => 'show' ),
				'toggle' => true,
				'selectors' => array(
					'{{WRAPPER}} .shop-section .shop-block-one .inner-box .lower-content span' => 'text-align: {{VALUE}} !important',
				), 
			)
		);
		
		$this->add_control(
			'text_margin',
			array(
				'label'     => __( 'Margin', 'acuasafee' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'condition'    => array( 'show_text' => 'show' ),
				'selectors' => array(
					'{{WRAPPER}} .shop-section .shop-block-one .inner-box .lower-content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		
		$this->add_control(
			'text_padding',
			array(
				'label'     => __( 'Padding', 'acuasafee' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'condition'    => array( 'show_text' => 'show' ),
				'selectors' => array(
					'{{WRAPPER}} .shop-section .shop-block-one .inner-box .lower-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'text_typography',
				'condition'    => array( 'show_text' => 'show' ),
				'label'    => __( 'Typography', 'acuasafee' ),
				'selector' => '{{WRAPPER}} .shop-section .shop-block-one .inner-box .lower-content span',
			)
		); 
		
		$this->add_control(
			'text_color',
			array(
				'label'     => __( 'Color', 'acuasafee' ),
				'condition'    => array( 'show_text' => 'show' ),
				'separator' => 'after',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .shop-section .shop-block-one .inner-box .lower-content span' => 'color: {{VALUE}} !important',
				),
			)
		);

		$this->add_control(
			'text_hover_color',
			array(
				'label'     => __( 'Hover Color', 'acuasafee' ),
				'condition'    => array( 'show_text' => 'show' ),
				'separator' => 'after',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .shop-section .shop-block-one .inner-box .lower-content span:hover' => 'color: {{VALUE}} !important',
				),
			)
		);

		$this->end_controls_section();
		
		//End of Text=========	
		
		// Title 	==================	


		$this->start_controls_section(
			'title_settings',
			array(
				'label' => __( 'Title Setting', 'acuasafe' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
				
		$this->add_control(
			'show_title',
			array(
				'label' => esc_html__( 'Show Title', 'acuasafee' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'show' => [
						'show' => esc_html__( 'Show', 'acuasafe' ),	
						'icon' => 'eicon-check-circle',
					],
					'none' => [
						'none' => esc_html__( 'Hide', 'acuasafe' ),
						'icon' => 'eicon-close-circle',
					],
				],
				'default' => 'show',
				'selectors' => array(
					'{{WRAPPER}} .shop-section .shop-block-one .inner-box .lower-content h4 a' => 'display: {{VALUE}} !important',
				),   
			) 
		);
		
		$this->add_control(
			'title_alignment',
			array(
				'label' => esc_html__( 'Alignment', 'acuasafe' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'acuasafe' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'acuasafe' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'acuasafe' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'condition'    => array( 'show_title' => 'show' ),
				'toggle' => true,
				'selectors' => array(
				
					'{{WRAPPER}} .shop-section .shop-block-one .inner-box .lower-content h4' => 'text-align: {{VALUE}} !important',
				), 
			)
		);
		
		$this->add_control(
			'title_margin',
			array(
				'label'     => __( 'Margin', 'acuasafe' ),
				'condition'    => array( 'show_title' => 'show' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}} .shop-section .shop-block-one .inner-box .lower-content h4 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		$this->add_control(
			'title_padding',
			array(
				'label'     => __( 'Padding', 'acuasafe' ),
				'condition'    => array( 'show_title' => 'show' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}} .shop-section .shop-block-one .inner-box .lower-content h4 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'condition'    => array( 'show_title' => 'show' ),
				'label'    => __( 'Typography', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .shop-section .shop-block-one .inner-box .lower-content h4 a',
			)
		);
		
		$this->add_control(
			'title_color',
			array(
				'label'     => __( 'Color', 'acuasafe' ),
				'condition'    => array( 'show_title' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .shop-section .shop-block-one .inner-box .lower-content h4 a' => 'color: {{VALUE}} !important',
		
				),
			)
		);

		$this->add_control(
			'title_hover_color',
			array(
				'label'     => __( 'Hover Color', 'acuasafe' ),
				'condition'    => array( 'show_title' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .shop-section .shop-block-one .inner-box .lower-content h4 a:hover' => 'color: {{VALUE}} !important',
		
				),
			)
		);

		$this->end_controls_section();	
		
		
		//End of  Title 	==================
		
		//Sub Title	==================	
	

		$this->start_controls_section(
			'subtitle_settings',
			array(
				'label' => __( 'Sub Title Setting', 'acuasafee' ),
			
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
	
	$this->add_control(
			'show_subtitle',
			array(
				'label' => esc_html__( 'Show Sub Title', 'acuasafee' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'show' => [
						'show' => esc_html__( 'Show', 'acuasafee' ),	
						'icon' => 'eicon-check-circle',
					],
					'none' => [
						'none' => esc_html__( 'Hide', 'acuasafee' ),
						'icon' => 'eicon-close-circle',
					],
				],
				'default' => 'show',
				'selectors' => array(
					'{{WRAPPER}} .shop-section .shop-block-one .inner-box .lower-content h6' => 'display: {{VALUE}} !important',
				),  
			)
		);	
	$this->add_control(
			'subtitle_alingment',
			array(
				'label' => esc_html__( 'Alignment', 'acuasafee' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'acuasafee' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'acuasafee' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'acuasafee' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'condition'    => array( 'show_subtitle' => 'show' ),
				'toggle' => true,
				'selectors' => array(
				
					'{{WRAPPER}} .shop-section .shop-block-one .inner-box .lower-content h6' => 'text-align: {{VALUE}} !important',
				),
			)
		);	
	$this->add_control(
			'subtitle_padding',
			array(
				'label'     => __( 'Padding', 'acuasafee' ),
				'condition'    => array( 'show_subtitle' => 'show' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
			'{{WRAPPER}} .shop-section .shop-block-one .inner-box .lower-content h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',		
				),
			)
		);
		$this->add_control(
			'subtitle_margin',
			array(
				'label'     => __( 'Margin', 'acuasafee' ),
				'condition'    => array( 'show_subtitle' => 'show' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
			'{{WRAPPER}} .shop-section .shop-block-one .inner-box .lower-content h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',		
				),
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
		
			array(
				'name'     => 'subtitle_typography',
				'condition'    => array( 'show_subtitle' => 'show' ),
				'label'    => __( 'Typography', 'acuasafee' ),
				'selector' => '{{WRAPPER}} .shop-section .shop-block-one .inner-box .lower-content h6',
			)
		);
		
		
		$this->add_control(
			'subtitle_color',
			array(
				'label'     => __( 'Color', 'acuasafee' ),
				'condition'    => array( 'show_subtitle' => 'show' ),
				'separator' => 'after',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .shop-section .shop-block-one .inner-box .lower-content h6' => 'color: {{VALUE}} !important',
				),
			
			)
		);

		$this->end_controls_section();
		
		//End of  Sub Title 	==================	
		
		

//Text==========================

		$this->start_controls_section(
			'text_two_settings',
			array(
				'label' => __( 'Text Two Setting', 'acuasafee' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		
	$this->add_control(
			'show_text_two',
			array(
				'label' => esc_html__( 'Show Text Two', 'acuasafee' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'show' => [
						'show' => esc_html__( 'Show', 'acuasafee' ),	
						'icon' => 'eicon-check-circle',
					],
					'none' => [
						'none' => esc_html__( 'Hide', 'acuasafee' ),
						'icon' => 'eicon-close-circle',
					],
				],
				'default' => 'show',
				'selectors' => array(
					'{{WRAPPER}} .shop-section .shop-block-one .inner-box .lower-content p' => 'display: {{VALUE}} !important',
				),
			)
		);	
	$this->add_control(
			'text_two_alingment',
			array(
				'label' => esc_html__( 'Alignment', 'acuasafee' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'acuasafee' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'acuasafee' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'acuasafee' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'condition'    => array( 'show_text_two' => 'show' ),
				'toggle' => true,
				'selectors' => array(
					'{{WRAPPER}} .shop-section .shop-block-one .inner-box .lower-content p' => 'text-align: {{VALUE}} !important',
				),
			)
		);	
	$this->add_control(
			'text_two_padding',
			array(
				'label'     => __( 'Padding', 'acuasafee' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'condition'    => array( 'show_text_two' => 'show' ),
				'selectors' => array(
					'{{WRAPPER}} .shop-section .shop-block-one .inner-box .lower-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'text_two_typography',
				'condition'    => array( 'show_text_two' => 'show' ),
				'label'    => __( 'Typography', 'acuasafee' ),
				'selector' => '{{WRAPPER}} .shop-section .shop-block-one .inner-box .lower-content p',
			)
		);
		$this->add_control(
			'text_two_color',
			array(
				'label'     => __( 'Color', 'acuasafee' ),
				'condition'    => array( 'show_text_two' => 'show' ),
				'separator' => 'after',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .shop-section .shop-block-one .inner-box .lower-content p' => 'color: {{VALUE}} !important',
				),
			)
		);

		$this->end_controls_section();
		
		//End of Text=========		
		
		//========== Button with Background ===================================
		
		$this->start_controls_section(
			'button_control',
			array(
				'label' => __( 'Button Settings', 'acuasafe' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		
		$this->add_control(
			'show_button',
			array(
				'label' => esc_html__( 'Show Button', 'acuasafe' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'show' => [
						'show' => esc_html__( 'Show', 'acuasafe' ),	
						'icon' => 'eicon-check-circle',
					],
					'none' => [
						'none' => esc_html__( 'Hide', 'acuasafe' ),
						'icon' => 'eicon-close-circle',
					],
				],
				'default' => 'show',
				'selectors' => array(
					'{{WRAPPER}} .shop-section .theme-btn.btn-two' => 'display: {{VALUE}} !important',
				),  
			)
		);		
		$this->add_control(
			'button_alingment',
			array(
				'label' => esc_html__( 'Alignment', 'acuasafe' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'condition'    => array( 'show_button' => 'show' ),
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'acuasafe' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'acuasafe' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'acuasafe' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => array(
					'{{WRAPPER}} .shop-section .btn-box' => 'text-align: {{VALUE}} !important',
				), 
			)
		);	
		$this->add_control(
			'button_color',
			array(
				'label'     => __( 'Button Color', 'acuasafe' ),
				'condition'    => array( 'show_button' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .shop-section .theme-btn.btn-two' => 'color: {{VALUE}} !important',

				),
			)
		);
		$this->add_control(
			'button_bg_color',
			array(
				'label'     => __( 'Background Color', 'acuasafe' ),
				'condition'    => array( 'show_button' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .shop-section .theme-btn.btn-two' => 'background: {{VALUE}} !important',
				),
			)
		);	
		
		$this->add_control(
			'button_hover_color',
			array(
				'label'     => __( 'Hover Color', 'acuasafe' ),
				'condition'    => array( 'show_button' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .shop-section .theme-btn.btn-two:hover' => 'color: {{VALUE}} !important',
				), 
			)
		);	
		
		$this->add_control(
			'button_hover_bg_color',
			array(
				'label'     => __( 'Hover Background Color', 'acuasafe' ),
				'condition'    => array( 'show_button' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .shop-section .theme-btn.btn-two:before' => 'background: {{VALUE}} !important',
				),
			)
		);
		
		$this->add_control(
			'button_padding',
			array(
				'label'     => __( 'Padding', 'acuasafe' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'condition'    => array( 'show_button' => 'show' ),
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}} .shop-section .theme-btn.btn-two' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		$this->add_control(
			'button_margin',
			array(
				'label'     => __( 'Margin', 'acuasafe' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'condition'    => array( 'show_button' => 'show' ),
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .shop-section .theme-btn.btn-two' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'button_typography',
				'condition'    => array( 'show_button' => 'show' ),
				'label'    => __( 'Typography', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .shop-section .theme-btn.btn-two',
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name' => 'border',
				'condition'    => array( 'show_button' => 'show' ),
				'selector' => '{{WRAPPER}} .shop-section .theme-btn.btn-two',
			)
		);
		
		$this->add_control(
			'border_radius',
			array(
				'label'     => __( 'Border Radius', 'acuasafe' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'condition'    => array( 'show_button' => 'show' ),
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}} .shop-section .theme-btn.btn-two' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		$this->end_controls_section();
		
		//End of Button
		
		}

	/**
	 * Render button widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$allowed_tags = wp_kses_allowed_html('post');
		?>
        
		<!-- shop-section -->
        <section class="shop-section centred pt-145 bg-color-1 <?php echo esc_attr($settings['sec_class']);?>">
			<?php  if ( esc_url($settings['bgimg']['id']) ) : ?>
            <div class="pattern-layer" style="background-image: url(<?php echo wp_get_attachment_url($settings['bgimg']['id']);?>);">
			<?php else :?>	
			<div class="noimage">
			<?php endif;?>
			</div>
            <div class="auto-container">
				<?php if($settings['title']): ?>
                <div class="sec-title">
                    <h2><?php echo $settings['title'];?></h2>
                </div>
				<?php endif; ?>
                <div class="row clearfix">
					<?php foreach($settings['repeat'] as $item):?>
                    <div class="col-lg-<?php echo esc_attr($item['block_column'], true );?> col-md-6 col-sm-12 shop-block">
                        <div class="shop-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500m">
                            <div class="inner-box">
                                <figure class="image-box">
									<img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
								</figure>
                                <div class="lower-content">
                                    <div class="shape" style="background-image: url(<?php echo wp_get_attachment_url($item['block_bgimg']['id']);?>);"></div>
                                    <span><?php echo wp_kses($item['block_subtitle'], $allowed_tags);?></span>
                                    <h4><a href="<?php echo esc_url($item['block_btnlink']['url']);?>"><?php echo wp_kses($item['block_title'], $allowed_tags);?></a></h4>
                                    <h6><?php echo esc_attr($item['block_price']);?></h6>
                                    <p><?php echo wp_kses($item['block_text'], $allowed_tags);?></p>
									<?php if(wp_kses($item['block_button'], $allowed_tags)): ?>
                                    <div class="btn-box">
                                        <a href="<?php echo esc_url($item['block_btnlink']['url']);?>" class="theme-btn btn-two"><?php echo wp_kses($item['block_button'], $allowed_tags);?></a>
                                    </div>
									<?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php endforeach; ?>
                </div>
            </div>
        </section>
             
		<?php 
	}

}