<?php

add_action( 'wp_ajax_nopriv_live_search', 'live_search' );
add_action( 'wp_ajax_live_search', 'live_search' );

function live_search()
{
	$variables = $_REQUEST; // comes from $.ajax on app.js

	// 1. DO WHAT YOU WANT HERE ie: wp_query
	// 2. ECHO // wp_send_json($return);
	
	// 3.Don't forget to stop execution afterward.
    wp_die();
}