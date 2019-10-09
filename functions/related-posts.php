<?php
/***************************************
RELATED POSTS AND POPULAR POSTS FUNCTION
****************************************/

// Popular Posts Function (call using phone1st_popular_posts(); ) for use on pages

function phone1st_popular_posts() {
    global $post;

    $orig_post = $post;

$args=array(
        'orderby'=>"post_date",
        'post__not_in' => array($post->ID),
        'posts_per_page' => 12,
        'ignore_sticky_posts'=> 1
);

$the_query = new WP_Query( $args );

if( $the_query->have_posts() ) {
    
    echo '<section class="related">';
    
    echo '<h3>&#x2014; Where Next? &#x2014;</h3>';

    echo '<ul id="rig">';

    while ( $the_query->have_posts() ) {
        $the_query->the_post(); ?>

        
            <li>
            <a class="rig-cell" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php if ( has_post_thumbnail() ) { ?>
                <img class="rig-img" src="<?php the_post_thumbnail(); ?>">
                <?php } else { ?>
                <img class="rig-img" src="<?php echo get_template_directory_uri() . '/assets/images/no-featured-image.jpg'; ?>">
                    <?php } ?>
                <span class="rig-overlay"></span>
                <span class="rig-text"><?php the_title(); ?></span>
                </a>
           
            </li>
        
        <?php
}
    echo '</ul>';
 echo '</section>';

     } else { ?>

        <p class="no-related-posts">Related posts are on their way..</p>

 <?php  
}
wp_reset_query();

} /* end phone1st popular posts function */
?>