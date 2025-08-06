<?php
/**
 * Banner Template
 *
 * @package    WordPress
 * @subpackage Tona Theme
 * @author     Tona Theme
 * @version    1.0
 */

if ( $data->get( 'enable_banner' ) AND $data->get( 'banner_type' ) == 'e' AND ! empty( $data->get( 'banner_elementor' ) ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'banner_elementor' ) );

	return false;
}

?>

<?php if ( $data->get( 'enable_banner' ) ) : ?>
	
	<?php if ( $data->get( 'banner' ) ) : ?>
	<section class="page-title centred" style="background-image: url(<?php echo esc_url( $data->get( 'banner' ) ); ?>);">
	<?php else : ?>
	<section class="page-title centred" style="background-image: url(<?php echo esc_url(get_template_directory_uri().'/assets/images/background/video-1.jpg');?>);">
	<?php endif; ?>	

		<div class="shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri().'/assets/images/shape/banner-shap.png');?>);"></div>
		<div class="auto-container">
			<div class="content-box">
				<h1><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h1>
				<ul class="bread-crumb clearfix">
					<?php echo acuasafe_the_breadcrumb(); ?>
				</ul>
			</div>
		</div>
	</section>

<?php endif; ?>