<?php

//* Start the engine
include_once \get_template_directory() . '/lib/init.php';

if ( file_exists( \get_stylesheet_directory() . '/vendor/autoload.php' ) ) {
	require_once \get_stylesheet_directory() . '/vendor/autoload.php';
}

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Genesis Starter Theme' );
define( 'CHILD_THEME_URL', 'https://github.com/goblindegook/genesis-starter' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

//* Set Localization (do not remove)
\load_child_theme_textdomain( 'genesis-starter',
	\apply_filters( 'child_theme_textdomain', \get_stylesheet_directory() . '/languages', 'genesis-starter' ) );

//* Add HTML5 markup structure
\add_theme_support( 'html5', array(
	'caption',
	'comment-form',
	'comment-list',
	'gallery',
	'search-form',
) );

//* Add support for accessibility features
\add_theme_support( 'genesis-accessibility', array(
	'404-page',
	'drop-down-menu',
	'headings',
	'rems',
	'search-form',
	'skip-links',
) );

//* Add viewport meta tag for mobile browsers
\add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
\add_theme_support( 'custom-background' );

//* Add support for a widget area fter the content.
\add_theme_support( 'genesis-after-entry-widget-area' );

//* Add support for 3-column footer widgets
\add_theme_support( 'genesis-footer-widgets', 3 );

//* Setup theme
\add_action( 'after_setup_theme', function () {
	$components = array(
        'markup'     => new \Genesis_Starter\Markup(),
        'scripts'    => new \Genesis_Starter\Scripts(),
        'styles'     => new \Genesis_Starter\Styles(),
        'shortcodes' => new \Genesis_Starter\Shortcodes(),
	);

	foreach ( $components as &$component ) {
		$component->ready();
	}
} );
