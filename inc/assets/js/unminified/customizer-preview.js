/**
 * This file adds some LIVE to the Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 *
 * @package Astra Addon
 * @since  1.0.0
 */

( function( $ ) {

	/**
	 * Banner Widgets Preview CSS
	 */
	astra_css( 'astra-settings[banner-bg-color]', 'color', '.home-page-banner, .home-page-banner *' );

} )( jQuery );
