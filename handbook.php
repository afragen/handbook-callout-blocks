<?php
/**
 * Plugin Name:       Handbook Callout Blocks
 * Description:       WP.org Handbook Callout blocks adapted from the WP.org Handbook plugin for use in posts and pages.
 * Version:           1.0.0-beta4
 * Author:            WordPress.org, afragen
 * Author URI:        https://wordpress.org/
 * License:           GPLv2 or later
 * Text Domain:       handbook-callout-blocks
 * Plugin URI:        https://github.com/afragen/handbook-callout-blocks
 * GitHub Plugin URI: https://github.com/afragen/handbook-callout-blocks
 * Primary Branch:    main
 * Requires at least: 5.9
 * Requires PHP:      7.4
 */

const WPORG_HANDBOOK_PLUGIN_FILE = __FILE__;

require_once __DIR__ . '/inc/callout-boxes.php';
require_once __DIR__ . '/inc/blocks.php';
