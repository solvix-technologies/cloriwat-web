<?php

require_once get_template_directory() . '/includes/loader.php';

add_action( 'after_setup_theme', 'acuasafe_setup_theme' );
add_action( 'after_setup_theme', 'acuasafe_load_default_hooks' );


function acuasafe_setup_theme() {

	load_theme_textdomain( 'acuasafe', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	add_theme_support('woocommerce');
	//add_theme_support('wc-product-gallery-lightbox');
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );


	// Set the default content width.
	$GLOBALS['content_width'] = 525;
	
	/*---------- Register image sizes ----------*/
	
	//Register image sizes
	add_image_size( 'acuasafe_370x310', 370, 310, true ); //'acuasafe_370x310 Our Services'
	add_image_size( 'acuasafe_70x70', 70, 70, true ); //'acuasafe_70x70 Our Testimonials'
	add_image_size( 'acuasafe_370x290', 370, 290, true ); //'acuasafe_370x290 Latest News'
	add_image_size( 'acuasafe_440x305', 440, 305, true ); //'acuasafe_440x305 Our Team'
	add_image_size( 'acuasafe_310x305', 310, 305, true ); //'acuasafe_310x305 Our Team V2'
	add_image_size( 'acuasafe_1170x440', 1170, 440, true ); //'acuasafe_1170x440 Our Blog'
	/*---------- Register image sizes ends ----------*/
	
	
	
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main_menu' => esc_html__( 'Main Menu', 'acuasafe' ),
		'onepage_menu' => esc_html__( 'OnePage Menu', 'acuasafe' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'      => 250,
		'height'     => 250,
		'flex-width' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style();
	add_action( 'admin_init', 'acuasafe_admin_init', 2000000 );
}

/**
 * [acuasafe_admin_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */


function acuasafe_admin_init() {
	remove_action( 'admin_notices', array( 'ReduxFramework', '_admin_notices' ), 99 );
}

/*---------- Sidebar settings ----------*/

/**
 * [acuasafe_widgets_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
function acuasafe_widgets_init() {

	global $wp_registered_sidebars;

	$theme_options = get_theme_mod( 'acuasafe' . '_options-mods' );

	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'acuasafe' ),
		'id'            => 'default-sidebar',
		'description'   => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'acuasafe' ),
		'before_widget' => '<div id="%1$s" class="mrwidget widget sidebar-widget single-sidebar %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	) );
	register_sidebar(array(
		'name' => esc_html__('Footer Widget', 'acuasafe'),
		'id' => 'footer-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'acuasafe'),
		'before_widget'=>'<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget single-footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	));
	if ( class_exists( '\Elementor\Plugin' )){
	register_sidebar(array(
		'name' => esc_html__('RTL Footer Widget', 'acuasafe'),
		'id' => 'footer-sidebar-2',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'acuasafe'),
		'before_widget'=>'<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget single-footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	));
	register_sidebar(array(
		'name' => esc_html__('Services Widget', 'acuasafe'),
		'id' => 'service-sidebar',
		'description'   => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'acuasafe' ),
		'before_widget' => '<div id="%1$s" class="mrwidget widget sidebar-widget single-sidebar %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	));
	}
	register_sidebar(array(
	  'name' => esc_html__( 'Blog Listing', 'acuasafe' ),
	  'id' => 'blog-sidebar',
		'description'   => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'acuasafe' ),
		'before_widget' => '<div id="%1$s" class="mrwidget widget sidebar-widget single-sidebar %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
	));
	if ( ! is_object( acuasafe_WSH() ) ) {
		return;
	}

	$sidebars = acuasafe_set( $theme_options, 'custom_sidebar_name' );

	foreach ( array_filter( (array) $sidebars ) as $sidebar ) {

		if ( acuasafe_set( $sidebar, 'topcopy' ) ) {
			continue;
		}

		$name = $sidebar;
		if ( ! $name ) {
			continue;
		}
		$slug = str_replace( ' ', '_', $name );

		register_sidebar( array(
			'name'          => $name,
			'id'            => sanitize_title( $slug ),
			'before_widget' => '<div id="%1$s" class="%2$s widget single-sidebar">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h3>',
			'after_title'   => '</h3></div>',
		) );
	}

	update_option( 'wp_registered_sidebars', $wp_registered_sidebars );
}

add_action( 'widgets_init', 'acuasafe_widgets_init' );

/*---------- Sidebar settings ends ----------*/

/*---------- Gutenberg settings ----------*/

function acuasafe_gutenberg_editor_palette_styles() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'strong yellow', 'acuasafe' ),
            'slug' => 'strong-yellow',
            'color' => '#f7bd00',
        ),
        array(
            'name' => esc_html__( 'strong white', 'acuasafe' ),
            'slug' => 'strong-white',
            'color' => '#fff',
        ),
		array(
            'name' => esc_html__( 'light black', 'acuasafe' ),
            'slug' => 'light-black',
            'color' => '#242424',
        ),
        array(
            'name' => esc_html__( 'very light gray', 'acuasafe' ),
            'slug' => 'very-light-gray',
            'color' => '#797979',
        ),
        array(
            'name' => esc_html__( 'very dark black', 'acuasafe' ),
            'slug' => 'very-dark-black',
            'color' => '#000000',
        ),
    ) );
	
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => esc_html__( 'Small', 'acuasafe' ),
			'size' => 10,
			'slug' => 'small'
		),
		array(
			'name' => esc_html__( 'Normal', 'acuasafe' ),
			'size' => 15,
			'slug' => 'normal'
		),
		array(
			'name' => esc_html__( 'Large', 'acuasafe' ),
			'size' => 24,
			'slug' => 'large'
		),
		array(
			'name' => esc_html__( 'Huge', 'acuasafe' ),
			'size' => 36,
			'slug' => 'huge'
		)
	) );
	
}
add_action( 'after_setup_theme', 'acuasafe_gutenberg_editor_palette_styles' );

/*---------- Gutenberg settings ends ----------*/

/*---------- Enqueue Styles and Scripts ----------*/

function acuasafe_enqueue_scripts() {
	
    //styles
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css' );
	wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/assets/css/flaticon.css' );
	wp_enqueue_style( 'font-awesome-all', get_template_directory_uri() . '/assets/css/font-awesome-all.css' );
	wp_enqueue_style( 'bootstrap-touchspin', get_template_directory_uri() . '/assets/css/jquery.bootstrap-touchspin.css' );
	wp_enqueue_style( 'fancybox-min', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css' );
	wp_enqueue_style( 'jquery-ui', get_template_directory_uri() . '/assets/css/jquery-ui.css' );
	//wp_enqueue_style( 'nice-select', get_template_directory_uri() . '/assets/css/nice-select.css' );
	wp_enqueue_style( 'owl', get_template_directory_uri() . '/assets/css/owl.css' );
	wp_enqueue_style( 'woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css' );	
	//Temp
	wp_enqueue_style( 'acuasafe-color-panel', get_template_directory_uri() . '/assets/temp/color-panel.css' );	
	wp_enqueue_style( 'acuasafe-color', get_template_directory_uri() . '/assets/css/color.css' );
	wp_enqueue_style( 'acuasafe-rtl', get_template_directory_uri() . '/assets/css/rtl.css' );
	wp_enqueue_style( 'acuasafe-sidebar', get_template_directory_uri() . '/assets/css/theme/sidebar.css' );
	wp_enqueue_style( 'acuasafe-error', get_template_directory_uri() . '/assets/css/theme/error.css' );
	wp_enqueue_style( 'acuasafe-gutenberg', get_template_directory_uri() . '/assets/css/theme/gutenberg.css' );
	wp_enqueue_style( 'acuasafe-tut', get_template_directory_uri() . '/assets/css/theme/tut.css' );
	wp_enqueue_style( 'acuasafe-main', get_stylesheet_uri() );
	wp_enqueue_style( 'acuasafe-style', get_template_directory_uri() . '/assets/css/style.css' );
	wp_enqueue_style( 'acuasafe-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );
	wp_enqueue_style( 'acuasafe-fixing', get_template_directory_uri() . '/assets/css/theme/fixing.css' );
	wp_enqueue_style( 'style-2', get_template_directory_uri() . '/assets/css/style-2.css' );
    //scripts
	wp_enqueue_script( 'jquery-ui-core');
	wp_enqueue_script( 'appear', get_template_directory_uri().'/assets/js/appear.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'popper-min', get_template_directory_uri().'/assets/js/popper.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'bootstrap-min', get_template_directory_uri().'/assets/js/bootstrap.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri().'/assets/js/isotope.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'bootstrap-touchspin', get_template_directory_uri().'/assets/js/jquery.bootstrap-touchspin.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-fancybox', get_template_directory_uri().'/assets/js/jquery.fancybox.js', array( 'jquery' ), '2.1.2', true );
	//wp_enqueue_script( 'nice-select-min', get_template_directory_uri().'/assets/js/jquery.nice-select.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-ui', get_template_directory_uri().'/assets/js/jquery-ui.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'owl', get_template_directory_uri().'/assets/js/owl.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'pagenav', get_template_directory_uri().'/assets/js/pagenav.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'scrollbar', get_template_directory_uri().'/assets/js/scrollbar.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'wow', get_template_directory_uri().'/assets/js/wow.js', array( 'jquery' ), '2.1.2', true );

	
	
	//Temp
	wp_enqueue_script( 'jquery-cookie', get_template_directory_uri().'/assets/temp/jquery.cookie.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'themepanel', get_template_directory_uri().'/assets/temp/themepanel.js', array( 'jquery' ), '2.1.2', true );
	
	wp_enqueue_script( 'acuasafe-main-script', get_template_directory_uri().'/assets/js/script.js', array(), false, true );
	if( is_singular() ) wp_enqueue_script('comment-reply');
	
}
add_action( 'wp_enqueue_scripts', 'acuasafe_enqueue_scripts' );

/*---------- Enqueue styles and scripts ends ----------*/

/*---------- Google fonts ----------*/

function acuasafe_fonts_url() {
	
	$fonts_url = '';

		
		$font_families['Spartan']   = 'Spartan:300,300i,400,400i,500,500i,700,700i,900,900i';
		
		$font_families['Open Sans']      = 'Open+Sans:300,300i,400,400i,500,500i,700,700i,900,900i';

		$font_families = apply_filters( 'REXAR/includes/classes/header_enqueue/font_families', $font_families );

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$protocol  = is_ssl() ? 'https' : 'http';
		$fonts_url = add_query_arg( $query_args, $protocol . '://fonts.googleapis.com/css' );

		return esc_url_raw($fonts_url);

}

function acuasafe_theme_styles() {
    wp_enqueue_style( 'acuasafe-theme-fonts', acuasafe_fonts_url(), array(), null );
}

add_action( 'wp_enqueue_scripts', 'acuasafe_theme_styles' );
add_action( 'admin_enqueue_scripts', 'acuasafe_theme_styles' );

/*---------- Google fonts ends ----------*/

/*---------- More functions ----------*/

// 1) acuasafe_set function

/**
 * [acuasafe_set description]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
if ( ! function_exists( 'acuasafe_set' ) ) {
	function acuasafe_set( $var, $key, $def = '' ) {
		//if( ! $var ) return false;

		if ( is_object( $var ) && isset( $var->$key ) ) {
			return $var->$key;
		} elseif ( is_array( $var ) && isset( $var[ $key ] ) ) {
			return $var[ $key ];
		} elseif ( $def ) {
			return $def;
		} else {
			return false;
		}
	}
}

// 2) acuasafe_add_editor_styles function

function acuasafe_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'acuasafe_add_editor_styles' );

// 3) Add specific CSS class by filter body class.

$options = acuasafe_WSH()->option(); 
if( acuasafe_set($options, 'boxed_wrapper') ){

	add_filter( 'body_class', function( $classes ) {
		$classes[] = 'boxed_wrapper';
		return $classes;
	} );
}

function acuasafe_related_products_limit() {
  global $product;
	
	$args['posts_per_page'] = 6;
	return $args;
}
/**
 * product per page
 */
add_filter( 'loop_shop_per_page', 'acuasafe_loop_shop_per_page', 20 );

function acuasafe_loop_shop_per_page( $cols ) {
		$options     = acuasafe_WSH()->option();		
		$shop_product = esc_attr( $options->get( 'shop_product') );	
		
  // $cols contains the current number of products per page based on the value stored on Options –> Reading
  // Return the number of products you wanna show per page.
  $cols =  $shop_product;
  return $cols;
}



