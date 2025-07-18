<?php
/**
 * Class providing blocks for the block editor.
 *
 * @package handbook
 */

namespace Fragen\Handbook_Callout_Blocks\Blocks;

use const Fragen\Handbook_Callout_Blocks\WPORG_HANDBOOK_PLUGIN_FILE;

bootstrap();

/**
 * Initializes handbook blocks
 *
 * @return void
 */
function bootstrap() {
	add_action( 'init', __NAMESPACE__ . '\\register_blocks' );
}

/**
 * Fires on 'init' action.
 */
function register_blocks() {
	register_block_type_from_metadata( plugin_dir_path( WPORG_HANDBOOK_PLUGIN_FILE ) . 'build/block.json' );
}
