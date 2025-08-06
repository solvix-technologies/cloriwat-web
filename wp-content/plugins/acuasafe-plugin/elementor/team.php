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
class Team extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'acuasafe_team';
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
		return esc_html__( 'Team', 'acuasafe' );
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
	protected function _register_controls() {
		$this->start_controls_section(
			'team',
			[
				'label' => esc_html__( 'Team', 'acuasafe' ),
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
			'image',
				[
				  'label' => __( 'Image', 'rashid' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
		);	

	$this->add_control(
			'alt_text',
			[
				'label'       => __( 'Alt text', 'rashid' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Description', 'rashid' ),
			]
		);


		$this->add_control(
			'title',
			[
				'label'       => __( 'Name', 'rashid' ),
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
				'label'       => __( 'Designation', 'rashid' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub title', 'rashid' ),
			]
		);


		$this->end_controls_section();
		
		// New Tab#1

		$this->start_controls_section(
					'content_section',
					[
						'label' => __( 'Icon Block', 'rashid' ),
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
									'label' => __( 'Icons Url', 'rashid' ),
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

  		<section class="<?php echo esc_attr($settings['sec_class']);?>">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 team-block">
                        <div class="team-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500m">
                            <div class="inner-box">
                                <div class="image-box">

                                    <figure class="image">
										<?php  if ( esc_url($settings['image']['id']) ) : ?>   
										<img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
										<?php else :?>
										<div class="noimage"></div>
										<?php endif;?>
									</figure>

                                    <ul class="social-links clearfix">
										<?php foreach($settings['repeat'] as $item):?>	
                                        <li><a href="<?php echo esc_url($item['block_btnlink']['url']);?>"><i class="<?php echo str_replace("icon ", " ", esc_attr( $item['block_icons']['value']));?>"></i></a></li>
										<?php endforeach; ?>
                                    </ul>

                                </div>
                                <div class="lower-content">
                                    <h4><a href="<?php echo esc_url($settings['btnlink']['url']);?>"><?php echo $settings['title'];?></a></h4>
                                    <span class="designation"><?php echo $settings['subtitle'];?></span>
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