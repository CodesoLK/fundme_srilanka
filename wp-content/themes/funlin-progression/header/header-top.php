<div id="funlin-progression-header-top" class="<?php echo esc_attr(get_theme_mod('progression_studios_mobile_top_bar_left', 'progression_studios_hide_top_left_bar')); ?> <?php echo esc_attr(get_theme_mod('progression_studios_mobile_top_bar_right', 'progression_studios_hide_top_left_right')); ?>">
	
		<div id="progression-studios-header-top-border-bottom">
			<div class="width-container-pro">
		<div class="progression-studios-header-left">
			<?php wp_nav_menu( array('theme_location' => 'progression-studios-header-top-left', 'container_id' => 'progression-header-top-left-container', 'menu_class' => 'sf-menu', 'fallback_cb' => false, 'walker'  => new ProgressionFrontendWalker ) ); ?>
			<?php dynamic_sidebar( 'progression-studios-header-top-left' ); ?>
			
			<?php if ( get_theme_mod( 'progression_studios_icon_position') == 'header-top-left' ) : ?><?php if (function_exists( 'progression_studios_elements_social') )  : ?><?php progression_studios_elements_social(); ?><?php endif; ?><?php endif; ?>
			
			<div class="clearfix-pro"></div>
		</div>

		<div class="progression-studios-header-right">
			<?php if ( get_theme_mod( 'progression_studios_icon_position', 'header-top-hidden') == 'header-top-right' ) : ?><?php if (function_exists( 'progression_studios_elements_social') )  : ?><?php progression_studios_elements_social(); ?><?php endif; ?><?php endif; ?>
			<?php dynamic_sidebar( 'progression-studios-header-top-right' ); ?>
			<?php wp_nav_menu( array('theme_location' => 'progression-studios-header-top-right', 'container_id' => 'progression-header-top-right-container', 'menu_class' => 'sf-menu', 'fallback_cb' => false, 'walker'  => new ProgressionFrontendWalker ) ); ?>
			<div class="clearfix-pro"></div>
		</div>
		
		<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
		
		</div><!-- close #progression-studios-header-top-border-bottom -->
</div><!-- close #header-top -->