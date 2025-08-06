<?php

return array(
	'title'      => esc_html__( 'Shop Page Settings', 'acuasafe' ),
	'id'         => 'shop_setting',
	'desc'       => '',
	'icon'       => ' fa fa-shopping-cart',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'shop_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'shop Source Type', 'acuasafe' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'acuasafe' ),
				'e' => esc_html__( 'Elementor', 'acuasafe' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'shop_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'acuasafe' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'=> -1,
			],
			'required' => [ 'shop_source_type', '=', 'e' ],
		),

		array(
			'id'       => 'shop_default_st',
			'type'     => 'section',
			'title'    => esc_html__( 'shop Default', 'acuasafe' ),
			'indent'   => true,
			'required' => [ 'shop_source_type', '=', 'd' ],
		),
		array(
			'id'      => 'shop_page_banner',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Banner', 'acuasafe' ),
			'desc'    => esc_html__( 'Enable to show banner on blog', 'acuasafe' ),
			'default' => true,
		),
		array(
			'id'       => 'shop_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Title', 'acuasafe' ),
			'desc'     => esc_html__( 'Enter the title to show in banner section', 'acuasafe' ),
			'required' => array( 'shop_page_banner', '=', true ),
		),
	
		array(
			'id'       => 'shop_page_background',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'acuasafe' ),
			'desc'     => esc_html__( 'Insert background image for banner', 'acuasafe' ),
			'default'  => array(
				'url' => ACUASAFE_URI . 'assets/images/pagetitle.jpg',
			),
			'required' => array( 'shop_page_banner', '=', true ),
		),

		array(
			'id'       => 'shop_sidebar_layout',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Layout', 'acuasafe' ),
			'subtitle' => esc_html__( 'Select main content and sidebar alignment.', 'acuasafe' ),
			'options'  => array(

				'left'  => array(
					'alt' => esc_html__( '2 Column Left', 'acuasafe' ),
					'img' => get_template_directory_uri() . '/assets/images/redux/2cl.png',
				),
				'full'  => array(
					'alt' => esc_html__( '1 Column', 'acuasafe' ),
					'img' => get_template_directory_uri() . '/assets/images/redux/1col.png',
				),
				'right' => array(
					'alt' => esc_html__( '2 Column Right', 'acuasafe' ),
					'img' => get_template_directory_uri() . '/assets/images/redux/2cr.png',
				),
			),

			'default' => 'right',
		),

		array(
			'id'       => 'shop_page_sidebar',
			'type'     => 'select',
			'title'    => esc_html__( 'Sidebar', 'acuasafe' ),
			'desc'     => esc_html__( 'Select sidebar to show at blog listing page', 'acuasafe' ),
			'required' => array(
				array( 'shop_sidebar_layout', '=', array( 'left', 'right' ) ),
			),
			'options'  => acuasafe_get_sidebars(),
		),
	

		  array (
        'id'       => 'shop_column',
        'type'     => 'select',
        'title'    => __('Shop Column', 'acuasafe'), 
        'desc'     => __('This is Shop Column', 'acuasafe'),
         // Must provide key => value pairs for select options
        'options'  => array(
            '6' => 'Two Column',
            '4' => 'Three Column',
            '3' => 'Four Column',
			'2' => 'Six Column',
            ),
        'default'  => '2',
    ),
	  array (
        'id'       => 'shop_product',
        'type'     => 'text',
        'title'    => __('Number of Products', 'acuasafe'), 
        'desc'     => __('This is Number of Products', 'acuasafe'),
        'default'  => '8',
    ),

		array(
			'id'       => 'shop_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'shop_source_type', '=', 'd' ],
		),
	),
);





