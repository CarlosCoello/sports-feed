<?php settings_errors(); ?>

<form class="sports-feed-general-form" action="options.php" method="post">
  <?php settings_fields( 'sports-feed-theme-support' ); ?>
  <?php do_settings_sections( 'sports_feed_theme' ); ?>
  <?php submit_button(); ?>
</form><!-- form -->
