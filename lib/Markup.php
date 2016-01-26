<?php

namespace Genesis_Starter;

class Markup {

	/**
 	* Initialize markup handler.
 	*/
	public function ready() {
		\remove_action( 'genesis_doctype', 'genesis_do_doctype' );
		\add_action( 'genesis_doctype', [ $this, 'doctype' ] );
	}

	/**
 	* Replace default DOCTYPE with IE conditionals.
 	*/
	public function doctype() {
		?><!DOCTYPE html>
		<!--[if lt IE 7 ]><html class="ie6 no-js" <?php \language_attributes( 'html' ); ?>><![endif]-->
		<!--[if IE 7 ]><html class="ie7 no-js" <?php \language_attributes( 'html' ); ?>><![endif]-->
		<!--[if IE 8 ]><html class="ie8 no-js" <?php \language_attributes( 'html' ); ?>><![endif]-->
		<!--[if IE 9 ]><html class="ie9 no-js" <?php \language_attributes( 'html' ); ?>><![endif]-->
		<!--[if (gt IE 9)|!(IE)]><!--><html class="no-js" <?php \language_attributes( 'html' ); ?>><!--<![endif]-->
		<head <?php echo \genesis_attr( 'head' ); ?>>
			<meta charset="<?php \bloginfo( 'charset' ); ?>" />
		<?php
	}

}
