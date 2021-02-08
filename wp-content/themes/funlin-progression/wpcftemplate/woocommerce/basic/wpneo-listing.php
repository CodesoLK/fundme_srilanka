<?php
defined( 'ABSPATH' ) || exit;
$col_num = get_option('number_of_collumn_in_row', 3);
$number = array( "2"=>"two","3"=>"three","4"=>"four" );
global $product;
global $post;
?>

<div class="woocommerce">

        <?php do_action('wpcf_campaign_listing_before_loop'); ?>
	        <ul class="products columns-<?php echo esc_attr($col_num); ?>">
            <?php if (have_posts()): ?>
                <?php
                $i = 1;
                while (have_posts()) : the_post();
                    $class = '';
                    if( $i == $col_num ){
                        $class = 'last';
                        $i = 0;
                    }
                    if($i == 1){ $class = 'first'; }
                ?>
						<?php wc_get_template_part( 'content', 'product' ); ?>
                <?php $i++; endwhile; ?>
            <?php
            else:
                wpcf_function()->template('include/loop/no-campaigns-found');
            endif;
            ?>
				</ul>
        <?php 
            do_action('wpcf_campaign_listing_after_loop');
            wpcf_function()->template('include/pagination');
        ?>

</div><!-- close .woocommerce -->