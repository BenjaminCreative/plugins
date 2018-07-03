<?php 
/**
 * Adds product images to the WooCommerce order emails table
 * Uses WooCommerce 2.5 or newer
 */
add_filter( 'woocommerce_email_order_items_args', 'iconic_email_order_items_args', 10, 1 );

function iconic_email_order_items_args( $args ) {
    
    $args['show_image'] = true;
    $args['image_size'] = array( 100, 100 );
    $args['show_purchase_note'] = true;
    $args['Card type'] = true;
    
    return $args;
    
}
?>