<?php

define( 'ACUASAFE_ROOT', get_template_directory() . '/' );

require_once get_template_directory() . '/includes/functions/functions.php';
include_once get_template_directory() . '/includes/classes/base.php';
include_once get_template_directory() . '/includes/classes/dotnotation.php';
include_once get_template_directory() . '/includes/classes/header-enqueue.php';
include_once get_template_directory() . '/includes/classes/options.php';
include_once get_template_directory() . '/includes/classes/ajax.php';
include_once get_template_directory() . '/includes/classes/common.php';
include_once get_template_directory() . '/includes/classes/bootstrap_walker.php';
include_once get_template_directory() . '/includes/library/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/includes/library/hook.php';

// Merlin demo import.
require_once get_template_directory() . '/demo-import/class-merlin.php';
require_once get_template_directory() . '/demo-import/merlin-config.php';
require_once get_template_directory() . '/demo-import/merlin-filters.php';

add_action( 'after_setup_theme', 'acuasafe_wp_load', 5 );

function acuasafe_wp_load() {

	defined( 'ACUASAFE_URL' ) or define( 'ACUASAFE_URL', get_template_directory_uri() . '/' );
	define(  'ACUASAFE_KEY','!@#acuasafe');
	define(  'ACUASAFE_URI', get_template_directory_uri() . '/');

	if ( ! defined( 'ACUASAFE_NONCE' ) ) {
		define( 'ACUASAFE_NONCE', 'acuasafe_wp_theme' );
	}

	( new \ACUASAFE\Includes\Classes\Base )->loadDefaults();
	( new \ACUASAFE\Includes\Classes\Ajax )->actions();

}
add_action( 'init', 'acuasafe_bunch_theme_init');
function acuasafe_bunch_theme_init()
{
	$bunch_exlude_hooks = include_once get_template_directory(). '/includes/resource/remove_action.php';
	

}
