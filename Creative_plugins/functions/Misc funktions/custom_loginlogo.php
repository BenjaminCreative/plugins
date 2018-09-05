<?php 

/* Change logo on loginpage */
function custom_loginlogo() {
	echo '<style type="text/css">
	.login h1 a {background-image: url('.get_bloginfo('template_directory').'/assets/img/login_logo.png) !important; width:100%; height:133px; background-size:cover; }
	</style>';
}
add_action('login_head', 'custom_loginlogo');
