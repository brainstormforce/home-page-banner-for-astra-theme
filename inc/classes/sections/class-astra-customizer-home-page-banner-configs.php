<?php
/**
 * Astra Theme Customizer Configuration Home Page Banner.
 *
 * @package Home Page Banner for Astra Theme
 * @since x.x.x
 */

// No direct access, please.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( class_exists( 'Astra_Customizer_Config_Base' ) ) {

	/**
	 * Register Above Header Customizer Configurations.
	 *
	 * @since 3.0.0
	 */
	class Astra_Customizer_Home_Page_Banner_Configs extends Astra_Customizer_Config_Base {

		/**
		 * Register Builder Above Customizer Configurations.
		 *
		 * @param Array                $configurations Astra Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 3.0.0
		 * @return Array Astra Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {

			$_section = 'section-banner-style';

			$_configs = array(

				/**
				 * Option: Header Builder Tabs
				 */
				array(
					'name'     => 'divider-section-banner-heading',
					'section'  => $_section,
					'type'     => 'control',
					'control'  => 'ast-divider',
					'priority' => 5,
					'title'    => __( 'Heading', 'home-page-banner' ),
					'settings' => array(),
				),

				/**
				 * Option: Headings Font Family
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[banner-font-family]',
					'type'      => 'control',
					'control'   => 'ast-font',
					'font-type' => 'ast-font-family',
					'default'   => astra_get_option( 'banner-font-family' ),
					'title'     => __( 'Font Family', 'home-page-banner' ),
					'section'   => $_section,
					'connect'   => ASTRA_THEME_SETTINGS . '[banner-font-weight]',
				),

				/**
				 * Option: Headings Font Weight
				 */
				array(
					'name'              => ASTRA_THEME_SETTINGS . '[banner-font-weight]',
					'type'              => 'control',
					'control'           => 'ast-font',
					'font-type'         => 'ast-font-weight',
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_font_weight' ),
					'default'           => astra_get_option( 'banner-font-weight' ),
					'title'             => __( 'Font Weight', 'home-page-banner' ),
					'section'           => $_section,
					'connect'           => ASTRA_THEME_SETTINGS . '[banner-font-family]',
				),

				/**
				 * Option: Headings Text Transform
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[banner-heading-text-transform]',
					'type'      => 'control',
					'control'   => 'select',
					'section'   => $_section,
					'title'     => __( 'Text Transform', 'home-page-banner' ),
					'transport' => 'postMessage',
					'default'   => astra_get_option( 'banner-heading-text-transform' ),
					'choices'   => array(
						''           => __( 'Inherit', 'astra' ),
						'none'       => __( 'None', 'astra' ),
						'capitalize' => __( 'Capitalize', 'astra' ),
						'uppercase'  => __( 'Uppercase', 'astra' ),
						'lowercase'  => __( 'Lowercase', 'astra' ),
					),
				),

				/**
				 * Option: Widget Title Font Size
				 */
				array(
					'name'        => ASTRA_THEME_SETTINGS . '[banner-heading-font-size]',
					'default'     => astra_get_option( 'banner-heading-font-size' ),
					'title'       => __( 'Font Size', 'home-page-banner' ),
					'type'        => 'control',
					'section'     => $_section,
					'control'     => 'ast-responsive',
					'input_attrs' => array(
						'min' => 0,
					),
					'transport'   => 'postMessage',
					'units'       => array(
						'px' => 'px',
						'em' => 'em',
					),
				),

				/**
				 * Option: Heading <H1> Line Height
				 */
				array(
					'name'              => ASTRA_THEME_SETTINGS . '[banner-heading-line-height]',
					'section'           => $_section,
					'default'           => astra_get_option( 'banner-heading-line-height' ),
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
					'type'              => 'control',
					'control'           => 'ast-slider',
					'title'             => __( 'Line Height', 'home-page-banner' ),
					'suffix'            => '',
					'transport'         => 'postMessage',
					'input_attrs'       => array(
						'min'  => 1,
						'step' => 0.01,
						'max'  => 5,
					),
				),

				/**
				 * Option: Bottom Border Color
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[banner-bg-color]',
					'default'   => astra_get_option( 'banner-bg-color' ),
					'type'      => 'control',
					'transport' => 'postMessage',
					'control'   => 'ast-color',
					'section'   => $_section,
					'title'     => __( 'Color', 'home-page-banner' ),
				),

				/**
				 * Option: Header Builder Tabs
				 */
				array(
					'name'     => 'divider-section-banner-subheading',
					'section'  => $_section,
					'type'     => 'control',
					'control'  => 'ast-divider',
					'priority' => 10,
					'title'    => __( 'Subheading', 'home-page-banner' ),
					'settings' => array(),
				),

				/**
				 * Option: Headings Font Family
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[banner-subheading-font-family]',
					'type'      => 'control',
					'control'   => 'ast-font',
					'font-type' => 'ast-font-family',
					'default'   => astra_get_option( 'banner-subheading-font-family' ),
					'title'     => __( 'Font Family', 'home-page-banner' ),
					'section'   => $_section,
					'connect'   => ASTRA_THEME_SETTINGS . '[banner-subheading-font-weight]',
				),

				/**
				 * Option: Headings Font Weight
				 */
				array(
					'name'              => ASTRA_THEME_SETTINGS . '[banner-subheading-font-weight]',
					'type'              => 'control',
					'control'           => 'ast-font',
					'font-type'         => 'ast-font-weight',
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_font_weight' ),
					'default'           => astra_get_option( 'banner-subheading-font-weight' ),
					'title'             => __( 'Font Weight', 'home-page-banner' ),
					'section'           => $_section,
					'connect'           => ASTRA_THEME_SETTINGS . '[banner-subheading-font-family]',
				),

				/**
				 * Option: Headings Text Transform
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[banner-subheading-text-transform]',
					'type'      => 'control',
					'control'   => 'select',
					'section'   => $_section,
					'title'     => __( 'Text Transform', 'home-page-banner' ),
					'transport' => 'postMessage',
					'default'   => astra_get_option( 'banner-subheading-text-transform' ),
					'choices'   => array(
						''           => __( 'Inherit', 'astra' ),
						'none'       => __( 'None', 'astra' ),
						'capitalize' => __( 'Capitalize', 'astra' ),
						'uppercase'  => __( 'Uppercase', 'astra' ),
						'lowercase'  => __( 'Lowercase', 'astra' ),
					),
				),

				/**
				 * Option: Widget Title Font Size
				 */
				array(
					'name'        => ASTRA_THEME_SETTINGS . '[banner-subheading-font-size]',
					'default'     => astra_get_option( 'banner-subheading-font-size' ),
					'title'       => __( 'Font Size', 'home-page-banner' ),
					'type'        => 'control',
					'section'     => $_section,
					'control'     => 'ast-responsive',
					'input_attrs' => array(
						'min' => 0,
					),
					'transport'   => 'postMessage',
					'units'       => array(
						'px' => 'px',
						'em' => 'em',
					),
				),

				/**
				 * Option: Heading <H1> Line Height
				 */
				array(
					'name'              => ASTRA_THEME_SETTINGS . '[banner-subheading-line-height]',
					'section'           => $_section,
					'default'           => astra_get_option( 'banner-subheading-line-height' ),
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
					'type'              => 'control',
					'control'           => 'ast-slider',
					'title'             => __( 'Line Height', 'home-page-banner' ),
					'suffix'            => '',
					'transport'         => 'postMessage',
					'input_attrs'       => array(
						'min'  => 1,
						'step' => 0.01,
						'max'  => 5,
					),
				),

				/**
				 * Option: Bottom Border Color
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[banner-subheading-bg-color]',
					'default'   => astra_get_option( 'banner-subheading-bg-color' ),
					'type'      => 'control',
					'transport' => 'postMessage',
					'control'   => 'ast-color',
					'section'   => $_section,
					'title'     => __( 'Color', 'home-page-banner' ),
				),

			);

			return array_merge( $configurations, $_configs );
		}
	}

	/**
	 * Kicking this off by creating object of this class.
	 */
	new Astra_Customizer_Home_Page_Banner_Configs();
}
