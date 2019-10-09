<?php
//
// Ajax Search
//

 function load_search_results() {

  

  $the_query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_POST['s'] ), 'post_type' => 'post' ) );
    if( $the_query->have_posts() ) :
        
    
   
    echo '<h3>Your results...</h3>';


   while( $the_query->have_posts() ): $the_query->the_post();

        
            
            the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
       
              <p><?php echo phone1st_excerpt(); ?></p>

        
         <?php endwhile;
        wp_reset_postdata();  
    endif;

    die();
  
}
add_action( 'wp_ajax_load_search_results', 'load_search_results' );
add_action( 'wp_ajax_nopriv_load_search_results', 'load_search_results' );    
?>