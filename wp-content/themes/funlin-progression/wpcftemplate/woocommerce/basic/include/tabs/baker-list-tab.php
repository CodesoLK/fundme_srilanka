<?php
defined( 'ABSPATH' ) || exit;

global $post;

$campaign_id = $post->ID;

$baker_list = wpcf_function()->get_customers_product();
?>
<table>
    <tr>
        <th><?php esc_attr_e('Name', 'funlin-progression'); ?></th>
        <th><?php esc_attr_e('Donate Amount', 'funlin-progression'); ?></th>
        <th><?php esc_attr_e('Date', 'funlin-progression'); ?></th>
    </tr>

    <?php
    foreach($baker_list as $funlineorder){
        $funlineorder = new WC_Order($funlineorder);

        if ($funlineorder->get_status() == 'completed') {
            $ordered_items = $funlineorder->get_items();
            $ordered_this_item = '';
            foreach ($ordered_items as $item) {
                if (!empty($item['item_meta']['_product_id'][0])) {
                    if ($campaign_id == $item['item_meta']['_product_id'][0])
                        $ordered_this_item = $item;
                }
            }
            ?>
            <tr>
                <td>
                    <?php
                    if (get_post_meta(get_the_ID(), 'wpneo_mark_contributors_as_anonymous', true) == "1") {
                        echo esc_attr_e("Anonymous", "funlin-progression");
                    } else {
                        $mark_anonymous = get_post_meta($funlineorder->get_id(), 'mark_name_anonymous', true);
                        if ($mark_anonymous === 'true'){
                            esc_attr_e('Anonymous', 'funlin-progression');
                        }else{
                            echo esc_attr($funlineorder->get_billing_first_name()) . ' ' . $funlineorder->get_billing_last_name();
                        }
                    }
                    ?>
                </td>
                <td>
                    <?php
                        echo wpcf_function()->price($funlineorder->get_total());
                    ?>
                </td>
                <td><?php echo date('F d, Y', strtotime($funlineorder->get_date_created())); ?></td>
            </tr>
            <?php
        } //if order completed
    }
    ?>
</table>
