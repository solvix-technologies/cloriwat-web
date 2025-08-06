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
class H2_About extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'acuasafe_h2_about';
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
		return esc_html__( 'H2 About', 'acuasafe' );
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
			'h2_about',
			[
				'label' => esc_html__( 'H2 About', 'acuasafe' ),
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
			'text2',
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
			'bgimg2',
			[
				'label' => esc_html__('Background image', 'rashid'),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'btnlink',
			[
			  'label' => __( 'Videolink', 'rashid' ),
			  'type' => Controls_Manager::URL,
			  'placeholder' => __( 'https://your-link.com', 'rashid' ),
			  'show_external' => true,
			  'default' => [
				'url' => '',
				'is_external' => true,
				'nofollow' => true,
			  ],
			
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
					'{{WRAPPER}} .about-style-two .sec-title h2' => 'display: {{VALUE}} !important',
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
				
					'{{WRAPPER}} .about-style-two .sec-title h2' => 'text-align: {{VALUE}} !important',
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
					'{{WRAPPER}} .about-style-two .sec-title h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
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
					'{{WRAPPER}} .about-style-two .sec-title h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'section_title_typography',
				'condition'    => array( 'show_section_title' => 'show' ),
				'label'    => __( 'Typography', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .about-style-two .sec-title h2',
			)
		);
		
		$this->add_control(
			'section_title_color',
			array(
				'label'     => __( 'Color', 'acuasafe' ),
				'condition'    => array( 'show_section_title' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .about-style-two .sec-title h2' => 'color: {{VALUE}} !important',
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
					'{{WRAPPER}} .about-style-two .content-box .text p' => 'display: {{VALUE}} !important',
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
					'{{WRAPPER}} .about-style-two .content-box .text p' => 'text-align: {{VALUE}} !important',
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
					'{{WRAPPER}} .about-style-two .content-box .text p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
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
					'{{WRAPPER}} .about-style-two .content-box .text p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'section_title_text_typography',
				'condition'    => array( 'show_section_title_text' => 'show' ),
				'label'    => __( 'Typography', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .about-style-two .content-box .text p',
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
					'{{WRAPPER}} .about-style-two .content-box .text p' => 'color: {{VALUE}} !important',
				),
			)
		);

		$this->end_controls_section();
		
		//End of Section Title Text=========	
		
		

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
        
        <section class="about-style-two <?php echo esc_attr($settings['sec_class']);?>">
			<?php  if ( esc_url($settings['bgimg']['id']) ) : ?>
            <div class="pattern-layer" style="background-image: url(<?php echo wp_get_attachment_url($settings['bgimg']['id']);?>);">
			<?php else :?>	
			<div class="noimage">
			<?php endif;?>
			</div>
            <div class="auto-container">
                <div class="content-box">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-12 col-sm-12 title-column">
                            <div class="sec-title">
                                <h2><?php echo $settings['title'];?></h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 text-column">
                            <div class="text">
                                <p><?php echo $settings['text'];?></p>
                                <p><?php echo $settings['text2'];?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="video-inner">
					<?php  if ( esc_url($settings['bgimg2']['id']) ) : ?>
                    <div class="inner-box" style="background-image: url(<?php echo wp_get_attachment_url($settings['bgimg2']['id']);?>);">
					<?php else :?>	
					<div class="noimage">
					<?php endif;?>
                         <div class="video-btn">
                            <a href="<?php echo esc_url($settings['btnlink']['url']);?>" class="lightbox-image" data-caption=""><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
             
		<?php 
	}

}