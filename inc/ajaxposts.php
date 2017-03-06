<?php

add_action( 'wp_ajax_load_the_posts', 'load_the_posts' );
add_action( 'wp_ajax_nopriv_load_the_posts', 'load_the_posts' );

function load_the_posts(){

  $paged = $_POST["page"]+1;
  $custompost = $_POST["post"];

  $query = new WP_Query(
    array( 'post_type'      => $custompost,
           'paged'          => $paged
         )
       );

  if ( $query->have_posts() ) {
	// The Loop
	while ( $query->have_posts() ) {
		$query->the_post();

		get_template_part( 'template-parts/content', get_post_format() );

	}
}
wp_reset_postdata();
die();

}

add_action( 'wp_ajax_sports_feed_save_user_contact_form', 'sports_feed_save_user_contact_form' );
add_action( 'wp_ajax_nopriv_sports_feed_save_user_contact_form', 'sports_feed_save_user_contact_form' );

function sports_feed_save_user_contact_form(){

  if (
      ! isset( $_POST['sports_feed_nonce_field'] )
      || ! wp_verify_nonce( $_POST['sports_feed_nonce_field'], 'sports_feed_my_action' )
  ) {

     print 'Sorry, your nonce did not verify.';
     exit;

  } else {

     // process form data

  $name = wp_strip_all_tags( $_POST["name"] );
  $email = wp_strip_all_tags( $_POST["email"] );
  $message = wp_strip_all_tags( $_POST["message"] );

      $args = array(
        'post_title'    => $name,
        'post_content'  => $message,
        'post_author'   => 1,
        'post_status'   => 'publish',
        'post_type'     => 'news-feed-contact',
        'meta_input'    => array(
            '_contact_email_value_key' => $email
        )
      );

    $postID =  wp_insert_post( $args );

    if($postID !== 0){
      $to = get_bloginfo( 'admin_email' );
      $subject = 'Email from '. $name;
      $headers[] = 'From: '. get_bloginfo('name') . '<'.$to.'>';
      $headers[] = 'Reply-To: '.$name.'<'.$email.'>';
      $headers[] = 'Content-Type: text/html: charset=UTF-8';
      //$message = file_get_contents(TEMPLATEPATH . '/inc/hero.php');
      $message = $message;
      wp_mail( $to, $subject, $message, $headers );

    } else {
      echo 0;
    }


    echo $postID;

  die();
 }
}
?>
