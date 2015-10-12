<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/utils.php',                 // Utility functions
  'lib/init.php',                  // Initial theme setup and constants
  'lib/wrapper.php',               // Theme wrapper class
  'lib/config.php',                // Configuration
  'lib/assets.php',                // Scripts and stylesheets
  'lib/titles.php',                // Page titles
  'lib/extras.php',                // Custom functions
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

/*---Include WooCommerce Custom Functions File*/
include_once (TEMPLATEPATH . '/functions_woocommerce.php');
/*remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
/*remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
/*add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
/*add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);
