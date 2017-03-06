<?php

function news_feed_skateboarding_chocolate_custom_post_type(){

  $labels = array(
  'name'            => 'Chocolates',
  'singular_name'   => 'Chocolate',
  'menu_name'       => 'Chocolate',
  'name_admin_bar'  => 'Chocolate'
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

register_post_type( 'skateboarding-choco', $args );

}

add_action( 'init', 'news_feed_skateboarding_chocolate_custom_post_type' );



;?>
