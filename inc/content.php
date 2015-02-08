<?php

/**
 * Remove breaks from gallery.
 */
add_filter( 'the_content', function ( $content ) {
	return preg_replace( '/<br style=([^>]+)>/mi', '', $content );
}, 20, 1 );
