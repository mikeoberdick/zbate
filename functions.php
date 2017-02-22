<?php
/**
 * D4TW Understrap Child Theme Functions and Definitions
 *
 * @package understrap
 */

/**
 * Theme setup
 */
require '/inc/setup.php';

/**
 * Advanced Custom Fields
 */
require '/inc/acf.php';

/**
 * Advanced Custom Fields
 */
require '/inc/woocommerce.php';

/**
 * Register theme styles
 *
 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 */
require '/inc/styles.php';

/**
 * Register theme scripts
 *
 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_script/
 */
require '/inc/scripts.php';

/**
 * Customize widget areas
 *
 * @link https://codex.wordpress.org/Function_Reference/unregister_sidebar
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
require '/inc/widgets.php';
