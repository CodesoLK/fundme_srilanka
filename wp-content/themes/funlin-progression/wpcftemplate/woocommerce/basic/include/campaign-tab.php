<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see wpcf_default_single_campaign_tabs()
 */
$funlintabs = apply_filters( 'wpcf_default_single_campaign_tabs', array() );

if ( ! empty( $funlintabs ) ) : ?>

    <div class="wpneo-tabs">
        <ul class="wpneo-tabs-menu">
            <?php $i = 0;
            foreach ( $funlintabs as $key => $singletab ) :
                $i++;
                $current = $i === 1 ? 'wpneo-current' : '';
                ?>
                <li class="<?php echo esc_attr($current).' '.esc_attr( $key ); ?>_tab">
                    <a href="#wpneo-tab-<?php echo esc_attr( $key ); ?>"><?php echo apply_filters( 'wpcf_campaign_' . $key . '_tab_title', esc_html( $singletab['title'] ), $key ); ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="wpneo-tab">
            <?php foreach ( $funlintabs as $key => $singletab ) :?>
                <div id="wpneo-tab-<?php echo esc_attr( $key ); ?>" class="wpneo-tab-content">
                    <?php call_user_func( $singletab['callback'], $key, $singletab ); ?>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="clear-float"></div>
    </div>

<?php endif; ?>