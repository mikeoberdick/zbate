<?php
/**
 * D4TW register theme styles
 *
 * @package understrap
 */

// Add the theme fonts
function d4tw_enqueue_fonts () {
    wp_enqueue_style( 'Open Sans', 'https://fonts.googleapis.com/css?family=Open+Sans' );
    wp_enqueue_style( 'Cabin', 'https://fonts.googleapis.com/css?family=Cabin' );
    wp_enqueue_style( 'Raleway', 'https://fonts.googleapis.com/css?family=Raleway' ); 
}
add_action('wp_enqueue_scripts', 'd4tw_enqueue_fonts');

// Add the theme fonts
function d4tw_enqueue_styles () {
    wp_enqueue_style( 'rebateSlider CSS', get_stylesheet_directory_uri() . '/dragdealer/rebateSlider.css' ); 
}
add_action('wp_enqueue_scripts', 'd4tw_enqueue_styles');