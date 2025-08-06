<?php


require_once ACUASAFEPLUGIN_PLUGIN_PATH . '/mr_shop/mr_search_functions.php';
require_once ACUASAFEPLUGIN_PLUGIN_PATH . '/mr_shop/mr_shop_functions.php';

function acuasafe_search_scripts() {

//Script	
	
	    wp_enqueue_script( 'owl', plugins_url( 'owl.js', __FILE__ ), array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'product_search', plugins_url( 'product_search.js', __FILE__ ), array( 'jquery' ), '1.0', true );
	
//Style 
		wp_enqueue_style( 'product_search', plugins_url( 'product_search.css', __FILE__ ));
		wp_enqueue_style( 'product_meta', plugins_url( 'product_meta.css', __FILE__ ));
	    wp_enqueue_style( 'owl', plugins_url( 'owl.css', __FILE__ ));

		}

add_action( 'wp_enqueue_scripts', 'acuasafe_search_scripts' );

