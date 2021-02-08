<?php

add_action( 'cmb2_admin_init', 'progression_studios_page_meta_box' );
function progression_studios_page_meta_box() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'progression_studios_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$progression_studios_cmb = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_page_settings',
		'title'         => esc_html__('Page Settings', 'progression-elements-funlin'),
		'object_types'  => array( 'page' ), // Post type,
	) );
	
	
	$progression_studios_cmb->add_field( array(
		'name'       => esc_html__('Sub-title', 'progression-elements-funlin'),
		'id'         => $prefix . 'sub_title',
		'type'       => 'text',
	) );

	$progression_studios_cmb->add_field( array(
		'name'       => esc_html__('Sidebar Display', 'progression-elements-funlin'),
		'id'         => $prefix . 'page_sidebar',
		'type'       => 'select',
		'options'     => array(
			'hidden-sidebar'   => esc_html__( 'Hide Sidebar', 'progression-elements-funlin' ),
			'right-sidebar'    => esc_html__( 'Right Sidebar', 'progression-elements-funlin' ),
			'left-sidebar'    => esc_html__( 'Left Sidebar', 'progression-elements-funlin' ),
		),
	) );
	
	$progression_studios_cmb->add_field( array(
		'name' => esc_html__('Page Title Background Image', 'progression-elements-funlin'),
		'id'         => $prefix . 'header_image',
		'type'         => 'file',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );
	
	$progression_studios_cmb->add_field( array(
		'name'       => esc_html__('Disable Page Title', 'progression-elements-funlin'),
		'id'         => $prefix . 'disable_page_title',
		'type'       => 'checkbox',
	) );
	
}



add_action( 'cmb2_admin_init', 'progression_studios_page_header_meta_box' );
function progression_studios_page_header_meta_box() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'progression_studios_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$progression_studios_cmb = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_page_header',
		'title'         => esc_html__('Header Settings', 'progression-elements-funlin'),
		'object_types'  => array( 'page' ), // Post type,
	) );
	
	$progression_studios_cmb->add_field( array(
		'name'       => esc_html__('Navigation Text Color', 'progression-elements-funlin'),
		'id'         => $prefix . 'custom_page_nav_color',
		'type'       => 'select',
		'options'     => array(
			'progression_studios_default_navigation_color'    => esc_html__( 'Default Color', 'progression-elements-funlin' ),
			'progression_studios_force_dark_navigation_color'    => esc_html__( 'Force Text Black', 'progression-elements-funlin' ),
			'progression_studios_force_light_navigation_color'   => esc_html__( 'Force Text White', 'progression-elements-funlin' ), 
		),
	) );

	
	$progression_studios_cmb->add_field( array(
		'name'       => esc_html__('Force Transparent Header', 'progression-elements-funlin'),
		'id'         => $prefix . 'header_transparent_float',
		'type'       => 'checkbox',
	) );
	
	
	$progression_studios_cmb->add_field( array(
		'name' => esc_html__('Custom logo for page', 'progression-elements-funlin'),
		'desc' => esc_html__('Must be same size as the main logo.', 'progression-elements-funlin'),
		'id'         => $prefix . 'custom_page_logo',
		'type'         => 'file',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );
	
	
	$progression_studios_cmb->add_field( array(
		'name'       => esc_html__('Disable Header', 'progression-elements-funlin'),
		'id'         => $prefix . 'header_disabled',
		'type'       => 'checkbox',
	) );
	
	$progression_studios_cmb->add_field( array(
		'name'       => esc_html__('Disable Footer', 'progression-elements-funlin'),
		'id'         => $prefix . 'disable_footer_per_page',
		'type'       => 'checkbox',
	) );


	
}





add_action( 'cmb2_admin_init', 'progression_studios_index_post_meta_box' );
function progression_studios_index_post_meta_box() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'progression_studios_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$progression_studios_cmb = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_post',
		'title'         => esc_html__('Post Settings', 'progression-elements-funlin'),
		'object_types'  => array( 'post' ), // Post type
	) );

	$progression_studios_cmb->add_field( array(
		'name'       => esc_html__('Featured Image Link', 'progression-elements-funlin'),
		'id'         => $prefix . 'blog_featured_image_link',
		'type'       => 'select',
		'options'     => array(
			'progression_link_default'   => esc_html__( 'Default link to post', 'progression-elements-funlin' ), // {#} gets replaced by row number
			'progression_link_lightbox'    => esc_html__( 'Link to image in lightbox pop-up', 'progression-elements-funlin' ),
			'progression_link_url'    => esc_html__( 'Link to URL', 'progression-elements-funlin' ),
			'progression_link_url_new_window'    => esc_html__( 'Link to URL (New Window)', 'progression-elements-funlin' ),
		),

	) );
	

	$progression_studios_cmb->add_field( array(
		'name' => esc_html__('Optional Link', 'progression-elements-funlin'),
		'desc' => esc_html__('Make your post link to another page', 'progression-elements-funlin'),
		'id'         => $prefix . 'external_link',
		'type'       => 'text',
	) );
	
	
	$progression_studios_cmb->add_field( array(
		'name'       => esc_html__('Video/Audio', 'progression-elements-funlin'),
		'desc'       => esc_html__('Paste in your video url or embed code', 'progression-elements-funlin'),
		'id'         => $prefix . 'video_post',
		'type'       => 'textarea_code',
		'options' => array( 'disable_codemirror' => true )
	) );
	

	
}









