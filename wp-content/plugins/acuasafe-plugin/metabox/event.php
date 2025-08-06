<?php
return array(
	'title'      => 'Acuasafe Evant Setting',
	'id'         => 'acuasafe_meta_event',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'tribe_events' ),
	'sections'   => array(
		array(
			'id'     => 'acuasafe_event_meta_setting',
			'fields' => array(
				array(
					'id'    => 'video',
					'type'  => 'text',
					'title' => esc_html__( 'Video Link', 'acuasafe' ),
				),
				
			),
		),
	),
);