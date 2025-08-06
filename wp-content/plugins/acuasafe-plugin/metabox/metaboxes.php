<?php
if ( ! function_exists( "acuasafe_add_metaboxes" ) ) {
	function acuasafe_add_metaboxes( $metaboxes ) {
		$directories_array = array(
			'page.php',
			'projects.php',
			'service.php',
			'team.php',
			'testimonials.php',
			'event.php',
			'post.php',
		);
		foreach ( $directories_array as $dir ) {
			$metaboxes[] = require_once( ACUASAFEPLUGIN_PLUGIN_PATH . '/metabox/' . $dir );
		}

		return $metaboxes;
	}

	add_action( "redux/metaboxes/acuasafe_options/boxes", "acuasafe_add_metaboxes" );
}

