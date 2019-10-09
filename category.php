<?php

 // The template for displaying excerpts on the category page
?>

	<?php get_header(); ?>

		<?php if ( have_posts() ) : ?>

			<header class="site-header outer" style="background-image: url(<?php echo casper_tax_pic_url(); ?>)">


				<div id="masthead" class="active-header">
					

						<?php get_template_part('templates/site-nav'); ?>

					
				</div>
				<!-- active-header -->
				<?php get_template_part('templates/fullscreen-overlay'); ?>
					<div class="inner">
						<div class="page-header-content">
							<div class="page-header">
							<h1>
                <?php single_cat_title( '', true ); ?>
               </h1>
							<?php if ( category_description() ) : ?>

								<?php echo category_description(); ?>

								<?php endif; ?>
						</div>

					</div>
				</div>
			</header>

			<main id="site-main" class="site-main outer" role="main">
				<div class="inner">

					<div class="post-feed">
						<?php
            // Start the Loop.
            while ( have_posts() ) : the_post(); ?>



							<?php   get_template_part( 'formats/content', 'cat' ); ?>



								<?php // End the loop.
            endwhile; ?>
					</div>
					<?php else :
            get_template_part( 'formats/content', 'none' );

        endif; ?>
				</div>
				<?php get_template_part('templates/subscribe'); ?>
			</main>

			<?php get_footer(); ?>
