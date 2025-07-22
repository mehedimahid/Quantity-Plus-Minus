<?php
/*
Plugin Name: Quantity Plus Minus
Plugin URI:
Description: A simple plugin that shows a welcome message to new visitors.
Version: 1.0
Author: Mehedi Hasan
Author URI: https://github.com/mehedimahid
License: GPL2
*/

class Quantity_Plus_Minus {
    public function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        add_action('woocommerce_before_quantity_input_field',[$this, 'before_quantity_input_field']);
       add_action('woocommerce_after_quantity_input_field', [$this, 'after_quantity_input_field']);
        // add_action('woocommerce_before_add_to_cart_button', [$this, 'add_to_cart_button']);
        add_action('woocommerce_after_shop_loop_item', [$this, 'after_shop_loop_item'], 9);

    }
    public function enqueue_scripts() {
        wp_enqueue_script('qtm-script', plugins_url('assets/js/qtm_quantity.js', __FILE__), array(),'1.0',true);
        wp_enqueue_style('qtm-style', plugins_url('assets/css/qtm_quantity_style.css', __FILE__));
    }
    public function after_shop_loop_item()
    {
        global $product;
        woocommerce_quantity_input(
            array(
                'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
                'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
                'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
            )
        );
    }
    public function before_quantity_input_field(){
        ?>
            <button type="button" class="quantity-btn" onclick="qpm_decrement(this)">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8z"/>
                </svg>
            </button>
        <?php
    }
    public function after_quantity_input_field()
    {
        ?>
            <button type="button" class="quantity-btn" onclick="qpm_increment(this)">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 1a.5.5 0 0 1 .5.5V7.5H14a.5.5 0 0 1 0 1H8.5V14a.5.5 0 0 1-1 0V8.5H2a.5.5 0 0 1 0-1h5.5V1.5A.5.5 0 0 1 8 1z"/>
                </svg>
            </button>
        <?php
    }


};
new Quantity_Plus_Minus();