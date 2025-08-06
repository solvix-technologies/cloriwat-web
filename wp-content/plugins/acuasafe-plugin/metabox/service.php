<?php
return array(
	'title'      => 'Acuasafe Service Setting',
	'id'         => 'acuasafe_meta_service',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'acuasafe_service' ),
	'sections'   => array(
		array(
			'id'     => 'acuasafe_service_meta_setting',
			'fields' => array(
				array(
					'id'       => 'service_icon',
					'type'     => 'select',
					'title'    => esc_html__( 'Service Icons', 'acuasafe' ),
					'options'  => get_fontawesome_icons(),
				),
				array(
					'id'    => 'ext_url',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Read More Link', 'acuasafe' ),
				),
			),
		),
	),
);