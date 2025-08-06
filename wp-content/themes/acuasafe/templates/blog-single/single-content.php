<?php
/**
* Single Post Content Template
*
* @package    WordPress
* @subpackage ACUASAFE
* @author     Tona Theme
* @version    1.0
*/
?>
<?php global $wp_query;

$options = acuasafe_WSH()->option();
$allowed_html = wp_kses_allowed_html();

$page_id = ( $wp_query->is_posts_page ) ? $wp_query->queried_object->ID : get_the_ID();

$gallery = get_post_meta( $page_id, 'acuasafe_gallery_images', true );

$video = get_post_meta( $page_id, 'acuasafe_video_url', true );


$audio_type = get_post_meta( $page_id, 'acuasafe_audio_type', true );

?>


<div class="blog-details-content">
	<div class="news-block-one">
		<div class="inner-box">
			<figure class="image-box">
				<?php the_post_thumbnail(); ?>
			</figure>
			<div class="lower-content">
				<ul class="post-info clearfix">
					<?php if($options->get('single_post_author' ) ): ?>	
					<li><?php esc_html_e('Posted By: ', 'acuasafe');?><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"><?php the_author(); ?></a></li>
					<?php endif; ?>
					
					<?php if($options->get('single_post_date' ) ): ?>
					<li class="date"><?php esc_html_e('Posted On: ', 'acuasafe');?><a href="<?php echo get_day_link( get_the_time( 'Y' ), get_the_time( 'm' ), get_the_time( 'd' ) ); ?>"><?php echo get_the_date(); ?></a></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
	
	<div class="text">
		<?php the_content(); ?>
		<div class="clearfix"></div>
		<?php wp_link_pages(array('before'=>'<div class="paginate_links">'.esc_html__('Pages: ', 'acuasafe'), 'after' => '</div>', 'link_before'=>'', 'link_after'=>'')); ?>
	</div>
	
	
	
	<?php acuasafe_template_load( 'templates/blog-single/social_share.php', compact( 'options', 'data' ) ); ?>
	
	
	<?php comments_template(); ?>
</div>