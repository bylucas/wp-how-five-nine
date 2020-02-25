<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card'); ?>
	>

	<?php  if ( has_post_thumbnail() ) {
        $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), false, '' ); ?>

		<a class="post-card-image-link" href="<?php the_permalink() ?>">
            <div class="post-card-image" style="background-image: url(<?php echo esc_url( $src[0] ); ?>)"></div>
        </a>

		<?php } else { ?>

			<a class="post-card-image-link" href="<?php the_permalink() ?>">
            <div class="post-card-image" style="background-image: url(<?php echo get_header_image(); ?>)"></div>
        </a>
			<?php } ?>

				<div class="post-card-content">
	<?php
        
        the_title( '<h2 class="post-card-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        ?>
					<p><?php echo phone1st_excerpt(); ?></p>
					<footer class="post-card-meta">

		<p><?php the_modified_date('j F Y'); ?> | by <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php echo get_the_author(); ?></a><?php phone1st_comment_count(); ?></p>
                    
        <p class="reading-time"><?php printf( __( 'Reading time about <span class="reading-number">%s</span>', 'phone1st' ), phone1st_estimated_reading_time() )?></p>

					</footer>
				</div>
</article>
