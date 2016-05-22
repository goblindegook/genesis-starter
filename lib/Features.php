<?php

namespace Genesis_Starter;

class Features {

	/**
	 * Declare theme features.
	 */
	public function ready() {

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

		//* Add support for custom headers
		\add_theme_support( 'custom-header', array(
			'width'           => 600,
			'height'          => 160,
			'header-selector' => '.site-title a',
			'header-text'     => false,
			'flex-height'     => true,
		) );

		//* Add support for a widget area fter the content
		\add_theme_support( 'genesis-after-entry-widget-area' );

		//* Add support for 3-column footer widgets
		\add_theme_support( 'genesis-footer-widgets', 3 );

		//* Image sizes
		\add_image_size( 'featured-image', 720, 400, true );

	}
	
}
