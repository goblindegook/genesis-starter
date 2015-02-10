<?php

namespace goblindegook\WP\Theme\Genesis_Starter;

class Scripts {

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
	 * Enqueue scripts.
	 *
	 * Fired on `wp_enqueue_scripts`.
	 */
	public function enqueue() {

		\wp_enqueue_script( 'genesis-starter-head',
			$this->base_uri . 'head.js',
			array(),
			CHILD_THEME_VERSION, false );

		\wp_enqueue_script( 'genesis-starter-infrastructure',
			$this->base_uri . 'infrastructure.js',
			array(),
			CHILD_THEME_VERSION, true );

		\wp_enqueue_script( 'genesis-starter-app',
			$this->base_uri . 'app.js',
			array( 'genesis-starter-infrastructure' ),
			CHILD_THEME_VERSION, true );
	}

}
