<?php
/*
Plugin Name: PF Templates &rarr; Pages
Description: List of pages for each template file
Author: pressfoundry.com
Version: 1.0
Author URI: https://pressfoundry.com/
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
define( 'TP__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'TP_VERSION', '1.0' );

require_once __DIR__ . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'class-templates.php';

register_activation_hook( __FILE__, 'tp_activate' );
register_deactivation_hook( __FILE__, 'tp_deactivate' );

add_action( 'init', 'tp_init' );

function tp_init() {
	add_action(
		'admin_menu',
		function() {
			//add_menu_page( 'Templates &rarr; Pages', 'Templates-Pages', 'manage_options', 'templates-pages', 'templates_table', 'dashicons-format-aside', 81 );
			add_submenu_page( 'tools.php', 'Templates &rarr; Pages', 'Templates-Pages', 'manage_options', 'templates-pages', 'templates_table' );
		}
	);
	function tp_plugin_styles() {
		wp_register_style( 'tp_style', plugin_dir_url( __FILE__ ) . 'styles.css', array(), TP_VERSION );
		wp_enqueue_style( 'tp_style' );
		wp_enqueue_style( 'tp_style', plugins_url( 'styles.css', __FILE__ ), null, '' );
	}
	add_action( 'admin_enqueue_scripts', 'tp_plugin_styles' );

	function templates_table( $t ) {
		$page_templates = new Templates( 'Templates → Pages', 'pages' );
		$page_templates = new Templates( 'Gutenberg Blocks → Pages', 'gblocks' );
		$page_templates = new Templates( 'Flexible Content Sections → Pages', 'fcsections' );

	}
}

function tp_activate() {
	tp_init();
	flush_rewrite_rules();
}

function tp_deactivate() {
	remove_submenu_page( 'tools.php', 'templates-pages' );
	flush_rewrite_rules();
}
