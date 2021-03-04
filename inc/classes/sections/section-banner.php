<?php
/**
 * Home Page Banner options for Astra.
 *
 * @package Home Page Banner for Astra Theme
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

	/**
	 * Option: Retina logo selector
	 */
	$wp_customize->add_setting(
		ASTRA_THEME_SETTINGS . '[home-page-banner-image]',
		array(
			'default'           => astra_get_option( 'home-page-banner-image' ),
			'type'              => 'option',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			ASTRA_THEME_SETTINGS . '[home-page-banner-image]',
			array(
				'section'        => 'section-banner-contents',
				'priority'       => 5,
				'label'          => __( 'Banner Image', 'home-page-banner' ),
				'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
			)
		)
	);

	$wp_customize->add_setting(
		ASTRA_THEME_SETTINGS . '[banner-image-size-option]',
		array(
			'default'           => astra_get_option( 'banner-image-size-option' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		ASTRA_THEME_SETTINGS . '[banner-image-size-option]',
		array(
			'section'  => 'section-banner-contents',
			'priority' => 10,
			'label'    => __( 'Image Size', 'home-page-banner' ),
			'type'     => 'select',
			'choices'  => array(
				'custom-size' => __( ' Custom Size', 'home-page-banner' ),
				'full-size'   => __( ' Full screen', 'home-page-banner' ),
			),
		)
	);

	/**
	 * Option: Custom size top padding
	 */
	$wp_customize->add_setting(
		ASTRA_THEME_SETTINGS . '[banner-custom-top-padding]',
		array(
			'default'           => astra_get_option( 'banner-custom-top-padding' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		ASTRA_THEME_SETTINGS . '[banner-custom-top-padding]',
		array(
			'type'        => 'text',
			'description' => 'Custom Size can be given any positive number with or without units as "10" or "10px". Default unit is "%"',
			'section'     => 'section-banner-contents',
			'label'       => __( 'Top Padding', 'home-page-banner' ),
			'priority'    => 15,
			'transport'   => 'postMessage',
		)
	);

	/**
	 * Option: Custom size bottom-padding
	 */
	$wp_customize->add_setting(
		ASTRA_THEME_SETTINGS . '[banner-custom-bottom-padding]',
		array(
			'default'           => astra_get_option( 'banner-custom-bottom-padding' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		ASTRA_THEME_SETTINGS . '[banner-custom-bottom-padding]',
		array(
			'type'        => 'text',
			'description' => 'Custom Size can be given any positive number with or without units as "5" or "5px". Default unit is "%"',
			'section'     => 'section-banner-contents',
			'label'       => __( 'Bottom Padding', 'home-page-banner' ),
			'priority'    => 20,
			'transport'   => 'postMessage',
		)
	);

	/**
	 * Option: Add Heading
	 */
	$wp_customize->add_setting(
		ASTRA_THEME_SETTINGS . '[ast-banner-heading]',
		array(
			'default'           => astra_get_option( 'ast-banner-heading' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		ASTRA_THEME_SETTINGS . '[ast-banner-heading]',
		array(
			'type'     => 'text',
			'section'  => 'section-banner-contents',
			'label'    => __( 'Banner Heading', 'home-page-banner' ),
			'priority' => 6,
		)
	);

	/**
	 * Option: Add Sub Heading
	 */
	$wp_customize->add_setting(
		ASTRA_THEME_SETTINGS . '[ast-banner-subheading]',
		array(
			'default'           => astra_get_option( 'ast-banner-subheading' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		ASTRA_THEME_SETTINGS . '[ast-banner-subheading]',
		array(
			'type'     => 'text',
			'section'  => 'section-banner-contents',
			'label'    => __( 'Banner Subheading', 'home-page-banner' ),
			'priority' => 6,
		)
	);

