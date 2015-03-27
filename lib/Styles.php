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
		\add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
		\add_filter( 'use_default_gallery_style', '\__return_false' );
	}

	/**
	 * Enqueue styles.
	 *
	 * Fired on `wp_enqueue_scripts`.
	 */
	public function enqueue() {
		\add_editor_style();
	}

}
