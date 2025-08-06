<?php

return  array(
    'title'      => esc_html__( 'Search Page Settings', 'acuasafe' ),
    'id'         => 'search_setting',
    'desc'       => '', 
    'subsection' => true,
    'fields'     => array(
	    array(
		    'id'      => 'search_source_type',
		    'type'    => 'button_set',
		    'title'   => esc_html__( 'Search Source Type', 'acuasafe' ),
		    'options' => array(
			    'd' => esc_html__( 'Default', 'acuasafe' ),
			    'e' => esc_html__( 'Elementor', 'acuasafe' ),
		    ),
		    'default' => 'd',
	    ),
	    array(
		    'id'       => 'search_elementor_template',
		    'type'     => 'select',
		    'title'    => __( 'Template', 'acuasafe' ),
		    'data'     => 'posts',
		    'args'     => [
			    'post_type' => [ 'elementor_library' ],
				'posts_per_page'=> -1,
		    ],
		    'required' => [ 'search_source_type', '=', 'e' ],
	    ),

	    array(
		    'id'       => 'search_default_st',
		    'type'     => 'section',
		    'title'    => esc_html__( 'Search Default', 'acuasafe' ),
		    'indent'   => true,
		    'required' => [ 'search_source_type', '=', 'd' ],
	    ),
	    array(
		    'id'      => 'search_page_banner',
		    'type'    => 'switch',
		    'title'   => esc_html__( 'Show Banner', 'acuasafe' ),
		    'desc'    => esc_html__( 'Enable to show banner on blog', 'acuasafe' ),
		    'default' => true,
	    ),
	    array(
		    'id'       => 'search_banner_title',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Banner Section Title', 'acuasafe' ),
		    'desc'     => esc_html__( 'Enter the title to show in banner section', 'acuasafe' ),
		    'required' => array( 'search_page_banner', '=', true ),
	    ),
	    array(
		    'id'       => 'search_page_background',
		    'type'     => 'media',
		    'url'      => true,
		    'title'    => esc_html__( 'Background Image', 'acuasafe' ),
		    'desc'     => esc_html__( 'Insert background image for banner', 'acuasafe' ),
		    'default'  => '',
		    'required' => array( 'search_page_banner', '=', true ),
	    ),

	    array(
		    'id'       => 'search_sidebar_layout',
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
		    'id'       => 'search_page_sidebar',
		    'type'     => 'select',
		    'title'    => esc_html__( 'Sidebar', 'acuasafe' ),
		    'desc'     => esc_html__( 'Select sidebar to show at blog listing page', 'acuasafe' ),
		    'required' => array(
			    array( 'search_sidebar_layout', '=', array( 'left', 'right' ) ),
		    ),
		    'options'  => acuasafe_get_sidebars(),
	    ),
	   //
		array(
			'id'    => 'search_page_title',
			'type'  => 'text',
			'title' => esc_html__( 'Search Title', 'acuasafe' ),
			'desc'  => esc_html__( 'Enter Search section title that you want to show', 'acuasafe' ),

		),
		array(
			'id'    => 'search_page_text',
			'type'  => 'textarea',
			'title' => esc_html__( 'Search Page Description', 'acuasafe' ),
			'desc'  => esc_html__( 'Enter Search page description that you want to show.', 'acuasafe' ),

		),
	

		
	    array(
		    'id'       => 'search_default_ed',
		    'type'     => 'section',
		    'indent'   => false,
		    'required' => [ 'search_source_type', '=', 'd' ],
	    ),

    ),
);





