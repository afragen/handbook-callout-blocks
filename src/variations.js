/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';

const variations = [
	{
		name: 'info',
		isDefault: true,
		title: __( 'Info Callout', 'handbook-callout-blocks' ),
		icon: 'info',
		attributes: { type: 'info' },
	},
	{
		name: 'tip',
		title: __( 'Tip Callout', 'handbook-callout-blocks' ),
		icon: 'lightbulb',
		attributes: { type: 'tip' },
	},
	{
		name: 'alert',
		title: __( 'Alert Callout', 'handbook-callout-blocks' ),
		icon: 'flag',
		attributes: { type: 'alert' },
	},
	{
		name: 'tutorial',
		title: __( 'Tutorial Callout', 'handbook-callout-blocks' ),
		icon: 'hammer',
		attributes: { type: 'tutorial' },
	},
	{
		name: 'warning',
		title: __( 'Warning Callout', 'handbook-callout-blocks' ),
		icon: 'dismiss',
		attributes: { type: 'warning' },
	},
];

export default variations;
