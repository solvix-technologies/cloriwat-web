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
class Team_Details_Right extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'acuasafe_team_details_right';
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
		return esc_html__( 'Team Details Right', 'acuasafe' );
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
			'team_details_right',
			[
				'label' => esc_html__( 'Team Details Right', 'acuasafe' ),
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
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'rashid' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub title', 'rashid' ),
			]
		);
		$this->add_control(
			'feature_str',
			[
				'label'       => __( 'Features List', 'rashid' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Features List', 'rashid' ),
				'default'     => __( '', 'rashid' ),
			]
		);
		$this->add_control(
			'feature_str2',
			[
				'label'       => __( 'Features List', 'rashid' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Features List', 'rashid' ),
				'default'     => __( '', 'rashid' ),
			]
		);
		$this->add_control(
			'feature_str3',
			[
				'label'       => __( 'Features List', 'rashid' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Features List', 'rashid' ),
				'default'     => __( '', 'rashid' ),
			]
		);
		
			
		$this->end_controls_section();
		
		// New Tab#1

		$this->start_controls_section(
					'content_section',
					[
						'label' => __( 'Social Block', 'rashid' ),
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
								'block_icons'=>
								[
									'name' => 'block_icons',
									'label' => esc_html__('Enter The icons', 'rashid'),
									'type' => Controls_Manager::ICONS,							
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
					'{{WRAPPER}} .two.team-single-area.two .team-member-info-box .title h3' => 'display: {{VALUE}} !important',
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
				
					'{{WRAPPER}} .two.team-single-area.two .team-member-info-box .title h3' => 'text-align: {{VALUE}} !important',
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
					'{{WRAPPER}} .two.team-single-area.two .team-member-info-box .title h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
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
					'{{WRAPPER}} .two.team-single-area.two .team-member-info-box .title h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),  
			)
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'section_title_typography',
				'condition'    => array( 'show_section_title' => 'show' ),
				'label'    => __( 'Typography', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .two.team-single-area.two .team-member-info-box .title h3',
			)
		); 
		
		$this->add_control(
			'section_title_color',
			array(
				'label'     => __( 'Color', 'acuasafe' ),
				'condition'    => array( 'show_section_title' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .two.team-single-area.two .team-member-info-box .title h3' => 'color: {{VALUE}} !important',
				),
			)
		);

		$this->end_controls_section();	
		
		//End of  Title 	==================	
	
		//Section Sub Title	==================		

		$this->start_controls_section(
			'section_subtitle_settings',
			array(
				'label' => __( 'Section Sub Title Setting', 'acuasafee' ),			
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
	
		$this->add_control(
			'show_section_subtitle',
			array(
				'label' => esc_html__( 'Show Sections Sub Title', 'acuasafee' ),
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
					'{{WRAPPER}} .two.team-single-area.two .team-member-info-box .title span' => 'display: {{VALUE}} !important',
				), 
			)
		);
		
		$this->add_control(
			'section_subtitle_alingment',
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
				'condition'    => array( 'show_section_subtitle' => 'show' ),
				'toggle' => true,
				'selectors' => array(
				
					'{{WRAPPER}} .two.team-single-area.two .team-member-info-box .title span' => 'text-align: {{VALUE}} !important',
				),
			)
		);
		
		$this->add_control(
			'section_subtitle_margin',
			array(
				'label'     => __( 'Margin', 'acuasafee' ),
				'condition'    => array( 'show_section_subtitle' => 'show' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
			'{{WRAPPER}} .two.team-single-area.two .team-member-info-box .title span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',		
				),
			)
		);
		
		$this->add_control(
			'section_subtitle_padding',
			array(
				'label'     => __( 'Padding', 'acuasafee' ),
				'condition'    => array( 'show_section_subtitle' => 'show' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
			'{{WRAPPER}} .two.team-single-area.two .team-member-info-box .title span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',		
				), 
			)
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
		
			array(
				'name'     => 'section_subtitle_typography',
				'condition'    => array( 'show_section_subtitle' => 'show' ),
				'label'    => __( 'Typography', 'acuasafee' ),
				'selector' => '{{WRAPPER}} .two.team-single-area.two .team-member-info-box .title span',
			)
		); 
		
		
		$this->add_control(
			'section_subtitle_color',
			array(
				'label'     => __( 'Color', 'acuasafee' ),
				'condition'    => array( 'show_section_subtitle' => 'show' ),
				'separator' => 'after',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .two.team-single-area.two .team-member-info-box .title span' => 'color: {{VALUE}} !important',
				),
			
			)
		);

		$this->end_controls_section();
		
		//End of  Sub Title 	==================	
		
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
					'{{WRAPPER}} .two.team-single-area.two .team-member-info-box ul li span' => 'display: {{VALUE}} !important',
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
				
					'{{WRAPPER}} .two.team-single-area.two .team-member-info-box ul li span' => 'text-align: {{VALUE}} !important',
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
					'{{WRAPPER}} .two.team-single-area.two .team-member-info-box ul li span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
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
					'{{WRAPPER}} .two.team-single-area.two .team-member-info-box ul li span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'condition'    => array( 'show_title' => 'show' ),
				'label'    => __( 'Typography', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .two.team-single-area.two .team-member-info-box ul li span',
			)
		);
		
		$this->add_control(
			'title_color',
			array(
				'label'     => __( 'Color', 'acuasafe' ),
				'condition'    => array( 'show_title' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .two.team-single-area.two .team-member-info-box ul li span' => 'color: {{VALUE}} !important',
		
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
					'{{WRAPPER}} .two.team-single-area.two .team-member-info-box ul li span:hover' => 'color: {{VALUE}} !important',
		
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
					'{{WRAPPER}} .two.team-single-area.two .team-member-info-box ul li' => 'display: {{VALUE}} !important',
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
				
					'{{WRAPPER}} .two.team-single-area.two .team-member-info-box ul li' => 'text-align: {{VALUE}} !important',
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
			'{{WRAPPER}} .two.team-single-area.two .team-member-info-box ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',		
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
			'{{WRAPPER}} .two.team-single-area.two .team-member-info-box ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',		
				),
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
		
			array(
				'name'     => 'subtitle_typography',
				'condition'    => array( 'show_subtitle' => 'show' ),
				'label'    => __( 'Typography', 'acuasafee' ),
				'selector' => '{{WRAPPER}} .two.team-single-area.two .team-member-info-box ul li',
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
					'{{WRAPPER}} .two.team-single-area.two .team-member-info-box ul li' => 'color: {{VALUE}} !important',
				),
			
			)
		);

		$this->end_controls_section();
		
		//End of  Sub Title 	==================	
		
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
					'{{WRAPPER}} .two.team-single-area.two .team-member-info-box .social-links-style1 li a i' => 'display: {{VALUE}} !important',
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
					'{{WRAPPER}} .two.team-single-area.two .team-member-info-box .social-links-style1 li a i' => 'text-align: {{VALUE}} !important',
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
					'{{WRAPPER}} .two.team-single-area.two .team-member-info-box .social-links-style1 li a i' => 'color: {{VALUE}} !important',

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
					'{{WRAPPER}} .two.team-single-area.two .team-member-info-box .social-links-style1 li a i' => 'background: {{VALUE}} !important',

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
					'{{WRAPPER}} .two.team-single-area.two .team-member-info-box .social-links-style1 li a i:hover' => 'color: {{VALUE}} !important',

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
					'{{WRAPPER}} .two.team-single-area.two .team-member-info-box .social-links-style1 li a i:hover' => 'background: {{VALUE}} !important',

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
					'{{WRAPPER}} .two.team-single-area.two .team-member-info-box .social-links-style1 li a i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
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
					'{{WRAPPER}} .two.team-single-area.two .team-member-info-box .social-links-style1 li a i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'icon_typography',
				'condition'    => array( 'show_icon' => 'show' ),
				'label'    => __( 'Typography', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .two.team-single-area.two .team-member-info-box .social-links-style1 li a i',
			)
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name' => 'icon_border',
				'condition'    => array( 'show_icon' => 'show' ),
				'selector' => '{{WRAPPER}} .two.team-single-area.two .team-member-info-box .social-links-style1 li a i',
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
					'{{WRAPPER}} .two.team-single-area.two .team-member-info-box .social-links-style1 li a i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),  
			)
		); 


		$this->end_controls_section();		
		
		//End of icon
		
		
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

		<section class="team-single-area <?php echo esc_attr($settings['sec_class']);?>">
			<div class="container">
				<div class="row">
					<div class="col-xl-12">
						<div class="team-member-info-box">
							<div class="title">
								<h3><?php echo $settings['title'];?></h3>
								<span><?php echo $settings['subtitle'];?></span>
							</div>
							<ul>
								<?php $fearures = explode("\n", ($settings['feature_str']));?>
								<?php foreach($fearures as $feature):?>
								<?php echo wp_kses($feature, true); ?>
								<?php endforeach; ?>
							</ul>
							<ul>
								<?php $fearures = explode("\n", ($settings['feature_str2']));?>
								<?php foreach($fearures as $feature):?>
								<?php echo wp_kses($feature, true); ?>
								<?php endforeach; ?>
							</ul>
							<ul>
								<?php $fearures = explode("\n", ($settings['feature_str3']));?>
								<?php foreach($fearures as $feature):?>
								<?php echo wp_kses($feature, true); ?>
								<?php endforeach; ?>
							</ul>
							<ul class="social-links-style1">
								<?php foreach($settings['repeat'] as $item):?>
								<li>
									<a href="<?php echo esc_url($item['block_btnlink']['url']);?>"><i class="<?php echo str_replace("icon ", " ", esc_attr( $item['block_icons']['value']));?>" aria-hidden="true"></i></a> 
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