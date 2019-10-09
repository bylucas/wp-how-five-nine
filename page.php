<?php
/**
 * The page template file
 *
 * @package WordPress
 * @since phone1st 1.0
 */

get_header(); ?>

<?php if ( have_posts() ) :
  while ( have_posts() ) : the_post(); ?>
 <?php if ( has_post_thumbnail() ) {
        $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), false, '' ); ?>

	<header class="site-header" style="background-image: url(<?php echo esc_url( $src[0] ); ?>)">

	<?php } else { ?>

  <header class="site-header" style="background-image: url(<?php echo get_header_image(); ?>)">
            <?php } ?>


		<div id="masthead" class="active-header">
			

				<?php get_template_part('templates/site-nav'); ?>

		</div>
		<!-- active-header -->
		<?php get_template_part('templates/fullscreen-overlay'); ?>

		 <div class="inner">   

        <div class="page-header-content">

              <div class="post-header">
               
                    <?php the_title( '<h1>', '</h1>' ); ?>
       
              </div>
            
        </div>
       
    </div>
	</header>

	<main id="site-main" class="site-main outer" role="main">
		

			<article class="post">

		<section class="post-content">
								
									<?php  
            the_content(); ?>
	
	<?php // End the loop.
            endwhile;
        endif; ?>
							</section>
			</article>

		
		<?php get_template_part('templates/subscribe'); ?>
	</main>

	<?php get_footer(); ?>
