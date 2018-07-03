<?php
function remove_canon_from_frontpage(){
		if (is_paged() && is_home()){
			add_filter( 'wpseo_canonical', '__return_false',  10, 1 );
		}
		
	}
	add_action('wp', 'remove_canon_from_frontpage');
?>