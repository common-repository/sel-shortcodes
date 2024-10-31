<?php
/**
* Tab Shortcodes
*
* @since 1.0.0
* @package Selthemes
* @subpackage Shortcodes by Selthemes
*
* [st_tab_group]
*   [st_tab title="Feature 1"] Contents 1 [/tab]
*   [st_tab title="Feature 2"] Contents 2 [/tab]
*   [st_tab title="Feature 3"] Contents 3 [/tab]
* [/st_tab_group]
*
*/

//Exit if accessed directly
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}


$tabs_divs = '';

function selthemes_shortcodes_tab_group($atts, $content = null ) {
    global $tabs_divs;

    $output = '<div id="st-tabs"><ul>';
    $output.= do_shortcode($content). '</ul>';
    $output.= $tabs_divs. '</div>';

    return $output;
}


function selthemes_shortcodes_tab($atts, $content = null) {
    global $tabs_divs;

    extract(shortcode_atts(array(
        'id' => '',
        'title' => '',
    ), $atts));

    if(empty($id))
        $id = 'st-tab-'.rand(100,999);

    $output = '
        <li><h6><a href="#'.esc_attr($id).'" class="st-tab-link">'.esc_html($title).'</a></h6><li>
    ';

    $tabs_divs.= '<div class="st-tab-content" id="'.esc_attr($id).'">'. do_shortcode( $content ) .'</div>';

    return $output;
}

add_shortcode('st_tabgroup', 'selthemes_shortcodes_tab_group');
add_shortcode('st_tab', 'selthemes_shortcodes_tab');
