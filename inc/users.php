<?php
/**
 * Customize User Roles and Capabilities
 *
 * @package understrap
 */

// Add the Agent role

add_role('agent', 'Agent', array(
		'read' => true, // Only allows them to update their profile
		)
);

// Hide the admin toolbar for agents
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}

// Add the logout button to the nav menu
add_filter( 'wp_nav_menu_items', 'd4tw_logout_menu_link', 10, 2 );

function d4tw_logout_menu_link( $items, $args ) {
    if (is_user_logged_in()) {
         $items .= '<li class="right btn btn-primary btn-sm menu-item nav-item"><a href="'. wp_logout_url( home_url() ) .'" class = "nav-link">'. __("Log Out") .'</a></li>';
      }
   return $items;
}