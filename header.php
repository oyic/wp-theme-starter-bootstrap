<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		

	<?php wp_head(); ?>		
	</head>
	<body <?php body_class('container'); ?>>
	<div class="main-wrapper">
		<header class="header"><!-- 
			<nav class="navbar navbar-expand-md navbar-light bg-faded">
			   <a class="navbar-brand" href="#">Navbar</a>
			   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
			     <span class="navbar-toggler-icon"></span>
			   </button>
			   <?php
			   wp_nav_menu([
			     'theme_location'  => 'primary',
			     'container'       => 'div',
			     'container_id'    => 'bs4navbar',
			     'container_class' => 'collapse navbar-collapse',
			     'menu_id'         => false,
			     'menu_class'      => 'navbar-nav mr-auto',
			     'depth'           => 2,
			     'fallback_cb'     => 'bs4navwalker::fallback',
			     'walker'          => new bs4navwalker()
			   ]);
			   ?>
			</nav> -->
			<?php //clean_custom_menu('primary');?>

		</header>	
		<!-- <div class="container"> -->
	