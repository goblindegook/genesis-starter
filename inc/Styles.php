<?php

namespace goblindegook\WP\Theme\Genesis_Starter;

class Styles {

	private $base_uri;

	private $google_fonts_uri = '//fonts.googleapis.com/css?family=';

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->base_uri = \get_stylesheet_directory_uri() . '/public/';
	}

	/**
	 * Setup hooks.
	 */
	public function ready() {
		\add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
	}

	/**
	 * Enqueue styles.
	 *
	 * Fired on `wp_enqueue_scripts`.
	 */
	public function enqueue() {
		$font_family = 'Lato:300,400,700';

		\add_editor_style();
		\add_editor_style( $this->google_fonts_uri . urlencode( $font_family ) );
		\wp_enqueue_style( 'google-fonts', $this->google_fonts_uri . $font_family, array(), CHILD_THEME_VERSION );
	}

}
