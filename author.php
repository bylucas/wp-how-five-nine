<?php

 // The template for displaying author information and post excerpts
?>

	<?php get_header(); ?>

		<?php if ( have_posts() ) : ?>

			<?php $auth_id = get_the_author_meta('ID');
			       $authorImage = get_the_author_meta('image', $auth_id); ?>

				<header class="admin-header outer" style="background-image: url(<?php echo $authorImage; ?>)">


					<div id="masthead" class="active-header">
						

							<?php get_template_part('templates/site-nav'); ?>
					</div>
					<!-- active-header -->
					<?php get_template_part('templates/fullscreen-overlay'); ?>
						<div class="inner">

							<div class="admin-header-content cover">

								<figure>
									<?php
                
                $author_bio_avatar_size = apply_filters( 'casper_author_bio_avatar_size', 80 );
                echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size ); ?>
								</figure>

								<h1><?php echo get_the_author(); ?></h1>

								<div class="author-meta">

									<div class="author-location">
										<?php get_template_part('assets/icons/location-main'); ?>
											<?php the_author_meta( 'area_profile' ); ?> <span class="bull">&bull;</span></div>

									<div class="author-stats">
										<?php get_template_part('assets/icons/post-stats'); ?>
											<?php echo count_user_posts($auth_id); ?>
									</div>
								</div>
							</div>
						</div>
				</header>



				<main id="site-main" class="site-main outer" role="main">
					<div class="inner">

						<div class="post-feed">

							<h2><?php the_author_meta( 'description' ); ?></h2>

							<?php get_template_part('templates/author-portfolio'); ?>

								<?php
      // Start the loop.
      while ( have_posts() ) : the_post(); ?>


									<?php get_template_part( 'formats/content', 'admin' ); ?>

										<?php // End the loop.
      endwhile; ?>
						</div>

					</div>
					<?php endif ?>
					<?php get_template_part('templates/subscribe'); ?>
				</main>

				<?php get_footer(); ?>
