<?php
//Template Name: Static
//
// ========================================
// To show Static pages
// ========================================
get_header(); ?>


<?php if ( have_posts() ) : ?>

	<?php if ( has_post_thumbnail() ) {
        $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), false, '' ); ?>

			<header class="site-header outer" style="background-image: url(<?php echo esc_url( $src[0] ); ?>)">
	 
		<div id="masthead" class="active-header">
			

				<?php get_template_part('templates/site-nav'); ?>
			
		</div>
		<!-- active-header -->
		<?php get_template_part('templates/fullscreen-overlay'); ?>

		<div class="inner">
			<div class="page-header-content">

					<?php the_title( '<h1>', '</h1>' ); ?>
				</div>
		</div>
	</header>
 <?php } ?>
	<main id="site-main" class="site-main outer" role="main">
		
			<article class="page">
				

							<section class="page-content">

									<?php while ( have_posts() ) : the_post();
the_content(); ?>
								
								<?php // End the loop.
endwhile;
endif; ?>
									
							</section>
							
			</article>
		<?php get_template_part('templates/subscribe'); ?>
	</main>
	<?php get_footer(); ?>
