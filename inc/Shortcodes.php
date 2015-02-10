<?php

namespace goblindegook\WP\Theme\Genesis_Starter;

/**
 * Theme shortcodes.
 */
class Shortcodes {

	/**
	 * Setup shortcode hooks.
	 */
	public function ready () {
		$this->_replace_shortcode( 'gallery', [ $this, 'gallery_shortcode' ] );
	}

	/**
	 * Wraps the gallery shortcode and removes breaks from the output.
	 */
	public function gallery_shortcode( $attr ) {
		$content = \gallery_shortcode( $attr );
		return preg_replace( '/<br style=([^>]+)>/mi', '', $content );
	}

	/**
	 * Replaces the current shortcode function with the provided callback.
	 * @param  string   $tag      Shortcode tag.
	 * @param  callable $callback Shortcode callback.
	 */
	private function _replace_shortcode( $tag, $callback ) {
		\remove_shortcode( $tag );
		\add_shortcode( $tag, $callback );
	}
}
