<?php

/* Demo Content Import */
function progression_studios_demo_import_files() {
   return array(
     array(
       'import_file_name'           => 'funlin',
       'local_import_file'            => trailingslashit( get_template_directory() ) . '/inc/demo/content.xml',
       'local_import_widget_file'     => trailingslashit( get_template_directory() ) . '/inc/demo/widgets.wie',
       'local_import_customizer_file' => trailingslashit( get_template_directory() ) . '/inc/demo/theme_options.dat',
       'preview_url'                => 'https://funlin.progressionstudios.com/',
     )
   );
}
add_filter( 'pt-ocdi/import_files', 'progression_studios_demo_import_files' );


/* Set Menu's and Blog Pages */
function progression_studios_demo_after_import_setup() {
	
	
  
	// Assign menus to their locations.
	$progession_studios_main_menu = get_term_by( 'name', 'Main Navigation', 'nav_menu' );
	$progession_studios_top_right = get_term_by( 'name', 'Top Right Navigation', 'nav_menu' );
	
	set_theme_mod( 'nav_menu_locations', array(
			'progression-studios-primary' => $progession_studios_main_menu->term_id,
			'progression-studios-header-top-right' => $progession_studios_top_right->term_id,
		)
	);


	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Latest News' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );
	
	
	// WooCommerce pages
	// github.com/proteusthemes/one-click-demo-import/issues/58
	if ( class_exists( 'WooCommerce' ) ) {
		$woopages = array(
			'woocommerce_shop_page_id' 				=> 'Explore',
			'woocommerce_cart_page_id' 				=> 'Cart',
			'woocommerce_checkout_page_id' 			=> 'Checkout',
			'woocommerce_myaccount_page_id' 			=> 'My account',
		);
	
		foreach ( $woopages as $woo_page_name => $woo_page_title ) {
			$woopage = get_page_by_title( $woo_page_title );
			if ( isset( $woopage ) && $woopage->ID ) {
				update_option( $woo_page_name, $woopage->ID );
			}
		}
	}


}
add_action( 'pt-ocdi/after_import', 'progression_studios_demo_after_import_setup' );


/* Disable Branding */
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );