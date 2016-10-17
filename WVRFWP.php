<?php

/**
 * WVRFWP: WebVR for WordPress
 *
 * @package   WVRFWP
 * @author    Eugenio Petullà <support@codeat.co>
 * @license   GPL-2.0+
 * @link      https://codeat.co/WVRFWP
 * @copyright 2016 Eugenio Petullà - Codeat
 *
 * @wordpress-plugin
 * Plugin Name:       WVRFWP
 * Plugin URI:        http://codeat.co/WVRFWP
 * Description:  	  Add support for 360 photos and videos in your WordPress content and give to your users the possibility to explore them using cardboards or headsets.
 * Version:           1.0.0
 * Author:            iGenius, codeat
 * Author URI:        https://codeat.co/WVRFWP
 * Text Domain:       WVRFWP
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
	die;
}

class WVRFWP {

	protected static $instance = null;

	public function wvrfwp_image_embed_shortcode( $atts ) {
			$atts = extract( shortcode_atts( array(
				'width' => '300',
				'height' => '300',
				'url' => '',
			), $atts ) );

			if (!empty($url)){
				$html = '<style>
							a-scene {
								width: ' . $width . 'px;
								height: ' . $height . 'px;
								max-width: 100%;
								max-height: 1080px;
							}
						</style>';

				$html .= '<a-scene embedded><a-sky src="' . $url . '" rotation="0 -130 0"></a-sky></a-scene>';

			}

			return $html;
	}

	public function wvrfwp_video_embed_shortcode( $atts ) {
			$atts = extract( shortcode_atts( array(
				'width' => '300',
				'height' => '300',
				'url' => '',
			), $atts ) );

			if (!empty($url)){
				$html = '<style>
							a-scene {
								width: ' . $width . 'px;
								height: ' . $height . 'px;
								max-width: 100%;
								max-height: 1080px;
							}
						</style>';

				$html .= '<a-scene embedded>
						      <a-assets>
						        <video id="video" src="' . $url . '" autoplay loop crossorigin></video>
						      </a-assets>
						      <a-videosphere src="#video" rotation="0 180 0"></a-videosphere>
						</a-scene>';
			}

			return $html;
	}

	private function __construct() {
			//add_action( 'wp_footer', array( $this, 'wvrfwp_aframe_js' ), 9999 );
			wp_register_script( 'aframe', 'https://aframe.io/releases/0.3.0/aframe.min.js', array(), '0.3.0', true );
			wp_enqueue_script( 'aframe' );
			add_shortcode( 'vr-image', array( $this, 'wvrfwp_image_embed_shortcode' ) );
			add_shortcode( 'vr-video', array( $this, 'wvrfwp_video_embed_shortcode' ) );
	}

	/**
	 * Return an instance of this class.
	 *
	 * @since     1.0.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {
		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

}

add_action( 'plugins_loaded', array( 'WVRFWP', 'get_instance' ), 9999 );