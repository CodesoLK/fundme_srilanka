<?php
/**
 * Elementor Page Builder Functions
 *
 */


// Removes Elementor Global Defaults for Fonts, Colors, and Typography upon install RE:
// https://wordpress.org/support/topic/disable-global-options-upon-theme-activation/#post-8697159
// http://wpengineer.com/1705/set-options-on-activation-themes/
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
	update_option( 'elementor_disable_color_schemes', 'yes' );
	update_option( 'elementor_disable_typography_schemes', 'yes' );
	update_option( 'wpneo_color_scheme', '#2e3c4b' );
	update_option( 'wpneo_button_bg_color', '#2e3c4b' );
	update_option( 'wpneo_button_bg_hover_color', '#4b6179' );
	
}




