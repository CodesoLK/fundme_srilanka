<?php
defined( 'ABSPATH' ) || exit;
global $post;
//the_content();


$campaign_rewards   = get_post_meta($post->ID, 'wpneo_reward', true);
$campaign_rewards   = stripslashes($campaign_rewards);
$campaign_rewards_a = json_decode($campaign_rewards, true);

?>


<div <?php if( is_array($campaign_rewards_a) ): ?><?php if(count($campaign_rewards_a) > 0): ?>class="funlin-tab-campaign-story-left"<?php endif; ?><?php endif; ?>>
    <?php the_content(); ?>
</div>

<?php do_action('wpcf_campaign_story_right_sidebar'); ?>



<div clas="clearfix-pro"></div>

<?php


?>