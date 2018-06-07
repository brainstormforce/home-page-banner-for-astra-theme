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
		ASTRA_THEME_SETTINGS . '[home-page-banner-image]', array(
			'default'           => astra_get_option( 'home-page-banner-image' ),
			'type'              => 'option',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize, ASTRA_THEME_SETTINGS . '[home-page-banner-image]', array(
				'section'        => 'section-banner-contents',
				'priority'       => 5,
				'label'          => __( 'Banner Image', 'home-page-banner' ),
				'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
			)
		)
	);

	$wp_customize->add_setting(
		ASTRA_THEME_SETTINGS . '[banner-image-size-option]', array(
			'default'           => astra_get_option( 'banner-image-size-option' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		ASTRA_THEME_SETTINGS . '[banner-image-size-option]', array(
			'section'  => 'section-banner-contents',
			'priority'  => 10,
			'label'   => __( 'Image Size', 'home-page-banner' ),
			'type'    => 'select',
			'choices' => array(
				'custom-size' => __( ' Custom Size', 'home-page-banner' ),
				'full-size'   => __( ' Full screen', 'home-page-banner' ),
			),
		)
	);

	/**
	 * Option: Custom size top padding
	 */
	$wp_customize->add_setting(
		ASTRA_THEME_SETTINGS . '[banner-custom-top-padding]', array(
			'default'           => astra_get_option( 'banner-custom-top-padding' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		ASTRA_THEME_SETTINGS . '[banner-custom-top-padding]', array(
			'type'     => 'text',
			'description'	=> 'Custom Size can be given any positive number with or without units as "10" or "10px". Default unit is "%"',
			'section'  => 'section-banner-contents',
			'label'    => __( 'Top Padding', 'home-page-banner' ),
			'priority' => 15,
		    'transport'   => 'postMessage',
		)
	);

	/**
	 * Option: Custom size bottom-padding
	 */
	$wp_customize->add_setting(
		ASTRA_THEME_SETTINGS . '[banner-custom-bottom-padding]', array(
			'default'           => astra_get_option( 'banner-custom-bottom-padding' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		ASTRA_THEME_SETTINGS . '[banner-custom-bottom-padding]', array(
			'type'     => 'text',
			'description'	=> 'Custom Size can be given any positive number with or without units as "10" or "10px". Default unit is "%"',
			'section'  => 'section-banner-contents',
			'label'    => __( 'Bottom Padding', 'home-page-banner' ),
			'priority' => 20,
		    'transport'   => 'postMessage',
		)
	);

	/**
	 * Option: Add Heading
	 */
	$wp_customize->add_setting(
		ASTRA_THEME_SETTINGS . '[ast-banner-heading]', array(
			'default'           => astra_get_option( 'ast-banner-heading' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		ASTRA_THEME_SETTINGS . '[ast-banner-heading]', array(
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
		ASTRA_THEME_SETTINGS . '[ast-banner-subheading]', array(
			'default'           => astra_get_option( 'ast-banner-subheading' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		ASTRA_THEME_SETTINGS . '[ast-banner-subheading]', array(
			'type'     => 'text',
			'section'  => 'section-banner-contents',
			'label'    => __( 'Banner Subheading', 'home-page-banner' ),
			'priority' => 6,
		)
	);

	$wp_customize->add_control(
		new Astra_Control_Divider(
			$wp_customize, ASTRA_THEME_SETTINGS . '[divider-section-banner-heading]', array(
				'type'     => 'ast-divider',
				'section'  => 'section-banner-style',
				'priority' => 5,
				'label'    => __( 'Heading', 'home-page-banner' ),
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Heading Font Family
	 */
	$wp_customize->add_setting(
		ASTRA_THEME_SETTINGS . '[banner-font-family]', array(
			'default'           => astra_get_option( 'banner-font-family' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new Astra_Control_Typography(
			$wp_customize, ASTRA_THEME_SETTINGS . '[banner-font-family]', array(
				'type'    => 'ast-font-family',
				'label'   => __( 'Font Family', 'home-page-banner' ),
				'section' => 'section-banner-style',
				'connect' => ASTRA_THEME_SETTINGS . '[banner-font-weight]',
			)
		)
	);

	$wp_customize->add_setting(
		ASTRA_THEME_SETTINGS . '[banner-font-weight]', array(
			'default'           => astra_get_option( 'banner-font-weight' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_font_weight' ),
		)
	);
	$wp_customize->add_control(
		new Astra_Control_Typography(
			$wp_customize, ASTRA_THEME_SETTINGS . '[banner-font-weight]', array(
				'type'    => 'ast-font-weight',
				'label'   => __( 'Font Weight', 'home-page-banner' ),
				'section' => 'section-banner-style',
				'connect' => ASTRA_THEME_SETTINGS . '[banner-font-family]',
			)
		)
	);

	$wp_customize->add_setting(
		ASTRA_THEME_SETTINGS . '[banner-heading-text-transform]', array(
			'default'           => astra_get_option( 'banner-heading-text-transform' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		ASTRA_THEME_SETTINGS . '[banner-heading-text-transform]', array(
			'section' => 'section-banner-style',
			'label'   => __( 'Text Transform', 'astra-addon' ),
			'type'    => 'select',
			'choices' => array(
				''           => __( 'Inherit', 'astra-addon' ),
				'none'       => __( 'None', 'astra-addon' ),
				'capitalize' => __( 'Capitalize', 'astra-addon' ),
				'uppercase'  => __( 'Uppercase', 'astra-addon' ),
				'lowercase'  => __( 'Lowercase', 'astra-addon' ),
			),
		)
	);

	$wp_customize->add_setting(
		ASTRA_THEME_SETTINGS . '[banner-heading-font-size]', array(
			'default'           => astra_get_option( 'banner-heading-font-size' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Astra_Control_Responsive(
			$wp_customize, ASTRA_THEME_SETTINGS . '[banner-heading-font-size]', array(
				'section'     => 'section-banner-style',
				'label'       => __( 'Font Size', 'astra-addon' ),
				'type'        => 'ast-responsive',
				'input_attrs' => array(
					'min' => 0,
				),
				'units'       => array(
					'px' => 'px',
					'em' => 'em',
				),
			)
		)
	);

	$wp_customize->add_setting(
		ASTRA_THEME_SETTINGS . '[banner-heading-line-height]', array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
		)
	);
	$wp_customize->add_control(
		new Astra_Control_Slider(
			$wp_customize, ASTRA_THEME_SETTINGS . '[banner-heading-line-height]', array(
				'section'     => 'section-banner-style',
				'label'       => __( 'Line Height', 'astra-addon' ),
				'type'        => 'ast-slider',
				'suffix'      => '',
				'input_attrs' => array(
					'min'  => 1,
					'step' => 0.01,
					'max'  => 5,
				),
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
				'label'   => __( 'Color', 'home-page-banner' ),
				'section' => 'section-banner-style',
			)
		)
	);

	$wp_customize->add_control(
		new Astra_Control_Divider(
			$wp_customize, ASTRA_THEME_SETTINGS . '[divider-section-banner-subheading]', array(
				'type'     => 'ast-divider',
				'section'  => 'section-banner-style',
				'priority' => 10,
				'label'    => __( 'Subheading', 'home-page-banner' ),
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Sub Heading Font Family
	 */
	$wp_customize->add_setting(
		ASTRA_THEME_SETTINGS . '[banner-subheading-font-family]', array(
			'default'           => astra_get_option( 'banner-subheading-font-family' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new Astra_Control_Typography(
			$wp_customize, ASTRA_THEME_SETTINGS . '[banner-subheading-font-family]', array(
				'type'    => 'ast-font-family',
				'label'   => __( 'Font Family', 'home-page-banner' ),
				'section' => 'section-banner-style',
				'connect' => ASTRA_THEME_SETTINGS . '[banner-subheading-font-weight]',
			)
		)
	);

	$wp_customize->add_setting(
		ASTRA_THEME_SETTINGS . '[banner-subheading-font-weight]', array(
			'default'           => astra_get_option( 'banner-subheading-font-weight' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_font_weight' ),
		)
	);
	$wp_customize->add_control(
		new Astra_Control_Typography(
			$wp_customize, ASTRA_THEME_SETTINGS . '[banner-subheading-font-weight]', array(
				'type'    => 'ast-font-weight',
				'label'   => __( 'Font Weight', 'home-page-banner' ),
				'section' => 'section-banner-style',
				'connect' => ASTRA_THEME_SETTINGS . '[banner-subheading-font-family]',
			)
		)
	);

	$wp_customize->add_setting(
		ASTRA_THEME_SETTINGS . '[banner-subheading-text-transform]', array(
			'default'           => astra_get_option( 'banner-subheading-text-transform' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		ASTRA_THEME_SETTINGS . '[banner-subheading-text-transform]', array(
			'section' => 'section-banner-style',
			'label'   => __( 'Text Transform', 'astra-addon' ),
			'type'    => 'select',
			'choices' => array(
				''           => __( 'Inherit', 'astra-addon' ),
				'none'       => __( 'None', 'astra-addon' ),
				'capitalize' => __( 'Capitalize', 'astra-addon' ),
				'uppercase'  => __( 'Uppercase', 'astra-addon' ),
				'lowercase'  => __( 'Lowercase', 'astra-addon' ),
			),
		)
	);

	$wp_customize->add_setting(
		ASTRA_THEME_SETTINGS . '[banner-subheading-font-size]', array(
			'default'           => astra_get_option( 'banner-subheading-font-size' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Astra_Control_Responsive(
			$wp_customize, ASTRA_THEME_SETTINGS . '[banner-subheading-font-size]', array(
				'section'     => 'section-banner-style',
				'label'       => __( 'Font Size', 'astra-addon' ),
				'type'        => 'ast-responsive',
				'input_attrs' => array(
					'min' => 0,
				),
				'units'       => array(
					'px' => 'px',
					'em' => 'em',
				),
			)
		)
	);

	$wp_customize->add_setting(
		ASTRA_THEME_SETTINGS . '[banner-subheading-line-height]', array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
		)
	);
	$wp_customize->add_control(
		new Astra_Control_Slider(
			$wp_customize, ASTRA_THEME_SETTINGS . '[banner-subheading-line-height]', array(
				'section'     => 'section-banner-style',
				'label'       => __( 'Line Height', 'astra-addon' ),
				'type'        => 'ast-slider',
				'suffix'      => '',
				'input_attrs' => array(
					'min'  => 1,
					'step' => 0.01,
					'max'  => 5,
				),
			)
		)
	);

	$wp_customize->add_setting(
		ASTRA_THEME_SETTINGS . '[banner-subheading-bg-color]', array(
			'default'           => astra_get_option( 'banner-subheading-bg-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Astra_Control_Color(
			$wp_customize, ASTRA_THEME_SETTINGS . '[banner-subheading-bg-color]', array(
				'type'    => 'ast-color',
				'label'   => __( 'Color', 'home-page-banner' ),
				'section' => 'section-banner-style',
			)
		)
	);

