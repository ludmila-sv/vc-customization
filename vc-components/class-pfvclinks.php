<?php
/**
 * VC Customization: a class for a custom module.
 *
 * @package pf-salient-child-theme
 */

if ( class_exists( 'WPBakeryShortCode' ) ) {
	/**
	 * Stylized links.
	 *
	 * @package pf-salient-child-theme
	 */
	class PFVcLinks extends WPBakeryShortCode {

		/**
		 * Construct function.
		 *
		 * @package pf-salient-child-theme
		 */
		public function __construct() {
			add_action( 'init', array( $this, 'create_shortcode' ), 999 );
			add_shortcode( 'pf_vc_links', array( $this, 'render_shortcode' ) );

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

			// Map links with vc_map().
			vc_map(
				array(
					'name'        => 'Stylized Links',
					'icon'        => 'icon-wpb-fancy-ul',
					'base'        => 'pf_vc_links',
					'description' => '',
					'category'    => 'PF Modules',
					'params'      => array(

						array(
							'type'        => 'textarea_html',
							'holder'      => 'div',
							'class'       => '',
							'heading'     => 'Content',
							'param_name'  => 'content',
							'value'       => '<p>Click edit button to change this text.</p>',
							'description' => 'Enter content. All links in this block will be stylized.',
						),
						array(
							'type'        => 'colorpicker',
							'class'       => '',
							'heading'     => 'Choose link color',
							'param_name'  => 'pf_link_color',
							'value'       => '',
							'description' => '',
						),
						array(
							'type'        => 'colorpicker',
							'class'       => '',
							'heading'     => 'Link hover highlight',
							'param_name'  => 'pf_link_highlight',
							'value'       => '',
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
					'extra_class'       => '',
					'element_id'        => '',
					'pf_link_color'     => '',
					'pf_link_highlight' => '',
				),
				$atts
			) );

			// Content.
			$content = wpb_js_remove_wpautop( $content, true );

			// Class and Id.
			$rand_id = 'id-' . time() . '-links-' . rand( 0, 100 );

			$extra_class = esc_attr( $atts['extra_class'] ) ? ' ' . esc_attr( $atts['extra_class'] ) : '';
			$element_id  = esc_attr( $atts['element_id'] ) ? esc_attr( $atts['element_id'] ) : $rand_id;

			// Other fields.
			$pf_link_color     = $atts['pf_link_color'] ? esc_attr( $atts['pf_link_color'] ) : '#2a4258';
			$pf_link_highlight = $atts['pf_link_highlight'] ? esc_attr( $atts['pf_link_highlight'] ) : '#0f95b7';

			$fill = str_replace( '#', '%23', $pf_link_highlight );

			$highlight_svg_bg = "<svg xmlns='http://www.w3.org/2000/svg' width='100' height='100'><rect fill='" . $fill . "' x='0' y='68' width='100' height='32'/></svg>";

			$pf_link_highlight_bg = 'url("data:image/svg+xml;utf8,' . $highlight_svg_bg . '")';

			$output  = '';
			$output .= '<div class="pf-links' . $extra_class . '" id="' . $element_id . '">';
			$output .= $content;
			$output .= '</div>';
			$output .= '<style>';
			$output .= '#' . $element_id . ' a {color: ' . $pf_link_color . ';}';
			$output .= '#' . $element_id . ' a:hover {color: ' . $pf_link_color . '; background-image: ' . $pf_link_highlight_bg . ';  background-size: 1em auto;}';
			$output .= '</style>';

			return $output;

		}

	}

	new PFVcLinks();
}

