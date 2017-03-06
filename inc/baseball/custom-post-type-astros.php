<?php

function news_feed_baseball_astros_custom_post_type(){

  $labels = array(
  'name'            => 'Astros',
  'singular_name'   => 'Astro',
  'menu_name'       => 'Astro',
  'name_admin_bar'  => 'Astro'
);

$args = array(
  'labels'          => $labels,
  'show_ui'         => true,
  'show_in_menu'    => true,
  //'query_var'       => true,
  'capability_type' => 'post',
  'hierarchical'    => false,
  'menu_position'   => 26,
  'public'          => true,
  'has_archive'     => true,
  'menu_icon'       => 'dashicons-playlist-audio',
  'taxonomies'      => array( 'post_tag', 'category' ),
  'supports'        => array( 'title', 'editor', 'thumbnail', 'excerpt', 'post-formats', 'comments' )
);

register_post_type( 'baseball-astro', $args );

}

add_action( 'init', 'news_feed_baseball_astros_custom_post_type' );



;?>
