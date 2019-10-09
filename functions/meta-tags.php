<?php
/**
 * Custom meta tags for this theme
 *
 * @since phone1st 1.0
 */
 
 if ( ! function_exists( 'phone1st_post_meta_top' ) ) : 

function phone1st_post_meta_top() { ?>

  <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><span><?php $author_bio_avatar_size = apply_filters( 'phone1st_author_bio_avatar_size', 48 ); echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size ); ?></span></a>
                    
  <p class="bigger"><?php printf( __( '%s', 'phone1st' ), esc_html( get_the_author() )); ?> <span class="author-job"><?php the_author_meta( 'job_title' ); ?></span></p>
  
  <p><?php the_modified_date('j F Y'); ?></p>
  <p><?php phone1st_comment_count() ?></p>
<?php
}
endif;
 
 ///////////////////////////////////////// 

/**
   * Prints HTML with meta information for the current categories.
   */
  if ( ! function_exists( 'phone1st_categories' ) ) :

  function phone1st_categories() {
      $categories_list = get_the_category_list(_x( ' ', 'Used between list items, there is a space before and after the hash.', 'phone1st' ));
    if ( $categories_list ) {
      printf( '<span class="cat"><span class="hidden">%1$s </span> %2$s</span>',
        _x( 'Tagged with', 'Used before category names.', 'phone1st' ),
        $categories_list
        
      );
    }
    }
endif;
 
/////////////////////////////////////////////////////////////////// 

if ( ! function_exists( 'phone1st_post_meta_bottom' ) ) :
  
function phone1st_post_meta_bottom() { ?>
  
    <?php get_template_part('templates/author-bio'); ?>

    <div class="post-meta-wrap">
    <p><?php the_modified_date('j F Y'); ?></p>

    <p class="comments-count"><?php phone1st_comment_count() ?></p>
    </div>
    <p><?php phone1st_categories() ?></p>
  
<?php }

endif;

//////////////////////////////////////////////

if ( ! function_exists( 'phone1st_comment_count' ) ) :
  /**
   * Prints HTML with the comment count for the current post.
   */
  function phone1st_comment_count() {
    if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
      echo '<span class="comments-link">';

      /* translators: %s: Name of current post. Only visible to screen readers. */
      comments_popup_link( sprintf( __( 'No Comments<span class="screen-reader-text"> on %s</span>', 'phone1st' ), get_the_title() ) );

      echo '</span>';
    }
  }
endif; ?>