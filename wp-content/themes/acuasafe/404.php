<?php
/**
 * 404 page file
 *
 * @package    WordPress
 * @subpackage Acuasafe
 * @author     template_path
 * @version    1.0
 */

$text = sprintf(__('It seems we can\'t find what you\'re looking for. Perhaps searching can help ', 'acuasafe'), esc_url(home_url('/')));
$allowed_html = wp_kses_allowed_html( 'post' );
?>
<?php get_header();
$data = \ACUASAFE\Includes\Classes\Common::instance()->data( '404' )->get();
do_action( 'acuasafe_banner', $data );
$options = acuasafe_WSH()->option();

if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
	?>
	

<!-- error-section -->
<section class="error-section centred sec-pad">
	<div class="auto-container">
		<div class="inner-box">
			<h1><?php esc_html_e( '404', 'acuasafe' ); ?></h1>
			<h2><?php esc_html_e( 'Oops! Page Not Found!', 'acuasafe' ); ?></h2>
			<a href="<?php echo( home_url( '/' ) ); ?>" class="theme-btn btn-style-one"><?php esc_html_e( 'Back homepage', 'acuasafe' ); ?> <span class="icon flaticon-next-4"></span></a>
		</div>
	</div>
</section>
<!-- error-section end --> 

    
<?php
}
get_footer(); ?>
