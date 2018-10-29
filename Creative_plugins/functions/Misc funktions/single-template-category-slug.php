<?php 
add_filter('single_template', 'check_for_category_single_template');
function check_for_category_single_template( $t )
{
    foreach( (array) get_the_category() as $cat )
    {
        //var_dump(get_stylesheet_directory() . "/single-category-{$cat->slug}.php");
        if ( file_exists(get_stylesheet_directory() . "/single-category-{$cat->slug}.php") ) return get_stylesheet_directory() . "/single-category-{$cat->slug}.php";
        if($cat->parent)
        {
            $cat = get_the_category_by_ID( $cat->parent );
            if ( file_exists(get_stylesheet_directory() . "/single-category-{$cat->slug}.php") ) return get_stylesheet_directory() . "/single-category-{$cat->slug}.php";
        }
    }
    //die();
    return $t;
}
?>