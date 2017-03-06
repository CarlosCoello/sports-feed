<?php

function news_feed_soccer_bundesliga_custom_post_type(){

  $labels = array(
  'name'            => 'Bundesligas',
  'singular_name'   => 'Bundesliga',
  'menu_name'       => 'Bundesliga',
  'name_admin_bar'  => 'Bundesliga'
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

register_post_type( 'news-feed-bundesliga', $args );

}

add_action( 'init', 'news_feed_soccer_bundesliga_custom_post_type' );



;?>
