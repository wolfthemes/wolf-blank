<?php
/**
 * Wolf Blank — theme bootstrap.
 *
 * @package WolfBlank
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // No direct access.
}

if ( ! defined( 'WOLF_BLANK_VERSION' ) ) {
	define( 'WOLF_BLANK_VERSION', '1.0.0' );
}

/**
 * Theme supports.
 */
function wolf_blank_setup() {
	// We control 100% of block styling via theme.json + global.css.
	// So we deliberately do NOT call add_theme_support( 'wp-block-styles' ).

	// Load global.css inside the block editor so it matches the front end.
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/global.css' );

	// Let blocks output responsive embeds.
	add_theme_support( 'responsive-embeds' );

	// FSE provides title-tag and feed links automatically; no need to add them.
	// No 'menus' registration — navigation is handled by the Navigation block.
	// No 'widgets' / sidebars — FSE has no widget areas.
}
add_action( 'after_setup_theme', 'wolf_blank_setup' );

/**
 * Front-end assets.
 */
function wolf_blank_enqueue_assets() {
	wp_enqueue_style(
		'wolf-blank-global',
		get_theme_file_uri( 'assets/css/global.css' ),
		array(),
		WOLF_BLANK_VERSION
	);
}
add_action( 'wp_enqueue_scripts', 'wolf_blank_enqueue_assets' );
