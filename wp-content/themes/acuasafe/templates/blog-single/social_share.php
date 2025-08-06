<?php 

$options = acuasafe_WSH()->option();
$allowed_html = wp_kses_allowed_html(); ?>

<?php if($options->get('single_post_share' ) ): ?>



<div class="post-share-option">
	<div class="shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri().'/assets/images/shape/shape-41.png');?>);"></div>
		    	<?php if ( $options->get( 'single_social_share' ) && $options->get( 'single_post_share' ) ) : ?>	
	<ul class="social-links clearfix mr_social">
	
		<li><h5><?php esc_html_e( 'Share On:', 'acuasafe' ); ?></h5></li>
	
		<?php foreach ( $options->get( 'single_social_share' ) as $k => $v ) {
			if ( $v == '' ) {
				continue;
			} ?>
			<?php do_action('acuasafe_social_share_output', $k ); ?>
		<?php } ?>
	</ul>
	<?php endif; ?>
	<div class="tag_post float-left mr_tag">
				<ul>
					<li><?php the_tags('Tags: ', '<span class="commax">,</span>  ', ''); ?></li>
				</ul>
			</div>
</div>



<?php endif; ?>