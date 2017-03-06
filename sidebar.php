<?php

  /*
  Sidebar
  _____________________________________
  */

  if ( !is_active_sidebar( 'sports-feed-sidebar' ) ){

      return;

  }

  ?>

  <aside id="secondary" class="widget-area" role="complementary">

    <?php dynamic_sidebar( 'sports-feed-sidebar' );?>

  </aside>
