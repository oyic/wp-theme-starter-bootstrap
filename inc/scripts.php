<?php
/**
 * Enqeue scripts
 * Google Maps API = AIzaSyC1CBEg-Aw2vSumF7a6Y1VmOYhrI6CTKxQ
 */

if(!function_exists('custom_enqueue_scripts')):
	function custom_enqueue_scripts() {
		if(!is_admin()):
			global $theme;
			// default style.css
			wp_enqueue_style( "wp-styles",get_stylesheet_uri());

			$cssFileURI = get_template_directory_uri() . '/dist/css/app.css';
			wp_enqueue_style( 'app',$cssFileURI  , null, THEME_VERSION, 'all' );
		
			$jsFileURI = get_template_directory_uri() . '/dist/js/bundle.js';
				wp_register_script('app', $jsFileURI, null, THEME_VERSION, true);
			// Add Google Map API on contact page-contact
			
			// wp_enqueue_script('google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyC1CBEg-Aw2vSumF7a6Y1VmOYhrI6CTKxQ&callback=initMap', ['app'], '', true);

			// wp_localize_script( 'app', 'wpVars', [
			// 	'logo' => get_template_directory_uri() . '/dist/images/logo.png',
			// 	'mapMarkerGlow' => get_template_directory_uri() . '/dist/images/map-marker-glow.png',
			// ] );
			wp_enqueue_script( 'app' );
			
			// The wp_localize_script allows us to output the ajax_url path for our script to use.
			wp_localize_script(
				'app',
				'wpAjax', // Visible in app.js
				array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) )
			);



		endif;
	}
	add_action('wp_enqueue_scripts', 'custom_enqueue_scripts');
endif;

// Call up the AJAX File
require_once(get_template_directory().'/ajax/ajax.php');

