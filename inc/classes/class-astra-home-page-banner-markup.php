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

			add_action( 'wp_enqueue_scripts', array( $this, 'add_scripts' ) );

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

			if ( ! is_home() ) {
				return;
			}
			
			$banner_heading 	= astra_get_option('ast-banner-heading');
			$banner_subheading 	= astra_get_option('ast-banner-subheading');
			$home_page_banner_size 	= astra_get_option('banner-image-size-option');

			// Full Screen.
			$full_screen = ( 'full-size' == $home_page_banner_size ) ? ' ast-full-home-page-banner' : '';

			$html = '<div class="home-page-banner'.$full_screen.'">' .
						'<div class="heading-container">' .
							'<h1 class="banner-heading">'.$banner_heading.'</h1>' .
							'<h3 class="banner-subheading">'.$banner_subheading.'</h3>' .
						'</div>' .
					'</div>';
			echo $html;
		}

		/**
		 * Add Styles
		 */
		function add_scripts() {

			if ( ! is_home() ) {
				return;
			}

			wp_enqueue_script( 'home-page-banner-js', ASTRA_HOME_PAGE_BANNER_URI . 'inc/assets/js/home-page-banner.js', array( 'jquery' ), ASTRA_HOME_PAGE_BANNER_VER );
			wp_enqueue_style( 'home-page-banner-css', ASTRA_HOME_PAGE_BANNER_URI . 'inc/assets/css/style.css', array(), ASTRA_HOME_PAGE_BANNER_VER );
		}
	}
}

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Astra_Home_Page_Banner_Markup::get_instance();
