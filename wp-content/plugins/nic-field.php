<?php
/*
Plugin Name: NIC Fields
Plugin URI:
Description:
Version: 0.1
Author: Perinba selvan
Author URI:
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/**
 * Front end registration
 */

add_action( 'register_form', 'crf_registration_form' );
function crf_registration_form() {

	$nic = ! empty( $_POST['nic_number'] ) ? intval( $_POST['nic_number'] ) : '';

	?>
	<p>
		<label for="nic"><?php esc_html_e( 'nic_number', 'crf' ) ?><br/>
			<input type="number"
			       min="000000000"
			       max="10000000000000"
			       step="1"
			       id="nic_number"
			       name="nic_number"
			       value="<?php echo esc_attr( $nic ); ?>"
			       class="input"
			/>
		</label>
	</p>
	<?php
}

/* Validating the field */

add_filter( 'registration_errors', 'crf_registration_errors', 10, 3 );
function crf_registration_errors( $errors, $sanitized_user_login, $user_email ) {

	if ( empty( $_POST['nic_number'] ) ) {
		$errors->add( 'your_nic_number_error', __( '<strong>ERROR</strong>: Please enter your nic.', 'crf' ) );
	}

	if ( ! empty( $_POST['nic_number'] ) && intval( $_POST['nic_number'] ) < 000000000 ) {
		$errors->add( 'your_nic_number_error', __( '<strong>ERROR</strong>: Nic not valid.', 'crf' ) );
	}

	if ( ! empty( $_POST['nic_number'] ) && intval( $_POST['nic_number'] ) > 10000000000000 ) {
		$errors->add( 'your_nic_number_error', __( '<strong>ERROR</strong>: Nic not valid.', 'crf' ) );
	}

	return $errors;
}

/*Sanitizing and saving the field */

add_action( 'user_register', 'crf_user_register' );
function crf_user_register( $user_id ) {
	if ( ! empty( $_POST['nic_number'] ) ) {
		update_user_meta( $user_id, 'nic_number', intval( $_POST['nic_number'] ) );
	}
}


/**
 * Back end registration
 */

add_action( 'user_new_form', 'crf_admin_registration_form' );
function crf_admin_registration_form( $operation ) {
	if ( 'add-new-user' !== $operation ) {
		// $operation may also be 'add-existing-user'
		return;
	}

	$nic = ! empty( $_POST['nic_number'] ) ? intval( $_POST['nic_number'] ) : '';

	?>
	<h3><?php esc_html_e( 'Personal Information', 'crf' ); ?></h3>

	<table class="form-table">
		<tr>
			<th><label for="nic"><?php esc_html_e( 'nic_number', 'crf' ); ?></label> <span class="description"><?php esc_html_e( '(required)', 'crf' ); ?></span></th>
			<td>
				<input type="number"
			       min="000000000"
			       max="10000000000000"
			       step="1"
			       id="nic_number"
			       name="nic_number"
			       value="<?php echo esc_attr( $nic ); ?>"
			       class="regular-text"
				/>
			</td>
		</tr>
	</table>

	<?php
}

/*Validating the field */

add_action( 'user_profile_update_errors', 'crf_user_profile_update_errors', 10, 3 );
function crf_user_profile_update_errors( $errors, $update, $user ) {
	if ( $update ) {
		return;
	}

	if ( empty( $_POST['nic_number'] ) ) {
		$errors->add( 'nic_number_error', __( '<strong>ERROR</strong>: Please enter your nic.', 'crf' ) );
	}

	if ( ! empty( $_POST['nic_number'] ) && intval( $_POST['nic_number']) < 000000000 ){
		$errors->add( 'nic_number_error', __( '<strong>ERROR</strong>: nic must be valid.', 'crf' ) );
	}

	if ( ! empty( $_POST['nic_number'] ) && intval( $_POST['nic_number']) > 10000000000000 ){
		$errors->add( 'nic_number_error', __( '<strong>ERROR</strong>: nic must be valid.', 'crf' ) );
	}
}
/*Sanitizing and saving the field ----------------------*/
add_action( 'edit_user_created_user', 'crf_user_register' );

/*Profile display */
add_action( 'show_user_profile', 'crf_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'crf_show_extra_profile_fields' );

function crf_show_extra_profile_fields( $user ) {
	?>
	<h3><?php esc_html_e( 'Personal Information', 'crf' ); ?></h3>

	<table class="form-table">
		<tr>
			<th><label for="nic"><?php esc_html_e( 'nic_number', 'crf' ); ?></label></th>
			<td><?php echo esc_html( get_the_author_meta( 'nic_number', $user->ID ) ); ?></td>
		</tr>
	</table>
	<?php
}