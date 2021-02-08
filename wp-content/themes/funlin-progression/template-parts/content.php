<?php
/**
 * @package pro
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	<div class="progression-studios-default-blog-index">
		
		
		
		<?php if( get_post_meta($post->ID, 'progression_studios_video_post', true)  ): ?>
			<div class="progression-studios-feaured-image video-progression-studios-format">
				<?php echo apply_filters('progression_studios_video_content_filter', get_post_meta($post->ID, 'progression_studios_video_post', true)); ?>
			</div>
		<?php else: ?>
	
			<?php if(has_post_thumbnail()): ?>
				<div class="progression-studios-feaured-image">
					<?php progression_studios_blog_link(); ?>
						<?php the_post_thumbnail('progression-studios-blog-index'); ?>
					</a>
				</div><!-- close .progression-studios-feaured-image -->
			<?php endif; ?><!-- close featured thumbnail -->

		<?php endif; ?><!-- close video -->


		<div class="progression-blog-content">
			
			<?php if ( is_sticky() && is_home() && ! is_paged() ) { printf( '<div class="progression-studios-sticky-post">%s</div>', esc_html__( 'FEATURED', 'funlin-progression' ) ); } ?>
			
			
			<?php if (get_theme_mod( 'progression_studios_blog_index_meta_category_display', 'true') == 'true') : ?>
				<div class="blog-meta-category-list"><?php the_category(' '); ?></div>
			<?php endif; ?>
			
			<?php if ( 'post' == get_post_type() &&  get_theme_mod( 'progression_studios_blog_meta_hide', 'true') == 'true') : ?>
				<ul class="progression-post-meta">
					
					<?php if (get_theme_mod( 'progression_studios_blog_meta_author_display', 'true') == 'true') : ?><li class="blog-meta-author-display"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><i class="far fa-user-circle"></i><?php the_author(); ?></a></li><?php endif; ?>

					<?php if ( get_theme_mod( 'progression_studios_blog_meta_date_display', 'true') == 'true' && 'post' == get_post_type() ) : ?>	
						<li class="blog-meta-date-list"><a href="<?php the_permalink(); ?>"><i class="far fa-calendar-alt"></i><?php the_time(get_option('date_format')); ?></a></li>
					<?php endif; ?>


					<?php if (get_theme_mod( 'progression_studios_blog_meta_comment_display', 'true') == 'true') : ?><?php if ( comments_open() ) : ?><li class="blog-meta-comments"><i class="far fa-comments"></i><?php comments_popup_link( '' . esc_html__( '0 comments', 'funlin-progression' ) . '', esc_html__( '1 comment', 'funlin-progression' ), esc_html__( '% comments', 'funlin-progression' ) ); ?></li><?php endif; ?><?php endif; ?>
					
				</ul>
				<div class="clearfix-pro"></div>
			<?php endif; ?>
			
			<h2 class="progression-blog-title"><?php progression_studios_blog_title_link(); ?><?php the_title(); ?></a></h2>
			
			<?php if (get_theme_mod( 'progression_studios_blog_excerpt_display', 'true') == 'true') : ?>
			<div class="progression-studios-blog-excerpt">
				<?php if(has_excerpt() ): ?>	
					<?php the_excerpt(); ?>
					
				<?php else: ?>
					<?php if ( 'post' == get_post_type() ) : ?>
				<?php the_content( sprintf( esc_html__( 'Continue Reading', 'funlin-progression'), the_title( '<span class="screen-reader-text">"', '"</span>', false ) ) ); ?>
				<?php endif; ?>
				<?php endif; ?>
				<div class="clearfix-pro"></div>
				
			</div><!-- close .progression-studios-blog-excerpt -->
			<?php endif; ?>

			
			<div class="clearfix-pro"></div>
			
			
			<?php wp_link_pages( array(
				'before' => '<div class="progression-page-nav">' . esc_html__( 'Pages:', 'funlin-progression' ),
				'after'  => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				) );
			?>
			
			<div class="clearfix-pro"></div>
			
			
			
		</div><!-- close .progression-blog-content -->
	
	
	<div class="clearfix-pro"></div>
	</div><!-- close .progression-studios-default-blog-index -->
</div><!-- #post-## -->