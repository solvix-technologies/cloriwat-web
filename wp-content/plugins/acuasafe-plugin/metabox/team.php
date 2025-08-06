<?php
return array(
	'title'      => 'Acuasafe Team Setting',
	'id'         => 'acuasafe_meta_team',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'acuasafe_team' ),
	'sections'   => array(
		array(
			'id'     => 'acuasafe_team_meta_setting',
			'fields' => array(
				array(
					'id'    => 'designation',
					'type'  => 'text',
					'title' => esc_html__( 'Designation', 'acuasafe' ),
				),
				array(
					'id'    => 'team_link',
					'type'  => 'text',
					'title' => esc_html__( 'Read More Link', 'acuasafe' ),
				),
				array(
					'id'    => 'social_profile',
					'type'  => 'social_media',
					'title' => esc_html__( 'Social Profiles', 'acuasafe' ),
				),
			),
		),
	),
);