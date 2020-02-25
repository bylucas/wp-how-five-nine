<?php
 // =======================
 // Searchform
 // =======================
 
?>
    <div class="search-inner">
        <form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>">
                <label for="s">Search <?php bloginfo( 'name' ); ?>...</label>
                <input type="text" id="s" name="s" onkeyup="fetch()" autocomplete="off" placeholder="" />

                <input type="submit" id="searchsubmit" value="search" />
        </form>
</div>