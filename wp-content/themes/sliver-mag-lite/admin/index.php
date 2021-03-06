<?php
/*
Title		: TPCRN
Description	: ThemePacific TPCRN Framework
Version		: 1.1
Author		: RAJA CRN
Author URI	: http://themePacific.com

Thanks to @Syamil MJ  for SMOF
*/

/**
 * Definitions
 *
 * @since 1.4.0
 */
$theme_version = '';
	    
if( function_exists( 'wp_get_theme' ) ) {
	if( is_child_theme() ) {
		$temp_obj = wp_get_theme();
		$theme_obj = wp_get_theme( $temp_obj->get('Template') );
	} else {
		$theme_obj = wp_get_theme();    
	}

	$theme_version = $theme_obj->get('Version');
	$theme_name = $theme_obj->get('Name');
	$theme_uri = $theme_obj->get('ThemeURI');
	$author_uri = $theme_obj->get('AuthorURI');
} 


define( 'SMOF_VERSION', '1.4.0' );
define( 'ADMIN_PATH', get_template_directory() . '/admin/' );
define( 'ADMIN_DIR', get_template_directory_uri() . '/admin/' );
define( 'LAYOUT_PATH', ADMIN_PATH . '/layouts/' );
define( 'THEMENAME', $theme_name );
/* Theme version, uri, and the author uri are not completely necessary, but may be helpful in adding functionality */
define( 'THEMEVERSION', $theme_version );
define( 'THEMEURI', $theme_uri );
define( 'THEMEAUTHORURI', $author_uri );

define( 'OPTIONS', $theme_name.'_options' );
define( 'BACKUPS',$theme_name.'_backups' );

/**
 * Required action filters
 *
 * @uses add_action()
 *
 * @since 1.0.0
 */
if (is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) 
add_action('admin_head','silvermag_themepacific_of_option_setup');
add_action('admin_head', 'silvermag_themepacific_optionsframework_admin_message');
add_action('admin_init','silvermag_themepacific_optionsframework_admin_init');
add_action('admin_menu', 'silvermag_themepacific_optionsframework_add_admin');
 
/**
 * Required Files
 *
 * @since 1.0.0
 */ 
require_once ( ADMIN_PATH . 'functions/functions.load.php' );
require_once ( ADMIN_PATH . 'classes/class.options_machine.php' );

/**
 * AJAX Saving Options
 *
 * @since 1.0.0
 */
add_action('wp_ajax_of_ajax_post_action', 'silvermag_themepacific_of_ajax_callback');
/*------------------------------------------------------------*/
/*Load ThemePacific FrameWork
/*------------------------------------------------------------*/
 include_once(TPACIFIC_WIDGET .'/widgets.php');
 ?>