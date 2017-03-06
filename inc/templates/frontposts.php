<div class="container">

  <?php

  
  $query1 = new WP_Query( array( 'post_type' => $atts['name'], 'posts_per_page' => 4 ) );

  if ( $query1->have_posts() ) { 
    
   $post_type = get_post_type_object( $atts['name'] ); ?>
   
    <header class="title-h1">
    
    <h1><?php esc_html_e( $post_type->labels->name, 'sports-feed' ) ;?><?php echo esc_html( ' - ' ) ;?><?php esc_html_e( 'recent posts', 'sports-feed' ) ;?></h1>
    
    </header><!-- header -->
    
  <?php
  	
     $i = 1;

  	while ( $query1->have_posts() ) {
  		$query1->the_post();

       if( $i % 2 != 0) { ;?>
        <div class="row">
          <?php } ; ?>

      <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="front-blog">

        <?php get_template_part( 'template-parts/content', get_post_format() );?>
        
      </div><!-- .front-blog -->
    </div><!-- .col-xs-12 -->

      <?php
        if( $i % 2 == 0 ) { ?>
        </div><!-- .row -->
          <?php }
          $i++;
    }

  	wp_reset_postdata();
  }
  ?>

</div><!-- .container -->
