<?php
/**
 * The post content file
 *
 * @package WordPress
 * @since phone1st 1.0
 */ ?>

       <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <header class="post-header"> 
                 <?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
               <div class="author-bio-top">  
                  <?php phone1st_post_meta_top() ?> 
              </div>
            </header>
             
             <?php if ( has_post_thumbnail() ) {
        $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), false, '' ); ?>

        <figure id="parallax-1" class="parallax" data-image-src="<?php echo esc_url( $src[0] ); ?>">
            </figure>
            <?php } else { ?>

             <figure class="no-image">
            </figure>
            <?php } ?>

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

