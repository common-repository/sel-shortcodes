<?php
/**
* Grid Shortcodes
*
* @since 1.0.0
* @package Selthemes
* @subpackage Shortcodes by Selthemes
*/

//Exit if accessed directly
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}

/*
* Function for Row
*/

function selthemes_shortcodes_row( $atts, $content = null ){
    $output  = '<div class="row">';
    $output.= do_shortcode( $content );
    $output.= '</div>';

    return $output;
}

/*
* Function for column
*/
function selthemes_shortcodes_column( $atts, $content = null ){

  extract (shortcode_atts(array(
    'column'   =>  '',
  ), $atts ));

  return '<div class="col-md-'. esc_attr($column) .' "> '. do_shortcode($content) .'</div>';

}
add_shortcode('st_row', 'selthemes_shortcodes_row');
add_shortcode('st_col', 'selthemes_shortcodes_column');
