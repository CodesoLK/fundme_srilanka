<?php
defined( 'ABSPATH' ) || exit;

$raised_percent = wpcf_function()->get_fund_raised_percent_format();
$end_method = get_post_meta(get_the_ID(), 'wpneo_campaign_end_method', true);

?>
<div class="clearfix-pro"></div>

<div id="funlin-raised-bar-single">
	<div class="wpneo-raised-bar">
	    <div class="neo-progressbar">
	        <?php $css_width = wpcf_function()->get_raised_percent(); if( $css_width >= 100 ){ $css_width = 100; } ?>
	        <div style="width: <?php echo esc_attr($css_width); ?>%"></div>
	    </div>
	</div>
</div><!-- close #raised-bar-single-funline -->


<div id="funlin-raised-percentage-single" ><?php echo esc_attr($raised_percent); ?></div>

<div id="funlin-funding-numbers"><span class="funlin-funding-highlight"><?php echo wpcf_function()->price(wpcf_function()->fund_raised()); ?></span> <?php esc_attr_e('raised of', 'funlin-progression') ?> <?php echo wpcf_function()->price(wpcf_function()->total_goal(get_the_ID())); ?> <?php esc_attr_e('goal', 'funlin-progression') ?>
</div>