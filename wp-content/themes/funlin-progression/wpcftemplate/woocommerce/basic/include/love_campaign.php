<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
global $post;
$campaign_id = $post->ID;
?>
	
	<?php if ( is_user_logged_in() ) : ?>
	<div id="campaign_loved_html" class="noselect">
  	  <?php wpcf_function()->campaign_loved(); ?>
	</div>
	
	<?php else: ?>
  		<div id="campaign_loved_html" class="helpmeout-login-book-mark-message noselect">
  		    <div id="helpmeout-pop-up"><i class="wpneo-icon wpneo-icon-love-empty"></i></div>
  		</div>
  	 	<?php echo helpmeout_lovedlogin_form(); ?>
	<?php endif; ?>
	
