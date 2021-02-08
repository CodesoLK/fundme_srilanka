<?php
/*
Plugin Name: Progression Theme Elements - Funlin
Plugin URI: https://progressionstudios.com
Description: Theme Elements for Progression Studios Theme
Version: 1.1
Author: Progression Studios
Author URI: https://progressionstudios.com/
Author Email: contact@progressionstudios.com
License: GNU General Public License v3.0
Text Domain: progression-elements-funlin
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.


define( 'PROGRESSION_THEME_ELEMENTS_URL', plugins_url( '/', __FILE__ ) );
define( 'PROGRESSION_THEME_ELEMENTS_PATH', plugin_dir_path( __FILE__ ) );


// Translation Setup
add_action('plugins_loaded', 'progression_theme_elements_funlin');
function progression_theme_elements_funlin() {
	load_plugin_textdomain( 'progression-elements-funlin', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}

/**
* Enqueue or de-enqueue third party plugin scripts/styles
*/
function funlin_elements_progression_theme_elements_styles_scripts() {
	//wp_register_script( 'boosted_elements_progression_masonry_js',  PROGRESSION_THEME_ELEMENTS_URL . 'js/masonry.js', '','1.0',true);
	wp_dequeue_style( 'boosted-elements-progression-prettyphoto-optional' ); //Removing a script
}
add_action( 'wp_enqueue_scripts', 'funlin_elements_progression_theme_elements_styles_scripts', 100 );




/**
* Calling new Page Builder Elements
*/
require_once PROGRESSION_THEME_ELEMENTS_PATH.'inc/elementor-helper.php';

function progression_funlin_trainer_elements_load_elements(){
	require_once PROGRESSION_THEME_ELEMENTS_PATH.'elements/post-element.php';
}
add_action('elementor/widgets/widgets_registered','progression_funlin_trainer_elements_load_elements');


/**
 * Custom Social Icons
 */
require PROGRESSION_THEME_ELEMENTS_PATH.'inc/social-icons.php';

/**
 * Custom Social Sharing
 */
require PROGRESSION_THEME_ELEMENTS_PATH.'inc/social-sharing.php';

/**
 * Crowdfunding Custom Functions
 */
require PROGRESSION_THEME_ELEMENTS_PATH.'inc/crowdfunding-custom.php';

/**
 * Custom Metabox Fields
 */
require PROGRESSION_THEME_ELEMENTS_PATH.'inc/custom-meta.php';
