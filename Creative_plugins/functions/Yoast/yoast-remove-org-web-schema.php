<?php 
function bybe_remove_yoast_json($data){
    if ( (isset($data['@type'])) && ($data['@type'] == 'Organization' || $data['@type'] == 'WebSite' || $data['@type'] == 'hentry') ) {
        $data = array();
    }
    return $data;
}
add_filter('wpseo_json_ld_output', 'bybe_remove_yoast_json', 10, 1);


?>