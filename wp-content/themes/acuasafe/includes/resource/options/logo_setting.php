<?php
return array(
	'title'      => esc_html__( 'Logo Setting', 'acuasafe' ),
	'id'         => 'logo_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'       => 'image_favicon',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Favicon', 'acuasafe' ),
			'subtitle' => esc_html__( 'Insert site favicon image', 'acuasafe' ),
			'default'  => array( 'url' => get_template_directory_uri() . '/assets/images/favicon.ico' ),
		),
	
		array(
			'id'       => 'image_normal_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Logo One', 'acuasafe' ),
			'subtitle' => esc_html__( 'Insert site Dark logo image', 'acuasafe' ),
	
		),
		array(
			'id'       => 'normal_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( ' Logo Dimentions', 'acuasafe' ),
			'subtitle' => esc_html__( 'Select Dark Logo Dimentions', 'acuasafe' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show', '=', true ),
		),

		array(
			'id'       => 'image_normal_logo2',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Logo Two', 'acuasafe' ),
			'subtitle' => esc_html__( 'Insert site Light logo image', 'acuasafe' ),
		),
		array(
			'id'       => 'normal_logo_dimension2',
			'type'     => 'dimensions',
			'title'    => esc_html__( ' Logo Dimentions', 'acuasafe' ),
			'subtitle' => esc_html__( 'Select Light Dimentions', 'acuasafe' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show2', '=', true ),
		),
		
		array(
			'id'       => 'image_normal_logo3',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Logo Three', 'acuasafe' ),
			'subtitle' => esc_html__( 'Insert site Mobile logo image', 'acuasafe' ),
		),
		array(
			'id'       => 'normal_logo_dimension3',
			'type'     => 'dimensions',
			'title'    => esc_html__( ' Logo Dimentions', 'acuasafe' ),
			'subtitle' => esc_html__( 'Select Mobile Logo Dimentions', 'acuasafe' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show3', '=', true ),
		),
		array(
			'id'       => 'logo_settings_section_end',
			'type'     => 'section',
			'indent'      => false,
		),
	),
);
