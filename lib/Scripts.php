<?php

namespace Genesis_Starter;

class Scripts {

	/**
	 * Base URL for public assets.
	 * @var string
	 */
	private $base_uri;

	/**
	 * List of CSS assets to cache in localStorage.
	 * @var array
	 */
	private $cached_styles;

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->base_uri = \get_stylesheet_directory_uri() . '/public/';

		$this->cached_styles = array(
			'fonts' => $this->base_uri . 'fonts.css?version=' . CHILD_THEME_VERSION,
		);
	}

	/**
	 * Setup hooks.
	 */
	public function ready() {
		\add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
		\add_action( 'wp_head', array( $this, 'style_loader_fallback' ) );
		\add_filter( 'script_loader_tag', array( $this, 'script_loader_async' ), 10, 3 );
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
			array( 'jquery' ),
			CHILD_THEME_VERSION, true );

		\wp_enqueue_script( 'genesis-starter-app',
			$this->base_uri . 'app.js',
			array( 'genesis-starter-infrastructure' ),
			CHILD_THEME_VERSION, true );

		\wp_localize_script( 'genesis-starter-app', 'genesisStarter', array(
			'cachedStyles' => $this->cached_styles,
			'menu'         => \__( 'Menu', 'genesis-starter' ),
		) );

		\wp_add_inline_script( 'genesis-starter-app',
			file_get_contents( dirname( __DIR__ ) . '/public/inline.js' ) );
	}

	/**
	 * Include asynchronously loaded assets behind a <noscript> tag as a fallback.
	 */
	public function style_loader_fallback() {
		echo '<noscript>';

		foreach ( $this->cached_styles as $href ) {
			printf( '<link rel="stylesheet" type="text/css" media="all" href="%s">', \esc_url( $href ) );
		}

		echo '</noscript>';
	}

	/**
	 * Defer script loading.
	 *
	 * @param  string $tag    Script HTML tag.
	 * @param  string $handle Script handle.
	 * @param  string $src    Script URL.
	 *
	 * @return string      Filteredd script HTML tag.
	 */
	public function script_loader_async( $tag, $handle, $src ) {

		if ( \is_admin() ) {
			return $tag;
		}

		$blacklist = array(
			'jquery-core',
			'query-monitor',
		);

		// Do not load certain scripts asynchronously:
		if ( in_array( $handle, $blacklist ) ) {
			return $tag;
		}

		return str_replace( "$src'", "$src' async", $tag );
	}

}
