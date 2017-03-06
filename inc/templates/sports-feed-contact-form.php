<?php settings_errors(); ?>

<form class="sports-feed-general-form" action="options.php" method="post">
  <?php settings_fields( 'sports-feed-contact-options' ); ?>
  <?php do_settings_sections( 'sports_feed_contact' ); ?>
  <?php submit_button(); ?>
</form><!-- .form -->
