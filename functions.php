<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
 
    $parent_style = 'parent-style'; // Calling for the style.css of the Twenty Nineteen theme.
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}

// END ENQUEUE PARENT ACTION

function wpse_218380_init() {
      set_theme_mod( 'primary_color', 'custom' );
      set_theme_mod( 'primary_color_hue', 178 );
}
add_action( 'init', 'wpse_218380_init' );

function wpse_218380_saturation() {
      return 60;
}
add_filter( 'twentynineteen_custom_colors_saturation', 'wpse_218380_saturation' );
add_filter( 'twentynineteen_custom_colors_saturation_selection', 'wpse_218380_saturation' );

function wpse_218380_lightness() {
      return 32;
}
add_filter( 'twentynineteen_custom_colors_lightness', 'wpse_218380_lightness' );
add_filter( 'twentynineteen_custom_colors_lightness_hover', 'wpse_218380_lightness' );
add_filter( 'twentynineteen_custom_colors_lightness_selection', 'wpse_218380_lightness' );

add_theme_support('editor-styles');
add_editor_style( 'style-editor.css' );
add_theme_support( 'wp-block-styles' );

// Copyright dates function

function theonlinerule_copyright() {
global $wpdb;
$copyright_dates = $wpdb->get_results("
SELECT
YEAR(min(post_date_gmt)) AS firstdate,
YEAR(max(post_date_gmt)) AS lastdate
FROM
$wpdb->posts
WHERE
post_status = 'publish'
");
$output = '';
if($copyright_dates) {
$copyright = "&copy; " . $copyright_dates[0]->firstdate;
if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
$copyright .= '-' . $copyright_dates[0]->lastdate;
}
$output = $copyright;
}
return $output;
}