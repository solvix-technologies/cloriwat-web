<?php
$options = acuasafe_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

$image_logo2 = $options->get( 'image_normal_logo2' );
$logo_dimension2 = $options->get( 'normal_logo_dimension2' );

$logo_type = '';
$logo_text = '';
$logo_typography = '';
/**
 * Footer Main File.
 *
 * @package ACUASAFE
 * @author  template_path
 * @version 1.0
 */
global $wp_query;
$page_id = ( $wp_query->is_posts_page ) ? $wp_query->queried_object->ID : get_the_ID();
$options = acuasafe_WSH()->option();
?>



	<?php acuasafe_template_load( 'templates/footer/footer.php', compact( 'page_id' ) );?>



 <?php if(!$options->get( 'to_top' ) ):?>
	<!--Scroll to top-->
	<button class="scroll-top scroll-to-target" data-target="html">
		<span class="fal fa-angle-up"></span>
	</button>
  <?php endif; ?>
<!-- End Hidden Bar -->   






</main>
<?php wp_footer(); ?>
</body>
</html>
