<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * @package WordPress
 * @since Casper 1.0
 */
?>
	<?php get_header(); ?>

		<?php if ( have_posts() ) : ?>

			<header class="site-header outer" style="background-image: url(<?php echo get_header_image(); ?>)">


				<div id="masthead" class="active-header">
					

						<?php get_template_part('templates/site-nav'); ?>

					
				</div>
				<!-- active-header -->
				<?php get_template_part('templates/fullscreen-overlay'); ?>
					<div class="inner">
						<div class="page-header-content">

							<?php
		the_archive_title( '<h1>', '</h1>' );
		the_archive_description( '<p class="site-description">', '</p>' ); ?>

						</div>

					</div>
			</header>

			<main id="site-main" class="site-main outer" role="main">
				<div class="inner">

					<div class="post-feed">
						<?php
      // Start the loop.
      while ( have_posts() ) : the_post(); ?>


							<?php get_template_part( 'formats/content', 'index' ); ?>

								<?php // End the loop.
      endwhile; ?>
					</div>

					<?php // If no content, include the "No posts found" template.
    else :
      get_template_part( 'formats/content', 'none' );

    endif;
    ?>

				</div>
				<?php get_template_part('templates/subscribe'); ?>
			</main>

			<?php get_footer(); ?>
