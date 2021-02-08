<?php
defined( 'ABSPATH' ) || exit;
global $post;
$user_info = get_user_meta($post->post_author);
$creator = get_user_by('id', $post->post_author);
?>
<div class="progression-studios-author-single-container">
	
	<div class="progression-studios-author-single-avatar">
		<a href="javascript:;" data-author="<?php echo esc_attr($post->post_author); ?>" class="wpneo-fund-modal-btn" >
		<?php if ( $post->post_author ) {
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
		<?php } ?>
		</a>
	</div><!-- close .progression-studios-author-single-avatar -->
	
    <div class="shop-author-title"> <?php esc_attr_e("by","funlin-progression"); ?> <a href="javascript:;" data-author="<?php echo esc_attr($post->post_author); ?>" class="wpneo-fund-modal-btn"><?php echo wpcf_function()->get_author_name(); ?></a></div>
	 <div class="shop-author-single-details"><?php echo wpcf_function()->author_campaigns($post->post_author)->post_count; ?> <?php esc_attr_e("Campaigns Created","funlin-progression"); ?><?php
defined( 'ABSPATH' ) || exit;
$location = wpcf_function()->campaign_location();
if ($location){ ?><span>|</span><?php echo esc_attr($location); ?>
<?php } ?>
	 </div>
	 <div class="clearfix-pro"></div>
</div><!-- close .progression-studios-author-single-container -->