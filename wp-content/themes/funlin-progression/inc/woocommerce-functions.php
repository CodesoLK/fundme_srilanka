<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package pro
 */

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

function cannaverde_progression_progression_studios_woocommerce_support() {
    add_theme_support( 'woocommerce', array(

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 1,
            'max_rows'        => 6,
            'default_columns' => 3,
            'min_columns'     => 1,
            'max_columns'     => 5,
        ),
    ) );
}
add_action( 'after_setup_theme', 'cannaverde_progression_progression_studios_woocommerce_support' );



add_theme_support( 'wc-product-gallery-slider' );
//add_theme_support( 'wc-product-gallery-lightbox' );
//add_theme_support( 'wc-product-gallery-zoom' );


/**
 * Change number of related products output
 */ 
function woo_related_products_limit() {
  global $product;
	
	$args['posts_per_page'] = 3;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'cannaverde_progression_studios_related_products_args' );
  function cannaverde_progression_studios_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 4 related products
	$args['columns'] = 3; // arranged in 2 columns
	return $args;
}


/* Adjust order of Rating */
//remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
//add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 55 );

/* Remove default shop index links */
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );



// Ajaxy Count Cart in Header
add_filter('woocommerce_add_to_cart_fragments', 'progression_studios_woocommerce_cart_fragment');
function progression_studios_woocommerce_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
	
	<div id="progression-shopping-cart-count">
	
		<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="progression-count-icon-nav"><div class="progression-icon-shopping-cart shopping-cart-header-icon"></div><?php if ( WC()->cart->get_cart_contents_count() > 0 ) : ?><span class="progression-cart-count"><?php echo sprintf(esc_html('%d', '%d', $woocommerce->cart->cart_contents_count), $woocommerce->cart->cart_contents_count);?></span><?php endif ?></a>
	
		<div id="progression-checkout-basket">
			<div id="progression-check-out-basket-container">
				<div class="ajax-cart-header">
				
					<ul id="progression-cart-small">

						<?php if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) : ?>
							<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :
								$_product = $cart_item['data'];
								// Only display if allowed
								if ( ! apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) || ! $_product->exists() || $cart_item['quantity'] == 0 )
									continue;
								// Get price
								$product_price = get_option( 'woocommerce_display_cart_prices_excluding_tax' ) == 'yes' || $woocommerce->customer->is_vat_exempt() ? $_product->get_price_excluding_tax() : $_product->get_price();
								$product_price = apply_filters( 'woocommerce_cart_item_price_html', wc_price( $product_price ), $cart_item, $cart_item_key );
								?>

								<li>
									<a href="<?php echo get_permalink( $cart_item['product_id'] ); ?>">

										<?php echo wp_kses($_product->get_image() , true); ?>

										<div class="progression-cart-small-text">
											<h6><?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?></h6>
				
											<?php echo wp_kses( wc_get_formatted_cart_item_data( $cart_item ), true ); ?>

											<span class="progression-cart-small-quantity"><?php printf( '%s &times; %s', $cart_item['quantity'], $product_price ); ?></span>
										</div>
										<div class="clearfix-pro"></div>
									</a>
								
									<?php
										echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
											'<a href="%s" class="remove-cart-header" title="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
											esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
											__( 'Remove this item', 'funlin-progression' ),
											esc_attr( $cart_item['product_id'] ),
											esc_attr( $_product->get_sku() )
										), $cart_item_key );
									?>
								
									<div class="cleafix-pro"></div>
								</li>

							<?php endforeach; ?>

						<?php else : ?>
							<li class="empty"><?php esc_html_e('No products in the cart.', 'funlin-progression'); ?></li>
						<?php endif; ?>

						</ul><!-- end product list -->
						
						<div class="cleafix-pro"></div>
						
						<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="cart-button-header-cart"><?php esc_html_e('View Cart','funlin-progression'); ?> <i class="fas fa-shopping-cart"></i></a>
						
						<div class="progression-sub-total"><?php esc_html_e('Subtotal', 'funlin-progression'); ?>: <span class="total-number-add"><?php echo wp_kses($woocommerce->cart->get_cart_subtotal(), true ); ?></span> </div>
						<div class="clearfix-pro"></div>

					</div>
				
				
				<div class="clearfix-pro"></div>
				</div><!-- close #progression-check-out-basket-container -->
			</div><!-- close #progression-checkout-basket -->
	
	</div>
		
		
	<?php
	$fragments['#progression-shopping-cart-count'] = ob_get_clean();
	return $fragments;

}
