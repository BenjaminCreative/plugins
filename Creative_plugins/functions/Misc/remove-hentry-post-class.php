<?php
/**
 * Remove 'hentry' from post_class()
 */
function ja_remove_hentry( $class ) {
    $class = array_diff( $class, array( 'hentry' ) );
    return $class;
}
add_filter( 'post_class', 'ja_remove_hentry' ); 
?>