/**
 * Is SubPage?
 *
 * Checks if the current page is a sub-page and returns true or false.
 *
 * @param $page mixed optional ( post_name or ID ) to check against.
 * @param $single boolean optional - default true to check against all parents, false to check against immediate parent.
 * @return boolean
 */

function is_subpage( $page = null, $all = true ) {
	global $post;
	// is this even a page?
	if ( ! is_page() )
		return false;
		// does it have a parent?
		if ( ! isset( $post->post_parent ) OR $post->post_parent <= 0 )
			return false;
			// is there something to check against?
			if ( ! isset( $page ) ) {
				// yup this is a sub-page
				return true;
			} else {
				// if $page is an integer then its a simple check
				if ( is_int( $page ) ) {
					// check
					if ( $post->post_parent == $page )
						return true;
				} else if ( is_string( $page ) ) {
					// get ancestors
					$parents = get_ancestors( $post->ID, 'page' );
					// does it have ancestors?
					if ( empty( $parents ) )
						return false;
						if ( $all == true ) { // check against all parents
							// loop through ancestors
							foreach ( $parents as $parent ) {
								$parent = get_post( $parent );
								if ( is_page() && $parent->post_name == $page) {
									return true;
								}
							}
						} else { // check against immediate parent
							// get the first ancestor
							$parent = get_post( $parents[0] );
							// compare the post_name
							if ( $parent->post_name == $page )
								return true;
						}
				}
				return false;
			}
}