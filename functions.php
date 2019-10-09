<?php
//Functions

require get_template_directory() .'/functions/theme-support.php';
require get_template_directory() .'/functions/cleanup.php';
require get_template_directory() .'/functions/scripts-fonts.php';
require get_template_directory() .'/functions/seo.php';
require get_template_directory() .'/functions/search-action.php';
require get_template_directory() .'/functions/meta-tags.php';
require get_template_directory() .'/functions/infinite-scroll.php';
require get_template_directory() .'/functions/related-posts.php';
require get_template_directory() .'/functions/comments-layout.php';

require get_template_directory() .'/functions/admin/admin-user.php';
require get_template_directory() .'/functions/admin/admin-category.php';
require get_template_directory() .'/functions/admin/admin-welcome.php';

require get_template_directory() .'/customizer/customizer.php';
?>