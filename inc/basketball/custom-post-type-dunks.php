<?php

function news_feed_basketball_dunk_custom_post_type(){

  $labels = array(
  'name'            => 'Dunks',
  'singular_name'   => 'Dunk',
  'menu_name'       => 'Dunk',
  'name_admin_bar'  => 'Dunk'
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

register_post_type( 'basketball-dunk', $args );

}

add_action( 'init', 'news_feed_basketball_dunk_custom_post_type' );



;?>
