<?php
// Primary Menu Template
// =======================

?>

<nav id="main-menu" class="offcanvas-nav" role="navigation">
    <div class="menu-wrap">
      <p>
        <?php bloginfo( 'description' ); ?>
      </p>

      <?php if ( has_nav_menu( 'primary' ) ) : ?>
        <nav id="site-navigation" class="nav-menu" role="navigation">

          <?php wp_nav_menu( array(
  'theme_location' => 'primary',
  'container' => 'false',
  'menu_id' => '',
  'menu_class' => ''
  ) );
  ?>
        </nav>
        <?php endif; ?>

          <?php get_template_part('templates/social'); ?>
    </div>
    <!-- menu-wrap -->
  </nav>
