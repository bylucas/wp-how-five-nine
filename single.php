<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package phone1st
 */

get_header(); ?>
<?php if ( have_posts() ) :
  while ( have_posts() ) : the_post(); ?>
 <?php if ( has_post_thumbnail() ) {
        $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), false, '' ); ?>

<header class="post-header" style="background-image: url(<?php echo esc_url( $src[0] ); ?>)">

	<?php } else { ?>

  <header class="post-header" style="background-image: url(<?php echo get_header_image(); ?>)">
            <?php } ?>
       
       <?php get_template_part('templates/site-nav'); ?>
     <?php get_template_part('templates/fullscreen-overlay'); ?>
     
     <div class="inner">   

        <div class="post-header-content cover">
               
                    <?php the_title( '<h1>', '</h1>' ); ?>
            
        </div>
       
    </div>
</header>	

<main id="primary" class="site-main" role="main">
		
	<?php
	

		get_template_part( 'formats/content', get_post_type() );

	endwhile; // End of the loop.
  endif; ?>

	</main><!-- #primary -->

<?php
get_template_part('templates/floating-header');
get_footer();
