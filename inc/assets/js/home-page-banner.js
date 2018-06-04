(function($){

	/**
	 * Home Page Banner
	 *
	 * @class HomePageBanner
	 * @since 1.0
	 */
	HomePageBanner = {
		
		/**
		 * Initializes a Home Page Banner.
		 *
		 * @since 1.0
		 * @method init
		 */ 
		init: function()
		{
			// Init Full Screen height.
			HomePageBanner._initFullScreenHeight();
		},

		/**
		 * Fires when the Banner full screen selected.
		 *
		 * @since 1.0.0
		 * @access private
		 * @method _initFullScreenHeight
		 */ 
		_initFullScreenHeight: function()
		{
			// Set up the resize timer
			var ResizeTime,
			    win     = $(window);

			if ( $('.ast-full-home-page-banner')[0] ) {
				// Initiate full window height on resize
				HomePageBanner._homePageFullBanner();

				var width = win.width();
				win.resize(function() {
					if(win.width() != width){
						clearTimeout(ResizeTime);
						ResizeTime = setTimeout(HomePageBanner._homePageFullBanner, 200);
						width = win.width();
					}
				});
				
				win.on( "orientationchange", function( event ) {
					if(win.width() != width){
						clearTimeout(ResizeTime);
						ResizeTime = setTimeout(HomePageBanner._homePageFullBanner, 200);
						width = win.width();
					}
				});
			}
		},
		/**
		 * Fires when the Home Page Banner full screen selected.
		 *
		 * @since 1.0.0
		 * @access private
		 * @method _homePageFullBanner
		 */ 
		_homePageFullBanner: function()
		{
			// If we're not using a full screen element, bail.
			if ( ! $( '.ast-full-home-page-banner' ).length )
				return;
			
			// Set up some variables
			var window_height = $( window ).height();
			
			// Get any space above our page header
			var offset = $(".ast-full-home-page-banner").offset().top;

			// Apply the height to our div
			$( '.ast-full-home-page-banner' ).css( 'height', window_height - offset + 'px' );

		},
	}

	/* Initializes the Astra Advanced Headers. */
	$(function(){
		HomePageBanner.init();
	});

})(jQuery);