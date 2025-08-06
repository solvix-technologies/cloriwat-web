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
class Feq_Left extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'acuasafe_feq_left';
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
		return esc_html__( 'Feq Left', 'acuasafe' );
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
			'feq_left',
			[
				'label' => esc_html__( 'Feq Left', 'acuasafe' ),
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
		
		
		$this->end_controls_section();
		
		// New Tab#1

		$this->start_controls_section(
					'content_section',
					[
						'label' => __( 'Faq Block', 'rashid' ),
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
								'block_text'=>
								[
									'name' => 'block_text',
									'label' => esc_html__('Text', 'rashid'),
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
					'{{WRAPPER}} .faq-page-section.one .sec-title h2' => 'display: {{VALUE}} !important',
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
				
					'{{WRAPPER}} .faq-page-section.one .sec-title h2' => 'text-align: {{VALUE}} !important',
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
					'{{WRAPPER}} .faq-page-section.one .sec-title h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
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
					'{{WRAPPER}} .faq-page-section.one .sec-title h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),  
			)
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'section_title_typography',
				'condition'    => array( 'show_section_title' => 'show' ),
				'label'    => __( 'Typography', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .faq-page-section.one .sec-title h2',
			)
		); 
		
		$this->add_control(
			'section_title_color',
			array(
				'label'     => __( 'Color', 'acuasafe' ),
				'condition'    => array( 'show_section_title' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .faq-page-section.one .sec-title h2' => 'color: {{VALUE}} !important',
				),
			)
		);

		$this->end_controls_section();		
		
		//End of  Title 	==================	
		
		// Title 	==================	


		$this->start_controls_section(
			'title_settings',
			array(
				'label' => __( 'Active Title Setting', 'acuasafe' ),
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
					'{{WRAPPER}} .faq-page-section.one .accordion-box .block .acc-btn.active h4' => 'display: {{VALUE}} !important',
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
				
					'{{WRAPPER}} .faq-page-section.one .accordion-box .block .acc-btn.active h4' => 'text-align: {{VALUE}} !important',
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
					'{{WRAPPER}} .faq-page-section.one .accordion-box .block .acc-btn.active h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
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
					'{{WRAPPER}} .faq-page-section.one .accordion-box .block .acc-btn.active h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'condition'    => array( 'show_title' => 'show' ),
				'label'    => __( 'Typography', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .faq-page-section.one .accordion-box .block .acc-btn.active h4',
			)
		);
		
		$this->add_control(
			'title_color',
			array(
				'label'     => __( 'Color', 'acuasafe' ),
				'condition'    => array( 'show_title' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .faq-page-section.one .accordion-box .block .acc-btn.active h4' => 'color: {{VALUE}} !important',
		
				),
			)
		);

		$this->add_control(
			'title_bg_color',
			array(
				'label'     => __( 'Background Color', 'acuasafe' ),
				'condition'    => array( 'show_title' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .faq-page-section.one .accordion-box .block .acc-btn.active h4' => 'background: {{VALUE}} !important',
		
				),
			)
		);

		$this->end_controls_section();	
		
		
		//End of  Title 	==================
		
		// Title 	==================	


		$this->start_controls_section(
			'title_settings1',
			array(
				'label' => __( 'Title Setting', 'acuasafe' ),
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
					'{{WRAPPER}} .faq-page-section.one .accordion-box .block .acc-btn h4' => 'display: {{VALUE}} !important',
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
				
					'{{WRAPPER}} .faq-page-section.one .accordion-box .block .acc-btn h4' => 'text-align: {{VALUE}} !important',
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
					'{{WRAPPER}} .faq-page-section.one .accordion-box .block .acc-btn h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
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
					'{{WRAPPER}} .faq-page-section.one .accordion-box .block .acc-btn h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography1',
				'condition'    => array( 'show_title1' => 'show' ),
				'label'    => __( 'Typography', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .faq-page-section.one .accordion-box .block .acc-btn h4',
			)
		);
		
		$this->add_control(
			'title_color1',
			array(
				'label'     => __( 'Color', 'acuasafe' ),
				'condition'    => array( 'show_title1' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .faq-page-section.one .accordion-box .block .acc-btn h4' => 'color: {{VALUE}} !important',
		
				),
			)
		);

		$this->add_control(
			'title_bg_color1',
			array(
				'label'     => __( 'Background Color', 'acuasafe' ),
				'condition'    => array( 'show_title1' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .faq-page-section.one .accordion-box .block .acc-btn h4' => 'background: {{VALUE}} !important',
		
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
					'{{WRAPPER}}  .faq-page-section.one .accordion-box .block .acc-content p' => 'display: {{VALUE}} !important',
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
					'{{WRAPPER}}  .faq-page-section.one .accordion-box .block .acc-content p' => 'text-align: {{VALUE}} !important',
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
					'{{WRAPPER}}  .faq-page-section.one .accordion-box .block .acc-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
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
					'{{WRAPPER}}  .faq-page-section.one .accordion-box .block .acc-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'text_typography',
				'condition'    => array( 'show_text' => 'show' ),
				'label'    => __( 'Typography', 'acuasafee' ),
				'selector' => '{{WRAPPER}}  .faq-page-section.one .accordion-box .block .acc-content p',
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
					'{{WRAPPER}}  .faq-page-section.one .accordion-box .block .acc-content p' => 'color: {{VALUE}} !important',
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
					'{{WRAPPER}}  .faq-page-section.one .accordion-box .block .acc-content p:hover' => 'color: {{VALUE}} !important',
				),
			)
		);

		$this->end_controls_section();
		
		//End of Text=========	
		
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
					'{{WRAPPER}} .faq-page-section.one .accordion-box .block .acc-content .list li' => 'display: {{VALUE}} !important',
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
					'{{WRAPPER}} .faq-page-section.one .accordion-box .block .acc-content .list li' => 'text-align: {{VALUE}} !important',
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
					'{{WRAPPER}} .faq-page-section.one .accordion-box .block .acc-content .list li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'text_list_typography',
				'condition'    => array( 'show_text_list' => 'show' ),
				'label'    => __( 'Typography', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .faq-page-section.one .accordion-box .block .acc-content .list li',
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
					'{{WRAPPER}} .faq-page-section.one .accordion-box .block .acc-content .list li' => 'color: {{VALUE}} !important',
				),
			)
		);

		$this->end_controls_section();
		
		//End of Text=========		
		
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

	if($(".accordion-box").length){
		$(".accordion-box").on("click", ".acc-btn", function() {
			
			var outerBox = $(this).parents(".accordion-box");
			var target = $(this).parents(".accordion");
			
			if($(this).hasClass("active")!==true){
				$(outerBox).find(".accordion .acc-btn").removeClass("active");
			}
			
			if ($(this).next(".acc-content").is(":visible")){
				return false;
			}else{
				$(this).addClass("active");
				$(outerBox).children(".accordion").removeClass("active-block");
				$(outerBox).find(".accordion").children(".acc-content").slideUp(300);
				target.addClass("active-block");
				$(this).next(".acc-content").slideDown(300);	
			}
		});	
	}

//put the code above the line 

  });
</script>';


?>
        
        <section class="faq-page-section <?php echo esc_attr($settings['sec_class']);?>">
			<div class="auto-container">
				<div class="row clearfix">
					<div class="col-md-12 col-sm-12 content-column">
						<div class="faq-content">
							<?php if($settings['title']): ?>
							<div class="sec-title">
								<h2><?php echo $settings['title'];?></h2>
							</div>
							<?php endif; ?>
							<ul class="accordion-box">
								<?php foreach($settings['repeat'] as $key=>$item):?>
								<li class="accordion block <?php if($key == 1) echo 'active-block';?>">
									<div class="acc-btn <?php if($key == 1) echo 'active';?>">
										<div class="icon-outer"><i class="fal fa-plus"></i></div>
										<h4><?php echo wp_kses($item['block_title'], $allowed_tags);?></h4>
									</div>
									<div class="acc-content <?php if($key == 1) echo 'current';?>">
										<div class="text">
											<p><?php echo wp_kses($item['block_text'], $allowed_tags);?></p>
											<ul class="list clearfix">
												<?php $fearures = explode("\n", ($item['block_feature_str']));?>
												<?php foreach($fearures as $feature):?>
												<?php echo wp_kses($feature, true); ?>
												<?php endforeach; ?>
											</ul>
										</div>
									</div>
								</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
             
		<?php 
	}

}