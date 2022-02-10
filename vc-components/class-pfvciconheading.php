<?php
if ( class_exists( 'WPBakeryShortCode' ) ) {
	class PFVcIconHeading extends WPBakeryShortCode {

		function __construct() {
			add_action( 'init', array( $this, 'create_shortcode' ), 999 );
			add_shortcode( 'pf_vc_icon_heading', array( $this, 'render_shortcode' ) );

		}

		public function create_shortcode() {
			// Stop all if VC is not enabled
			if ( ! defined( 'WPB_VC_VERSION' ) ) {
				return;
			}

			// Map icon_heading with vc_map()
			vc_map(
				array(
					'name'        => 'Icon Heading',
					'icon'        => 'icon-wpb-ui-custom_heading',
					'base'        => 'pf_vc_icon_heading',
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
							'type'        => 'dropdown',
							'heading'     => 'Choose size',
							'param_name'  => 'pf_heading_tag',
							'value'       => array(
								'Select' => '',
								'H1'     => 'h1',
								'H2'     => 'h2',
								'H3'     => 'h3',
								'H4'     => 'h4',
								'H5'     => 'h5',
								'H6'     => 'h6',
							),
							'description' => '',
						),
						array(
							'type'        => 'attach_image',
							'class'       => '',
							//'holder'      => 'img',
							'heading'     => 'Heading icon',
							'param_name'  => 'pf_heading_icon',
							'value'       => '',
							'description' => '',
						),
						array(
							'type'        => 'colorpicker',
							'class'       => '',
							'heading'     => 'Choose color',
							'param_name'  => 'pf_heading_color',
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
					'extra_class'      => '',
					'element_id'       => '',
					'pf_heading_txt'   => '',
					'pf_heading_tag'   => '',
					'pf_heading_icon'  => '',
					'pf_heading_color' => '',
				),
				$atts
			) );

			//Class and Id
			$extra_class = esc_attr( $atts['extra_class'] ) ? ' ' . esc_attr( $atts['extra_class'] ) : '';
			$element_id  = esc_attr( $atts['element_id'] ) ? ' id="' . esc_attr( $atts['element_id'] ) . '"' : '';

			//Other fields
			$pf_heading_txt   = esc_attr( $atts['pf_heading_txt'] );
			$pf_heading_tag   = esc_attr( $atts['pf_heading_tag'] ) ? esc_attr( $atts['pf_heading_tag'] ) : 'h2';
			$pf_heading_icon  = esc_attr( $atts['pf_heading_icon'] );
			$pf_heading_color = esc_attr( $atts['pf_heading_color'] );

			$pf_image = wp_get_attachment_image( $pf_heading_icon, 'full' );

			$output  = '';
			$output .= '<' . $pf_heading_tag . ' class="pf-heading' . $extra_class . '"' . $element_id . ' style="color: ' . $pf_heading_color . ';">';
			$output .= $pf_image;
			$output .= $pf_heading_txt;
			$output .= '</' . $pf_heading_tag . '>';

			return $output;

		}

	}

	new PFVcIconHeading();
}

