<?php
/*
Plugin Name: Facebook Like
Description: Display Facebook Like button 
Version: 1.0.0
*/

//Exit if accessed directly
if(!defined('ABSPATH')) {
	exit;
}

//Load Scripts
require_once(plugin_dir_path(__FILE__).'/includes/facebooklike-scripts.php'); 

//Load Class
require_once(plugin_dir_path(__FILE__).'/includes/facebooklike-class.php');  

//Register Widget
function register_facebooklike(){
	register_widget('Facebook_Like_Widget');
}

//Hook in function
add_action('widgets_init', 'register_facebooklike');