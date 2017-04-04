<?php
/**
 * Setup Form Functionality
 *
 * @package understrap
 */

// Create user after form has been sanitised
add_action( 'ninja_forms_after_submission', 'nf_create_new_user' );
function nf_create_new_user( $form_data ){
	$form_id = $form_data[ 'form_id' ];

	// If form ID is the one we want
	if( $form_id == 3 ){

		// Load up the fields we have for this form
		$form_fields = $form_data[ 'fields' ];

		// Set up variables based on form values - change the numbers below based on field IDs

		$username = $form_fields[ 20 ][ 'value' ];
		$password = $form_fields[ 21 ][ 'value' ];
		$first_name = $form_fields[ 22 ][ 'value' ];
		$last_name = $form_fields[ 23 ][ 'value' ];
		$phone = $form_fields[ 24 ][ 'value' ];
		$userdata['phone'] = $_POST['phone'];
		$email = $form_fields[ 25 ][ 'value' ];
		$company_name = $form_fields[ 28 ][ 'value' ];
		$company_address = $form_fields[ 29 ][ 'value' ];
		$company_city = $form_fields[ 30 ][ 'value' ];
		$company_state = $form_fields[ 31 ][ 'value' ];
		$company_zip = $form_fields[ 32 ][ 'value' ];
		$license_number = $form_fields[ 33 ][ 'value' ];
				
		// Create an array of the user data
		$userdata = array(
			'user_login'  		=>  $username,
			'user_pass'   		=>  $password,
			'first_name'  		=>  $first_name,
			'last_name'   		=>  $last_name,
			'phone'		  		=>  $phone,
			'user_email'		=>  $email,
			'company_name'  	=>  $company_name,
			'company_address'   =>  $company_address,
			'company_city'  	=>  $company_city,
			'company_state'  	=>  $company_state,
			'company_zip'   	=>  $company_zip,
			'license_number'	=>  $license_number,
			'role'	      		=>  'agent'
		);

		// Create the user and remember the user id
		$user_id = wp_insert_user( $userdata );

		// Add the newly created user meta to the database
		add_user_meta( $user_id, 'phone', $phone );
		add_user_meta( $user_id, 'email', $email );
		add_user_meta( $user_id, 'company_name', $company_name );
		add_user_meta( $user_id, 'company_address', $company_address );
		add_user_meta( $user_id, 'company_city', $company_city );
		add_user_meta( $user_id, 'company_state', $company_state );
		add_user_meta( $user_id, 'company_zip', $company_zip );
		add_user_meta( $user_id, 'license_number', $license_number );

		// Use the user id to log in straight away
		wp_set_auth_cookie( $user_id, true );
	}
}

// Add Twitter field to user profiles
function d4tw_add_phone_field( $contactmethods ) {
     $contactmethods['phone'] = 'Phone Number';
     return $contactmethods;
}
add_filter( 'user_contactmethods', 'd4tw_add_phone_field', 10, 1);

function d4tw_show_extra_profile_fields( $user ) { ?>

	<h3>Company Information</h3>

	<table class="form-table">

		<tr>
			<th><label for="company_name">Company Name</label></th>

			<td>
				<input type="text" name="company_name" id="company_name" value="<?php echo esc_attr( get_the_author_meta( 'company_name', $user->ID ) ); ?>" class="regular-text" /><br />
				<!--<span class="description">Please enter your Twitter username.</span>-->
			</td>
		</tr>

		<tr>
			<th><label for="company_address">Address</label></th>

			<td>
				<input type="text" name="company_address" id="company_address" value="<?php echo esc_attr( get_the_author_meta( 'company_address', $user->ID ) ); ?>" class="regular-text" /><br />
				<!--<span class="description">Please enter your Twitter username.</span>-->
			</td>
		</tr>

		<tr>
			<th><label for="company_city">City</label></th>

			<td>
				<input type="text" name="company_city" id="company_city" value="<?php echo esc_attr( get_the_author_meta( 'company_city', $user->ID ) ); ?>" class="regular-text" /><br />
				<!--<span class="description">Please enter your Twitter username.</span>-->
			</td>
		</tr>

		<tr>
			<th><label for="company_state">State</label></th>

			<td>
				<input type="text" name="company_state" id="company_state" value="<?php echo esc_attr( get_the_author_meta( 'company_state', $user->ID ) ); ?>" class="regular-text" /><br />
				<!--<span class="description">Please enter your Twitter username.</span>-->
			</td>
		</tr>

		<tr>
			<th><label for="company_zip">Zip Code</label></th>

			<td>
				<input type="text" name="company_zip" id="company_zip" value="<?php echo esc_attr( get_the_author_meta( 'company_zip', $user->ID ) ); ?>" class="regular-text" /><br />
				<!--<span class="description">Please enter your Twitter username.</span>-->
			</td>
		</tr>

		<tr>
			<th><label for="license_number">License Number</label></th>

			<td>
				<input type="text" name="license_number" id="license_number" value="<?php echo esc_attr( get_the_author_meta( 'license_number', $user->ID ) ); ?>" class="regular-text" /><br />
				<!--<span class="description">Please enter your Twitter username.</span>-->
			</td>
		</tr>

	</table>
<?php }

add_action( 'show_user_profile', 'd4tw_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'd4tw_show_extra_profile_fields' );

function d4tw_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	// Update the fields
	update_usermeta( $user_id, 'phone', $_POST['phone'] );
	update_usermeta( $user_id, 'company_name', $_POST['company_name'] );
	update_usermeta( $user_id, 'company_address', $_POST['company_address'] );
	update_usermeta( $user_id, 'company_city', $_POST['company_city'] );
	update_usermeta( $user_id, 'company_state', $_POST['company_state'] );
	update_usermeta( $user_id, 'company_zip', $_POST['company_zip'] );
	update_usermeta( $user_id, 'license_number', $_POST['license_number'] );
}

add_action( 'personal_options_update', 'd4tw_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'd4tw_save_extra_profile_fields' );