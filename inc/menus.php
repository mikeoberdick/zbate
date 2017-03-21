<?php
/**
 * Setting up widgets
 *
 * @package understrap
 */

function d4tw_register_theme_menus() {
  register_nav_menus(
    array(
      'agent-menu' => 'Agent Menu',
      'buyer-seller-menu' => 'Buyer/Seller Menu'
    )
  );
}
add_action( 'init', 'd4tw_register_theme_menus' );