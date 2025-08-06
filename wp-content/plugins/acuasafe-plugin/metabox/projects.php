<?php
return array(
	'title'      => 'Acuasafe Project Setting',
	'id'         => 'acuasafe_meta_projects',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'acuasafe_project' ),
	'sections'   => array(
		array(
			'id'     => 'acuasafe_projects_meta_setting',
			'fields' => array(
				array(
					'id'    => 'meta_subtitle',
					'type'  => 'text',
					'title' => esc_html__( 'Subtitle', 'acuasafe' ),
				),
				array(
					'id'    => 'page_link',
					'type'  => 'text',
					'title' => esc_html__( 'Page Link', 'acuasafe' ),
				),
				array(
					'id'    => 'image_link',
					'type'  => 'text',
					'title' => esc_html__( 'Image Link', 'acuasafe' ),
				),
				array(
					'id'    => 'meta_number',
					'type'  => 'text',
					'title' => esc_html__( 'Column Number', 'acuasafe' ),
					'default' => esc_html__( '1', 'acuasafe' ),
				),
			),
		),
	),
);