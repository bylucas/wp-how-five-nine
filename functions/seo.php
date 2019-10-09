<?php

/*************************************************************
BASIC WP SEO - http://digwp.com/2013/08/basic-wp-seo/
*************************************************************/
/*
  Usage: 
    1. replace the $default_keywords with your own
    2. add <?php echo phone1st_seo(); ?> to the header - already added to templates/head-meta.php
    3. test well and fine tune as needed

  Optional: add custom description, keywords, and/or title
  to any post or page using these custom field keys (recommended):

    mm_seo_desc
    mm_seo_keywords
    mm_seo_title

  To migrate from any SEO plugin, replace its custom field 
  keys with those listed above:

  NOTE: I Have altered the code slightly from the original, (See the digwp.com website to view the original seo.php), first I moved the title up so that it shows first in the header before the description and keywords. Moving the title causes an error on the home/front page - no $description. I moved $description up into the title area.

  The home/front page was set to show blog name and blog description and using the mm_seo_title custom field was ignored on the home/front page. I have altered this to show the mm_seo_title custom field. see the if (is_home() || is_front_page()) below. I would always recommend you take control of the SEO by using the custom fields. The original line is still there (commented out) should you wish to use the original.
  This is a really good and light Seo function but test it well as the author at http://digwp.com recommends.
*/
function phone1st_seo() {
  global $wp, $page, $paged, $post;
  $default_keywords = 'wordpress, themes, design, development, php, html, css, jquery, scss, phone1st'; // customize
  $output = '';

  $post_id = $post;
  // title
  $title_custom = get_post_meta($post_id, 'mm_seo_title', true);
  $url = ltrim(esc_url($_SERVER['REQUEST_URI']), '/');
  $name = get_bloginfo('name', 'display');
  $title = trim(wp_title('', false));
  $cat = single_cat_title('', false);
  $tag = single_tag_title('', false);
  $search = get_search_query();
  $description = get_bloginfo('description', 'display');// See Note
  $src = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), false, '' );
  $current_url = home_url(add_query_arg(array(),$wp->request));

  if (!empty($title_custom)) $title = $title_custom;
  if ($paged >= 2 || $page >= 2) $page_number = ' | ' . sprintf('Page %s', max($paged, $page));
  else $page_number = '';

  // if (is_home() || is_front_page()) $seo_title = $name . ' | ' . $description; see note
  if (is_home() || is_front_page()) $seo_title = $title;//see note
  elseif (is_singular())            $seo_title = $title . ' | ' . $name;
  elseif (is_tag())                 $seo_title = 'Tag Archive: ' . $tag . ' | ' . $name;
  elseif (is_category())            $seo_title = 'Category Archive: ' . $cat . ' | ' . $name;
  elseif (is_archive())             $seo_title = 'Archive: ' . $title . ' | ' . $name;
  elseif (is_search())              $seo_title = 'Search: ' . $search . ' | ' . $name;
  elseif (is_404())                 $seo_title = '404 - Not Found: ' . $url . ' | ' . $name;
  else                              $seo_title = $name . ' | ' . $description;

  $output .= "\t\t" . '<title>' . esc_attr($seo_title . $page_number) . '</title>' . "\n";


  // description
  $seo_desc = get_post_meta($post_id, 'mm_seo_desc', true);
  // $description = get_bloginfo('description', 'display'); see not at top
  $pagedata = get_post($post_id);
  if (is_singular()) {
    if (!empty($seo_desc)) {
      $content = $seo_desc;
    } else if (!empty($pagedata)) {
      $content = apply_filters('the_excerpt_rss', $pagedata->post_content);
      $content = substr(trim(strip_tags($content)), 0, 155);
      $content = preg_replace('#\n#', ' ', $content);
      $content = preg_replace('#\s{2,}#', ' ', $content);
      $content = trim($content);
    } 
  } else {
    $content = $description;  
  }
  $output .= '<meta name="description" content="' . esc_attr($content) . '">' . "\n";

  // keywords
  $keys = get_post_meta($post_id, 'mm_seo_keywords', true);
  $cats = get_the_category();
  $tags = get_the_tags();
  if (empty($keys)) {
    if (!empty($cats)) foreach($cats as $cat) $keys .= $cat->name . ', ';
    if (!empty($tags)) foreach($tags as $tag) $keys .= $tag->name . ', ';
    $keys .= $default_keywords;
  }
  $output .= "\t\t" . '<meta name="keywords" content="' . esc_attr($keys) . '">' . "\n";

  //Social
  $output .= "\t\t" . '<meta property="og:site_name" content="' . esc_attr($name) . '" />' . "\n";
  $output .= "\t\t" . '<meta property="og:type" content="website" />' . "\n";
  $output .= "\t\t" . '<meta name="property="og:title" content="' . esc_attr($seo_title . $page_number) . '">' . "\n";
  $output .= '<meta property="og:description" content="' . esc_attr($content) . '">' . "\n";
  $output .= "\t\t" . '<meta property="og:url" content="' . esc_attr($current_url) . '">' . "\n";
  $output .= "\t\t" . '<meta property="og:image" content="' . esc_attr($src[0]) . '">' . "\n";
  $output .= "\t\t" . '<meta property="og:image:width" content="580"/>' . "\n";
  $output .= "\t\t" . '<meta property="og:image:height" content="296"/>' . "\n";

//Twitter
$output .= "\t\t" . '<meta name="twitter:card" content="summary_large_image" />' . "\n";
$output .= "\t\t" . '<meta name="twitter:title" content="' . esc_attr($seo_title . $page_number) . '">' . "\n";
$output .= '<meta name="twitter:description" content="' . esc_attr($content) . '">' . "\n";
$output .= "\t\t" . '<meta name="twitter:url" content="' . esc_attr($current_url) . '">' . "\n";
$output .= "\t\t" . '<meta name="twitter:image:src" content="' . esc_attr($src[0]) . '">' . "\n";
  



  // robots
  if (is_category() || is_tag()) {
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    if ($paged > 1) {
      $output .=  "\t\t" . '<meta name="robots" content="noindex,follow">' . "\n";
    } else {
      $output .=  "\t\t" . '<meta name="robots" content="index,follow">' . "\n";
    }
  } else if (is_home() || is_singular()) {
    $output .=  "\t\t" . '<meta name="robots" content="index,follow">' . "\n";
  } else {
    $output .= "\t\t" . '<meta name="robots" content="noindex,follow">' . "\n";
  }

  return $output;
}

/*
So that’s it, just enter your default keywords and then call the function by including this tag in the <head> section of your pages (e.g., header.php):
The theme already has the function below in templates/head-meta.php

<?php echo phone1st_seo(); ?>
*/
?>