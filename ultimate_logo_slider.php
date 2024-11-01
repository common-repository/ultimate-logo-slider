<?php
/*
Plugin Name: Ultimate Logo Slider
Plugin URI: https://athemeart.com/downloads/ultimate-logo-slider-pro/
Description: Showcase logos in stylish slideshow carousel.
Version:1.0
Author: aThemeArt
Author URI: https://athemeart.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

defined( 'ATA_LOGO_PATH' )    or  define( 'ATA_LOGO_PATH',    plugin_dir_path( __FILE__ ) );
defined( 'ATA_LOGO_URL' )    or  define( 'ATA_LOGO_URL',    plugin_dir_url( __FILE__ ) );

load_plugin_textdomain( 'ata_logo', false, plugin_dir_path(__FILE__) . 'languages/' ); 
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-background-slider-master-activator.php
 */
function activate_ata_logo() {
	require_once plugin_dir_path( __FILE__ ) . '/inc/activator.php';
	Unlimitata_Logo_Activator::activate();
}
/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-background-slider-master-deactivator.php
 */
function deactivate_ata_logo() {
	require_once plugin_dir_path( __FILE__ ) . '/inc/deactivator.php';
	Unlimitata_Logo_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ata_logo' );
register_deactivation_hook( __FILE__, 'deactivate_ata_logo' );

if ( file_exists( ATA_LOGO_PATH . '/inc/unlimited-logo-carousel.php' )) {
	require_once ATA_LOGO_PATH . '/inc/unlimited-logo-carousel.php';

}
if ( file_exists( ATA_LOGO_PATH . '/inc/logo-metabox.php' )) {
	require_once ATA_LOGO_PATH . '/inc/logo-metabox.php';
}
if ( file_exists( ATA_LOGO_PATH . '/inc/meta-settings.php' )) {
	require_once ATA_LOGO_PATH . '/inc/meta-settings.php';
}
if ( file_exists( ATA_LOGO_PATH . '/inc/options.php' )) {
	require_once ATA_LOGO_PATH . '/inc/options.php';
}
if ( file_exists( ATA_LOGO_PATH . '/inc/views.php' )) {
	require_once ATA_LOGO_PATH . '/inc/views.php';
}


function ata_logo_carousel_admin_enqueue_scripts() {
	// admin utilities
	wp_enqueue_media();
	 // wp core styles
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_style( 'wp-jquery-ui-dialog' );;

	 // wp core scripts
    wp_enqueue_script( 'wp-color-picker' );
    wp_enqueue_script( 'jquery-ui-dialog' );
    wp_enqueue_script( 'jquery-ui-sortable' );
    wp_enqueue_script( 'jquery-ui-accordion' );
 	//wp_enqueue_style( 'ata_bg_slider', plugins_url('assets/admin_ata_bg_style.css', __FILE__));
		
}
add_action( 'admin_enqueue_scripts', 'ata_logo_carousel_admin_enqueue_scripts' );


if( !function_exists('ata_logo_carousel_header_css') ){
	add_action('admin_head','ata_logo_carousel_header_css',0);
	function ata_logo_carousel_header_css(){
		echo '<style type="text/css">
			#menu-posts-ata_logo .dashicons-admin-post::before,#menu-posts-ata_logo .dashicons-format-standard::before{
			content:""!important;
			background:url('.ATA_LOGO_URL.'/assets/icon.png) no-repeat center center;	
			}
		</style>';	
	}
}

/**
 * The code that runs during plugin save meta data.
 */
if( !function_exists('ata_sanitize_text') ){
	function ata_sanitize_text( $arr ){
		$newArr = array();
	
		foreach( $arr as $key => $value )
		{
			$newArr[ $key ] = sanitize_text_field($value);
		}
	
		return $newArr;
	}
}

/**
 * The code that runs during plugin save meta data.
 */
if( !function_exists('ata_sanitize_url') ){
	function ata_sanitize_url( $arr ){
		$newArr = array();
	
		foreach( $arr as $key => $value )
		{
			$newArr[ $key ] = esc_url_raw(sanitize_text_field( $value ));
		}
	
		return $newArr;
	}
}
/**
 * The code that runs during plugin save meta data.
 */
if( !function_exists('ata_sanitize_html') ){
	function ata_sanitize_html( $arr ){
		$newArr = array();
	
		foreach( $arr as $key => $value )
		{
			$newArr[ $key ] = sanitize_text_field( wp_strip_all_tags( $value ) );
		}
	
		return $newArr;
	}
}