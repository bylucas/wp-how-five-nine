<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>404 Page not found</title>
    <meta name="HandheldFriendly" content="True" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/style.css" />
</head>
<body class="error-template">
    <div class="site-wrapper">

        <header class="site-header outer">
            
            <div class="inner">
 
                <section class="error-message">
                    <h1><?php _e( 'Oops!', 'casper' ); ?></h1>
                    <p><?php _e( 'It seems the page you are looking for has gone astray.', 'casper' ); ?></p>
                   
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Go to the front page →</a>
                </section>
            
       </div>
        </header>

        <main id="site-main" class="site-main outer" role="main">
            <div class="inner error-form">  
                   <?php get_search_form(); ?>
        
            </div>
        </main>

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

    </div>
</body>
</html>
