<?php
/**
 * Theme functions and definitions.
 */
function acuasafe_child_enqueue_styles() {

    if ( SCRIPT_DEBUG ) {
        wp_enqueue_style( 'acuasafe-style' , get_template_directory_uri() . '/style.css' );
    } else {
        wp_enqueue_style( 'acuasafe-minified-style' , get_template_directory_uri() . '/style.min.css' );
    }

    wp_enqueue_style( 'acuasafe-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'acuasafe-style' ),
        wp_get_theme()->get('Version')
    );
}

add_action(  'wp_enqueue_scripts', 'acuasafe_child_enqueue_styles' );

// Remove Acuasafe default footer function
remove_action( 'wp_footer', 'acuasafe_footer_function', 10 ); // Adjust hook name & priority if needed
