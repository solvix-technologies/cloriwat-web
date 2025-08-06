<?php
/**
 * Search Form template
 *
 * @package ACUASAFE
 * @author template_path
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}
?>
<div class="sidebar-search">                                                  
	<div class="search-inner">
		<form  method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">	
			<div class="form-group">
				<input type="search" name="s" placeholder="<?php echo esc_attr__( 'Search...', 'acuasafe' ); ?>" required="">
				<button type="submit"><i class="fas fa-search"></i></button>
			</div>
		</form>
	</div>
</div>