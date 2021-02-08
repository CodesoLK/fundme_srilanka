<?php
/**
 * The Header for our theme.
 *
 * @package pro
 * @since pro 1.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php get_template_part( 'header/social', 'sharing' ); ?>
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php get_template_part( 'header/pre', 'loader' ); ?>	
	
	<div id="boxed-layout-pro" <?php progression_studios_page_title(); ?>>

		<div id="progression-studios-header-position">
		<?php get_template_part( 'header/header', 'top' ); ?>
		
		<div id="progression-studios-header-width">
				
				<?php if (get_theme_mod( 'progression_studios_header_sticky', 'none-sticky-pro' ) == 'sticky-pro') : ?><div id="progression-sticky-header"><?php endif; ?>
				
				<header id="masthead-pro" class="progression-studios-site-header <?php echo esc_attr( get_theme_mod('progression_studios_nav_align', 'progression-studios-nav-center') ); ?>">
					
					
						<div id="logo-nav-pro">
						
							<div class="width-container-pro progression-studios-logo-container">
								<div id="logo-pro" class="logo-inside-nav-pro noselect"><?php progression_studios_logo(); ?></div>
								
								<?php progression_studios_navigation(); ?>
								
							</div><!-- close .width-container-pro -->
						
							
						
						</div><!-- close #logo-nav-pro -->
						<?php get_template_part( 'header/mobile', 'navigation' ); ?>
				
				
				</header>
				
				<?php if (get_theme_mod( 'progression_studios_header_sticky', 'none-sticky-pro' ) == 'sticky-pro' ) : ?></div><!-- close #progression-sticky-header --><?php endif; ?>
				
			</div><!-- close #progression-studios-header-width -->
			
		</div><!-- close #progression-studios-header-position -->
