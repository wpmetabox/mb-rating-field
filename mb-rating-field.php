<?php
/**
 * Plugin Name: Star rating field for Meta Box
 * Plugin URI: https://metabox.io
 * Description: Add a new star rating field type for Meta Box
 * Version: 1.0
 * Author: MetaBox.io
 * Author URI: https://metabox.io
 * License: GPLv2
 */
add_action( 'init', 'prefix_load_rating_type' );
function prefix_load_rating_type() {
	require __DIR__ . '/rating.php';
}



