<?php
/*
Plugin Name: DirectPay-IPG WooCommerce
Plugin URI: www.directpay.lk
Description: DirectPay IPG allows you to accept payments on your Woocommerce store via Visa & MasterCard.
Version: 2.0.7
Author: DirectPay (Pvt) Ltd.
*/

add_action('plugins_loaded', 'directpay_init', 0);
define('DIRECTPAY_IMG', WP_PLUGIN_URL . "/" . plugin_basename(dirname(__FILE__)) . '/assets/img/');

function directpay_init()
{
    // Make sure WooCommerce is active
    if (!in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) return;
    if (!class_exists('WC_Payment_Gateway')) return;


    class DirectPay_WC extends WC_Payment_Gateway
    {
        public function __construct()
        {
            $this->id = 'directpay';
            $this->method_title = 'DirectPay';
            $this->method_description = 'WooCommerce Payment Plugin of DirectPay Payment Gateway.';
            $this->icon = WP_PLUGIN_URL . "/" . plugin_basename(dirname(__FILE__)) . '/assets/img/logo_.png';
            $this->has_fields = false;
            $this->init_form_fields();
            $this->init_settings();

            $this->liveurl = 'https://pay.directpay.lk';

            error_log("DirectPay_WC INIT");

            // Special settigns if gateway is on Test Mode
            $test_title = '';
            $test_description = '';

            if ($this->settings['test_mode'] == 'yes') {
                $test_title = '';
                $test_description = '<br/><br/>(Developer Mode is Active. You will not be charged.)<br/>';
                $this->liveurl = 'https://testpay.directpay.lk';
                //$this->liveurl = 'https://local.mpg/initPluginItem';
            }

            $this->title = $this->settings['title'] . $test_title;
            $this->description = $this->settings['description'] . $test_description;

            // if ( $this->settings['show_logo'] != "no" ) {
            //     $this->icon 		= DIRECTPAY_IMG . 'logo_' . $this->settings['show_logo'] . '.png';
            // }

            $this->merchant_id = $this->settings['merchant_id'];
            $this->api_key = $this->settings['api_key'];
            $this->redirect_page = $this->settings['redirect_page'];
            $this->private_key = $this->settings['private_key'];
            $this->public_key = $this->settings['public_key'];

            $this->msg['message'] = '';
            $this->msg['class'] = '';

            add_action('init', array(&$this, 'check_directpay_response'));
            add_action('woocommerce_api_' . strtolower(get_class($this)), array($this, 'check_directpay_response'));

            //add_action('woocommerce_thankyou', 'check_directpay_response', 10);

            if (version_compare(WOOCOMMERCE_VERSION, '2.0.0', '>=')) {
                add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));
            } else {
                add_action('woocommerce_update_options_payment_gateways', array($this, 'process_admin_options'));
            }
            add_action('woocommerce_receipt_' . $this->id, array($this, 'receipt_page'));
        }

        /**
         * Admin page options
         */
        function init_form_fields()
        {
            error_log("DirectPay_WC init_form_fields");

            $this->form_fields = array(
                'enabled' => array(
                    'title' => __('Enable/Disable', 'woo_directpay'),
                    'type' => 'checkbox',
                    'label' => __('Enable DirectPay', 'woo_directpay'),
                    'default' => 'yes',
                    'description' => 'Show in the Payment List as a payment option'
                ),
                'title' => array(
                    'title' => __('Title', 'woo_directpay'),
                    'type' => 'text',
                    'default' => __('DirectPay', 'woo_directpay'),
                    'description' => __('This controls the title which the user sees during checkout.', 'woo_directpay'),
                    'desc_tip' => true
                ),
                'description' => array(
                    'title' => __('Description:', 'woo_directpay'),
                    'type' => 'textarea',
                    'default' => __('Pay by Visa, MasterCard via DirectPay.', 'woo_directpay'),
                    'description' => __('This controls the description which the user sees during checkout.', 'woo_directpay'),
                    'desc_tip' => true
                ),
                'merchant_id' => array(
                    'title' => __('Merchant ID', 'woo_directpay'),
                    'type' => 'text',
                    'description' => __('Your DirectPay Merchant ID'),
                    'desc_tip' => true
                ),
                'api_key' => array(
                    'title' => __('API Key', 'woo_directpay'),
                    'type' => 'text',
                    'description' => __('Your DirectPay API Key'),
                    'desc_tip' => true
                ),
                'public_key' => array(
                    'title' => __('Public key', 'woo_directpay'),
                    'type' => 'text',
                    'description' => __('Your DirectPay public Key'),
                    'desc_tip' => true
                ),
                'private_key' => array(
                    'title' => __('Private key', 'woo_directpay'),
                    'type' => 'text',
                    'description' => __('Your DirectPay private Key'),
                    'desc_tip' => true
                ),
                'test_mode' => array(
                    'title' => __('Sandbox Mode', 'woo_directpay'),
                    'type' => 'checkbox',
                    'label' => __('Enable Sandbox Mode', 'woo_directpay'),
                    'default' => 'yes',
                    'description' => __('DirectPay sandbox can be used to test payments', 'woo_directpay'),
                    'desc_tip' => true
                ),
                'redirect_page' => array(
                    'title' => __('Return Page'),
                    'type' => 'select',
                    'options' => $this->get_wordpress_page_list('Select Page'),
                    'description' => __('Page to redirect the customer after payment', 'woo_directpay'),
                    'desc_tip' => true
                )
            );
        }

        /**
         * Output settings in the correct format.
         */
        public function admin_options()
        {
            error_log("DirectPay_WC admin_options");
            echo '<h3>' . __('DirectPay', 'woo_directpay') . '</h3>';
            echo '<p>' . __('WooCommerce Payment Plugin of DirectPay Payment Gateway.') . '</p>';
            echo '<table class="form-table">';
            $this->generate_settings_html();
            echo '</table>';
        }

        /**
         *  There are no payment fields, but we want to show the description if set.
         **/
        function payment_fields()
        {
            error_log("DirectPay_WC payment_fields");
            if ($this->description) {
                echo wpautop(wptexturize($this->description));
            }
        }

        /**
         * Handle payment and process the order.
         * Also tells WC where to redirect the user, and this is done with a returned array.
         * Redirect to DirectPay
         **/
        function process_payment($order_id)
        {
            error_log("DirectPay_WC process_payment");
            global $woocommerce;
            $order = new WC_Order($order_id);

            if (version_compare(WOOCOMMERCE_VERSION, '2.1.0', '>=')) { // For WC 2.1.0
                $checkout_payment_url = $order->get_checkout_payment_url(true);
            } else {
                $checkout_payment_url = get_permalink(get_option('woocommerce_pay_page_id'));
            }

            // Return thankyou redirect
            return array(
                'result' => 'success',
                'redirect' => $checkout_payment_url
            );
        }

        /**
         * Show receipt details
         **/
        function receipt_page($order)
        {
            error_log("DirectPay_WC receipt_page");
            echo '<p><strong>' . __('Thank you for your order.', 'woo_directpay') . '</strong><br/>' . __('The payment page will open soon.', 'woo_directpay') . '</p>';
            echo $this->generate_directpay_form($order);
        }

        /**
         * Send payment data
         */
        function generate_directpay_form($order_id)
        {
            error_log("DirectPay_WC generate_directpay_form");
            global $woocommerce;
            $order = new WC_Order($order_id);
            $orderDetails = $order->get_data();

            $redirect_url = $order->get_checkout_order_received_url();

            // Redirect URL : For WooCoomerce 2.0
            if (version_compare(WOOCOMMERCE_VERSION, '2.0.0', '>=')) {
                $redirect_url = add_query_arg('wc-api', get_class($this), $redirect_url);
            }

            $productName = "";

            $orders_arr = $order->get_items();

            if (count($orders_arr) > 1) {
                $productName = count($orders_arr) . " products";
            } else {
                $productName = "1 Product";
            }

            // foreach ( as $item) {
            //     $products[] = $item["name"];
            //     $productName .= $item["name"] + ", ";
            // }

            $merchant = $this->merchant_id;
            $amount = $order->get_total();
            $currency = get_woocommerce_currency();
            $pluginName = "woocommerce";
            $pluginVersion = WOOCOMMERCE_VERSION;
            $reference = $this->merchant_id . rand(111, 999) . '-' . $order->get_order_number();
            $firstName = $orderDetails['billing']['first_name'];
            $lastName = $orderDetails['billing']['last_name'];
            $email = $orderDetails['billing']['email'];
            $mobile = $order -> get_billing_phone();
            $apiKey = $this->api_key;

//            $dataString = $merchant . $amount . $currency . $pluginName . $pluginVersion . $redirect_url . $redirect_url . $order_id .
//                $reference . $firstName . $lastName . $email . $productName . $apiKey;
//
//            $pkeyid = openssl_get_privatekey("-----BEGIN RSA PRIVATE KEY-----
//	" . $this->private_key . "
//-----END RSA PRIVATE KEY-----
//");
//
//            if (!openssl_sign($dataString, $signature, $pkeyid, OPENSSL_ALGO_SHA256)) {
//                $signatureEncoded = openssl_error_string();
//            }else{
//                $signatureEncoded = base64_encode($signature);
//            }
//
//            openssl_free_key($pkeyid);

            $directpay_args = array(
                '_mId' => $merchant,
                'api_key' => $apiKey,
                '_returnUrl' => $redirect_url,
                '_currency' => $currency,
                '_amount' => $amount,
                '_reference' => $reference,
                '_pluginName' => $pluginName,
                '_pluginVersion' => $pluginVersion,
                '_cancelUrl' => $redirect_url,
                '_orderId' => $order_id,
                '_firstName' => $firstName,
                '_lastName' => $lastName,
                '_email' => $email,
                '_description' => $productName,
                //'signature' => $signatureEncoded,
                '_type' => 'ONE_TIME',
                '_mobileNo' => $mobile
            );

            error_log(print_r($directpay_args, true));

            $directpay_args_array = array();
            foreach ($directpay_args as $key => $value) {
                $directpay_args_array[] = "<input type='hidden' name='$key' value='$value'/>";
            }

            return '	<form action="' . $this->liveurl . '" method="post" id="directpay_payment_form">
  				' . implode('', $directpay_args_array) . '
				<input type="submit" class="button-alt" id="submit_directpay_payment_form" value="' . __('Pay via DirectPay', 'woo_directpay') . '" /> <a class="button cancel" href="' . $order->get_cancel_order_url() . '">' . __('Cancel order &amp; restore cart', 'woo_directpay') . '</a>
					<script type="text/javascript">
					jQuery(function(){
					jQuery("body").block({
						message: "' . __('Thanks for your order! We are now redirecting you to DirectPay Payment Gateway to make the payment.', 'woo_directpay') . '",
						overlayCSS: {
							background		: "#fff",
							opacity			: 0.8
						},
						css: {
							padding			: 20,
							textAlign		: "center",
							color			: "#333",
							border			: "1px solid #eee",
							backgroundColor	: "#fff",
							cursor			: "wait",
							lineHeight		: "32px"
						}
					});
					jQuery("#submit_directpay_payment_form").click();});
					</script>
				</form>';
        }

        /**
         * Get Page list from WordPress
         **/
        function get_wordpress_page_list($title = false, $indent = true)
        {
            error_log("DirectPay_WC get_wordpress_page_list");
            $wp_pages = get_pages('sort_column=menu_order');
            $page_list = array();
            if ($title) $page_list[] = $title;
            foreach ($wp_pages as $page) {
                $prefix = '';
                // show indented child pages?
                if ($indent) {
                    $has_parent = $page->post_parent;
                    while ($has_parent) {
                        $prefix .= ' - ';
                        $next_page = get_post($has_parent);
                        $has_parent = $next_page->post_parent;
                    }
                }
                // add to page list array array
                $page_list[$page->ID] = $prefix . $page->post_title;
            }
            return $page_list;
        }


        /**
         * Check for valid gateway server callback
         **/
        function check_directpay_response()
        {
            error_log("DirectPay_WC check_directpay_response");
            global $woocommerce;

            if (isset($_REQUEST['orderId']) && isset($_REQUEST['trnId'])) {

                error_log(print_r($_REQUEST, true));

                $order_id = $_REQUEST['orderId'];
                if ($order_id != '') {
                    try {
                        $obj = new DirectPay_WC;
                        $order = new WC_Order($order_id);
                        $orderDetails = $order->get_data();

                        $status = $_REQUEST['status'];
                        $desc = $_REQUEST['desc'];
                        $trans_authorised = true;

                        //$dataString = $_REQUEST['orderId'] . $_REQUEST['trnId'] . $_REQUEST['status'] . $_REQUEST['desc'];
                        //$signature = $_REQUEST['signature'];

                        //error_log($dataString);
                        //error_log($signature);
                        //error_log($this->public_key);

//                        $pubKeyid = openssl_get_publickey("-----BEGIN PUBLIC KEY-----
//	" . $this->public_key . "
//-----END PUBLIC KEY-----
//");
//                        $signatureVerify = openssl_verify($dataString, base64_decode($signature), $pubKeyid, OPENSSL_ALGO_SHA256);
//                        error_log($signatureVerify);
//
//                        if ($signatureVerify == 1) {
//                            $trans_authorised = true;
//                        } elseif ($signatureVerify == 0) {
//                            $trans_authorised = false;
//                        } else {
//                            $trans_authorised = false;
//                        }
//                        openssl_free_key($pubKeyid);

                        if ($orderDetails['status'] !== 'completed' || $orderDetails['status'] !== 'processing'|| $orderDetails['status'] !== 'failed') {
                            if ($trans_authorised) {

                                if ($status == "SUCCESS") {
                                    $trans_authorised = true;
                                    $obj->msg['message'] = "Thank you for shopping with us. Your account has been charged and your transaction is successful.";
                                    $obj->msg['class'] = 'woocommerce-message';
                                    if ($orderDetails['status'] == 'processing') {
                                        $order->add_order_note('DirectPay Payment ID: ' . $_REQUEST['trnId'] . '<br/>Transaction Status:' . $desc);
                                    } else {
                                        $order->payment_complete();
                                        $order->add_order_note('DirectPay payment successful.<br/>DirectPay Payment ID: ' . $_REQUEST['trnId']);
                                        $woocommerce->cart->empty_cart();
                                    }
                                } else if ($status == "FAILED") {
                                    $trans_authorised = true;
                                    $obj->msg['message'] = "Thank you for shopping with us. Right now your payment status is pending. We will keep you posted regarding the status of your order through eMail";
                                    $obj->msg['class'] = 'woocommerce-info';
                                    $order->add_order_note('DirectPay payment status is pending<br/>DirectPay Payment ID: ' . $_REQUEST['trnId']);
                                    $order->update_status('on-hold');
                                    $woocommerce->cart->empty_cart();
                                } else {
                                    $obj->msg['class'] = 'woocommerce-error';
                                    $obj->msg['message'] = "Thank you for shopping with us. However, the transaction has been declined.";
                                    $order->add_order_note('Transaction ERROR. Status Code: ' . $status . '-' . $desc);
                                }

                            } else {
                                $this->msg['class'] = 'error';
                                $this->msg['message'] = "Security Error. Illegal access detected.";
                                $order->add_order_note('Signature ERROR: ' . json_encode($_REQUEST));
                            }

                            if ($trans_authorised == false) {
                                $order->update_status('failed');
                            }
                        }

                    } catch (Exception $e) {
                        $obj->msg['message'] = "Exception: " . $e;
                    }
                }

                if ($obj->redirect_page == '' || $obj->redirect_page == 0) {
                    $redirect_url = $order->get_checkout_order_received_url();
                } else {
                    $redirect_url = get_permalink($obj->redirect_page);
                }
                wp_redirect($redirect_url);
                exit;
            }
        }

    } //End Class

    /**
     * Add the DirectPay to WooCommerce
     **/
    function woocommerce_add_gateway_directpay_gateway($methods)
    {
        $methods[] = 'DirectPay_WC';
        return $methods;
    }

    add_filter('woocommerce_payment_gateways', 'woocommerce_add_gateway_directpay_gateway');

}// End function directpay_init()


/**
 * 'Settings' link on plugin page
 **/
function directpay_add_action_plugin($actions, $plugin_file)
{
    static $plugin;
    if (!isset($plugin))
        $plugin = plugin_basename(__FILE__);
    if ($plugin == $plugin_file) {
        $settings = array('settings' => '<a href="admin.php?page=wc-settings&tab=checkout&section=wc_gateway_directpay">' . __('Settings') . '</a>');
        $actions = array_merge($settings, $actions);
    }
    return $actions;
}

add_filter('plugin_action_links', 'directpay_add_action_plugin', 10, 5);




