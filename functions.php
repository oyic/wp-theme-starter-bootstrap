<?php
$theme = wp_get_theme();
define('THEME_VERSION',$theme->Version);
$default_directory = get_stylesheet_directory();
foreach(glob($default_directory . '/inc/*.php') as $file){
	require_once($file);
}

