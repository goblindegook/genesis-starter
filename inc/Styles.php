<?php

namespace goblindegook\WP\Theme\Genesis_Starter;

class Styles {

	private $base_uri;

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
		\add_action( 'wp_enqueue_scripts', [ $this, 'enqueue' ] );
	}

	/**
	 * Enqueue styles.
	 *
	 * Fired on `wp_enqueue_scripts`.
	 */
	public function enqueue() {
		
		\wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700', array(), CHILD_THEME_VERSION );

		//* Add editor style support
		\add_editor_style();
		\add_editor_style( '//fonts.googleapis.com/css?family=' . urlencode( 'Lato:300,400,700' ) );
	}

}
