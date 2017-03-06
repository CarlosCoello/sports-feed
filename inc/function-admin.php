<?php

/*
Admin Page Menu, Submenu, Register, Sections, Fields
_________________________________________________
*/

function sports_feed_add_admin_page(){

  //Generate Admin Page
  add_menu_page( 'sports Feed Options', 'sports', 'manage_options', 'sports_feed', 'sports_feed_website_menu_page', 'dashicons-analytics', 101);

  //Generat Admin Subpages
  add_submenu_page( 'sports_feed', 'Sidebar Options', 'Sidebar', 'manage_options', 'sports_feed', 'sports_feed_website_menu_page' );
  add_submenu_page( 'sports_feed', 'Theme Options', 'Theme Options', 'manage_options', 'sports_feed_theme', 'sports_feed_theme_sub_page' );
  add_submenu_page( 'sports_feed', 'Contact Form', 'Contact Form', 'manage_options', 'sports_feed_contact', 'sports_feed_contact_sub_page' );

  //Activate Custom script_concat_settings
  add_action( 'admin_init', 'sports_feed_custom_Settings' );
}

add_action( 'admin_menu', 'sports_feed_add_admin_page' );

function sports_feed_custom_Settings(){

  //Sidebar Options Regiter Setting
  register_setting( 'sports-feed-settings-group', 'profile_picture' );
  register_setting( 'sports-feed-settings-group', 'first_name' );
  register_setting( 'sports-feed-settings-group', 'last_name' );
  register_setting( 'sports-feed-settings-group', 'user_description' );
  register_setting( 'sports-feed-settings-group', 'twitter_handler', 'sports_feed_sanitize_twitter_handler' );
  register_setting( 'sports-feed-settings-group', 'facebook_handler' );

  //Sidebar Options Section and Field
  add_settings_section( 'sports-feed-sidebar-option', 'Sidebar Options', 'sports_feed_sidebar_options', 'sports_feed' );
  add_settings_field( 'sidebar-profile-picture', 'Profile Picture', 'sports_feed_profile_picture', 'sports_feed', 'sports-feed-sidebar-option' );
  add_settings_field( 'sidebar-name', 'Full Name', 'sports_sidebar_name', 'sports_feed', 'sports-feed-sidebar-option' );
  add_settings_field( 'sidebar-description', 'Description', 'sports_feed_sidebar_description', 'sports_feed', 'sports-feed-sidebar-option' );
  add_settings_field( 'sidebar-twitter', 'Twitter Handler', 'sports_feed_sidebar_twitter', 'sports_feed', 'sports-feed-sidebar-option' );
  add_settings_field( 'sidebar-facebook', 'Facebook Handler', 'sports_feed_sidebar_facebook', 'sports_feed', 'sports-feed-sidebar-option' );

  //Theme Support Options Register Settings
  register_setting( 'sports-feed-theme-support', 'post_formats' );
  register_setting( 'sports-feed-theme-support', 'custom_header' );
  register_setting( 'sports-feed-theme-support', 'custom_background' );

  //Theme Support Options Section and Field
  add_settings_section( 'sports-feed-theme', 'Theme Support Options', 'sports_feed_theme_support_options', 'sports_feed_theme' );
  add_settings_field( 'post-formats', 'Post Formats', 'sports_feed_post_formats', 'sports_feed_theme', 'sports-feed-theme' );
  add_settings_field( 'custom-header', 'Custom Header', 'sports_feed_custom_header', 'sports_feed_theme', 'sports-feed-theme' );
  add_settings_field( 'custom-background', 'Custom Background', 'sports_feed_cutom_background', 'sports_feed_theme', 'sports-feed-theme' );

  //Contact Form Register Settings
  register_setting( 'sports-feed-contact-options', 'activate_contact' );

  //Contact Form Section and Field
  add_settings_section( 'sports-feed-contact-section', 'Contact Form', 'sports_feed_contact_section', 'sports_feed_contact' );
  add_settings_field( 'activate-form', 'Activate Contact Form', 'sports_feed_activate_contact', 'sports_feed_contact', 'sports-feed-contact-section' );

}

/* Add Admin Page Functions */

function sports_feed_website_menu_page(){

  require_once( get_template_directory() . '/inc/templates/sports-feed-admin.php' );

}

function sports_feed_theme_sub_page(){

  require_once( get_template_directory() . '/inc/templates/sports-feed-theme-support.php' );

}

function sports_feed_contact_sub_page(){

  require_once( get_template_directory() . '/inc/templates/sports-feed-contact-form.php' );

}

/* Custom Settings Functions */

function sports_feed_sidebar_options(){

  echo 'Customize your sidebar!';

}

function sports_feed_profile_picture(){

  $picture = esc_attr( get_option( 'profile_picture' ) );

  if( empty( $picture ) ){
    echo '<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button" /> <input type="hidden" id="profile-picture" name="profile_picture" value="" />';
  } else {
    echo '<input type="button" class="button button-secondary" value="Replace Profile Picture" id="upload-button" /> <input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" /> <input type="button" class="button button-secondary" value="Remove" id="remove-picture">';
  }

}

function sports_sidebar_name(){

  $firstName = esc_attr( get_option( 'first_name' ) );
  $lastName = esc_attr( get_option( 'last_name' ) );
  echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name"/> <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name"/>';

}

function sports_feed_sidebar_description(){

  $description = esc_attr( get_option( 'user_description' ) );
  echo '<input type="text" name="user_description" value="'.$description.'" placeholder="Description" /> <p class="description">Type a brief description of yourself</p>';

}

function sports_feed_sidebar_twitter(){

  $twitter = esc_attr( get_option( 'twitter_handler' ) );
  echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter Handler" /> <p class="description">Type your Twitter Handler without the @ character</p>';

}

function sports_feed_sidebar_facebook(){

  $facebook = esc_attr( get_option( 'facebook_handler' ) );
  echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook Handler" />';

}

function sports_feed_theme_support_options(){

  echo 'Activate and Deactivate specific Theme Support Options';

}

function sports_feed_post_formats(){

  $options = get_option( 'post_formats' );
  $formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
  $output = '';
  foreach ( $formats as $format ) {
    $checked = ( @$options[ $format ] == 1 ? 'checked' : '' );
    $output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.' />'.$format.'</label><br>';
  }

  echo $output;

}

function sports_feed_custom_header(){

  $options = get_option( 'custom_header' );
  $checked =( @$options == 1 ? 'checked' : '' );
  echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.'/> Activate the custom header</label>';

}

function sports_feed_cutom_background(){

  $options = get_option( 'custom_background' );
  $checked = ( @$options == 1 ? 'checked' : '' );
  echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.'/> Activate the custom background</label>';

}

/* Sanitize Settings */

function sports_feed_sanitize_twitter_handler( $input ){

  $output = sanitize_text_field( $input );
  $output = str_replace( '@', '', $output );
  return $output;

}

function sports_feed_contact_section(){

  echo '<p>By clicking the input field and saving the the page you will activate a contact form custom post type</p>';

}

function sports_feed_activate_contact(){

  $options = get_option( 'activate_contact' );
  $checked = ( @$options == 1 ? 'checked' : '' );
  echo '<input type="checkbox" id="custom_header" name="activate_contact" value="1" '.$checked.'/>';

}

