<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Condition Field: Multiselect - Product Tags
 *
 * @class WCCF_Condition_Field_Multiselect_Product_Tags
 * @package WooCommerce Custom Fields
 * @author RightPress
 */
if (!class_exists('WCCF_Condition_Field_Multiselect_Product_Tags')) {

class WCCF_Condition_Field_Multiselect_Product_Tags extends RightPress_Condition_Field_Multiselect_Product_Tags
{

    protected $plugin_prefix = WCCF_PLUGIN_PRIVATE_PREFIX;

    // Singleton instance
    protected static $instance = false;

    /**
     * Constructor
     *
     * @access public
     * @return void
     */
    public function __construct()
    {

        parent::__construct();
    }





}

WCCF_Condition_Field_Multiselect_Product_Tags::get_instance();

}
