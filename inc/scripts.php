<?php
/**
 * Register theme scripts
 *
 * @package understrap
 */

// Add the Javascript
function d4tw_enqueue_scripts () {
   wp_enqueue_script( 'D4TW Theme JS', get_stylesheet_directory_uri() . '/js/d4tw.js', array('jquery'), '1.0.0', true );
   wp_enqueue_script( 'DragDealer JS', get_stylesheet_directory_uri() . '/dragdealer/dragdealer.js', array('jquery'), '1.0.0', true );
   wp_enqueue_script( 'rebateSlider JS', get_stylesheet_directory_uri() . '/dragdealer/rebateSlider.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'd4tw_enqueue_scripts' );