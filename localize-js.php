<?php
/**
Plugin Name: Localize JS
Version: 1.0
Plugin URI: http://code.creativechoice.org/
Description: Make the _e() function available in javascript files.
Author: Kamiel Choi
License: unlicence
License URI: http://unlicense.org
Author URI: http://creativechoice.org
 */

class localize_js {
	
	function __construct($args = array()) {
		$this->register();
	}
		
	function register() {
		add_action( 'wp_enqueue_scripts', array(&$this, 'localize_js'),11);
	}
	
	function ccb_i18n_js($filename) {
		$f = @file_get_contents ($filename);
		preg_match_all("/_[e_]\(\"(.+)\"\)/", $f, $strings);
		foreach ($strings[1] as $s)
			$arr[$s] = __($s,'ccb');	
		return $arr;
	}

	function localize_js() {
		global $wp_scripts;
		foreach( $wp_scripts->queue as $handle ) :
			 $obj = $wp_scripts->registered [$handle];
			 //full path is used for theme scripts
			 //http://wordpress.stackexchange.com/questions/152658/get-list-of-scripts-styles-and-show-file-which-enqueued-them
			 $fname = $obj->src;
			 // Only look at theme scripts that start with http://
			 if (stripos($fname, "http://") === 0 || stripos($fname, "https://") === 0) {
				$fname = $obj->src;
				$name = str_replace("-","_",$handle);	//Javascript doesn't like - in var names
				wp_localize_script( $handle, 'ccb_e_'.$name, $this->ccb_i18n_js($fname));
			 }
		endforeach;
	}

}	//localize_js	

$ljs = new localize_js();

?>