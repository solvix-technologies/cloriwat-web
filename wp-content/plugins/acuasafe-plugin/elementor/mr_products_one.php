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

/*
index
Genaral 111
Meta 222
Slider 333
Section Title 444
Section Sub Title 555
Product Price 666
Product Title 777
Thumbnail 888
Rating 999
progress ppp
Quick View aaa
Hot/Sale bbb
Block ccc
Rendar Area ddd
HTML are index eee	
*/


class Mr_Products_One extends Widget_Base {

	public function get_name() {
		return 'acuasafe_mr_products_one';
	}

	public function get_title() {
		return esc_html__( 'Products One', 'acuasafe' );
	}

	public function get_icon() {
		return ' ';
	}

	public function get_categories() {
		return [ 'acuasafe' ];
	}
		
	protected function register_controls() {
	// indext  111	
		$this->start_controls_section(
			'Settings',
			[
				'label' => esc_html__( 'Genaral Settings ', 'acuasafe' ),
			]
		);



	$this->add_control(
			'product_grid_type',
			array(
				'label'   => esc_html__( 'Products Type', 'acuasafe' ),
				'type'    =>  \Elementor\Controls_Manager::SELECT,
				'default' => 'recent_products',
				'options' => array(
					'featured_products'     => esc_html__( 'Featured Products', 'acuasafe' ),
					'sale_products'         => esc_html__( 'Sale Products', 'acuasafe' ),
					'best_selling_products' => esc_html__( 'Best Selling Products', 'acuasafe' ),
					'recent_products'       => esc_html__( 'Recent Products', 'acuasafe' ),
					'top_rated_products'    => esc_html__( 'Top Rated Products', 'acuasafe' ),
					'product_category'      => esc_html__( 'Product Category', 'acuasafe' ),
					'product_tag'      => esc_html__( 'Product Tag', 'acuasafe' ),
				),
			)
		);


	$this->add_control(
	            'query_category', 
				array(
	                'label' => __( 'Select Category', 'acuasafe' ),
	                'condition' => array(
						'product_grid_type' => 'product_category',
					),
	                'type' => \Elementor\Controls_Manager::SELECT2,
	                'multiple' => true,
	                'options' => mr_product_cat_list(),
	                'default' => [ 'all' ],
	            )
			);


	$this->add_control(
            'query_tag',
          array(
                'label' => __( 'Select Tags', 'acuasafe' ),
                'condition' => array(
					'product_grid_type' => 'product_tag',
				),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => mr_product_tag_list(),
                'default' => [ 'all' ],
            )
        );

		$this->add_control(
            'columns',
            array(
                'label' => __( 'Columns Settings', 'acuasafe' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '1'  => __( '1 Column', 'acuasafe' ),
                    '2' => __( '2 Columns', 'acuasafe' ),
                    '3' => __( '3 Columns', 'acuasafe' ),
                    '4' => __( '4 Columns', 'acuasafe' ),
					'5' => __( '5 Columns', 'acuasafe' ),
					'6' => __( '6 Columns', 'acuasafe' ),
					'12' => __( '12 Columns', 'acuasafe' ),
                ],
            )
        );


      $this->add_control(
			'query_number',
			  array(
			
				'label'   => esc_html__( 'Number of post', 'acuasafe' ),
				'label_block' => false,
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			)
		);
   
     $this->add_control(
			'query_orderby',
		  array(
				'label'   => esc_html__( 'Order By', 'acuasafe' ),
				'label_block' => false,
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'       => esc_html__( 'Date', 'acuasafe' ),
					'title'      => esc_html__( 'Title', 'acuasafe' ),
					'menu_order' => esc_html__( 'Menu Order', 'acuasafe' ),
					'rand'       => esc_html__( 'Random', 'acuasafe' ),
				),
			)
		);

   $this->add_control(
			'query_order',
			array(
				'label'   => esc_html__( 'Order', 'acuasafe' ),
				'label_block' => false,
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESC' => esc_html__( 'DESC', 'acuasafe' ),
					'ASC'  => esc_html__( 'ASC', 'acuasafe' ),
				),
				'separator' => 'after'
			)
		);



$this->end_controls_section();
//End of Genaral Settings	
//
//	Meta sEttings ARea	===========================
// indext  222
		$this->start_controls_section(
					'meta_settings',
					[
						'label' => __( 'Meta Settings', 'acuasafe' ),
						'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
					]
				);		
		

		$this->add_control(
                'show_hot',
               array(
                    'label' => __( 'Show Hot Tag', 'acuasafe' ),
                    'type'     => \Elementor\Controls_Manager::SWITCHER,
                     'return_value' => '1',
                     'default'      => '1',
                    'placeholder' => __( 'Show Hot Tag', 'acuasafe' ),
                )
            );
		    $this->add_control(
            'hot_text',
            array(
                'label'       => __( 'Hot/Sale Text', 'acuasafe' ),
                 'condition'    => array( 'show_hot' => '1' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'dynamic'     => [
                    'active' => true,
                ],
                'placeholder' => __( 'Hot/Sale', 'acuasafe' ),
			   'separator' => 'after'
            )
        );
				
//Wish List

       $this->add_control(
                'show_whishlist',
                array(
                    'label' => __( 'Show Wish List', 'acuasafe' ),
                    'type'     => \Elementor\Controls_Manager::SWITCHER,
                     'return_value' => '1',
                     'default'      => '1',
                    'placeholder' => __( 'Show Wish List', 'acuasafe' ),
                )
            );
	  $this->add_control(
	            'whish_list',
	             array(
	                'label'       => __( 'Wish List Shortcode', 'acuasafe' ),
	                'condition'    => array( 'show_whishlist' => '1' ),
	                'type'        => \Elementor\Controls_Manager::TEXT,
	                'dynamic'     => [
	                  'active' => true,
	                ],
	                'default'     => __( '[yith_wcwl_add_to_wishlist]', 'acuasafe' ),
	                'placeholder' => __( '[yith_wcwl_add_to_wishlist]', 'acuasafe' ),
	            )
	        );


      $this->add_control(
            'wishlist_tooltip',
            array(
                'label'       => __( 'Tooltip Wish list Text', 'acuasafe' ),
                    'condition'    => array( 'show_whishlist' => '1' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'dynamic'     => [
                    'active' => true,
                ],
                'default' => __( 'Wish List', 'acuasafe' ),

				'separator' => 'after'
            )
        );
     

//Show Compare
        $this->add_control(
                'show_compare',
                 array(
                    'label' => __( 'Show Compare', 'acuasafe' ),
                    'type'     => \Elementor\Controls_Manager::SWITCHER,
                     'return_value' => '1',
                     'default'      => '1',
                    'placeholder' => __( 'Show Compare', 'acuasafe' ),
                )
            );

      $this->add_control(
            'compare_tooltip',
            array(
                'label'       => __( 'Tooltip Compare', 'acuasafe' ),
                    'condition'    => array( 'show_compare' => '1' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'dynamic'     => [
                    'active' => true,
                ],
                'default' => __( 'Compare', 'acuasafe' ),
			   'separator' => 'after'
            )
        );

//Quick view

   	  	$this->add_control(
            'quickview',
         	array(
                'label'       => __( 'Quickview Shortcode', 'acuasafe' ),
                'condition'    => array( 'show_quickview' => '1' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'dynamic'     => [
                    'active' => true,
                ],
                'default'     => __( '[yith_quick_view product_id='.get_the_ID().' ]', 'acuasafe' ),
                'placeholder' => __( '[yith_quick_view product_id='.get_the_ID().' ]', 'acuasafe' ),

           )
        );
		
//add to cart 

        $this->add_control(
                'show_addtocart',
                array(
                    'label' => __( 'Show Add to cart', 'acuasafe' ),
                    'type'     => \Elementor\Controls_Manager::SWITCHER,
                    'return_value' => '1',
                     'default'      => '1',
                    'placeholder' => __( 'Show Add tp Cart', 'acuasafe' ),
                )
            );



      $this->add_control(
            'addtocart_tooltip',
            array(
                'label'       => __( 'Tooltip Add to Cart', 'acuasafe' ),
                    'condition'    => array( 'show_addtocart' => '1' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'dynamic'     => [
                    'active' => true,
                ],
                'default' => __( 'Add to Cart', 'acuasafe' ),
				    'separator' => 'after'
            )
        );
$this->end_controls_section();		
//End of Meta Settings	======================

//Start Slider


// indext  333	
  	$this->start_controls_section(
					'slider_settings',
					[
						'label' => __( 'Slider Settings', 'acuasafe' ),
						'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
					]
				);	  
         //Slider Area Code
    $this->add_control(
                'show_slider',
                 array(
                    'label' => __( 'Show Slider', 'acuasafe' ),
                    'type'     => \Elementor\Controls_Manager::SWITCHER,
                     'return_value' => '1',
                     'default'      => '1',
                    'placeholder' => __( 'Enable Slider', 'acuasafe' ),
                )
            );


    $this->add_control(
            'owl_dot', 
                 array(
                    'label'   => esc_html__( 'Choose Style', 'acuasafe' ),
                    'condition'    => array( 'show_slider' => '1' ),
                    'type'    => \Elementor\Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => array(
                        '1' => esc_html__( 'Nav', 'acuasafe' ),
						 '2' => esc_html__( 'Owl Dot', 'acuasafe' ),
                        '3' => esc_html__( 'No Nav', 'acuasafe' ),
                   
                    ),
                )
        );

       $this->add_control(
            'awl_loop', 
                array(
                    'label'   => esc_html__( 'Choose Style', 'acuasafe' ),
                    'condition'    => array( 'show_slider' => '1' ),
                    'type'    => \Elementor\Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => array(
                        '1' => esc_html__( 'Auto Play', 'acuasafe' ),
                        '2' => esc_html__( 'Disable Auto Play', 'acuasafe' ),

                    ),
                 )
        );



//End of slider		
           		
$this->end_controls_section();  
//End of Settings Area================================		


//price control============
// indext  666
	$this->start_controls_section(
			'price_settings',
			array(
				'label' => __( 'Price Setting', 'acuasafe' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		
	$this->add_control(
			'show_price',
			array(
				'label' => esc_html__( 'Show Price', 'acuasafe' ),
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
					'{{WRAPPER}} .mr_shop_price' => 'display: {{VALUE}} !important',
				),
			)
		);	
	$this->add_control(
			'price_alingment',
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
				'condition'    => array( 'show_price' => 'show' ),
				'toggle' => true,
				'selectors' => array(
					'{{WRAPPER}} .mr_shop_price' => 'text-align: {{VALUE}} !important',
				),
			)
		);	
	$this->add_control(
			'price_padding',
			array(
				'label'     => __( 'Padding', 'acuasafe' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'condition'    => array( 'show_price' => 'show' ),
				'selectors' => array(
					'{{WRAPPER}} .mr_shop_price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'price_typography',
				'condition'    => array( 'show_price' => 'show' ),
				'label'    => __( 'Typography', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .mr_shop_price',
			)
		);
		$this->add_control(
			'price_color',
			array(
				'label'     => __( 'Color', 'acuasafe' ),
				'condition'    => array( 'show_price' => 'show' ),
				'separator' => 'after',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .mr_shop_price bdi,.mr_shop_price ins span' => 'color: {{VALUE}} !important',
				),
			)
		);

		$this->end_controls_section();
//End of Text=========		


//end price control

//Title contro
////============= Product Item  Title=======================
// indext  777
	$this->start_controls_section(
			'product_title_settings',
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
					'{{WRAPPER}} .mr_product_title' => 'display: {{VALUE}} !important',
				),
			)
		);	
	$this->add_control(
			'title_alingment',
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
				
					'{{WRAPPER}} .mr_product_title h2' => 'text-align: {{VALUE}} !important',
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
					'{{WRAPPER}} .mr_product_title h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'condition'    => array( 'show_title' => 'show' ),
				'label'    => __( 'Typography', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .mr_product_title h2',
			)
		);
		$this->add_control(
			'title_color',
			array(
				'label'     => __( 'Color', 'acuasafe' ),
				'condition'    => array( 'show_title' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .mr_product_title h2' => 'color: {{VALUE}} !important',
		
				),
			)
		);

		$this->end_controls_section();
	
					
//End of  Title 	==================	
//end of title 

//========== Thumbnail ===================================

// indext  888
$this->start_controls_section(
			'thumbnail_control',
			array(
				'label' => __( 'Thumbanil Settings', 'acuasafe' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		
$this->add_control(
			'show_thumbnail',
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
					'{{WRAPPER}} .mr_product_thumb' => 'display: {{VALUE}} !important',
				),
			)
		);		
	

	$this->add_control(
			'thumbnail_padding',
			array(
				'label'     => __( 'Padding', 'acuasafe' ),
			
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
		
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}} .mr_product_thumb' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

	$this->add_control(
			'thumbnail_margin',
			array(
				'label'     => __( 'Margin', 'acuasafe' ),
					'condition'    => array( 'show_thumbnail' => 'show' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
			
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .mr_product_thumb' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);


		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name' => 'thumbnail_border',
					'condition'    => array( 'show_thumbnail' => 'show' ),
				'selector' => '{{WRAPPER}} .mr_product_thumb',
			)
		);
				
			$this->add_control(
			'thumbnail_border_radius',
			array(
				'label'     => __( 'Border Radius', 'acuasafe' ),
				'condition'    => array( 'show_block' => 'show' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .mr_product_thumb' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);	
		$this->end_controls_section();
		
//End of Thumbnail		
//=============== Product Rating ==============================

// indext  999
		$this->start_controls_section(
			'product_rating_setting',
			array(
				'label' => __( 'Product Rating Setting', 'acuasafe' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);


		$this->add_control(
			'show_rating',
			array(
				'label' => __( 'Show Rating', 'acuasafe' ),
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
					'{{WRAPPER}} .mr_star_rating' => 'display: {{VALUE}} !important',
				),
			)
		);		

	$this->add_control(
	'product_rating_alingment',
			array(
				'label' => esc_html__( 'Alignment', 'acuasafe' ),
				'condition'    => array( 'show_rating' => 'show' ),
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
				'toggle' => true,
				'selectors' => array(
					'{{WRAPPER}} .mr_star_rating' => 'text-align: {{VALUE}} !important',
				),
			)
		);	

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'product_rating_typography',
				'label'    => __( 'Product Rating Typography', 'acuasafe' ),
				'condition'    => array( 'show_rating' => 'show' ),
				'selector' => '{{WRAPPER}} .mr_star_rating li i',
			)
		);

		$this->add_control(
			'product_rating_color',
			array(
				'label'     => __( 'Rating Color', 'acuasafe' ),
				'condition'    => array( 'show_rating' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .mr_star_rating li i' => 'color: {{VALUE}} !important',
				),
			)
		);
		$this->add_control(
			'product_rating_margin',
			array(
				'label'     => __( 'Product Rating Padding', 'acuasafe' ),
				'separator' => 'after',
				'condition'    => array( 'show_rating' => 'show' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}}  .mr_star_rating' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		

	$this->add_control(
			'show_avarage_rating',
			array(
				'label' => __( 'Show Avarage Text', 'acuasafe' ),
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
					'{{WRAPPER}} .mr_review_number' => 'display: {{VALUE}} !important',
				),
			)
		);		
	$this->add_control(
	'product_avarage_rating_alingment',
			array(
				'label' => esc_html__( 'Alignment', 'acuasafe' ),
				'condition'    => array( 'show_avarage_rating' => 'show' ),
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
				'toggle' => true,
				'selectors' => array(
					'{{WRAPPER}} .mr_review_number' => 'text-align: {{VALUE}} !important',
				),
			)
		);	

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'product_avarage_rating_typography',
				'label'    => __( 'Product Avarage Typography', 'acuasafe' ),
					'condition'    => array( 'show_avarage_rating' => 'show' ),
				'selector' => '{{WRAPPER}} .mr_review_number ',
			)
		);

		$this->add_control(
			'product_avarage_rating_color',
			array(
				'label'     => __( 'Color', 'acuasafe' ),
					'condition'    => array( 'show_avarage_rating' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .mr_review_number' => 'color: {{VALUE}} !important',
				),
			)
		);
		$this->add_control(
			'product_avarage_rating_margin',
			array(
				'label'     => __( 'Padding', 'acuasafe' ),
				'condition'    => array( 'show_avarage_rating' => 'show' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}}  .mr_review_number' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);	

		$this->end_controls_section();


//end of rating

//Hot/Sale Button 888  ============
 
		
// indext  ppp  === progress =============
$this->start_controls_section(
			'progress_control',
			array(
				'label' => __( 'Progress Settings', 'acuasafe' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
				
			)
		);
		
		$this->add_control(
					'show_progress',
					array(
						'label' => esc_html__( 'Show Progress', 'acuasafe' ),
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
							'{{WRAPPER}} .mr_product_progress' => 'display: {{VALUE}} !important',

						),
					)
				);		
	
    $this->add_control(
            'sold_text',
            array(
                'label'       => __( 'Sold Text', 'acuasafe' ),
                'condition'    => array( 'show_progress' => 'show' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'dynamic'     => [
                    'active' => true,
                ],
                'default' => __( 'sold', 'acuasafe' ),
            )
        );
	
		$this->add_control(
					'sold_color',
					array(
						'label'     => __( 'Color', 'acuasafe' ),
						'condition'    => array( 'show_progress' => 'show' ),
						'type'      => \Elementor\Controls_Manager::COLOR,
						'selectors' => array(
							'{{WRAPPER}} .mr_product_progress .product-single-item-sold p' => 'color: {{VALUE}} !important',

						),
					)
				);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'progress_sold',
				'label'    => __( 'Typography', 'acuasafe' ),
				'condition'    => array( 'show_progress' => 'show' ),
				'selector' => '{{WRAPPER}} .mr_product_progress .product-single-item-sold p',
			)
		);	
	
		$this->add_control(
					'border_green',
					array(
						'label'     => __( 'Background One', 'acuasafe' ),
						'condition'    => array( 'show_progress' => 'show' ),
						'type'      => \Elementor\Controls_Manager::COLOR,
						'selectors' => array(
							'{{WRAPPER}} .mr_product_progress span.border-green' => 'background: {{VALUE}} !important',

						),
					)
				);
		
		$this->add_control(
            'level_one',
            array(
                'label'       => __( 'Level One', 'acuasafe' ),
                'condition'    => array( 'show_progress' => 'show' ),
                'type'        => \Elementor\Controls_Manager::NUMBER,
                'dynamic'     => [
                    'active' => true,
                ],
				 'default' => __( '50', 'acuasafe' ),
            )
        );
		
		
		$this->add_control(
					'border_yellow',
					array(
						'label'     => __( 'Background Color Three', 'acuasafe' ),
						'condition'    => array( 'show_progress' => 'show' ),
						'type'      => \Elementor\Controls_Manager::COLOR,
						'selectors' => array(
							'{{WRAPPER}} .mr_product_progress span.border-yellow' => 'background: {{VALUE}} !important',

						),
					)
				);	
	$this->add_control(
            'level_two',
            array(
                'label'       => __( 'Level Two', 'acuasafe' ),
                'condition'    => array( 'show_progress' => 'show' ),
                'type'        => \Elementor\Controls_Manager::NUMBER,
                'dynamic'     => [
                    'active' => true,
                ],
				'default' => __( '75', 'acuasafe' ),
            )
        );
		$this->add_control(
					'border_red',
					array(
						'label'     => __( 'Background Color Two', 'acuasafe' ),
						'condition'    => array( 'show_progress' => 'show' ),
						'type'      => \Elementor\Controls_Manager::COLOR,
						'selectors' => array(
							'{{WRAPPER}} .mr_product_progress span.border-red' => 'background: {{VALUE}} !important',

						),
					)
				);


			
	$this->add_control(
			'progress_button_padding',
			array(
				'label'     => __( 'Padding', 'acuasafe' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'condition'    => array( 'show_progress' => 'show' ),
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}} .mr_product_progress .product-single-item-bar' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name' => 'progress_border',
				'condition'    => array( 'show_progress' => 'show' ),
				'selector' => '{{WRAPPER}} .mr_product_progress .product-single-item-bar',
			)
		);
	
		
			$this->add_control(
			'progress_border_radius',
			array(
				'label'     => __( 'Border Radius', 'acuasafe' ),
				'condition'    => array( 'show_progress' => 'show' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .mr_product_progress .product-single-item-bar' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		
		
		$this->end_controls_section();
		
//End progress bar
//===================Quick View Control=====================

// indext  aaa
		$this->start_controls_section(
			'quick_title_typography',
			array(
				'label' => __( 'Quick View Setting', 'acuasafe' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);


   	$this->add_control(
			'show_quickview',
			array(
				  'label' => __( 'Show Quick View', 'acuasafe' ),
				  'type'     => \Elementor\Controls_Manager::SWITCHER,
				  'placeholder' => __( 'Show Quick View', 'acuasafe' ),
                  'return_value' => '1',
                  'default'      => '1',
				 
			)
		);
	$this->add_control(
			'show_quickview',
			array(
				'label' => __( 'Show Quick View', 'acuasafe' ),
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
					'{{WRAPPER}} .feature-block-one .inner-box' => 'display: {{VALUE}} !important',
				),
			)
		);	


		$this->add_control(
			'quick_title_color',
			array(
				'label'     => __( 'Quick View Color', 'acuasafe' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .mr_quick_view .button' => 'color: {{VALUE}} !important',
				),
			)
		);


		$this->add_control(
			'quick_title_alingment',
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
					'{{WRAPPER}} .about-section p' => 'text-align: {{VALUE}} !important',
				),
			)
		);	

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'quick_title_typography',
				'label'    => __( 'Quick View Typography', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .mr_quick_view .button',
			)
		);

		$this->add_control(
			'quick_view_padding',
			array(
				'label'     => __( 'Quick View Padding', 'acuasafe' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}}  .mr_quick_view .button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
			$this->add_control(
			'quick_view_margin',
			array(
				'label'     => __( 'Quick View Margin', 'acuasafe' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}}  .mr_quick_view .button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		
		$this->add_control(
			'quick_view_bg_color',
			array(
				'label'     => __( 'Background Color', 'acuasafe' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .mr_quick_view .button' => 'background: {{VALUE}} !important',
				),
			)
		);	
$this->add_control(
			'quick_view_hover_color',
			array(
				'label'     => __( 'Hover Color', 'acuasafe' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .mr_quick_view .button:before' => 'background: {{VALUE}} !important',
				),
			)
		);	
		
	$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'quick_view_border',
				'label' => esc_html__( 'Box Border', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .mr_quick_view .button',
			]
		);	
		
			$this->add_control(
			'quick_view_border_radius',
			array(
				'label'     => __( 'Border Radius', 'ecolab' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}}  .mr_quick_view .button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);	

		$this->end_controls_section();
		
//Hot/Sale Button 888  ============
 // indext  bbb
$this->start_controls_section(
			'hot_button_control',
			array(
				'label' => __( 'Hot Button Settings', 'acuasafe' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
				
			)
		);
		
		$this->add_control(
					'hot_show_button',
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
							'{{WRAPPER}} .mr_hot' => 'display: {{VALUE}} !important',

						),
					)
				);		
		$this->add_control(
					'hot_button_alingment',
					array(
						'label' => esc_html__( 'Alignment', 'acuasafe' ),
						'type' => \Elementor\Controls_Manager::CHOOSE,
						'condition'    => array( 'hot_show_button' => 'show' ),
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
							'{{WRAPPER}} .mr_hot' => 'text-align: {{VALUE}} !important',
						),
					)
				);	

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'hot_button_typography',
				'condition'    => array( 'hot_show_button' => 'show' ),
				'label'    => __( 'Typography', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .mr_hot .hot_text',
			)
		);		
		$this->add_control(
					'hot_button_color',
					array(
						'label'     => __( 'Button Color', 'acuasafe' ),
						'condition'    => array( 'hot_show_button' => 'show' ),
						'type'      => \Elementor\Controls_Manager::COLOR,
						'selectors' => array(
							'{{WRAPPER}} .mr_hot .hot_text' => 'color: {{VALUE}} !important',

						),
					)
				);
		$this->add_control(
					'hot_button_bg_color',
					array(
						'label'     => __( 'Background Color', 'acuasafe' ),
						'condition'    => array( 'hot_show_button' => 'show' ),
						'type'      => \Elementor\Controls_Manager::COLOR,
						'selectors' => array(
							'{{WRAPPER}} .mr_hot .hot_text' => 'background: {{VALUE}} !important',
						),
					)
				);	
			
	$this->add_control(
			'hot_button_padding',
			array(
				'label'     => __( 'Padding', 'acuasafe' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'condition'    => array( 'hot_show_button' => 'show' ),
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}} .mr_hot .hot_text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			) 
		);

	$this->add_control(
			'hot_button_margin',
			array(
				'label'     => __( 'Margin', 'acuasafe' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'condition'    => array( 'hot_show_button' => 'show' ),
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .mr_hot .hot_text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name' => 'hot_border',
				'condition'    => array( 'hot_show_button' => 'show' ),
				'selector' => '{{WRAPPER}} .mr_hot .hot_text',
			)
		);

		$this->add_control(
			'hot_border_radius',
			array(
				'label'     => __( 'Border Radius', 'acuasafe' ),
				'condition'    => array( 'hot_show_button' => 'show' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .mr_hot .hot_text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'hot_shadow',
					'condition'    => array( 'hot_show_button' => 'show' ),
				'label' => esc_html__( 'Box Shadow', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .mr_hot .hot_text',
			]
		);

		
		
	
		
		$this->end_controls_section();
		
//End of hot Button		

//Block   ================================
// indext  ccc
	$this->start_controls_section(
				'block_settings',
				array(
					'label' => __( 'Block Setting', 'acuasafe' ),
					'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
				)
			);

		
	$this->add_control(
			'show_block',
			array(
				'label' => esc_html__( 'Show Block', 'acuasafe' ),
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
					'{{WRAPPER}} .mr_product_block' => 'display: {{VALUE}} !important',
				),
			)
		);	


		

$this->add_control(
			'box_height',
			[
				'label' => esc_html__( 'Min Height', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
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
					'{{WRAPPER}} .mr_product_block' => 'min-height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'block_color',
			array(
				'label'     => __( 'Background Color', 'acuasafe' ),
				'condition'    => array( 'show_block' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .mr_product_block' => 'background: {{VALUE}} !important',
				),
			)
		);
		$this->add_control(
			'block_hover_color',
			array(
				'label'     => __( 'Hover Color', 'acuasafe' ),
			   'condition'    => array( 'show_block' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .mr_product_block:hover' => 'background: {{VALUE}} !important',
				),
			)
		);
	
		$this->add_control(
			'block_margin',
			array(
				'label'     => __( 'Block Margin', 'acuasafe' ),
					'condition'    => array( 'show_block' => 'show' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}}  .mr_product_block' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		$this->add_control(
			'block_padding',
			array(
				'label'     => __( 'Block Padding', 'acuasafe' ),
					'condition'    => array( 'show_block' => 'show' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}}  .mr_product_block' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

			$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'block_shadow',
					'condition'    => array( 'show_block' => 'show' ),
				'label' => esc_html__( 'Box Shadow', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .mr_product_block',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'block_border',
				'condition'    => array( 'show_block' => 'show' ),
				'label' => esc_html__( 'Box Border', 'acuasafe' ),
				'selector' => '{{WRAPPER}} .mr_product_block',
			]
		);
				
			$this->add_control(
			'block_border_radius',
			array(
				'label'     => __( 'Border Radius', 'acuasafe' ),
				'condition'    => array( 'show_block' => 'show' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .mr_product_block' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		
		$this->end_controls_section();
//End of Block 
		
	
	}
	
//============================================End of Query Area ======================================================
	// ddd
	
	protected function render() {
		global $product;
		global $wp_query;
		$settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');		
        $paged = get_query_var('paged');
		$paged = acuasafe_set($_REQUEST, 'paged') ? esc_attr($_REQUEST['paged']) : $paged;
		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-acuasafe' );
	
	//Column Settings Area	 

		   if($settings['columns'] == '6') {
                $columns_markup = 'col-lg-2 col-md-12';
            }
           else if($settings['columns'] == '4') {
                $columns_markup = 'col-lg-3 col-md-12';
            } 
		
		    else if($settings['columns'] == '5') {
                $columns_markup = 'col-lg-5 col-md-12';
            } 

          else if($settings['columns'] == '3') {
                $columns_markup = 'col-lg-4 col-md-12';
            }

          else if($settings['columns'] == '2') {
                $columns_markup = 'col-lg-6 col-md-12';
            } 

          else if($settings['columns'] == '1') {
                $columns_markup = 'col-lg-12 col-md-12';
            }



         if($settings['owl_dot'] == '1') {
                $owl_markup = ' owl-nav-style-one ';
            }
           else if($settings['owl_dot'] == '2') {
                $owl_markup = ' owl-dot-style-one';
            } 
		  else if($settings['owl_dot'] == '3') {
                $owl_markup = 'mr_owl_nonav ';
            } 


        

 if($settings['awl_loop'] == '1') {
                $awl_mr_loop = 'true';
            }
           else if($settings['awl_loop'] == '2') {
                $awl_mr_loop = 'false ';
            } 
    
      
		
     // Call the setting and make variable 

		$product_per_page = $settings['query_number'];
		$product_order_by = $settings['query_orderby'];
		$product_order    = $settings['query_order'];
		$product_grid_type = $settings['product_grid_type'];
		$catagory_name     = $settings['query_category'];
		$tag_name     = $settings['query_tag'];
		
	  // Argument for $args	
		if ( $product_grid_type == 'sale_products' ) {
			$args = array(
				'post_type'      => 'product',
				'posts_per_page' => $product_per_page,
				'meta_query'     => array(
					'relation' => 'OR',
					array(// Simple products type
						'key'     => '_sale_price',
						'value'   => 0,
						'compare' => '>',
						'type'    => 'numeric',
					),
					array(// Variable products type
						'key'     => '_min_variation_sale_price',
						'value'   => 0,
						'compare' => '>',
						'type'    => 'numeric',
					),
				),
				'orderby'        => $product_order_by,
				'order'          => $product_order,
			);
		}
		if ( $product_grid_type == 'best_selling_products' ) {
			$args = array(
				'post_type'      => 'product',
				'meta_key'       => 'total_sales',
				'orderby'        => 'meta_value_num',
				'posts_per_page' => $product_per_page,
				'order'          => $product_order,
			);
		}
		if ( $product_grid_type == 'recent_products' ) {
			$args = array(
				'post_type'      => 'product',
				'posts_per_page' => $product_per_page,
				'orderby'        => $product_order_by,
				'order'          => $product_order,
			);
		}
		if ( $product_grid_type == 'featured_products' ) {
			$args = array(
				'post_type'      => 'product',
				'posts_per_page' => $product_per_page,
				'tax_query'      => array(
					array(
						'taxonomy' => 'product_visibility',
						'field'    => 'name',
						'terms'    => 'featured',
					),
				),
				'orderby'        => $product_order_by,
				'order'          => $product_order,
			);

		}
		if ( $product_grid_type == 'top_rated_products' ) {
			$args = array(
				'posts_per_page' => $product_per_page,
				'no_found_rows'  => 1,
				'post_status'    => 'publish',
				'post_type'      => 'product',
				'meta_key'       => '_wc_average_rating',
				'orderby'        => 'meta_value_num',
				'order'          => $product_order,
				'meta_query'     => WC()->query->get_meta_query(),
				'tax_query'      => WC()->query->get_tax_query(),
			);
		}

		if ( $product_grid_type == 'product_category' ) {
			$args = array(
				'post_type'      => 'product',
				'posts_per_page' => $product_per_page,
				'product_cat'    => $catagory_name,
				'orderby'        => $product_order_by,
				'order'          => $product_order,
			);
		}

		if ( $product_grid_type == 'product_tag' ) {
			$args = array(
				'post_type'      => 'product',
				'posts_per_page' => $product_per_page,
				'product_tag'    => $tag_name,
				'orderby'        => $product_order_by,
				'order'          => $product_order,
			);
		}
		// End of args
		
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
			
//HTML are index eee			
		{ ?>
		


<?php
	  echo '
	 <script>
 jQuery(document).ready(function($) {

//put the js code under this line 
	
	    if ($(".theme_carousel").length) {
            $(".theme_carousel").each(function (index) {
            var $owlAttr = {},
            $extraAttr = $(this).data("options");
            $.extend($owlAttr, $extraAttr);
            $(this).owlCarousel($owlAttr);
        });
    }


//put the code above the line 

  });
</script>';


?>
     <section class="woocommerce mr_shop products-section_hr_001  ">
            <div class="auto-container">
           		
						<!--If  Slider Active  Code -->
							<?php if(esc_attr($settings['show_slider'])) : ?>
				
					

	  

<div class=" mr_shop_slide theme_carousel owl-theme owl-carousel <?php echo $owl_markup;?>" data-options='{"loop": true, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": <?php echo $awl_mr_loop;?>, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "2" }, "768" :{ "items" : "3" } , "992":{ "items" : "4" }, "1200":{ "items" : " <?php echo esc_attr($settings['columns']);?> " }}}'>		
				  
								
						<!-- Slider Area Code -->		
							<?php else : ?>	 
							<div class="row row-5">	 
							<?php endif; ?>

										<!-- While Loope  Area  -->
										<?php while ( $query->have_posts() ) : $query->the_post(); ?>
										 <?php global $post, $product;
										 ?>
                                                
												<!--If  Slider Active  Code -->
												<?php if(esc_attr($settings['show_slider'])) : ?>               
                                                 <div class="col-lg-12 col-md-12" >
												<!-- Slider Area Code -->	 
                                                <?php else: ?>   
                                                 <div class=" <?php echo $columns_markup;?>  <?php if($settings['columns'] == '5') echo 'column'; else echo ''; ?>  col-md-12 " >    
                                                <?php endif; ?>
													 
                                                <div class="mr_product_block product-block_hr_001 ">
                                                        <?php
                                                        /**
                                                         * Hook: woocommerce_before_shop_loop_item.
                                                         */
                                                        do_action( 'woocommerce_before_shop_loop_item' );
                                                        /**
                                                         * Hook: woocommerce_before_shop_loop_item_title.
                                                         */   
														 $post_thumbnail_id = get_post_thumbnail_id($post->ID);
														 $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );  
														 $get_price       = $product->get_price();
														 $regular_price   = $product->get_regular_price();
														 $sale_price      = $product->get_sale_price();
														 $price_html      = $product->get_price_html(); 
		 
														 $review_count = $product->get_review_count();
															if ( $review_count == 0 || $review_count > 1 ) {
																$review_count_var = $review_count . esc_html__( ' Reviews', 'brator' );
															} else {
																$review_count_var = $review_count . esc_html__( ' Review', 'brator' );
															};
		 
														$newness_days = 30; // Number of days the badge is shown
														$created      = strtotime( $product->get_date_created() );

														$stock_quantity = $product->get_stock_quantity();

														$sale_stock_quantity = get_post_meta( $product->get_id(), 'total_sales', true );
		 
                                                         ?> 
													
												<div <?php wc_product_class(); ?>> 	
													
										 <div class="mr_style_one">			
											
													<!-- Hot/Sale   -->		
													<?php
		 												if($settings['show_hot']){ 
															if ( $product->is_on_sale() ) {
																$prices   = mrlab_get_product_prices( $product );
																$returned = mrlab_product_special_price_calc( $prices );
																if ( isset( $returned['percent'] ) && $returned['percent'] ) {
																	?>
																 <div class="mr_hot" style="position:absolute;z-index:999; width:100%"> 
																	 <button class="hot_text"><?php echo sprintf( esc_html__( '%d%% ', 'mrlab' ), $returned['percent'] ); ?>
																	 <?php echo $settings['hot_text'];?> </button>
																</div>
																 <?php
																}
															} 
													} ?>	
													<!-- Hot/Sale   -->		
													
                                                    <!-- Product Thumbnail   -->
													<?php if($settings['show_thumbnail']){ ?>
													<div class="mr_product_thumb image">
														<?php the_post_thumbnail(); ?>       
													</div>
													<?php } ?>   
 													<!-- Product Thumbnail   -->
											
													

                                                   <div class="product_bottom mr_bottom"> 
                                                      
													  <!-- Product Title   -->     
														<?php if($settings['show_title']){ ?>   
                                                         <div class="mr_product_title"><?php do_action('woocommerce_shop_loop_item_title'); ?></div>
                                                        <?php } ?>
													 <!-- Product Title   -->     
													 <!-- Product Rating   --> 		 																  
															 <div class="mr_rating">
															<?php if($settings['show_rating']){ ?>					  
																  <div class="mr_rating_number"> <?php echo mr_product_rating(); ?> </div>  
															<?php } ?> 			  
															<?php if($settings['show_avarage_rating']){ ?>	
															<?php if ( $product->get_average_rating() ) : ?>	 
																 <p class="mr_review_number"><?php echo esc_html( $review_count_var ); ?></p>
															<?php endif; ?>
															<?php } ?> 		  
															</div>								   
													 <!-- Product Rating   -->    
													 <!-- Product Price   --> 
													   <?php if($settings['show_price']){ ?>                             
													   <div class="mr_shop_price price fs_15 fw_medium">               
														   <?php echo $price_html; ?>
													   </div> 
													   <?php } ?> 
													 <!-- Product Price --> 
													   
												<!-- Product Progress  -->
													   
											 <?php if($settings['show_progress']){ ?>  		   
													<?php
													if ( $stock_quantity ) :
														$sale_percentage = ( $sale_stock_quantity / $stock_quantity ) * 100;
														if ( $sale_percentage <  $settings['level_one'] ) {
															$bar_class = 'border-green';
														} elseif ( $sale_percentage >= $settings['level_two'] ) {
															$bar_class = 'border-red';
														} elseif ( $sale_percentage >= $settings['level_one'] ) {
															$bar_class = 'border-yellow';
														}
														?>
													<div class="mr_product_progress">
													<div class="product-single-item-bar"><span class="<?php echo esc_attr( $bar_class ); ?>" style="width: <?php echo esc_attr( $sale_percentage ); ?>%"></span></div>
													<div class="product-single-item-sold">
														<p><?php echo $settings['sold_text'];?><span><?php echo esc_html( $sale_stock_quantity ); ?>/<?php echo esc_html( $stock_quantity ); ?></span></p>
													</div>
													</div>
													<?php endif; ?>
													   
												   <?php } ?> 	   
													<!-- Product Progress  -->	   
 

 													 <!-- Product Quick View -->
 													 <?php if(function_exists('yith_wcqv_init')) : ?>  
													   <?php if($settings['show_quickview']){ ?>
													   <div class="quick_area">      
														   <div class="mr_quick_view" ><?php echo do_shortcode( $settings['quickview'] );?></div>
													   </div>
													   <?php } ?> 
													   <?php endif; ?>
													 <!-- Product Quick View -->   


												<!-- ========= Meta Info Area=============  -->  
                                                     <div class="overlay">
     													 <div class="meta-style-one">
                                                        <ul class="product-buttons mr_pro_list ">  
														
														
														<!-- Product Wish List -->
														<?php if(function_exists('yith_wishlist_constructor')) : ?>  
                                                           <?php if($settings['show_whishlist']){ ?>
															<li class="single_metas ">
																<span class="tool_tip"><?php echo $settings['wishlist_tooltip'];?></span>
																<?php echo do_shortcode( $settings['whish_list'] );?>
															</li>
                                                        	<?php } ?> 
                                                        <?php endif; ?>		
														<!-- Product Wish List -->

														
														<!-- Product Compare Button -->	
														<?php if(function_exists('yith_woocompare_constructor')) : ?>  
															<?php if($settings['show_compare']){ ?>       
															<li class="single_metas ">
															<a class="compare" data-product_id="<?php echo get_the_ID(); ?>" href="<?php echo site_url(); ?>/?action=yith-woocompare-add-product&amp; id=<?php echo get_the_ID(); ?>">
																<span class="tool_tip"><?php echo $settings['compare_tooltip'];?></span></a>
															</li>
															<?php } ?> 
														<?php endif; ?>	


														<!-- Product Compare Button -->
															
														<!-- Product Add to Cart -->	
															<?php if($settings['show_addtocart']){ ?>                
															<li class="single_metas mr_addtocart">
																<a href="<?php echo site_url(); ?>/?add-to-cart=<?php echo get_the_ID(); ?>" data-quantity="1" class="product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo get_the_ID(); ?>">
																<span class="tool_tip"><?php echo $settings['addtocart_tooltip'];?></span><i class="fa fa-shopping-cart"></i></a>
															 </li>
															<?php } ?> 
													   <!-- Product Add to Cart -->		
															
                                                        </ul>
                                                   </div>
                                                  </div>
												<!-- Meta Info Area End --> 
												</div>   
												</div>
										</div>	<!-- End Of Style One --> 		
											</div>
									   </div>
								  <?php endwhile; ?>  

            </div>
        </div>
    </section>
				
                
        <?php }
		wp_reset_postdata();
	}

}
