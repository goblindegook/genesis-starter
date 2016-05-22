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

//* Setup theme
\add_action( 'after_setup_theme', function () {
	$components = array(
        'features'   => new \Genesis_Starter\Features(),
        'markup'     => new \Genesis_Starter\Markup(),
        'scripts'    => new \Genesis_Starter\Scripts(),
        'styles'     => new \Genesis_Starter\Styles(),
        'shortcodes' => new \Genesis_Starter\Shortcodes(),
	);

	foreach ( $components as &$component ) {
		$component->ready();
	}
} );
