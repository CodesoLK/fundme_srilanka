<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package pro
 */

//Jetpack Lazy  Loading Support
add_filter( 'jetpack_lazy_images_blacklisted_classes', 'progression_studios_exclude_lazy_load', 999, 1 );    
function progression_studios_exclude_lazy_load( $classes ) {
	 $classes[] = 'boosted-elements-progression-image';
	 $classes[] = 'skip-lazy-loading';
	 $classes[] = 'attachment-woocommerce_thumbnail';
	 
    return $classes;
} 



function progression_studios_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'progression_studios_pingback_header' );



/* Filters for Video Embeds */
add_filter( 'progression_studios_video_content_filter', array( $wp_embed, 'autoembed' ), 8 );
add_filter( 'progression_studios_video_content_filter', 'wptexturize'       );
add_filter( 'progression_studios_video_content_filter', 'convert_smilies'   );
add_filter( 'progression_studios_video_content_filter', 'convert_chars'     );
add_filter( 'progression_studios_video_content_filter', 'wpautop'           );
add_filter( 'progression_studios_video_content_filter', 'shortcode_unautop' );
add_filter( 'progression_studios_video_content_filter', 'do_shortcode'      );


function is_progression_studios_blog () {
    return ( is_archive() || is_author() || is_category() || is_home() || is_tag() || is_search() );
}


/* Logo */
function progression_studios_logo() {
	global $post;
?>
	<?php if ( get_theme_mod( 'progression_studios_one_page_nav') == 'on') : ?><a href="#boxed-layout-pro" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="scroll-to-link"><?php else: ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php endif ?>
		
	<?php if(is_page() && get_post_meta($post->ID, 'progression_studios_custom_page_logo', true)): ?>
		<img src="<?php echo esc_url( get_post_meta($post->ID, 'progression_studios_custom_page_logo', true) );?>" alt="<?php bloginfo('name'); ?>" class="progression-studios-default-logo <?php if ( get_theme_mod( 'progression_studios_mobile_custom_logo_per_page', 'hide') == 'hide') : ?>progression-studios-hide-mobile-custom-logo<?php else: ?> progresion-studios-still-hide-onsticky<?php endif; ?><?php if ( get_theme_mod( 'progression_studios_sticky_logo' ) ) : ?> progression-studios-default-logo-hide<?php endif; ?>">
	<?php endif; ?>	

	<?php if ( get_theme_mod( 'progression_studios_theme_logo', get_template_directory_uri() . '/images/logo.png' ) ) : ?>
		<img src="<?php echo esc_attr( get_theme_mod( 'progression_studios_theme_logo', get_template_directory_uri() . '/images/logo.png' ) ); ?>" alt="<?php bloginfo('name'); ?>" class="progression-studios-default-logo<?php if(is_page() && get_post_meta($post->ID, 'progression_studios_custom_page_logo', true)): ?> progression-studios-custom-logo-per-page-hide-default<?php endif; ?>	<?php if ( get_theme_mod( 'progression_studios_sticky_logo' ) ) : ?> progression-studios-default-logo-hide<?php endif; ?> <?php if(is_page() && get_post_meta($post->ID, 'progression_studios_custom_page_logo', true) && get_theme_mod( 'progression_studios_mobile_custom_logo_per_page') == 'display'): ?> progression-studios-hide-custom-logo-mobile<?php endif; ?>">
	<?php endif; ?>
	
	<?php if ( get_theme_mod( 'progression_studios_sticky_logo' ) ) : ?>
		<img src="<?php echo esc_attr( get_theme_mod( 'progression_studios_sticky_logo') ); ?>" alt="<?php bloginfo('name'); ?>" class="progression-studios-sticky-logo">
	<?php endif; ?>
	</a>
<?php
}


/* Header/Page Title Options */
function progression_studios_page_title() {
	global $post;
?>
	class="
		<?php if(is_page() && get_post_meta($post->ID, 'progression_studios_page_sidebar', true) == 'right-sidebar' || is_page() && get_post_meta($post->ID, 'progression_studios_page_sidebar', true) ==  'left-sidebar' ) : ?> progression-studios-page-sidebar-on<?php endif; ?>
		<?php if ( ! is_active_sidebar( 'progression-studios-sidebar') ) : ?> no-active-sidebar-progression-studios<?php endif; ?>
		progression-studios-page-title-<?php echo esc_attr( get_theme_mod('progression_studios_page_title_align', 'center') ); ?>
		<?php if ( get_theme_mod( 'progression_studios_header_force_transparent', 'false') == 'true') : ?> progression-studios-overlay-header<?php endif; ?>
		<?php if ( get_theme_mod( 'progression_studios_header_box_shadow', 'true') == 'true') : ?> progression-studios-header-shadow<?php endif; ?>
		<?php if ( get_theme_mod( 'progression_studios_mobile_header_transparent') == 'transparent') : ?> progression-studios-mobile-transparent-header<?php endif; ?>
		<?php echo esc_attr( get_theme_mod( 'progression_studios_header_width', 'progression-studios-header-normal-width') ); ?> 
		<?php if ( get_theme_mod( 'progression_studios_post_page_title_align', 'center') == 'center') : ?> progression-studios-blog-post-title-center<?php endif; ?>
		<?php if ( get_theme_mod( 'progression_studios_nav_search', 'on') == 'off') : ?> progression-studios-search-icon-off<?php endif; ?>
		<?php if ( get_theme_mod( 'progression_studios_nav_cart', 'off') == 'off') : ?> progression-studios-nav-cart-icon-off<?php endif; ?>
		<?php echo esc_attr( get_theme_mod( 'progression_studios_logo_position', 'progression-studios-logo-position-left') ); ?> 
		<?php echo esc_attr( get_theme_mod('progression_studios_page_title_width') ); ?> 
		<?php if(is_page() && get_post_meta($post->ID, 'progression_studios_header_disabled', true)): ?> progression-disable-header-per-page<?php endif; ?>
		<?php if(is_page() && get_post_meta($post->ID, 'progression_studios_disable_footer_per_page', true)): ?> progression-disable-footer-per-page<?php endif; ?>		
		<?php if(is_page() && get_post_meta($post->ID, 'progression_studios_disable_logo_page_title', true)): ?> progression-disable-logo-below-per-page<?php endif; ?>
		<?php if(is_page() && get_post_meta($post->ID, 'progression_studios_header_transparent_float', true)): ?> progression-studios-transparent-header<?php endif; ?>
		<?php if(is_page() && get_post_meta($post->ID, 'progression_studios_custom_page_nav_color', true)): ?> <?php echo esc_html( get_post_meta($post->ID, 'progression_studios_custom_page_nav_color', true) );?><?php endif; ?>
		<?php if(is_page() && get_post_meta($post->ID, 'progression_studios_header_transparent', true)): ?> progression-studios-transparent-header<?php endif; ?>
		<?php if ( get_theme_mod( 'progression_studios_one_page_nav') == 'on') : ?> progression-studios-one-page-nav<?php else: ?>	progression-studios-one-page-nav-off<?php endif; ?>
		<?php if (get_theme_mod( 'progression_studios_page_transition', 'transition-off-pro') == "transition-on-pro") : ?> progression-studios-preloader<?php endif; ?>
		<?php if ( get_theme_mod( 'progression_studios_sub_nav_bullet_effect', 'true') == 'false') : ?> progression-studios-sub-menu-hover-off<?php endif; ?>
	"
<?php
}


function progression_studios_navigation() {
?>
	
	<?php if (get_theme_mod( 'progression_studios_header_sticky', 'none-sticky-pro' ) == 'sticky-pro' && get_theme_mod( 'progression_studios_logo_position', 'progression-studios-logo-position-left' ) == 'progression-studios-logo-position-center' ) : ?><div id="progression-sticky-header"><?php endif; ?>
	
	<div class="optional-centered-area-on-mobile">

		
		<?php if ( get_theme_mod( 'progression_studios_icon_position') == 'default' ) : ?><?php if (function_exists( 'progression_studios_elements_social') )  : ?><div id="progression-header-icons-inline-display"><?php progression_studios_elements_social(); ?></div><?php endif; ?><?php endif; ?>
	
		<div class="mobile-menu-icon-pro noselect"><i class="fas fa-bars"></i><?php if (get_theme_mod( 'progression_studios_mobile_menu_text') == 'on' ) : ?><span class="progression-mobile-menu-text"><?php echo esc_html__( 'Menu', 'funlin-progression' )?></span><?php endif; ?></div>
		
		<?php if ( get_theme_mod( 'progression_studios_header_phone_number') ) : ?>
		<div class="progression-header-phone-number"><i class="fas fa-phone-volume"></i><?php echo esc_attr( get_theme_mod('progression_studios_header_phone_number') ); ?></div>
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'progression_studios_nav_cart', 'off') == 'on' ) : ?>
		<?php get_template_part( 'header/shopping', 'bag' ); ?>
		<?php endif; ?>
		
		
		<div id="progression-studios-header-search-icon" class="noselect">
			<div class="progression-icon-search"></div>
			<div id="panel-search-progression">
				<?php if (class_exists('Woocommerce') && get_theme_mod( 'progression_studios_search_shop', 'shop') == 'shop' ) : ?>
					<?php get_product_search_form(); ?>
				<?php else: ?>
					<?php get_search_form(); ?>
				<?php endif ?>
				<div class="clearfix-pro"></div>
			</div>
		</div>
		

		<div id="progression-nav-container">
			<nav id="site-navigation" class="main-navigation">
				<?php wp_nav_menu( array('theme_location' => 'progression-studios-primary', 'menu_class' => 'sf-menu', 'fallback_cb' => false, 'walker'  => new ProgressionFrontendWalker ) ); ?><div class="clearfix-pro"></div>
			</nav>
			<div class="clearfix-pro"></div>
		</div><!-- close #progression-nav-container -->
		
		

		
		<div class="clearfix-pro"></div>
	</div><!-- close .width-container-pro -->
	
	<?php if (get_theme_mod( 'progression_studios_header_sticky', 'none-sticky-pro' ) == 'sticky-pro' && get_theme_mod( 'progression_studios_logo_position', 'progression-studios-logo-position-left' ) == 'progression-studios-logo-position-center' ) : ?></div><?php endif; ?>
		
<?php
}



/* Other forms and sortcodes Are Located in progression-elements-helpmeout plugin */
if (! function_exists('helpmeout_lovedlogin_form')) {
function helpmeout_lovedlogin_form(){
	$notify_text 	= wp_kses( __('Please <a href="%1$s">login</a> or <a href="%2$s">register for a new account</a> in order to love projects.', 'funlin-progression' ) , TRUE);
	$login_url 		= get_permalink( wc_get_page_id( 'myaccount' ) );
	$register_url 	= get_permalink( wc_get_page_id( 'myaccount' ) ); //get_page_link (get_option('wpneo_registration_page_id','') );
	
	$html = '<div id="helpmeeout-login-form"><div class="helpmout-bookmark-login"><i class="fas fa-lock"></i> ' . sprintf( $notify_text, $login_url, $register_url) . '</div></div>';
	return $html;
}
   
}


// Bio Data View
remove_action('wp_ajax_nopriv_wpcf_bio_action', 'wpcf_bio_campaign_action');
remove_action( 'wp_ajax_wpcf_bio_action', 'wpcf_bio_campaign_action' );

add_action( 'wp_ajax_nopriv_wpcf_bio_action', 'funlin_wpcf_bio_campaign_action' );
add_action( 'wp_ajax_wpcf_bio_action', 'funlin_wpcf_bio_campaign_action' );
function funlin_wpcf_bio_campaign_action(){
	$html = '';
	$author         = sanitize_text_field($_POST['author']);
	if( $author ){

		$user_info      = get_user_meta($author);
		$creator        = get_user_by('id', $author);
		$html .= '<div  class="wpneo-profile">';
		if( $creator->ID ){
			$img_src = '';
			$image_id = get_user_meta( $creator->ID , 'profile_image_id', true );
			if( $image_id != '' ){
				$img_src = wp_get_attachment_image_src( $image_id, 'progression-studios-contributor-image' );
				$img_src = $img_src[0];
			}
			if (!empty($img_src)){
				$html .= '<img class="profile-avatar-funlin" srcset="'.$img_src.'" alt="esc_html__( "Avatar", "funlin-progression")">';
			}
		}
		$html .= '</div>';
		$html .= '<div class="wpneo-profile-text">';
		
	  if ( get_user_meta( $creator->ID , 'first_name', true )){
	  	$html .= '<div class="helpmeout-modal-wpneo-profile-name">'. get_user_meta( $creator->ID , 'first_name', true ) .' '. get_user_meta( $creator->ID , 'last_name', true ) .'</div>';
		}else {
			$html .= '<div class="helpmeout-modal-wpneo-profile-name">'. get_the_author_meta( 'display_name', $creator->ID ) .'</div>';
  		}
		
		$location = wpcf_function()->campaign_location();
		if ($location){
			$html .= '<div class="wpneo-profile-location">';
			$html .= '<i class="wpneo-icon wpneo-icon-location"></i> <span>'.$location.'</span>';
			$html .= '</div>';
		}
		$html .= '<div class="wpneo-profile-campaigns">'.wpcf_function()->author_campaigns($author)->post_count.esc_html__( " Projects" , "funlin-progression" ).'</div>';
		$html .= '</div></div class="clearfix-pro"</div>';

		if ( ! empty($user_info['profile_about'][0])){
			$html .= '<div class="wpneo-profile-about">';
			$html .= '<h3>'.esc_html__("About","funlin-progression").'</h3>';
			$html .= '<p>'.$user_info['profile_about'][0].'</p>';
			$html .= '</div>';
		}

		if ( ! empty($user_info['profile_portfolio'][0])){
			$html .= '<div class="wpneo-profile-about">';
			$html .= '<h3>'.esc_html__("Portfolio","funlin-progression").'</h3>';
			$html .= '<p>'.$user_info['profile_portfolio'][0].'</p>';
			$html .= '</div>';
		}
		
		if ( ! empty($user_info['profile_email1'][0]) || ! empty($user_info['profile_mobile1'][0]) || ! empty($user_info['profile_fax'][0]) || ! empty($user_info['profile_website'][0])|| ! empty($user_info['profile_email1'][0]) ){
		$html .= '<div class="wpneo-profile-about">';
		$html .= '<h3>'.esc_html__("Contact Details","funlin-progression").'</h3>';
		if ( ! empty($user_info['profile_email1'][0])){
			$html .= '<p>'.esc_html__("Email: ","funlin-progression").$user_info['profile_email1'][0].'</p>';
		}
		if ( ! empty($user_info['profile_mobile1'][0])){
			$html .= '<p>'.esc_html__("Phone: ","funlin-progression").$user_info['profile_mobile1'][0].'</p>';
		}
		if ( ! empty($user_info['profile_fax'][0])){
			$html .= '<p>'.esc_html__("Fax: ","funlin-progression").$user_info['profile_fax'][0].'</p>';
		}
		if ( ! empty($user_info['profile_website'][0])){
			$html .= '<p>'.esc_html__("Website: ","funlin-progression").' <a href="'.wpcf_function()->url($user_info['profile_website'][0]).'"> '.wpcf_function()->url($user_info['profile_website'][0]).' </a></p>';
		}
		$html .= '</div>';
		}
		
		if ( ! empty($user_info['profile_facebook'][0]) || ! empty($user_info['profile_twitter'][0]) || ! empty($user_info['profile_plus'][0]) || ! empty($user_info['profile_linkedin'][0]) || ! empty($user_info['profile_pinterest'][0])){
		$html .= '<div class="wpneo-profile-about">';
		$html .= '<h3>'.esc_html__("Social Links","funlin-progression").'</h3>';
		if ( ! empty($user_info['profile_facebook'][0])){
			$html .= '<a class="wpcf-social-link" href="'.$user_info["profile_facebook"][0].'"><i class="fab fa-facebook-square"></i></a>';
		}
		if ( ! empty($user_info['profile_twitter'][0])){
			$html .= '<a class="wpcf-social-link" href="'.$user_info["profile_twitter"][0].'"><i class="fab fa-twitter"></i></a>';
		}
		if ( ! empty($user_info['profile_vk'][0])){
			$html .= '<a class="wpcf-social-link" href="'.$user_info["profile_vk"][0].'"><i class="fab fa-vk"></i></a>';
		}
		if ( ! empty($user_info['profile_linkedin'][0])){
			$html .= '<a class="wpcf-social-link" href="'.$user_info["profile_linkedin"][0].'"><i class="fab fa-linkedin"></i></a>';
		}
		if ( ! empty($user_info['profile_pinterest'][0])){
			$html .= '<a class="wpcf-social-link" href="'.$user_info["profile_pinterest"][0].'"><i class="fab fa-pinterest"></i></a>';
		}
		$html .= '</div>';
	}
	
		$title = esc_html__("About the project creator","funlin-progression");

		die(json_encode(array('success'=> 1, 'message' => $html, 'title' => $title )));
	}
}




function progression_studios_blog_link() {
	global $post;
?>

	<?php if(get_post_meta($post->ID, 'progression_studios_blog_featured_image_link', true) == 'progression_link_url'): ?>
		
		<a href="<?php echo esc_url( get_post_meta($post->ID, 'progression_studios_external_link', true) );?>">
			
		<?php else: ?>
			
		<?php if(get_post_meta($post->ID, 'progression_studios_blog_featured_image_link', true) == 'progression_link_url_new_window'): ?>
			
			<a href="<?php echo esc_url( get_post_meta($post->ID, 'progression_studios_external_link', true) );?>" target="_blank">
			
			<?php else: ?>
				
				<?php if(get_post_meta($post->ID, 'progression_studios_blog_featured_image_link', true) == 'progression_link_lightbox'): ?>
					
					<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); ?>
					<a href="<?php echo esc_attr($image[0]);?>">
						
					<?php else: ?>

						<a href="<?php the_permalink(); ?>">
					
					<?php endif; ?>
						
		<?php endif; ?>
		
	<?php endif; ?>
	
<?php
}



function progression_studios_blog_title_link() {
	global $post;
?>

	<?php if(get_post_meta($post->ID, 'progression_studios_blog_featured_image_link', true) == 'progression_link_url'): ?>
		
		<a href="<?php echo esc_url( get_post_meta($post->ID, 'progression_studios_external_link', true) );?>">
			
		<?php else: ?>
			
		<?php if(get_post_meta($post->ID, 'progression_studios_blog_featured_image_link', true) == 'progression_link_url_new_window'): ?>
			
			<a href="<?php echo esc_url( get_post_meta($post->ID, 'progression_studios_external_link', true) );?>" target="_blank">
			
			<?php else: ?>
				

						<a href="<?php the_permalink(); ?>">
					
				
		<?php endif; ?>
		
	<?php endif; ?>
	
<?php
}


function progression_studios_continue_reading_link() {
	global $post;
?>

	<?php if(get_post_meta($post->ID, 'progression_studios_blog_featured_image_link', true) == 'progression_link_url'): ?>
		
		<a href="<?php echo esc_url( get_post_meta($post->ID, 'progression_studios_external_link', true) );?>" class="more-link">
			
		<?php else: ?>
			
		<?php if(get_post_meta($post->ID, 'progression_studios_blog_featured_image_link', true) == 'progression_link_url_new_window'): ?>
			
			<a href="<?php echo esc_url( get_post_meta($post->ID, 'progression_studios_external_link', true) );?>" target="_blank" class="more-link">
			
			<?php else: ?>
				

						<a href="<?php the_permalink(); ?>" class="more-link">
					
				
		<?php endif; ?>
		
	<?php endif; ?>
	
<?php
}



/* remove more link jump */
function progression_studios_remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'progression_studios_remove_more_link_scroll' );




if ( ! function_exists( 'progression_studios_show_pagination_links_pro' ) ) :
function progression_studios_show_pagination_links_pro()
{
    global $wp_query;

    $page_tot   = $wp_query->max_num_pages;
    $page_cur   = get_query_var( 'paged' );
    $big        = 999999999;

    if ( $page_tot == 1 ) return;

    echo paginate_links( array(
            'base'      => str_replace( $big, '%#%',get_pagenum_link( 999999999, false ) ), // need an unlikely integer cause the url can contains a number
            'format'    => '?paged=%#%',
            'current'   => max( 1, $page_cur ),
            'total'     => $page_tot,
            'prev_next' => true,
				'prev_text'    => '<span>' . esc_html__('&lsaquo; Previous', 'funlin-progression') . '</span>',
				'next_text'    => '<span>' . esc_html__('Next &rsaquo;', 'funlin-progression'). '</span>',
            'end_size'  => 1,
            'mid_size'  => 2,
            'type'      => 'list'
        )
    );
}
endif;



if ( ! function_exists( 'progression_studios_show_pagination_links_blog' ) ) :
function progression_studios_show_pagination_links_blog()
{	
    global $blogloop;

    $page_tot   = $blogloop->max_num_pages;
	 if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {   $paged = get_query_var('page'); } else {  $paged = 1; }
    $big        = 999999999;

    if ( $page_tot == 1 ) return;

    echo paginate_links( array(
            'base'      => str_replace( $big, '%#%',get_pagenum_link( 999999999, false ) ), // need an unlikely integer cause the url can contains a number
            'format'    => '?paged=%#%',
            'current'   => max( 1, $paged ),
            'total'     => $page_tot,
            'prev_next' => true,
				'prev_text'    => '<span>' . esc_html__('&lsaquo; Previous', 'funlin-progression') . '</span>',
				'next_text'    => '<span>' . esc_html__('Next &rsaquo;', 'funlin-progression'). '</span>',
            'end_size'  => 1,
            'mid_size'  => 2,
            'type'      => 'list'
        )
    );
}
endif;




if ( ! function_exists( 'progression_studios_infinite_content_nav_pro' ) ) :
function progression_studios_infinite_content_nav_pro( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<div id="infinite-nav-pro-default" class="infinite-nav-pro">
			<div class="nav-previous"><?php next_posts_link( wp_kses( __('Load More <span><i class="fas fa-chevron-circle-down"></i>', 'funlin-progression' ) , TRUE) ); ?></div>
		</div>
	<?php endif;
}
endif;






function progression_studios_category_title( $title ) {
   if ( is_category() ) {

           $title = single_cat_title( '', false );

       } elseif ( is_tag() ) {

           $title = single_tag_title( '', false );

       }

   return $title;
}
add_filter( 'get_the_archive_title', 'progression_studios_category_title' );



/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function progression_studios_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'progression_studios_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'progression_studios_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so progression_studios_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so progression_studios_categorized_blog should return false.
		return false;
	}
}



/**
 * Flush out the transients used in progression_studios_categorized_blog.
 */
function progression_studios_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'progression_studios_categories' );
}
add_action( 'edit_category', 'progression_studios_category_transient_flusher' );
add_action( 'save_post',     'progression_studios_category_transient_flusher' );
