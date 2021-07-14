<?php 
/*
Plugin Name: The Story Exchange Shortcodes
Plugin URI:  http://thestoryexchange.org
Description: Shortcodes for easy formatting.
Version:     1.0
Author:      Francois Huyghe - 13Milliseconds
Author URI:  http://13milliseconds.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

function tse_shortcodes_init() {
    wp_register_style('tse_shortcodes_style', plugins_url('/lib/css/style.css',__FILE__ ));
    wp_enqueue_style('tse_shortcodes_style');
    wp_register_script( 'tse_shortcodes_script', plugins_url('/lib/js/script.js',__FILE__ ), ['jquery']);
    wp_enqueue_script('tse_shortcodes_script');
}

add_action( 'init','tse_shortcodes_init');


function tse_player_shortcode( $atts = [] ) {
    $o = '<div class="tse-player"><div class>';
    //headphones image
    $o .= '<img src="' . plugins_url('/lib/images/headphones.png', __FILE__) . '">';
    $o .= '</div><div>';
    // title
    $o .= '<h2>' . esc_html__($atts['title']) . '</h2>';
    // text
    $o .= '<h3>' . esc_html__($atts['text']) . '</h3>';
    // mp3 player
    $o .= '<audio controls class="podcast-player" preload="metadata">';
    $o .= '<source src="'. $atts['mp3'] . '" type="audio/mpeg">';
    $o .= '</audio>';
    //end of output
    $o .= '</div></div>';
    //Return output
    return $o;
}
add_shortcode( 'tse-player', 'tse_player_shortcode' );

function video_player_shortcode( $atts = [] ) {
    $o = '<section class="video"><div class="iframewrap">';
    // video
    $o .= '<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/' . esc_html__($atts['video_id']) . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    $o .= '</div><p class="caption">';
    // caption
    $o .= esc_html__($atts['caption']);
    //end of output
    $o .= '</p></section>';
    //Return output
    return $o;
}
add_shortcode( 'video-player', 'video_player_shortcode' );


?>