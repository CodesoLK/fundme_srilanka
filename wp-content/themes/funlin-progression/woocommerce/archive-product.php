<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
	
	<?php
	$your_shop_page = get_post( wc_get_page_id( 'shop' ) );
	if ( apply_filters( 'woocommerce_show_page_title', true ) && $your_shop_page  ) : ?>
		<div id="page-title-pro">
				<div id="progression-studios-page-title-container">
					<div class="width-container-pro">
					<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
					<?php if(is_shop()): ?><?php if(get_post_meta($your_shop_page->ID, 'progression_studios_sub_title', true)): ?><h4 class="progression-sub-title"><?php echo esc_html( get_post_meta($your_shop_page->ID, 'progression_studios_sub_title', true) );?></h4><?php endif; ?><?php endif; ?>
					<?php if(function_exists('bcn_display')) { echo '<ul id="breadcrumbs-progression-studios"><li><a href="'; echo esc_url( home_url( '/' ) ); echo '">'; echo esc_html__( 'Home', 'funlin-progression' ); echo '</a></li>'; bcn_display_list(); echo '</ul>'; }?>
					</div><!-- close .width-container-pro -->
				</div><!-- close #progression-studios-page-title-container -->
				<div class="clearfix-pro"></div>
				<div id="page-title-overlay-image"></div>
		</div><!-- #page-title-pro -->
		<?php else: ?>
			<div id="page-title-pro">
				<div id="progression-studios-page-title-container">
					<div class="width-container-pro">
						<h1 class="page-title"><?php esc_html_e( 'Shop', 'funlin-progression' ); ?></h1>
						<?php if(function_exists('bcn_display')) { echo '<ul id="breadcrumbs-progression-studios"><li><a href="'; echo esc_url( home_url( '/' ) ); echo '">'; echo esc_html__( 'Home', 'funlin-progression' ); echo '</a></li>'; bcn_display_list(); echo '</ul>'; }?>
					</div><!-- #progression-studios-page-title-container -->
					<div class="clearfix-pro"></div>
				</div><!-- close .width-container-pro -->
				<div id="page-title-overlay-image"></div>
			</div><!-- #page-title-pro -->
	<?php endif; ?>

	
	
	<div id="content-pro">
			<div class="width-container-pro<?php
		if (  $your_shop_page  ) : ?><?php if(get_post_meta($your_shop_page->ID, 'progression_studios_page_sidebar', true) == 'left-sidebar' ) : ?> left-sidebar-pro<?php endif; ?><?php endif; ?>">
				<?php
					if (  $your_shop_page  ) : ?><?php if(get_post_meta($your_shop_page->ID, 'progression_studios_page_sidebar', true) == 'right-sidebar' || get_post_meta($your_shop_page->ID, 'progression_studios_page_sidebar', true) == 'left-sidebar' ) : ?><div id="main-container-pro"><?php endif; ?><?php endif; ?>
				
				
				<?php do_action( 'woocommerce_archive_description' ); ?>
				
				<?php
				if ( woocommerce_product_loop() ) {

					do_action( 'woocommerce_before_shop_loop' );

					woocommerce_product_loop_start();

					if ( wc_get_loop_prop( 'total' ) ) {
						while ( have_posts() ) {
							the_post();

							do_action( 'woocommerce_shop_loop' );

							wc_get_template_part( 'content', 'product' );
						}
					}

					woocommerce_product_loop_end();

					do_action( 'woocommerce_after_shop_loop' );
				} else {

					do_action( 'woocommerce_no_products_found' );
				}


				do_action( 'woocommerce_after_main_content' );


				?>
				

				<?php
					if (  $your_shop_page  ) : ?><?php if(get_post_meta($your_shop_page->ID, 'progression_studios_page_sidebar', true) == 'right-sidebar' || get_post_meta($your_shop_page->ID, 'progression_studios_page_sidebar', true) == 'left-sidebar' ) : ?>
					</div><!-- close #main-container-pro -->
					<div class="sidebar<?php if ( get_theme_mod( 'progression_studios_sticky_sidebar') == 'true') : ?> sticky-sidebar-progression<?php endif; ?>">
						<?php dynamic_sidebar( 'progression-studios-sidebar-shop' ); ?>
					</div><!-- close .sidebar -->
				<?php endif; ?>
				<?php endif; ?>

			<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
	</div><!-- #content-pro -->


<?php get_footer( 'shop' ); ?>