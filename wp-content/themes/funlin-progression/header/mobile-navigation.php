
		<div id="main-nav-mobile">
			
			<?php if ( is_active_sidebar( 'progression-studios-sidebar-personal' ) ) : ?>
			<div class="bpm-progression-sidebar-tablet-mobile">
					<?php dynamic_sidebar( 'progression-studios-sidebar-personal' ); ?>
					<div class="clearfix-pro"></div>
			</div><!-- close .bpm-progression-sidebar-container -->
			<?php endif; ?>
			

			<?php if ( has_nav_menu( 'progression-studios-mobile-menu' ) ):  ?>
				<?php wp_nav_menu( array('theme_location' => 'progression-studios-mobile-menu', 'menu_class' => 'mobile-menu-pro', 'fallback_cb' => false, 'walker'  => new ProgressionFrontendWalker ) ); ?>
			<?php else: ?>
				<?php wp_nav_menu( array('theme_location' => 'progression-studios-primary', 'menu_class' => 'mobile-menu-pro', 'fallback_cb' => false, 'walker'  => new ProgressionFrontendWalker ) ); ?>
			<?php endif; ?>
			
			
			<?php if ( get_theme_mod( 'progression_studios_icon_position') == 'default' ) : ?><?php if (function_exists( 'progression_studios_elements_social') )  : ?><div id="progression-header-icons-inline-mobile-display"><?php progression_studios_elements_social(); ?></div><?php endif; ?><?php endif; ?>
			
			
									
			<div class="clearfix-pro"></div>
		</div><!-- close #mobile-menu-container -->