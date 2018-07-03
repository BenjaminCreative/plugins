<?php
/*
 Plugin Name: Creative Plugins
 Plugin URI: https://www.benjamincreative.dk/
 Description: A gathering of functions
 Version: 0.1
 Author: Jesper Stender
 
 Text Domain: Creative_plugins
 
 */
//Add the menu page
add_action('admin_menu', 'creative_plugin_menu');

function creative_plugin_menu() {
    
    add_menu_page('Creative Plugins', 'Creative Plugins', 'read', 'creative-plugins', 'display_creative_plugins_function', 'dashicons-hammer');
    add_action( 'admin_init', 'update_creative_functions' );
}

if( !function_exists("update_creative_functions") ) {
    function update_creative_functions() {
        
        $args = array(
            'type' => 'string',
            'default' => NULL,
        );
        
        register_setting( 'creative_functions', 'check_array_of_functions', $args );
    }
}






function display_creative_plugins_function(){
    ?>
    <h1>Functions</h1>
	<p>Her er en samling af vores hjælper funktioner</p>
		<form method="post" action="options.php">
        <?php settings_fields( 'creative_functions' ); ?>
        <?php do_settings_sections( 'creative_functions' ); ?>
        <?php $allOptions = get_option('check_array_of_functions');?>
        
        <?php foreach ( glob( plugin_dir_path( __FILE__ ) . "functions/*" , GLOB_ONLYDIR) as $fpath) :?>
        
        <?php $foldername = basename($fpath, ".php"); // $file is set to "index"?>
        <h3><?php echo $foldername;?></h3>
        <ul>
        <?php //var_dump($fpath);?>
        	<?php foreach ( glob($fpath."/*.php" ) as $file ) :?>
        	<?php $filename = basename($file, ".php"); // $file is set to "index"?>
        	<?php //var_dump($filename);?>
        	<?php //var_dump($allOptions[$singularPostType]);?> 
        		<li>
    				<input type="checkbox" id="check_<?php echo $filename;?>" name="check_array_of_functions[<?php echo $filename;?>]" value="<?php echo $file;?>" <?php if($allOptions[$filename] != NULL && $allOptions[$filename] != "" ){echo "checked";}?> class="checkbox">
        			<label for="check_<?php echo $filename;?>"><?php echo $filename;?></label>
        		</li>
        	<?php endforeach;?>
       	 </ul>
       	 <hr>
        <?php endforeach;?>
        <?php //var_dump($allOptions);?>
        
          <ul>
        		<?php 
        		foreach ( glob( plugin_dir_path( __FILE__ ) . "functions/*.php" ) as $file ) :?>
        		<li>
    			<?php 
    			//$file = basename($path);         // $file is set to "index.php"
    			$filename = basename($file, ".php"); // $file is set to "index"
    			?>
    			<?php //var_dump($allOptions[$singularPostType]);?> 
    				<input type="checkbox" id="check_<?php echo $filename;?>" name="check_array_of_functions[<?php echo $filename;?>]" value="<?php echo $file;?>" <?php if($allOptions[$filename] != NULL && $allOptions[$filename] != "" ){echo "checked";}?> class="checkbox">
        			<label for="check_<?php echo $filename;?>"><?php echo $filename;?></label>
        		</li>
        		<?php endforeach;?>
    		
        <?php submit_button(); ?>
        </ul>
      </form>
    <?php 
    
    //var_dump($allOptions);
    foreach ($allOptions as $indexName => $singleOption) : ?>
    	
    	<p>including <?php echo $indexName;?>()</p>
    	
    	<?php //include($singleOption);?>
    <?php endforeach; 
    
    
}
$allOptions = get_option('check_array_of_functions');
foreach ($allOptions as $indexName => $singleOption) : ?>
    	<?php /*
    	<p>including <?php echo $indexName;?>()</p>
    	*/
    	?>
    	<?php include($singleOption);?>
    <?php endforeach; ?>

