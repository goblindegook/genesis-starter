<?php

namespace goblindegook\WP\Theme\Genesis_Starter;

class Shortcodes {

	public function ready () {
		\remove_shortcode( 'gallery' );
		\add_shortcode( 'gallery', [ $this, 'render_gallery' ] );
	}

	/**
	 * Wraps the gallery shortcode and remove breaks from the output.
	 */
	public function render_gallery( $attr ) {
		$content = \gallery_shortcode( $attr );
		return preg_replace( '/<br style=([^>]+)>/mi', '', $content );
	}

}
