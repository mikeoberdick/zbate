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