<?php

namespace ACUASAFEPLUGIN\Inc;


use ACUASAFEPLUGIN\Inc\Abstracts\Taxonomy;


class Taxonomies extends Taxonomy {


	public static function init() {

		$labels = array(
			'name'              => _x( 'Project Category', 'wpacuasafe' ),
			'singular_name'     => _x( 'Project Category', 'wpacuasafe' ),
			'search_items'      => __( 'Search Category', 'wpacuasafe' ),
			'all_items'         => __( 'All Categories', 'wpacuasafe' ),
			'parent_item'       => __( 'Parent Category', 'wpacuasafe' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpacuasafe' ),
			'edit_item'         => __( 'Edit Category', 'wpacuasafe' ),
			'update_item'       => __( 'Update Category', 'wpacuasafe' ),
			'add_new_item'      => __( 'Add New Category', 'wpacuasafe' ),
			'new_item_name'     => __( 'New Category Name', 'wpacuasafe' ),
			'menu_name'         => __( 'Project Category', 'wpacuasafe' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'project_cat' ),
		);

		register_taxonomy( 'project_cat', 'acuasafe_project', $args );
		
		//Services Taxonomy Start
		$labels = array(
			'name'              => _x( 'Service Category', 'wpacuasafe' ),
			'singular_name'     => _x( 'Service Category', 'wpacuasafe' ),
			'search_items'      => __( 'Search Category', 'wpacuasafe' ),
			'all_items'         => __( 'All Categories', 'wpacuasafe' ),
			'parent_item'       => __( 'Parent Category', 'wpacuasafe' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpacuasafe' ),
			'edit_item'         => __( 'Edit Category', 'wpacuasafe' ),
			'update_item'       => __( 'Update Category', 'wpacuasafe' ),
			'add_new_item'      => __( 'Add New Category', 'wpacuasafe' ),
			'new_item_name'     => __( 'New Category Name', 'wpacuasafe' ),
			'menu_name'         => __( 'Service Category', 'wpacuasafe' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'service_cat' ),
		);


		register_taxonomy( 'service_cat', 'acuasafe_service', $args );
		
		//Testimonials Taxonomy Start
		$labels = array(
			'name'              => _x( 'Testimonials Category', 'wpacuasafe' ),
			'singular_name'     => _x( 'Testimonials Category', 'wpacuasafe' ),
			'search_items'      => __( 'Search Category', 'wpacuasafe' ),
			'all_items'         => __( 'All Categories', 'wpacuasafe' ),
			'parent_item'       => __( 'Parent Category', 'wpacuasafe' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpacuasafe' ),
			'edit_item'         => __( 'Edit Category', 'wpacuasafe' ),
			'update_item'       => __( 'Update Category', 'wpacuasafe' ),
			'add_new_item'      => __( 'Add New Category', 'wpacuasafe' ),
			'new_item_name'     => __( 'New Category Name', 'wpacuasafe' ),
			'menu_name'         => __( 'Testimonials Category', 'wpacuasafe' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'testimonials_cat' ),
		);


		register_taxonomy( 'testimonials_cat', 'acuasafe_testimonials', $args );
		
		
		//Team Taxonomy Start
		$labels = array(
			'name'              => _x( 'Team Category', 'wpacuasafe' ),
			'singular_name'     => _x( 'Team Category', 'wpacuasafe' ),
			'search_items'      => __( 'Search Category', 'wpacuasafe' ),
			'all_items'         => __( 'All Categories', 'wpacuasafe' ),
			'parent_item'       => __( 'Parent Category', 'wpacuasafe' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpacuasafe' ),
			'edit_item'         => __( 'Edit Category', 'wpacuasafe' ),
			'update_item'       => __( 'Update Category', 'wpacuasafe' ),
			'add_new_item'      => __( 'Add New Category', 'wpacuasafe' ),
			'new_item_name'     => __( 'New Category Name', 'wpacuasafe' ),
			'menu_name'         => __( 'Team Category', 'wpacuasafe' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'team_cat' ),
		);


		register_taxonomy( 'team_cat', 'acuasafe_team', $args );
		
		//Faqs Taxonomy Start
		$labels = array(
			'name'              => _x( 'Faqs Category', 'wpacuasafe' ),
			'singular_name'     => _x( 'Faq Category', 'wpacuasafe' ),
			'search_items'      => __( 'Search Category', 'wpacuasafe' ),
			'all_items'         => __( 'All Categories', 'wpacuasafe' ),
			'parent_item'       => __( 'Parent Category', 'wpacuasafe' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpacuasafe' ),
			'edit_item'         => __( 'Edit Category', 'wpacuasafe' ),
			'update_item'       => __( 'Update Category', 'wpacuasafe' ),
			'add_new_item'      => __( 'Add New Category', 'wpacuasafe' ),
			'new_item_name'     => __( 'New Category Name', 'wpacuasafe' ),
			'menu_name'         => __( 'Faq Category', 'wpacuasafe' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'faqs_cat' ),
		);


		register_taxonomy( 'faqs_cat', 'acuasafe_faqs', $args );
	}
	
}
