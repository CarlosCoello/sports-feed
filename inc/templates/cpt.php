<?php

  $query = new WP_Query( array( 'post_type' => $atts['name'], 'posts_per_page' => $atts['quantity'] ) );

  if ( $query->have_posts() ) {
	
	while ( $query->have_posts() ) {
		$query->the_post();?>
		
              <div class="container index-posts before-load-posts">

	            <?php	get_template_part( 'template-parts/content', get_post_format() ); ?>

              </div><!-- .index-posts -->
<?php
	} ?>
    
    <div class="container index-posts ajax-container">


  </div><!-- .ajax-container -->

  <div class="container load-button text-center">
   
    <a class="btn btn-default ajax-load-posts" id="load" data-page="1" data-url="<?php echo esc_url( admin_url('admin-ajax.php') );?>" data-post-type="<?php echo $atts['name']; ?>">
      <?php esc_html_e( 'Load Posts', 'sports-feed' ) ;?>
    </a>
    
    <div class="svgcircle hide">
      <svg height="100" width="100">
        <circle cx="50" cy="50" r="40" stroke="#fff" stroke-width="3" fill="#36DBCA" />
      </svg>
    </div><!-- .svgcircle -->
    
  </div><!-- .load-button -->
  
 <?php wp_reset_postdata();
  
  } else { ?>
  
  <div class="container sorry-no-posts-message">

      <p><?php esc_html_e( 'Sorry, no posts matche your criteria.', 'sports-feed' ) ;?></p>

    </div><!-- .sorry-no-posts-message -->
    
    <?php } ?>

  

