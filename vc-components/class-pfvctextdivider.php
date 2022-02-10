<?php
if ( class_exists( 'WPBakeryShortCode' ) ) {
	class PFVcTextDivider extends WPBakeryShortCode {

		function __construct() {
			add_action( 'init', array( $this, 'create_shortcode' ), 999 );
			add_shortcode( 'pf_vc_text_divider', array( $this, 'render_shortcode' ) );

		}

		public function create_shortcode() {
			// Stop all if VC is not enabled
			if ( ! defined( 'WPB_VC_VERSION' ) ) {
				return;
			}

			// Map text_divider with vc_map()
			vc_map(
				array(
					'name'        => 'Text with Divider',
					'icon'        => 'icon-wpb-nectar-horizontal-list-item',
					'base'        => 'pf_vc_text_divider',
					'description' => '',
					'category'    => 'PF Modules',
					'params'      => array(

						array(
							'type'        => 'textfield',
							'holder'      => 'h2',
							'heading'     => 'Heading',
							'param_name'  => 'pf_heading_txt',
							'value'       => '',
							'description' => 'Type text here.',
						),
						array(
							'type'        => 'textarea_html',
							'holder'      => 'div',
							'class'       => '',
							'heading'     => 'Content',
							'param_name'  => 'content', // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
							'value'       => '<p>Click edit button to change this text.</p>',
							'description' => 'Enter content.',
						),
						array(
							'type'        => 'colorpicker',
							'class'       => '',
							'heading'     => 'Choose heading color',
							'param_name'  => 'pf_h_color',
							'value'       => '',
							'description' => '',
						),
						array(
							'type'        => 'colorpicker',
							'class'       => '',
							'heading'     => 'Choose text color',
							'param_name'  => 'pf_text_color',
							'value'       => '',
							'description' => '',
						),
						array(
							'type'        => 'colorpicker',
							'class'       => '',
							'heading'     => 'Choose divider color',
							'param_name'  => 'pf_divider_color',
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

		public function render_shortcode( $atts, $content, $tag ) {
			$atts = ( shortcode_atts(
				array(
					'extra_class'   => '',
					'element_id'   => '',
					'pf_heading_txt'   => '',
					'pf_h_color'       => '',
					'pf_text_color'    => '',
					'pf_divider_color' => '',
				),
				$atts
			) );

			//Content
			$content = wpb_js_remove_wpautop( $content, true );

			//Class and Id
			$extra_class = esc_attr( $atts['extra_class'] ) ? ' ' . esc_attr( $atts['extra_class'] ) : '';
			$element_id  = esc_attr( $atts['element_id'] ) ? ' id="' . esc_attr( $atts['element_id'] ) . '"' : '';

			//Other fields
			$pf_heading_txt   = esc_attr( $atts['pf_heading_txt'] );
			$pf_h_color       = esc_attr( $atts['pf_h_color'] ) ? esc_attr( $atts['pf_h_color'] ) : 'inherit';
			$pf_text_color    = esc_attr( $atts['pf_text_color'] ) ? esc_attr( $atts['pf_text_color'] ) : 'inherit';
			$pf_divider_color = esc_attr( $atts['pf_divider_color'] ) ? esc_attr( $atts['pf_divider_color'] ) : 'currentColor';

			$output  = '';
			$output .= '<div class="pf-text-divider' . $extra_class . '"' . $element_id . '>';
			$output .= '<div class="pf-text-divider__h">';
			$output .= '<h3 style="color: ' . $pf_h_color . ';">';
			$output .= $pf_heading_txt;
			$output .= '</h3>';
			$output .= '</div>';
			$output .= '<div class="pf-text-divider__text" style="color: ' . $pf_text_color . '; border-color: ' . $pf_divider_color . ';">';
			$output .= $content;
			$output .= '</div>';
			$output .= '</div>';

			return $output;

		}

	}

	new PFVcTextDivider();
}
