<?php


$class = get_query_var( 'posts-class' );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'sports-feed-format-audio', $class ) ); ?>>

   <header class="entry-header text-center">
    
     <?php the_title( '<h1 class="entry-title"><a href="'.esc_url( get_permalink() ).'" rel="bookmark">', '</a></h1>' ); ?>
     
     <div class="entry-meta">
      
       <?php echo sports_feed_posted_meta(); ?>
       
     </div><!-- .entry-meta -->
     
   </header><!-- .entry-header -->
   
   <div class="entry-content">
    
     <?php echo sports_feed_get_embedded_media( array( 'audio', 'iframe') ); ?>

   </div><!-- .entry-content -->

 </article><!-- .sports-feed-format-audio -->
