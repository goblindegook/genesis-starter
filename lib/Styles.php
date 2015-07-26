<?php

namespace goblindegook\WP\Theme\Genesis_Starter;

class Styles {

	/**
	 * Setup hooks.
	 */
	public function ready() {
		\add_action( 'admin_init', array( $this, 'admin_init' ) );
		\add_action( 'wp_print_styles', array( $this, 'dequeue' ) );
		\add_filter( 'use_default_gallery_style', '\__return_false' );
	}

	/**
	 * Enqueue editor style.
	 *
	 * Fired on `admin_init`.
	 */
	public function admin_init() {
		\add_editor_style( 'editor-style.css' );
		\add_editor_style( 'fonts.css' );
	}

	/**
	 * Dequeue styles.
	 *
	 * Fired on `wp_print_styles`.
	 */
	public function dequeue() {
		\wp_dequeue_style( 'dashicons' );
	}

}
