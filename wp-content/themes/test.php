<div class="products">
    <?php
        $args = array( 'post_type' => 'product', 'posts_per_page' => 3);
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
          	<div class="product col-md-4 col-sm-6 col-xs-12">
            <div class="prouct-img">
             <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
               <?php
                woocommerce_show_product_sale_flash( $post, $product );
                  if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog');
                  else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />'; ?>
            </div>
            <div class="product-title">
             <?php the_title( '<h3>', '</h3>' ); ?>
             </a>
            </div>
	           <div class="produt-price">
              <?php echo '<span class="price">'. $product->get_price_html() .'</span>'; 	              	?>
            </div>          	
            <div class="button-cart">
             <?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>
            </div>            
        	</div>
    	<?php endwhile;
    	wp_reset_query(); 
    ?>
</div>