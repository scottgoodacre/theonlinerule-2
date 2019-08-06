<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

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