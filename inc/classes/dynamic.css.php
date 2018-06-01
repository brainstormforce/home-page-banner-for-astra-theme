<?php

/**
 * Banner Widgets - Dynamic CSS
 *
 * @package Home Page Banner for Astra Theme
 * @since 1.0.0
 */

add_action( 'wp_enqueue_scripts', 'astra_banner_dynamic_css' );

/**
 * Dynamic CSS
 *
 * @param  string $dynamic_css          Astra Dynamic CSS.
 * @param  string $dynamic_css_filtered Astra Dynamic CSS Filters.
 * @return string
 */
function astra_banner_dynamic_css() {

	echo "stringstringstringstringstringstringstringstringstringstringstringstringstringstringstringstringstringstringstringstringstringstring";
	$body_font_family    			= astra_body_font_family();

	// Typography.
	$banner_title_font_family      	= astra_get_option( 'banner-font-family', 'inherit' );
	$banner_title_font_weight   	= astra_get_option( 'banner-font-weight', 'inherit' );

	// Color.
	$banner_text_color         		= astra_get_option( 'banner-bg-color' );

	//Image
	$banner_image					= astra_get_option( 'ast-banner-image' );

	$banner_css = array(

		// Banner CSS.
		'.home-page-banner, .home-page-banner *' => array(
			'color' 		 => esc_attr( $banner_text_color ),
			'font-family'    => astra_get_css_value( $banner_title_font_family, 'font', $body_font_family ),
			'font-weight'    => astra_get_css_value( $banner_title_font_weight, 'font' ),
		),
		'.home-page-banner' => array(
			'background-image'    	=> 'url(' . esc_url( $banner_image ) . ')',
			'background-repeat'   	=> esc_attr( 'repeat' ),
			'background-size'     	=> esc_attr( 'cover' ),
			'background-position' 	=> esc_attr( 'center center' ),
			'text-align'			=> 'center',
		),
	);

	$ast_banner_css_output = astra_parse_css( $banner_css );

	wp_add_inline_style( 'astra-theme-css', $ast_banner_css_output );

}
