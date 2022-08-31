/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { registerBlockType } from '@wordpress/blocks';
import { InnerBlocks } from '@wordpress/block-editor';

/**
 * Internal dependencies
 */
import edit from './edit';
import variations from './variations';
import transforms from './transforms';

/**
 * Import styles
 */
import './editor.css';

registerBlockType( 'wporg/callout', {
	title: __( 'Callout', 'handbook-callout-blocks' ),
	description: __( 'Callout boxes to be used in handbooks.', 'handbook-callout-blocks' ),
	category: 'widgets',
	icon: 'info',
	keywords: [ __( 'alert', 'handbook-callout-blocks' ), __( 'tip', 'handbook-callout-blocks' ) ],
	attributes: {
		type: {
			type: 'string',
			default: 'info',
		},
	},
	supports: {
		className: false,
	},
	example: {
		attributes: {
			type: 'info',
		},
		innerBlocks: [
			{
				name: 'core/paragraph',
				attributes: {
					content: __(
						'This is the content of the callout boxes.',
						'handbook-callout-blocks'
					),
				},
			},
		],
	},
	variations,
	transforms,
	edit,
	save: ( { attributes } ) => {
		const className = `callout callout-${ attributes.type }`;
		return (
			<div className={ className }>
				<InnerBlocks.Content />
			</div>
		);
	},
} );
