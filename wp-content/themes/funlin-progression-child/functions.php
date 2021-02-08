<?php

/* Recommended way to include parent theme styles.
  (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
		
		*/
add_action( 'wp_enqueue_scripts', 'funlin_child_progression_studios_enqueue_styles' );
function funlin_child_progression_studios_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}

// Your code goes below

/**
 * To add WooCommerce registration form custom fields.
 */

function text_domain_woo_reg_form_fields() {
    ?>
    <p class="form-row form-row-wide">
        <label for="nic_number"><?php _e('National Identity card Number', 'text_domain'); ?><span class="required">*</span></label>
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

add_action('woocommerce_register_form_start', 'text_domain_woo_reg_form_fields');


/**
 * To validate WooCommerce registration form custom fields.
 */
function text_domain_woo_validate_reg_form_fields($username, $email, $validation_errors) {
    if (isset($_POST['nic_number']) && empty($_POST['nic_number'])) {
        $validation_errors->add('nic_number_error', __('<strong>Error</strong>: Your National Identity Card Number is required!', 'text_domain'));
    }

    return $validation_errors;
}

add_action('woocommerce_register_post', 'text_domain_woo_validate_reg_form_fields', 10, 3);

