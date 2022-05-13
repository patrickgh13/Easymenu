<?php
/**
 * Redux Framework media config.
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
	$opt_name,
	array(
		'title'      => esc_html__( 'logo', 'your-textdomain-here' ),
		'id'         => 'header-logo',
		'desc'       => esc_html__( 'For full documentation on this field, visit: ', 'your-textdomain-here' ) . '<a href="https://devs.redux.io/core-fields/media.html" target="_blank">https://devs.redux.io/core-fields/media.html</a>',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'           => 'opt-logo',
				'type'         => 'media',
				'url'          => false,
				'title'        => esc_html__( 'header-logo', 'your-textdomain-here' ),
				'compiler'     => 'true',
				'desc'         => esc_html__( 'Add your logo', 'your-textdomain-here' ),
				'subtitle'     => esc_html__( 'Upload any media using the WordPress native uploader', 'your-textdomain-here' ),
				'preview_size' => 'full',
			),
		),
	)
);
