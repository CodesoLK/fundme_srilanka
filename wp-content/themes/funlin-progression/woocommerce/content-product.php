<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>


<?php if ( $product->is_type( 'crowdfunding' )) : ?>
<li <?php wc_product_class( '', $product ); ?>>
	
	<div class="progression-studios-index-shadow">
		<div class="progression-studios-store-product-image-container">
			<a href="<?php the_permalink(); ?>" class="progression-studios-store-image-index">
				<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
				<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?><!-- image -->
			</a>
			
			<?php if (get_theme_mod( 'progression_studios_category_display', 'block') == 'block') : ?>
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
			
		</div><!-- close .progression-studios-store-product-image-container -->

		<div class="progression-studios-shop-index-text">
			<div class="progression-studios-shop-author-byline"><?php esc_attr_e('by','funlin-progression'); ?> <a href="<?php echo wpcf_function()->get_author_url( get_the_author_meta( 'user_login' ) ); ?>"><?php echo wpcf_function()->get_author_name(); ?></a></div>
			<?php do_action('wpneo_campaign_loop_item_content'); ?>
			<div class="clearfix-pro"></div>

			<div class="progression-studios-shop-overlay-buttons">
				<?php do_action('wpneo_campaign_loop_item_after_content'); ?>
			</div><!-- close .progression-studios-shop-overlay-buttons -->
			
		</div><!-- close .progression-studios-shop-overlay-buttons -->
	</div><!-- close .progression-studios-index-shadow -->
	
	
</li>
<?php else: ?>
<li <?php wc_product_class( '', $product ); ?>>
		
		<div class="progression-studios-index-shadow">
			<div class="progression-studios-store-product-image-container">
				<a href="<?php the_permalink(); ?>" class="progression-studios-store-image-index">
					<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
					<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?><!-- image -->
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

</li>
<?php endif; ?>