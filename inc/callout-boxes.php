<?php
/**
 * Class to register shortcodes for callout boxes to be used in handbooks.
 *
 * @package handbook
 */

namespace Fragen\Handbook_Callout_Blocks\Boxes;

use const Fragen\Handbook_Callout_Blocks\WPORG_HANDBOOK_PLUGIN_FILE;

bootstrap();

/**
 * Bootstrap.
 */
function bootstrap() {
	add_action( 'init', __NAMESPACE__ . '\\register_shortcodes' );
	add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_styles' );

	if ( did_action( 'init' ) ) {
		register_shortcodes();
	}
}

/**
 * Enqueues styles.
 */
function enqueue_styles() {
	wp_enqueue_style( 'wporg-handbook-css', plugins_url( 'stylesheets/callout-boxes.css', WPORG_HANDBOOK_PLUGIN_FILE ), [ 'dashicons' ], '20200121' );
}

/**
 * Array of key => value pairs where the shortcode name is the key, and the
 * localized callout box prefix is the value.
 *
 * @return array
 */
function get_shortcodes() {
	$shortcodes = [
		'info'     => __( 'Note:', 'handbook-callout-blocks' ),
		'tip'      => __( 'Tip:', 'handbook-callout-blocks' ),
		'alert'    => __( 'Alert:', 'handbook-callout-blocks' ),
		'tutorial' => __( 'Tutorial:', 'handbook-callout-blocks' ),
		'warning'  => __( 'Warning:', 'handbook-callout-blocks' ),
	];

	return $shortcodes;
}

/**
 * Register the callout box shortcodes.
 */
function register_shortcodes() {
	$shortcodes = get_shortcodes();
	foreach ( array_keys( $shortcodes ) as $name ) {
		add_shortcode( $name, __NAMESPACE__ . "\\{$name}_shortcode" );
	}
}

/**
 * Output callback for the `[info]` shortcode.
 *
 * @access public
 *
 * @param array  $atts    Shortcode attributes.
 * @param string $content Shortcode content.
 * @return string Shortcode output as HTML markup.
 */
function info_shortcode( $atts, $content = '' ): string {
	return build_callout_output( $content, 'info' );
}

/**
 * Output callback for the `[tip]` shortcode.
 *
 * @param array  $atts    Shortcode attributes.
 * @param string $content Shortcode content.
 * @return string Shortcode output as HTML markup.
 */
function tip_shortcode( $atts, $content = '' ): string {
	return build_callout_output( $content, 'tip' );
}

/**
 * Output callback for the `[alert]` shortcode.
 *
 * @param array  $atts    Shortcode attributes.
 * @param string $content Shortcode content.
 * @return string Shortcode output as HTML markup.
 */
function alert_shortcode( $atts, $content = '' ): string {
	return build_callout_output( $content, 'alert' );
}

/**
 * Output callback for the `[tutorial]` shortcode.
 *
 * @param array  $atts    Shortcode attributes.
 * @param string $content Shortcode content.
 * @return string Shortcode output as HTML markup.
 */
function tutorial_shortcode( $atts, $content = '' ): string {
	return build_callout_output( $content, 'tutorial' );
}

/**
 * Output callback for the `[warning]` shortcode.
 *
 * @param array  $atts    Shortcode attributes.
 * @param string $content Shortcode content.
 * @return string Shortcode output as HTML markup.
 */
function warning_shortcode( $atts, $content = '' ): string {
	return build_callout_output( $content, 'warning' );
}

/**
 * Build callout box output for the given shortcode.
 *
 * @param string $content   Shortcode content.
 * @param string $shortcode Shortcode name.
 * @return string Shortcode output as HTML markup.
 */
function build_callout_output( $content, $shortcode ): string {
	$class  = '';
	$prefix = '';
	$output = '';

	// Sanitize message content.
	$content = wp_kses_post( $content );

	$shortcodes = get_shortcodes();

	if ( isset( $shortcodes[ $shortcode ] ) && ! empty( $content ) ) {
		// Shortcode-type CSS class.
		$class = sanitize_html_class( $shortcode );
		$class = empty( $class ) ? '' : "callout-{$class}";

		// Message prefix.
		$prefix = '<span class="screen-reader-text">' . $shortcodes[ $shortcode ] . '</span>';

		// Content with prefix.
		$content = "{$prefix} {$content}";

		// Callout box output.
		$output .= "<div class='callout {$class}'>";

		// Temporarily disable o2 processing while formatting content.
		add_filter( 'o2_process_the_content', '__return_false', 1 );
		$output .= apply_filters( 'the_content', $content );
		remove_filter( 'o2_process_the_content', '__return_false', 1 );

		$output .= '</div>';
	}
	return $output;
}
