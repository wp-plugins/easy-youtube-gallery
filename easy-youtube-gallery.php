<?php
/*
Plugin Name: Easy YouTube Gallery
Plugin URI: http://urosevic.net/wordpress/plugins/easy-youtube-gallery/
Description: Quick and easy embed thumbnails gallery for custom set of YouTube videos provided in shortcode, and autoplay video on click in Magnific PopUp lightbox.
Author: Aleksandar Urošević
Version: 1.0.2
Author URI: http://urosevic.net/
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists('WPAU_EASY_YOUTUBE_GALLERY') )
{
	class WPAU_EASY_YOUTUBE_GALLERY
	{

		const DB_VER = 1;
		const VER = '1.0.2';

		/**
		 * Construct class
		 */
		function __construct() {

			// Register shortcodes `youtube_channel` and `ytc`
			add_shortcode( 'easy_youtube_gallery', array($this, 'shortcode') );
			add_shortcode( 'eytg', array($this, 'shortcode') );
			add_shortcode( 'eyg', array($this, 'shortcode') );

			// Enqueue scripts and styles
			add_action( 'wp_enqueue_scripts', array($this, 'enqueue_scripts') );

			// Enqueue scripts and styles for Edit page
			add_action( 'admin_enqueue_scripts', array($this, 'admin_enqueue_scripts') );

			// TinyMCE AddOn
			add_filter('mce_external_plugins', array($this, 'mce_external_plugins'), 998 );
			add_filter("mce_buttons", array($this, "mce_buttons"), 999 );

		} // END function __construct()

		/**
		 * Enqueue admin scripts and styles
		 */
		function admin_enqueue_scripts() {
			global $pagenow;
			if ( $pagenow == 'post.php' ) {
				wp_register_style( 'easy-youtube-gallery-admin', plugins_url('assets/css/admin.min.css', __FILE__), array(), self::VER );
				wp_enqueue_style( 'easy-youtube-gallery-admin' );
			}
		} // END function admin_enqueue_scripts()

		/**
		 * Enqueue frontend scripts and styles
		 */
		function enqueue_scripts() {

			// Do we have enqueued Magnific Popup?
			if ( ! wp_script_is( 'magnific-popup-au', 'enqueued' ) ) {
				wp_enqueue_style( 'magnific-popup-au', plugins_url('assets/lib/magnific-popup/magnific-popup.min.css', __FILE__), array(), self::VER );
				wp_enqueue_script( 'magnific-popup-au', plugins_url('assets/lib/magnific-popup/jquery.magnific-popup.min.js', __FILE__), array('jquery'), self::VER, true );
			}

			// Prepare and enqueue plugin assets
			wp_register_script( 'easy-youtube-gallery', plugins_url('assets/js/eytg.js', __FILE__), array('magnific-popup-au'), self::VER, true );
			wp_register_style( 'easy-youtube-gallery', plugins_url('assets/css/eytg.css', __FILE__), array(), self::VER );
			wp_enqueue_style( 'easy-youtube-gallery' );

		} // END function enqueue_scripts()

		/**
		 * Build Easy YouTube Gallery HTML structure based on provided shortcode options
		 * @param  array $atts    Custom selection of parameters
		 * @return text          Prepared HTML structure
		 */
		public function shortcode($atts) {

			extract(
				shortcode_atts(
					array(
						'id'        => '', // Single or array of YouTube video ID's
						'cols'      => 1, // Number of columns (1-8)
						'ar'        => '16_9', // empty for 16:9 or or `4_3` or `square`
						'thumbnail' => 'hqdefault', // 0, 1, 2, 3, default, mqdefault, hqdefault, sddefault, maxresdefault
						'controls'  => 1, // Optionally hide player controls
						'class'     => '', // Custom block class
						),
					$atts
				)
			);

			// Start output
			$output = '';

			// Complain if we don't have provided ID's
			if ( empty($id) ) {
				return '<p class="eytg-error">Please provide ID`s for some YouTube videos</p>';
			}

			// Now enqueue plugin JS as we need it
			if ( ! wp_script_is( 'easy-youtube-gallery', 'enqueued' ) ) {
				wp_enqueue_script( 'easy-youtube-gallery' );
			}

			// Make array of video ID's and prepare other var's
			$ids = explode(',', $id);
			$total_items = count($ids);
			$item_num = 0;

			// Open gallery container
			$output .= "<div class=\"easy_youtube_gallery col-{$cols} ar-{$ar} {$class}\">";

			// Process each video
			foreach ( $ids as $video_id ) {

				// Trim spaces from Video ID
				$video_id = trim($video_id);

				// Increase number of items and prepare position class
				++$item_num;
				if ( $item_num == 1 ) {
					$item_position = 'first';
				} elseif ( $item_num == $total_items ) {
					$item_position = 'last';
				} else {
					$item_position = 'mid';
				}

				// Construct HTML structure for single item
				$output .= "<a href=\"//youtube.com/watch?v={$video_id}&amp;rel=0&amp;modestbranding=1&amp;controls={$controls}\" class=\"eytg-item eytg-item-{$item_num} eytg-item-{$item_position}\">";
				$output .= "<span class=\"eytg-thumbnail\" style=\"background-image:url(//img.youtube.com/vi/{$video_id}/{$thumbnail}.jpg)\">";
				$output .= '</a>';

			} // END foreach ( $ids as $video_id )

			// Add clearfix after latest thumbnail
			$output .= '<div class="clearfix"></div>';

			// Close gallery container
			$output .= "</div><!-- easy_youtube_gallery col-{$cols} ar-{$ar} {$class} -->";

			// Print out prepared HTML structure
			return $output;

		} // END public function shortcode($atts)

		/**
		 * Register TinyMCE button for EYTG
		 * @param  array $plugins Unmodified set of plugins
		 * @return array          Set of TinyMCE plugins with EYTG addition
		 */
		function mce_external_plugins($plugins) {

			$plugins['eytg'] = plugin_dir_url(__FILE__) . 'inc/tinymce/plugin.min.js';

			return $plugins;

		} // END function mce_external_plugins($plugins)

		/**
		 * Append TinyMCE button for EYTG at the end of row 1
		 * @param  array $buttons Unmodified set of buttons
		 * @return array          Set of TinyMCE buttons with EYTG addition
		 */
		function mce_buttons($buttons) {

			$buttons[] = 'eytg_shortcode';
			return $buttons;

		} // END function mce_buttons($buttons)

	} // END class WPAU_EASY_YOUTUBE_GALLERY

	// Initialise class
	new WPAU_EASY_YOUTUBE_GALLERY;

} // END class_exists WPAU_EASY_YOUTUBE_GALLERY