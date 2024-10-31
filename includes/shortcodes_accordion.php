<?php
/**
* Accordion Shortcodes
*
* @since 1.0.0
* @package Selthemes
* @subpackage Shortcodes by Selthemes
*/

//Exit if accessed directly
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}


function selthemes_shortcodes_accordion_group($atts, $content = null ) {
  return '<div id="st-accordion">' . do_shortcode($content) . '</div>';
}

function selthemes_shortcodes_accordion($atts, $content = null) {

  extract(shortcode_atts(array(
      'title' => esc_html('Default Title'),
  ), $atts));

  $output = "<h6>$title</h6>" . "<div>$content</div>";
  return $output;
}

add_shortcode('st_accordion_group', 'selthemes_shortcodes_accordion_group');
add_shortcode('st_accordion', 'selthemes_shortcodes_accordion');
