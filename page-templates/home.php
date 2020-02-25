<?php
/**
 Template Name: Home
 *
 * @package phone1st
 */

get_header(); ?>

<?php if ( have_posts() ) :
  while ( have_posts() ) : the_post(); ?>
 <?php if ( has_post_thumbnail() ) {
        $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), false, '' ); ?>

	<header class="home-header" style="background-image: url(<?php echo esc_url( $src[0] ); ?>)">

	<?php } else { ?>

  <header class="home-header" style="background-image: url(<?php echo get_header_image(); ?>)">
            <?php } ?>


 <div id="masthead" class="active-header">      
       
       <?php get_template_part('templates/site-nav'); ?>

</div><!-- active-header -->
     <?php get_template_part('templates/fullscreen-overlay'); ?>
     
     <div class="inner">   

        <div class="home-header-content cover">
               
  <p>A <em>4,000</em> mile (<em>6,437 km</em>) cycle ride around <em>India</em> starting in <em>Delhi </em> and ending in <em>Pochara</em>, <em>Nepal</em>. Taking in the <em>West Coast</em>, the  <em>Munaar</em> mountains and the <em>East Coast</em>.</p>
        </div> 
      
       
    </div>
</header>

	<main id="primary" class="site-main outer" role="main">
			<div class="inner">		

				<h2 class="home-title">Cycling Around India</h2>
				<div class="home-wrapper">
				
				<div class="home-wrap">
				<div class="home-item">
				<p>Starting in Delhi, cycling to Agra (Taj Mahal), down to Sawai Madhopur (Ranthambore National Park), and Kota. From there I took the train to Mumbai and cycled to Goa following the mountainous west coast. From Goa I continued down the west coast to Varkala. From Varkala I turned towards the mountains to Munaar and from there heading east to Madurai, taking a bus from Madurai to Chennai and then cycling down to Pondicherry. </p>

				<p>From Pondicherry I cycled the east coast to Puri and  Bhubaneshwar, from there taking the train to Varanasi and then cycling up to Nepal ending in Pokhara. </p>
			</div>
			<div class="home-item">
				<img src="<?php echo get_template_directory_uri() . '/assets/images/india-map.jpg'; ?>" alt="Map of India cycle route">
			</div>
				</div>
				<p>Read about the easy and hard cycling, the time I got lost, the time I travelled second class on the train (something you only do once), the wonderful Goa. The loneliness when off the tourist track, the people, their way of life and their culture. The problems I had with the bicycle and trains.</p>
			</div>

				

	</main><!-- #primary -->

<?php endwhile;
endif;

get_footer(); ?>