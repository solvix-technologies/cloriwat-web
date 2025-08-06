<?php
//call this function to core file

//  [mr_product_search]


// Register Custom Taxonomy
	function make_type_func() {
		$labels = array(
			'name'              => _x( 'Water Types', 'acuasafe' ),
			'singular_name'     => _x( 'Type', 'acuasafe' ),
			'search_items'      => __( 'Search Type' ),
			'all_items'         => __( 'All Type' ),
			'parent_item'       => __( 'Parent Type' ),
			'parent_item_colon' => __( 'Parent Type:' ),
			'edit_item'         => __( 'Edit Type' ),
			'update_item'       => __( 'Update Type' ),
			'add_new_item'      => __( 'Add New Type' ),
			'new_item_name'     => __( 'New Type' ),
			'menu_name'         => __( 'Types' ),
		);
		$args   = array(
			'hierarchical'          => false,
			'public'                => true,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => false,
			'update_count_callback' => '_update_post_term_count',
			'query_var'             => true,
			'rewrite'               => array( 'slug' => 'product-type' ),
		);
		register_taxonomy( 'make_type', array( 'product' ), $args );
	}
	
add_action( 'init', 'make_type_func', 0 );	


 function make_brand_func() {
		$labels = array(
			'name'              => _x( 'Bottle Type', 'acuasafe' ),
			'singular_name'     => _x( 'Bottle Type', 'acuasafe' ),
			'search_items'      => __( 'Search Brand', 'acuasafe' ),
			'all_items'         => __( 'All Brand', 'acuasafe' ),
			'parent_item'       => __( 'Parent Brand', 'acuasafe' ),
			'parent_item_colon' => __( 'Parent Brand:', 'acuasafe' ),
			'edit_item'         => __( 'Edit Brand', 'acuasafe' ),
			'update_item'       => __( 'Update Brand', 'acuasafe' ),
			'add_new_item'      => __( 'Add New Brand', 'acuasafe' ),
			'new_item_name'     => __( 'New Brand', 'acuasafe' ),
			'menu_name'         => __( 'Brands', 'acuasafe' ),
		);
		$args   = array(
			'hierarchical'      => false,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => false,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'product-brand' ),
		);

		register_taxonomy( 'make_brand', array( 'product' ), $args );
	}
add_action( 'init', 'make_brand_func', 0 );	


	function make_model_func() {
		$labels = array(
			'name'              => _x( 'Water Amount', 'acuasafe' ),
			'singular_name'     => _x( 'Amount', 'acuasafe' ),
			'search_items'      => __( 'Search Amount', 'acuasafe' ),
			'all_items'         => __( 'All Model', 'acuasafe' ),
			'parent_item'       => __( 'Parent Model', 'acuasafe' ),
			'parent_item_colon' => __( 'Parent Model:', 'acuasafe' ),
			'edit_item'         => __( 'Edit Model', 'acuasafe' ),
			'update_item'       => __( 'Update Model', 'acuasafe' ),
			'add_new_item'      => __( 'Add New Model', 'acuasafe' ),
			'new_item_name'     => __( 'New Model', 'acuasafe' ),
			'menu_name'         => __( 'Models', 'acuasafe' ),
		);
		$args   = array(
			'hierarchical'      => false,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => false,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'product-model' ),
		);

		register_taxonomy( 'make_model', array( 'product' ), $args );
	}
add_action( 'init', 'make_model_func', 0 );	

	function make_variation_func() {
		$labels = array(
			'name'              => _x( 'Water Variations', 'acuasafe' ),
			'singular_name'     => _x( 'Variation', 'acuasafe' ),
			'search_items'      => __( 'Search Variation' ),
			'all_items'         => __( 'All Variation' ),
			'parent_item'       => __( 'Parent Variation' ),
			'parent_item_colon' => __( 'Parent Variation:' ),
			'edit_item'         => __( 'Edit Variation' ),
			'update_item'       => __( 'Update Variation' ),
			'add_new_item'      => __( 'Add New Variation' ),
			'new_item_name'     => __( 'New Variation' ),
			'menu_name'         => __( 'Variations' ),
		);
		$args   = array(
			'hierarchical'      => false,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => false,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'product-variation' ),
		);

		register_taxonomy( 'make_variation', array( 'product' ), $args );
	}
add_action( 'init', 'make_variation_func', 0 );	



//Query Short-codes [mr_product_search]
add_shortcode( 'mr_product_search', 'mr_product_search_func' );

function mr_product_search_func() {
	$shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
	?>

	<form method="get" id="advanced-searchform" class="mr-search-box-form" role="search" action="<?php echo $shop_page_url; ?>">
		  <input type="hidden" name="search" value="advanced">
				
		<select class="mr_select_one " id="maketype" name="maketype">
			<option value=""><?php esc_html_e( 'Water Type', 'acuasafe' ); ?></option>
			<?php
			$make_type = get_terms(
				array(
					'taxonomy'   => 'make_type',
					'hide_empty' => false,
				)
			);
			if ( ! empty( $make_type ) ) {
				foreach ( $make_type as $single ) {
					echo '<option value="' . $single->slug . '">' . $single->name . '</option>';
				}
			}
			?>
		</select>

		<select class="mr_select_two " id="makebrand" name="brand" disabled>
			  <option value=""><?php esc_html_e( 'Bottle Type', 'acuasafe' ); ?></option>
			<?php
			$make_brand = get_terms(
				array(
					'taxonomy'   => 'make_brand',
					'hide_empty' => false,
				)
			);
			if ( ! empty( $make_brand ) ) {
				foreach ( $make_brand as $single ) {
					echo '<option value="' . $single->slug . '">' . $single->name . '</option>';
				}
			}
			?>
		</select>

		<select class="mr_select_three" id="makemodel" name="model" disabled>
			<option value=""><?php esc_html_e( 'Water Amount', 'acuasafe' ); ?></option>
			<?php
			$make_model = get_terms(
				array(
					'taxonomy'   => 'make_model',
					'hide_empty' => false,
				)
			);
			if ( ! empty( $make_model ) ) {
				foreach ( $make_model as $single ) {
					echo '<option value="' . $single->slug . '">' . $single->name . '</option>';
				}
			}
			?>
		</select>

		<select class="mr_select_four " id="makevariation" name="variation" disabled>
			<option value=""><?php esc_html_e( 'Variation', 'acuasafe' ); ?></option>
			<?php
			$make_variation = get_terms(
				array(
					'taxonomy'   => 'make_variation',
					'hide_empty' => false,
				)
			);
			if ( ! empty( $make_variation ) ) {
				foreach ( $make_variation as $single ) {
					echo '<option value="' . $single->slug . '">' . $single->name . '</option>';
				}
			}
			?>
		</select>


		<button type="submit"><?php esc_html_e( 'Search', 'acuasafe' ); ?></button>
	  </form>
		<?php
}


add_filter( 'woocommerce_product_query', 'mr_advanced_search_query' );
function mr_advanced_search_query( $query ) {

	$maketype   = '';
	$makebrand  = '';
	$makemodel  = '';
	$makevariation = '';

	// if ( isset( $_REQUEST['search'] ) && $_REQUEST['search'] == 'advanced' && ! is_admin() && $query->is_search && $query->is_main_query() ) {
	if ( isset( $_REQUEST['search'] ) == 'advanced' && ! is_admin() ) {
		if ( $query->query_vars['post_type'] == 'product' ) {
			$query->set( 'post_type', 'product' );

			if ( isset( $_GET['maketype'] ) && ! empty( $_GET['maketype'] ) ) {
				$maketype = array(
					'taxonomy' => 'make_type',
					'terms'    => $_GET['maketype'],
					'field'    => 'slug',
				);
			}

			if ( isset( $_GET['brand'] ) && ! empty( $_GET['brand'] ) ) {
				$makebrand = array(
					'taxonomy' => 'make_brand',
					'terms'    => $_GET['brand'],
					'field'    => 'slug',
				);
			}

			if ( isset( $_GET['model'] ) && ! empty( $_GET['model'] ) ) {
				$makemodel = array(
					'taxonomy' => 'make_model',
					'terms'    => $_GET['model'],
					'field'    => 'slug',
				);
			}

			if ( isset( $_GET['variation'] ) && ! empty( $_GET['variation'] ) ) {
				$makevariation = array(
					'taxonomy' => 'make_variation',
					'terms'    => $_GET['variation'],
					'field'    => 'slug',
				);
			}

			if ( ! empty( $maketype ) && ! empty( $makebrand ) && ! empty( $makemodel ) && ! empty( $makevariation ) ) {

				$tax_query = array(
					'relation' => 'AND',
					$maketype,
					$makebrand,
					$makemodel,
					$makevariation,
				);
			} elseif ( ! empty( $maketype ) && ! empty( $makebrand ) && ! empty( $makemodel ) ) {
				$tax_query = array(
					'relation' => 'AND',
					$maketype,
					$makebrand,
					$makemodel,
				);
			} elseif ( ! empty( $maketype ) && ! empty( $makebrand ) ) {
				$tax_query = array(
					'relation' => 'AND',
					$maketype,
					$makebrand,
				);
			} else {
				$tax_query = array(
					'relation' => 'AND',
					$maketype,
				);
			}
			$query->set( 'tax_query', $tax_query );
		}
	}
	remove_filter( 'woocommerce_product_query', 'mr_advanced_search_query' );

}



	
