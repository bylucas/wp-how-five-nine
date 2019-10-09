<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<?php get_template_part('templates/head-meta'); ?>
   <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div id="page" class="site">

	<div id="loader-wrapper">
			<div id="app-loader">
				<spinner :status="spinner.status" :color="spinner.color" :size="spinner.size" :depth="spinner.depth" :rotation="spinner.rotation" :speed="spinner.speed"></spinner>
			</div>
			<div class="loader-section section-left"></div>
			<div class="loader-section section-right"></div>
		</div>


		<div id="app-top">
			<backtotop></backtotop>
		</div>
	
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'phone1st' ); ?></a>