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
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;
use Elementor\Utils;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Blog_Grid extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'acuasafe_blog_grid';
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
		return esc_html__( 'Blog Grid', 'acuasafe' );
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
			'blog_grid',
			[
				'label' => esc_html__( 'Blog Grid', 'acuasafe' ),
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
			'column',
			[
				'label'   => esc_html__( 'Column', 'rashid' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '3',
				'options' => array(
					'12'   => esc_html__( 'One Column', 'rashid' ),
					'6'   => esc_html__( 'Two Column', 'rashid' ),
					'4'   => esc_html__( 'Three Column', 'rashid' ),
					'3'   => esc_html__( 'Four Column', 'rashid' ),
					'2'   => esc_html__( 'Six Column', 'rashid' ),
				),
			]
		);
		
		
		$this->end_controls_section();
	
		$this->start_controls_section(
				'content_section',
				[
					'label' => __( 'Blog Block', 'rashid' ),
					'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);
			$this->add_control(
				'text_limit',
				[
					'label'   => esc_html__( 'Text Limit', 'acuasafe' ),
					'type'    => Controls_Manager::NUMBER,
					'default' => 15,
					'min'     => 1,
					'max'     => 100,
					'step'    => 1,
				]
			);
			$this->add_control(
				'query_number',
				[
					'label'   => esc_html__( 'Number of post', 'acuasafe' ),
					'type'    => Controls_Manager::NUMBER,
					'default' => 3,
					'min'     => 1,
					'max'     => 100,
					'step'    => 1,
				]
			);
			$this->add_control(
				'query_orderby',
				[
					'label'   => esc_html__( 'Order By', 'acuasafe' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'date',
					'options' => array(
						'date'       => esc_html__( 'Date', 'acuasafe' ),
						'title'      => esc_html__( 'Title', 'acuasafe' ),
						'menu_order' => esc_html__( 'Menu Order', 'acuasafe' ),
						'rand'       => esc_html__( 'Random', 'acuasafe' ),
					),
				]
			);
			$this->add_control(
				'query_order',
				[
					'label'   => esc_html__( 'Order', 'acuasafe' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'DESC',
					'options' => array(
						'DESc' => esc_html__( 'DESC', 'acuasafe' ),
						'ASC'  => esc_html__( 'ASC', 'acuasafe' ),
					),
				]
			);
			$this->add_control(
				'query_exclude',
				[
					'label'       => esc_html__( 'Exclude', 'acuasafe' ),
					'type'        => Controls_Manager::TEXT,
					'description' => esc_html__( 'Exclude posts, pages, etc. by ID with comma separated.', 'acuasafe' ),
				]
			);
		
			$this->add_control(
				'query_category', 
					[
					  'type' => Controls_Manager::SELECT,
					  'label' => esc_html__('Category', 'acuasafe'),
					  'options' => get_blog_categories()
					]
			);
			$this->add_control(
				'show_pagination',
				[
					'label' => __( 'Enable/Disable Pagination', 'acuasafe' ),
					'type'     => Controls_Manager::SWITCHER,
					'dynamic'     => [
						'active' => true,
					],
					'placeholder' => __( 'Enable/Disable Pagination', 'acuasafe' ),
				]
			);
	
		
		$this->end_controls_section();
		
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
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .category a' => 'display: {{VALUE}} !important',
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
				
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .category' => 'text-align: {{VALUE}} !important',
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
			'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .category a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',		
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
			'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .category a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',		
				),
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
		
			array(
				'name'     => 'subtitle_typography',
				'condition'    => array( 'show_subtitle' => 'show' ),
				'label'    => __( 'Typography', 'acuasafee' ),
				'selector' => '{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .category a',
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
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .category a' => 'color: {{VALUE}} !important',
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
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content h4 a' => 'display: {{VALUE}} !important',
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
				
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content h4 a' => 'text-align: {{VALUE}} !important',
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
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content h4 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
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
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content h4 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'condition'    => array( 'show_title' => 'show' ),
				'label'    => __( 'Typography', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content h4 a',
			)
		);
		
		$this->add_control(
			'title_color',
			array(
				'label'     => __( 'Color', 'acuasafe' ),
				'condition'    => array( 'show_title' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content h4 a' => 'color: {{VALUE}} !important',
		
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
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content h4 a:hover' => 'color: {{VALUE}} !important',
		
				),
			)
		);

		$this->end_controls_section();	
		
		
		//End of  Title 	==================
		
		//Text==========================
		$this->start_controls_section(
			'text_settings',
			array(
				'label' => __( 'Author Text Setting', 'acuasafee' ),
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
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .post-info li a' => 'display: {{VALUE}} !important',
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
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .post-info li' => 'text-align: {{VALUE}} !important',
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
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .post-info li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
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
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .post-info li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'text_typography',
				'condition'    => array( 'show_text' => 'show' ),
				'label'    => __( 'Typography', 'acuasafee' ),
				'selector' => '{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .post-info li a',
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
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .post-info li a' => 'color: {{VALUE}} !important',
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
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .post-info li a:hover' => 'color: {{VALUE}} !important',
				),
			)
		);

		$this->end_controls_section();
		//End of Text=========	
		
		//Text==========================
		
		$this->start_controls_section(
			'text_settings1',
			array(
				'label' => __( 'Date Text Setting', 'acuasafee' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		
		$this->add_control(
			'show_text1',
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
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .post-info li:last-child' => 'display: {{VALUE}} !important',
				),  
			)
		);
		
		$this->add_control(
			'text_alignment1',
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
				'condition'    => array( 'show_text1' => 'show' ),
				'toggle' => true,
				'selectors' => array(
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .post-info' => 'text-align: {{VALUE}} !important',
				),
			)
		);
		
		$this->add_control(
			'text_margin1',
			array(
				'label'     => __( 'Margin', 'acuasafee' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'condition'    => array( 'show_text1' => 'show' ),
				'selectors' => array(
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .post-info li:last-child' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		
		$this->add_control(
			'text_padding1',
			array(
				'label'     => __( 'Padding', 'acuasafee' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'condition'    => array( 'show_text1' => 'show' ),
				'selectors' => array(
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .post-info li:last-child' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'text_typography1',
				'condition'    => array( 'show_text1' => 'show' ),
				'label'    => __( 'Typography', 'acuasafee' ),
				'selector' => '{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .post-info li:last-child',
			)
		); 
		
		$this->add_control(
			'text_color1',
			array(
				'label'     => __( 'Color', 'acuasafee' ),
				'condition'    => array( 'show_text1' => 'show' ),
				'separator' => 'after',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .post-info li:last-child' => 'color: {{VALUE}} !important',
				),
			)
		);


		$this->end_controls_section();
		
		//End of Text=========	
		
		//Text==========================
		
		$this->start_controls_section(
			'text_settings2',
			array(
				'label' => __( 'Text Setting', 'acuasafee' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		
		$this->add_control(
			'show_text2',
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
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .text' => 'display: {{VALUE}} !important',
				),  
			)
		);
		
		$this->add_control(
			'text_alignment2',
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
				'condition'    => array( 'show_text2' => 'show' ),
				'toggle' => true,
				'selectors' => array(
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .text' => 'text-align: {{VALUE}} !important',
				),
			)
		);
		
		$this->add_control(
			'text_margin2',
			array(
				'label'     => __( 'Margin', 'acuasafee' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'condition'    => array( 'show_text2' => 'show' ),
				'selectors' => array(
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		
		$this->add_control(
			'text_padding2',
			array(
				'label'     => __( 'Padding', 'acuasafee' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'condition'    => array( 'show_text2' => 'show' ),
				'selectors' => array(
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'text_typography2',
				'condition'    => array( 'show_text2' => 'show' ),
				'label'    => __( 'Typography', 'acuasafee' ),
				'selector' => '{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .text',
			)
		); 
		
		$this->add_control(
			'text_color2',
			array(
				'label'     => __( 'Color', 'acuasafee' ),
				'condition'    => array( 'show_text2' => 'show' ),
				'separator' => 'after',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .text p' => 'color: {{VALUE}} !important',
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
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .theme-btn' => 'display: {{VALUE}} !important',
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
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content' => 'text-align: {{VALUE}} !important',
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
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .theme-btn' => 'color: {{VALUE}} !important',

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
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .theme-btn' => 'background: {{VALUE}} !important',
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
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .theme-btn:hover' => 'color: {{VALUE}} !important',
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
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .theme-btn:before' => 'background: {{VALUE}} !important',
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
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .theme-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
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
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .theme-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'button_typography',
				'condition'    => array( 'show_button' => 'show' ),
				'label'    => __( 'Typography', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .theme-btn',
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name' => 'border',
				'condition'    => array( 'show_button' => 'show' ),
				'selector' => '{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .theme-btn',
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
					'{{WRAPPER}} .sidebar-page-container .news-block-one .inner-box .lower-content .theme-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		$this->end_controls_section();
		
		//End of Button
		
		//Text==========================
		
		
		$this->start_controls_section(
			'text_settings3',
			array(
				'label' => __( 'Pagination Setting', 'acuasafee' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		
		$this->add_control(
			'show_text3',
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
					'{{WRAPPER}} .sidebar-page-container .pagination li a' => 'display: {{VALUE}} !important',
				),   
			)
		);
		
		$this->add_control(
			'text_alignment3',
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
				'condition'    => array( 'show_text3' => 'show' ),
				'toggle' => true,
				'selectors' => array(
					'{{WRAPPER}} .sidebar-page-container .pagination li a' => 'text-align: {{VALUE}} !important',
				), 
			)
		);
		
		$this->add_control(
			'text_margin3',
			array(
				'label'     => __( 'Margin', 'acuasafee' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'condition'    => array( 'show_text3' => 'show' ),
				'selectors' => array(
					'{{WRAPPER}} .sidebar-page-container .pagination li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		
		$this->add_control(
			'text_padding3',
			array(
				'label'     => __( 'Padding', 'acuasafee' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'condition'    => array( 'show_text3' => 'show' ),
				'selectors' => array(
					'{{WRAPPER}} .sidebar-page-container .pagination li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'text_typography3',
				'condition'    => array( 'show_text3' => 'show' ),
				'label'    => __( 'Typography', 'acuasafee' ),
				'selector' => '{{WRAPPER}} .sidebar-page-container .pagination li a',
			)
		); 
		
		$this->add_control(
			'text_color3',
			array(
				'label'     => __( 'Color', 'acuasafee' ),
				'condition'    => array( 'show_text3' => 'show' ),
				'separator' => 'after',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .sidebar-page-container .pagination li a' => 'color: {{VALUE}} !important',
				),
			)
		);

		$this->add_control(
			'text_hover_color3',
			array(
				'label'     => __( 'Hover Color', 'acuasafee' ),
				'condition'    => array( 'show_text3' => 'show' ),
				'separator' => 'after',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .sidebar-page-container .pagination li a:hover' => 'color: {{VALUE}} !important',
				),
			)
		);
		
		$this->add_control(
			'text_bg_color3',
			array(
				'label'     => __( 'Hover Color', 'acuasafee' ),
				'condition'    => array( 'show_text3' => 'show' ),
				'separator' => 'after',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .sidebar-page-container .pagination li a' => 'background: {{VALUE}} !important',
				),
			)
		);

		$this->add_control(
			'text_bg_hover_color3',
			array(
				'label'     => __( 'Hover Color', 'acuasafee' ),
				'condition'    => array( 'show_text3' => 'show' ),
				'separator' => 'after',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .sidebar-page-container .pagination li a:hover' => 'background: {{VALUE}} !important',
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
        
        $paged = acuasafe_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;

		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-acuasafe' );
		$args = array(
			'post_type'      => 'post',
			'posts_per_page' => acuasafe_set( $settings, 'query_number' ),
			'orderby'        => acuasafe_set( $settings, 'query_orderby' ),
			'order'          => acuasafe_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if ( acuasafe_set( $settings, 'query_exclude' ) ) {
			$settings['query_exclude'] = explode( ',', $settings['query_exclude'] );
			$args['post__not_in']      = acuasafe_set( $settings, 'query_exclude' );
		}
		if( acuasafe_set( $settings, 'query_category' ) ) $args['category_name'] = acuasafe_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ ?>

		<section class="sidebar-page-container blog-grid <?php echo esc_attr($settings['sec_class']);?>">
			<div class="auto-container">
				<div class="row clearfix">
					<div class="col-lg-12 col-md-12 col-sm-12 content-side">
						<div class="blog-grid-content">
							<div class="row clearfix">
							
								<?php while ( $query->have_posts() ) : $query->the_post();
								$meta_image = get_post_meta( get_the_id(), 'meta_image', true );
								?>
								
								<div class="col-lg-<?php echo esc_attr($settings['column'], true );?> col-md-6 col-sm-12 news-block">
									<div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500m">
										<div class="inner-box">
											<figure class="image-box"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><img src="<?php echo wp_get_attachment_url($meta_image['id']);?>" alt=""></a></figure>
											<div class="lower-content">
											<div class="category"><?php the_category(', '); ?></div>
											<h4><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h4>
											<ul class="post-info clearfix">
												<li><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"><?php the_author(); ?></a></li>
												<li><?php echo get_the_date(); ?></li>
											</ul>
											<div class="text">
												<p><?php echo acuasafe_trim(get_the_content(), $settings['text_limit']); ?></p>
											</div>
											<div class="btn-box">
												<a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>" class="theme-btn btn-two"><?php esc_html_e('Read More', 'acuasafe'); ?></a>
											</div>
										</div>
										</div>
									</div>
								</div>
								
								<?php endwhile; ?>
								
							</div>
							
							<?php if($settings['show_pagination']){ ?>
							<div class="row">
								<div class="col-xl-12">
									<div class="pagination-wrapper">
										<?php acuasafe_the_pagination2(array('total'=>$query->max_num_pages, 'next_text' => ' <i class="far fa-angle-right"></i>', 'prev_text' => '<i class="far fa-angle-left"></i>')); ?>
									</div>
								</div>
							</div>
							<?php } ?>
							
						</div>
					</div>
				</div>
			</div>
		</section>
		
        <?php }
		wp_reset_postdata();
	}

}