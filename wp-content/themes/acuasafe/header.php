<?php
/**
 * The header for our theme
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package ACUASAFE
 * @since   1.0
 * @version 1.0
 */
$options = acuasafe_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

//Logo Settings
$image_logo = $options->get( 'image_normal_logo' );
$logo_dimension = $options->get( 'normal_logo_dimension' );

$image_logo2 = $options->get( 'image_normal_logo2' );
$logo_dimension2 = $options->get( 'normal_logo_dimension2' );

$image_logo3 = $options->get( 'image_normal_logo3' );
$logo_dimension3 = $options->get( 'normal_logo_dimension3' );


$icon_href = $options->get( 'image_favicon' ); 
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ): ?>
		<?php if( $icon_href ):?>
		
		<link rel="shortcut icon" href="<?php echo esc_url($icon_href['url']); ?>" type="image/x-icon">
		<link rel="icon" href="<?php echo esc_url($icon_href['url']); ?>" type="image/x-icon">
		
		<?php endif; ?>
	<?php endif; ?>
	<!-- Responsive -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <?php wp_head(); ?>

</head>
		
<body <?php body_class(); ?>> 

<?php
if ( ! function_exists( 'wp_body_open' ) ) {
		function wp_body_open() {
			do_action( 'wp_body_open' );
		}
}?>
	
<main class="boxed_wrapper <?php if($options->get( 'theme_rtl' ) ): echo esc_attr_e( 'rtl', 'acuasafe' ); endif;?>">	
	
<?php do_action( 'acuasafe_main_header' ); ?>	
		
 <?php if(!$options->get( 'theme_preloader' ) ):?>		
	        <!-- preloader -->
       

	<div class="loader-wrap">
            <div class="preloader">
		 <?php if(!$options->get( 'preloader_text' ) ):?>
           <?php echo wp_kses( $options->get( 'preloader_text', ' ' ), $allowed_html ); ?>	
				<?php else : ?>
                <div id="handle-preloader" class="handle-preloader">
                    <div class="animation-preloader">
                        <div class="spinner"></div>
                    </div>  
                </div>
				<?php endif; ?>
            </div>
        </div>
        <!-- preloader end -->
 <?php endif; ?>
	