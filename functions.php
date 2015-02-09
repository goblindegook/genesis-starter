<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

include_once( get_stylesheet_directory() . '/inc/content.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Genesis Starter Theme' );
define( 'CHILD_THEME_URL', 'https://github.com/goblindegook/genesis-starter' );
define( 'CHILD_THEME_VERSION', '2.1.2' );

//* Set Localization (do not remove)
load_child_theme_textdomain( 'genesis-starter',
	apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'genesis-starter' ) );

//* Enqueue Scripts
add_action( 'wp_enqueue_scripts', 'genesis_starter_enqueue_scripts' );

function genesis_starter_enqueue_scripts() {
	$assets_uri = get_stylesheet_directory_uri() . '/public/';

	wp_enqueue_script( 'genesis-starter-head',
		$assets_uri . 'head.js',
		array(),
		CHILD_THEME_VERSION, false );

	wp_enqueue_script( 'genesis-starter-infrastructure',
		$assets_uri . 'infrastructure.js',
		array(),
		CHILD_THEME_VERSION, true );

	wp_enqueue_script( 'genesis-starter-app',
		$assets_uri . 'app.js',
		array( 'genesis-starter-infrastructure' ),
		CHILD_THEME_VERSION, true );
	
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700', array(), CHILD_THEME_VERSION );
}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Add editor style support
add_editor_style();
add_editor_style( '//fonts.googleapis.com/css?family=' . urlencode( 'Lato:300,400,700' ) );
