<?php
/**
 * VC Customization: a class for a custom module.
 *
 * @package pf-salient-child-theme
 */

if ( class_exists( 'WPBakeryShortCode' ) ) {
	/**
	 * Tab/Slide for Tabs with logos.
	 *
	 * @package pf-salient-child-theme
	 */
	class PFVcLogoSlide extends WPBakeryShortCode {

		/**
		 * Construct function.
		 *
		 * @package pf-salient-child-theme
		 */
		public function __construct() {
			add_action( 'init', array( $this, 'create_shortcode' ), 999 );
			add_shortcode( 'pf_vc_logo_slide', array( $this, 'render_shortcode' ) );
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
					'name'        => 'PF Tab/Slide for Tabs with Logos',
					'icon'        => 'icon-wpb-ui-tab-content',
					'base'        => 'pf_vc_logo_slide',
					'description' => '',
					'category'    => 'PF Modules',
					'as_child'    => array( 'only' => 'tab' ),
					'params'      => array(
						array(
							'type'       => 'attach_image',
							'holder'     => 'img',
							'heading'    => 'Logo',
							'param_name' => 'logo',
							'value'      => '',
						),
						array(
							'type'        => 'colorpicker',
							'class'       => '',
							'heading'     => 'Choose Active Slide Underline Color',
							'param_name'  => 'active_color',
							'value'       => '',
							'description' => '',
						),
						array(
							'type'       => 'attach_image',
							'heading'    => 'Image',
							'param_name' => 'img',
							'value'      => '',
						),
						array(
							'type'        => 'textfield',
							'holder'      => 'div',
							'heading'     => 'Title',
							'param_name'  => 'title',
							'value'       => '',
							'description' => '',
						),
						array(
							'type'       => 'textarea',
							'holder'     => 'div',
							'heading'    => 'Description',
							'param_name' => 'description',
							'value'      => '',
						),
						array(
							'type'        => 'vc_link',
							'class'       => '',
							'heading'     => 'Link',
							'param_name'  => 'link',
							'description' => '',
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
					'logo'         => '',
					'active_color' => '',
					'img'          => '',
					'title'        => '',
					'description'  => '',
					'link'         => '',
				),
				$atts
			) );

			$slide_active_color = $atts['active_color'] ? esc_attr( $atts['active_color'] ) : '#0f95b7';
			$slide_logo         = $atts['logo'] ? wp_get_attachment_image( esc_attr( $atts['logo'] ), 'full', false, array( 'class' => 'project-logo-image' ) ) : '';
			$slide_img          = $atts['img'] ? wp_get_attachment_image( esc_attr( $atts['img'] ), 'full' ) : '';
			$slide_title        = $atts['title'] ? esc_attr( $atts['title'] ) : '';
			$slide_description  = $atts['description'] ? esc_attr( $atts['description'] ) : '';
			$slide_link         = vc_build_link( $atts['link'] );
			$slide_link_title   = $slide_link['title'] ? esc_html( $slide_link['title'] ) : 'Learn More';
			$slide_link_url     = $slide_link['url'] ? esc_url( $slide_link['url'] ) : '#';
			$slide_link_target  = ( $slide_link['target'] ) ? ' target="' . $slide_link['target'] . '"' : '';

			$logo = '<a href="#" class="logo-slider__logo project-logo" data-slide-to="">' . $slide_logo . '<span style="background: ' . $slide_active_color . '"></span></a>';

			$slide  = '<div class="logo-slider__slide">';
			$slide .= '<div class="logo-slider__slide-inner">';

			$slide .= '<div class="logo-slider__slide-logo project-logo">';
			$slide .= $slide_logo;
			$slide .= '</div>';

			$slide .= '<div class="logo-slider__slide-content">';
			$slide .= '<h3>' . $slide_title . '</h3>';
			$slide .= '<div class="logo-slider__slide-desc">' . $slide_description . '</div>';
			$slide .= '<div class="logo-slider__slide-btn"><a class="btn btn-secondary" href="' . $slide_link_url . '"' . $slide_link_target . '>' . $slide_link_title . '</a></div>';
			$slide .= '</div>'; // logo-slider__slide-content.

			$slide .= '<div class="logo-slider__slide-image">';
			$slide .= $slide_img;
			$slide .= '</div>'; // logo-slider__slide-image.

			$slide .= '</div>'; // logo-slider__slide-inner.
			$slide .= '</div>'; // logo-slider__slide.

			$data_shortcode_controls = "['add','edit','clone','delete']";

			if ( is_admin() || 'vc_inline' === vc_action() || ! is_null( vc_request_param( 'vc_inline' ) ) || 'true' === vc_request_param( 'vc_editable' ) ) {
				$logo = '<div style="max-width: 165px;">' . $logo . '</div>';
			}

			$output = $logo . $slide;

			return $output;

		}

	}

	new PFVcLogoSlide();
}
