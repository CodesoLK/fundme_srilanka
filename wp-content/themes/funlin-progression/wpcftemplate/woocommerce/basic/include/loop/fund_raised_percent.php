<?php
defined( 'ABSPATH' ) || exit;

$raised_percent = wpcf_function()->get_fund_raised_percent_format();
?>
<div class="wpneo-raised-bar">
    <div class="neo-progressbar">
        <?php $css_width = wpcf_function()->get_raised_percent(); if( $css_width >= 100 ){ $css_width = 100; } ?>
        <div style="width: <?php echo esc_attr($css_width); ?>%"></div>
    </div>
</div>
<div class="progression-studios-raised-percent"><?php echo esc_attr($raised_percent); ?></div>