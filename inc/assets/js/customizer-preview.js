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
	astra_css( 'astra-settings[banner-bg-color]', 'color', '.home-page-banner .heading-container .banner-heading' );
	astra_css( 'astra-settings[banner-subheading-bg-color]', 'color', '.home-page-banner .heading-container .banner-subheading' );
	
	astra_responsive_font_size( 'astra-settings[banner-heading-font-size]', '.home-page-banner .heading-container .banner-heading' );
	astra_responsive_font_size( 'astra-settings[banner-subheading-font-size]', '.home-page-banner .heading-container .banner-subheading' );

	astra_css( 'astra-settings[banner-heading-line-height]', 'line-height', '.home-page-banner .heading-container .banner-heading' );
	astra_css( 'astra-settings[banner-heading-text-transform]', 'text-transform', '.home-page-banner .heading-container .banner-heading' );

	astra_css( 'astra-settings[banner-subheading-line-height]', 'line-height', '.home-page-banner .heading-container .banner-subheading' );
	astra_css( 'astra-settings[banner-subheading-text-transform]', 'text-transform', '.home-page-banner .heading-container .banner-subheading' );

} )( jQuery );
