<?php
/**
 * VC Customization: a class for a custom module.
 *
 * @package pf-salient-child-theme
 */

if ( class_exists( 'WPBakeryShortCode' ) ) {
	/**
	 * Masthead.
	 *
	 * @package pf-salient-child-theme
	 */
	class PFVcMasthead extends WPBakeryShortCode {

		/**
		 * Construct function.
		 *
		 * @package pf-salient-child-theme
		 */
		public function __construct() {
			add_action( 'init', array( $this, 'create_shortcode' ), 999 );
			add_shortcode( 'pf_vc_masthead', array( $this, 'render_shortcode' ) );
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
					'name'        => 'Masthead',
					'icon'        => 'icon-wpb-ui-separator-label',
					'base'        => 'pf_vc_masthead',
					'description' => '',
					'category'    => 'PF Modules',
					'params'      => array(

						array(
							'type'        => 'attach_image',
							'class'       => '',
							'heading'     => 'Image',
							'param_name'  => 'pf_image',
							'value'       => '',
							'description' => '',
						),
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
							'heading'     => 'Choose Divider Color',
							'param_name'  => 'pf_divider_color',
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
							'heading'     => 'Desktop Image Height',
							'param_name'  => 'pf_h_desktop',
							'value'       => '150',
							'description' => 'Desktop Image height in px. Specify this Section Id in the Extra tab to use this option!',
							'group'       => 'Image Attributes',
						),
						array(
							'type'        => 'textfield',
							'heading'     => 'Tablet Image Height',
							'param_name'  => 'pf_h_tab',
							'value'       => '100',
							'description' => 'Tablet Image height in px. Specify this Section Id in the Extra tab to use this option!',
							'group'       => 'Image Attributes',
						),
						array(
							'type'        => 'textfield',
							'heading'     => 'Mobile Image Height',
							'param_name'  => 'pf_h_mob',
							'value'       => '70',
							'description' => 'Mobile Image height in px. Specify this Section Id in the Extra tab to use this option!',
							'group'       => 'Image Attributes',
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
					'extra_class'      => '',
					'element_id'       => '',
					'pf_image'         => '',
					'pf_text_color'    => '',
					'pf_divider_color' => '',
					'pf_h_desktop'     => '',
					'pf_h_tab'         => '',
					'pf_h_mob'         => '',
				),
				$atts
			) );

			// Content.
			$content = wpb_js_remove_wpautop( $content, true );

			// Image.
			$pf_image     = esc_attr( $atts['pf_image'] );
			$pf_image_img = $atts['pf_image'] ? wp_get_attachment_image( $pf_image, 'large', false, array( 'srcset' => '' ) ) : '';
			$pf_h_desktop = $atts['pf_h_desktop'] ? $atts['pf_h_desktop'] . 'px' : '150px';
			$pf_h_tab     = $atts['pf_h_tab'] ? $atts['pf_h_tab'] . 'px' : '100px';
			$pf_h_mob     = $atts['pf_h_mob'] ? $atts['pf_h_mob'] . 'px' : '70px';

			// Class and Id.
			$extra_class = esc_attr( $atts['extra_class'] ) ? ' ' . esc_attr( $atts['extra_class'] ) : '';
			$extra_id    = esc_attr( $atts['element_id'] ) ? esc_attr( $atts['element_id'] ) : wp_rand( 99, 99999 );
			$element_id  = esc_attr( $atts['element_id'] ) ? ' id="' . esc_attr( $atts['element_id'] ) . '"' : ' id="' . wp_rand( 99, 99999 ) . '"';

			// Other fields.
			$pf_text_color    = ( $atts['pf_text_color'] ) ? esc_attr( $atts['pf_text_color'] ) : 'dark-blue';
			$pf_divider_color = ( $atts['pf_divider_color'] ) ? esc_attr( $atts['pf_divider_color'] ) : 'blue';

			$output  = '';
			$output .= '<div class="pf-masthead text-color-' . $pf_text_color . ' divider-color-' . $pf_divider_color . $extra_class . '"' . $element_id . '>';
			$output .= '<div class="pf-masthead__img">';
			$output .= $pf_image_img;
			$output .= '</div>';
			$output .= '<div class="pf-masthead__txt">';
			$output .= $content;
			$output .= '</div>';
			$output .= '</div>';

			$output .= '<style>';
			$output .= '.row .col .pf-masthead#' . $extra_id . ' img { width: auto; height: ' . $pf_h_desktop . ';}\n';
			$output .= '@media only screen and (max-width: 1000px) { .row .col .pf-masthead#' . $extra_id . ' img { width: auto; height: ' . $pf_h_tab . ';}}\n';
			$output .= '@media only screen and (max-width: 690px) { .row .col .pf-masthead#' . $extra_id . ' img { width: auto; height: ' . $pf_h_mob . ';}}';
			$output .= '</style>';

			return $output;

		}

	}

	new PFVcMasthead();
}
