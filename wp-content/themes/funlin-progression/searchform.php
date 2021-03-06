<?php
/**
 * The template for displaying search forms in progression
 *
 * @package pro
 */
?>
<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php esc_attr_x( 'Search for:', 'label', 'funlin-progression' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'funlin-progression' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_html__( 'Submit', 'funlin-progression' ); ?>">
	<div class="clearfix-pro"></div>
</form>