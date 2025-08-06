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
class Testimonial extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'acuasafe_testimonial';
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
		return esc_html__( 'Testimonial', 'acuasafe' );
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
			'testimonial',
			[
				'label' => esc_html__( 'Testimonial', 'acuasafe' ),
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
						'label' => __( 'Testimonial Block', 'rashid' ),
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
								'block_rating'=>
								[
									'name' => 'block_rating',
									'label'   => esc_html__( 'Select Rating', 'rashid' ),
									'type'    => Controls_Manager::SELECT,
									'default' => '1',
									'options' => array(
										'rat1'   => esc_html__( 'Rating One', 'rashid' ),
										'rat2'   => esc_html__( 'Rating Two', 'rashid' ),
										'rat3'   => esc_html__( 'Rating Three', 'rashid' ),
										'rat4'   => esc_html__( 'Rating Four', 'rashid' ),
										'rat5'   => esc_html__( 'Rating Five', 'rashid' ),
									),
								],
								'block_text'=>
								[
									'name' => 'block_text',
									'label' => esc_html__('Text', 'rashid'),
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
								'block_subtitle'=>
								[
									'name' => 'block_subtitle',
									'label' => esc_html__('Subtitle', 'rashid'),
									'type' => Controls_Manager::TEXTAREA,
									'default' => esc_html__('', 'rashid')
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
					'{{WRAPPER}} .testimonial-section.testimonial-page .sec-title h2' => 'display: {{VALUE}} !important',
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
				
					'{{WRAPPER}} .testimonial-section.testimonial-page .sec-title h2' => 'text-align: {{VALUE}} !important',
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
					'{{WRAPPER}} .testimonial-section.testimonial-page .sec-title h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
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
					'{{WRAPPER}} .testimonial-section.testimonial-page .sec-title h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),  
			)
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'section_title_typography',
				'condition'    => array( 'show_section_title' => 'show' ),
				'label'    => __( 'Typography', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .testimonial-section.testimonial-page .sec-title h2',
			)
		); 
		
		$this->add_control(
			'section_title_color',
			array(
				'label'     => __( 'Color', 'acuasafe' ),
				'condition'    => array( 'show_section_title' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .testimonial-section.testimonial-page .sec-title h2' => 'color: {{VALUE}} !important',
				),
			)
		);

		$this->end_controls_section();	
		
		//End of  Title 	==================	
		
		//Thumb Image==========================
		$this->start_controls_section(
			'thumb_image_settings',
			array(
				'label' => __( 'Thumb Image Setting', 'acuasafee' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		
		$this->add_control(
			'show_thumb',
			array(
				'label' => esc_html__( 'Show Thumb', 'acuasafee' ),
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
					'{{WRAPPER}} .testimonial-section.testimonial-page .testimonial-block-one .inner-box .author-thumb img' => 'display: {{VALUE}} !important',
				),  
			)
		);
				
		$this->add_control(
			'thumb_margin',
			array(
				'label'     => __( 'Margin', 'acuasafee' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'condition'    => array( 'show_thumb' => 'show' ),
				'selectors' => array(
					'{{WRAPPER}} .testimonial-section.testimonial-page .testimonial-block-one .inner-box .author-thumb img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		
		$this->add_control(
			'thumb_padding',
			array(
				'label'     => __( 'Padding', 'acuasafee' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'condition'    => array( 'show_thumb' => 'show' ),
				'selectors' => array(
					'{{WRAPPER}} .testimonial-section.testimonial-page .testimonial-block-one .inner-box .author-thumb img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'thumb_shadow',
				'condition'    => array( 'show_thumb' => 'show' ),
				'label' => esc_html__( 'Box Shadow', 'acuasafee' ),
				'selector' => '{{WRAPPER}} .testimonial-section.testimonial-page .testimonial-block-one .inner-box .author-thumb img',
			]
		);
		
		$this->add_control(
			'thumb_border_radius',
			array(
				'label'     => __( 'Thumb Border Radius', 'acuasafee' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'condition'    => array( 'show_thumb' => 'show' ),
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}} .testimonial-section.testimonial-page .testimonial-block-one .inner-box .author-thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
			
		$this->end_controls_section();
		
		//End of Thumb Image=========	
		
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
					'{{WRAPPER}}  .testimonial-section.testimonial-page .testimonial-block-one .inner-box p' => 'display: {{VALUE}} !important',
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
					'{{WRAPPER}}  .testimonial-section.testimonial-page .testimonial-block-one .inner-box p' => 'text-align: {{VALUE}} !important',
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
					'{{WRAPPER}}  .testimonial-section.testimonial-page .testimonial-block-one .inner-box p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
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
					'{{WRAPPER}}  .testimonial-section.testimonial-page .testimonial-block-one .inner-box p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'text_typography',
				'condition'    => array( 'show_text' => 'show' ),
				'label'    => __( 'Typography', 'acuasafee' ),
				'selector' => '{{WRAPPER}}  .testimonial-section.testimonial-page .testimonial-block-one .inner-box p',
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
					'{{WRAPPER}}  .testimonial-section.testimonial-page .testimonial-block-one .inner-box p' => 'color: {{VALUE}} !important',
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
					'{{WRAPPER}}  .testimonial-section.testimonial-page .testimonial-block-one .inner-box p:hover' => 'color: {{VALUE}} !important',
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
					'{{WRAPPER}} .testimonial-section.testimonial-page .testimonial-block-one .inner-box h5' => 'display: {{VALUE}} !important',
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
				
					'{{WRAPPER}} .testimonial-section.testimonial-page .testimonial-block-one .inner-box h5' => 'text-align: {{VALUE}} !important',
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
					'{{WRAPPER}} .testimonial-section.testimonial-page .testimonial-block-one .inner-box h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
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
					'{{WRAPPER}} .testimonial-section.testimonial-page .testimonial-block-one .inner-box h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'condition'    => array( 'show_title' => 'show' ),
				'label'    => __( 'Typography', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .testimonial-section.testimonial-page .testimonial-block-one .inner-box h5',
			)
		);
		
		$this->add_control(
			'title_color',
			array(
				'label'     => __( 'Color', 'acuasafe' ),
				'condition'    => array( 'show_title' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .testimonial-section.testimonial-page .testimonial-block-one .inner-box h5' => 'color: {{VALUE}} !important',
		
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
					'{{WRAPPER}} .testimonial-section.testimonial-page .testimonial-block-one .inner-box h5:hover' => 'color: {{VALUE}} !important',
		
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
					'{{WRAPPER}} .testimonial-section.testimonial-page .testimonial-block-one .inner-box .designation' => 'display: {{VALUE}} !important',
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
				
					'{{WRAPPER}} .testimonial-section.testimonial-page .testimonial-block-one .inner-box .designation' => 'text-align: {{VALUE}} !important',
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
			'{{WRAPPER}} .testimonial-section.testimonial-page .testimonial-block-one .inner-box .designation' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',		
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
			'{{WRAPPER}} .testimonial-section.testimonial-page .testimonial-block-one .inner-box .designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',		
				),
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
		
			array(
				'name'     => 'subtitle_typography',
				'condition'    => array( 'show_subtitle' => 'show' ),
				'label'    => __( 'Typography', 'acuasafee' ),
				'selector' => '{{WRAPPER}} .testimonial-section.testimonial-page .testimonial-block-one .inner-box .designation',
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
					'{{WRAPPER}} .testimonial-section.testimonial-page .testimonial-block-one .inner-box .designation' => 'color: {{VALUE}} !important',
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
        
        <section class="testimonial-section testimonial-page <?php echo esc_attr($settings['sec_class']);?>">
            <div class="auto-container">
				<?php if($settings['title']): ?>
                <div class="sec-title centred">
                    <h2><?php echo $settings['title'];?></h2>
                </div>
				<?php endif; ?>
                <div class="row clearfix">
					<?php foreach($settings['repeat'] as $item):?>
                    <div class="col-lg-<?php echo esc_attr($item['block_column'], true );?> col-md-12 col-sm-12 testimonial-block">
                        <div class="testimonial-block-one">
                            <div class="inner-box">
                                <figure class="author-thumb"><img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>"></figure>
                                <div class="inner">
                                    <ul class="rating clearfix">
                                        <?php  if ( 'rat1' === $item['block_rating'] ) : ?>      
										<li><i class="fas fa-star"></i></li>
									<?php endif ;?>	         
									<?php  if ( 'rat2' === $item['block_rating'] ) : ?>      
										<li><i class="fas fa-star"></i></li>
										<li><i class="fas fa-star"></i></li>
									<?php endif ;?>
									<?php  if ( 'rat3' === $item['block_rating'] ) : ?>      
										<li><i class="fas fa-star"></i></li>
										<li><i class="fas fa-star"></i></li>
										<li><i class="fas fa-star"></i></li>
									<?php endif ;?>	   
									<?php  if ( 'rat4' === $item['block_rating'] ) : ?>      
										<li><i class="fas fa-star"></i></li>
										<li><i class="fas fa-star"></i></li>
										<li><i class="fas fa-star"></i></li>
										<li><i class="fas fa-star"></i></li>
									<?php endif ;?>	
									<?php  if ( 'rat5' === $item['block_rating'] ) : ?>      
										<li><i class="fas fa-star"></i></li>
										<li><i class="fas fa-star"></i></li>
										<li><i class="fas fa-star"></i></li>
										<li><i class="fas fa-star"></i></li>
										<li><i class="fas fa-star"></i></li>
									<?php endif ;?>
                                    </ul>
                                    <p><?php echo wp_kses($item['block_text'], $allowed_tags);?></p>
                                    <h5><?php echo wp_kses($item['block_title'], $allowed_tags);?></h5>
                                    <span class="designation"><?php echo wp_kses($item['block_subtitle'], $allowed_tags);?></span>
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