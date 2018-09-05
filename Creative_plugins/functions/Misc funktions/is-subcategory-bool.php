<?php
//creating a function, to check if the current category archive is a subcategory or top category
function is_subcategory( $cat_id = NULL ) {

	if ( !$cat_id )
		$cat_id = get_query_var( 'cat' );

		if ( $cat_id ) {

			$cat = get_category( $cat_id );
			if ( $cat->category_parent > 0 )
				return true;
		}

		return false;
}

function category_has_parent($catid){
	$category = get_category($catid);
	if ($category->category_parent > 0){
		return true;
	}
	return false;
}
?>