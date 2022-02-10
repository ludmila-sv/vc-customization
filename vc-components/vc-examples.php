<?php
/**
 * VC Customization: examples.
 *
 * @package pf-salient-child-theme
 */

// a field with dependency & video.
array(
	'type'        => 'textfield',
	'class'       => '',
	'group'       => 'Background',
	'heading'     => esc_html__( 'Youtube Video URL', 'salient-core' ),
	'value'       => '',
	'param_name'  => 'video_external',
	'description' => esc_html__( 'Can be used as an alternative to self hosted videos. Enter full video URL e.g. https://www.youtube.com/watch?v=6oTurM7gESE', 'salient-core' ),
	'dependency'  => array(
		'element' => 'video_bg',
		'value'   => array( 'use_video' ),
	),
);

array(
	'type'        => 'nectar_attach_video',
	'class'       => '',
	'group'       => 'Background',
	'heading'     => esc_html__( 'WebM File URL', 'salient-core' ),
	'value'       => '',
	'param_name'  => 'video_webm',
	'description' => esc_html__(
		'You must include this format & the mp4 format to render your video with cross browser compatibility. OGV is optional.
Video must be in a 16:9 aspect ratio.',
		'salient-core'
	),
	'dependency'  => array(
		'element' => 'video_bg',
		'value'   => array( 'use_video' ),
	),
);

array(
	'type'        => 'nectar_attach_video',
	'class'       => '',
	'group'       => 'Background',
	'heading'     => esc_html__( 'MP4 File URL', 'salient-core' ),
	'value'       => '',
	'param_name'  => 'video_mp4',
	'description' => esc_html__( 'Enter the URL for your mp4 video file here', 'salient-core' ),
	'dependency'  => array(
		'element' => 'video_bg',
		'value'   => array( 'use_video' ),
	),
);

array(
	'type'        => 'nectar_attach_video',
	'class'       => '',
	'group'       => 'Background',
	'heading'     => esc_html__( 'OGV File URL', 'salient-core' ),
	'value'       => '',
	'param_name'  => 'video_ogv',
	'description' => esc_html__( 'Enter the URL for your ogv video file here', 'salient-core' ),
	'dependency'  => array(
		'element' => 'video_bg',
		'value'   => array( 'use_video' ),
	),
);

// radio true/false.
array(
	'type'             => 'checkbox',
	'edit_field_class' => 'vc_col-xs-12 salient-fancy-checkbox',
	'heading'          => esc_html__( 'Full Height Row', 'salient-core' ),
	'param_name'       => 'full_height',
	'description'      => esc_html__( 'Scales the row height to be the same height as the browser window.', 'salient-core' ),
	'value'            => array( esc_html__( 'Yes', 'salient-core' ) => 'yes' ),
);

// radio image.
array(
	'type'        => 'nectar_radio_image',
	'class'       => '',
	'save_always' => true,
	'heading'     => esc_html__( 'Shape Type', 'salient-core' ),
	'param_name'  => 'shape_type',
	'group'       => 'Shape Divider',
	'options'     => array(
		'curve'             => array( esc_html__( 'Curve', 'salient-core' ) => SALIENT_CORE_PLUGIN_PATH . '/includes/img/shape_dividers/curve_down.jpg' ),
		'fan'               => array( esc_html__( 'Fan', 'salient-core' ) => SALIENT_CORE_PLUGIN_PATH . '/includes/img/shape_dividers/fan.jpg' ),
		'curve_opacity'     => array( esc_html__( 'Curve Opacity', 'salient-core' ) => SALIENT_CORE_PLUGIN_PATH . '/includes/img/shape_dividers/curve_opacity.jpg' ),
		'mountains'         => array( esc_html__( 'Mountains', 'salient-core' ) => SALIENT_CORE_PLUGIN_PATH . '/includes/img/shape_dividers/mountains.jpg' ),
		'curve_asym'        => array( esc_html__( 'Curve Asym.', 'salient-core' ) => SALIENT_CORE_PLUGIN_PATH . '/includes/img/shape_dividers/curve_asym.jpg' ),
		'curve_asym_2'      => array( esc_html__( 'Curve Asym. Alt', 'salient-core' ) => SALIENT_CORE_PLUGIN_PATH . '/includes/img/shape_dividers/curve_asym_2.jpg' ),
		'tilt'              => array( esc_html__( 'Tilt', 'salient-core' ) => SALIENT_CORE_PLUGIN_PATH . '/includes/img/shape_dividers/tilt.jpg' ),
		'tilt_alt'          => array( esc_html__( 'Tilt Alt', 'salient-core' ) => SALIENT_CORE_PLUGIN_PATH . '/includes/img/shape_dividers/tilt_alt.jpg' ),
		'triangle'          => array( esc_html__( 'Triangle', 'salient-core' ) => SALIENT_CORE_PLUGIN_PATH . '/includes/img/shape_dividers/triangle.jpg' ),
		'waves'             => array( esc_html__( 'Waves', 'salient-core' ) => SALIENT_CORE_PLUGIN_PATH . '/includes/img/shape_dividers/waves_no_opacity.jpg' ),
		'waves_opacity'     => array( esc_html__( 'Waves Opacity', 'salient-core' ) => SALIENT_CORE_PLUGIN_PATH . '/includes/img/shape_dividers/waves.jpg' ),
		'waves_opacity_alt' => array( esc_html__( 'Waves Opacity 2', 'salient-core' ) => SALIENT_CORE_PLUGIN_PATH . '/includes/img/shape_dividers/waves_opacity.jpg' ),
		'clouds'            => array( esc_html__( 'Clouds', 'salient-core' ) => SALIENT_CORE_PLUGIN_PATH . '/includes/img/shape_dividers/clouds.jpg' ),
		'speech'            => array( esc_html__( 'Speech', 'salient-core' ) => SALIENT_CORE_PLUGIN_PATH . '/includes/img/shape_dividers/speech.jpg' ),
		'straight_section'  => array( esc_html__( 'Straight Section', 'salient-core' ) => SALIENT_CORE_PLUGIN_PATH . '/includes/img/shape_dividers/straight_section.jpg' ),
	),
);

// group header.
array(
	'type'             => 'nectar_group_header',
	'class'            => '',
	'heading'          => esc_html__( 'Spacing & Transform', 'salient-core' ),
	'param_name'       => 'group_header_2',
	'edit_field_class' => '',
	'value'            => '',
);

// number.
array(
	'type'             => 'nectar_numerical',
	'class'            => '',
	'edit_field_class' => 'col-md-6 desktop row-padding-device-group constrain_group_1',
	'heading'          => '<span class="group-title">' . esc_html__( 'Padding', 'salient-core' ) . "</span><span class='attr-title'>" . esc_html__( 'Top', 'salient-core' ) . '</span>',
	'value'            => '',
	'placeholder'      => esc_html__( 'Top', 'salient-core' ),
	'param_name'       => 'top_padding',
	'description'      => '',
);

// js_view - VcRowView.
vc_map(
	array(
		'name'        => 'Tabs with Logos',
		'icon'        => 'icon-wpb-ui-tab-content',
		'base'        => 'pf_vc_logo_tabs',
		'description' => '',
		'category'    => 'PF Modules',
		'params'      => array(),
		'js_view'     => 'VcRowView',
	)
);

// js_view - VcColumnView.

/**
 * Render row.
 *
 * @param string $content - content.
 *
 * @since 1.0
 */
function render_row( $content ) {
	$output .= '<div class="bla-bla"> ' . do_shortcode( $content ) . ' </div>';
	return $output;
}

// tabs.
$tab_id_1 = time() . '-1-' . wp_rand( 0, 100 );
$tab_id_2 = time() . '-2-' . wp_rand( 0, 100 );

array(
	'name'                    => esc_html__( 'Tabs', 'salient-core' ),
	'base'                    => 'tabbed_section',
	'show_settings_on_create' => false,
	'is_container'            => true,
	'icon'                    => 'icon-wpb-ui-tab-content',
	'category'                => esc_html__( 'Nectar Elements', 'salient-core' ),
	'description'             => esc_html__( 'Tabbed content', 'salient-core' ),
	'params'                  => array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Style', 'salient-core' ),
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Default', 'salient-core' )  => 'default',
				esc_html__( 'Material', 'salient-core' ) => 'material',
				esc_html__( 'Minimal', 'salient-core' )  => 'minimal',
				esc_html__( 'Minimal Alt', 'salient-core' ) => 'minimal_alt',
				esc_html__( 'Minimal Flexible Width', 'salient-core' ) => 'minimal_flexible',
				esc_html__( 'Vertical', 'salient-core' ) => 'vertical',
				esc_html__( 'Vertical Material', 'salient-core' ) => 'vertical_modern',
				esc_html__( 'Vertical Sticky Scrolling', 'salient-core' ) => 'vertical_scrolling',
			),
			'save_always' => true,
			'description' => esc_html__( 'Please select the style you desire for your tabbed element.', 'salient-core' ),
		),
	),
	'custom_markup'           => '
	<div class="wpb_tabs_holder wpb_holder vc_container_for_children">
	<ul class="tabs_controls">
	</ul>
	%content%
	</div>',
	'default_content'         => '
	[tab title="' . esc_html__( 'Tab', 'salient-core' ) . '" id="' . $tab_id_1 . '"] I am text block. Click edit button to change this text. [/tab]
	[tab title="' . esc_html__( 'Tab', 'salient-core' ) . '" id="' . $tab_id_2 . '"] I am text block. Click edit button to change this text. [/tab]
	',
	'js_view'                 => ( $vc_is_wp_version_3_6_more ? 'VcTabsView' : 'VcTabsView35' ),
);

// tab.
array(
	'name'                      => esc_html__( 'Tab', 'salient-core' ),
	'base'                      => 'tab',
	'allowed_container_element' => 'vc_row',
	'is_container'              => true,
	'content_element'           => false,
	'params'                    => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Title', 'salient-core' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'Tab title.', 'salient-core' ),
		),
		array(
			'type'       => 'tab_id',
			'heading'    => esc_html__( 'Tab ID', 'salient-core' ),
			'param_name' => 'id',
		),
	),
	'js_view'                   => ( $vc_is_wp_version_3_6_more ? 'VcTabView' : 'VcTabView35' ),
);
// see salient_core/includes/nectar_maps.

// tab output.
$output .= "\n\t\t\t" . '<div id="tab-' . ( empty( $id ) ? sanitize_title( $title ) : $id ) . '" ' . $icon_attr . ' class="' . esc_attr( $css_class ) . '">' . $icon_markup;
$output .= ( '' === $content || ' ' === $content ) ? __( 'Empty section. Edit page to add content here.', 'js_composer' ) : "\n\t\t\t\t" . wpb_js_remove_wpautop( $content );
$output .= "\n\t\t\t" . '</div> ' . $this->endBlockComment( '.wpb_tab' );

// Parent and Child Elements.
array(
	'as_parent' => array( 'only' => 'nz_box' ),
	'js_view'   => 'VcColumnView',
	'as_child'  => array( 'only' => 'nz_content_box' ),
);
/**
 * Tabbed section shortcode.
 *
 * @param array  $atts - attributes.
 * @param string $content - content.
 *
 * @since 1.0
 */
function nectar_tabs( $atts, $content = null ) {

	$GLOBALS['tab_count'] = 0;

	do_shortcode( $content );

	if ( is_array( $GLOBALS['tabs'] ) ) {

		foreach ( $GLOBALS['tabs'] as $tab ) {
			$tabs[]  = '<li><a href="#' . $tab['id'] . '">' . wp_kses_post( $tab['title'] ) . '</a></li>';
			$panes[] = '<div id="' . esc_attr( $tab['id'] ) . '">' . $tab['content'] . '</div>';
		}

		$return = '<div class="tabbed vc_clearfix"><ul>' . implode( "\n", $tabs ) . '</ul>' . implode( "\n", $panes ) . "</div>\n";
	}
	return $return;
}

add_shortcode( 'tabbed_section', 'nectar_tabs' );


/**
 * Tab shortcode.
 *
 * @param array  $atts - attributes.
 * @param string $content - content.
 *
 * @since 1.0
 */
function nectar_tab( $atts, $content ) {

	extract(
		shortcode_atts(
			array(
				'title' => '%d',
				'id'    => '%d',
			),
			$atts
		)
	);

	$x                     = $GLOBALS['tab_count'];
	$GLOBALS['tabs'][ $x ] = array(
		'title'   => sprintf( $title, $GLOBALS['tab_count'] ),
		'content' => do_shortcode( $content ),
		'id'      => $id,
	);

	$GLOBALS['tab_count']++;
}

add_shortcode( 'tab', 'nectar_tab' );
