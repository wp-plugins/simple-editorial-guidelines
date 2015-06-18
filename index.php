<?php
/*
Plugin Name: Simple Editorial Guidelines
Plugin URI:  http://writelydesigned.com
Description: This plugin enables you to display a simple panel containing your editorial guidelines in the post edit admin to users of your choosing.
Version:     0.0.2
License: GPLv2 
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Author:      Writely Designed
Author URI:  http://writelydesigned.com
Text Domain: simple-editorial-guidelines
 */
 
defined( 'ABSPATH' ) or die( 'Well hello there!' );


/**
 * Libraries and resources.
 */
 

function wdseg_load_admin_style() {

	$current_screen = (isset($_GET['page']) ? $_GET['page'] : null);
	
	if ($current_screen == 'wd_editorial_guidelines') :
	
		wp_enqueue_style( 'wp-color-picker' );
	    wp_enqueue_script( 'wp-color-picker-script', plugins_url('script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
		
	    wp_enqueue_script( 'wdseg-functions', plugin_dir_url( __FILE__ ) . '/inc/wdseg-functions.js', array('jquery') );
    
    endif;
    
}
add_action( 'admin_enqueue_scripts', 'wdseg_load_admin_style' );


/**
 * Admin page.
 */
require 'inc/admin.php';
require 'inc/admin-primary.php';
require 'inc/admin-sidebar.php';

/**
 * Meta box.
 */
require 'inc/meta-box.php';
require 'inc/meta-styles.php';