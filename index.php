<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package phone1st
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>

<header class="site-header" style="background-image: url(<?php echo get_header_image(); ?>)">


 <div id="masthead" class="active-header">      
       
       <?php get_template_part('templates/site-nav'); ?>

</div><!-- active-header -->
     <?php get_template_part('templates/fullscreen-overlay'); ?>
     
     <div class="inner">   

        <div class="site-header-content cover">
               
                    <h1 class="site-title"><?php bloginfo( 'name' ); ?></a></h1>
            
               
            <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
        </div>
       
    </div>
</header>

	<main id="primary" class="site-main outer" role="main">
			<div class="inner">		

				<div class="post-feed">
	<?php

		/* Start the Loop */
		while ( have_posts() ) : the_post();


			get_template_part( 'formats/content', 'index' );

		endwhile; ?>

		</div><!-- post-feed -->

	<?php else :

		get_template_part( 'formats/content', 'none' );

	endif; ?>
	</div><!-- inner -->

	</main><!-- #primary -->

<?php
get_footer();
