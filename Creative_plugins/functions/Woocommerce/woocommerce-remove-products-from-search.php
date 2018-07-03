<?php
//Removing products from search results
add_action( 'init', 'remove_products_from_search', 99 );
function remove_products_from_search() {
	global $wp_post_types;
	if ( post_type_exists( 'product' ) ) {
		// exclude from search results
		$wp_post_types['product']->exclude_from_search = true;
	}
}
?>