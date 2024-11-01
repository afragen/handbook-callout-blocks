<?php
/**
 * Class providing blocks for the block editor.
 *
 * @package handbook
 */

/**
 * Class WPorg_Handbook_Blocks
 */
class WPorg_Handbook_Blocks {

	/**
	 * Initializes handbook blocks.
	 */
	public static function init() {
		add_action( 'init', [ __CLASS__, 'do_init' ] );
	}

	/**
	 * Fires on 'init' action.
	 *
	 * @access public
	 */
	public static function do_init() {
		register_block_type_from_metadata( plugin_dir_path( WPORG_HANDBOOK_PLUGIN_FILE ) . 'build/block.json' );
	}
}

WPorg_Handbook_Blocks::init();
