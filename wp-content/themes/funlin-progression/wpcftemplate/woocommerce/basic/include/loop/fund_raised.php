<?php
defined( 'ABSPATH' ) || exit;
$raised_percent = wpcf_function()->get_fund_raised_percent_format();
$raised = 0;
$total_raised = wpcf_function()->get_total_fund();
if ($total_raised){
    $raised = $total_raised;
}
?>
	<div class="progression-studios-fund-raised"><?php echo wc_price($raised); ?></div>


<?php
defined( 'ABSPATH' ) || exit;
global $post;
$funding_goal = get_post_meta($post->ID, '_nf_funding_goal', true);
?>
	<div class="progression-studios-funding-goal"><?php esc_attr_e('raised of', 'funlin-progression'); ?> <?php echo wc_price( $funding_goal ); ?></div>



<?php
defined( 'ABSPATH' ) || exit;
$days_remaining = apply_filters('date_expired_msg', esc_html__('0', 'funlin-progression'));
if (wpcf_function()->get_date_remaining()){
    $days_remaining = apply_filters('date_remaining_msg', wpcf_function()->get_date_remaining() );
}

$end_method = get_post_meta(get_the_ID(), 'wpneo_campaign_end_method', true);

if ($end_method != 'never_end'){ ?>
    <div class="progression-studios-index-time-remaining">
        <?php if (wpcf_function()->is_campaign_started()){ ?>
            <i class="far fa-clock"></i><?php echo wpcf_function()->get_date_remaining(); ?> <?php esc_attr_e( 'Days to go','funlin-progression' ); ?>
        <?php } else { ?>
            <i class="far fa-clock"></i><?php echo wpcf_function()->days_until_launch(); ?> <?php esc_attr_e( 'Days Until Launch','funlin-progression' ); ?>
        <?php } ?>
    </div>
<?php } ?>