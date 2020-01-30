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
 */
function astra_banner_dynamic_css() {

	$body_font_family = astra_body_font_family();

	// Typography.
	$banner_heading_font_family    = astra_get_option( 'banner-font-family', 'inherit' );
	$banner_heading_font_weight    = astra_get_option( 'banner-font-weight', 'inherit' );
	$banner_subheading_font_family = astra_get_option( 'banner-subheading-font-family', 'inherit' );
	$banner_subheading_font_weight = astra_get_option( 'banner-subheading-font-weight', 'inherit' );

	$banner_heading_text_transform    = astra_get_option( 'banner-heading-text-transform', 'inherit' );
	$banner_subheading_text_transform = astra_get_option( 'banner-subheading-text-transform', 'inherit' );

	$banner_heading_line_height    = astra_get_option( 'banner-heading-line-height' );
	$banner_subheading_line_height = astra_get_option( 'banner-subheading-line-height' );

	$banner_heading_font_size    = astra_get_option( 'banner-heading-font-size' );
	$banner_subheading_font_size = astra_get_option( 'banner-subheading-font-size' );

	// Color.
	$banner_heading_color    = astra_get_option( 'banner-bg-color' );
	$banner_subheading_color = astra_get_option( 'banner-subheading-bg-color' );

	// Image.
	$banner_image = astra_get_option( 'home-page-banner-image' );

	// Background.
	$background_size            = astra_get_option( 'banner-image-size-option' );
	$custom_background_top_p    = astra_get_option( 'banner-custom-top-padding' );
	$custom_background_bottom_p = astra_get_option( 'banner-custom-bottom-padding' );

	$custom_top_padding    = '';
	$custom_bottom_padding = $custom_top_padding;

	if ( 'custom-size' == $background_size ) {

		$custom_top_padding = $custom_background_top_p;
		if ( is_numeric( $custom_background_top_p ) ) {
			$custom_top_padding = $custom_background_top_p . '%';
		}
		$custom_bottom_padding = $custom_background_bottom_p;
		if ( is_numeric( $custom_background_bottom_p ) ) {
			$custom_bottom_padding = $custom_background_bottom_p . '%';
		}
	}

	$banner_css = array(

		// Banner CSS.
		'.home-page-banner .heading-container .banner-heading' => array(
			'color'          => esc_attr( $banner_heading_color ),
			'font-family'    => astra_get_css_value( $banner_heading_font_family, 'font', $body_font_family ),
			'font-weight'    => astra_get_css_value( $banner_heading_font_weight, 'font' ),
			'font-size'      => astra_responsive_font( $banner_heading_font_size, 'desktop' ),
			'line-height'    => esc_attr( $banner_heading_line_height ),
			'text-transform' => esc_attr( $banner_heading_text_transform ),
		),
		'.home-page-banner .heading-container .banner-subheading' => array(
			'color'          => esc_attr( $banner_subheading_color ),
			'font-family'    => astra_get_css_value( $banner_subheading_font_family, 'font', $body_font_family ),
			'font-weight'    => astra_get_css_value( $banner_subheading_font_weight, 'font' ),
			'font-size'      => astra_responsive_font( $banner_subheading_font_size, 'desktop' ),
			'line-height'    => esc_attr( $banner_subheading_line_height ),
			'text-transform' => esc_attr( $banner_subheading_text_transform ),
		),
		'.home-page-banner'                    => array(
			'background-image'    => 'url(' . esc_url( $banner_image ) . ')',
			'background-repeat'   => esc_attr( 'repeat' ),
			'background-size'     => esc_attr( 'cover' ),
			'background-position' => esc_attr( 'center center' ),
		),
		'.home-page-banner .heading-container' => array(
			'padding-top'    => esc_attr( $custom_top_padding ),
			'padding-bottom' => esc_attr( $custom_bottom_padding ),
		),
	);

	$ast_banner_css_output = astra_parse_css( $banner_css );

	$tablet_css = array(
		'.home-page-banner .heading-container .banner-heading' => array(
			'font-size' => astra_responsive_font( $banner_heading_font_size, 'tablet' ),
		),
		'.home-page-banner .heading-container .banner-subheading' => array(
			'font-size' => astra_responsive_font( $banner_subheading_font_size, 'tablet' ),
		),
	);

	$ast_banner_css_output .= astra_parse_css( $tablet_css, '', '768' );

	$mobile_css = array(
		'.home-page-banner .heading-container .banner-heading' => array(
			'font-size' => astra_responsive_font( $banner_heading_font_size, 'mobile' ),
		),
		'.home-page-banner .heading-container .banner-subheading' => array(
			'font-size' => astra_responsive_font( $banner_subheading_font_size, 'mobile' ),
		),
	);

	$ast_banner_css_output .= astra_parse_css( $mobile_css, '', '544' );

	wp_add_inline_style( 'astra-theme-css', $ast_banner_css_output );

}
