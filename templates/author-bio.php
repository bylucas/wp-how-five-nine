<?php
/**
 * The template for displaying Author info
 *
 * @package WordPress
 * @subpackage Phone1st
 * @since 1.0.0
 */


if ( (bool) get_the_author_meta( 'description' ) ) : ?>
    <div class="author-bio">

   <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><span><?php $author_bio_avatar_size = apply_filters( 'phone1st_author_bio_avatar_size', 68 ); echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size ); ?></span></a>
        <p class="bigger"><?php printf( __( '%s', 'phone1st' ), esc_html( get_the_author() )); ?> - <span class="author-job"><?php the_author_meta( 'job_title' ); ?></span></p>

        <p><?php the_author_meta( 'description' ); ?></p>

    </div>
<?php endif; ?>
