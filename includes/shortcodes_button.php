<?php
/**
* Buttons Shortcodes
*
* @since 1.0.0
* @package Selthemes
* @subpackage Shortcodes by Selthemes
*/

//Exit if accessed directly
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}

function selthemes_shortcodes_button( $atts, $content = null ){

  extract (shortcode_atts(array(
    'url'     =>  '',
    'label'   =>  '',
    'color'   =>  '',
    'size'    =>  '',
    'style'   =>  '',
    'target'  =>  '',
  ), $atts ));

  return '<a href="'. esc_url($url) .'" class="'. esc_attr($style) .' st-btn '. esc_attr($color) .' '. esc_attr($size) .' " target="'. esc_attr($target) .'">'.esc_html($label).'</a>';
}

add_shortcode('st_button', 'selthemes_shortcodes_button');
