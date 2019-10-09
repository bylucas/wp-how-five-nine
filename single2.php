<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package phone1st
 */

get_header(); ?>

<header class="site-header">
        
        <?php get_template_part('templates/site-nav'); ?>

  <?php get_template_part('templates/fullscreen-overlay'); ?>
</header>

	<main id="primary" class="site-main" role="main">
		
	<?php
	while ( have_posts() ) : the_post();

		get_template_part( 'formats/content', get_post_type() );

	endwhile; // End of the loop.
	?>

	</main><!-- #primary -->

<?php
get_template_part('templates/floating-header');
get_footer();
