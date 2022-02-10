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
	class PFVcLinksRepeater extends WPBakeryShortCode {

		/**
		 * Construct function.
		 *
		 * @package pf-salient-child-theme
		 */
		public function __construct() {
			add_action( 'init', array( $this, 'create_shortcode' ), 999 );
			add_shortcode( 'pf_vc_links_repeater', array( $this, 'render_shortcode' ) );

		}

		/**
		 * Shortcode function.
		 *
		 * @package pf-salient-child-theme
		 */
		public function create_shortcode() {
			if ( ! defined( 'WPB_VC_VERSION' ) ) {
				return;
			}

			// Map links with vc_map().
			vc_map(
				array(
					'name'        => 'Stylized Links (Repeater)',
					'icon'        => 'icon-wpb-fancy-ul',
					'base'        => 'pf_vc_links_repeater',
					'description' => '',
					'category'    => 'PF Modules',
					'params'      => array(

						array(
							'type'       => 'param_group',
							'param_name' => 'links_repeater',
							'params'     => array(
								array(
									'type'        => 'vc_link',
									'class'       => '',
									'heading'     => 'Link',
									'param_name'  => 'links_repeater_link',
									'description' => '',
								),
							),
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
							'type'        => 'dropdown',
							'heading'     => 'Link hover highlight',
							'param_name'  => 'pf_link_highlight',
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
					'extra_class'       => '',
					'element_id'        => '',
					'links_repeater'    => '',
					'pf_link_color'     => '',
					'pf_link_highlight' => '',
				),
				$atts
			) );

			// Items.
			$items = vc_param_group_parse_atts( $atts['links_repeater'] );

			// Class and Id.
			$extra_class = esc_attr( $atts['extra_class'] ) ? ' ' . esc_attr( $atts['extra_class'] ) : '';
			$element_id  = esc_attr( $atts['element_id'] ) ? ' id="' . esc_attr( $atts['element_id'] ) . '"' : '';

			// Other fields.
			$pf_link_color     = $atts['pf_link_color'] ? esc_attr( $atts['pf_link_color'] ) : '#2a4258';
			$pf_link_highlight = $atts['pf_link_highlight'] ? esc_attr( $atts['pf_link_highlight'] ) : 'blue';

			$output  = '';
			$output .= '<div class="pf-links-repeater highlight-color-' . $pf_link_highlight . $extra_class . '"' . $element_id . '>';
			if ( $items ) {
				$output .= '<ul>';
				foreach ( $items as  $item ) {
					$item_link        = vc_build_link( $item['links_repeater_link'] );
					$item_link_title  = esc_html( $item_link['title'] );
					$item_link_url    = esc_url( $item_link['url'] );
					$item_link_target = ( $item_link['target'] ) ? ' target="' . $item_link['target'] . '"' : '';

					$output .= '<li><a style="color: ' . $pf_link_color . ';" href="' . $item_link_url . '"' . $item_link_target . '>' . $item_link_title . '</a></li>';
				}
				$output .= '</ul>';
			}
			$output .= '</div>';

			return $output;

		}

	}

	new PFVcLinksRepeater();
}

