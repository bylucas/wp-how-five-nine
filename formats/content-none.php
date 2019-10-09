<header class="post-not-found outer">
            
            <div class="inner">
 
                <section class="error-message">
                    <h1><?php _e( 'Oops!', 'phone1st' ); ?></h1>
                    <p><?php _e( 'It seems the article you are looking for has gone astray.', 'phone1st' ); ?></p>
                   
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Go to the front page →</a>
                </section>
            
       </div>
        </header>
	
<div class="error-form-wrap">
		<div class="inner error-form">
			<?php get_search_form(); ?>

		</div>
</div>
	<aside class="outer">
		<div class="inner">
			<div class="post-feed">
				<?php
        $recentPosts = new WP_Query();
        $recentPosts->query('showposts=3');?>

					<?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
						<?php get_template_part( 'formats/content', 'index' ); ?>
							<?php endwhile; ?>
			</div>
		</div>
	</aside>

