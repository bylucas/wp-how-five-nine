<?php
/*********************
THEME SUPPORT
*********************/


// Adding WP Functions & Theme Support
	function phone1st_theme_support() {

// Add default posts and comments RSS feed links to head.
	//add_theme_support( 'automatic-feed-links' );

// Let WordPress manage the document title.
// By adding theme support, we declare that this theme does not use a
// hard-coded <title> tag in the document head, and expect WordPress to
// provide it for us.
// Using the built-in seo title
	add_theme_support( 'title-tag' );

// Allow editor style.
  	add_editor_style( 'assets/css/editor-style.css' );

// Makes phone1st available for translation.
// Translations can be added to the /languages/ directory.
	 load_theme_textdomain( 'phone1st', get_template_directory() . '/languages' );

/*
* Enable support for Post Thumbnails on posts and pages.
* Set the thumbnail sizes including related posts size
* See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
*/
	add_theme_support( 'post-thumbnails' );
	//set_post_thumbnail_size( 1000, 9999 );// phon1st_post_thumbnail() as seen on the posts
	
// When using grids the content width is not usualy known so set it to the max-width or leave it out.
	if ( ! isset( $content_width ) ) {
	$content_width = 920;
}

// adding post format support
	add_theme_support( 'post-formats',
		array(
			'aside',             // no title & short
			'gallery',           // gallery of images
			'link',              // quick link to other site
			'image',             // an image
			'quote',             // a quick quote
			'status',            // a Facebook like status update
			'video',             // video
			'audio',             // audio
			'chat'               // chat transcript
		)
	);

// This theme uses wp_nav_menu() in three locations.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'phone1st' ),
		'footer-links' => esc_html__( 'Footer Menu', 'phone1st' )
	) );




/*********************
OTHER ITEMS
*********************/

// Switches default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'widgets'
	) );

// Add a `hidden` class to the search form's submit button.

function phone1st_search_form_modify( $html ) {
	return str_replace( 'class="search-submit"', 'class="search-submit hidden"', $html );
}
add_filter( 'get_search_form', 'phone1st_search_form_modify' );

// Remove the URL from the comment form
function phone1st_disable_comment_url($fields) { 
    unset($fields['url']);
    return $fields;
 }
add_filter('comment_form_default_fields','phone1st_disable_comment_url');


//Enable support for custom logo.
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 100,
		'flex-height' => true,
	) );

// Many times you don’t need the medium or the large size and even the thumbnail if you set your own size, so to prevent a cluttered image folder we could instruct WP to ignore them.
	
	function phone1st_remove_default_image_sizes( $sizes) {
	unset( $sizes['thumbnail']);
    unset( $sizes['medium']);
    unset( $sizes['large']);
     
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'phone1st_remove_default_image_sizes');


//WordPress 5 items
// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for responsive embedded content
		add_theme_support( 'responsive-embeds' );

} //phone1st_theme_support

add_action( 'after_setup_theme', 'phone1st_theme_support' );


/************* BODY CLASSES *****************/

// Add classes to the body to add more control
function phone1st_body_classes( $classes ) {

 if (is_home() ) { 
	$classes[] = 'home-template';
}
	elseif (is_category() | is_archive() | is_search() ) {

	$classes[] = 'tag-template';
}

elseif (is_author() ) {

	$classes[] = 'author-template';
}
elseif (is_page() ) {

	$classes[] = 'page-template';
}

else {
	$classes[] = 'post-template';
}
	return $classes;
}
add_filter( 'body_class', 'phone1st_body_classes' );

//estimated reading time
function phone1st_estimated_reading_time() {

  $post = get_post();

  $words = str_word_count( strip_tags( $post->post_content ) );
  $minutes = floor( $words / 120 );
  $seconds = floor( $words % 120 / ( 120 / 60 ) );

  if ( 1 <= $minutes ) {
    $estimated_time = sprintf( _n( '%d minute', '%d minutes', $minutes, 'phone1st' ), $minutes );
  } else {
    $estimated_time = sprintf( _n( '%d second', '%d seconds', $seconds, 'phone1st' ), $seconds );
  }

  return $estimated_time;

}

//The subscribe form if single call title, if page call how59
function phone1st_call_title() {
	if (is_single() ) {
	the_title();

		} else {
			echo __( get_option('blogname'), 'phone1st' );

	}
}
//the cookie consent in the comments

function tu_filter_comment_fields( $fields ) {
    $commenter = wp_get_current_commenter();

    $consent   = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

    $fields['cookies'] = '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' . '<label for="wp-comment-cookies-consent">Save my name and email in this browser, I may come back.</label></p>';

    return $fields;
}

add_filter( 'comment_form_default_fields', 'tu_filter_comment_fields', 20 );


/************* EXCERPT *****************/

/**
 * Replaces "[...]" (appended to automatically and user generated excerpts) with ... and a 'Continue reading' link.
 *
 * @since phone1st 1.0
 *
 * phone1st_excerpt_more combined below for automatic and user generated excerpts
 */
function phone1st_excerpt_more( $more ) {
  
  return ' ';
}

function phone1st_excerpt_length($length) {
  return 30;
}

function phone1st_global_excerpt($output) {
  global $post;

  return $output . sprintf( ' &hellip;', 'phone1st');
}

function phone1st_excerpt() {
  
  add_filter( 'excerpt_more', 'phone1st_excerpt_more' );
  add_filter( 'excerpt_length', 'phone1st_excerpt_length' );
  add_filter( 'the_excerpt', 'phone1st_global_excerpt' );
  return the_excerpt();
}

// To keep the excerpt_more as part of the exerpt take away the auto <p> wordpress generates
// use <p><?php echo phone1st_excerpt(); </p> - in your template

 remove_filter('the_excerpt', 'wpautop');

/************* CUSTOM LOGIN PAGE *****************/

// Customise the log-in page

function phone1st_login_css() {
	wp_enqueue_style( 'phone1st_login_css', get_template_directory_uri() . '/assets/css/login.css', false );
}

// changing the logo link from wordpress.org to your site
function phone1st_login_url() {  return home_url(); }

// changing the alt text on the logo to show your site name
function phone1st_login_title() { return get_option('blogname'); }

// calling it only on the login page
add_action( 'login_enqueue_scripts', 'phone1st_login_css', 10 );
add_filter('login_headerurl', 'phone1st_login_url');
add_filter('login_headertext', 'phone1st_login_title');
