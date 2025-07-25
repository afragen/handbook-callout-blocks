<?php
/**
 * Handbook Callout Blocks.
 *
 * @package handbook
 * @author  WordPress.org, Andy Fragen
 * @link    https://github.com/afragen/handbook-callout-blocks
 */

/**
 * Plugin Name:       Handbook Callout Blocks
 * Plugin ID:         did:plc:deoui6ztyx6paqajconl67rz
 * Description:       WP.org Handbook Callout blocks adapted from the WP.org Handbook plugin for use in posts and pages.
 * Version:           1.0.3
 * Author:            WordPress.org, Andy Fragen
 * Author URI:        https://thefragens.com/
 * License:           GPLv2 or later
 * Text Domain:       handbook-callout-blocks
 * Plugin URI:        https://github.com/afragen/handbook-callout-blocks
 * GitHub Plugin URI: https://github.com/afragen/handbook-callout-blocks
 * Primary Branch:    main
 * Release Asset:     true
 * Requires at least: 5.9
 * Requires PHP:      7.4
 */

namespace Fragen\Handbook_Callout_Blocks;

const WPORG_HANDBOOK_PLUGIN_FILE = __FILE__;

bootstrap();

/**
 * Bootstrap.
 *
 * @return void
 */
function bootstrap(): void {
	require_once __DIR__ . '/inc/callout-boxes.php';
	require_once __DIR__ . '/inc/blocks.php';
}
