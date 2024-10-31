<?php
/**
* Callouts Shortcodes
*
* @since 1.0.0
* @package Selthemes
* @subpackage Shortcodes by Selthemes
*/

//Exit if accessed directly
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}

function selthemes_shortcodes_callouts( $atts, $content = null ){

  extract (shortcode_atts(array(
    'title'   =>  '',
    'color'   =>  '',
  ), $atts ));

  return '<div class="st-callouts '. esc_attr($color) .' "> <h1>'. esc_html($title) .'</h1> '. do_shortcode($content) .'</div>';

}
add_shortcode('st_callouts', 'selthemes_shortcodes_callouts');
