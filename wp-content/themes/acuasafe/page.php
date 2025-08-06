<?php
/**
 * Default Template Main File.
 *
 * @package ACUASAFE
 * @author  template_path
 * @version 1.0
 */

get_header();
$data  = \ACUASAFE\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-xl-8 col-lg-7 col-xs-12 col-sm-12';
?>


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


<!--Start blog area-->
<section class="sidebar-page-container single">
	<div class="auto-container">
		<div class="row clearfix">
		
        	<?php
            if ( $data->get( 'layout' ) == 'left' ) {
                do_action( 'acuasafe_sidebar', $data );
            }
            ?>
            <div class="wp-style content-side <?php echo esc_attr( $class ); ?>">
                    <div class="blog-modern-content text">
                        <?php while ( have_posts() ): the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; ?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="clearfix"></div>
		<?php wp_link_pages(array('before'=>'<div class="paginate_links">'.esc_html__('Pages: ', 'acuasafe'), 'after' => '</div>', 'link_before'=>'', 'link_after'=>'')); ?>
					
					
                    <?php comments_template() ?>
            </div>
            <?php
            if ( $layout == 'right' ) {
                $data->set('sidebar', 'default-sidebar');
                do_action( 'acuasafe_sidebar', $data );
            }
            ?>
        
        </div>
	</div>
</section><!-- blog section with pagination -->

<?php get_footer(); ?>
