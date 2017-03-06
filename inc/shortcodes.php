<?php

/*
Custom Post Type Shortcode
____________________________________
*/

function sports_feed_cpt( $atts, $content = null ) {
	
	//[contact_loop name="" quantity=""]
	
	//get the attributes
	$atts = shortcode_atts(
		array(
		  'name'     => '',
          'quantity' => '',
		),
		$atts,
		'custom_loop'
	);
	
	//return HTML
	ob_start();
	include 'templates/cpt.php';
	return ob_get_clean();
	
}
add_shortcode( 'custom_loop', 'sports_feed_cpt' );


/*
Front Posts Shortcode
______________________________________________
*/

function sports_feed_front_posts( $atts, $content = null ) {
	
	//[front_posts name=""]
	
	//get the attributes
	$atts = shortcode_atts(
		array(
		  'name'     => '',
		),
		$atts,
		'front_posts'
	);
	
	//return HTML
	ob_start();
	include 'templates/frontposts.php';
	return ob_get_clean();
	
}
add_shortcode( 'front_posts', 'sports_feed_front_posts' );


/*
Contact Form Shortcode
________________________________________________
*/

function sports_feed_contact_form( $atts, $content = null ) {
	
	//[contact_form]
	
	//get the attributes
	$atts = shortcode_atts(
		array(),
		$atts,
		'contact_form'
	);
	
	//return HTML
	ob_start();
	include 'templates/contact-form.php';
	return ob_get_clean();
	
}
add_shortcode( 'contact_form', 'sports_feed_contact_form' );