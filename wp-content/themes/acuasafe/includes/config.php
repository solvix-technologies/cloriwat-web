<?php
/**
 * Theme config file.
 *
 * @package ACUASAFE
 * @author  ThemeKalia
 * @version 1.0
 * changed
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}

$config = array();

$config['default']['acuasafe_main_header'][] 	= array( 'acuasafe_preloader', 98 );
$config['default']['acuasafe_main_header'][] 	= array( 'acuasafe_main_header_area', 99 );

$config['default']['acuasafe_main_footer'][] 	= array( 'acuasafe_preloader', 98 );
$config['default']['acuasafe_main_footer'][] 	= array( 'acuasafe_main_footer_area', 99 );

$config['default']['acuasafe_sidebar'][] 	    = array( 'acuasafe_sidebar', 99 );

$config['default']['acuasafe_banner'][] 	    = array( 'acuasafe_banner', 99 );


return $config;
