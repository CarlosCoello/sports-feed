<?php

function news_feed_soccer_premier_custom_post_type(){

  $labels = array(
  'name'            => 'Premiers',
  'singular_name'   => 'Premier',
  'menu_name'       => 'Premier',
  'name_admin_bar'  => 'Premier'
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
  'menu_icon'       => 'dashicons-awards',
  'taxonomies'      => array( 'post_tag', 'category' ),
  'supports'        => array( 'title', 'editor', 'thumbnail', 'excerpt', 'post-formats', 'comments' )
);

register_post_type( 'news-feed-premier', $args );

}

add_action( 'init', 'news_feed_soccer_premier_custom_post_type' );



;?>
