<?php
defined( 'ABSPATH' ) || exit;
get_header('shop');

do_action( 'wpcf_before_single_campaign' );


?>

	<?php
	$your_shop_page = get_post( wc_get_page_id( 'shop' ) );
	if ( apply_filters( 'woocommerce_show_page_title', true ) && $your_shop_page  ) : ?>
		<div id="page-title-pro">
				<div id="progression-studios-page-title-container">
					<div class="width-container-pro">
					<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
					<?php if(get_post_meta($your_shop_page->ID, 'progression_studios_sub_title', true)): ?><h4 class="progression-sub-title"><?php echo esc_html( get_post_meta($your_shop_page->ID, 'progression_studios_sub_title', true) );?></h4><?php endif; ?>
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


<?php
if ( post_password_required() ) {
	echo '<div class="width-container-pro">';
	echo get_the_password_form();
	echo '</div>';
	return;
}
?>


<div class="wpneo-wrapper">
    <div class="width-container-pro">
        <div id="primary" class="content-area">
            <div id="content" class="site-content" role="main">
                <div class="wpneo-list-details">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php do_action( 'wpcf_before_main_content' ); ?>
                        <div itemscope itemtype="http://schema.org/ItemList" id="campaign-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <?php do_action( 'wpcf_before_single_campaign_summary' ); ?>
                            <div class="wpneo-campaign-summary">
                                <div class="wpneo-campaign-summary-inner" itemscope itemtype="http://schema.org/DonateAction">
                                    <?php do_action( 'wpcf_single_campaign_summary' ); ?>
                                </div><!-- .wpneo-campaign-summary-inner -->
                            </div><!-- .wpneo-campaign-summary -->
                            <?php do_action( 'wpcf_after_single_campaign_summary' ); ?>
                            <meta itemprop="url" content="<?php the_permalink(); ?>" />
                        </div><!-- #campaign-<?php the_ID(); ?> -->
                        <?php do_action( 'wpcf_after_single_campaign' ); ?>
                        <?php do_action( 'wpcf_after_main_content' ); ?>
                    <?php endwhile; // end of the loop. ?>
                </div>
            </div><!-- #content -->
        </div><!-- #primary -->
    </div>
</div>


<?php if ( get_theme_mod( 'progression_studios_related_products', 'block') == 'block') : ?>
	<?php  $terms = get_the_terms( $post->ID , 'product_cat' );  if ( !empty( $terms ) ) :?>
	<?php
	global $post;

	$terms = get_the_terms( $post->ID , 'product_cat' ); 
	$term_ids = array_values( wp_list_pluck( $terms,'term_id' ) );
	
	$args=array(
	'post_type' => 'product',
	'posts_per_page'=> '3', // Number of related posts that will be displayed.
	'orderby'=>'rand', // Randomize the posts
	'post__not_in' => array( $post->ID ),
	'tax_query' => array(
	        array(
	            'taxonomy'  => 'product_cat',
	            'terms'     => $term_ids,
				'field' => 'id',
	            'operator'  => 'IN'
	        )
	    ),	
	);
	
	$rel_query = new WP_Query( $args ); if( $rel_query->have_posts() ) : 

	?>
	
		<div id="progression-studios-related-campaigns">
			<div class="width-container-pro">

					<div class="woocommerce">
						<h2 class="related-campaings-title"><?php esc_html_e( 'Related Projects', 'funlin-progression' ); ?></h2>
						<div id="related-campaings-sub-title"><?php esc_html_e( 'Discover projects just for you and get great recommendations when you select your interests.', 'funlin-progression' ); ?></div>
						
						 <ul class="products columns-3">
	 						<?php  while ( $rel_query->have_posts() ) : $rel_query->the_post(); ?>
								<?php if ( $product->is_type( 'crowdfunding' )) : ?>
								<li class="product type-product">
	
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
								<li class="product type-product">
		
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
	 						<?php endwhile; ?>
						</ul><!-- close .progression-masonry-margins -->
			
						<div class="clearfix-pro"></div>
					</div>

			</div><!-- .width-container-pro -->
		</div>
	<?php endif;			wp_reset_postdata();  ?>
<?php endif; ?>
<?php endif; ?>

<?php get_footer('shop'); ?>