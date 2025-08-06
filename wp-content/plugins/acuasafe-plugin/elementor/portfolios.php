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
class Portfolios extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'acuasafe_portfolios';
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
		return esc_html__( 'Portfolios', 'acuasafe' );
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
			'portfolios',
			[
				'label' => esc_html__( 'portfolios', 'acuasafe' ),
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
		$this->add_control(
			'number',
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
			'cat_exclude',
			[
				'label'       => esc_html__( 'Exclude', 'acuasafe' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Exclude categories, etc. by ID with comma separated.', 'acuasafe' ),
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
		$this->end_controls_section();
				
	
		//========== Button with Background ===================================

		$this->start_controls_section(
			'button_control',
			array(
				'label' => __( 'Button Settings', 'acuasafee' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		
		$this->add_control(
			'show_button',
			array(
				'label' => esc_html__( 'Show Button', 'acuasafee' ),
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
					'{{WRAPPER}} .gallery-section .sortable-masonry .filters .filter-tabs li.active' => 'display: {{VALUE}} !important',
				),   
			)
		);		
		$this->add_control(
			'button_alingment',
			array(
				'label' => esc_html__( 'Alignment', 'acuasafee' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'condition'    => array( 'show_button' => 'show' ),
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
				'toggle' => true,
				'selectors' => array(
					'{{WRAPPER}} .gallery-section .sortable-masonry .filters .filter-tabs li.active' => 'text-align: {{VALUE}} !important',
				),
			)
		);	
		$this->add_control(
			'button_color',
			array(
				'label'     => __( 'Button Color', 'acuasafee' ),
				'condition'    => array( 'show_button' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .gallery-section .sortable-masonry .filters .filter-tabs li.active' => 'color: {{VALUE}} !important',

				),
			)
		);
		$this->add_control(
			'button_bg_color',
			array(
				'label'     => __( 'Background Color', 'acuasafee' ),
				'condition'    => array( 'show_button' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .gallery-section .sortable-masonry .filters .filter-tabs li.active' => 'background: {{VALUE}} !important',
				),
			)
		);	
			
		$this->add_control(
			'button_padding',
			array(
				'label'     => __( 'Padding', 'acuasafee' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'condition'    => array( 'show_button' => 'show' ),
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}} .gallery-section .sortable-masonry .filters .filter-tabs li.active' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		$this->add_control(
			'button_margin',
			array(
				'label'     => __( 'Margin', 'acuasafee' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'condition'    => array( 'show_button' => 'show' ),
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .gallery-section .sortable-masonry .filters .filter-tabs li.active' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'button_typography',
				'condition'    => array( 'show_button' => 'show' ),
				'label'    => __( 'Typography', 'acuasafee' ),
				'selector' => '{{WRAPPER}} .gallery-section .sortable-masonry .filters .filter-tabs li.active',
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name' => 'border',
				'condition'    => array( 'show_button' => 'show' ),
				'selector' => '{{WRAPPER}} .gallery-section .sortable-masonry .filters .filter-tabs li.active',
			)
		);
		$this->add_control(
			'border_radius',
			array(
				'label' => esc_html__( 'Border Radius', 'acuasafee' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'condition'    => array( 'show_button' => 'show' ),
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .gallery-section .sortable-masonry .filters .filter-tabs li.active' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			)
		); 

		$this->end_controls_section();
		
			//End of Button	
		
//========== Button Two with Background ===================================

		$this->start_controls_section(
			'two_button_control',
			array(
				'label' => __( 'Button Two Settings', 'acuasafee' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		
		
		$this->add_control(
			'show_two_button',
			array(
				'label' => esc_html__( 'Show Button', 'acuasafee' ),
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
					'{{WRAPPER}} .gallery-section .sortable-masonry .filters .filter-tabs li' => 'display: {{VALUE}} !important',
				), 
			)
		);		
		$this->add_control(
			'two_button_alingment',
			array(
				'label' => esc_html__( 'Alignment', 'acuasafee' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'condition'    => array( 'show_two_button' => 'show' ),
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
				'toggle' => true,
				'selectors' => array(
					'{{WRAPPER}} .gallery-section .sortable-masonry .filters .filter-tabs li' => 'text-align: {{VALUE}} !important',
				),
			)
		);	
		$this->add_control(
			'two_button_color',
			array(
				'label'     => __( 'Button Color', 'acuasafee' ),
				'condition'    => array( 'show_two_button' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .gallery-section .sortable-masonry .filters .filter-tabs li' => 'color: {{VALUE}} !important',

				),
			)
		);
		$this->add_control(
			'two_button_bg_color',
			array(
				'label'     => __( 'Background Color', 'acuasafee' ),
				'condition'    => array( 'show_two_button' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .gallery-section .sortable-masonry .filters .filter-tabs li' => 'background: {{VALUE}} !important',
				),
			)
		);	
			
		$this->add_control(
			'two_button_padding',
			array(
				'label'     => __( 'Padding', 'acuasafee' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'condition'    => array( 'show_two_button' => 'show' ),
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}} .gallery-section .sortable-masonry .filters .filter-tabs li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		$this->add_control(
			'two_button_margin',
			array(
				'label'     => __( 'Margin', 'acuasafee' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'condition'    => array( 'show_two_button' => 'show' ),
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .gallery-section .sortable-masonry .filters .filter-tabs li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'two_button_typography',
				'condition'    => array( 'show_two_button' => 'show' ),
				'label'    => __( 'Typography', 'acuasafee' ),
				'selector' => '{{WRAPPER}} .gallery-section .sortable-masonry .filters .filter-tabs li',
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name' => 'two_border',
				'condition'    => array( 'show_two_button' => 'show' ),
				'selector' => '{{WRAPPER}} .gallery-section .sortable-masonry .filters .filter-tabs li',
			)
		);
		$this->add_control(
			'two_border_radius',
			array(
				'label' => esc_html__( 'Border Radius', 'acuasafee' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'condition'    => array( 'show_two_button' => 'show' ),
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .gallery-section .sortable-masonry .filters .filter-tabs li' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
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
		$paged = acuasafe_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;
		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-acuasafe' );
		$args = array(
			'post_type'      => 'acuasafe_project',
			'posts_per_page' => acuasafe_set( $settings, 'number' ),
			'orderby'        => acuasafe_set( $settings, 'query_orderby' ),
			'order'          => acuasafe_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		$terms_array = explode(",",acuasafe_set( $settings, 'cat_exclude' ));
		if(acuasafe_set( $settings, 'cat_exclude' )) $args['tax_query'] = array(array('taxonomy' => 'project_cat','field' => 'id','terms' => $terms_array,'operator' => 'NOT IN',));
		$allowed_tags = wp_kses_allowed_html('post');
		$query = new \WP_Query( $args );
		$t = '';
		$data_filtration = '';
		$data_posts = '';
		if ( $query->have_posts() ) 
		{
		ob_start();
		?>
  
		<?php 
            $count = 0; 
            $fliteration = array();
            while( $query->have_posts() ): $query->the_post();
            global  $post;
            $meta = ''; //printr($meta);
            $meta1 = ''; //_WSH()->get_meta();
            $post_terms = get_the_terms( get_the_id(), 'project_cat');// printr($post_terms); exit();
            foreach( (array)$post_terms as $pos_term ) $fliteration[$pos_term->term_id] = $pos_term;
            $temp_category = get_the_term_list(get_the_id(), 'project_cat', '', ', ');
            
            $post_terms = wp_get_post_terms( get_the_id(), 'project_cat'); 
            $term_slug = '';
            if( $post_terms ) foreach( $post_terms as $p_term ) $term_slug .= $p_term->slug.' ';
        
            ?>
			
			

			
			
			
			<div class="col-lg-<?php echo esc_attr($settings['column'], true );?> col-md-6 col-sm-12 masonry-item small-column all <?php echo esc_attr($term_slug); ?>">
				<div class="gallery-block-one">
					<div class="inner-box">
						<figure class="image-box">
							<?php the_post_thumbnail(); ?>
						</figure>
						<div class="link">
							<a href="<?php echo esc_url(get_post_meta( get_the_id(), 'image_link', true ));?>" class="lightbox-image" data-fancybox="gallery"><i class="fal fa-plus"></i></a>
						</div>
					</div>
				</div>
			</div>

            <?php endwhile;?>

            <?php wp_reset_postdata();
            $data_posts = ob_get_contents();
            ob_end_clean();
            
            ob_start();?>
            
            <?php $terms = get_terms(array('project_cat')); ?>
			
<?php
	  echo '
	 <script>
 jQuery(document).ready(function($) {

//put the js code under this line 

	//Sortable Masonary with Filters
	function enableMasonry() {
		if($(".sortable-masonry").length){
	
			var winDow = $(window);
			// Needed variables
			var $container=$(".sortable-masonry .items-container");
			var $filter=$(".filter-btns");
	
			$container.isotope({
				filter:'*',
				 masonry: {
					columnWidth : ".masonry-item.small-column"
				 },
				animationOptions:{
					duration:500,
					easing:"linear"
				}
			});
			
	
			// Isotope Filter 
			$filter.find("li").on("click", function(){
				var selector = $(this).attr("data-filter");
	
				try {
					$container.isotope({ 
						filter	: selector,
						animationOptions: {
							duration: 500,
							easing	: "linear",
							queue	: false
						}
					});
				} catch(err) {
	
				}
				return false;
			});
	
	
			winDow.on("resize", function(){
				var selector = $filter.find("li.active").attr("data-filter");

				$container.isotope({ 
					filter	: selector,
					animationOptions: {
						duration: 500,
						easing	: "linear",
						queue	: false
					}
				});
			});
	
	
			var filterItemA	= $(".filter-btns li");
	
			filterItemA.on("click", function(){
				var $this = $(this);
				if ( !$this.hasClass("active")) {
					filterItemA.removeClass("active");
					$this.addClass("active");
				}
			});
		}
	}
	
	enableMasonry();

//put the code above the line 

  });
</script>';


?>
			
			
			
			
			
        
			<section class="gallery-section centred <?php echo esc_attr($settings['sec_class']);?>">
				<div class="auto-container">
					<div class="sortable-masonry">
						<div class="filters">
							<ul class="filter-tabs filter-btns clearfix">
								<li class="active filter" data-role="button" data-filter=".all"><?php esc_attr_e('Filter-All', 'acuasafe');?></li>
								<?php foreach( $fliteration as $t ): ?>
								<li class="filter" data-role="button" data-filter=".<?php echo esc_attr(acuasafe_set( $t, 'slug' )); ?>"><?php echo acuasafe_set( $t, 'name'); ?></li>
								<?php endforeach;?>
							</ul>
						</div>
						<div class="items-container row clearfix">
						
							<?php echo $data_posts; ?>
							
						</div>
					</div>
				</div>
			</section>
			
			
			

			
			
			
			
			
			
    	<?php }
	}

}