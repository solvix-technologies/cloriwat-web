<?php
/**
 * Archive Main File.
 *
 * @package ACUASAFE
 * @author  template_path
 * @version 1.0
 */
get_header();
global $wp_query;
$data  = \ACUASAFE\Includes\Classes\Common::instance()->data( 'archive' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$layout = ( $layout ) ? $layout : 'right';
$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-xl-8 col-lg-7 col-xs-12 col-sm-12';
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
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
 
	<div class="sidebar-page-container classic">
    	<div class="auto-container">
        	<div class="sticky-container row clearfix">
                
                <!--Sidebar Start-->
                <?php
				if ( $data->get( 'layout' ) == 'left' ) {
					do_action( 'acuasafe_sidebar', $data );
				}
				?>
                
                <div class=" content-side <?php echo esc_attr( $class ); ?>">
                    
                     <div class="our-blog">
                    
                        <?php
                            while ( have_posts() ) :
                                the_post();
                                acuasafe_template_load( 'templates/blog/blog.php', compact( 'data' ) );
                            endwhile;
                            wp_reset_postdata();
                        ?>
                        
                    </div>
                    
                    <!--Pagination-->
                    <div class="styled-pagination text-center">
                    
						<?php acuasafe_the_pagination(); ?>
                    </div>
                    
                </div>
                
                <!--Sidebar Start-->
                <?php
				if ( $data->get( 'layout' ) == 'right' ) {
					do_action( 'acuasafe_sidebar', $data );
				}
				?>
                
            </div>
        </div>
    </div> 
    <!--End blog area--> 
	
	
	<?php
}
get_footer();