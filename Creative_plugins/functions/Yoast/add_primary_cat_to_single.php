<?php

// Add primary cat to body class of singlepage 

add_filter('body_class','add_category_to_single');
function add_category_to_single($classes) {
  $backup = "on";
    if (is_single() || is_archive() ) {
    global $post;
     foreach((get_the_category($post->ID)) as $category) {
        if( get_post_meta($post->ID, '_yoast_wpseo_primary_category',true) == $category->term_id ) {
             $classes[] = "category-" . $category->category_nicename;
             $backup = "off";
        }
        $catbackup = $category->category_nicename;
     }
  
    // return the $classes array
    if ($backup == "on") {
        $classes[] = "category-" . $catbackup;
        return $classes;
    } else {
       return $classes;
    }
  } else if (is_home() || is_front_page()) {
         $classes[] = "home";
        return $classes;
  } 
};