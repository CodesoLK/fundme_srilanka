<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package pro
 */

get_header(); ?>

<?php if (get_theme_mod( 'progression_studios_error_elementor_library') && !is_singular( 'elementor_library') ) : ?>
	
	<div id="progression-studios-404-error-elementor">
		<?php
		if( function_exists( 'elementor_load_plugin_textdomain' ) ) {
		$progression_studios_elementor_404_instance = Elementor\Plugin::instance();
		echo $progression_studios_elementor_404_instance->frontend->get_builder_content_for_display( get_theme_mod( 'progression_studios_error_elementor_library') );
		}
		?>
	</div>
	
<?php else: ?>

	<div id="page-title-pro">
		<div id="progression-studios-page-title-container">
			<div class="width-container-pro">
				<h1 class="page-title"><?php esc_html_e( '404 Error', 'funlin-progression' ); ?></h1>
				<?php if(function_exists('bcn_display')) { echo '<ul id="breadcrumbs-progression-studios"><li><a href="'; echo esc_url( home_url( '/' ) ); echo '">'; echo esc_html__( 'Home', 'funlin-progression' ); echo '</a></li>'; bcn_display_list(); echo '</ul>'; }?>
			</div>
			<div class="clearfix-pro"></div>
		</div>
		<div id="page-title-overlay-image"></div>
	</div><!-- #page-title-pro -->

	
	<div id="content-pro">

		<div class="width-container-pro">
			<div class="clearfix-pro"></div>
			<div id="error-page-index">
			
				<h4 class="error-sub-title"><?php esc_html_e( "We couldn&rsquo;t find the page you&rsquo;re looking for.", 'funlin-progression' ); ?></h4>
			
				<p><?php esc_html_e( "Try using the navigation menu at the top or going back to the homepage. ", 'funlin-progression' ); ?></p>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button"><?php esc_html_e( "Back to Home", 'funlin-progression' ); ?></a>

		<div class="clearfix-pro"></div>
		</div><!-- close #error-page-index -->
		
		</div><!-- close .width-container-pro -->
	</div><!-- #content-pro -->

<?php endif; ?>

<?php get_footer(); ?>