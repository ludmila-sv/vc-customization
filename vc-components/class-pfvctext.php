<?php
/**
 * VC Customization: a class for a custom module.
 *
 * @package pf-salient-child-theme
 */

if ( class_exists( 'WPBakeryShortCode' ) ) {
	/**
	 * Text with additional styles.
	 *
	 * @package pf-salient-child-theme
	 */
	class PFVcText extends WPBakeryShortCode {

		/**
		 * Construct function.
		 *
		 * @package pf-salient-child-theme
		 */
		public function __construct() {
			add_action( 'init', array( $this, 'create_shortcode' ), 999 );
			add_shortcode( 'pf_vc_text', array( $this, 'render_shortcode' ) );
		}

		/**
		 * Shortcode function.
		 *
		 * @package pf-salient-child-theme
		 */
		public function create_shortcode() {
			// Stop all if VC is not enabled.
			if ( ! defined( 'WPB_VC_VERSION' ) ) {
				return;
			}

			// Map text with vc_map().
			vc_map(
				array(
					'name'        => 'Text with additional styles',
					'icon'        => 'icon-wpb-ui-separator-label',
					'base'        => 'pf_vc_text',
					'description' => '',
					'category'    => 'PF Modules',
					'params'      => array(

						array(
							'type'        => 'textarea_html',
							'holder'      => 'div',
							'class'       => '',
							'heading'     => 'Content',
							'param_name'  => 'content', // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name".
							'value'       => '<p>Click edit button to change this text.</p>',
							'description' => 'Enter content.',
						),
						array(
							'type'        => 'dropdown',
							'heading'     => 'Choose Text Color',
							'param_name'  => 'pf_text_color',
							'value'       => array(
								'Select'      => '',
								'black'       => 'black',
								'white'       => 'white',
								'dark cian'   => 'blue',
								'blue'        => 'blue-2',
								'dark-blue'   => 'dark-blue',
								'light'       => 'light',
								'gray'        => 'gray',
								'dark-gray'   => 'dark-gray',
								'middle-gray' => 'middle-gray',
								'green'       => 'green',
								'mint'        => 'mint',
								'gold'        => 'gold',
								'red'         => 'red',
							),
							'description' => '',
						),
						array(
							'type'        => 'dropdown',
							'heading'     => 'Choose Underline Color',
							'param_name'  => 'pf_underline_color',
							'value'       => array(
								'Select'      => '',
								'black'       => 'black',
								'white'       => 'white',
								'dark cian'   => 'blue',
								'blue'        => 'blue-2',
								'dark-blue'   => 'dark-blue',
								'light'       => 'light',
								'gray'        => 'gray',
								'dark-gray'   => 'dark-gray',
								'middle-gray' => 'middle-gray',
								'green'       => 'green',
								'mint'        => 'mint',
								'gold'        => 'gold',
								'red'         => 'red',
							),
							'description' => '',
						),

						array(
							'type'        => 'textfield',
							'heading'     => 'Element ID',
							'param_name'  => 'element_id',
							'value'       => '',
							'description' => 'Enter element ID (Note: make sure it is unique and valid).',
							'group'       => 'Extra',
						),
						array(
							'type'        => 'textfield',
							'heading'     => 'Extra class name',
							'param_name'  => 'extra_class',
							'value'       => '',
							'description' => 'Style particular content element differently - add a class name and refer to it in custom CSS.',
							'group'       => 'Extra',
						),
					),
				)
			);

		}

		/**
		 * Function to display the block.
		 *
		 * @param array  $atts - attributes.
		 * @param string $content - content.
		 * @param string $tag - tag.
		 *
		 * @package pf-salient-child-theme
		 */
		public function render_shortcode( $atts, $content, $tag ) {
			$atts = ( shortcode_atts(
				array(
					'extra_class'        => '',
					'element_id'         => '',
					'pf_text_color'      => '',
					'pf_underline_color' => '',
				),
				$atts
			) );

			// Content.
			$content = wpb_js_remove_wpautop( $content, true );

			// Class and Id.
			$extra_class = esc_attr( $atts['extra_class'] ) ? ' ' . esc_attr( $atts['extra_class'] ) : '';
			$element_id  = esc_attr( $atts['element_id'] ) ? ' id="' . esc_attr( $atts['element_id'] ) . '"' : '';

			// Other fields.
			$pf_text_color      = ( $atts['pf_text_color'] ) ? esc_attr( $atts['pf_text_color'] ) : 'dark-blue';
			$pf_underline_color = ( $atts['pf_underline_color'] ) ? esc_attr( $atts['pf_underline_color'] ) : 'blue';

			$output  = '';
			$output .= '<div class="pf-text-stylized text-color-' . $pf_text_color . ' underline-color-' . $pf_underline_color . $extra_class . '"' . $element_id . '>';
			$output .= $content;
			$output .= '</div>';

			return $output;

		}

	}

	new PFVcText();
}
