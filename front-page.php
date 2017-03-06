<?php get_header(); ?>

<div class="container-fluid front-hero">

  <?php the_post_thumbnail(); ?>

  <div class="front-image-overlay">

  </div><!-- .front-image-overlay -->
  
  <div class="hero-text">
  
  <h1><span style="color: #fff;"><?php esc_html_e( 'Training', 'sports-feed' ) ;?></span><?php echo esc_html( ' +' ) ;?> <span style="color: #fff"><?php esc_html_e( 'Practice', 'sports-feed' ) ;?></span> = <span style="color: #43c0f6;"><?php esc_html_e( 'Play!', 'sports-feed' ) ;?></span></h1>
  
  </div><!-- .hero-text -->
  
</div><!-- .front-hero -->

<?php the_content(); ?>

<?php get_footer();?>
