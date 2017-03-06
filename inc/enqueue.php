<?php

/*
ENQUEUE STYLESHEETS AND SCRIPTS FOR BACKEND ADMIN
___________________________________________________
*/

function sports_feed_admin_enqueue_style_scripts( $hook ){



  if( 'toplevel_page_sports_feed' == $hook ){
    
    wp_enqueue_style( 'sports-feed-admin', get_template_directory_uri() . '/css/sports.feed.admin.css', array(), '1.0', 'all' );

    wp_enqueue_media();
    wp_enqueue_script( 'sports-feed-admin-js', get_template_directory_uri() . '/js/sports.feed.admin.js', array('jquery'), '1.0', true );
    
  }

}

add_action( 'admin_enqueue_scripts', 'sports_feed_admin_enqueue_style_scripts' );

/*
ENQUEUE STYLESHEETS AND SCRIPTS FOR FRONTEND
_________________________________________________
*/

function sports_feed_enqueue_style_scripts(){

  wp_enqueue_style( 'dashicons' );
  wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7', 'all');
  wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/css/animate.css', array(), '3.5.1', 'all' );
  wp_enqueue_style( 'main-css', get_template_directory_uri() . '/css/main.css', array(), '1.0', 'all' );

  wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '3.3.7', true);
  wp_enqueue_script( 'ajax', get_template_directory_uri() . '/js/ajax.js', array( 'jquery' ), '1.0', true );
  wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '1.0', true );

}

add_action( 'wp_enqueue_scripts', 'sports_feed_enqueue_style_scripts' );

