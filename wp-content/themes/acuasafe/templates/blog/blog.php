<?php
$options = acuasafe_WSH()->option();
$allowed_html = wp_kses_allowed_html();

/**
 * Blog Content Template
 *
 * @package    WordPress
 * @subpackage ACUASAFE
 * @author     Tona Theme
 * @version    1.0
 */

if ( class_exists( 'Acuasafe_Resizer' ) ) {
	$img_obj = new Acuasafe_Resizer();
} else {
	$img_obj = array();
}
$allowed_tags = wp_kses_allowed_html('post');
global $post;
?>
<div <?php post_class(); ?>>


<div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500m">
	<div class="inner-box">
		<figure class="image-box"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_post_thumbnail(); ?></a></figure>
		<div class="lower-content">
			

			<h4><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h4>
			
			<ul class="post-info clearfix">
				<?php if($options->get('blog_post_author' ) ): ?>
				<li><i class="fa fa-user"></i><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"><?php the_author(); ?></a></li>
				<?php endif;?>
				<?php if($options->get('blog_post_date' ) ): ?>
				<li><i class="fa fa-calendar"></i><?php echo get_the_date(); ?></li>
				<?php endif; ?>
				<li><i class="fa fa-comment"></i><?php comments_number(); ?></li>
			</ul>
			<div class="text">
				<?php the_excerpt(); ?>
			</div>
			<div class="btn-box">
				<?php if($options->get('blog_post_readmoretext' ) ): ?>	
				
				<a href="<?php echo esc_url(get_permalink(get_the_id()));?>" class="theme-btn btn-two"><?php echo wp_kses( $options->get( 'blog_post_readmoretext'), $allowed_html ); ?></a>
				
				<?php else: ?>
				
				<a href="<?php echo esc_url(get_permalink(get_the_id()));?>" class="theme-btn btn-two"><?php esc_html_e('Read More', 'acuasafe');?></a>
				
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

    
</div>