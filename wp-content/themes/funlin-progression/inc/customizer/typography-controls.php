<?php
/**
 * progression Theme Customizer
 *
 * @package progression
 */

function progression_studios_add_tab_to_panel( $tabs ) {
	
   $tabs['progression-studios-navigation-font'] = array(
       'name'        => 'progression-studios-navigation-font',
       'panel'       => 'progression_studios_header_panel',
       'title'       => esc_html__('Navigation', 'funlin-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
   $tabs['progression-studios-sub-navigation-font'] = array(
       'name'        => 'progression-studios-sub-navigation-font',
       'panel'       => 'progression_studios_header_panel',
       'title'       => esc_html__('Sub-Navigation', 'funlin-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
	
   $tabs['progression-studios-top-header-font'] = array(
       'name'        => 'progression-studios-top-header-font',
       'panel'       => 'progression_studios_header_panel',
       'title'       => esc_html__('Top Header Options', 'funlin-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
	
   $tabs['progression-studios-body-font'] = array(
       'name'        => 'progression-studios-body-font',
       'panel'       => 'progression_studios_body_panel',
       'title'       => esc_html__('Body Main', 'funlin-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
	
   $tabs['progression-studios-page-title'] = array(
       'name'        => 'progression-studios-page-title',
       'panel'       => 'progression_studios_body_panel',
       'title'       => esc_html__('Page Title', 'funlin-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
   $tabs['progression-studios-widgets-font'] = array(
       'name'        => 'progression-studios-widgets-font',
       'panel'       => 'progression_studios_footer_panel',
       'title'       => esc_html__('Footer Main', 'funlin-progression'),
       'description' => '',
       'sections'    => array(),
   );
	


   $tabs['progression-studios-footer-nav-font'] = array(
       'name'        => 'progression-studios-footer-nav-font',
       'panel'       => 'progression_studios_footer_panel',
       'title'       => esc_html__('Footer Navigation', 'funlin-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
	
	
	
   $tabs['progression-studios-default-headings'] = array(
       'name'        => 'progression-studios-default-headings',
       'panel'       => 'progression_studios_body_panel',
       'title'       => esc_html__('H1-H6 Headings', 'funlin-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
	
  
	
   $tabs['progression-studios-sidebar-headings'] = array(
       'name'        => 'progression-studios-sidebar-headings',
       'panel'       => 'progression_studios_body_panel',
       'title'       => esc_html__('Sidebar Options', 'funlin-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
   $tabs['progression-studios-button-typography'] = array(
       'name'        => 'progression-studios-button-typography',
       'panel'       => 'progression_studios_body_panel',
       'title'       => esc_html__('Button/Input Styles', 'funlin-progression'),
       'description' => '',
       'sections'    => array(),
   );
	


	
   $tabs['progression-studios-blog-headings'] = array(
       'name'        => 'progression-studios-blog-headings',
       'panel'       => 'progression_studios_blog_panel',
       'title'       => esc_html__('Default Layout Styles', 'funlin-progression'),
       'description' => '',
       'sections'    => array(),
   );

	
   $tabs['progression-studios-blog-post-title'] = array(
       'name'        => 'progression-studios-blog-post-title',
       'panel'       => 'progression_studios_blog_panel',
       'title'       => esc_html__('Blog Post Page Title', 'funlin-progression'),
       'description' => '',
       'sections'    => array(),
   );
	

	
   $tabs['progression-studios-blog-post-options'] = array(
       'name'        => 'progression-studios-blog-post-options',
       'panel'       => 'progression_studios_blog_panel',
       'title'       => esc_html__('Blog Post Options', 'funlin-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
   $tabs['progression-studios-blog-post-styles'] = array(
       'name'        => 'progression-studios-blog-post-styles',
       'panel'       => 'progression_studios_blog_panel',
       'title'       => esc_html__('Blog Post Styles', 'funlin-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
	
   $tabs['progression-studios-shop-index-styles'] = array(
       'name'        => 'progression-studios-shop-index-styles',
       'panel'       => 'woocommerce',
       'title'       => esc_html__('Shop Index Styles', 'funlin-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
	
   $tabs['progression-studios-shop-styles'] = array(
       'name'        => 'progression-studios-shop-styles',
       'panel'       => 'woocommerce',
       'title'       => esc_html__('Shop Post Styles', 'funlin-progression'),
       'description' => '',
       'sections'    => array(),
   );
	

	
    // Return the tabs.
    return $tabs;
}
add_filter( 'tt_font_get_settings_page_tabs', 'progression_studios_add_tab_to_panel' );

/**
 * How to add a font control to your tab
 *
 * @see  parse_font_control_array() - in class EGF_Register_Options
 *       in includes/class-egf-register-options.php to see the full
 *       properties you can add for each font control.
 *
 *
 * @param   array $controls - Existing Controls.
 * @return  array $controls - Controls with controls added/removed.
 *
 * @since 1.0
 * @version 1.0
 *
 */
function progression_studios_add_control_to_tab( $controls ) {

    /**
     * 1. Removing default styles because we add-in our own
     */
    unset( $controls['tt_default_body'] );
    unset( $controls['tt_default_heading_1'] );
    unset( $controls['tt_default_heading_2'] );
    unset( $controls['tt_default_heading_3'] );
    unset( $controls['tt_default_heading_4'] );
    unset( $controls['tt_default_heading_5'] );
    unset( $controls['tt_default_heading_6'] );
	 
	 
    /**
     * 2. Now custom examples that are theme specific
     */
	 
	
    $controls['progression_studios_body_font_family'] = array(
        'name'       => 'progression_studios_body_font_family',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Body Font', 'funlin-progression'),
        'tab'        => 'progression-studios-body-font',
        'properties' => array( 'selector'   => 'body,  body input, body textarea, select' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
    $controls['progression_studios_heading_h1'] = array(
        'name'       => 'progression_studios_heading_h1',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Heading 1', 'funlin-progression'),
        'tab'        => 'progression-studios-default-headings',
        'properties' => array( 'selector'   => 'h1' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			
 			),
    );
	
    $controls['progression_studios_heading_h2'] = array(
        'name'       => 'progression_studios_heading_h2',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Heading 2', 'funlin-progression'),
        'tab'        => 'progression-studios-default-headings',
        'properties' => array( 'selector'   => 'h2' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			
 			),
    );
	
    $controls['progression_studios_heading_h3'] = array(
        'name'       => 'progression_studios_heading_h3',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Heading 3', 'funlin-progression'),
        'tab'        => 'progression-studios-default-headings',
        'properties' => array( 'selector'   => 'h3' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			
 			),
    );
	
    $controls['progression_studios_heading_h4'] = array(
        'name'       => 'progression_studios_heading_h4',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Heading 4', 'funlin-progression'),
        'tab'        => 'progression-studios-default-headings',
        'properties' => array( 'selector'   => 'h4' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			
 			),
    );
	 
    $controls['progression_studios_heading_h5'] = array(
        'name'       => 'progression_studios_heading_h5',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Heading 5', 'funlin-progression'),
        'tab'        => 'progression-studios-default-headings',
        'properties' => array( 'selector'   => 'h5' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			
 			),
    );
	 
    $controls['progression_studios_heading_h6'] = array(
        'name'       => 'progression_studios_heading_h6',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Heading 6', 'funlin-progression'),
        'tab'        => 'progression-studios-default-headings',
        'properties' => array( 'selector'   => 'h6' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			
 			),
    );
	 
	 
	 
    $controls['progression_studios_page_title_font_family'] = array(
        'name'       => 'progression_studios_page_title_font_family',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Page Title Font', 'funlin-progression'),
        'tab'        => 'progression-studios-page-title',
        'properties' => array( 'selector'   => '#page-title-pro h1' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
	 
    $controls['progression_studios_page_breadcrumb_font_family'] = array(
        'name'       => 'progression_studios_page_breadcrumb_font_family',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Page Breadcrumb Font', 'funlin-progression'),
        'tab'        => 'progression-studios-page-title',
        'properties' => array( 'selector'   => 'ul#breadcrumbs-progression-studios, ul#breadcrumbs-progression-studios li a' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
    $controls['progression_studios_page_breadcrumb_hover'] = array(
        'name'       => 'progression_studios_page_breadcrumb_hover',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Page Breadcrumb Hover Color', 'funlin-progression'),
        'tab'        => 'progression-studios-page-title',
        'properties' => array( 'selector'   => 'ul#breadcrumbs-progression-studios li a:hover' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
	 
    $controls['progression_studios_page_sub_title_font_family'] = array(
        'name'       => 'progression_studios_page_sub_title_font_family',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Page Sub-Title Font', 'funlin-progression'),
        'tab'        => 'progression-studios-page-title',
        'properties' => array( 'selector'   => '#page-title-pro h4' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
	 
    $controls['progression_studios_nav_font_family'] = array(
        'name'       => 'progression_studios_nav_font_family',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Navigation Font Family', 'funlin-progression'),
        'tab'        => 'progression-studios-navigation-font',
        'properties' => array( 'selector'   => '#progression-studios-header-login-icon .progression-icon-login span, ul.mobile-menu-pro li a, ul.progression-studios-call-to-action li a, #progression-studios-header-search-icon i.pe-7s-search span, #progression-studios-header-login-container a.progresion-studios-login-icon span, nav#site-navigation, nav#progression-studios-right-navigation' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );

	 
    $controls['progression_studios_sub_nav_font_family'] = array(
        'name'       => 'progression_studios_sub_nav_font_family',
 	'type'        => 'font',
        'title'      =>  esc_html__('Sub-Navigation Font Family', 'funlin-progression'),
        'tab'        => 'progression-studios-sub-navigation-font',
        'properties' => array( 'selector'   => '#main-nav-mobile, ul#progression-studios-panel-login, .sf-menu ul' ),
 	'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 

	 
	 
    $controls['progression_studios_top_header_default'] = array(
        'name'       => 'progression_studios_top_header_default',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Top Header Font', 'funlin-progression'),
        'tab'        => 'progression-studios-top-header-font',
        'properties' => array( 'selector'   => '#funlin-progression-header-top' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
	 
    $controls['progression_studios_top_header_icon_color'] = array(
        'name'       => 'progression_studios_top_header_icon_color',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Top Header Icon Color', 'funlin-progression'),
        'tab'        => 'progression-studios-top-header-font',
        'properties' => array( 'selector'   => '#funlin-progression-header-top .widget i, #funlin-progression-header-top .sf-menu i' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
    $controls['progression_studios_sub_nav_megamenu'] = array(
        'name'       => 'progression_studios_sub_nav_megamenu',
 	'type'        => 'font',
        'title'      =>  esc_html__('Mega Menu Heading', 'funlin-progression'),
        'tab'        => 'progression-studios-sub-navigation-font',
        'properties' => array( 'selector'   => 'body header .progression-sticky-scrolled .sf-menu .sf-mega h2.mega-menu-heading a, body header .progression-sticky-scrolled .sf-menu .sf-mega h2.mega-menu-heading a:hover, body header .sf-menu .sf-mega h2.mega-menu-heading a, body header .sf-menu .sf-mega h2.mega-menu-heading a:hover, body #progression-sticky-header header ul.mobile-menu-pro h2.mega-menu-heading a, body header ul.mobile-menu-pro .sf-mega h2.mega-menu-heading a, ul.mobile-menu-pro .sf-mega h2.mega-menu-heading a, ul.mobile-menu-pro .sf-mega h2.mega-menu-heading, .sf-mega h2.mega-menu-heading, body #progression-sticky-header header .sf-mega h2.mega-menu-heading a, body header .sf-mega h2.mega-menu-heading a' ),
 	'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 



	 
    $controls['progression_studios_sidebar_heading'] = array(
        'name'       => 'progression_studios_sidebar_heading',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Sidebar Heading', 'funlin-progression'),
        'tab'        => 'progression-studios-sidebar-headings',
        'properties' => array( 'selector'   => '.sidebar h4.widget-title, .sidebar h2.widget-title' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			
 			),
    );
	 
	 
    $controls['progression_studios_sidebar_default'] = array(
        'name'       => 'progression_studios_sidebar_default',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Sidebar Default Text', 'funlin-progression'),
        'tab'        => 'progression-studios-sidebar-headings',
        'properties' => array( 'selector'   => '.sidebar' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			
 			),
    );
	 
	 
    $controls['progression_studios_sidebar_link'] = array(
        'name'       => 'progression_studios_sidebar_link',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Sidebar Default Link', 'funlin-progression'),
        'tab'        => 'progression-studios-sidebar-headings',
        'properties' => array( 'selector'   => '.sidebar a' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			
 			),
    );
	 
    $controls['progression_studios_sidebar_link_hover'] = array(
        'name'       => 'progression_studios_sidebar_link_hover',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Sidebar Link Hover', 'funlin-progression'),
        'tab'        => 'progression-studios-sidebar-headings',
        'properties' => array( 'selector'   => '.sidebar ul li.current-cat, .sidebar ul li.current-cat a, .sidebar a:hover' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			
 			),
    );
	 
	 
	 
	 
    $controls['progression_studios_button_font_family'] = array(
        'name'       => 'progression_studios_button_font_family',
 	'type'        => 'font',
        'title'      =>  esc_html__('Button Font Family', 'funlin-progression'),
        'tab'        => 'progression-studios-button-typography',
        'properties' => array( 'selector'   => '.wp-block-button a.wp-block-button__link, #boxed-layout-pro .form-submit input#submit, #boxed-layout-pro button.button, #boxed-layout-pro a.button, .progression-studios-shop-overlay-buttons a.added_to_cart, .infinite-nav-pro a, .progression-blog-content a.more-link, .tags-progression a, .tagcloud a, .post-password-form input[type=submit], #respond input.submit, .wpcf7-form input.wpcf7-submit' ),
 	'default' => array(
		'subset'                     => 'latin',
		
 		),
    );
    
	 
	 
	 
    $controls['progression_studios_blog_title_font'] = array(
        'name'       => 'progression_studios_blog_title_font',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Title', 'funlin-progression'),
        'tab'        => 'progression-studios-blog-headings',
        'properties' => array( 'selector'   => 'h2.progression-blog-title' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
    $controls['progression_studios_blog_byline_font'] = array(
        'name'       => 'progression_studios_blog_byline_font',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Post Meta', 'funlin-progression'),
        'tab'        => 'progression-studios-blog-headings',
        'properties' => array( 'selector'   => 'ul.progression-post-meta li, ul.progression-post-meta li a' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
    $controls['progression_studios_blog_byline_link_font_hover'] = array(
        'name'       => 'progression_studios_blog_byline_link_font_hover',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Post Meta Hover', 'funlin-progression'),
        'tab'        => 'progression-studios-blog-headings',
        'properties' => array( 'selector'   => 'ul.progression-post-meta li a:hover' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
    $controls['progression_studios_blog_cat_font'] = array(
        'name'       => 'progression_studios_blog_cat_font',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Category Link', 'funlin-progression'),
        'tab'        => 'progression-studios-blog-headings',
        'properties' => array( 'selector'   => '.blog-meta-category-list a' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
    $controls['progression_studios_blog_cat_font_hover'] = array(
        'name'       => 'progression_studios_blog_cat_font_hover',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Category Link Hover', 'funlin-progression'),
        'tab'        => 'progression-studios-blog-headings',
        'properties' => array( 'selector'   => '.blog-meta-category-list a:hover' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
	 
	 
	 
	 
	 
	 
	 
    $controls['progression_studios_post_title_font_family'] = array(
        'name'       => 'progression_studios_post_title_font_family',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Post Title', 'funlin-progression'),
        'tab'        => 'progression-studios-blog-post-title',
        'properties' => array( 'selector'   => 'body.single-post #page-title-pro h1' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
    $controls['progression_studios_post_title_cat'] = array(
        'name'       => 'progression_studios_post_title_cat',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Post Title Category', 'funlin-progression'),
        'tab'        => 'progression-studios-blog-post-title',
        'properties' => array( 'selector'   => '.blog-single-category-display a' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );

	 
	 
    $controls['progression_studios_post_title_cat_hover'] = array(
        'name'       => 'progression_studios_post_title_cat_hover',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Post Title Category Hover', 'funlin-progression'),
        'tab'        => 'progression-studios-blog-post-title',
        'properties' => array( 'selector'   => '.blog-single-category-display a:hover' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
    $controls['progression_studios_post_title_meta'] = array(
        'name'       => 'progression_studios_post_title_meta',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Post Title Meta', 'funlin-progression'),
        'tab'        => 'progression-studios-blog-post-title',
        'properties' => array( 'selector'   => 'ul.progression-single-post-meta li, ul.progression-single-post-meta li a' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
    $controls['progression_studios_post_title_meta_hover'] = array(
        'name'       => 'progression_studios_post_title_meta_hover',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Post Title Meta Hover', 'funlin-progression'),
        'tab'        => 'progression-studios-blog-post-title',
        'properties' => array( 'selector'   => 'ul.progression-single-post-meta li a:hover' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
	 
	 
	

	 
	 
    $controls['progression_studios_post_comment_heading'] = array(
        'name'       => 'progression_studios_post_comment_heading',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Post Comment Heading', 'funlin-progression'),
        'tab'        => 'progression-studios-blog-post-options',
        'properties' => array( 'selector'   => '#comments h3' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
	 
	 
	 
    $controls['progression_studios_shop_index_title'] = array(
        'name'       => 'progression_studios_shop_index_title',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Shop Index Title', 'funlin-progression'),
        'tab'        => 'progression-studios-shop-index-styles',
        'properties' => array( 'selector'   => '#boxed-layout-pro ul.products h2.woocommerce-loop-product__title, #boxed-layout-pro ul.products h2.woocommerce-loop-product__title a, .funlin-progression-crowdfunding-elementor h2.woocommerce-loop-product__title, .funlin-progression-crowdfunding-elementor h2.woocommerce-loop-product__title a' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
    $controls['progression_studios_shop_index_title_hover'] = array(
        'name'       => 'progression_studios_shop_index_title_hover',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Shop Index Title Hover', 'funlin-progression'),
        'tab'        => 'progression-studios-shop-index-styles',
        'properties' => array( 'selector'   => '.funlin-progression-crowdfunding-elementor h2.woocommerce-loop-product__title a:hover, #boxed-layout-pro ul.products a:hover h2.woocommerce-loop-product__title, #boxed-layout-pro ul.products h2.woocommerce-loop-product__title a:hover' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
    $controls['progression_studios_shop_index_cat'] = array(
        'name'       => 'progression_studios_shop_index_cat',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Shop Category', 'funlin-progression'),
        'tab'        => 'progression-studios-shop-index-styles',
        'properties' => array( 'selector'   => '#boxed-layout-pro ul.products li.product ul.funlin-shop-index-category li a' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );

	 
    $controls['progression_studios_shop_index_price'] = array(
        'name'       => 'progression_studios_shop_index_price',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Shop Index Price', 'funlin-progression'),
        'tab'        => 'progression-studios-shop-index-styles',
        'properties' => array( 'selector'   => '#boxed-layout-pro ul.products span.price, #boxed-layout-pro ul.products span.price span.amount' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 


	 
    $controls['progression_studios_shop_post_title'] = array(
        'name'       => 'progression_studios_shop_post_title',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Shop Post Title', 'funlin-progression'),
        'tab'        => 'progression-studios-shop-styles',
        'properties' => array( 'selector'   => '#progression-studios-woocommerce-single-top h1.product_title, h2.wpneo-campaign-title ' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
    $controls['progression_studios_shop_post_price'] = array(
        'name'       => 'progression_studios_shop_post_price',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Shop Post Price', 'funlin-progression'),
        'tab'        => 'progression-studios-shop-styles',
        'properties' => array( 'selector'   => '#funlin-funding-numbers span.funlin-funding-highlight, #progression-studios-woocommerce-single-top p.price, #progression-studios-woocommerce-single-top p.price span.amount' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 


	 
   
	 
    $controls['progression_studios_shop_post_tab'] = array(
        'name'       => 'progression_studios_shop_post_tab',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Shop Post Tab', 'funlin-progression'),
        'tab'        => 'progression-studios-shop-styles',
        'properties' => array( 'selector'   => '#progression-studios-woocommerce-single-bottom .woocommerce-tabs ul.wc-tabs li a, body #boxed-layout-pro ul.wpneo-tabs-menu li a' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
    $controls['progression_studios_shop_post_tab'] = array(
        'name'       => 'progression_studios_shop_post_tab',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Shop Post Tab Selected', 'funlin-progression'),
        'tab'        => 'progression-studios-shop-styles',
        'properties' => array( 'selector'   => 'body #boxed-layout-pro ul.wpneo-tabs-menu li.wpneo-current a, #progression-studios-woocommerce-single-bottom .woocommerce-tabs ul.wc-tabs li.active a' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
 	
	
	

	 
	// Return the controls.
    return $controls;
}
add_filter( 'tt_font_get_option_parameters', 'progression_studios_add_control_to_tab' );