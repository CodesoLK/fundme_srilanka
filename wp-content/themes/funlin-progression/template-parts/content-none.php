<?php
/**
 * @package pro
 */
?>
<section class="no-results-pro not-found-pro">
	
	<div class="page-content-pro">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'funlin-progression' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>
			
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'funlin-progression' ); ?></p>
			
			<div id="no-results-pro"><?php get_search_form(); ?></div>
			
			

		<?php else : ?>
			
			<div id="no-results-pro"><?php get_search_form(); ?></div>
			
			
			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'funlin-progression' ); ?></p>
			
		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->