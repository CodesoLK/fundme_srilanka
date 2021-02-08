<?php if (class_exists('Woocommerce')) : ?>
	<?php global $woocommerce; ?>
	<div id="progression-shopping-cart-toggle">
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
	</div>
<?php endif ?>