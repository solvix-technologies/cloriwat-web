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
class Productsearch extends Widget_Base {


	public function get_name() {
		return 'acuasafe_productsearch';
	}

	
	public function get_title() {
		return esc_html__( 'Products Search', 'acuasafe' );
	}


	public function get_icon() {
		return 'eicon-search';
	}

	public function get_categories() {
		return [ 'acuasafe' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'productsearch',
			[
				'label' => esc_html__( 'Product Search', 'acuasafe' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'acuasafe' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'acuasafe' ),
			]
		);
		$this->add_control(
			'contact_us_form',
			[
				'label'       => __( 'Set Shortcode', 'acuasafe' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( '[mr_product_search]', 'acuasafe' ),
				'default'     => __( '[mr_product_search]', 'acuasafe' ),
			]
		);
		
		
		$this->end_controls_section();
	
		}

	/**
	 * Render button widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since  1.0.0
	 * @access 
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$allowed_tags = wp_kses_allowed_html('post');
		?>     
		<section class="product_search">
			<div class="acuasafe-search-box-area">
				<div class="acuasafe-search-box-header">
					<h2><?php echo $settings['title'];?></h2>
				</div>
				<?php echo do_shortcode( $settings['contact_us_form'] );?>

			</div>
		</section>
             
		<?php 
	}

}