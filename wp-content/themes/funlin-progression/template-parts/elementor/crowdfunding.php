<?php
/**
 * @package pro
 */

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div class="funlin-progression-crowdfunding-elementor<?php if ( $settings['progression_studios_display_percent_raised'] != 'yes') : ?> funlin-hide-percent-raised<?php endif; ?><?php if ( $settings['progression_studios_display_text_raised'] != 'yes') : ?> funlin-hide-text-raised<?php endif; ?><?php if ( $settings['progression_studios_display_days_to_go'] != 'yes') : ?> funlin-hide-days-to-go<?php endif; ?>">
	<?php if ( $product->is_type( 'crowdfunding' )) : ?>
		
		<div class="progression-studios-index-shadow">
			<div class="progression-studios-store-product-image-container">
				<?php if(has_post_thumbnail()): ?>
				<a href="<?php the_permalink(); ?>" class="progression-studios-store-image-index">
					<?php the_post_thumbnail('woocommerce_thumbnail'); ?>
				</a>
				<?php endif; ?>
				
				<?php if ( $settings['progression_studios_display_cat'] == 'yes') : ?>
				<?php 
					$terms_cat = get_the_terms( $post->ID , 'product_cat' ); 
					if ( !empty( $terms_cat ) ) :
						echo '<ul class="funlin-shop-index-category">';
					foreach ( $terms_cat as $term_single ) {
						$term_link = get_term_link( $term_single, 'product_cat' );
						if( is_wp_error( $term_link ) )
							continue;
						echo '<li><a href="' . $term_link . '">' . $term_single->name . '</a></li>';
					} 
					echo '</ul>';
				endif;
				?>
				<?php endif; ?>
				
				<?php if ( $settings['progression_studios_display_author_avatar'] == 'yes') : ?>
				<div class="progression-studios-shop-author-avatar"><a href="<?php echo wpcf_function()->get_author_url( get_the_author_meta( 'user_login' ) ); ?>"><?php if ( $post->post_author ) {
	            $img_src    = '';
	            $image_id = get_user_meta( $post->post_author,'profile_image_id', true );
	            if( $image_id != '' ){
	                $img_src = wp_get_attachment_image_src( $image_id, 'progression-studios-contributor-image' )[0];
	            } ?>
	            <?php if( $img_src ){ ?>
	                <img src="<?php echo esc_attr($img_src); ?>" alt="<?php echo esc_html__( 'Avatar', 'funlin-progression') ?>">
	            <?php } else { ?>
	                <?php echo get_avatar($post->post_author, 80); ?>
	            <?php } ?>
	        <?php } ?></a></div>
			  <?php endif; ?>
			
			</div><!-- close .progression-studios-store-product-image-container -->

			<div class="progression-studios-shop-index-text">
				<?php if ( $settings['progression_studios_display_author_text'] == 'yes') : ?><div class="progression-studios-shop-author-byline"><?php esc_attr_e('by','funlin-progression'); ?> <a href="<?php echo wpcf_function()->get_author_url( get_the_author_meta( 'user_login' ) ); ?>"><?php echo wpcf_function()->get_author_name(); ?></a></div><?php endif; ?>
					
				<?php do_action('wpneo_campaign_loop_item_content'); ?>
				<div class="clearfix-pro"></div>

				<div class="progression-studios-shop-overlay-buttons">
					<?php do_action('wpneo_campaign_loop_item_after_content'); ?>
				</div><!-- close .progression-studios-shop-overlay-buttons -->
			
			</div><!-- close .progression-studios-shop-overlay-buttons -->
		</div><!-- close .progression-studios-index-shadow -->
		
	<?php else: ?>
		<div class="progression-studios-index-shadow">
			<div class="progression-studios-store-product-image-container">
				<a href="<?php the_permalink(); ?>" class="progression-studios-store-image-index">
					<?php the_post_thumbnail('woocommerce_thumbnail'); ?>
				</a>
				
				<?php 
					$terms_cat = get_the_terms( $post->ID , 'product_cat' ); 
					if ( !empty( $terms_cat ) ) :
						echo '<ul class="funlin-shop-index-category">';
					foreach ( $terms_cat as $term_single ) {
						$term_link = get_term_link( $term_single, 'product_cat' );
						if( is_wp_error( $term_link ) )
							continue;
						echo '<li><a href="' . $term_link . '">' . $term_single->name . '</a></li>';
					} 
					echo '</ul>';
				endif;
				?>
			</div><!-- close .progression-studios-store-product-image-container -->
	
			<div class="progression-studios-shop-index-text">

				<a href="<?php the_permalink(); ?>" class="progression-studios-view-permalink">
					<?php do_action( 'woocommerce_shop_loop_item_title' ); ?><!-- title -->
					<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?><!-- rating and price -->
					<div class="clearfix-pro"></div>
				</a>

				<div class="progression-studios-shop-overlay-buttons">
					<?php do_action( 'woocommerce_after_shop_loop_item' ); ?><!--  add to cart -->
				</div><!-- close .progression-studios-shop-overlay-buttons -->
			</div><!-- close .progression-studios-shop-overlay-buttons -->
		</div><!-- close .progression-studios-index-shadow -->

	<?php endif; ?>
</div><!-- close .funlin-progression-crowdfunding-elementor -->