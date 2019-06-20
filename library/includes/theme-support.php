<?php
// Add basic theme support
// --------------------------------
function custom_theme_support() {
	// Switch default core markup for search form, comment form,
	// and comments to output valid HTML5
	add_theme_support( 'html5', [
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	] );

	// Add menu support
	add_theme_support( 'menus' );

	// Let WordPress manage the document title
	add_theme_support( 'title-tag' );

	// Add post thumbnail support: http://codex.wordpress.org/Post_Thumbnails
	add_theme_support( 'post-thumbnails' );

	// RSS thingy
	add_theme_support( 'automatic-feed-links' );

	// WooCommerce
	add_theme_support('woocommerce', [
		'thumbnail_image_width' => 240,
		'single_image_width' => 480,
	]);
}
add_action( 'after_setup_theme', 'custom_theme_support' );
