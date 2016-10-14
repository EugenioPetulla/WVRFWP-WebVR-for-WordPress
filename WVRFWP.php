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
	public function wvrfwp_embed_shortcode( $atts ) {
			$atts = extract( shortcode_atts( array(
				'type' => 'image',
				'width' => '300',
				'height' => '300',
				'url' => '',
			), $atts ) );

			if (!empty($url)){
				$html = '<a-scene>';

				if($type==='image'){
			      $html .= '<a-sky src="' . $url . '" rotation="0 -130 0"></a-sky>';
				}

				$html .= '</a-scene>';

			return $html;
	}

	private function __construct() {
			//add_action( 'wp_footer', array( $this, 'wvrfwp_aframe_js' ), 9999 );
			wp_register_script( 'aframe', 'https://aframe.io/releases/0.3.0/aframe.min.js', array(), '0.3.0', true );
			add_shortcode( 'vr-embed', array( $this, 'wvrfwp_embed_shortcode' ) );
	}

}