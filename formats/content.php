<?php
/**
 * The post content file
 *
 * @package WordPress
 * @since phone1st 1.0
 */ ?>

       <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <section class="post-content">
                
              
  <?php
            
            the_content();

         //phone1st_page_links(); ?>



</section>
<hr>
 <section class="post-meta">
    <?php phone1st_post_meta_bottom() ?>
</section>
<hr>
<?php get_template_part('templates/subscribe'); ?>
<hr>
<?php phone1st_popular_posts(); ?>

  <hr>
    <?php  // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
      comments_template();
    endif; ?>
</article>

