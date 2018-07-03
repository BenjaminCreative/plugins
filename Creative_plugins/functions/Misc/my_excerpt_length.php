<?php 
/* New excerpt length of 30 words*/
function my_excerpt_length($length) {
	return 30;
}
add_filter('excerpt_length', 'my_excerpt_length');
?>