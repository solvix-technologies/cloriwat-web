<?php

namespace ACUASAFEPLUGIN\Element;


class Elementor {
	static $widgets = array(
		'h1_slider',
		'h1_feature',
		'h1_about_left',
		'h1_about_right',
		'h1_service',
		'h1_chooseus',
		'h1_shop',
		'h1_testimonial',
		'h1_team',
		'h1_cta',
		'h1_blog',
		'footer_top',
		'footer_widget1',
		'footer_widget2',
		'footer_widget3',
		'footer_widget4',
		'footer_bottom',
		'h2_slider',
		'h2_about',
		'h2_cta',
		'h2_testimonial',
		'h2_contact',
		'h3_feature',
		'h3_about_left',
		'h3_about_right',
		'h3_shop',
		'h3_pricing',
		'h3_testimonial',
		'h3_video',
		'feq_left',
		'feq_right',
		'portfolios',
		'portfolios2',
		'service',
		'service_details1',
		'service_details2',
		'service_details3',
		'wi_menu',
		'blog_grid',
		'contact',
        'testimonial',
        'testimonial2',
        'team_details_left',
		'team_details_right',
		'team_details_text',
        'team_details3',
        'h4_slider',
		'h4_feature',
		'h4_about_shape',
		'h4_about_left',
		'h4_about_right',
		'h4_service',
		'h4_works',
		'h4_shop',
		'h4_chooseus',
		'h4_video',
		'h4_testimonial',
		'h4_cta_left',
		'h4_cta_right',
		'h4_title',
		'h4_contact_left',
		'h4_contact_right',
        'team',
        'productsearch',
        'mr_products_one'
	);

	static function init() {
		add_action( 'elementor/init', array( __CLASS__, 'loader' ) );
		add_action( 'elementor/elements/categories_registered', array( __CLASS__, 'register_cats' ) );
	}

	static function loader() {

		foreach ( self::$widgets as $widget ) {

			$file = ACUASAFEPLUGIN_PLUGIN_PATH . '/elementor/' . $widget . '.php';
			if ( file_exists( $file ) ) {
				require_once $file;
			}

			add_action( 'elementor/widgets/widgets_registered', array( __CLASS__, 'register' ) );
		}
	}

	static function register( $elemntor ) {
		foreach ( self::$widgets as $widget ) {
			$class = '\\ACUASAFEPLUGIN\\Element\\' . ucwords( $widget );

			if ( class_exists( $class ) ) {
				$elemntor->register_widget_type( new $class );
			}
		}
	}

	static function register_cats( $elements_manager ) {

		$elements_manager->add_category(
			'acuasafe',
			[
				'title' => esc_html__( 'Acuasafe', 'acuasafe' ),
				'icon'  => 'fa fa-plug',
			]
		);
		$elements_manager->add_category(
			'templatepath',
			[
				'title' => esc_html__( 'Template Path', 'acuasafe' ),
				'icon'  => 'fa fa-plug',
			]
		);

	}
}

Elementor::init();