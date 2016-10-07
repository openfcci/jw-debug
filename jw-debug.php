<?php
/**
 * Plugin Name: JW Debug
 * Description: Console debugging for JW Player.
 * Plugin URI:  https://github.com/openfcci/jw-debug/
 * Author:      Ryan Veitch
 * Author URI:  http://www.veitchdigital.com/
 * License:     GPL v2 or later
 * Version:     1.16.10.06
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;


/*--------------------------------------------------------------
# SECTION NAME
--------------------------------------------------------------*/

/**
* Add JW Debug Script
*
* Adds additional Javascript to footer area
* @since 1.16.10.06
* @version 1.16.10.06
*/
if ( ! function_exists( 'add_jw_debug_script' ) ) {
	function add_jw_debug_script() {
		echo "
			<script type='text/javascript'>
					playerInstance.on('adError',function(event){
						console.log('%c JW Ad Error: JW Player adError event was fired. ', 'background: #FF0046; color: white; display: block;');
						console.log('%c JW ' + event.message + ' ', 'background: #FF0046; color: white; display: block;');
						console.log('%c JW Ad Tag: ' + event.tag + ' ', 'background: #FF0046; color: white; display: block;');
					});

					playerInstance.on('adRequest',function(event){
						console.log('%c JW Event: adRequest ', 'background: #00C669; color: white; display: block;');
						console.log('%c JW adRequest Volume: ' + playerInstance.getVolume() + ' ', 'background: #00C669; color: white; display: block;');
						console.log('%c JW adposition: ' + event.adposition + ' ', 'background: #00C669; color: white; display: block;');
						console.log('%c JW client: ' + event.client + ' ', 'background: #00C669; color: white; display: block;');
						console.log('%c JW offset: ' + event.offset + ' ', 'background: #00C669; color: white; display: block;');
						console.log('%c JW adTag: ' + event.tag + ' ', 'background: #00C669; color: white; display: block;');
					});

					playerInstance.on('adStarted',function(event){
						console.log('%c JW Event: adStarted (VPAID-only) ', 'background: #1F8DF7; color: white; display: block;');
						console.log('%c JW adStarted Volume: ' + playerInstance.getVolume() + ' ', 'background: #1F8DF7; color: white; display: block;');
						console.log('%c JW creativetype:' + event.creativetype + ' ', 'background: #1F8DF7; color: white; display: block;');
						console.log('%c JW adTag:' + event.tag  + ' ', 'background: #1F8DF7; color: white; display: block;');
					});

					playerInstance.on('adImpression',function(event){
						console.log('%c JW Event: adImpression. An ad impression was fired. (VAST or IMA) ', 'background: #0B7EF4; color: white; display: block;');
						console.log('%c JW adImpression Volume: ' + playerInstance.getVolume() + ' ', 'background: #0B7EF4; color: white; display: block;');
						console.log('%c JW adTag: ' + event.tag + ' ', 'background: #0B7EF4; color: white; display: block;');
						console.log('%c JW adposition: ' + event.adposition + ' ', 'background: #0B7EF4; color: white; display: block;');
						console.log('%c JW linear: ' + event.linear + ' ', 'background: #0B7EF4; color: white; display: block;');
						console.log('%c JW adsystem: ' + event.adsystem + ' ', 'background: #0B7EF4; color: white; display: block;');
						console.log('%c JW adtitle: ' + event.adtitle + ' ', 'background: #0B7EF4; color: white; display: block;');
						console.log('%c JW client: ' + event.client + ' ', 'background: #0B7EF4; color: white; display: block;');
						if ( event.client == 'vast' ) {
							console.log('%c JW vastversion: ' + event.vastversion + ' ', 'background: #0B7EF4; color: white; display: block;');
							console.log('%c JW creativetype: ' + event.creativetype + ' ', 'background: #0B7EF4; color: white; display: block;');
							console.log('%c JW mediafile: ' + event.mediafile + ' ', 'background: #0B7EF4; color: white; display: block;');
							console.log('%c JW wrapper: ' + event.wrapper + ' ', 'background: #0B7EF4; color: white; display: block;');
						}
					});

			</script>
		";

	}
}
add_action( 'wp_footer', 'add_jw_debug_script' );
