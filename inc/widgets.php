<?php

/*
Sports Feed Profile Widget
________________________________________
*/

class Sports_Feed_Profile_Widget extends WP_Widget {

    //setup the widget name
    public function __construct(){

      $widget_ops = array(
        'classname'       => 'sports-feed-profile-widget',
        'description'     => 'Custom Sports Feed Profile Widget',
      );
      parent::__construct( 'sports_feed_profile', 'Sports Feed Profile', $widget_ops );

    }

    //function that will display backend

    public function form( $instance ){

        echo '<p>You can manage this Widget from the <a href="./admin.php?page=carlos_practice">Here!</a></p>';
    }

    //function that will display the frontend of widget

    public function widget( $args, $instance ){

      $picture = esc_attr(get_option('profile_picture'));
      $firstName = esc_attr(get_option('first_name'));
      $lastName = esc_attr(get_option('last_name'));
      $fullName = $firstName . ' ' . $lastName;

      $description = esc_attr(get_option('user_description'));

      $twitter_icon = esc_attr( get_option( 'twitter_handler') );
      $facebook_icon = esc_attr(get_option( 'facebook_handler' ) );
      $gplus_icon = esc_attr(get_option( 'gplus_handler' ) );

        echo $args['before_widget'];?>
        <div class="image-container">

          <div id="profile-picture-preview" class="profile-picture" style="background-image: url(<?php print $picture ;?>);"></div>

        </div><!-- .image-container -->

        <h1 class="sports-feed-username"><?php print $fullName; ?></h1>
        <h2 class="sports-feed-description"><?php print $description ;?></h2>

        <div class="icon-wrapper">
          <?php if( !empty( $twitter_icon ) ): ;?>
            <a href="https://twitter.com/<?php echo $twitter_icon; ?>" target="_blank"><span class="sports-feed-icon-sidebar dashicons-before dashicons-twitter"></span></a>
          <?php endif;
          if( !empty( $facebook_icon ) ): ;?>
          <a href="https://www.facebook.com/<?php echo $facebook_icon; ?>" target="_blank"><span class="sports-feed-icon-sidebar dashicons-before dashicons-facebook-alt"></span></a>
         <?php endif; ?>
       </div><!-- .icon-wrapper -->
         <?php
        echo $args['after_widget'];

    }



  }

  add_action( 'widgets_init', function(){ register_widget( 'Sports_Feed_Profile_Widget' );} );

  /*
  Edit default WordPress widgets
  _____________________________________
  */
  function sports_feed_tag_cloud_font_change( $args ) {

  	$args['smallest'] = 8;
  	$args['largest'] = 8;

  	return $args;

  }
  add_filter( 'widget_tag_cloud_args', 'sports_feed_tag_cloud_font_change' );


