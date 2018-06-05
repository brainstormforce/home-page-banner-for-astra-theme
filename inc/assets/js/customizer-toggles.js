/**
 * Showing and Hiding controls of Customizer.
 *
 * @package Astra Addon
 * @since 1.0.0
 */

( function( $ ) {
	ASTControlTrigger.addHook( 'astra-toggle-control', function( argument, api ) {

		/* Layout select */
		ASTCustomizerToggles ['astra-settings[banner-image-size-option]'] = [

			{
				controls: [
					'astra-settings[banner-custom-top-padding]',
					'astra-settings[banner-custom-bottom-padding]'
				],
				callback: function( val ) {

					if ( val === 'custom-size' ) {
						return true;
					}

					return false;
				}
			}
		];
	});
})( jQuery );
