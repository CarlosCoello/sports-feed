
  <footer>
   
    <div class="container-fluid">
     
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-sm-pull-2 col-md-pull-1">


          <?php wp_nav_menu( array(
                        'theme_location'       => 'footer_one',
                        'container'            => 'div',
                    ) ); ?>


        </div><!-- .col-md-pull-1 -->
        <div class="col-xs-12 col-sm-12 col-sm-push-2 col-md-6 col-md-push-1">

          <?php wp_nav_menu( array(
                        'theme_location'       => 'footer_two',
                        'container'            => 'div',
                    ) ); ?>

        </div><!-- .col-md-push-1 -->
      </div><!-- .row -->
      
    </div><!-- .container-fluid -->
    
    <div class="container-fluid">
     
      <div class="copyright-footer text-center">
       
        <h5><span class="dashicons dashicons-admin-home"></span> <?php esc_html_e( 'Sports Feed', 'sports-feed' ) ;?> <?php echo sports_feed_copyright(); ?></h5>
        
      </div><!-- copyright-footer -->
      
      <?php
        $url1 = 'http://www.flaticon.com/authors/vectors-market';
        $url2 = 'http://www.flaticon.com';
        $url3 = 'http://creativecommons.org/licenses/by/3.0/';
       ?>
       
      <div class="text-center">
       
        <?php esc_html_e( 'Icons made by', 'sports-feed' ) ;?>
         <a href="<?php echo esc_url( $url1 ) ;?>" title="Vectors Market">
           <?php echo esc_html( 'Vectors Market' ) ;?>
         </a>
         <?php esc_html_e( 'from', 'sports-feed' ) ;?>
         <a href="<?php echo esc_url( $url2 ) ;?>" title="Flaticon">
           <?php echo esc_html( 'www.flaticon.com' ) ;?>
         </a>
         <?php esc_html_e( 'is licensed by', 'sports-feed' ) ;?>
         <a href="<?php echo esc_url( $url3 ) ;?>" title="Creative Commons BY 3.0" target="_blank">
           <?php echo esc_html( 'CC 3.0 BY' ) ;?>
         </a>
         
      </div><!-- .text-center -->
         
    </div><!-- .conatiner-fluid -->
    
  </footer><!-- footer -->

<?php wp_footer(); ?>

 </body><!-- body -->
 
</html><!-- html -->
