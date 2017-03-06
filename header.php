<!DOCTYPE html>
<html <?php language_attributes( ); ?>>
<head>
  <title><?php bloginfo( 'name' ); wp_title();?></title>
  <meta name="description" content="<?php bloginfo( 'description' );?>">
  <meta charset="<?php bloginfo( 'charset' ) ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php if(  is_singular() && pings_open( get_queried_object() ) ): ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php endif; ?>
  <?php wp_head();?>
</head>

<body <?php body_class(); ?>>


<div class="sports-feed-sidebar sidebar-closed">
  <div class="sports-feed-sidebar-container">
    <a class="js-toggleSidebar sidebar-close">
      <span class="dashicons dashicons-no sports-feed-close"></span>
    </a>
  <div class="sidebar-scroll">
    <?php get_sidebar(); ?>
  </div>
</div><!-- .sports-feed-sidebar-container -->
</div><!-- .sports-feed-sidebar -->
<div class="sidebar-overlay">

</div>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar top-bar"></span>
            <span class="icon-bar middle-bar"></span>
            <span class="icon-bar bottom-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( bloginfo( 'title' ) ) ;?></a>
      </div><!-- .navbar-header -->
      <?php wp_nav_menu( array(
                    'theme_location'       => 'primary',
                    'container'            => 'div',
                    'container_class'      => 'collapse navbar-collapse',
                    'container_id'         => 'bs-example-navbar-collapse-1',
                    'menu_class'           => 'nav navbar-nav',
                    'fallback_cb'          => 'wp_bootstrap_navwalker::fallback',
                    'walker'               => new wp_bootstrap_navwalker()
                ) ); ?>
    </div><!-- .container -->
  </nav>
  <div class="sidebar-button">
    <a class="js-toggleSidebar sidebar-open">
      <span class="open-sidebar"><?php esc_html_e( 'Open-S', 'sports-feed' ) ;?></span>
    </a>
  </div>
