<?php

/**
 * Plugin Name:       Sel Shortcodes
 * Plugin URI:        https://selthemes.com/plugins/sel-shortcodes
 * Description:       This plugin generates Grid, Button, Callouts, Accordion and Tabs shortcodes. This plugin created for official themes from Selthemes.com
 * Version:           1.0.0
 * Author:            Selthemes
 * Author URI:        https://selthemes.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       selthemes
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*
* 	Load Scripts
*/

function selthemes_shortcodes_add_scripts() {

	if ( ! is_admin() ) {

		/*
		* Load Particial Shortcodes files
		*/
		require_once ( plugin_dir_path(__FILE__) . 'includes/shortcodes_grid.php');
		require_once ( plugin_dir_path(__FILE__) . 'includes/shortcodes_button.php');
		require_once ( plugin_dir_path(__FILE__) . 'includes/shortcodes_tabs.php');
		require_once ( plugin_dir_path(__FILE__) . 'includes/shortcodes_accordion.php');
		require_once ( plugin_dir_path(__FILE__) . 'includes/shortcodes_callout.php');


		/*
		* Load Scritpts
		*/
		wp_enqueue_style('jquery-ui-css', plugin_dir_url(__FILE__) . '/assets/css/jquery-ui.min.css');
		wp_enqueue_style('bootstrap-css', plugin_dir_url( __FILE__ ) .'assets/css/bootstrap-grid.min.css');
		wp_enqueue_style('selthemes-style-css', plugins_url('assets/css/shortcodes-style.css', __FILE__ ) );

		wp_enqueue_script( 'jquery-ui-tabs');
		wp_enqueue_script( 'jquery-ui-accordion');
		wp_enqueue_script( 'selthemes-app-js', plugin_dir_url( __FILE__ ) . 'assets/js/app.js', array('jquery'), '', true );

	} else {
		wp_enqueue_style('selthemes-style-css', plugins_url('assets/css/app.css', __FILE__ ) );
	}

}
add_filter('init', 'selthemes_shortcodes_add_scripts');


// Hooks your functions into the correct filters
function selthemes_add_mce_button() {
	// check user permissions
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return;
	}
	// check if WYSIWYG is enabled
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'selthemes_add_tinymce_plugin' );
		add_filter( 'mce_buttons', 'selthemes_register_mce_button' );
	}
}
add_action('admin_head', 'selthemes_add_mce_button');


// Declare script for new button
function selthemes_add_tinymce_plugin( $plugin_array ) {
	$plugin_array['selthemes_mce_button'] = plugin_dir_url( __FILE__ ) .'assets/js/mce-button.js';
	return $plugin_array;
}


// Register new button in the editor
function selthemes_register_mce_button( $buttons ) {
	array_push( $buttons, 'selthemes_mce_button' );
	return $buttons;
}

remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop', 99 );
add_filter( 'the_content', 'shortcode_unautop', 100 );
