<?php
defined( 'ABSPATH' ) || exit;
global $post;
$campaign_rewards   = get_post_meta($post->ID, 'wpneo_reward', true);
$campaign_rewards   = stripslashes($campaign_rewards);
$campaign_rewards_a = json_decode($campaign_rewards, true);
if (is_array($campaign_rewards_a)) {
	if (count($campaign_rewards_a) > 0) {

		$i      = 0;
		$amount = array();
		echo '<div class="funlin-tab-campaign-story-right">';
		echo '<h2>'. esc_html__('Rewards', 'funlin-progression') .'</h2>';
		foreach ($campaign_rewards_a as $key => $row) {
			$amount[$key] = $row['wpneo_rewards_pladge_amount'];
		}
		array_multisort($amount, SORT_ASC, $campaign_rewards_a);

		foreach ($campaign_rewards_a as $key => $value) {
			$key++;
			$i++;
			$quantity = '';

			$funlinpost_id    = get_the_ID();
			$min_data   = $value['wpneo_rewards_pladge_amount'];
			$max_data   = '';
			$orders     = 0;
			( ! empty($campaign_rewards_a[$i]['wpneo_rewards_pladge_amount']))? ( $max_data = $campaign_rewards_a[$i]['wpneo_rewards_pladge_amount'] - 1 ) : ($max_data = 9000000000);
			if( $min_data != '' ){
				$orders = wpcf_campaign_order_number_data( $min_data,$max_data,$funlinpost_id );
			}
			if( $value['wpneo_rewards_item_limit'] ){
				$quantity = 0;
				if( $value['wpneo_rewards_item_limit'] >= $orders ){
					$quantity = $value['wpneo_rewards_item_limit'] - $orders;
				}
			}
			?>
            <div class="tab-rewards-wrapper<?php echo esc_html(( $quantity === 0 )) ? ' disable' : ''; ?>">
                <div class="wpneo-clearfix">
                    <h3>
							 
						<?php
						if (function_exists('wc_price')) {
							echo wc_price($value['wpneo_rewards_pladge_amount']);
							if( 'true' != get_option('wpneo_reward_fixed_price','') ){
								echo ( ! empty($campaign_rewards_a[$i]['wpneo_rewards_pladge_amount']))? ' - '. wc_price($campaign_rewards_a[$i]['wpneo_rewards_pladge_amount'] - 1) :  "<span class='or-more-funlin'>" . esc_html__(" or more", 'funlin-progression') .  "</span>";
							}
						}
						?>
                    </h3>
                    <div class="funlin-reward-description"><?php echo html_entity_decode($value['wpneo_rewards_description']); ?></div>
					<?php if( $value['wpneo_rewards_image_field'] ){ ?>
                        <div class="wpneo-rewards-image">
							<?php echo '<img src="'.wp_get_attachment_url( $value["wpneo_rewards_image_field"] ).'"/>'; ?>
                        </div>
					<?php } ?>

					<?php
					if ( ! empty($value['wpneo_rewards_endmonth']) || ! empty($value['wpneo_rewards_endyear'])){
						$month = date_i18n("F", strtotime($value['wpneo_rewards_endmonth']));
						$funlinyear = date_i18n("Y", strtotime($value['wpneo_rewards_endyear'].'-'.$month.'-15'));

						echo "<h4>{$month}, {$funlinyear}</h4>";
						echo '<div class="estimated-delivery-reward-funlin">'.esc_html__('Estimated Delivery', 'funlin-progression').'</div>';
					}
					?>

					<?php
					if( $min_data != '' ){
						echo '<div class="reward-backers-award-list"><i class="far fa-user-circle"></i>'.$orders.' '.esc_html__('backers','funlin-progression').'</div>';
					} ?>
					<?php if( $value['wpneo_rewards_item_limit'] ){ ?>
                        <div class="reward-backers-award-list"><i class="fas fa-award"></i>
							<?php
							echo esc_html($quantity);
							_e(' rewards left','funlin-progression');
							?>
                        </div>
					<?php } ?>
					
                    <!-- Campaign Valid -->
					<?php if (wpcf_function()->is_campaign_valid()) { ?>
						<?php if (wpcf_function()->is_campaign_started()) {
							if (get_option('wpneo_single_page_reward_design') == 1) { ?>
                                <div class="funlin-rewards-button-form">
                                    
											<?php if( $quantity === 0 ){ ?>
                                                <span class="wpneo-error"><?php esc_attr_e( 'Reward no longer available.', 'funlin-progression' ); ?></span>
											<?php } else { ?>
                                                <form enctype="multipart/form-data" method="post" class="cart">
                                                    <input type="hidden" value="<?php echo esc_attr($value['wpneo_rewards_pladge_amount']); ?>" name="wpneo_donate_amount_field" />
                                                    <input type="hidden" value='<?php echo esc_attr(json_encode($value)); ?>' name="wpneo_selected_rewards_checkout" />
                                                    <input type="hidden" value="<?php echo esc_attr($key); ?>" name="wpneo_rewards_index" />
                                                    <input type="hidden" value="<?php echo esc_attr($post->post_author); ?>" name="_cf_product_author_id">
                                                    <input type="hidden" value="<?php echo esc_attr($post->ID); ?>" name="add-to-cart">
                                                    <button type="submit" class="select_rewards_button"><?php esc_attr_e('Select Reward','funlin-progression'); ?></button>
                                                </form>
											<?php } ?>
                                      
                                </div>
							<?php } else if (get_option('wpneo_single_page_reward_design') == 2){ ?>
                                <div class="funlin-rewards-button-form tab-rewards-submit-form-style1">
									<?php if( $quantity === 0 ): ?>
                                        <span class="wpneo-error"><?php esc_attr_e( 'Reward no longer available.', 'funlin-progression' ); ?></span>
									<?php else: ?>
                                        <form enctype="multipart/form-data" method="post" class="cart">
                                            <input type="hidden" value="<?php echo esc_attr($value['wpneo_rewards_pladge_amount']); ?>" name="wpneo_donate_amount_field" />
                                            <input type="hidden" value='<?php echo esc_attr(json_encode($value)); ?>' name="wpneo_selected_rewards_checkout" />
                                            <input type="hidden" value="<?php echo esc_attr($key); ?>" name="wpneo_rewards_index" />
                                            <input type="hidden" value="<?php echo esc_attr($post->post_author); ?>" name="_cf_product_author_id">
                                            <input type="hidden" value="<?php echo esc_attr($post->ID); ?>" name="add-to-cart">
                                            <button type="submit" class="select_rewards_button"><?php esc_attr_e('Select Reward','funlin-progression'); ?></button>
                                        </form>
									<?php endif; ?>
                                </div>
							<?php } ?>
						<?php } ?>
					<?php } else { ?>
                        <div class="funlin-rewards-button-form funlin-campaign-over">
                           
                                    <h5>
										<?php if( wpcf_function()->is_reach_target_goal() ){ ?>
											<?php esc_attr_e('Campaign already completed.', 'funlin-progression'); ?>
										<?php }else{ ?>
											<?php if (wpcf_function()->is_campaign_started()){ ?>
												<?php esc_attr_e('Reward is not valid.', 'funlin-progression'); ?>
											<?php }else{ ?>
												<?php esc_attr_e('Campaign is not started.', 'funlin-progression'); ?>
											<?php } ?>
										<?php } ?>
									</h5>
                              
                        </div>
					<?php } ?>
                    <!-- Campaign Over -->

					

              </div>
            </div>
				<div class="clearfix-pro"></div>
			
			<?php
		}
		echo '</div> <!-- close .funlin-tab-campaign-story-right -->';
	}
}
?>
