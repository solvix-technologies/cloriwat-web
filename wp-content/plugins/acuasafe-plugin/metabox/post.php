<?php
return array(
	'title' => 'acuasafe Post Setting',
	'id' => 'acuasafe_meta_post',
	'icon' => 'el el-cogs',
	'position' => 'normal',
	'priority' => 'core',
	'post_types' => array( 'post' ),
	'sections' => array(
		array(
			'id' => 'acuasafe_post_meta_setting',
			'fields' => array(
				array(
					'id' => 'meta_image',
					'type' => 'media',
					'title' => esc_html__( 'Meta image', 'indext' ),
				),
				

			),
		),
	),
);