<?php

/*
Adding Post Formats
___________________________________________
*/

  $options = get_option( 'post_formats' );
  $formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
  $output = array();
  foreach ( $formats as $format ) {
    $output[] = ( @$options[ $format ] == 1 ? $format : '' );
  }

  if( !empty( $options ) ){

    add_theme_support( 'post-formats', $output );

  }


/*
Adding Custom Header
_____________________________________________
*/

  $header = get_option('custom_header');
  if( @$header == 1 ){
    add_theme_support( 'custom-header' );
  }

/*
Adding Custom Background
____________________________________________
*/

  $background = get_option('custom_background');
  if( @$background == 1 ){
    add_theme_support( 'custom-background' );
  }

/*
Adding Post Thumbnails
______________________________________________
*/

add_theme_support( 'post-thumbnails' );

/*
Register Nav Menu's
___________________________________________
*/

  function sports_feed_register_nav_menu(){

    register_nav_menus( array(
  	'primary'    => 'Header Navigation Menu',
  	'footer_one' => 'Footer Nav One',
    'footer_two' => 'Footer Nav Two',
  ) );

  }

add_action( 'after_setup_theme', 'sports_feed_register_nav_menu' );

/*
Adding HTML5 Support
________________________________________
*/

add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

/*
Footer Copyright
__________________________________________
*/

function sports_feed_copyright() {

global $wpdb;

$copyright_dates = $wpdb->get_results("

SELECT
YEAR(min(post_date_gmt)) AS firstdate,
YEAR(max(post_date_gmt)) AS lastdate
FROM

$wpdb->posts

WHERE
post_status = 'publish'
");

$output = '';

if($copyright_dates) {

$copyright = "&copy; " . $copyright_dates[0]->firstdate;

if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {

$copyright .= '-' . $copyright_dates[0]->lastdate;

}

$output = $copyright;

}

return $output;

}


/*
Sidebar
______________________________________
*/

function sports_feed_sidebar_init(){

  register_sidebar( $args = array(
    'name' => esc_html__( 'Sports Feed Sidebar', $domain = 'sports Feed' ),
    'id' => 'sports-feed-sidebar',
    'description' => 'Dynamic right sidebar',
    'before_widget' => '<section id="%1$s" class="sports-feed-widget %2$s">',
    'after_widget' => '</section>',
    'before_title' => '<h2 class="sports-feed-widget-title">',
    'after_title' => '</h2>'
  ) );

}

add_action( 'widgets_init', 'sports_feed_sidebar_init' );

/*
Blog Loop Custom Functions
________________________________________
*/

function sports_feed_posted_meta(){

  $posted_on = human_time_diff( get_the_time( 'U'), current_time( 'timestamp') );
  $categories = get_the_category();
  $separator = ', ';
  $output = '';
  $i = 1;

  if ( !empty( $categories ) ){

    foreach ($categories as $category) {
      if( $i > 1 ){
        $output .= $separator;
      }
      $output .= '<a href="'.esc_url( get_category_link( $category->term_id ) ).'" alt="'.esc_attr( 'View all posts in%s', $category->name ).'">'.esc_html( $category->name ).'</a>';
      $i++;
    }

  }

  return '<span class="posted-on">Posted <a href="'.esc_url( get_permalink() ).'">'. $posted_on .'</a>ago</span>/<span class="posted-in">'. $output .'</span>';

}

/*
Audio Post Format Custom Function
__________________________________________
*/

function sports_feed_get_embedded_media( $type = array() ){

  $content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
  $embed = get_media_embedded_in_content( $content, $type );
  if( in_array( 'audio', $type ) ){
  $output = str_replace( '?visual=true', '?visual=false', $embed[0] );
} else {
  $output = $embed[0];
}

  return $output;

}

/*
Video Post Format Custom Function
____________________________________________
*/

function sports_feed_get_attachment( $num = 1 ){

  $output = '';
  if( has_post_thumbnail() && $num == 1 ):
   $output = wp_get_attachment_url( get_post_thumbnail_id( get_the_id() ) );
 else:

  $attachments = get_posts( array(
       'post_type'        => 'attachment',
       'posts_per_page'   => $num,
       'post_parent'      => get_the_id()
   ) );

   if( $attachments && $num == 1 ):
     foreach( $attachments as $attachment ):
       $output = wp_get_attachment_url( $attachment->ID );
     endforeach;
     elseif( $attachments && $num > 1 ):
       $output = $attachments;
   endif;

   wp_reset_postdata();

 endif;

   return $output;

}

function sports_feed_grab_url(){
  if( ! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/i', get_the_content(), $links ) ){
      return false;
  }

  return esc_url_raw( $links[1] );
}

/*
Navigation
_________________________________________
*/

function sports_feed_post_navigation(){

  $nav = '<div class="row">';

  $prev = get_previous_post_link( '<div class="post-link-nav-left"><span class="dashicons dashicons-arrow-left-alt2"></span>%link</div>', '%title' );
  $nav .= '<div class="col-xs-12 col-sm-6">'.$prev.'</div>';

  $next = get_next_post_link( '<div class="post-link-nav-right">%link<span class="dashicons dashicons-arrow-right-alt2"><span></div>', '%title' );
  $nav .= '<div class="col-xs-12 col-sm-6 text-right">'.$next.'</div>';

  $nav .= '</div>';

  return $nav;

}

/*

Multilanguage 
_______________________________________________
*/

 function my_theme_load_theme_textdomain() {
  load_theme_textdomain( 'sports-feed', get_template_directory() . '/languages' );
  }
  add_action( 'after_setup_theme', 'my_theme_load_theme_textdomain' );


