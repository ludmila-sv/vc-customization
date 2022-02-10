/*
import './gbblocks/beforeAfterSlider/editor';

function addAttribute( settings, name ) {
	if ( typeof settings.attributes !== 'undefined' ) {
		if ( name === 'core/button' ) {
			settings.attributes = Object.assign( settings.attributes, {
				ariaLabel: {
					type: 'string',
					source: 'attribute',
					selector: 'a',
					attribute: 'aria-label',
				},
			} );
		}
	}
	return settings;
}

wp.hooks.addFilter(
	'blocks.registerBlockType',
	'pf/button-arial-label-attribute',
	addAttribute
);

const buttonAdvancedControls = wp.compose.createHigherOrderComponent(
	( BlockEdit ) => {
		return ( props ) => {
			const { Fragment } = wp.element;
			const { TextControl } = wp.components;
			const { InspectorAdvancedControls } = wp.blockEditor;
			const { attributes, setAttributes, isSelected } = props;
			return (
				<Fragment>
					<BlockEdit { ...props } />
					{ isSelected && props.name === 'core/button' && (
						<InspectorAdvancedControls>
							<TextControl
								label="Aria Label"
								value={ attributes.ariaLabel || '' }
								onChange={ ( ariaLabel ) =>
									setAttributes( { ariaLabel } )
								}
							/>
						</InspectorAdvancedControls>
					) }
				</Fragment>
			);
		};
	},
	'buttonAdvancedControls'
);

wp.hooks.addFilter(
	'editor.BlockEdit',
	'pf/button-advanced-controls',
	buttonAdvancedControls
);

function buttonSetLinkAriaLabel( saveEl, blockType, attributes ) {
	const { ariaLabel } = attributes;
	if ( blockType.name === 'core/button' ) {
		if (
			ariaLabel &&
			saveEl.props &&
			saveEl.props.children &&
			saveEl.props.children.props &&
			saveEl.props.children.props.tagName &&
			saveEl.props.children.props.tagName === 'a'
		) {
			saveEl.props.children.props[ 'aria-label' ] = ariaLabel;
		}
	}

	return saveEl;
}

wp.hooks.addFilter(
	'blocks.getSaveElement',
	'pf/button-set-link-aria-label',
	buttonSetLinkAriaLabel
);
*/