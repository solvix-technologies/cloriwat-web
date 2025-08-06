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
class H3_Pricing extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'acuasafe_h3_pricing';
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
		return esc_html__( 'H3 Pricing', 'acuasafe' );
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
			'h3_pricing',
			[
				'label' => esc_html__( 'H3 Pricing', 'acuasafe' ),
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
		$this->add_control(
			'text',
			[
				'label'       => __( 'Description Text', 'rashid' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Description', 'rashid' ),
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
		
		
		$this->end_controls_section();
		
		// New Tab#1

		$this->start_controls_section(
					'content_section',
					[
						'label' => __( 'Pricing Block', 'rashid' ),
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
								'block_title'=>
								[
									'name' => 'block_title',
									'label' => esc_html__('Title', 'rashid'),
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
								'block_bgimg2'=>
								[
									'name' => 'block_bgimg2',
									'label' => esc_html__('Background image', 'rashid'),
									'type' => Controls_Manager::MEDIA,
									'default' => ['url' => Utils::get_placeholder_image_src(),],
								],
								'block_bgimg3'=>
								[
									'name' => 'block_bgimg3',
									'label' => esc_html__('Background image', 'rashid'),
									'type' => Controls_Manager::MEDIA,
									'default' => ['url' => Utils::get_placeholder_image_src(),],
								],
								'ff_sing'=>
								[
									'name' => 'ff_sing',
									'label' => esc_html__('Counter Sing', 'rashid'),
									'type' => Controls_Manager::TEXT,
									'default' => esc_html__('', 'muzex')
								],
								'block_price'=>
								[
									'name' => 'block_price',
									'label' => esc_html__('Price', 'rashid'),
									'type' => Controls_Manager::TEXTAREA,
									'default' => esc_html__('', 'rashid')
								],
								'block_title2'=>
								[
									'name' => 'block_title2',
									'label' => esc_html__('Title', 'rashid'),
									'type' => Controls_Manager::TEXTAREA,
									'default' => esc_html__('', 'rashid')
								],
								'block_feature_str'=>
								[
									'name' => 'block_feature_str',
									'label'       => __( 'Features List', 'rashid' ),
									'type'        => Controls_Manager::TEXTAREA,
									'dynamic'     => [
										'active' => true,
									],
									'placeholder' => __( 'Enter your Features List', 'rashid' ),
									'default'     => __( '', 'rashid' ),
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
					'{{WRAPPER}} .pricing-section .sec-title h2' => 'display: {{VALUE}} !important',
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
				
					'{{WRAPPER}} .pricing-section .sec-title h2' => 'text-align: {{VALUE}} !important',
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
					'{{WRAPPER}} .pricing-section .sec-title h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
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
					'{{WRAPPER}} .pricing-section .sec-title h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'section_title_typography',
				'condition'    => array( 'show_section_title' => 'show' ),
				'label'    => __( 'Typography', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .pricing-section .sec-title h2',
			)
		);
		
		$this->add_control(
			'section_title_color',
			array(
				'label'     => __( 'Color', 'acuasafe' ),
				'condition'    => array( 'show_section_title' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .sec-title h2' => 'color: {{VALUE}} !important',
				),
			)
		);

		$this->end_controls_section();	
		
		//End of  Title 	==================	
		
		//Section Title Text==========================
		$this->start_controls_section(
			'section_title_text_settings',
			array(
				'label' => __( 'Section Title Text Setting', 'acuasafe' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		
		$this->add_control(
			'show_section_title_text',
			array(
				'label' => esc_html__( 'Show Section Title Text', 'acuasafe' ),
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
					'{{WRAPPER}} .pricing-section .content-box .text p' => 'display: {{VALUE}} !important',
				), 
			)
		);
		
		$this->add_control(
			'section_title_text_alingment',
			array(
				'label' => esc_html__( 'Section Title Text Alignment', 'acuasafe' ),
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
				'condition'    => array( 'show_section_title_text' => 'show' ),
				'toggle' => true,
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .content-box .text p' => 'text-align: {{VALUE}} !important',
				),
			)
		);
		
		$this->add_control(
			'section_title_text_margin',
			array(
				'label'     => __( 'Section Text Margin', 'acuasafe' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'condition'    => array( 'show_section_title_text' => 'show' ),
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .content-box .text p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				), 
			)
		); 
		
		$this->add_control(
			'section_title_text_padding',
			array(
				'label'     => __( 'Section Text Padding', 'acuasafe' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'condition'    => array( 'show_section_title_text' => 'show' ),
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .content-box .text p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'section_title_text_typography',
				'condition'    => array( 'show_section_title_text' => 'show' ),
				'label'    => __( 'Typography', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .pricing-section .content-box .text p',
			)
		);
		
		$this->add_control(
			'section_title_text_color',
			array(
				'label'     => __( 'Section Text Color', 'acuasafe' ),
				'condition'    => array( 'show_section_title_text' => 'show' ),
				'separator' => 'after',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .content-box .text p' => 'color: {{VALUE}} !important',
				),
			)
		);

		$this->end_controls_section();
		
		//End of Section Title Text=========	
		
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
					'{{WRAPPER}} .pricing-section .tab-btn-box .tab-btns li:first-child' => 'display: {{VALUE}} !important',
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
					'{{WRAPPER}} .pricing-section .tab-btn-box .tab-btns li:first-child' => 'text-align: {{VALUE}} !important',
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
					'{{WRAPPER}} .pricing-section .tab-btn-box .tab-btns li:first-child' => 'color: {{VALUE}} !important',

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
					'{{WRAPPER}} .pricing-section .tab-btn-box .tab-btns li:first-child' => 'background: {{VALUE}} !important',
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
					'{{WRAPPER}} .pricing-section .tab-btn-box .tab-btns li:first-child:hover' => 'color: {{VALUE}} !important',
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
					'{{WRAPPER}} .pricing-section .tab-btn-box .tab-btns li:first-child:before' => 'background: {{VALUE}} !important',
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
					'{{WRAPPER}} .pricing-section .tab-btn-box .tab-btns li:first-child' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
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
					'{{WRAPPER}} .pricing-section .tab-btn-box .tab-btns li:first-child' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'button_typography',
				'condition'    => array( 'show_button' => 'show' ),
				'label'    => __( 'Typography', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .pricing-section .tab-btn-box .tab-btns li:first-child',
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name' => 'border',
				'condition'    => array( 'show_button' => 'show' ),
				'selector' => '{{WRAPPER}} .pricing-section .tab-btn-box .tab-btns li:first-child',
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
					'{{WRAPPER}} .pricing-section .tab-btn-box .tab-btns li:first-child' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		$this->end_controls_section();
		
		//End of Button
		
		//========== Button with Background ===================================
		
		$this->start_controls_section(
			'button_control1',
			array(
				'label' => __( 'Button Two Settings', 'acuasafe' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		
		$this->add_control(
			'show_button1',
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
					'{{WRAPPER}} .pricing-section .tab-btn-box .tab-btns li:last-child' => 'display: {{VALUE}} !important',
				),
			)
		);		
		$this->add_control(
			'button_alingment1',
			array(
				'label' => esc_html__( 'Alignment', 'acuasafe' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'condition'    => array( 'show_button1' => 'show' ),
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
					'{{WRAPPER}} .pricing-section .tab-btn-box .tab-btns li:last-child' => 'text-align: {{VALUE}} !important',
				), 
			)
		);	
		$this->add_control(
			'button_color1',
			array(
				'label'     => __( 'Button Color', 'acuasafe' ),
				'condition'    => array( 'show_button1' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .tab-btn-box .tab-btns li:last-child' => 'color: {{VALUE}} !important',

				),
			)
		);
		$this->add_control(
			'button_bg_color1',
			array(
				'label'     => __( 'Background Color', 'acuasafe' ),
				'condition'    => array( 'show_button1' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .tab-btn-box .tab-btns li:last-child' => 'background: {{VALUE}} !important',
				),
			)
		);	
		
		$this->add_control(
			'button_hover_color1',
			array(
				'label'     => __( 'Hover Color', 'acuasafe' ),
				'condition'    => array( 'show_button1' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .tab-btn-box .tab-btns li:last-child:hover' => 'color: {{VALUE}} !important',
				), 
			)
		);	
		
		$this->add_control(
			'button_hover_bg_color1',
			array(
				'label'     => __( 'Hover Background Color', 'acuasafe' ),
				'condition'    => array( 'show_button1' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .tab-btn-box .tab-btns li:last-child:before' => 'background: {{VALUE}} !important',
				),
			)
		);
		
		$this->add_control(
			'button_padding1',
			array(
				'label'     => __( 'Padding', 'acuasafe' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'condition'    => array( 'show_button1' => 'show' ),
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .tab-btn-box .tab-btns li:last-child' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		$this->add_control(
			'button_margin1',
			array(
				'label'     => __( 'Margin', 'acuasafe' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'condition'    => array( 'show_button1' => 'show' ),
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .tab-btn-box .tab-btns li:last-child' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'button_typography1',
				'condition'    => array( 'show_button1' => 'show' ),
				'label'    => __( 'Typography', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .pricing-section .tab-btn-box .tab-btns li:last-child',
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name' => 'border1',
				'condition'    => array( 'show_button1' => 'show' ),
				'selector' => '{{WRAPPER}} .pricing-section .tab-btn-box .tab-btns li:last-child',
			)
		);
		
		$this->add_control(
			'border_radius1',
			array(
				'label'     => __( 'Border Radius', 'acuasafe' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'condition'    => array( 'show_button1' => 'show' ),
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .tab-btn-box .tab-btns li:last-child' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		$this->end_controls_section();
		
		//End of Button
		
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
					'{{WRAPPER}} .pricing-section .pr-content .pr-tab.active-tab .pricing-block-one .pricing-table .title h3' => 'display: {{VALUE}} !important',
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
				
					'{{WRAPPER}} .pricing-section .pr-content .pr-tab.active-tab .pricing-block-one .pricing-table .title h3' => 'text-align: {{VALUE}} !important',
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
					'{{WRAPPER}} .pricing-section .pr-content .pr-tab.active-tab .pricing-block-one .pricing-table .title h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
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
					'{{WRAPPER}} .pricing-section .pr-content .pr-tab.active-tab .pricing-block-one .pricing-table .title h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'condition'    => array( 'show_title' => 'show' ),
				'label'    => __( 'Typography', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .pricing-section .pr-content .pr-tab.active-tab .pricing-block-one .pricing-table .title h3',
			)
		);
		
		$this->add_control(
			'title_color',
			array(
				'label'     => __( 'Color', 'acuasafe' ),
				'condition'    => array( 'show_title' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .pr-content .pr-tab.active-tab .pricing-block-one .pricing-table .title h3' => 'color: {{VALUE}} !important',
		
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
					'{{WRAPPER}} .pricing-section .pr-content .pr-tab.active-tab .pricing-block-one .pricing-table .title h3:hover' => 'color: {{VALUE}} !important',
		
				),
			)
		);

		$this->end_controls_section();	
		
		
		//End of  Title 	==================
		
		//Text==========================

		$this->start_controls_section(
			'text_list_settings',
			array(
				'label' => __( 'Text List Setting', 'acuasafe' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		
		$this->add_control(
			'show_text_list',
			array(
				'label' => esc_html__( 'Show Text List', 'acuasafe' ),
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
					'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .table-content .feature-list li' => 'display: {{VALUE}} !important',
				), 
			)
		);	
		$this->add_control(
			'text_list_alingment',
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
				'condition'    => array( 'show_text_list' => 'show' ),
				'toggle' => true,
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .table-content .feature-list li' => 'text-align: {{VALUE}} !important',
				),
			)
		);	
		$this->add_control(
			'text_list_padding',
			array(
				'label'     => __( 'Padding', 'acuasafe' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'condition'    => array( 'show_text_list' => 'show' ),
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .table-content .feature-list li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'text_list_typography',
				'condition'    => array( 'show_text_list' => 'show' ),
				'label'    => __( 'Typography', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .table-content .feature-list li',
			)
		);
		$this->add_control(
			'text_list_color',
			array(
				'label'     => __( 'Color', 'acuasafe' ),
				'condition'    => array( 'show_text_list' => 'show' ),
				'separator' => 'after',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .table-content .feature-list li' => 'color: {{VALUE}} !important',
				),
			)
		);

		$this->end_controls_section();
		
		//End of Text=========		
		
		//========== icon Settings===================================
		
		$this->start_controls_section(
			'icon_control',
			array(
				'label' => __( 'Icon Settings', 'acuasafe' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		
		$this->add_control(
			'show_icon',
			array(
				'label' => esc_html__( 'Show Icon', 'acuasafe' ),
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
					'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .table-content .feature-list li:before' => 'display: {{VALUE}} !important',
				), 
			)
		);
		
		$this->add_control(
			'icon_alingment',
			array(
				'label' => esc_html__( 'Alignment', 'acuasafe' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'condition'    => array( 'show_icon' => 'show' ),
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
					'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .table-content .feature-list li:before' => 'text-align: {{VALUE}} !important',
				),
			)
		);	
		
		$this->add_control(
			'icon_color',
			array(
				'label'     => __( ' Color', 'acuasafe' ),
				'condition'    => array( 'show_icon' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .table-content .feature-list li:before' => 'color: {{VALUE}} !important',

				),
			)
		);
		
		$this->add_control(
			'icon_bgcolor',
			array(
				'label'     => __( 'Background Color', 'acuasafe' ),
				'condition'    => array( 'show_icon' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .table-content .feature-list li:before' => 'background: {{VALUE}} !important',

				),
			)
		);
		
		
		$this->add_control(
			'icon_hover_color',
			array(
				'label'     => __( ' Color', 'acuasafe' ),
				'condition'    => array( 'show_icon' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .table-content .feature-list li:before:hover' => 'color: {{VALUE}} !important',

				),
			)
		);
		
		$this->add_control(
			'icon_hover_bgcolor',
			array(
				'label'     => __( 'Background Hover Color', 'acuasafe' ),
				'condition'    => array( 'show_icon' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .table-content .feature-list li:before:hover' => 'background: {{VALUE}} !important',

				),
			)
		);
		
		$this->add_control(
			'icon_padding',
			array(
				'label'     => __( 'Padding', 'acuasafe' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'condition'    => array( 'show_icon' => 'show' ),
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .table-content .feature-list li:before' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		$this->add_control(
			'icon_margin',
			array(
				'label'     => __( 'Margin', 'acuasafe' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'condition'    => array( 'show_icon' => 'show' ),
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .table-content .feature-list li:before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'icon_typography',
				'condition'    => array( 'show_icon' => 'show' ),
				'label'    => __( 'Typography', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .table-content .feature-list li:before',
			)
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name' => 'icon_border',
				'condition'    => array( 'show_icon' => 'show' ),
				'selector' => '{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .table-content .feature-list li:before',
			)
		); 
		
		$this->add_control(
			'icon_border_radius',
			array(
				'label'     => __( 'Icon Border Radius', 'acuasafe' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'condition'    => array( 'show_icon' => 'show' ),
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .table-content .feature-list li:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),  
			)
		);


		$this->end_controls_section();		
		
		//End of icon
		
		//========== Button with Background ===================================
		
		$this->start_controls_section(
			'button_control2',
			array(
				'label' => __( 'Button Three Settings', 'acuasafe' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		
		$this->add_control(
			'show_button2',
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
					'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .theme-btn.btn-one' => 'display: {{VALUE}} !important',
				),
			)
		);		
		$this->add_control(
			'button_alingment2',
			array(
				'label' => esc_html__( 'Alignment', 'acuasafe' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'condition'    => array( 'show_button2' => 'show' ),
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
					'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .table-footer' => 'text-align: {{VALUE}} !important',
				), 
			)
		);	
		$this->add_control(
			'button_color2',
			array(
				'label'     => __( 'Button Color', 'acuasafe' ),
				'condition'    => array( 'show_button2' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .theme-btn.btn-one' => 'color: {{VALUE}} !important',

				),
			)
		);
		$this->add_control(
			'button_bg_color2',
			array(
				'label'     => __( 'Background Color', 'acuasafe' ),
				'condition'    => array( 'show_button2' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .theme-btn.btn-one' => 'background: {{VALUE}} !important',
				),
			)
		);	
		
		$this->add_control(
			'button_hover_color2',
			array(
				'label'     => __( 'Hover Color', 'acuasafe' ),
				'condition'    => array( 'show_button2' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .theme-btn.btn-one:hover' => 'color: {{VALUE}} !important',
				), 
			)
		);	
		
		$this->add_control(
			'button_hover_bg_color2',
			array(
				'label'     => __( 'Hover Background Color', 'acuasafe' ),
				'condition'    => array( 'show_button2' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .theme-btn.btn-one:before' => 'background: {{VALUE}} !important',
				),
			)
		);
		
		$this->add_control(
			'button_padding2',
			array(
				'label'     => __( 'Padding', 'acuasafe' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'condition'    => array( 'show_button2' => 'show' ),
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .theme-btn.btn-one' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		$this->add_control(
			'button_margin2',
			array(
				'label'     => __( 'Margin', 'acuasafe' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'condition'    => array( 'show_button2' => 'show' ),
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .theme-btn.btn-one' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'button_typography2',
				'condition'    => array( 'show_button2' => 'show' ),
				'label'    => __( 'Typography', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .theme-btn.btn-one',
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name' => 'border2',
				'condition'    => array( 'show_button2' => 'show' ),
				'selector' => '{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .theme-btn.btn-one',
			)
		);
		
		$this->add_control(
			'border_radius2',
			array(
				'label'     => __( 'Border Radius', 'acuasafe' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'condition'    => array( 'show_button2' => 'show' ),
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .theme-btn.btn-one' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		$this->end_controls_section();
		
		//End of Button
		
		// Title 	==================	


		$this->start_controls_section(
			'title_settings1',
			array(
				'label' => __( 'Price Title Setting', 'acuasafe' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
				
		$this->add_control(
			'show_title1',
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
					'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .price-box h3' => 'display: {{VALUE}} !important',
				),   
			) 
		);
		
		$this->add_control(
			'title_alignment1',
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
				'condition'    => array( 'show_title1' => 'show' ),
				'toggle' => true,
				'selectors' => array(
				
					'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .price-box h3' => 'text-align: {{VALUE}} !important',
				), 
			)
		);
		
		$this->add_control(
			'title_margin1',
			array(
				'label'     => __( 'Margin', 'acuasafe' ),
				'condition'    => array( 'show_title1' => 'show' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .price-box h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		$this->add_control(
			'title_padding1',
			array(
				'label'     => __( 'Padding', 'acuasafe' ),
				'condition'    => array( 'show_title1' => 'show' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .price-box h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography1',
				'condition'    => array( 'show_title1' => 'show' ),
				'label'    => __( 'Typography', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .price-box h3',
			)
		);
		
		$this->add_control(
			'title_color1',
			array(
				'label'     => __( 'Color', 'acuasafe' ),
				'condition'    => array( 'show_title1' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .price-box h3' => 'color: {{VALUE}} !important',
		
				),
			)
		);

		$this->add_control(
			'title_hover_color1',
			array(
				'label'     => __( 'Hover Color', 'acuasafe' ),
				'condition'    => array( 'show_title1' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .price-box h3:hover' => 'color: {{VALUE}} !important',
		
				),
			)
		);

		$this->end_controls_section();	
		
		
		//End of  Title 	==================
		
		//Sub Title	==================	
	

		$this->start_controls_section(
			'subtitle_settings',
			array(
				'label' => __( 'Price Sub Title Setting', 'acuasafee' ),
			
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
					'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .price-box span' => 'display: {{VALUE}} !important',
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
				
					'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .price-box span' => 'text-align: {{VALUE}} !important',
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
			'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .price-box span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',		
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
			'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .price-box span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',		
				),
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
		
			array(
				'name'     => 'subtitle_typography',
				'condition'    => array( 'show_subtitle' => 'show' ),
				'label'    => __( 'Typography', 'acuasafee' ),
				'selector' => '{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .price-box span',
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
					'{{WRAPPER}} .pricing-section .pricing-block-one .pricing-table .price-box span' => 'color: {{VALUE}} !important',
				),
			
			)
		);

		$this->end_controls_section();
		
		//End of  Sub Title 	==================	
		
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
		
		
<?php
	  echo '
	 <script>
 jQuery(document).ready(function($) {

//put the js code under this line 

	if($(".pricing-tabs").length){
		$(".pricing-tabs .tab-btns .tab-btn").on("click", function(e) {
			e.preventDefault();
			var target = $($(this).attr("data-tab"));
			
			if ($(target).hasClass("actve-tab")){
				return false;
			}else{
				$(".pricing-tabs .tab-btns .tab-btn").removeClass("active-btn");
				$(this).addClass("active-btn");
				$(".pricing-tabs .pr-content .pr-tab").removeClass("active-tab");
				$(target).addClass("active-tab");
			}
		});
	}

//put the code above the line 

  });
</script>';


?>
         
		<section class="pricing-section <?php echo esc_attr($settings['sec_class']);?>">
            <div class="auto-container">
                <div class="pricing-tabs">
                    <div class="row align-items-center clearfix">
                        <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                            <div class="content-box">
								<?php if($settings['title']): ?>
                                <div class="sec-title">
                                    <h2><?php echo $settings['title'];?></h2>
                                </div>
                                <div class="text">
                                    <p><?php echo $settings['text'];?></p>
                                </div>
								<?php endif; ?>
                                <div class="tab-btn-box">
                                    <ul class="tab-btns tab-buttons clearfix">
										<?php foreach($settings['repeat'] as $key=>$item):?>
                                        <li class="tab-btn <?php if($key == 1) echo 'active-btn';?>" data-tab="#id-<?php echo esc_attr($key);?>"><?php echo wp_kses($item['block_title'], $allowed_tags);?></li>
										<?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 inner-column">
                            <div class="inner-box">
								<?php  if ( esc_url($settings['bgimg']['id']) ) : ?>
                                <div class="inner-pattern" style="background-image: url(<?php echo wp_get_attachment_url($settings['bgimg']['id']);?>);">
								<?php else :?>	
								<div class="noimage">
								<?php endif;?>
								</div>
								
                                <div class="pr-content">
									<?php foreach($settings['repeat'] as $key=>$item):?>
                                    <div class="pr-tab <?php if($key == 1) echo 'active-tab';?>" id="id-<?php echo esc_attr($key);?>">
                                        <div class="pricing-block-one">
                                            <div class="pricing-table">
                                                <div class="shape-layer" style="background-image: url(<?php echo wp_get_attachment_url($item['block_bgimg']['id']);?>);"></div>
                                                <div class="table-header">
                                                    <div class="price-box">
                                                        <div class="price-shape">
                                                            <div class="shape-1" style="background-image: url(<?php echo wp_get_attachment_url($item['block_bgimg2']['id']);?>);"></div>
                                                            <div class="shape-2" style="background-image: url(<?php echo wp_get_attachment_url($item['block_bgimg3']['id']);?>);"></div>
                                                        </div>
                                                        <h3><?php echo esc_attr($item['ff_sing']);?><?php echo esc_attr($item['block_price']);?></h3>
                                                        <span><?php echo wp_kses($item['block_title'], $allowed_tags);?></span>
                                                    </div>
                                                    <div class="title">
                                                        <h3><?php echo wp_kses($item['block_title2'], $allowed_tags);?></h3>
                                                    </div>
                                                </div>
                                                <div class="table-content">
                                                    <ul class="feature-list clearfix">
                                                        <?php $fearures = explode("\n", ($item['block_feature_str']));?>
														<?php foreach($fearures as $feature):?>
														<?php echo wp_kses($feature, true); ?>
														<?php endforeach; ?>
                                                    </ul>
                                                </div>
												<?php if(wp_kses($item['block_button'], $allowed_tags)): ?>
                                                <div class="table-footer">
                                                    <a href="<?php echo esc_url($item['block_btnlink']['url']);?>" class="theme-btn btn-one"><?php echo wp_kses($item['block_button'], $allowed_tags);?></a>
                                                </div>
												<?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
									<?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
             
		<?php 
	}

}