<?php
/**
 * Customize User Roles and Capabilities
 *
 * @package understrap
 */

//Remove all user roles except for Admin
remove_role( 'subscriber' );
remove_role( 'editor' );
remove_role( 'contributor' );
remove_role( 'author' );

// Add the client role
add_role( 'client','Client',
	array(
		'read' => true, // true allows this capability
		'edit_posts' => true, // Allows user to edit their own posts
		'edit_pages' => true, // Allows user to edit pages
		'edit_others_posts' => true, // Allows user to edit others posts not just their own
		'create_posts' => true, // Allows user to create new posts
		'manage_categories' => true, // Allows user to manage post categories
		'publish_posts' => true, // Allows the user to publish, otherwise posts stays in draft mode
		'edit_themes' => false, // false denies this capability. User can’t edit your theme
		'install_plugins' => false, // User cant add new plugins
		'update_plugin' => false, // User can’t update any plugins
		'update_core' => false // user cant perform core updates
		)
);

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

function d4tw_remove_website_from_profile()
{
    echo '<style>tr.user-url-wrap{ display: none; }</style>';
}
add_action( 'admin_head-user-edit.php', 'd4tw_remove_website_from_profile' );
add_action( 'admin_head-profile.php',   'd4tw_remove_website_from_profile' );

// Remove the color picker from admin area
remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );

// Remove the toolbar option from admin area for non admins
$user = wp_get_current_user();
if ( in_array( 'agent', (array) $user->roles ) ) {
add_filter('show_admin_bar', '__return_false');
}