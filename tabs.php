<?php
/**
 * Plugin Name:       Tab Layout
 * Description:       Display content in a tabbed layout
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Amber Alter
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       tabs
 *
 * @package           create-block
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/block-editor/tutorials/block-tutorial/writing-your-first-block-type/
 */
function create_block_tabs_block_init() {
	var_dump(__FILE__);
	register_block_type( __DIR__ , array(
		'render_callback' => function ( $attribs, $content ){
			if( !is_admin() ) {

				wp_enqueue_script(
					'tabs-frontend',
					plugins_url('assets/frontend.js', __FILE__),
				);

				return $content;
			
			}//if frontend
		}//render callback
	));

}
add_action( 'init', 'create_block_tabs_block_init' );
