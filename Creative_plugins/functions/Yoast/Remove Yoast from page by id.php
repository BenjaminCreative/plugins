/* Remove Yoast from page by id */
add_action('template_redirect','remove_wpseo');

function remove_wpseo(){
	if ( is_page(575)) { // Page id 575
		global $wpseo_front;
		remove_action( 'wp_head', array($wpseo_front, 'head'), 2 );
	}
}