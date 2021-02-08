<?php
defined( 'ABSPATH' ) || exit;
?>
<div class="wpneo-listing-img">
    <a href="<?php echo get_permalink(); ?>" title="<?php  echo get_the_title(); ?>"> <?php echo woocommerce_get_product_thumbnail(); ?></a>
</div>