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

// Hide the admin toolbar for non-admins
add_action('admin_init', 'd4tw_disable_admin_bar');

function d4tw_disable_admin_bar() {
    if ( !current_user_can ( 'administrator' ) ) {
        show_admin_bar(false);
    }
}

// Remove the toolbar option from admin area for non admins
$user = wp_get_current_user();
if ( in_array( 'subscriber', (array) $user->roles ) ) {
add_filter('show_admin_bar', '__return_false');
}