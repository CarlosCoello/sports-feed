<?php

$class = get_query_var( 'posts-class' );


 ?>

 <article id="post-<?php the_ID(); ?>" <?php post_class( array( 'sports-feed-format-image', $class ) ); ?>>

   <header class="entry-header text-center background-image" style="background-image: url(<?php echo  sports_feed_get_attachment(); ?>)">
    
     <?php the_title( '<h1 class="entry-title"><a href="'.esc_url( get_permalink() ).'" rel="bookmark">', '</a></h1>' ); ?>
     
     <div class="entry-meta">
      
       <?php echo sports_feed_posted_meta(); ?>
       
     </div><!-- .entry-meta -->
     
     <div class="entry-excerpt image-caption">
      
       <?php the_excerpt(); ?>
       
     </div><!-- .entry-excerpt -->
     
   </header><!-- .entry-header -->

 </article><!-- .sports-feed-format-image -->
