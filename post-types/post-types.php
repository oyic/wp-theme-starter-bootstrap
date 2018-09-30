<?php
// Register Custom Post Type News
// Post Type Key: news
function create_news_cpt() {

	$labels = array(
		'name' => __( 'News', 'Post Type General Name', 'custom' ),
		'singular_name' => __( 'News', 'Post Type Singular Name', 'custom' ),
		'menu_name' => __( 'News', 'custom' ),
		'name_admin_bar' => __( 'News', 'custom' ),
		'archives' => __( 'News Archives', 'custom' ),
		'attributes' => __( 'News Attributes', 'custom' ),
		'parent_item_colon' => __( 'Parent News:', 'custom' ),
		'all_items' => __( 'All News', 'custom' ),
		'add_new_item' => __( 'Add New News', 'custom' ),
		'add_new' => __( 'Add New', 'custom' ),
		'new_item' => __( 'New News', 'custom' ),
		'edit_item' => __( 'Edit News', 'custom' ),
		'update_item' => __( 'Update News', 'custom' ),
		'view_item' => __( 'View News', 'custom' ),
		'view_items' => __( 'View News', 'custom' ),
		'search_items' => __( 'Search News', 'custom' ),
		'not_found' => __( 'Not found', 'custom' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'custom' ),
		'featured_image' => __( 'Featured Image', 'custom' ),
		'set_featured_image' => __( 'Set featured image', 'custom' ),
		'remove_featured_image' => __( 'Remove featured image', 'custom' ),
		'use_featured_image' => __( 'Use as featured image', 'custom' ),
		'insert_into_item' => __( 'Insert into News', 'custom' ),
		'uploaded_to_this_item' => __( 'Uploaded to this News', 'custom' ),
		'items_list' => __( 'News list', 'custom' ),
		'items_list_navigation' => __( 'News list navigation', 'custom' ),
		'filter_items_list' => __( 'Filter News list', 'custom' ),
	);
	$args = array(
		'label' => __( 'News', 'custom' ),
		'description' => __( 'News Post Type', 'custom' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-site',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'author', 'post-formats', ),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5.1,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'news', $args );

}
add_action( 'init', 'create_news_cpt', 0 );