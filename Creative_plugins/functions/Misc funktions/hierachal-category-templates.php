<?php 
/**
 * Iterate up current category hierarchy until a template is found.
 *
 * @link http://stackoverflow.com/a/3120150/247223
 */
function so_3119961_load_cat_parent_template( $template ) {
	if ( basename( $template ) === 'category.php' ) { // No custom template for this specific term, let's find it's parent
		$term = get_queried_object();

		while ( $term->parent ) {
			$term = get_category( $term->parent );

			if ( ! $term || is_wp_error( $term ) )
				break; // No valid parent

				if ( $_template = locate_template( "category-{$term->slug}.php" ) ) {
					// Found ya! Let's override $template and get outta here
					$template = $_template;
					break;
				}
		}
	}

	return $template;
}

add_filter( 'category_template', 'so_3119961_load_cat_parent_template' ); 
?>