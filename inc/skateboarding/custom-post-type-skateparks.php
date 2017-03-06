<?php

function news_feed_skateboarding_skatepark_custom_post_type(){

  $labels = array(
  'name'            => 'Skateparks',
  'singular_name'   => 'Skatepark',
  'menu_name'       => 'Skatepark',
  'name_admin_bar'  => 'Skatepark'
);

$args = array(
  'labels'          => $labels,
  'show_ui'         => true,
  'show_in_menu'    => true,
  'capability_type' => 'post',
  'hierarchical'    => false,
  'menu_position'   => 26,
  'public'          => true,
  'has_archive'     => true,
  'menu_icon'       => 'dashicons-welcome-learn-more',
  'taxonomies'      => array( 'post_tag', 'category' ),
  'supports'        => array( 'title', 'editor', 'thumbnail', 'excerpt', 'post-formats', 'comments' )
);

register_post_type( 'skateboarding-park', $args );

}

add_action( 'init', 'news_feed_skateboarding_skatepark_custom_post_type' );



;?>
