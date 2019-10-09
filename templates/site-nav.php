<nav class="site-nav">
    <div class="site-nav-left">
            <?php
            // Display the Custom Logo
            the_custom_logo(); ?>
            <a class="site-nav-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
        <?php bloginfo( 'name' ); ?>
      </a>   
    </div>
    <div class="site-nav-right">
       <ul class="toggles" id="header-list">
              <li class="search-icon">
                <a class="search-toggle">
                  <svg width="25" height="24">
                    <defs>
                    <clipPath id="clip-path"><rect class="cls-1" x="-1554.07" y="-46.22" width="25" height="24"/></clipPath>
                    </defs>
                    <circle class="cls-3" cx="14.07" cy="10.94" r="9.7"/><line class="cls-3" x1="1.56" y1="24.04" x2="7.52" y2="18.08"/>
                    </svg>
                    <div class="line-container">
                      <span class="toggle-line"></span>
                      <span class="toggle-line"></span>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="offcanvas-toggle" href="#">
                    <span class="toggle-line"></span>
                    <span class="toggle-line"></span>
                    <span class="toggle-line"></span>
                  </a>
                </li>
              </ul> 
        
    </div>
</nav>
