<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package pro
 */

get_header(); ?>


	<?php if( !is_front_page() && is_home()   ) : ?>
		<?php $cover_page = get_page( get_option( 'page_for_posts' ) ); ?>
		<?php if(!get_post_meta($cover_page->ID, 'progression_studios_disable_page_title', true)): ?>
		<div id="page-title-pro">
			<div id="progression-studios-page-title-container">
				<div class="width-container-pro">
					<h1 class="page-title"><?php single_post_title(); ?></h1>
					<?php if(get_post_meta($cover_page->ID, 'progression_studios_sub_title', true)): ?><h4 class="progression-sub-title"><?php echo wp_kses( get_post_meta($cover_page->ID, 'progression_studios_sub_title', true) , true); ?></h4><?php endif; ?>
					<?php if(function_exists('bcn_display')) { echo '<ul id="breadcrumbs-progression-studios"><li><a href="'; echo esc_url( home_url( '/' ) ); echo '">'; echo esc_html__( 'Home', 'funlin-progression' ); echo '</a></li>'; bcn_display_list(); echo '</ul>'; }?>
				</div><!-- #progression-studios-page-title-container -->
				<div class="clearfix-pro"></div>
			</div><!-- close .width-container-pro -->
			<div id="page-title-overlay-image"></div>
		</div><!-- #page-title-pro -->
		<?php endif; ?>
		
	<?php else: ?>
		<div id="page-title-pro">
			<div id="progression-studios-page-title-container">
				<div class="width-container-pro">
					<h1 class="page-title"><?php esc_html_e( 'Latest News', 'funlin-progression' ); ?></h1>
				</div><!-- #progression-studios-page-title-container -->
				<div class="clearfix-pro"></div>
			</div><!-- close .width-container-pro -->
			
		</div><!-- #page-title-pro -->
	<?php endif; ?>
	

	
	<div id="content-pro" class="site-content">
		<div class="width-container-pro <?php if( !is_front_page() && is_home()   ) : ?><?php if(get_post_meta($cover_page->ID, 'progression_studios_page_sidebar', true) == 'left-sidebar' ) : ?> left-sidebar-pro<?php endif; ?><?php endif; ?>">
				
				<?php if( !is_front_page() && is_home() ) : ?><?php if(get_post_meta($cover_page->ID, 'progression_studios_page_sidebar', true) == 'right-sidebar' || get_post_meta($cover_page->ID, 'progression_studios_page_sidebar', true) == 'left-sidebar' ) : ?><div id="main-container-pro"><?php endif; ?><?php else : ?><div id="main-container-pro"><?php endif; ?>
				
				
				<?php if ( have_posts() ) : ?>
					<div class="progression-studios-blog-index">
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
						<?php endwhile; ?>
					</div><!-- close .progression-studios-blog-index -->
				
				<div class="clearfix-pro"></div>
				
					<?php progression_studios_show_pagination_links_pro(); ?>
				
					<div class="clearfix-pro"></div>
				
				<?php else : ?>
				
					<div class="progression-studios-blog-index">
						<?php get_template_part( 'template-parts/content', 'none' ); ?>
					</div><!-- close .progression-masonry-margins -->
				
				<?php endif; ?>
				
			
				
				<?php if( !is_front_page() && is_home()   ) : ?><?php if(get_post_meta($cover_page->ID, 'progression_studios_page_sidebar', true) == 'right-sidebar' || get_post_meta($cover_page->ID, 'progression_studios_page_sidebar', true) == 'left-sidebar' ) : ?></div><!-- close #main-container-pro --><?php get_sidebar(); ?><?php endif; ?><?php else : ?></div><!-- close #main-container-pro --><?php get_sidebar(); ?><?php endif; ?>
				
		<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
	</div><!-- #content-pro -->
<?php get_footer(); ?>