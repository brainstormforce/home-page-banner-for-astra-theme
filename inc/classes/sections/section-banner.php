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
		ASTRA_THEME_SETTINGS . '[ast-banner-image]', array(
			'default'           => astra_get_option( 'ast-banner-image' ),
			'type'              => 'option',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize, ASTRA_THEME_SETTINGS . '[ast-banner-image]', array(
				'section'        => 'section-banner-content',
				'priority'       => 5,
				'label'          => __( 'Banner Image', 'astra' ),
				'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
			)
		)
	);

	/**
	 * Option: Add Heading
	 */
	$wp_customize->add_setting(
		ASTRA_THEME_SETTINGS . '[ast-banner-heading]', array(
			'default'           => astra_get_option( 'ast-banner-heading' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_checkbox', 'sanitize_text_field' ),
		)
	);
	$wp_customize->add_control(
		ASTRA_THEME_SETTINGS . '[ast-banner-heading]', array(
			'type'     => 'text',
			'section'  => 'section-banner-content',
			'label'    => __( 'Banner Heading', 'astra' ),
			'priority' => 6,
		)
	);

	/**
	 * Option: Add Sub Heading
	 */
	$wp_customize->add_setting(
		ASTRA_THEME_SETTINGS . '[ast-banner-subheading]', array(
			'default'           => astra_get_option( 'ast-banner-subheading' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_checkbox', 'sanitize_text_field' ),
		)
	);
	$wp_customize->add_control(
		ASTRA_THEME_SETTINGS . '[ast-banner-subheading]', array(
			'type'     => 'text',
			'section'  => 'section-banner-content',
			'label'    => __( 'Banner Subheading', 'astra' ),
			'priority' => 6,
		)
	);

	/**
	 * Option: Heading and Sub Heading Font Family
	 */
	$wp_customize->add_setting(
		ASTRA_THEME_SETTINGS . '[font-family-banner-heading-subheading]', array(
			'default'           => astra_get_option( 'font-family-banner-heading-subheading' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new Astra_Control_Typography(
			$wp_customize, ASTRA_THEME_SETTINGS . '[font-family-banner-heading-subheading]', array(
				'type'    => 'ast-font-family',
				'label'   => __( 'Font Family', 'astra-addon' ),
				'section' => 'section-banner-style',
				'connect' => ASTRA_THEME_SETTINGS . '[font-weight-below-header-primary-menu]',
			)
		)
	);

	$wp_customize->add_setting(
		ASTRA_THEME_SETTINGS . '[banner-bg-color]', array(
			'default'           => astra_get_option( 'banner-bg-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Astra_Control_Color(
			$wp_customize, ASTRA_THEME_SETTINGS . '[banner-bg-color]', array(
				'type'    => 'ast-color',
				'label'   => __( 'Background Overlay Color', 'astra-addon' ),
				'section' => 'section-banner-style',
			)
		)
	);


