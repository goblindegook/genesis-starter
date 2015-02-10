<?php

//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );
include_once( get_stylesheet_directory() . '/vendor/autoload.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Genesis Starter Theme' );
define( 'CHILD_THEME_URL', 'https://github.com/goblindegook/genesis-starter' );
define( 'CHILD_THEME_VERSION', '2.1.2' );

//* Set Localization (do not remove)
load_child_theme_textdomain( 'genesis-starter',
	apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'genesis-starter' ) );

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Setup theme
add_action( 'after_setup_theme', function () {
	$scripts    = new \goblindegook\WP\Theme\Genesis_Starter\Scripts();	
	$styles     = new \goblindegook\WP\Theme\Genesis_Starter\Styles();	
	$shortcodes = new \goblindegook\WP\Theme\Genesis_Starter\Shortcodes();	

	$scripts->ready();
	$styles->ready();
	$shortcodes->ready();
} );
