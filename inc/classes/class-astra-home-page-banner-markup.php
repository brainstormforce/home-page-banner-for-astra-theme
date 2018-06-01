<?php
/**
 * Advanced Headers Markup
 *
 * @package Home Page Banner for Astra Theme
 * @since 1.0.0
 */

if ( ! class_exists( 'Astra_Home_Page_Banner_Markup' ) ) {

	/**
	 * Advanced Headers Markup Initial Setup
	 *
	 * @since 1.0.0
	 */
	class Astra_Home_Page_Banner_Markup {


		/**
		 * Member Variable
		 *
		 * @var object instance
		 */
		private static $instance;

		/**
		 *  Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 *  Constructor
		 */
		public function __construct() {

			add_filter( 'body_class', array( $this, 'body_classes' ), 10, 1 );

			// After Headers action.
			add_action( 'astra_header_after', array( $this, 'load_markup' ) );

			// add_action( 'wp_enqueue_scripts', array( $this, 'add_scripts' ), 9 );

		}

		/**
		 * Add Body Classes
		 *
		 * @param  array $classes Body Class Array.
		 * @return array
		 */
		function body_classes( $classes ) {

			$classes[] = 'ast-home-page-banner';

			return $classes;
		}

		/**
		 * Advanced Headers markup loader
		 *
		 * Loads appropriate template file based on the style option selected in options panel.
		 *
		 * @since 1.0.0
		 */
		function load_markup() {

			if ( is_front_page() ) {
				return;
			}
			
			$banner_heading 	= astra_get_option('ast-banner-heading');
			$banner_subheading 	= astra_get_option('ast-banner-subheading');

			// Add advanced header wrapper classes.
			// printf(
			// 	'<div class="%1$s" %2$s>',
			// 	$combined . $parallax . $full_screen . $vertical_center, ( ! empty( $parallax ) ) ? 'data-parallax-speed="' . esc_attr( $parallax_speed ) . '"' : ''
			// );

			$html = '<div class="home-page-banner">' .
						'<div class="heading-container">' .
							'<h1>'.$banner_heading.'</h1>' .
							'<h3>'.$banner_subheading.'</h3>' .
						'</div>' .
					'</div>';
			echo $html;
		}

		/**
		 * Add Styles
		 */
		function add_scripts() {

			if ( is_front_page() ) {
				return;
			}

			// if ( SCRIPT_DEBUG ) {

			// 	wp_enqueue_style( 'astra-advanced-headers-css', ASTRA_EXT_ADVANCED_HEADERS_URL . 'assets/css/unminified/style.css', array(), ASTRA_EXT_VER );
			// 	wp_enqueue_script( 'astra-advanced-headers-js', ASTRA_EXT_ADVANCED_HEADERS_URL . 'assets/js/minified/advanced-headers.min.js', array( 'jquery' ), ASTRA_EXT_VER );

			// }
		}
	}
}

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Astra_Home_Page_Banner_Markup::get_instance();
