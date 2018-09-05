<?

	function check_for_existance() {
	    if (is_main_query() && is_404() && !is_archive()){
	        
	        //var_dump(stripslashes($_SERVER['REQUEST_URI']));
	        //Without shashes
	        //$noSlash = str_replace('/','',$_SERVER['REQUEST_URI']);
	        //var_dump($noSlash);
	        
	        $basename = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
	        //var_dump($basename);
	        $newPage = get_post_by_slug( $basename);
	        //var_dump($newPage);
	        
	        
	        $newLink = get_permalink($newPage);
	        //var_dump(get_permalink($newPage));
	        if ($newLink){
	            header("HTTP/1.1 301 Moved Permanently");
	            header("Location: ".$newLink); 
	        }
	        
	        //get_page_by_path( $page_path, $output, $post_type );
	    }
	}
	
	function get_post_by_slug($post_name) {
	    global $wpdb;
	    $post = $wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_name = %s", $post_name));
	    
	    return $post ? get_post($post) : NULL;
	    
	}
	
	add_action('pre_get_posts', 'check_for_existance'); 