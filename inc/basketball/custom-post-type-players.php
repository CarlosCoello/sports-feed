<?php

function news_feed_basketball_players_custom_post_type(){

  $labels = array(
  'name'            => 'Players',
  'singular_name'   => 'Player',
  'menu_name'       => 'Player',
  'name_admin_bar'  => 'Player'
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
  'menu_icon'       => 'dashicons-admin-appearance',
  'taxonomies'      => array( 'post_tag', 'category' ),
  'supports'        => array( 'title', 'editor', 'thumbnail', 'excerpt', 'post-formats', 'comments' )
);

register_post_type( 'basketball-player', $args );

}

add_action( 'init', 'news_feed_basketball_players_custom_post_type' );



;?>
