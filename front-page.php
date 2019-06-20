<?php 


	/**
	 * @Home page Template
	 */
 ?>

 <?php get_header(); ?>
	<main class="page page--front">
		 <div class="page__slider">
		 	<?php Oyic\Utils\Punk::anchor_link(get_the_permalink(),get_the_title()); ?>
		 </div>
	</main>
	<div class="container">
		<div class="section section--bordered">
			<h1 class="section__title section__title--front">
				<a href="#" class="fancy-underline">My Fancy Underline</a>
			</h1>
		</div>
	</div>
<?php get_footer(); ?>